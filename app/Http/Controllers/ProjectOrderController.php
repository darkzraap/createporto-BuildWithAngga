<?php

namespace App\Http\Controllers;

use App\Models\ProjectOrder;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;

class ProjectOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = ProjectOrder::OrderBy('id' , 'desc')->get();
        return view('admin.orders.index' , ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectOrder $projectOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectOrder $projectOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectOrder $projectOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectOrder $projectOrder)
    {
        try{

            $projectOrder->delete();

            return redirect()->back()->with('Succesfully Delete', 'File has been Deleted');

        }catch(\Exception $e){

             DB::rollBack();

           return redirect()->back()->with('Succesfully Delete', 'File has been Deleted');

        }
    }
}
