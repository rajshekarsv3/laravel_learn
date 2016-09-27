<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($blog_id)
    {
        $comments = \App\Blog::find($blog_id)->comments;
        return response()->json(['comments' => $comments]);
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
    public function store(Request $request,$blog_id)
    {
        $validator = \Validator::make($request->all(), array(
            'comment' => 'required|min:3|max:255'
        ));
        if($validator->fails())
            return  response()->json(["errors" => $validator->messages()]);
        $id = \DB::table('comments')->insertGetId(
            ['comment' => $request->comment, 'blog_id' => $blog_id]
        );
        return response()->json(['success' => true, 'comment_id' => $id]) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($blog_id,$id)
    {
        $comments = \App\Blog::find($blog_id)->comments->where("id",$id)->first();
        return response()->json(['comments' => $comments]);   
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
    public function update(Request $request,$blog_id, $id)
    {
        $validator = \Validator::make($request->all(), array(
            'comment' => 'required|min:3|max:255'
        ));
        if($validator->fails())
            return  response()->json(["errors" => $validator->messages()]);
        $comments = \DB::table('comments')->where([['id', $id],['blog_id',$blog_id]])->update(['comment' => $request->comment]);
        return response()->json(['success' => true, 'comment_id' => $id]) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog_id,$id)
    {
        $del = \DB::table('comments')->where([['id', $id],['blog_id',$blog_id]])->delete();
        return response()->json(['deleted' => $del]) ;
    }
}
