<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $custData = Customer::all();
        return view('customers.show', compact('custData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addNewWork = new Customer;
        $addNewWork->cust_name    = $request->input('cusName');
        $addNewWork->service_type = $request->input('serviceType');
        $addNewWork->marble_type  = $request->input('marbleType');
        $addNewWork->work_amount  = $request->input('amount');
        $addNewWork->scale_tall   = $request->input('height');
        $addNewWork->scale_width  = $request->input('width');
        $addNewWork->cost         = $request->input('cost');
        $addNewWork->paid         = $request->input('paid');
        $addNewWork->save();

        return redirect(route('customers.index'));
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
       $customer = Customer::findOrFail($id);
       return view('customers.edit', compact('customer'));
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
        $customer = Customer::findOrFail($id);
        $customer->cust_name = $request->input('cusName');
        $customer->service_type = $request->input('serviceType');
        $customer->marble_type = $request->input('marbleType');
        $customer->work_amount = $request->input('amount');
        $customer->scale_tall = $request->input('height');
        $customer->scale_width = $request->input('width');
        $customer->cost = $request->input('cost');
        $customer->paid = $request->input('paid');
        $customer->save();
        return redirect(route('customers.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        if($customer)
            $customer->delete();
        return redirect(route('customers.index'));
    }
}
