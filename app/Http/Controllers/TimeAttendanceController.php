<?php

namespace App\Http\Controllers;

use App\TimeAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class TimeAttendanceController extends Controller
{
    public function index()
   {
       return view('timeattendances.index');
   }

   public function allTimeAttendances(Request $request)
   {
       $columns = array(
           0 =>'employee_id',
           1 =>'date_created',
           2 =>'IN AM',
           3 =>'Out AM',
           4 =>'In PM',
           5 =>'Out PM',
           6 =>'options',
       );

       $totalData = TimeAttendance::count();

       $totalFiltered = $totalData;

       $limit = $request->input('length');
       $start = $request->input('start');
       $order = $columns[$request->input('order.0.column')];
       $dir = $request->input('order.0.dir');

       if(empty($request->input('search.value')))
       {
       $ta = TimeAttendance::offset($start)
               ->limit($limit)
               ->orderBy($order,$dir)
               ->get();
       }
       else {
       $search = $request->input('search.value');

       $ta =  TimeAttendance::offset($start)
                   ->limit($limit)
                   ->orderBy($order,$dir)
                   ->get();

       $totalFiltered = TimeAttendance::count();
       }

       $data = array();
       if(!empty($ta))
       {
           foreach ($ta as $value)
           {

                $nestedData['employee'] = $value->employee;
               $nestedData['date_created'] = $value->date_created;
               $nestedData['in_am'] = $value->in_am;
               $nestedData['out_am'] = $value->out_am;
               $nestedData['in_pm'] = $value->in_pm;
               $nestedData['out_pm'] = $value->out_pm;
               $btn='';
            //    //if (Auth::user()->hasPermissionTo('departments-edit'))                 {
            //        $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
            //    //}
            //    //if (Auth::user()->hasPermissionTo('departments-delete'))                 {
            //        $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
            //    //}
            //    $nestedData['options']=$btn;


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
   public function employeeAttendances(Request $request)
   {
       $columns = array(
           0 =>'date_created',
           1 =>'IN AM',
           2 =>'Out AM',
           3 =>'In PM',
           5 =>'Out PM',
           6 =>'options',
       );

       $totalData = TimeAttendance::count();

       $totalFiltered = $totalData;

       $limit = $request->input('length');
       $start = $request->input('start');
       $order = $columns[$request->input('order.0.column')];
       $dir = $request->input('order.0.dir');

       if(empty($request->input('search.value')))
       {
       $ta = TimeAttendance::where('employee_id',Auth::user()->id)
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
       }
       else {
       $search = $request->input('search.value');

       $ta =  TimeAttendance::where('employee_id',Auth::user()->id)
                   ->offset($start)
                   ->limit($limit)
                   ->orderBy($order,$dir)
                   ->get();

       $totalFiltered = TimeAttendance::where('employee_id',Auth::user()->id)
                   ->count();
       }

       $data = array();
       if(!empty($ta))
       {
           foreach ($ta as $value)
           {


               $nestedData['date_created'] = $value->date_created;
               $nestedData['in_am'] = $value->in_am;
               $nestedData['out_am'] = $value->out_am;
               $nestedData['in_pm'] = $value->in_pm;
               $nestedData['out_pm'] = $value->out_pm;
               $btn='';
            //    //if (Auth::user()->hasPermissionTo('departments-edit'))                 {
            //        $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
            //    //}
            //    //if (Auth::user()->hasPermissionTo('departments-delete'))                 {
            //        $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
            //    //}
            //    $nestedData['options']=$btn;


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


   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
    $date=Carbon::now();
    $formatedDate = $date->format('Y-m-d');
    $current_date_time = Carbon::now()->toDateTimeString();

    $ctr=TimeAttendance::where([
        'date_created' => $formatedDate,
        'employee_id' => Auth::user()->id
    ])->count();

    if($ctr>=1){
        $rec=TimeAttendance::where([
            'date_created' => $formatedDate,
            'employee_id' => Auth::user()->id
        ])->first();
        if($rec['out_am']==null){
            $record=array('out_am' => $current_date_time);
                $rec->update($record);
        }elseif($rec['in_pm']==null){
            $record=array('in_pm' => $current_date_time);
                $rec->update($record);
        }else{
            $record=array('out_pm' => $current_date_time);
                $rec->update($record);
        }
        return response()->json(['success'=>'Data saved successfully.']);
    }else{

        $record=array(
                'date_created' => Carbon::now(),
                'in_am' => $current_date_time,
                'employee_id' => Auth::user()->id
                );
        TimeAttendance::create($record);
        return response()->json(['success'=>'Data saved successfully.']);
    }

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


}
