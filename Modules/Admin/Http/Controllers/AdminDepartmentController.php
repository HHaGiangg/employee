<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Department;
use Modules\Admin\Entities\Employee;
use Modules\Admin\Entities\Position;
use Modules\Admin\Http\Requests\DepartmentRequest;

class AdminDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $departments    = Department::with('position:id,name');
        $departments    = Department::paginate(10);
        $positions      = Position::all();
        $employees      = Employee::all();

        return view('admin::department.index',compact('departments','positions','employees'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $departments    = Department::all();
        $positions      = Position::all();
        $positionOld    = [];
        $departmentOld  = [];
        return view('admin::department.create',compact('departments','positions','positionOld','departmentOld'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(DepartmentRequest $request)
    {
        $data = $request->except('_token');
        $department = Department::create($data);
        return redirect()->route('admin.get.list.department');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function active($id)
    {
        $department = Department::find($id);
        $department ->action = ! $department ->action;
        $department ->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $department     = Department::find($id);
        $positions      = Position::all();
        $positionOld    = [];
//        $employees      = Employee::all();
        $view           = Employee::where('department_id', $id)->first();
        //$view           = Employee::with('employee')->where('id','=', $id)->get();
        return view('admin::department.update',compact('department','positions','positionOld','view'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(DepartmentRequest $request, $id)
    {
        $data   = $request->except('_token');
        $department    = Department::find($id)->update($data);

        return redirect()->route('admin.get.list.department');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        \DB::table('departments')->where('id', $id)->delete();
        return redirect()->back();
    }
}
