<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\Sawn;
use App\Suppliers;
use App\Blocks;
use Illuminate\Support\Facades\DB;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('sawn')->join('blocks', 'sawn.block_id', '=', 'blocks.id')->join('suppliers', 'suppliers.id', '=', 'blocks.supplier_id')->get();
        // dd($data);
        return view('works.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Suppliers::all();
        
       return view('works.add', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getBlockCode($id)
    {
        $blocks = DB::table('blocks')
            ->leftjoin('sawn', 'blocks.id', '=', 'sawn.block_id')
            ->select('blocks.*', 'sawn.*')
            ->whereNull('sawn.count_2cm')
            ->whereNull('sawn.count_3cm')
            ->where('blocks.supplier_id','=',$id)
            ->get();
        
            if($blocks){
                (print_r(json_encode($blocks)));
            }else
            echo "There's no data to display";

    }
    public function store(Request $request)
    {
        $sawn = new Sawn();

        $sawn->block_id = $request->input('block_code');
        $sawn->t_length = $request->input('t_length');
        $sawn->t_width = $request->input('t_width');
        $sawn->count_2cm = $request->input('count_2cm');
        $sawn->count_3cm = $request->input('count_3cm');
        $sawn->save();
        
        return redirect(route('works.index'));
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

    public function showBlockEdit($id)
    {
        $blockdetails =  DB::table('suppliers')
            ->join('blocks', 'suppliers.id', '=', 'blocks.supplier_id')
            ->join('sawn', 'blocks.id', '=', 'sawn.block_id')
            ->select('suppliers.supplier_name', 'blocks.type', 'blocks.block_code', 'blocks.length', 'blocks.width', 'blocks.height', 'sawn.count_2cm', 'sawn.count_3cm', 'blocks.id')
            ->where('blocks.id', '=', $id)
            ->first();
        return view('works.editblockdetails', compact('blockdetails'));
    }

    public function updateBlock(Request $request, $id)
    {
        
        $updateSawn = Sawn::findorfail($id);
        $updateSawn->count_2cm = $request->input('count_2cm');
        $updateSawn->count_3cm = $request->input('count_3cm');
        $updateSawn->save();
        
        $updateBlock = Blocks::findorfail($id);
        $updateBlock->type = $request->input('block_type');
        $updateBlock->width = $request->input('block_width');
        $updateBlock->height = $request->input('block_height');
        $updateBlock->length = $request->input('block_length');
        $updateBlock->save();

        return redirect(route('suppliers.index'));
    }
    public function destroyBlock($id)
    {
        $sawn = Sawn::findOrfail($id);
        if($sawn)
            $sawn->delete();
        $block = Blocks::findOrFail($id);
        if($block)
            $block->delete();

        return redirect(route('suppliers.index'));

    } 
}
