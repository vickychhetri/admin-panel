<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Sample;
use App\Models\SampleName;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::with(['customer','sampleName'])->get();
        // $order;
        return view('order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = User::where('role_as', 'user')->get();
        $sample = SampleName::get();
        return view('order.add', compact('customer', 'sample'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sample = SampleName::with('sample')->where('type', $request->type)->get();
        
       foreach($sample as $sam){
        foreach($sam->sample as $item){
            Order::create([
                'user_id' => $request->customer_id,
                'type' => $request->type,
                'sample_id' => $sam->id,
                'sample_name' => $item->quantity,
            ]);
        }
            
       }

       return redirect()->route('order.index')->with('success', 'Orders successfully added');
        
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

    public function fetchSampleName(Request $request)
    {
        $data['sample'] = SampleName::where("type",$request->type)->get(["name", "id"]);
        return response()->json($data);
    }

    public function sampleApprove($id){
        $order = Order::where('id', $id)->update([
            'status' => 1
        ]);

        return redirect()->back();
    }

    public function sampleUnApprove($id){
        $order = Order::where('id', $id)->update([
            'status' => 2
        ]);

        return redirect()->back();
    }
} 
