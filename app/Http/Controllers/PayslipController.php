<?php

namespace App\Http\Controllers;

use App\Payslip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PayslipController extends Controller
{
    public function index()
    {
        return  view('payslips.index');
    }

    public function getPayslips(Request $request){
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        // dd($date_end);
        $results = DB::select( DB::raw("


        select

a.employee_id,
	a.employee_name,
	round(a.deduction,2) as deduction,
	round(sum(a.total* a.per_hour),2) as Gross,
	round(sum(a.total* a.per_hour) -a.deduction,2) as NetPay

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
        //
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
