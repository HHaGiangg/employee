<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Department;
use Modules\Admin\Entities\Employee;
use Modules\Admin\Entities\Position;
use Modules\Admin\Entities\TargetDepart;
use Modules\Admin\Http\Requests\TargetDepartRequest;

class AdminTargetDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $target_departments     = TargetDepart::orderByDesc('id')->paginate(10);
        $target_departments     = TargetDepart::all();
        $departments            = Department::all();
//        $departments    = Department::all();
        return view('admin::target_department.index',compact('target_departments','departments'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $departments   = Department::all();
        $target        = TargetDepart::all();
        $departmentOld = [];
        return view('admin::target_department.create',compact('departments','target','departmentOld'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data   = $request->except('_token');
        $target = TargetDepart::create($data);

        return redirect()->route('admin.get.list.target_department');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function active($id)
    {
        $target = TargetDepart::find($id);
        $target ->status = ! $target ->status;
        $target ->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $departments    = Department::all();
        $target         = TargetDepart::find($id);
        $departmentOld = [];
        return view('admin::target_department.update',compact('departments','target','departmentOld'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(TargetDepartRequest $request, $id)
    {
        $data = $request->except('_token');
        $target = TargetDepart::find($id)->update($data);

        return redirect()->route('admin.get.list.target_department');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        \DB::table('target_departments')->where('id', $id)->delete();
        return redirect()->back();
    }
}
