<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = User::latest()->paginate(10);
        return view('user.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('user.create', compact('roles','permissions'));
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
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);
    
        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);
    
        // Create the user
        if ( $user = User::create($request->except('roles', 'permissions')) ) {
            $this->syncPermissions($request, $user);
            //flash('User has been created.');
        } else {
            //flash()->error('Unable to create user.');
        }
    
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        
        return view('user.edit', compact('user', 'roles', 'permissions'));
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
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);
    
        // Get the user
        $user = User::findOrFail($id);
    
        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));
    
        // check for password change
        // if($request->get('password')) {
        //     $user->password = bcrypt($request->get('password'));
        // }
    
        // Handle the user roles
        $this->syncPermissions($request, $user);
    
        $user->save();
        //flash()->success('User has been updated.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( Auth::user()->id == $id ) {
            //flash()->warning('Deletion of currently logged in user is not allowed :(')->important();
            return redirect()->back();
        }
    
        if( User::findOrFail($id)->delete() ) {
            //flash()->success('User has been deleted');
        } else {
            //flash()->success('User not deleted');
        }
    
        return redirect()->back();
    }

    private function syncPermissions(Request $request, $user)
    {

        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);
        
        $roles = Role::find($roles);

        if( ! $user->hasAllRoles( $roles ) ) {
            $user->permissions()->sync([]);
        } 
        else {
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }
}
