<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectTool;
use App\Models\Tools;

class FrontController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
       return view('front.index', ['projects' =>$projects]);
    }


        public function details(Project $project)
    {
       
        return view('front.details', [
            
            'project' => $project
        ]);
    }

            public function book()
    {
        return view('front.book');
    }
}
