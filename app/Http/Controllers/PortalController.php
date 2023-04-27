<?php

namespace App\Http\Controllers;

use App\CashAdvance;
use App\Payslip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('portal.index');
    }

    public function payslip(){
        return view('portal.payslip');
    }
    public function cashadvance(){
        return view('portal.cashadvance');
    }
    public function myCashAdvance(Request $request)
    {
        $columns = array(

            0 =>'deduction_date',
            1 =>'amount',
            2 =>'status',
            3 =>'employee_id'
        );

        $totalData = CashAdvance::where('employee_id','=',Auth::id())->count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
         $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = CashAdvance::where('employee_id','=',Auth::id())
        ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  CashAdvance::where('employee_id','=',Auth::id())
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = CashAdvance::where('employee_id','=',Auth::id())
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {



                $nestedData['deduction_date'] = $value->deduction_date;
                $nestedData['status'] = $value->status;

                $nestedData['amount'] = $value->amount;
                $nestedData['description'] = $value->description;
                $nestedData['employee_id'] = $value->employee_id;


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
    public function myPayslips(Request $request)
    {
        $columns = array(
            0 =>'date_start',
            1 =>'date_end'
        );

        $totalData = Payslip::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Payslip::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Payslip::where('date_start','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Payslip::where('date_start','LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {


                $nestedData['date_start'] = $value->date_start;
                $nestedData['date_end'] = $value->date_end;
                $btn='';
                //if (Auth::user()->hasPermissionTo('departments-edit'))                 {
                 //  $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$department->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                //}
                //if (Auth::user()->hasPermissionTo('departments-delete'))                 {
                //    $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$department->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


}
