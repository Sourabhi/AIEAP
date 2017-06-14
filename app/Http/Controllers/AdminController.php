<?php

namespace aieapV1\Http\Controllers;

use Illuminate\Http\Request;

use aieapV1\Http\Requests;
use aieapV1\Http\Requests\CreateStudentEnrolmentRequest;

use aieapV1\Http\Requests\UpdateStudentEnrolmentRequest;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use aieapV1\Role;
use aieapV1\User; 
use aieapV1\Course;
use aieapV1\Student;
use aieapV1\Day;  
use aieapV1\Timeslot;
use aieapV1\QueryVisitor;
use DB;
use aieapV1\Http\Controllers\Controller;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $students = Student::all();
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
        $students = Student::all();
        $courses = Course::all();
       
        return view ('aieap.admin.admin_enrolment_form')->withStudents($students)->withCourses($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentEnrolmentRequest $request)
    {
        $student = new Student;
        $student->title=Input::get('title');
        $student->first_name=Input::get('first_name');
        $student->last_name=Input::get('last_name');
        $student->date_of_birth=Input::get('date_of_birth');
        $student->gender= Input::get('gender');
        $student->town=strip_tags(Input::get('town'));
        $student->house_no= strip_tags(Input::get('house_no'));
        $student->town=strip_tags(Input::get('town'));
        $student->state=strip_tags(Input::get('state'));
        $student->postcode=strip_tags(Input::get('postcode'));
        $student->country=strip_tags(Input::get('country'));
        $student->nationality=strip_tags(Input::get('nationality'));
        $student->phone=Input::get('phone');
        $student->email=Input::get('email');
        $student->comments=strip_tags(Input::get ('comments','<p><em><strong><br>'));
        $student->user_id=Auth::id();
        $query=DB::table('students')->where('email','=', Input::get('email'))->count();
       //echo($query);
       if($query>=1){
          $test = Student::onlyTrashed()->where('email','=', Input::get('email'))->restore();
          //echo($test);
         if ($test>=1){$test1 = Student::onlyTrashed()->where('email','=', Input::get('email'))->count();
         return redirect('/admin_dash')->with('success',$student->first_name. " ".$student->last_name. "'s". " ". 'has  been restored with previous information. Please check information that are required to edit.');}

         
         else {return redirect('/admin_dash')->with('warning', $student->first_name. " ".$student->last_name. "'s". " ".  ' profile with email:'.' '.$student->email.' '.'has already been taken.');} 
        }

        else{ $student->save();

        if(Input::hasFile('image')){
            $image=new StudentImage;
            $image->filename=Input::file('image')->getClientOriginalName();
            $image->path=sha1(uniqid(mt_rand(),True)).".".Input::file('image')->getClientOriginalExtension();
            $image->student_id=$student->id;

            Input::file('image')->move(public_path().'/uploads/images',$image->path);
            $image->save();

        }

        $student->courses()->sync($request->courses );
        return redirect('/admin_dash')->with('success',$student->first_name. " ".$student->last_name. "'s". " ". 'Profile has been created.');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        
      $data = array('user' => User::find($id), 
                     'roles'=>Role::all() 
                     ); 
     return view ('aieap.admin.modify_role',$data);             
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
        //dd(Input::all());
         $role_id=Input::get('role');
         $user = User::find($id);
         $user->roles()->detach();
         $user->roles()->attach($role_id);
         return back()->with('success',$user->name."'s"." ".'user permission has been updated.');
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
