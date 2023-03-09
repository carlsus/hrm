<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use App\Department;
use App\Http\Requests\PositionRequest;
use Illuminate\Support\Facades\Auth;
class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $department['data'] = Department::orderby("department","asc")
        			   ->select('id','department')
        			   ->get();

    	return view('positions.index')->with("department",$department);
    }

    public function getRank()
    {
        return response()->json(Position::select('id','position')->orderBy('position','asc')->get());
    }

    public function allPositions(Request $request)
    {
        $columns = array(
            0 =>'position',
            1 =>'code',
            2 =>'department_id',
            3 => 'options'
        );

        $totalData = Position::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Position::offset($start)
                ->with('department')
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Position::where('position','LIKE',"%{$search}%")
                    ->orWhere('code', 'LIKE',"%{$search}%")
                    ->with('department')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Position::where('position','LIKE',"%{$search}%")
                    ->orWhere('code', 'LIKE',"%{$search}%")
                    ->with('department')
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['position'] = $value->position;
                $nestedData['code'] = $value->code;
                $nestedData['department'] = $value->department;

                $btn='';
                //if (Auth::user()->hasPermissionTo('ranks-edit'))
                //{
                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";
                //}
                //if (Auth::user()->hasPermissionTo('ranks-delete'))
                //{
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
    public function store(PositionRequest $request)
    {

        $request->user()->position()->create($request->all());
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
        return response()->json(Position::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request)
    {
        Position::find($request->id)->update($request->all());

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
        PositionRequest::find($id)->delete();
        return response()->json(['success'=>'Position deleted successfully.']);
    }
}
