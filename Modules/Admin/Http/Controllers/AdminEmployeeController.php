<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Department;
use Modules\Admin\Entities\Employee;
use Modules\Admin\Entities\Position;
use Modules\Admin\Http\Requests\EmployeeRequest;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth;
use Illuminate\Support\Facades\File;

class AdminEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $employees      = Employee::with('department:id,name');
        $departments    = Department::all();
        $positions      = Position::all();
        $employees      = Employee::paginate(10);
        return view('admin::employee.index',compact('departments','employees','positions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
//        $exp    = (($employees->date_end) - ($employees->date_join));
        $departments    = Department::orderByDesc('name')->get();
        $employees     = Employee::all();
        $positions      = Position::all();
        $position       = Position::orderByDesc('name')->get();
        $departmentOld = [];
        $positionOld    = [];

        return view('admin::employee.create',compact('departments','employees','departmentOld','positions','positionOld','position'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(EmployeeRequest $request)
    {
        $data   = $request->except('_token','avatar');

        $validator = Validator::make($request->all(), [
            'upload' => 'required|image|max:5000',
        ]);
        if ($validator->fails()) {
            $message = implode(' ', $validator->errors()->all());
            return $message;
        }
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $url = asset('storage/uploads/' . $filenametostore);

//            dd($url);
            //lấy $url lưu vào database, nhớ lấy $url hoặc nếu muốn lấy $filenametostore lưu vào
            // thì lúc lấy ra phải thêm asset('storage/uploads/
            $data['avatar'] = $filenametostore;
            $employee   = Employee::create($data);
//            $employee->avatar = $filenametostore;
//            $employee->save();
        }
//        return redirect()->back();
        return redirect()->route('admin.get.list.employee');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function getEmployeeDetail(Request $request, $id)
    {
        if ($request->ajax())
        {
            $view   =  Employee::where('id', $id)->first();
            $html = view('admin::components.detail_employee',compact('view'))->render();
            return response([
                'html' => $html,
            ]);
        };
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {;
        $departments    = Department::orderByDesc('name')->get();
        $position       = Position::orderByDesc('name')->get();
        $employee       = Employee::find($id);
        $positions      = Position::all();
        $departmentOld = [];
        $positionOld    = [];
        return view('admin::employee.update',compact('departments','employee','departmentOld','positions','position','positionOld'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(EmployeeRequest $request)
    {
        $data = $request->except('_token','avatar');
        $employee = Employee::find($request->id_empl)->update($data);
        if(!$employee){
            return Redirect::back()->with('msg', 'Update Error');
        }
        return redirect()->back()->with('success', 'Updated');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        \DB::table('employees')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function uploadAvatar(Request $request){
//        dd($request->avatar_empl);
        $d = Storage::delete('public/uploads/'.$request->avatar_empl);
        $validator = Validator::make($request->all(), [
            'upload' => 'required|image|max:5000',
            'id_empl'=>'required',
        ]);
        if ($validator->fails()) {
            $message = implode(' ', $validator->errors()->all());
            return $message;
        }
        if ($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();

            $filenametostore = $filename . '' . time() . '.' . $extension;

            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $url = asset('storage/uploads/' . $filenametostore);

            $data['avatar'] = $filenametostore;
            $employee = Employee::find($request->id_empl)->update($data);

        }
        return redirect()->route('admin.get.list.employee');

    }


}
