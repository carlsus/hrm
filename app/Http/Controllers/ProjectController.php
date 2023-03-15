<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
   {
       return view('projects.index');
   }

   public function allProjects(Request $request)
   {
       $columns = array(
           0 =>'project_name',
           1 =>'location',
           2 =>'options'
       );

       $totalData = Project::count();

       $totalFiltered = $totalData;

       $limit = $request->input('length');
       $start = $request->input('start');
       $order = $columns[$request->input('order.0.column')];
       $dir = $request->input('order.0.dir');

       if(empty($request->input('search.value')))
       {
       $proj = Project::offset($start)
               ->limit($limit)
               ->orderBy($order,$dir)
               ->get();
       }
       else {
       $search = $request->input('search.value');

       $proj =  Project::where('project_name','LIKE',"%{$search}%")
                   ->offset($start)
                   ->limit($limit)
                   ->orderBy($order,$dir)
                   ->get();

       $totalFiltered = Project::where('project_name','LIKE',"%{$search}%")
                   ->count();
       }

       $data = array();
       if(!empty($proj))
       {
           foreach ($proj as $value)
           {


               $nestedData['project_name'] = $value->project_name;
               $nestedData['location'] = $value->location;
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

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(ProjectRequest $request)
   {

        $data = $request->all();
        if($request->has('permanent')){
            $permanent=1;
        }else{
            $permanent=0;
        }
        $data['permanent']=$permanent;

        $request->user()->project()->create($data);
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
       $proj = Project::find($id);
       return response()->json($proj);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(ProjectRequest $request)
   {
       Project::findOrFail($request->id)->update($request->all());

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
       Project::find($id)->delete();
       return response()->json(['success'=>'Data deleted successfully.']);
   }
}
