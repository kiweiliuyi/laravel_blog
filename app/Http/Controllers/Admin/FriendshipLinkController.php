<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FriendshipLink;
use DB;


class FriendshipLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '友情链接';
        $data = FriendshipLink::withTrashed()->get();
        $assign = compact('title', 'data');
        return view('admin/friendshipLink/index', $assign);

    }

    /**

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '添加友情链接';
        $assign = compact('title');
        return view('admin/friendshipLink/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        FriendshipLink::create($data);
        return redirect('admin/friendshipLink/index');
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
    public function edit($id)
    {
        $data = FriendshipLink::find($id);
        $assign = compact('data');
        return view('admin/friendshipLink/edit', $assign);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $result = FriendshipLink::where('id', $id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = FriendshipLink::where('id', $id)->delete();
        return redirect()->back();
    }
    /**
    * restore
    */
    public function restore($id)
    {
        $result = FriendshipLink::where('id', $id)->restore();
        return redirect()->back();

    }
    /**
    *   forceDelete
    */

    public function forceDelete($id)
    {
        $result = FriendshipLink::where('id', $id)->forceDelete();
        return redirect()->back();
    }
}
