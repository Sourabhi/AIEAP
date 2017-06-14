<?php

namespace aieapV1\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use aieapV1\Http\Requests;
use Illuminate\Support\Facades\Auth;

use aieapV1\Http\Requests\CreateUserRequest;
use aieapV1\Http\Requests\UpdateUserRequest;

use aieapV1\Role;
use aieapV1\User; 
use aieapV1\Course;
use aieapV1\Student;
use aieapV1\Day;  
use aieapV1\Timeslot;
use aieapV1\QueryVisitor;  

class UsersController extends Controller
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
        return view ('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {  
       //dd($request);
       $user=new User;
       $user->name=strip_tags(Input::get('name','<p><em><strong><br>'));
       $user->email=strip_tags(Input::get('email'));
       $user->password= bcrypt(Input::get('password'));
       $user->save();
       //$user->roles()->attach(Role::where('role','Admin')->first());
       $user->roles()->attach(Role::where('role','Student')->first());
       Auth::login($user);
       return redirect('/register_confirm');
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
           'user'=> User::find($id)
            );
        return view('aieap.user_registration.single_user',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= array ('user'=> User::find($id));
         return view ('aieap.user_registration.edit_user_profile',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    { //dd($request);
       $user=User::find ($id);
       $user->name=strip_tags(Input::get('name','<p><em><strong><br>'));
       $user->email=strip_tags(Input::get ('email'));
       if(Input::get('password')){
       $user->password= bcrypt(Input::get('password'));
       }
       $user->save();
       return redirect('/admin_dash')->with('success',$user->name."'s". " ". 'profile has been updated.');
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
