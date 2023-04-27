<?php

namespace App\Http\Controllers;

use App\CashAdvance;
use App\Employee;
use App\Http\Requests\CashAdvanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class CashAdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee['data'] = Employee::orderby("last_name","asc")
        			   ->select('id','first_name','last_name')
        			   ->get();

        return  view('cashadvances.index',['employee' => $employee]);
    }


    public function allCashAdvances(Request $request)
    {
        $columns = array(

            0 =>'deduction_date',
            1 =>'amount',
            2 =>'status',
            3 =>'employee_id',
            4 =>'options'
        );

        $totalData = CashAdvance::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = CashAdvance::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  CashAdvance::where('date_created', 'LIKE',"%{$search}%")
                    ->orWhere('deduction_date', 'LIKE',"%{$search}%")
                    ->orWhere('amount', 'LIKE',"%{$search}%")
                    ->orWhere('status', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = CashAdvance::where('date_created', 'LIKE',"%{$search}%")
                    ->orWhere('deduction_date', 'LIKE',"%{$search}%")
                    ->orWhere('amount', 'LIKE',"%{$search}%")
                    ->orWhere('status', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {
                // $show =  route('crews.show',$value->id);
                // $edit =  route('crews.edit',$value->id);


                $nestedData['employee'] = $value->employee->last_name .', ' . $value->employee->first_name;
                $nestedData['deduction_date'] = $value->deduction_date;
                $nestedData['status'] = $value->status;

                $nestedData['amount'] = $value->amount;
                $btn='';
                //if (Auth::user()->hasPermissionTo('crew-management-edit')) //If user has this //permission
                //{
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                    //}
                //if (Auth::user()->hasPermissionTo('crew-management-delete')) //If user has this //permission
                //{
                    $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";

                //}
                $nestedData['options']=$btn;
                // if (Auth::user()->hasPermissionTo('applicant-can-delete')) //If user has this //permission
                // {
                //     $nestedData['options'] = "<a href='".route('crews.show',$value->id)."' data-toggle='tooltip'  data-id='".$value->id."' title='Show' class='btn btn-default far fa-eye'></a>
                //     <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
                // }

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

    public function create()
    {
        $employee['data'] = Employee::orderby("last_name","asc")
        ->select('id','first_name','last_name')
        ->get();

        return  view('cashadvances.create',['employee' => $employee]);
    }

    public function store(CashAdvanceRequest $request)
    {

        $data = $request->all();



        $data['date_created']=Carbon::now();

        CashAdvance::create($data);


        return response()->json(['success'=>'Data saved successfully.']);
    }

    public function edit($id)
    {


        $cashadvance = CashAdvance::find($id);


        return response()->json($cashadvance);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CashAdvanceRequest $request)
    {
        CashAdvance::findOrFail($request->id)->update($request->all());

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
        $delete=CashAdvance::find($id);
        $delete->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
