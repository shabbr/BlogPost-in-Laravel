<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Facades\Gate;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function home(Request $req) {
        $search=$req->input('search');
        // dd($rec);
          if($search != ""){
               $user=Post::where('title','LIKE',"%$search%")->paginate(3);
          }
          else{
            //testing things 
            $user=Post::paginate(3);
        }  
   
            return view('index',['data' => $user]);
        }
    public function index()
    {
        return view('post');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        $user=$req->user();
        $post=new Post;
        $post->title=$req->title;
        $post->body=$req->body;
        $post->user_id=$user->id;
        $post->save();
        return to_route('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id=$request->user()->id;
        $show=post::where('user_id',$id)->get();    
        return view('dashboard',['data'=>$show]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {  
        $id=post::find($id);
        //use Gate to prevent unautherize user by controller
        // if(Gate::denies('IsAdmin')){
        //  abort(403,'Not accessable');
        // }



        //use Policy to prevent unathorize user
       $this->authorize('check',post::class);
        return view('edit',['data' => $id]);
    }

 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $data=post::find($id);
       $data->title=$request->title;
       $data->body=$request->body;
       $data->update();
       return to_route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $del=post::find($id);
        $del->delete();
        return to_route('dashboard');
    }
    public function test(){
        //for testing
    }
}
