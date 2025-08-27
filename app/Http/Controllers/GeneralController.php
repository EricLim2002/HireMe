<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class GeneralController extends Controller
{
       public function getSessionData()
    {
        return Session::all();
    }
}
