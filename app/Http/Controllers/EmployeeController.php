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
        $employees=Employee::with('position')->get();
        return  view('employees.index',compact('employees'));
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
        $employee=new Employee();
        return view('employees.create',['position' => $position,'country' => $country,'employee' => $employee,'project' => $project]);
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
        return response()->json(['success'=>'Data saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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

        return view('employees.edit',['position' => $position,'country' => $country,'employee' => $employee,'project' => $project]);

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
