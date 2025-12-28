<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function index() {
    $cases = CaseStudy::orderBy('created_at', 'desc')->get();

    return view('pages.case_study', ['cases'=>$cases]);
    }
}
