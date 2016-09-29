<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = Request::create('/api/blogs', 'GET');
        $response = \Route::dispatch($request);
        return view('blogs.index',json_decode($response->content(),true));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_blog = Request::create('/api/blogs','POST',array("title"=>$request->title,"description"=>$request->description));
        $response_blog = \Route::dispatch($request_blog);
        return response()->json((json_decode($response_blog->content(),true)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request_blog = Request::create('/api/blogs/'.$id, 'GET');
        $response_blog = \Route::dispatch($request_blog);
        $request_comments = Request::create('/api/blogs/'.$id.'/comments', 'GET');
        $response_comments = \Route::dispatch($request_comments);
        $blogs = json_decode($response_blog->content(),true);
        $comments = json_decode($response_comments->content(),true);
        $output = $blogs;
        if(empty($comments))
            $output['comments'] = array();
        else
            $output = array_merge($blogs,$comments);
        return view('blogs.show',$output);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request_blog = Request::create('/api/blogs/'.$id, 'GET');
        $response_blog = \Route::dispatch($request_blog);
        return view('blogs.edit',json_decode($response_blog->content(),true));
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
        $request_blog = Request::create('/api/blogs/'.$id,'PUT',array("title"=>$request->title,"description"=>$request->description));
        $response_blog = \Route::dispatch($request_blog);
        return response()->json((json_decode($response_blog->content(),true)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
