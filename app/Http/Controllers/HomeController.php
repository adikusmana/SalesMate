<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Charts\SalesChart;
use App\Department;
use App\Subdepartment;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $site         = Auth::user()->site_id;

        $dataSubdepartment = DB::table('transactions')
            ->select('subdepartment_id', DB::raw('SUM(amount) as total_sales'))
            ->groupBy('subdepartment_id')
            ->where([
                ['site_id', '=', $site],
            ])
            ->orderByDesc('total_sales')
            ->pluck('subdepartment_id', 'total_sales');

        $subdepartmentChart = new SalesChart;
        $subdepartmentChart->labels($dataSubdepartment->values());
        $subdepartmentChart->dataset('Sub Department', 'doughnut', $dataSubdepartment->keys())
            ->backgroundColor([
                '#008282',
                '#004182',
                '#289261',
                '#38565c',
                '#967b51',
                '#ba7301',
                '#ba7303',
                '#ba7350',
                '#f04747',
                '#eb96aa',
                '#f4d1d6',
                '#a87d68',
                '#ba7320',
                '#ba7320',
                '#ba7320',
                '#ba7320',
                '#ba7320',
            ]);

        $dataDepartment = DB::table('transactions')
            ->select('department_id', DB::raw('SUM(amount) as total_sales'))
            ->groupBy('department_id')
            ->where([
                ['site_id', '=', $site],
            ])
            ->orderByDesc('total_sales')
            ->pluck('department_id', 'total_sales');

        $departmentChart = new SalesChart;
        $departmentChart->labels($dataDepartment->values());
        $departmentChart->dataset('Department', 'doughnut', $dataDepartment->keys())
            ->backgroundColor([
                '#008282',
                '#004182',
                '#289261',
                '#38565c',
                '#967b51',
                '#ba7301',
                '#ba7303',
                '#ba7350',
                '#f04747',
                '#eb96aa',
                '#f4d1d6',
                '#a87d68',
                '#ba7320',
                '#ba7320',
                '#ba7320',
                '#ba7320',
                '#ba7320',
            ]);


        $dataUser = DB::table('transactions')
            ->select('user_id', DB::raw('SUM(amount) as total_sales'))
            ->groupBy('user_id')
            ->where([
                ['site_id', '=', $site],
            ])
            ->orderByDesc('total_sales')
            ->pluck('user_id', 'total_sales');

        $userChart = new SalesChart;
        $userChart->labels($dataUser->values());
        $userChart->dataset('Total Sales', 'doughnut', $dataUser->keys())
            ->backgroundColor([
                '#008282',
                '#004182',
                '#289261',
                '#38565c',
                '#967b51',
                '#ba7301',
                '#ba7303',
                '#ba7350',
                '#f04747',
                '#eb96aa',
                '#f4d1d6',
                '#a87d68',
                '#ba7320',
                '#ba7320',
                '#ba7320',
                '#ba7320',
                '#ba7320',
            ]);


        $dataBrand = DB::table('transactions')
            ->select('brand_id', DB::raw('SUM(amount) as total_sales'))
            ->groupBy('brand_id')
            ->where([
                ['site_id', '=', $site],
            ])
            ->orderByDesc('total_sales')
            ->pluck('brand_id', 'total_sales');

        $brandChart = new SalesChart;
        $brandChart->labels($dataBrand->values());
        $brandChart->dataset('Total Sales', 'doughnut', $dataBrand->keys())
            ->backgroundColor([
                '#008282',
                '#004182',
                '#289261',
                '#38565c',
                '#967b51',
                '#ba7301',
                '#ba7303',
                '#ba7350',
                '#f04747',
                '#eb96aa',
                '#f4d1d6',
                '#a87d68',
                '#ba7320',
                '#ba7320',
                '#ba7320',
                '#ba7320',
                '#ba7320',
            ]);


        $userD1 = User::where('department_id', '1')->count();
        $userD2 = User::where('department_id', '2')->count();
        $userD3 = User::where('department_id', '3')->count();
        $userD4 = User::where('department_id', '4')->count();
        $userD5 = User::where('department_id', '5')->count();

        $brandD1 = Brand::where('department_id', '1')->count();
        $brandD2 = Brand::where('department_id', '2')->count();
        $brandD3 = Brand::where('department_id', '3')->count();
        $brandD4 = Brand::where('department_id', '4')->count();
        $brandD5 = Brand::where('department_id', '5')->count();

        return view('home', compact(
            'subdepartmentChart',
            'departmentChart',
            'userChart',
            'brandChart',
            'userD1',
            'userD2',
            'userD3',
            'userD4',
            'userD5',
            'brandD1',
            'brandD2',
            'brandD3',
            'brandD4',
            'brandD5',
        ));
    }
}
