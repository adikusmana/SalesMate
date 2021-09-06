<?php

namespace App\Http\Controllers;

use App\Site;
use App\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites      = Site::all();
        return view('/site/index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/site/create');
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
            'name'      => 'required',
            'code'      => 'required|max:3|unique:sites,code',
            'note'      => 'required',
        ]);

        $sites              = new Site;
        $sites->name        = $request->name;
        $sites->code        = $request->code;
        $sites->note        = $request->note;
        $sites->save();

        return redirect('/site');
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
    public function edit(Site $site)
    {
        return view('/site/edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        request()->validate ([
            'name'              => 'required',
            'code'              => 'required|max:3|unique:sites,code',
            'note'              => 'required'
        ]);
        Site::where('id', $site->id)->update([
            'name'              => $request->name,
            'code'              => $request->code,
            'note'              => $request->note
        ]);

        return redirect('/site');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Site::destroy($id);
        return redirect('/site');
    }
}
