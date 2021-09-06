<?php

namespace App\Http\Controllers;

use App\Department;
use App\Subdepartment;
use Illuminate\Http\Request;

class SubdepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subdepartments = Subdepartment::all();
        return view('/subdepartment/index', compact('subdepartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('/subdepartment/create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'code'          => 'required|min:2|max:2|unique:subdepartments,code',
            'name'          => 'required',
            'department_id' => 'required',
            'note'          => 'required',
        ]);
        $subdepartment                  = new Subdepartment();
        $subdepartment->code            = $request->code;
        $subdepartment->name            = $request->name;
        $subdepartment->department_id   = $request->department_id;
        $subdepartment->note            = $request->note;
        $subdepartment->save();

        return redirect('/subdepartment');
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
    public function edit(Subdepartment $subdepartment)
    {
        $departments = Department::all();
        return view('/subdepartment/edit', compact('departments','subdepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subdepartment $subdepartment)
    {
        request()->validate([
            'code'          => 'required|min:2|max:2',
            'name'          => 'required',
            'department_id' => 'required',
            'note'          => 'required',
        ]);
        Subdepartment::where('id', $subdepartment->id)->update([
            'code'          => $request->code,
            'name'          => $request->name,
            'department_id' => $request->department_id,
            'note'          => $request->note,
        ]);

        return redirect('/subdepartment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subdepartment::destroy($id);
        return redirect('/subdepartment');
    }
}
