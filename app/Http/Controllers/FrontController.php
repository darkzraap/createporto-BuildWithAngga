<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectTool;
use App\Models\ProjectOrder;
use App\Models\Tools;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;

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


       public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'category' => 'required',
            'budget' => 'required|integer',
            'brief' => 'required'
        ]);

        DB::beginTransaction();

        try{
            
            $newHire = ProjectOrder::create($validated);

            DB::commit();

            return redirect()->route('front.index')->with('Succes Order' , 'Order has been succesfully Sent');

        }catch(\Exception $e){

            DB::rollBack();
              return redirect()->back()->with('Unsuccesfully Order' , 'Order has not been succesfully Sent');
        }

        
    }

            public function book()
    {
        return view('front.book');
    }
}
