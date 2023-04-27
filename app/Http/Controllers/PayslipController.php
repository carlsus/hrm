<?php

namespace App\Http\Controllers;

use App\CashAdvance;
use App\Payslip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PayslipRequest;
use App\TimeAttendance;

class PayslipController extends Controller
{
    public function index()
    {
        return  view('payslips.index');
    }


    public function allPayslips(Request $request)
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


    public function getPayslips(Request $request){
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        // dd($date_end);
        $results = DB::select( DB::raw("

        select
            a.employee_id,
	        a.employee_name,
            round(coalesce(a.deduction,0),2) as deduction,
            round(
            coalesce(
            (
                select sum(e.amount) as advance from cash_advances e
                where e.employee_id=employee_id and e.deduction_date BETWEEN '$date_start' and '$date_end' and e.employee_id=a.employee_id
            ),0),2) as advance,
	        round(sum(a.total)* a.per_hour,2) as Gross,
	        round(sum(a.total)* a.per_hour -coalesce(a.deduction,0)-coalesce((
                select sum(e.amount) as advance from cash_advances e
                where e.employee_id=a.employee_id and e.deduction_date BETWEEN '$date_start' and '$date_end'
            ),0) ,2) as NetPay
        from vw_payslip a
        where a.date_created BETWEEN '$date_start' and '$date_end'
            group by a.employee_id,
	        a.employee_name,a.deduction
        ") );
        //Post::orderBy('id', 'DESC')->get();
        $data = array();
        if(!empty($results))
        {
            foreach ($results as $value)
            {


                $nestedData['employee_name'] = $value->employee_name;
                $nestedData['deduction'] = $value->deduction;
                $nestedData['advance'] = $value->advance;
                $nestedData['gross'] = $value->Gross;
                $nestedData['netpay'] = $value->NetPay;
                $data[] = $nestedData;

            }
        }
        $json_data = array(
            // "draw"            => intval($request->input('draw')),
            // "recordsTotal"    => intval($totalData),
            // "recordsFiltered" => intval($totalFiltered),
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

        return view('payslips.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PayslipRequest $request)
    {
        $id=$request->user()->payslip()->create($request->all())->id;

        TimeAttendance::whereBetween('date_created',[$request->date_start,$request->date_end])->update(['payslip_id'=>$id]);
        CashAdvance::whereBetween('deduction_date',[$request->date_start,$request->date_end])->update(['status'=>'Paid']);
        return response()->json(['success'=>'Data saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function show(Payslip $payslip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function edit(Payslip $payslip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payslip $payslip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payslip  $payslip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payslip $payslip)
    {
        //
    }
}
