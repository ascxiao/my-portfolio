<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::orderBy('created_at', 'desc')->paginate(9);

        return view('pages.projects', ['projects'=>$projects]);
    }

    public function show($id) {
        
    }

    public function create() {
        
    }

    public function store() {
        
    }
}
