<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get Users
        $users = User::paginate(20);

        //Return collection of user as resource
        return UserResource::collection($users);
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
        $user = new User;
        $user->id = $request->input('id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile_no = $request->input('mobile_no');
        $user->password = $request->input('password');

        if($user->save()){
            return new UserResource($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get user
        $user = User::findorFail($id);
        
        //Return single user as a resource
        return new UserResource($user);
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
        $user = User::findorFail($id);
        
        $user->id = $request->input('id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile_no = $request->input('mobile_no');
        $user->password = $request->input('password');

        if($user->save()){
            return new UserResource($user);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorFail($id);
        
        if($user->delete()){
            return new UserResource($user);
        }
    }
}
