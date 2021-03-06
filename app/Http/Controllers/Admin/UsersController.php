<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests\EditUserRequest;

use App\User;

use Auth;

class UsersController extends Controller
{
    
    
    public function __construct(){
        
        $this->middleware('auth');
        
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {   
        
        $users = User::paginate( config('app.pagination_limit') );
        return view('admin.users.index',compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {   
        $role = Auth::user()->role_id; 
        $user_id = Auth::user()->id; 
       if( $role == 3 && $user_id != $id ){
        \Session::flash('message', 'Not Authorized to edit other users profile');
        \Session::flash('message-type', 'danger'); 
         return redirect('/user/'.$user_id);    
       } 
        $users=User::findOrFail($id);
        return view('admin.users.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id , EditUserRequest $request)
    {
      $role = Auth::user()->role_id; 
        $user_id = Auth::user()->id; 
       if( $role == 3 && $user_id != $id ){
        \Session::flash('message', 'Not Authorized to edit other users profile');
        \Session::flash('message-type', 'danger'); 
         return redirect('/user/'.$user_id);    
       } 
       $input =$request->all();
       $users = User::findorFail($id);
       if(isset($input['password'])){
        $input['password']=bcrypt($input['password']);
        $users->update($input);
       }else{
        unset($input['password']);
        $users->update($input); 
       }
        
        \Session::flash('message', 'User has been updated!'); 
         \Session::flash('message-type', 'success'); 
        return redirect('/user/'.$id);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
          User::destroy($id);
          return redirect('/users');
    }
}
