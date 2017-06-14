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
use aieapV1\StudentImage;
use aieapV1\Day;  
use aieapV1\Timeslot;
use aieapV1\QueryVisitor;
use File;
use Croppa;
use Mail;
class StudentsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
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
       
        return view ('aieap.enrolment.enrolment_form')->withStudents($students)->withCourses($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentEnrolmentRequest $request)
    {   //dd($request);
        $student = new Student;
        $student->title=strip_tags(Input::get('title'));
        $student->first_name=strip_tags(Input::get('first_name'));
        $student->last_name=strip_tags(Input::get('last_name'));
        $student->date_of_birth=strip_tags(Input::get('date_of_birth'));
        $student->gender= strip_tags(Input::get('gender'));
        $student->town=strip_tags(Input::get('town'));
        $student->house_no= strip_tags(Input::get('house_no'));
        $student->town=strip_tags(Input::get('town'));
        $student->state=strip_tags(Input::get('state'));
        $student->postcode=strip_tags(Input::get('postcode'));
        $student->country=strip_tags(Input::get('country'));
        $student->nationality=strip_tags(Input::get('nationality'));
        $student->phone=strip_tags(Input::get('phone'));
        $student->email=strip_tags(Input::get('email'));
        $student->comments=strip_tags(Input::get ('comments','<p><em><strong><br>'));
        $student->user_id=Auth::id();

$data= array(
        'title'=>$request->title,
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'date_of_birth'=>$request->date_of_birth,
        'gender'=>$request->gender,
        'town'=>$request->town,
        'state'=>$request->state,
        'postcode'=>$request->postcode,
        'country'=>$request->country,
        'nationality'=>$request->nationality,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'comments'=>strip_tags($request->comments)
        );
        $student->save();
        $student->courses()->sync($request->courses, false);
        Mail::send('aieap.emails.studentEnrolment', $data, function($query) use($data){
        $query->from($data['email']);
        $query->to('aieap@loca.com');
        $query->subject('Online Enrolment');
        
       });

        Mail::send('aieap.emails.studentEnrolmentToStudent', $data, function($query) use($data){
        $query->from('aieap@loca.com');
        $query->to($data['email']);
        $query->subject('Online Enrolment');
        
        
       });
        if(Input::hasFile('image')){
            $image=new StudentImage;
            $image->filename=Input::file('image')->getClientOriginalName();
            $image->path=sha1(uniqid(mt_rand(),True)).".".Input::file('image')->getClientOriginalExtension();
            $image->student_id=$student->id;

            Input::file('image')->move(public_path().'/uploads/images',$image->path);
            $image->save();

        }
        

        return redirect('/enrolment_confirm')->withStudent($student);
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
            
           'student'=> Student::find($id)
          
            );
        return view('aieap.admin.admin_single_student_info',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $student= Student::find($id);
         $courses= Course::all();
         $courses1=array();
         foreach ($courses as $course){
            $courses1[$course->id]=$course->course;
         }
        return view ('aieap.admin.edit_student_profile_form')->withStudent($student)->withCourses($courses1);
         
        
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentEnrolmentRequest $request, $id)
    {
        $student=Student::find ($id);
        $student->title=strip_tags(Input::get('title'));
        $student->first_name=strip_tags(Input::get('first_name'));
        $student->last_name=strip_tags(Input::get('last_name'));
        $student->date_of_birth=strip_tags(Input::get('date_of_birth'));
        $student->gender= strip_tags(Input::get('gender'));
        $student->town=strip_tags(Input::get('town'));
        $student->house_no= strip_tags(Input::get('house_no'));
        $student->town=strip_tags(Input::get('town'));
        $student->state=strip_tags(Input::get('state'));
        $student->postcode=strip_tags(Input::get('postcode'));
        $student->country=strip_tags(Input::get('country'));
        $student->nationality=strip_tags(Input::get('nationality'));
        $student->phone=strip_tags(Input::get('phone'));
        $student->email=strip_tags(Input::get('email'));
        $student->comments=strip_tags(Input::get ('comments','<p><em><strong><br>'));
       

        $student->save();

        if(Input::hasFile('image')){
            $image=new StudentImage;
            $image->filename=Input::file('image')->getClientOriginalName();
            $image->path=sha1(uniqid(mt_rand(),True)).".".Input::file('image')->getClientOriginalExtension();
            $image->student_id=$student->id;

            Input::file('image')->move(public_path().'/uploads/images',$image->path);
            $image->save();

        }

        $student->courses()->sync($request->courses );

        return redirect('/admin_dash')->with('success',$student->first_name. " ".$student->last_name. "'s". " ". 'Profile has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student= Student::find($id);
        $student->courses()->detach();
        $student->delete();

       foreach($student->images as $image)
        {
            if(File::exists(public_path().'/uploads/images/'. $image->path))
                { 
                    //File::delete(public_path().'/uploads/images/'. $image->path);
                    Croppa::delete(public_path().'/uploads/images/'. $image->path);
                    $image->delete();

                }

        }
       return redirect ('/admin_dash')->with('warning', $student->first_name. " ".$student->last_name. "'s".'profile with Photo has been deleted.');


    } 


    

    public function getImage($id)
    { //Find the image, show it, confirm delete.
     $data = array('image' => StudentImage::find($id));
        return view ('aieap.image.image',$data);
    }

    public function deleteImage($id)
    {
      //Delete image from server and ddatabase.
    // return " Ready to Delete";
          $image=StudentImage::find($id);
          if(File::exists(public_path().'/uploads/images/'. $image->path))
            {
            File::delete(public_path().'uploads/images/'. $image->path);
            $image->delete();
            }
             return redirect('/admin_dash')->with('success','Photo has been deleted.');
        
    }



}
