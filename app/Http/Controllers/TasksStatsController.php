<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksStatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*********************************
         *method moved to model #SOLID Principle#
        $taskArchives = Task::selectRaw(
            'year(created_at) as year_created,
            month(created_at) as month_number_created, 
            monthname(created_at) as month_name_created, 
            count(*) as total_per_month')
            ->groupBy('year_created', 'month_number_created', 'month_name_created')
            ->orderBy('month_number_created', 'DESC')
            ->get();
         *********************************/ 
        
        //Using regular approach (i.e. get view data, pass it to the view)
        //$taskArchives = Task::getTaskArchives();
        //return view('tasksstats.index', compact('taskArchives'));
        
        //Using View Composer (i.e. view data is injected by a service when the view is rendered)
        return view('tasksstats.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
