<?php

namespace App\Http\Controllers;

use App\Deduction;
use Illuminate\Http\Request;
use App\Http\Requests\DeductionRequest;
use Illuminate\Support\Facades\Auth;

class DeductionController extends Controller
{

   public function index()
   {
       return view('deductions.index');
   }

   public function allDeductions(Request $request)
   {
       $columns = array(
           0 =>'Deduction',
           1 =>'Amount',
           2 =>'options'
       );

       $totalData = Deduction::count();

       $totalFiltered = $totalData;

       $limit = $request->input('length');
       $start = $request->input('start');
       $order = $columns[$request->input('order.0.column')];
       $dir = $request->input('order.0.dir');

       if(empty($request->input('search.value')))
       {
       $deductions = Deduction::offset($start)
               ->limit($limit)
               ->orderBy($order,$dir)
               ->get();
       }
       else {
       $search = $request->input('search.value');

       $deductions =  Deduction::where('deduction','LIKE',"%{$search}%")
                   ->offset($start)
                   ->limit($limit)
                   ->orderBy($order,$dir)
                   ->get();

       $totalFiltered = Deduction::where('deduction','LIKE',"%{$search}%")
                   ->count();
       }

       $data = array();
       if(!empty($deductions))
       {
           foreach ($deductions as $deduction)
           {


               $nestedData['deduction'] = $deduction->deduction;
               $nestedData['amount'] = $deduction->amount;
               $btn='';
               //if (Auth::user()->hasPermissionTo('departments-edit'))                 {
                   $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$deduction->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
               //}
               //if (Auth::user()->hasPermissionTo('departments-delete'))                 {
                   $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$deduction->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
               //}
               $nestedData['options']=$btn;


               $data[] = $nestedData;

           }
       }

       $json_data = array(
           "draw"            => intval($request->input('draw')),
           "recordsTotal"    => intval($totalData),
           "recordsFiltered" => intval($totalFiltered),
           "data"            => $data
           );

       echo json_encode($json_data);
   }
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('departments.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(DeductionRequest $request)
   {

       $request->user()->deduction()->create($request->all());
       return response()->json(['success'=>'Data saved successfully.']);
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
       $department = Deduction::find($id);
       return response()->json($department);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(DeductionRequest $request)
   {
       Deduction::findOrFail($request->id)->update($request->all());

       return response()->json(['success' => 'Data is successfully updated']);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Deduction::find($id)->delete();
       return response()->json(['success'=>'Data deleted successfully.']);
   }
}
