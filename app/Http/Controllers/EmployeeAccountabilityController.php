<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Accountability;
use App\EmployeeAccountability;
use App\Http\Requests\EmployeeAccountabilityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeAccountabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeaccountabilities=EmployeeAccountability::with('employee','accountability')->get();
        return view('employeesaccountability.index',compact('employeeaccountabilities'));
    }

    // public function allAccountability(Request $request)
    // {
    //     $columns = array(
    //         0 =>'accountability_id',
    //         1 =>'employee_id',
    //         2 =>'options'
    //     );

    //     $totalData = EmployeeAccountability::count();

    //     $totalFiltered = $totalData;

    //     $limit = $request->input('length');
    //     $start = $request->input('start');
    //     $order = $columns[$request->input('order.0.column')];
    //     $dir = $request->input('order.0.dir');

    //     if(empty($request->input('search.value')))
    //     {
    //     $output = EmployeeAccountability::offset($start)
    //             ->limit($limit)
    //             ->orderBy($order,$dir)
    //             ->get();
    //     }
    //     else {
    //     $search = $request->input('search.value');

    //     $output =  EmployeeAccountability::offset($start)
    //                 ->limit($limit)
    //                 ->orderBy($order,$dir)
    //                 ->get();

    //     $totalFiltered = EmployeeAccountability::count();
    //     }

    //     $data = array();
    //     if(!empty($output))
    //     {
    //         foreach ($output as $value)
    //         {
    //             // $show =  route('crews.show',$value->id);
    //             // $edit =  route('crews.edit',$value->id);

    //             $nestedData['item'] = $value->accountability->name;
    //             $nestedData['employee'] = $value->employee->first_name . ' ' .$value->employee->last_name;
    //             $btn='';

    //             if (Auth::user()->hasPermissionTo('employee-accountability-delete')) //If user has this //permission
    //             {
    //                 $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";

    //             }
    //             $nestedData['options']=$btn;


    //             $data[] = $nestedData;

    //         }
    //     }

    //     $json_data = array(
    //         "draw"            => intval($request->input('draw')),
    //         "recordsTotal"    => intval($totalData),
    //         "recordsFiltered" => intval($totalFiltered),
    //         "data"            => $data
    //     );
    //     echo json_encode($json_data);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee['data'] = Employee::orderby("last_name","asc")
        ->select('id','first_name','last_name')
        ->get();
        $accountability['data'] = Accountability::orderby("name","asc")
        ->select('id','name')
        ->get();
        return  view('employeesaccountability.create',['employee' => $employee,'accountability' =>$accountability]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeAccountabilityRequest $request)
    {
        $data = $request->all();

        EmployeeAccountability::create($data);
        return response()->json(['success'=>'Data saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployeeAccountability  $employeeAccountability
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeAccountability $employeeAccountability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployeeAccountability  $employeeAccountability
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeAccountability $employeeAccountability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployeeAccountability  $employeeAccountability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeAccountability $employeeAccountability)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployeeAccountability  $employeeAccountability
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeeAccountability::find($id)->delete();
       return response()->json(['success'=>'Data deleted successfully.']);
    }
}
