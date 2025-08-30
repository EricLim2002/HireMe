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

class GeneralController extends Controller
{
    public function getSessionData()
    {
        try {
            return Session::all();
        } catch (Exception $e) {
            GeneralHelper::saveTryCatch("GeneralController", 'getSessionData', null, $e);
        }
    }

}
