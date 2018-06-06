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

        /* foreach ($draggableComponents as $draggableComponent) {
            print_r($draggableComponent->title);
            echo '<br>';
        }

        return view('reportgenerator::index'); */
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
