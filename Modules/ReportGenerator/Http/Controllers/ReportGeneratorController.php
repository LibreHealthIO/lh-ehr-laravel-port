<?php
/*
|--------------------------------------------------------------------------
| Report generator controller.
|--------------------------------------------------------------------------
|
| This is the main controller for this report generator module.
| Copyright 2018 Tigpezeghe Rodrige K. <tigrodrige@gmail.com>
|
*/

namespace Modules\ReportGenerator\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\ReportGenerator\Entities\DraggableComponent as DraggableComponent;

class ReportGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $draggableComponents = DraggableComponent::all();
        return view('reportgenerator::index')->with('draggableComponents', $draggableComponents);
    }

    /**
     * Show the generated report.
     * @return Response
     */
    public function getComponents(Request $request)
    {
      $option_ids = $request->ids; // returns an array
      // use ids to get the draggable components notes
      // use notes to get the table columns
      // send the data to the view
      //return view('reportgenerator::report')->with('ids', $option_ids);
      $option_ids = serialize($option_ids);
      return response()->json([
          'redirecturl' => 'http://localhost:8000/reportgenerator/report/'.$option_ids,
          'success' => 'Received IDs',
          'option_ids' => $option_ids
      ]);
    }

    public function showReport($option_ids)
    {
      $option_ids = unserialize($option_ids);
      return view('reportgenerator::report')->with('option_ids', $option_ids);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('reportgenerator::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('reportgenerator::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('reportgenerator::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
