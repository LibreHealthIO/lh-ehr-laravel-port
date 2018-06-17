<?php
/*
|--------------------------------------------------------------------------
| Report generator controller.
|--------------------------------------------------------------------------
|
| This is the main controller for this report generator module.
|
| @author Tigpezeghe Rodrige K. <tigrodrige@gmail.com>
| Copyright 2018 Tigpezeghe Rodrige K. <tigrodrige@gmail.com>
|
*/

namespace Modules\ReportGenerator\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

//use Modules\ReportGenerator\Entities\ReportFormat as ReportFormat;
use Modules\ReportGenerator\Entities\DraggableComponent as DraggableComponent;

class ReportGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $draggable_components = DraggableComponent::all();
        return view('reportgenerator::index')->with('draggable_components', $draggable_components);
    }

    /**
     * This function gets the selected components and sends them to them
     * to the showReport() function to get the data and show the report.
     * @return Response
     */
    public function getComponents(Request $request)
    {
        $option_ids = $request->ids; // returns an array

        // Get protocol and host to redirect users.
        $protocol_host = 'http://' . $_SERVER['HTTP_HOST'];
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            $protocol_host = 'https://' . $_SERVER['HTTP_HOST'];
        }

        $option_ids = serialize($option_ids);
        return response()->json([
            'redirecturl' => $protocol_host.'/reportgenerator/report/'.$option_ids,
            'success' => 'Received IDs',
            'option_ids' => $option_ids
        ]);
    }

    /**
     * Use option_ids from getComponents() above,
     * get data and show the generated report.
     * @param Array $option_ids : selected draggable_components
     * @return Response
     *
     * @TODO:
     * 1. use ids to get the draggable components notes
     * 2. use notes to get the table columns
     * 3. Get the data from each column
     * 4. send the data to the view
     */
    public function showReport($option_ids)
    {
        $option_ids = unserialize($option_ids);
        $num_of_components = count($option_ids);
        $notes = []; // store the notes for each dragged component.
        $column_list = []; // store an array of lists of columns for each note in an array.
        for ($i = 0; $i < $num_of_components; $i++) {
            $notes[$i] = DraggableComponent::where('option_id', $option_ids[$i])->first(); // get the notes for each component
            $column_list[$i] = explode(':', $notes[$i]->note);
        }

        $data = []; // store the retrieved data
        foreach ($column_list as $columns) { // $columns has the list of columns for each component.
            for($i = 0; $i < count($columns); $i++) {
                // Note: $column[0] always carries the table name
                // SELECT $colum
            }
        }

        return view('reportgenerator::report')->with(['option_ids' => $option_ids, 'notes' => $notes, 'column_list' => $column_list]);
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
