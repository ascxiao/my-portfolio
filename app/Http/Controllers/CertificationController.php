<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
        public function index() {
        $certifications = Certification::orderBy('created_at', 'desc')->get();

        return view('pages.certification', ['certifications'=>$certifications]);
    }
}
