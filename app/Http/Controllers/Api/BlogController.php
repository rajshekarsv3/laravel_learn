<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = \DB::table('blogs')->select('id','title', 'description')->get();
        return response()->json(['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validator = \Validator::make($request->all(), array(
            'title' => 'required|min:3|max:255',
            'description' => 'required',
        ));
        if($validator->fails())
            return  response()->json(["errors" => $validator->messages()]);
        $id = \DB::table('blogs')->insertGetId(
            ['title' => $request->title, 'description' => $request->description]
        );
        return response()->json(['success' => true, 'blog_id' => $id]) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogs = \DB::table('blogs')->select('id','title', 'description')->where('id', $id)->get()->first();
        return response()->json(['blog' => $blogs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = \Validator::make($request->all(), array(
            'title' => 'required|min:3|max:255',
            'description' => 'required',
        ));
        if($validator->fails())
            return  response()->json(["errors" => $validator->messages()]);
        $blogs = \DB::table('blogs')->where('id', $id)->update(['title' => $request->title, "description" => $request->description]);
        return response()->json(['success' => true, 'blog_id' => $id]) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = \DB::table('blogs')->where('id', $id)->delete();
        return response()->json(['deleted' => $del]) ;
    }
}
