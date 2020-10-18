<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'required',
            'state' => 'required',
            'gender' => 'required',
        
        ]);
            if($request->hasFile('image')){
            $imagedata = $request->file('image');
            $images = date('Y-m-d').time().".".$imagedata->extension();
            $destination_path = public_path('/images');
            $imagedata->move($destination_path,$images); 
        }
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->images = 'images/'.$images;
        $customer->state = $request->state;
        $customer->gender = $request->gender;
        $customer->save();
        return redirect()->back()->with('message',' customer created  successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        $customer = customer::paginate(10);
        $customerdata = ['customer'=>$customer];
        return view('customerlist')->with('customerdata',$customerdata);
        return view('customerlist');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer,$id)
    {
        $customer = customer::find($id);
        return view('customeredit')->with('customer',$customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        $customer = customer::find($request->id);

        if($request->hasFile('image')){
            $imagedata = $request->file('image');
            $images = date('Y-m-d').time().".".$imagedata->extension();
            $destination_path = public_path('/images');
            $imagedata->move($destination_path,$images); 
             
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->images = 'images/'.$images;
            $customer->state = $request->state;
            $customer->gender = $request->gender;
            $customer->save();

            return redirect()->back()->with('message',' customer updated  successfully!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer,$id)
    {
        //  
        $customer = customer::find($id);
        $customer->delete();
        return redirect()->back()->with('message',' Deleted  successfully!');
    }
}
