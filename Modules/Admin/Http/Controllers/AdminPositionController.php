<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Department;
use Modules\Admin\Entities\Position;
use Modules\Admin\Http\Requests\PositionRequest;

class AdminPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $positions = Position::paginate(10);
        $departments = Department::all();
        return view('admin::position.index',compact('positions','departments'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $positions = Position::all();
        $departments = Department::all();
        $departmentOld = [];
        return view('admin::position.create',compact('positions','departments','departmentOld'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PositionRequest $request)
    {
        $data = $request->except('_token');
        $position = Position::create($data);

        return redirect()->route('admin.get.list.position');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $departments    = Department::all();
        $position      = Position::find($id);
        $departmentOld = [];
        return view('admin::position.update',compact('departments','position','departmentOld'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PositionRequest $request, $id)
    {
        $data = $request->except('_token');
        $position = Position::find($id)->update($data);

        return redirect()->route('admin.get.list.position');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        \DB::table('employee_positions')->where('id', $id)->delete();
        return redirect()->back();
    }
}
