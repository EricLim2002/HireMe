<?php

namespace App\Http\Helper;

use Exception;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Models\TryCatch;
use App\Models\DownloadLog;
use App\Models\PreviewLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;


class GeneralHelper extends Controller
{
    const portal = "HireMeWeb";

    public static function createLog(Request $request, $document, $type = null)
    {
        try {
            //if type = 1 preview log
            //if type = 2 download log
            switch ($type) {
                case (1):
                    PreviewLog::create([
                        'user_id' => $request->user_id,
                        'visitor_id' => $request->visitor_id,
                        'document' => $document,
                    ]);
                    break;

                case (2):
                    DownloadLog::create([
                        'user_id' => $request->user_id,
                        'visitor_id' => $request->visitor_id,
                        'document' => $document,
                    ]);
                    break;
                default: // Unknown type
                    // optionally log error, or ignore
                    break;

            }
        } catch (Exception $e) {
            GeneralHelper::saveTryCatch("GeneralHelper", 'createLog', $request, $e);
        }

    }

    public static function saveTryCatch($module, $function, Request $request = null, Exception $e = null, $remark = null, $portal = self::portal)
    {
        try {
            TryCatch::create([
                'visitor_id' => $request?->visitor_id,   // null-safe operator
                'user_id' => $request?->user_id,
                'portal' => $portal,
                'module' => $module,
                'function_name' => $function,
                'error_message' => $e->getMessage(),
                'request' => $request ? json_encode($request->all()) : null,
                'remarks' => $remark, // optional
            ]);
        } catch (Exception $exc) {
            // prevent infinite loop — log to Laravel log instead

            \Log::error("TryCatch logging failed: " . $exc->getMessage());
        }
    }
}
