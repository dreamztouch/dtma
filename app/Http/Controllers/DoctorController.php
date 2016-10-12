<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

use Illuminate\Support\Facades\Input;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
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
            'doctor_name' => [
                'required',
                'max: 255',
                'regex: /^[a-zA-Z . ()\-]+$/'
            ],
            'doctor_qualification' => [
                'required'
            ],
            'doctor_designation' => [
                'required'
            ]       
        ]);

        echo $request->doctor_name."<br>";
        echo $request->doctor_qualification."<br>";
        echo $request->doctor_designation."<br>";
        echo $request->doctor_expertise."<br>";
        echo $request->doctor_chamber."<br>";
        echo $request->day_from."-".$request->day_to."<br>";
        echo $request->available_time."<br>";
        echo $request->doctor_contact."<br>";
        echo $request->doctor_area."<br>";
        echo $request->doctor_district."<br>";
        echo $request->visiting_hospital."<br>";

        echo $request->doctor_organization."<br>";
        echo $request->doctor_professional_training."<br>";
        echo $request->doctor_working_experience."<br>";
        echo $request->doctor_award."<br>";
        echo $request->doctor_research."<br>";
        echo $request->doctor_membership."<br>";


        $data = Input::get('visiting_hospital_option');
        $array_length = count($data);

        if($array_length > 0){
            for($start = 0; $start < $array_length; $start++){
                echo $data[$start];
            }
        }

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
