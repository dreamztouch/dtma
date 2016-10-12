<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Hospital;

use Session;

use Illuminate\Support\Facades\Input;

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
            'hos_location' => 'required | max:255 | unique:hospitals,hos_location',
            'area' => [
                'required',
                'max:255',
                'regex: /^[a-zA-Z .\-]+$/',
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
        if(Input::get('trash')) {
            $hospital = Hospital::find($id);
            $hospital->delete();
            Session::flash('success', 'Successfully trash Hospital information');
            return redirect()->route('hospital.index');
        }

        elseif(Input::get('delete')) {
            $hospital = Hospital::find($id);
            $hospital->forceDelete();
            Session::flash('success', 'Successfully delete Hospital information');
            return redirect()->route('hospital.index');
        }
    }

    public function HospitalEdit(){
        $hospitals = Hospital::all();
        return view('hospital.editall')->withHospitals($hospitals);
    }

    public function HospitalDelete(){
        $hospitals = Hospital::all();
        return view('hospital.deleteall')->withHospitals($hospitals);
    }

    public function HospitalDeleteSingle($id){
        $hospital = Hospital::find($id);;
        return view('hospital.delete')->withHospital($hospital);
    }

    public function HospitalDeletedData(){
        $hospitals = Hospital::onlyTrashed()->get();
        return view('hospital.deleteddata')->withHospitals($hospitals);
    }

    public function HospitalRestoreSingle($id){
        Hospital::withTrashed()
        ->where('id', $id)
        ->restore();
        $hospital = Hospital::find($id);
        Session::flash('success', 'This Data Successfully Restored');
        return view('hospital.restore')->withHospital($hospital);
    }

    public function hospitalSelectedDelete(){
        $data = Input::get('checkItem');
        $array_length = count($data);
        

        //check which submit was clicked on
        if(Input::get('trash')) {
            for($start = 0; $start < $array_length; $start++){
                $hospital = Hospital::find($data[$start]);
                $hospital->delete();
            }
            Session::flash('success', 'Successfully trash Hospital information');
            return redirect()->route('hospital.index');
        } 
        elseif(Input::get('delete')) {
            for($start = 0; $start < $array_length; $start++){
                $hospital = Hospital::find($data[$start]);
                $hospital->forceDelete();
            }
            Session::flash('success', 'Successfully delete Hospital information');
            return redirect()->route('hospital.index');
        }
    }

    public function hospitalSelectedRestore(){
        $data = Input::get('checkItem');
        $array_length = count($data);

        for($start = 0; $start < $array_length; $start++){
            Hospital::withTrashed()
            ->where('id', $data[$start])
            ->restore();
        }

        Session::flash('success', 'Successfully restored Hospital information');
        return redirect()->route('hospital.index');
    }
}
