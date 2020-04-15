<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suppliers;
use App\Supply;
use App\Blocks;
use App\Sawn;
use Illuminate\Support\Facades\DB;



class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sup = DB::SELECT("SELECT suppliers.id, suppliers.supplier_name, sum(supply.blocks_count) as 'blocks_count', sum(supply.price) as 'price', sum(supply.paid) as 'paid' FROM suppliers inner JOIN supply on suppliers.id = supply.supplier_id  group by suppliers.supplier_name");
        $sup = DB::table('suppliers')->leftjoin('supply', 'suppliers.id', '=', 'supply.supplier_id')->select('suppliers.*', DB::raw('SUM(supply.price) as marble_price'), DB::raw('SUM(supply.blocks_count) as blocks_count'), DB::raw('SUM(supply.paid) as paid') )->groupBy('suppliers.id')->get();

        // dd($sup);
        return view('supplier.show', compact('sup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Suppliers::all();
        return view("supplier.add", compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input('blocks_count'));
        $supplier_id = $request->input('select_supplier_name');
        //add new supplier if the select value equals new
        if($request->input('select_supplier_name') == 'new'){
            $supplier = new Suppliers();
            $supplier->supplier_name = $request->input('supplier_name');
            $result = $supplier->save();
            $supplier_id = $supplier->id;
        }
        $supply = new Supply();
        $supply->supplier_id = $supplier_id;
        $supply->blocks_count = $request->input('blocks_count');
        $supply->price = $request->input('marblePrice');
        $supply->paid = $request->input('paid');
        $supply->save();

        
        
        // var_dump($supplier_blocks_count->items[0]['blocks_count']);
        // var_dump($supplier_blocks_count->blocks_count);

        for($i=0; $i < $request->input('blocks_count'); $i++)
        {
            $supplier_blocks_count = DB::table("blocks")->select(DB::raw('count(blocks.id) as blocks_count'))->groupBy('supplier_id')->having('supplier_id', '=', $supplier_id)->first();
            $block = new Blocks();
            $block->supplier_id = $supplier_id;
            if(isset($supplier_blocks_count->blocks_count))
                $block->block_code = ($supplier_blocks_count->blocks_count + 1)."/".$supplier_id;
            else
                $block->block_code = "1/".$supplier_id;
            $block->type = ($request->input('block_type')[$i]);
            $block->length = ($request->input('block_length')[$i]);
            $block->width = ($request->input('block_width')[$i]);
            $block->height = ($request->input('block_height')[$i]);
            $block->save();
        }
        return redirect(route('suppliers.index'));

        // $request->validate([
        //     'supName' => 'required',
        //     'marbleType' => 'required',
        //     'marblePrice' => 'required',
        //     'marbleCode' => 'required',
        //     'paid' => 'required'
        // ]);
        // $data = new Suppliers;
        // $data->supplier_name = $request->input('supName');
        // $data->marble_type   = $request->input('marbleType');
        // $data->marble_price  = $request->input('marblePrice');
        // $data->marble_code   = $request->input('marbleCode');
        // $data->paid          = $request->input('paid');
        // $data->rest          = $request->input('marblePrice') - $request->input('paid');
        // $data->save();
        // return redirect(route('suppliers.index'));
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
        // $supplier = DB::table('suppliers')->leftjoin('supply', 'suppliers.id', '=', 'supply.supplier_id')->select('suppliers.*', DB::raw('SUM(supply.price) as marble_price'), DB::raw('SUM(supply.blocks_count) as blocks_count'), DB::raw('SUM(supply.paid) as paid') )->groupBy('suppliers.id')->first();
        // dd($supplier);
        $res = Suppliers::findOrFail($id);
        return view("supplier.edit2", compact(['res']));
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
        $update = Suppliers::find($id);
        $update->supplier_name  = $request->input('supName');
        $update->save();
        return redirect(route('suppliers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Suppliers::findOrFail($id);

        $supplies = Supply::all()->where('supplier_id', '=', $id);
        if($supplies)
        {
            foreach($supplies as $supply)
                $supply->delete();
        }
        $blocks = Blocks::all()->where('supplier_id', '=', $id);
        if($blocks){
            foreach($blocks as $block)
            {
                $sawns = Sawn::all()->where('block_id', '=', $block->id);
                if($sawns){
                    foreach($sawns as $sawn)
                    $sawn->delete();
                }
                $block->delete();
            }
        }
        $delete->delete();
        return redirect(route('suppliers.index'));
    }

    //get only sawn blocks of specific user
    public function getBlocksData($id){
        
        $blocks = DB::table('suppliers')
            ->join('blocks', 'suppliers.id', '=', 'blocks.supplier_id')
            ->join('sawn', 'blocks.id', '=', 'sawn.block_id')
            ->select('suppliers.supplier_name', 'blocks.type', 'blocks.block_code', 'blocks.length', 'blocks.width', 'blocks.height', 'sawn.count_2cm', 'sawn.count_3cm', 'blocks.id')
            ->where('suppliers.id', '=', $id)
            ->get();

        if($blocks){
            (print_r(json_encode($blocks)));
        }else
        echo "There's no data to display";

    }
    //get all blocks of specific user
    public function getAllBlocksData($id){
        
        $blocks = DB::table('suppliers')
            ->join('blocks', 'suppliers.id', '=', 'blocks.supplier_id')
            ->select('suppliers.supplier_name', 'blocks.type', 'blocks.block_code', 'blocks.length', 'blocks.width', 'blocks.height',  'blocks.id')
            ->where('suppliers.id', '=', $id)
            ->get();

        if($blocks){
            (print_r(json_encode($blocks)));
        }else
        echo "There's no data to display";

    }

}
