<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonnelController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the personnel.
     *
     * @return \Illuminate\Http\Response
     */
    public function personnel(){
       // $user = Auth::user();

        $personnel = User::all();

        return view('personnel', ['personnel' => $personnel] );
    }


    public function add (Request $request){
//        dd($request );

        $this->validate($request, [
            'inn'=> 'unique:users|max:11',
            'name'=> 'required|unique:users|max:255',
            'passport'=>'required|unique:users|max:255',
            'address'=>'max:255',
            'specialty'=>'max:255',
            'phone'=>'max:255',
            'birth_date'=>'required',
            'employment_date'=>'required',
            'description'=>'max:255',
            'email'=>'unique:users|max:255',
        ]);



            $user = new User($request->all());
            $user->save();


        return redirect()->route('personnel');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post, Request $request)
    {
        //валидация данных
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'post' => 'required',
        ]);
        $post = new Post($request->all());

        $user = User::find(Auth::user()->id);
        $user->posts()->save($post);

        return redirect()->route('blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments =Comment::with('user') ->where('post_id', $id )
            ->get()->reverse();
        return view('post')->with(['post'=>$post,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('edit')->with('post', $post);
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

        $user = User::find(Auth::user()->id);
        $user ->posts()->where('id',$id)->
        update(['title'=>$request->title, 'post'=>$request->get('post')]);

        return redirect()->route('blog');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);
        $post ->comments()->delete();
        $post ->delete();
        return redirect()->route('blog');
    }
}
