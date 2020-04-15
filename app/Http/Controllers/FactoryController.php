<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factory;

class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fac = Factory::all();
        return view('factory.show', compact('fac'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("factory.add");
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
            'marbleType'  => 'required' ,
            'marblePrice' => 'required'
        ],[
         "marbleType.required" => "هذه الحقل اجبارى",
         "marblePrice.required" => "هذه الحقل اجبارى"
        ]); 
        $data = new Factory;
        $data->type = $request->input('marbleType');
        $data->color = $request->input('marbleColor');
        $data->price = $request->input('marblePrice');
        $data->save();
        return redirect(route('factories.index'));
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
        $data = Factory::find($id);
        return view("factory.edit", compact("data"));
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
        $update = Factory::find($id);
        $update->type  = $request->input('marbleType');
        $update->color  = $request->input('marbleColor');
        $update->price = $request->input('marblePrice');
        $update->save();
        return redirect(route('factories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Factory::findorfail($id);
        $delete->delete();
        return redirect(route('factories.index'));
    }
}
