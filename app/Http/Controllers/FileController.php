<?php

namespace App\Http\Controllers;

use Session;
use Exception;
use App\Http\Helper\GeneralHelper;
use App\Models\Visitor;
use App\Models\DownloadLog;
use App\Models\PreviewLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class FileController extends Controller
{
    public $publicFiles = [
        'Eric_resume_082025.pdf',
        'CoverLetter.pdf',
    ];
    protected function base64UrlDecode(string $data): ?string
    {
        try {
            // try normal base64 first (in case route helper encoded it)
            $decoded = base64_decode($data, true);
            if ($decoded !== false) {
                return $decoded;
            }

            // try url-safe base64 decode
            $data = strtr($data, '-_', '+/');
            $pad = strlen($data) % 4;
            if ($pad) {
                $data .= str_repeat('=', 4 - $pad);
            }
            $decoded = base64_decode($data, true);
            return $decoded === false ? null : $decoded;
        } catch (Exception $e) {
            GeneralHelper::saveTryCatch("FileController", 'base64UrlDecode', null, $e);
        }
    }

    protected function resolvePathFromEncoded(string $encoded)
    {
        try {
            Log::debug('[preview] encoded param', ['raw' => $encoded]);

            // URL-decode first (route helper will have url-encoded the value)
            $encoded = urldecode($encoded);

            $decoded = $this->base64UrlDecode($encoded);
            if (is_null($decoded)) {
                Log::error('[preview] base64 decode failed', ['encoded' => $encoded]);
                abort(400, 'Invalid token.');
            }

            // sanitize
            $decoded = str_replace(["\0", '../', '..\\', './', '.\\'], '', $decoded);
            $decoded = ltrim($decoded, '/\\');

            // base directory inside container
            $base = storage_path('app/private/download'); // keep this as your allowed root

            // candidate path
            $candidate = $base . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $decoded);

            // normalize for comparison
            $normBase = str_replace('\\', '/', realpath($base) ?: $base);
            $normCandidate = str_replace('\\', '/', realpath($candidate) ?: $candidate);

            Log::debug('[preview] path check', [
                'base' => $normBase,
                'candidate' => $normCandidate,
                'candidate_exists' => file_exists($candidate),
            ]);

            // ensure candidate is inside base
            if (strpos($normCandidate, $normBase) !== 0 || !file_exists($candidate)) {
                Log::warning('[preview] file not allowed or not found', ['candidate' => $candidate]);
                abort(404);
            }

            return $candidate;
        } catch (Exception $e) {
            GeneralHelper::saveTryCatch("FileController", 'resolvePathFromEncoded', null, $e);
        }
    }


public function preview($encoded)
{
    try {
        // Resolve the original file path
        try {
            $full = $this->resolvePathFromEncoded($encoded);
        } catch (Exception $e) {
            Log::error('[preview] resolve exception', ['err' => $e->getMessage()]);
            abort(404);
        }

        GeneralHelper::createLog(request(), $full, 1);

        // Watermark folder
        $watermarkDir = storage_path('app/watermarked');
        if (!file_exists($watermarkDir)) {
            mkdir($watermarkDir, 0755, true);
        }

        // Generate a unique filename for watermarked version
        $watermarkedFile = $watermarkDir . '/' . 'wm_' . basename($full);

        // Only generate watermark if not already exists
        if (!file_exists($watermarkedFile)) {
            // ✅ FIX: Create image manager with driver object
            $manager = new ImageManager(new Driver());

            // ✅ v3 uses read() instead of make()
            $img = $manager->read($full);

            // Add text watermark
            $img->text('Confidential', $img->width() / 2, $img->height() / 2, function ($font) {
                $font->filename('/var/www/html/public/fonts/arial.ttf'); // force full path // v3 method
                $font->size(256);
                $font->color('rgba(32, 32, 32, 0.1)');       // CSS style color
                $font->align('center');
                $font->valign('middle');
                $font->angle(-45);
            });

            $img->save($watermarkedFile);
        }

        Log::info('[preview] streaming watermarked file', [
            'original' => $full,
            'watermarked' => $watermarkedFile,
            'size' => filesize($watermarkedFile)
        ]);

        return response()->file($watermarkedFile);

    } catch (Exception $e) {
        GeneralHelper::saveTryCatch("FileController", 'preview', null, $e);
        abort(500, 'An error occurred while generating preview.');
    }
}


    public function download($encoded)
    {
        try {
            // Resolve the file path
            try {
                $full = $this->resolvePathFromEncoded($encoded);
            } catch (Exception $e) {
                Log::error('[download] resolve exception', ['err' => $e->getMessage()]);
                abort(404);
            }

            $filename = basename($full);

            // Check login & whitelist
            if (!auth()->check() && !in_array($filename, $this->publicFiles)) {
                abort(403, 'You must be logged in to download this document.');
            }

            GeneralHelper::createLog(request(), $full, 2);

            // Generate watermarked copy for non-whitelisted files if user is not public
            if (!in_array($filename, $this->publicFiles)) {
                $watermarkDir = storage_path('app/watermarked');
                if (!file_exists($watermarkDir)) {
                    mkdir($watermarkDir, 0755, true);
                }

                $watermarkedFile = $watermarkDir . '/' . 'wm_' . $filename;

                // Only generate if not exists
                if (!file_exists($watermarkedFile)) {
                    // Create image manager (v3 style)
                   $manager = new ImageManager(new Driver());


                    // Read original image
                    $img = $manager->read($full);

                    // Add watermark
                    $img->text('Confidential', $img->width() / 2, $img->height() / 2, function ($font) {
                        $font->filename('/var/www/html/public/fonts/arial.ttf'); // force full path // v3 uses filename()
                        $font->size(48);
                        $font->color('rgba(255,255,255,0.5)'); // v3 prefers CSS-style color
                        $font->align('center');
                        $font->valign('middle');
                        $font->angle(45);
                    });

                    $img->save($watermarkedFile);
                }

                Log::info('[download] sending watermarked file', ['path' => $watermarkedFile]);
                return response()->download($watermarkedFile, $filename);
            }

            // Public / whitelisted files
            Log::info('[download] sending original file', ['path' => $full]);
            return response()->download($full, $filename);

        } catch (Exception $e) {
            GeneralHelper::saveTryCatch("FileController", 'download', null, $e);
            abort(500, 'An error occurred while processing the download.');
        }
    }
}
