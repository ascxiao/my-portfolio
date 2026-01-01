<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\CaseStudy;
use App\Models\Certification;
use App\Models\Devlog;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
    $projects = Project::orderBy('created_at', 'desc')->paginate(15);
    $devlogs = Devlog::orderBy('created_at', 'desc')->paginate(15);
    $cases = CaseStudy::orderBy('created_at', 'desc')->paginate(15);
    $artworks = Artwork::orderBy('created_at', 'desc')->paginate(15);
    $certificates = Certification::orderBy('created_at', 'desc')->paginate(15);

    $projectTags = Project::pluck('tags');
    $caseStudyTags = CaseStudy::pluck('tags');

    $categoriesCount = $projectTags->merge($caseStudyTags)
        ->flatten()            
        ->countBy()             
        ->sortDesc()            
        ->take(5)               
        ->map(function ($count, $name) {
            // Reformat for Chart.js
            return ['name' => $name, 'count' => $count];
        })
        ->values();
    
    $distribution = [
        'Projects'     => $projects->count(),
        'Certificates' => $certificates->count(),
        'Devlogs'      => $devlogs->count(),
        'Case Studies' => $cases->count(),
        'Artworks'     => $artworks->count(),
    ];

        return view('admin.admin-panel', compact('projects', 'devlogs', 'cases', 'artworks', 'certificates', 'categoriesCount', 'distribution'));
    }
}
