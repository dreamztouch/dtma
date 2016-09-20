<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bloodbank;

use Session;

use Illuminate\Support\Facades\Input;

class BloodbankController extends Controller
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
        $bloodbanks = Bloodbank::all();
        return view('bloodbank.index')->withBloodbanks($bloodbanks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bloodbank.create');
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
            'bloodbank_name' => [
                'required',
                'max: 255',
                'regex: /^[a-zA-Z .\-]+$/'
            ],
            'location' => 'required | max:255',
            'area' => [
                'required',
                'max:255',
                'regex: /^[a-zA-Z .\-]+$/'
            ],
            'bloodbank_email' => 'email',
            'bloodbank_website' => [
                'regex: /^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&amp;?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/'
            ]        
        ]);

        $bloodbank = new Bloodbank;
        $bloodbank->bloodbank_name = $request->bloodbank_name;
        $bloodbank->location = $request->location;
        $bloodbank->area = $request->area;
        $bloodbank->city = $request->city;
        $bloodbank->contact = $request->contact;
        $bloodbank->bloodbank_email = $request->bloodbank_email;
        $bloodbank->bloodbank_web = $request->bloodbank_website;

        $bloodbank->save();

        Session::flash('success', 'Blood Bank Information Saved Successfully');
        return redirect()->route('bloodbank.show', $bloodbank->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bloodbank = Bloodbank::findOrFail($id);
        return view('bloodbank.show')->withBloodbank($bloodbank);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bloodbank = Bloodbank::find($id);
        return view('bloodbank.edit')->withBloodbank($bloodbank);
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
            'bloodbank_name' => [
                'required',
                'max: 255',
                'regex: /^[a-zA-Z .\-]+$/'
            ],
            'location' => 'required | max:255',
            'area' => [
                'required',
                'max:255',
                'regex: /^[a-zA-Z .\-]+$/'
            ],
            'bloodbank_email' => 'email',
            'bloodbank_web' => [
                'regex: /^(([\w]+:)?\/\/)?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&amp;?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/'
            ]        
        ]);

        // Save data to database
        $bloodbank = Bloodbank::find($id);

        $bloodbank->bloodbank_name = $request->input('bloodbank_name');
        $bloodbank->location = $request->input('location');
        $bloodbank->area = $request->input('area');
        $bloodbank->city = $request->input('city');
        $bloodbank->contact = $request->input('contact');
        $bloodbank->bloodbank_email = $request->input('bloodbank_email');
        $bloodbank->bloodbank_web = $request->input('bloodbank_web');

        $bloodbank->save();

        Session::flash('success', 'Blood bank inforamtion update successfully');
        return redirect()->route('bloodbank.show', $bloodbank->id);
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
            $bloodbank = Bloodbank::find($id);
            $bloodbank->delete();
            Session::flash('success', 'Successfully trash Blood Bank information');
            return redirect()->route('bloodbank.index');
        }

        elseif(Input::get('delete')) {
            $bloodbank = Bloodbank::find($id);
            $bloodbank->forceDelete();
            Session::flash('success', 'Successfully delete Blood Bank information');
            return redirect()->route('bloodbank.index');
        }
    }


    public function bloodbankSelectedDelete(){
        $data = Input::get('checkItem');
        $array_length = count($data);
        

        //check which submit was clicked on
        if(Input::get('trash')) {
            for($start = 0; $start < $array_length; $start++){
                $bloodbank = Bloodbank::find($data[$start]);
                $bloodbank->delete();
            }
            Session::flash('success', 'Successfully trash Blood Bank information');
            return redirect()->route('bloodbank.index');
        } 
        elseif(Input::get('delete')) {
            for($start = 0; $start < $array_length; $start++){
                $bloodbank = Bloodbank::find($data[$start]);
                $bloodbank->forceDelete();
            }
            Session::flash('success', 'Successfully delete Blood Bank information');
            return redirect()->route('bloodbank.index');
        }
    }

    public function BloodbankEdit(){
        $bloodbanks = Bloodbank::all();
        return view('bloodbank.editall')->withBloodbanks($bloodbanks);
    }

    public function BloodbankDelete(){
        $bloodbanks = Bloodbank::all();
        return view('bloodbank.deleteall')->withBloodbanks($bloodbanks);
    }

    public function BloodbankDeleteSingle($id){
        $bloodbank = Bloodbank::find($id);;
        return view('bloodbank.delete')->withBloodbank($bloodbank);
    }

    public function BloodbankDeletedData(){
        $bloodbanks = Bloodbank::onlyTrashed()->get();
        return view('bloodbank.deleteddata')->withBloodbanks($bloodbanks);
    }

    public function BloodbankRestoreSingle($id){
        Bloodbank::withTrashed()
        ->where('id', $id)
        ->restore();
        $bloodbank = Bloodbank::find($id);
        Session::flash('success', 'This Data Successfully Restored');
        return view('bloodbank.restore')->withBloodbank($bloodbank);
    }

    public function bloodbankSelectedRestore(){
        $data = Input::get('checkItem');
        $array_length = count($data);

        for($start = 0; $start < $array_length; $start++){
            Bloodbank::withTrashed()
            ->where('id', $data[$start])
            ->restore();
        }

        Session::flash('success', 'Successfully restored Blood Bank information');
        return redirect()->route('bloodbank.index');
    }
}
