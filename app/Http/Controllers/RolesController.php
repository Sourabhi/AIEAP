<?php

namespace aieapV1\Http\Controllers;

use Illuminate\Http\Request;

use aieapV1\Http\Requests;
use aieapV1\Http\Requests\CreateRoleRequest;
use aieapV1\Http\Requests\UpdateRoleRequest;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Auth;
use aieapV1\Role;
use aieapV1\User; 
use aieapV1\Course;
use aieapV1\Student;
use aieapV1\Day;  
use aieapV1\Timeslot; 
use aieapV1\QueryVisitor;
use DB;
use aieapV1\Http\Controllers\Controller;

class RolesController extends Controller
  
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $courses = Course::all();
        $days = Day::all();
        $timeslots = Timeslot::all();
        $roles=Role::all();
        $users = User::all(); 
        $queryvisitors=QueryVisitor::all();
        return view('aieap.admin.admin_dash')->withQueryvisitors($queryvisitors)->withCourses($courses)->withDays($days)->withTimeslots($timeslots)->withStudents($students)->withRoles($roles)->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        return view ('aieap.role.role_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {   $students = Student::all();
        $courses = Course::all();
        $days = Day::all();
        $timeslots = Timeslot::all();
        $users = User::all(); 
        $role=new Role;
        //$role->role=Input::get('role');
        $role->role=strip_tags(Input::get ('role', '<p><em><strong><br>'));
        $role->description=strip_tags(Input::get ('description', '<p><em><strong><br>')) ;
        $query=DB::table('roles')->where('role','=', Input::get('role'))->count();
       if($query>=1){
          $test = Role:: onlyTrashed()->where('role','=', Input::get('role'))->count();
         
          if ($test>=1){$test1 = Role:: onlyTrashed()->where('role','=', Input::get('role'))->restore();
         return redirect('/admin_dash')->with('success', "This ". $role->role." ". "role" ." " . ' has  been restored with previous information. Please update the Description if it is required to edit.');
                  }
        else {return redirect('/admin_dash')->with('warning', "This ". $role->role." ". "role" ." " . ' has already been taken.');
            }
          }
       
        else{ $role->save();
        return redirect('/role')->with('success',$role->role." ".'role has been created.');
              
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
        $data= array(
            'role'=> Role::find($id)
             );
        return view('aieap.role.single_role',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= array ('role'=> Role::find($id));
        return view ('aieap.role.edit_role',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $role=Role::find ($id);
        $role->role=strip_tags(Input::get ('role', '<p><em><strong><br>'));
        $role->description=strip_tags(Input::get ('description', '<p><em><strong><br>')) ;
        $role->save();
        return redirect('/role')->with('success','Role has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role= Role::find($id);
        $query = DB::table('roles')->join('role_user', 'roles.id', '=', 'role_user.role_id')->where('role_user.role_id', '=', $id)->count();
                

         if($query>=1){return redirect('/admin_dash')->with('warning', "This ". $role->role." ". "role" ." " . 'can not be deleted. It is in use.');
        }
         else{ $role->users()->detach();
        $role->delete();
        return redirect ('/role')->with('warning',$role->role." ".'role has been deleted.');
             }
        
    }
}
