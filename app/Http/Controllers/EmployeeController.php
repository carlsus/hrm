<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Employee;
use App\Position;
use App\Project;
use App\Country;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('employees.index');
    }


    public function allEmployees(Request $request)
    {
        $columns = array(
            0 =>'employee_no',
            1 =>'employee_name',
            1 =>'positions',
            1 =>'employement_status',
            2 =>'hire_date',
            3 =>'options'
        );

        $totalData = Employee::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Employee::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Employee::where('first_name', 'LIKE',"%{$search}%")
                    ->orWhere('last_name', 'LIKE',"%{$search}%")
                    //->orWhere('positions.position', 'LIKE',"%{$search}%")
                    ->orWhere('employment_status', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Employee::where('first_name', 'LIKE',"%{$search}%")
                    ->orWhere('last_name', 'LIKE',"%{$search}%")
                    //->orWhere('positions.position', 'LIKE',"%{$search}%")
                    ->orWhere('employment_status', 'LIKE',"%{$search}%")
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {
                // $show =  route('crews.show',$value->id);
                // $edit =  route('crews.edit',$value->id);

                $nestedData['employee_no'] = $value->employee_no;
                $nestedData['employee_name'] = $value->last_name .', ' . $value->first_name;
                $nestedData['position'] = $value->position->position;
                $nestedData['employment_status'] = $value->employment_status;
                $nestedData['hire_date'] = $value->hire_date;
                $btn='';
                //if (Auth::user()->hasPermissionTo('crew-management-edit')) //If user has this //permission
                //{
                    $btn.= "<a href='".route('employees.edit',$value->id)."' data-toggle='tooltip'  data-id='".$value->id."' title='Show' class='btn btn-default far fa-plus'></a>";
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position['data'] = Position::orderby("position","asc")
        			   ->select('id','position')
        			   ->get();

        $project['data'] = Project::orderby("project_name","asc")
            ->select('id','project_name')
            ->get();
        $country['data'] = Country::orderby("country","asc")
        			   ->select('id','country')
                       ->get();
        $crew=new Employee();
        return view('employees.create',['position' => $position,'country' => $country,'crew' => $crew,'project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {

        $data = $request->all();


        $employee_no = str_pad(mt_rand(1000000, 9999999), 8, "0", STR_PAD_LEFT);
        $data['status_id']=1;
        $data['password'] = Hash::make(123456);
        if ($request->has('image_path')) {
            $destination = 'public/uploads/' . $employee_no;
            Storage::makeDirectory($destination);
            $image= $request->file('image_path');
            $image_name = $image->getClientOriginalName();
            $path=$request->image_path->storeAs($destination,$image_name);//$image->move($folder);
            $data['image_path']=$image_name;
        }

        $data['employee_no']=$employee_no;

        $request->user()->employee()->create($data);
        // $crew_rank=new CrewRank();
        // $crew_rank->crew_id=$crew->id;
        // $crew_rank->rank_id=$request->rank_id;
        // $crew_rank->save();


        // $crew_status=new CrewStatus();
        // $crew_status->crew_id=$crew->id;
        // $crew_status->status_id=1;
        // $crew_status->save();
        //$crew->crewrank()->save($crew_rank);
        // $crew_rank=new CrewRank();
        // $crew_rank->rank_id=$request->rank_id;
        // $data->crewrank()->associate($crew_rank);
        // $data->save();



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

        // $employee=$this->crewRepository->getById($id);
        // $rank['data'] = Position::orderby("position","asc")
        // 			   ->select('id','position')
        // 			   ->get();
        // $country['data'] = Country::orderby("country","asc")
        // 			   ->select('id','country')
        // 			   ->get();

        // //dd($crew);
        // return view('crews.show',['rank' => $rank,'crew' =>$crew, 'country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position['data'] = Position::orderby("position","asc")
        			   ->select('id','position')
        			   ->get();
        $country['data'] = Country::orderby("country","asc")
        			   ->select('id','country')
        			   ->get();

                       $project['data'] = Project::orderby("project_name","asc")
                       ->select('id','project_name')
                       ->get();
        $employee = Employee::find($id);

        return view('employees.edit',['position' => $position,'country' => $country,'crew' => $employee,'project' => $project]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request)
    {
        $update=Employee::find($request->id);
        $update->fill($request->all());
        $request['user_id']=auth()->id();

        if ($request->has('image_path')) {

            $destination = 'public/uploads/' . $request->employee_no;
            $image= $request->file('image_path');
            $image_name = $image->getClientOriginalName();
            $path=$request->image_path->storeAs($destination,$image_name);//$image->move($folder);
            $update['image_path']=$image_name;
        }
        $update->save();

        // $rank=$this->crewRepository->getById($request->id);
        // if($rank->rank_id<>$request->rank_id){
        //     $crew_rank=new CrewRank();
        //     $crew_rank->crew_id=$request->id;
        //     $crew_rank->rank_id=$request->rank_id;
        //     $crew_rank->save();
        // }
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
        $delete=Employee::find($id);
        Storage::deleteDirectory('public/uploads/' . $delete->crew_no);
        $delete->delete();
        return response()->json(['success'=>'Data deleted successfully.']);
    }
}
