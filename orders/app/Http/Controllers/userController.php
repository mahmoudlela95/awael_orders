<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\company;

use Illuminate\Http\Request;
use DataTables;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('users.index', ['d'=>0]);
    }
    public function dindex()
    {
        //
        return view('users.index', ['d'=>1]);
    }
    public function usersList(){
        $users = User::where('active', 1)->get();
        return DataTables::of($users)
                
		->addColumn('action', function ($users) {
			$s="'Are you sure you want to delete?'";

                return '
				 <form  method="POST">
				<a href="users/'.$users->id.'" class="btn status delivered"><i  class="fas fa-info"></i> view</a>
				<a href="users/'.$users->id.'/edit" class="btn status pending"><i  class="fas fa-edit"></i> Edit</a>          
				<a onclick="return confirm('.$s.')"  href="users/'.$users->id.'/sdelete/" class="btn status return"><i class="fa fa-trash"></i>Delete</a>
				</form>
                ';
            })
            ->make(true); 
    }
    public function dusersList(){
        $users = User::where('active', 0)->get();
        return DataTables::of($users)
                
		->addColumn('action', function ($users) {
			$s="'Are you sure you want to delete?'";

                return '
				 <form  method="POST">
				<a href="users/'.$users->id.'/restore" class="btn status delivered"><i  class="fas fa-info"></i> Restore </a>
				<a href="users/'.$users->id.'/destroy" class="btn status return"><i  class="fas fa-edit"></i> Final Delete</a>          
				
				</form>
                ';
            })
            ->make(true); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = company::all();
        return view('users.create', ['companies'=> $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $companies = company::all();
        $selectedcoms = explode('a', $user->company);
        unset($selectedcoms[0]);
        $scoms = array_values($selectedcoms);
        return view('users.view', ['user'=> $user, 'companies'=> $companies, 'scoms'=>$scoms]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $companies = company::all();
        $selectedcoms = explode('a', $user->company);
        unset($selectedcoms[0]);
        $scoms = array_values($selectedcoms);
        //dd($scoms);
        return view('users.edit', ['companies'=> $companies, 'user'=> $user, 'scoms'=>$scoms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function softdelete($id)
    {
        //
        $user = User::find($id);
        $user->active = 0;
        $user->save();
        return redirect()->route('users.index')->with('success','the user is deleted!');
    }
    public function restore($id)
    {
        //
        $user = User::find($id);
        $user->active = 1;
        $user->save();
        return redirect()->route('delusers')->with('success','the user is restored!');
    }
    public function destroy(User $user)
    {
        //
        $user = User::find($user->id);
        $user->delete();
        return redirect()->route('delusers')->with('success','the user is deleted!');
    }

}
