<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Devlog;
use Illuminate\Http\Request;

class DevlogController extends Controller
{
        public function index() {
        $devlogs = Devlog::orderBy('id', 'desc')->get();

        return view('pages.devlogs', ['devlogs'=>$devlogs]);
    }
}
