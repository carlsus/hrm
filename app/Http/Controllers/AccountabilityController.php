<?php

namespace App\Http\Controllers;

use App\Accountability;
use Illuminate\Http\Request;

use App\Http\Requests\AccountabilityRequest;
use Illuminate\Support\Facades\Auth;

class AccountabilityController extends Controller
{
    public function index()
   {
       return view('accountabilities.index');
   }

   public function allAccountability(Request $request)
   {
       $columns = array(
           0 =>'Name',
           1 =>'options'
       );

       $totalData = Accountability::count();

       $totalFiltered = $totalData;

       $limit = $request->input('length');
       $start = $request->input('start');
       $order = $columns[$request->input('order.0.column')];
       $dir = $request->input('order.0.dir');

       if(empty($request->input('search.value')))
       {
       $accountability = Accountability::offset($start)
               ->limit($limit)
               ->orderBy($order,$dir)
               ->get();
       }
       else {
       $search = $request->input('search.value');

       $accountability =  Accountability::where('name','LIKE',"%{$search}%")
                  ->with('employees')
                   ->offset($start)
                   ->limit($limit)
                   ->orderBy($order,$dir)
                   ->get();

       $totalFiltered = Accountability::where('name','LIKE',"%{$search}%")
                   ->count();
       }

       $data = array();
       if(!empty($accountability))
       {
           foreach ($accountability as $value)
           {


               $nestedData['name'] = $value->name;
               $nestedData['description'] = $value->description;
                     $btn='';
               //if (Auth::user()->hasPermissionTo('departments-edit'))                 {
                   $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
               //}
               //if (Auth::user()->hasPermissionTo('departments-delete'))                 {
                   $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
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

   public function store(AccountabilityRequest $request)
   {

       $request->user()->accountability()->create($request->all());
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
       $accountability = Accountability::find($id);
       return response()->json($accountability);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(AccountabilityRequest $request)
   {
       Accountability::findOrFail($request->id)->update($request->all());

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
    Accountability::find($id)->delete();
       return response()->json(['success'=>'Data deleted successfully.']);
   }
}
