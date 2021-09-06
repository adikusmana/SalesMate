<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Department;
use App\Subdepartment;
use App\Vendor;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands         = Brand::all();
        return view('/brand/index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors        = Vendor::all();
        $subdepartments = Subdepartment::all();
        $departments     = Department::all();
        return view('/brand/create', compact('vendors', 'subdepartments', 'departments'));
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
            'name'              => 'required',
            'subdepartment_id'  => 'required',
            'department_id'     => 'required',
            'vendor_id'         => 'required',
            'note'              => 'required'
        ]);
        $brand                  = new Brand();
        $brand->name            = $request->name;
        $brand->subdepartment_id= $request->subdepartment_id;
        $brand->department_id   = $request->department_id  ;
        $brand->vendor_id       = $request->vendor_id;
        $brand->note            = $request->note;
        $brand->save();

        return redirect('/brand');
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
    public function edit(Brand $brand)
    {
        $vendors        = Vendor::all();
        $subdepartments = Subdepartment::all();
        $departments     = Department::all();
        return view('/brand/edit', compact('brand', 'vendors', 'subdepartments', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        request()->validate ([
            'name'              => 'required',
            'subdepartment_id'  => 'required',
            'department_id'     => 'required',
            'vendor_id'         => 'required',
            'note'              => 'required'
        ]);
        Brand::where('id', $brand->id)->update([
            'name'              => $request->name,
            'department_id'     => $request->department_id,
            'vendor_id'         => $request->vendor_id,
            'note'              => $request->note
        ]);

        return redirect('/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect('/brand');
    }
}
