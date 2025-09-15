<?php

namespace App\Http\Controllers;

use App\Models\ProjectTool;
use Illuminate\Http\Request;
use App\Models\Tool;
use App\Models\Project;
Use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Str;

class ProjectToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $project = ProjectTool::orderBy('id', 'desc')->get();
        return view('admin.project_tools.create', [
            'tools' => $tools,
            'project' => $project
        
        ]); 

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        
        $tools = Tool::orderBy('id', 'desc')->get();
        return view('admin.project_tools.create', [
            'tools' => $tools,
            'project' => $project
        
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
{
    // validasi input
    $validated = $request->validate([
        'tool_id' => 'required|integer|exists:tools,id',
    ]);

    DB::beginTransaction();
    try {
        // tambahkan project_id
        $validated['project_id'] = $project->id;

        ProjectTool::updateOrCreate($validated);

        DB::commit();

        return redirect()->back()->with('success', 'New tool has been assigned to the project.');
    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()
 ->with('error', 'Failed to assign tool. Please try again.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(ProjectTool $projectTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectTool $projectTool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectTool $projectTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectTool $projectTool)
    {
        try{

            $projectTool->delete();
            return redirect()->back()->with('Succesfully Delete', 'File has been Deleted');

        }catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with('Failed Delete', 'File Has failed Deleted');

        }
    }
}
