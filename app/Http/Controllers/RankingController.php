<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Department;
use App\Site;
use App\Subdepartment;
use App\Transaction;
use App\User;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Blade;

use function GuzzleHttp\Promise\all;

class RankingController extends Controller
{
    public function site()
    {
        return view('/ranking/site');
    }

    public function siteSearch(Request $request)
    {
        request()->validate([
            'startdate'         => 'required',
            'enddate'           => 'required',
        ]);

        $start      = $request->input('startdate');
        $end        = $request->input('enddate');
        $sites      = Site::all();

        $siteName   = DB::table('sites')->where('id', $request->site_id)->pluck('name');

        $total_sales = DB::table('transactions')
                        ->select('site_id', DB::raw('SUM(amount) as total_sales'))
                        ->groupBy('site_id')
                        ->where([
                                ['transdate', '>=', $start ],
                                ['transdate', '<=', $end ],
                                ])
                        ->orderByDesc('total_sales')
                        ->get();

        if(count($total_sales) > 0 )
            return view('/ranking/site', compact('sites'))->withDetails( $total_sales);
        else
            return view('/ranking/site', compact('sites'))->withMessage('No Data Found');

    }

    public function brand()
    {
        $sites              = Site::all();
        $departments        = Department::all();
        $subdepartments     = Subdepartment::all();
        return view('/ranking/brand', compact('sites', 'departments', 'subdepartments', 'sites'));
    }
    public function brandSearch(Request $request)
    {
        request()->validate([
            'department_id'     => 'required',
            'subdepartment_id'  => 'required',
            'site_id'           => 'required',
            'startdate'         => 'required',
            'enddate'           => 'required',
        ]);

        $sites              = Site::all();
        $departments        = Department::all();
        $subdepartments     = Subdepartment::all();
        $brands             = Brand::all();

        $department     = $request->input('department_id');
        $subdepartment  = $request->input('subdepartment_id');
        $site           = $request->input('site_id');
        $start          = $request->input('startdate');
        $end            = $request->input('enddate');

        $total_sales = DB::table('transactions')
                        ->select('brand_id', DB::raw('SUM(amount) as total_sales'))
                        ->groupBy('brand_id')
                        ->where([
                            ['department_id', '=', $department ],
                            ['subdepartment_id', '=', $subdepartment ],
                            ['site_id', '=', $site ],
                            ['transdate', '>=', $start ],
                            ['transdate', '<=', $end ],
                            ])
                        ->orderByDesc('total_sales')
                        ->get();
        if(count($total_sales) > 0 )
            return view('/ranking/brand', compact('sites', 'brands', 'departments', 'subdepartments', 'sites'))->withDetails( $total_sales);
        else
            return view('/ranking/brand', compact('sites', 'brands', 'departments', 'subdepartments', 'sites'))->withMessage('No Data Found');

    }

    public function user()
    {
        $sites              = Site::all();
        $departments        = Department::all();
        $subdepartments     = Subdepartment::all();
        return view('/ranking/user', compact('sites', 'departments', 'subdepartments', 'sites'));
    }

    public function userSearch(Request $request)
    {
        request()->validate([
            'department_id'     => 'required',
            'subdepartment_id'  => 'required',
            'site_id'           => 'required',
            'startdate'         => 'required',
            'enddate'           => 'required',
        ]);

        $sites              = Site::all();
        $departments        = Department::all();
        $subdepartments     = Subdepartment::all();
        $brands             = Brand::all();
        $users              = User::all();

        $department     = $request->input('department_id');
        $subdepartment  = $request->input('subdepartment_id');
        $site           = $request->input('site_id');
        $start          = $request->input('startdate');
        $end            = $request->input('enddate');

        $total_sales = DB::table('transactions')
                        ->select('user_id', DB::raw('SUM(amount) as total_sales'))
                        ->groupBy('user_id')
                        ->where([
                            ['department_id', '=', $department ],
                            ['subdepartment_id', '=', $subdepartment ],
                            ['site_id', '=', $site ],
                            ['transdate', '>=', $start ],
                            ['transdate', '<=', $end ],
                            ])
                        ->orderByDesc('total_sales')
                        ->get();
        if(count($total_sales) > 0 )
            return view('/ranking/user', compact('sites', 'brands', 'departments', 'subdepartments', 'sites', 'users'))->withDetails( $total_sales);
        else
            return view('/ranking/user', compact('sites', 'brands', 'departments', 'subdepartments', 'sites', 'users'))->withMessage('No Data Found');
    }

    public function department()
    {
        $sites              = Site::all();
        $subdepartments     = Subdepartment::all();
        return view('/ranking/department', compact('sites', 'subdepartments', 'sites'));
    }
    public function departmentSearch(Request $request)
    {
        request()->validate([
            'site_id'           => 'required',
            'startdate'         => 'required',
            'enddate'           => 'required',
        ]);

        $sites              = Site::all();
        $departments        = Department::all();
        $brands             = Brand::all();

        $site           = $request->input('site_id');
        $start          = $request->input('startdate');
        $end            = $request->input('enddate');

        $total_sales = DB::table('transactions')
                        ->select('department_id', DB::raw('SUM(amount) as total_sales'))
                        ->groupBy('department_id')
                        ->where([
                            ['site_id', '=', $site ],
                            ['transdate', '>=', $start ],
                            ['transdate', '<=', $end ],
                            ])
                        ->orderByDesc('total_sales')
                        ->get();
        if(count($total_sales) > 0 )
            return view('/ranking/department', compact('sites', 'brands', 'departments', 'sites'))->withDetails( $total_sales);
        else
            return view('/ranking/department', compact('sites', 'brands', 'departments', 'sites'))->withMessage('No Data Found');

    }

    public function subdepartment()
    {
        $sites              = Site::all();
        $departments        = Department::all();
        $subdepartments     = Subdepartment::all();
        return view('/ranking/subdepartment', compact('sites', 'departments', 'subdepartments', 'sites'));
    }

    public function subdepartmentSearch(Request $request)
    {
        request()->validate([
            'department_id'     => 'required',
            'site_id'           => 'required',
            'startdate'         => 'required',
            'enddate'           => 'required',
        ]);

        $sites              = Site::all();
        $departments        = Department::all();
        $subdepartments     = Subdepartment::all();
        $brands             = Brand::all();;

        $department     = $request->input('department_id');
        $site           = $request->input('site_id');
        $start          = $request->input('startdate');
        $end            = $request->input('enddate');

        $total_sales = DB::table('transactions')
                        ->select('subdepartment_id', DB::raw('SUM(amount) as total_sales'))
                        ->groupBy('subdepartment_id')
                        ->where([
                            ['department_id', '=', $department ],
                            ['site_id', '=', $site ],
                            ['transdate', '>=', $start ],
                            ['transdate', '<=', $end ],
                            ])
                        ->orderByDesc('total_sales')
                        ->get();
        if(count($total_sales) > 0 )
            return view('/ranking/subdepartment', compact('sites', 'brands', 'departments', 'subdepartments', 'sites'))->withDetails( $total_sales);
        else
            return view('/ranking/subdepartment', compact('sites', 'brands', 'departments', 'subdepartments', 'sites'))->withMessage('No Data Found');
    }

}
