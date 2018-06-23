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
use Illuminate\Support\Facades\DB;

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
     * @param Request $request : holds selected components
     * @return Response $protocol_host : holds protocol and host
     *                  $option_ids : holds option_ids of selected components
     */
    public function getComponents(Request $request)
    {
        $option_ids = $request->ids; // returns an array

        // Get protocol and host to redirect users.
        $protocol_host = 'http://' . $_SERVER['HTTP_HOST'];
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off')
            $protocol_host = 'https://' . $_SERVER['HTTP_HOST'];

        $option_ids = serialize($option_ids);
        return response()->json([
            'redirecturl' => $protocol_host.'/reportgenerator/report/'.$option_ids,
            'success' => 'Received Option IDs',
            'option_ids' => $option_ids
        ]);
    }

    /**
     * Use option_ids from getComponents() above,
     * get data and show the generated report.
     * @param Array $option_ids : selected draggable_components
     * @return Response $data : holds retrieved data
     */
    public function showReport($option_ids)
    {
        $option_ids = unserialize($option_ids);
        $notes = []; // store the notes for each dragged component.
        $column_list = []; // store an array of lists of columns for each note in an array.
        for ($i = 0; $i < count($option_ids); $i++) { // foreach $option_id
            $notes[$i] = DraggableComponent::where('option_id', $option_ids[$i])->first(); // get the notes for each component
            $column_list[$i] = explode(':', $notes[$i]->note); // split the each 'note string' and store in $column_list[]
        }

        $data = []; // store the retrieved data
        foreach ($column_list as $columns) { // $columns has the list of columns for each component.
            $table_name = $columns[0]; // get table name to which each column list points to.
            for($i = 1; $i < count($columns); $i++) {  // foreach list of columns
                $data[] = DB::connection('mysql_libreehr') // get the data, and append to $data[]
                    ->table($table_name)
                    ->select($columns[$i])
                    ->get()->toArray();
                //$data = collect($data);
            }
        }

        return view('reportgenerator::report')->with('data', $data);
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
