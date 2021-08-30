<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Department;
use Modules\Admin\Entities\Employee;
use Modules\Admin\Entities\Position;
use Modules\Admin\Entities\TargetDepart;
use Modules\Admin\Entities\TargetEmployee;

class AdminTargetEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $targets    = TargetEmployee::all();
        $employee   = Employee::all();
        $target_department  = TargetDepart::all();
        $position   = Position::all();

        $viewData   = [
            'targets'   => $targets,
            'employee'  => $employee,
            'target_department' => $target_department,
            'position'  => $position,

        ];
        return view('admin::target_employee.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $target_departmentOld   = [];
        $target_departments = TargetDepart::all();
        $departmentOld      = [];
        $positionOld        = [];
        $position       = Position::all();
        $department     = Department::all();
        //$employee       = Employee::all();
        $employeeOld    = [];

        $empData['data']    = Employee::orderby('name')
            ->select('id','name')->get();


//        return response()->json($empData);

//        $target_departments = TargetDepart::find($request->id);
//        $position       = Position::find($request->id);
//        $department     = Department::find($request->id);
//        $employee       = Employee::find($request->id);

        $viewData   = [
            'target_departmentOld'  => $target_departmentOld,
            'target_departments'    => $target_departments,
            'departmentOld'         => $departmentOld,
            'department'            => $department,
            'positionOld'           => $positionOld,
            'position'              => $position,
            'employeeOld'           => $employeeOld,
            'empData'               => $empData
            //'employee'              => $employee,
        ];
        return view('admin::target_employee.create',$viewData);
    }


    public function getPosition($positionid = 0){
        $posiData['data']    = Position::orderby('name')
                             ->select('id','name')->get();
//                            ->where('name', $positionid)->get();


        return response()->json($posiData);
    }




    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data   = $request->except('_token');
        $target = TargetEmployee::create($data);
//        $id     = TargetEmployee::insertGetID($data);
        dd($request->all());

        //return redirect()->back();
        //return redirect()->route('admin::target_employee.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function active($id)
    {
        $target     = TargetEmployee::find($id);
        $target->status = ! $target->status;
        $target->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
