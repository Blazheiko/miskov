<?php

namespace App\Http\Controllers;


use App\Personnel;
use App\Specialty;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonnelController extends Controller
{

    /**
     * Display a listing of the personnel.
     *
     * @return \Illuminate\Http\Response
     */
    public function personnel(){
       // $user = Auth::user();


        $persons = Personnel::all();
//        dd( "$persons" );

        return view('personnel.personnel', ['persons' => $persons] );
    }


    public function add (Request $request){


        $this->validate($request, [
            'inn'=> 'unique:personnels|max:11',
            'last_name'=>'required|max:255',
            'name'=> 'required|max:255',
            'patronymic'=> 'required|max:255',
            'passport'=>'required|unique:personnels|max:255',
            'address'=>'max:255',
            'specialty'=>'max:255',
            'phone'=>'max:255',
            'birth_date'=>'required',
            'employment_date'=>'required',
            'description'=>'max:255',
            'email'=>'unique:personnels|max:255',
        ]);
        //dd($request );

            $personel = new Personnel($request->all());
            $user = Auth::user();
            $personel->user_id=$user->id;
       //      dd($personal);
            $personel->save();


        return redirect()->route('personnel');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialtys = Specialty::all('id','name_special');
        return view('personnel.create_user')->with(['specialtys'=>$specialtys]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personnel = Personnel::find($id);
        $creator = User::find($personnel->user_id);
        $specialtys = Specialty::all('id','name_special');
        //dd($personnel);

        return view('personnel.edit_personnel')->with(['personnel'=>$personnel,'creator'=>$creator,
                                                             'specialtys'=>$specialtys]);
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

        $personnel = Personnel::find($id);
        $personnel->update($request->all());
//        $user ->posts()->where('id',$id)->
//        update(['title'=>$request->title, 'post'=>$request->get('post')]);

        return redirect()->route('personnel');

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
