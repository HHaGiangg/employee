<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Department;
use Modules\Admin\Entities\Employee;
use Modules\Admin\Entities\Form;

class AdminFormController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $forms  = Form::orderByDesc('id')->paginate(10);
        $departments = Department::with('department:id, name');
        $employees   = Employee::with('employee:id, name');
        return view('admin::form.index',compact('forms','departments','employees'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function action($action, $id)
    {
        $form   = Form::find($id);
        if ($form) {
            switch ($action){
                case 'process':
                    $form->status = 1;
                    break;
                case 'success':
                    $form->status = 2;
                    break;
                case 'cancel':
                    $form->status = 3;
                    break;
            }
            $form->save();
        }
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
