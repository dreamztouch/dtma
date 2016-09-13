<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Ambulance;

use Session;

class AmbulanceController extends Controller
{

    /*public function __construct(){
        $this->middleware('auth');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambulances = Ambulance::all();
        return view('ambulance.index')->withAmbulances($ambulances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ambulance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Data
        $this->validate($request, [
            'organization_name' => [
                'required',
                'max: 255',
                'regex: /^[a-zA-Z .\-]+$/'
            ],
            'area' => [
                'required',
                'max:255',
                'regex: /^[a-zA-Z .\-]+$/'
            ]       
        ]);

        $ambulance = new Ambulance;
        $ambulance->organization_name = $request->organization_name;
        $ambulance->contact = $request->contact;
        $ambulance->area = $request->area;
        $ambulance->city = $request->city;

        $ambulance->save();

        Session::flash('success', 'Ambulance Information Saved Successfully');
        return redirect()->route('ambulance.show', $ambulance->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ambulance = Ambulance::find($id);
        return view('ambulance.show')->withAmbulance($ambulance);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ambulance = Ambulance::find($id);
        return view('ambulance.edit')->withAmbulance($ambulance);
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
        // Validate Data
        $this->validate($request, [
            'organization_name' => [
                'required',
                'max: 255',
                'regex: /^[a-zA-Z .\-]+$/'
            ],
            'area' => [
                'required',
                'max:255',
                'regex: /^[a-zA-Z .\-]+$/'
            ]       
        ]);

        // Save data to database
        $ambulance = Ambulance::find($id);

        $ambulance->organization_name = $request->input('organization_name');
        $ambulance->contact = $request->input('contact');
        $ambulance->area = $request->input('area');
        $ambulance->city = $request->input('city');

        $ambulance->save();

        Session::flash('success', 'Ambulance inforamtion update successfully');
        return redirect()->route('ambulance.show', $ambulance->id);
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

    public function AmbulanceEdit(){
        $ambulances = Ambulance::all();
        return view('ambulance.editall')->withAmbulances($ambulances);
    }

    public function AmbulanceDelete(){
        $ambulances = Ambulance::all();
        return view('ambulance.deleteall')->withAmbulances($ambulances);
    }
}
