<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function usersimList(){
        return view('usersim',[
            'users' => DB::table('users')->orderBy('id')->cursorPaginate(10)
        ]);
    }

    

    //----------------------CRUD-------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
           return view('users.index',[
                'users' => DB::table('users')->orderBy('id')->cursorPaginate(5)
            ]);
     }     
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));

       // return view('users.create');
    }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
        $this->validate($request, [
            'name' =>'required|max:255', 
            'surname' => 'required|max:255',
            'nickname' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password|min:8',
            'roles' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->hasAnyRoles($request->input('roles'));
            
        return redirect()->route('users.index')
                        ->with('success', 'User créer avec succèss');
     }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
    return view('users.show', compact('user'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $user_role = $user->roles->pluck('name','name')->all();

    return view('users.edit', compact('user','roles','user_role'));
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
       $this->validate($request, [
            'name' =>'required|max:255', 
            'surname' => 'required|max:255',
            'nickname' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password|min:8',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
        /*DB::table('model_has_roles')->where('model_id',$id)->delete();
        
            $user->assignRole($request->input('roles'));*/
    
        return redirect()->route('manager.opensim.usersim.usersimList')
                        ->with('success', 'User modiffier avec succèss');
     }
 
 
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('home')->with('success', 'User supprimer avec succèss');
     }



}
