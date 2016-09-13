<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Hospital;

use Session;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return view('hospital.index')->withHospitals($hospitals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospital.create');
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
            'hospital_name' => [
                'required',
                'max: 255',
                'regex: /^[a-zA-Z .\-]+$/'
            ],
            'hos_location' => 'required | max:255',
            'area' => [
                'required',
                'max:255',
                'regex: /^[a-zA-Z .\-]+$/'
            ]      
        ]);

        $hospital = new Hospital;
        $hospital->hospital_name = $request->hospital_name;
        $hospital->category = $request->category;
        $hospital->hos_speciality = $request->hos_speciality;
        $hospital->hos_location = $request->hos_location;
        $hospital->area = $request->area;
        $hospital->city = $request->city;
        $hospital->contact = $request->contact;

        $hospital->save();
        Session::flash('success', 'Hospital Information Saved Successfully');
        return redirect()->route('hospital.show', $hospital->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = Hospital::find($id);
        return view('hospital.show')->withHospital($hospital);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = Hospital::find($id);
        return view('hospital.edit')->withHospital($hospital);
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
            'hospital_name' => [
                'required',
                'max: 255',
                'regex: /^[a-zA-Z .\-]+$/'
            ],
            'hos_location' => 'required | max:255',
            'area' => [
                'required',
                'max:255',
                'regex: /^[a-zA-Z .\-]+$/'
            ]      
        ]);

        // Save data to database
        $hospital = Hospital::find($id);

        $hospital->hospital_name = $request->hospital_name;
        $hospital->category = $request->category;
        $hospital->hos_speciality = $request->hos_speciality;
        $hospital->hos_location = $request->hos_location;
        $hospital->area = $request->area;
        $hospital->city = $request->city;
        $hospital->contact = $request->contact;

        $hospital->save();

        Session::flash('success', 'Hospital inforamtion update successfully');
        return redirect()->route('hospital.show', $hospital->id);
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

    public function HospitalEdit(){
        $hospitals = Hospital::all();
        return view('hospital.editall')->withHospitals($hospitals);
    }

    public function HospitalDelete(){
        $hospitals = Hospital::all();
        return view('hospital.deleteall')->withHospitals($hospitals);
    }
}
