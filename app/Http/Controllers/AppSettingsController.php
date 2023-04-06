<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppSettingsController extends Controller
{
    function index() {
        return view('llms.settings.index');
    }

    function adminOptions() {
       //
    }

    function appOptions() {
       //
    }
}
