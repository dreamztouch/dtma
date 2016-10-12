<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Ambulance;

use Session;

use Illuminate\Support\Facades\Input;

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
        if(Input::get('trash')) {
            $ambulance = Ambulance::find($id);
            $ambulance->delete();
            Session::flash('success', 'Successfully trash Ambulance information');
            return redirect()->route('ambulance.index');
        }

        elseif(Input::get('delete')) {
            $ambulance = Ambulance::find($id);
            $ambulance->forceDelete();
            Session::flash('success', 'Successfully delete Ambulance information');
            return redirect()->route('ambulance.index');
        }
    }

    public function ambulanceSelectedDelete(){
        $data = Input::get('checkItem');
        $array_length = count($data);
        

        //check which submit was clicked on
        if(Input::get('trash')) {
            for($start = 0; $start < $array_length; $start++){
                $ambulance = Ambulance::find($data[$start]);
                $ambulance->delete();
            }
            Session::flash('success', 'Successfully trash Blood Bank information');
            return redirect()->route('ambulance.index');
        } 
        elseif(Input::get('delete')) {
            for($start = 0; $start < $array_length; $start++){
                $ambulance = Ambulance::find($data[$start]);
                $ambulance->forceDelete();
            }
            Session::flash('success', 'Successfully delete Blood Bank information');
            return redirect()->route('ambulance.index');
        }
    }

    public function AmbulanceEdit(){
        $ambulances = Ambulance::all();
        return view('ambulance.editall')->withAmbulances($ambulances);
    }

    public function AmbulanceDelete(){
        $ambulances = Ambulance::all();
        return view('ambulance.deleteall')->withAmbulances($ambulances);
    }

    public function AmbulanceDeleteSingle($id){
        $ambulance = Ambulance::find($id);;
        return view('ambulance.delete')->withAmbulance($ambulance);
    }

    public function AmbulanceDeletedData(){
        $ambulances = Ambulance::onlyTrashed()->get();
        return view('ambulance.deleteddata')->withAmbulances($ambulances);
    }

    public function AmbulanceRestoreSingle($id){
        Ambulance::withTrashed()
        ->where('id', $id)
        ->restore();
        $ambulance = Ambulance::find($id);
        Session::flash('success', 'This Data Successfully Restored');
        return view('ambulance.restore')->withAmbulance($ambulance);
    }

    public function ambulanceSelectedRestore(){
        $data = Input::get('checkItem');
        $array_length = count($data);

        for($start = 0; $start < $array_length; $start++){
            Ambulance::withTrashed()
            ->where('id', $data[$start])
            ->restore();
        }

        Session::flash('success', 'Successfully restored Blood Bank information');
        return redirect()->route('ambulance.index');
    }
}
