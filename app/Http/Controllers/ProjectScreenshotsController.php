<?php

namespace App\Http\Controllers;

use App\Models\ProjectScreenshots;
use Illuminate\Http\Request;
use App\Models\Project;
Use Illuminate\Support\Facades\DB;

class ProjectScreenshotsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('admin.screenshot_project.create', ['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'screenshot' => 'required|image|mimes: jpeg,jpg,png,svg|max:2049'
        ]);

         DB::beginTransaction();

        try{

            if($request->hasFile('screenshot')){
                $path = $request->file('screenshot')->store('screenshots', 'public');
                $validated['screenshot'] = $path;

            }

            $validated['project_id'] = $project->id;

            $newScreenshoots = ProjectScreenshots::create($validated);

            DB::commit();

            return redirect()->route('admin.screenshot_project.create')->with('Succesfully','New Tools has been Added');

        }catch(\Exception $e) {

            DB::rollBack();

           return redirect()->back()->with('error', 'System Error'. $e->getMessage());




        }


  
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectScreenshots $projectScreenshots)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectScreenshots $projectScreenshots)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectScreenshots $projectScreenshots)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectScreenshots $projectScreenshots)
    {
         try {
        // tambahkan project_id
        
        $projectScreenshots->delete();
        return redirect()->back()->with('success', 'New tool has been assigned to the project.');

    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()->with('error', 'Failed to assign tool. Please try again.');
    }
    }
}
