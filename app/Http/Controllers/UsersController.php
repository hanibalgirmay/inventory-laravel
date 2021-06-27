<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customers::sortable()->paginate(3);
        return view('customers.users', compact('customer'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            // 'first_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $fname = $request->get('first_name');
        $lname = $request->get('last_name');
        // customers::create($request->all());
        $_newData = new Customers([
            "full_name" => $fname . ' ' . $lname,
            "email" => $request->get('email'),
            "mobile" => $request->get('phone_number'),
            "mobile2" => $request->get('phone_number2'),
            "address" => $request->get('address'),
            "address2" => $request->get('address2'),
            "city" => $request->get('city'),
            "status" => $request->get('status'),
        ]);

        $_newData->save();

        // return dd($_newData);
        return Redirect::route('customers.index');;
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
