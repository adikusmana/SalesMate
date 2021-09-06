<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Brand;
use App\Department;
use App\Site;
use App\Subdepartment;
use App\User;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('/user/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites              = Site::all();
        $brands             = Brand::all();
        $vendors            = Vendor::all();
        $departments        = Department::all();
        $subdepartments     = Subdepartment::all();
        return view('/user/create', compact('brands', 'vendors', 'departments', 'subdepartments', 'sites'));
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
            'photo'             => 'max:1024',
            'name'              => 'required',
            'email'             => 'required|email|unique:users,email',
            'date'              => 'required',
            'role_id'           => 'required',
            'site_id'           => 'required',
            'vendor_id'         => 'required',
            'brand_id'          => 'required',
            'department_id'     => 'required',
            'subdepartment_id'  => 'required',
        ]);
        $users  = new User;
        if($request->hasFile('photo')){
            $photo              = $request->file('photo');
            $photoName          = $request->email . '.jpg';
            $destinationPath    = public_path('/img/users');
            $img                = Image::make($photo->path());
            $img->resize(50, 50)->save($destinationPath.'/'. $photoName);
            // $destinationPath    = public_path('/img/users/ori');
            $photo->move($destinationPath, $photoName);
        }
        $users->name                = $request->name;
        $users->email               = $request->email;
        $users->site_id             = $request->site_id;
        $users->role_id             = $request->role_id;
        $users->password            = bcrypt($request->date);
        $users->vendor_id           = $request->vendor_id;
        $users->brand_id            = $request->brand_id ;
        $users->department_id       = $request->department_id;
        $users->subdepartment_id    = $request->subdepartment_id;
        $users->save();
        return redirect('/user');
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
    public function edit(User $user)
    {
        $sites          = Site::all();
        $brands             = Brand::all();
        $vendors            = Vendor::all();
        $departments        = Department::all();
        $subdepartments     = Subdepartment::all();
        return view('/user/edit', compact('user', 'brands', 'vendors', 'departments', 'subdepartments', 'sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(!$request->has('new_password')){
            request()->validate([
                'photo'             => 'max:1024',
                'name'              => 'required',
                'role_id'           => 'required',
                'site_id'           => 'required',
                'vendor_id'         => 'required',
                'brand_id'          => 'required',
                'department_id'     => 'required',
                'subdepartment_id'  => 'required',
            ]);

            if($request->hasFile('photo')){
                $photo              = $request->file('photo');
                $photoName          = $request->email . '.jpg';
                $destinationPath    = public_path('/img/users');
                $img                = Image::make($photo->path());
                $img->resize(50, 50)->save($destinationPath.'/'. $photoName);
                $photo->move($destinationPath, $photoName);
            }
            User::where('id', $user->id)->update([
                'name'              => $request->name,
                'role_id'           => $request->role_id,
                'site_id'           => $request->site_id,
                'vendor_id'         => $request->vendor_id,
                'brand_id'          => $request->brand_id,
                'department_id'     => $request->department_id,
                'subdepartment_id'  => $request->subdepartment_id,
            ]);
            return redirect('/user');
        }
        else {
            request()->validate([
                'new_password' => 'required_with:password_confirmation|same:password_confirmation|string|min:4|max:10',
            ]);
            //Reset Password
            $pass = Hash::make($request->get('new_password'));
            User::where('id', $user->id)->update([
                'password'  => $pass
            ]);
            return redirect('/user');
        }

        // if($request->has('new_password')){
        //     $validatedData = $request->validate([
        //         'new_password' => 'required_with:password_confirmation|same:password_confirmation|string|min:4|max:10',
        //     ]);
        //     //Reset Password
        //     $pass = Hash::make($request->get('new_password'));
        //     User::where('id', $user->id)->update([
        //         'password'  => $pass
        //     ]);
        //     return redirect('/user/edit');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/user');
    }


    public function getSubdepartment(Request $request)
    {
        $subdepartments = DB::table("subdepartments")
        ->where("department_id",$request->department_id)
        ->pluck("name","id");
        return response()->json($subdepartments);
    }

    public function getBrand(Request $request)
    {
        $brands = DB::table("brands")
        ->where("vendor_id",$request->vendor_id)
        ->pluck("name","id");
        return response()->json($brands);
    }
}
