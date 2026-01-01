<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Certification;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
    $projects = Project::orderBy('created_at', 'desc')->limit(3)->get();
    $certifications = Certification::orderBy('created_at', 'desc')->limit(3)->get();
    $cases = CaseStudy::orderBy('created_at', 'desc')->limit(3)->get();

        return view('welcome', compact('projects', 'certifications', 'cases'));
    }
}
