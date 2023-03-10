<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sample;
use App\Models\SampleName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = isset($request->search) ? $request->search : '';
        $sample = SampleName::Search($search)->paginate(isset($request->limit) ? $request->limit : 50);
        return view('sample.index', compact('sample','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sample.create');
    }
    public function datatable(Request $request)
    {
        $number = 50;
        if($request->value){
            $number = $request->value;
        }
        $sample = Sample::paginate($number);
        if($request->search){
            $sample = Sample::where('name','like','%'.$request->search.'%')->paginate($number);
        }
        return view('sample.datatable',compact('sample'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|integer|between:1,2',
            'name' => 'required|unique:sample_names',
            'quantity' => 'required',
        ]);
        $sample_name = SampleName::create([
            'name' => $request->name,
            'type' => $request->type,
        ]);
        $record = Sample::where('sample_id', $sample_name->id)->latest()->first();

            $num = ($record != null) ? substr($record->quantity, 2) : 0;
            for ($i = $num + 1; $i <= $request->quantity + $num; $i++) {
                $quantity = $i; 
                $sample = Sample::create([
                    'sample_id' => $sample_name->id,
                    'quantity' => 'CH'. $quantity,
                ]);
            }
      
        return redirect()->route('sample.index');

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
        $sample = Sample::findOrFail($id);
        return view('sample.edit', compact('sample'));
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
        $sample = Sample::findOrFail($id);
        $sample->update([
            // 'type' => $request->type,
            'name' => $request->name,
        ]);

        return redirect()->route('sample.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sample = Sample::findOrFail($id);
        $sample->delete();

        return redirect()->route('sample.index')->with('success', 'Sample Deleted Successfully');
    }
    
}
