<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bloodbank;

use Session;

class BloodbankController extends Controller
{
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
        $bloodbank = Bloodbank::find($id);
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

    public function BloodbankEdit(){
        $bloodbanks = Bloodbank::all();
        return view('bloodbank.editall')->withBloodbanks($bloodbanks);
    }
}
