<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Department;
use App\Imports\TransactionImport;
use App\Site;
use App\Subdepartment;
use App\Transaction;
use App\Vendor;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions       = Transaction::all();
        $sites              = Site::all();
        $brands             = Brand::all();
        $vendors            = Vendor::all();
        $departments        = Department::all();
        $subdepartments     = Subdepartment::all();
        return view('/transaction/index', compact('transactions', 'brands', 'vendors', 'departments', 'subdepartments', 'sites'));
    }

    public function search(Request $request)
    {
        request()->validate([
            'vendor_id'         => 'required',
            'brand_id'          => 'required',
            'department_id'     => 'required',
            'subdepartment_id'  => 'required',
            'site_id'           => 'required',
            'startdate'         => 'required',
            'enddate'           => 'required',
        ]);
        $transactions       = Transaction::all();
        $sites              = Site::all();
        $brands             = Brand::all();
        $vendors            = Vendor::all();
        $departments        = Department::all();
        $subdepartments     = Subdepartment::all();

        $vendor         = $request->input('vendor_id');
        $brand          = $request->input('brand_id');
        $department     = $request->input('department_id');
        $subdepartment  = $request->input('subdepartment_id');
        $site           = $request->input('site_id');
        $start          = $request->input('startdate');
        $end            = $request->input('enddate');

        $vendorName             = DB::table('vendors')->where('id', $request->vendor_id)->pluck('name');
        $brandName              = DB::table('brands')->where('id', $request->brand_id)->pluck('name');
        $departmentName         = DB::table('departments')->where('id', $request->department_id)->pluck('name');
        $subdepartmentName      = DB::table('subdepartments')->where('id', $request->subdepartment_id)->pluck('name');
        $siteName               = DB::table('sites')->where('id', $request->site_id)->pluck('name');

        $data = DB::table('transactions')->where([
            ['vendor_id', '=', $vendor],
            ['brand_id', '=', $brand],
            ['department_id', '=', $department],
            ['subdepartment_id', '=', $subdepartment],
            ['site_id', '=', $site],
            ['transdate', '>=', $start],
            ['transdate', '<=', $end],
        ])->get();
        if (count($data) > 0)
            return view('/transaction/result', compact(
                'transactions',
                'brands',
                'vendors',
                'departments',
                'subdepartments',
                'sites',
                'vendorName',
                'brandName',
                'departmentName',
                'subdepartmentName',
                'siteName',
                'start',
                'end',
            ))->withDetails($data)->withQuery([
                $vendor, $brand, $department, $subdepartment, $site
            ]);
        else
            return view('/transaction/result', compact(
                'transactions',
                'brands',
                'vendors',
                'departments',
                'subdepartments',
                'sites',
                'vendorName',
                'brandName',
                'departmentName',
                'subdepartmentName',
                'siteName',
                'start',
                'end',
            ))->withMessage('No Data Found');
    }

    public function upload()
    {
        return view('/transaction/upload');
    }

    public function uploadTransaction(Request $request)
    {
        request()->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        $file   = $request->file('file');
        $name   = rand().$file->getClientOriginalName();
        $path   = public_path('file/transactionupload');
        $file->move($path, $name);
        Excel::import(new TransactionImport, public_path('file/transactionupload/'.$name));
        return redirect('/upload')->with('success','File Successfully Upload');

    }
}
