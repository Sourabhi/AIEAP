<?php

namespace aieapV1\Http\Controllers;

use Illuminate\Http\Request;
use aieapV1\Http\Requests\CreateCourseDayRequest;
use aieapV1\Http\Requests;
use aieapV1\Http\Requests\UpdateCourseDayRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use aieapV1\Role;
use aieapV1\User; 
use aieapV1\Course;
use aieapV1\Student;
use aieapV1\Day;  
use aieapV1\Timeslot;
use aieapV1\QueryVisitor; 
use aieapV1\DayTimeslot; 
use aieapV1\CourseTimetable;
use DB;
use aieapV1\Http\Controllers\Controller;
// use Purifier;
class CoursesController extends Controller
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
        $day_timeslot= DayTimeslot::all();
        $queryvisitors=QueryVisitor::all();

        return view('admin_dash')->withDay_Timeslot($day_timeslot)->withQueryvisitors($queryvisitors)->withCourses($courses)->withDays($days)->withTimeslots($timeslots)->withStudents($students)->withRoles($roles)->withUsers($users);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $days = Day::all();
        $timeslots = Timeslot::all();
        $day_timeslot= DayTimeslot::all();
       
        //return view ('aieap.day.course_day_form')->withCourses($courses)->withDays($days)->withTimeslots($timeslots);
         return view ('aieap.course.course_day_form')->withCourses($courses)->withDayTimeslot($day_timeslot);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function store(CreateCourseDayRequest $request)
    {   //dd($request);
        $course = new Course;
        $course->course=strip_tags(Input::get ('course', '<p><em><strong><br>'));
        $course->start_date=strip_tags(Input::get ('start_date', '<p><em><strong><br>'));
        $course->start_date=strip_tags(Input::get ('completion_date', '<p><em><strong><br>'));
        $decode_content=html_entity_decode(Input::get('description'));
        $course->description=strip_tags($decode_content,'<p><em><strong><br>');
       
        $query=DB::table('courses')->where('course','=', Input::get('course'))->count();
       //echo($query);
       if($query>=1){
          $test = Course:: onlyTrashed()->where('course','=', Input::get('course'))->count();
          //echo($test);
         if ($test>=1){$test1 = Course:: onlyTrashed()->where('course','=', Input::get('course'))->restore();
         return redirect('/admin_dash')->with('success', "This ". $course->course." ". "course" ." " . ' has  been restored with previous information. Please update the Day and Timeslot (required). Check Start Date, Completion Date and Description if it is required to edit.');}
         
         else {return redirect('/admin_dash')->with('warning', "This ". $course->course." ". "course" ." " . ' has already been taken.');
            } 
        }

        else{ $course->save();
              $course->day_timeslot()->sync($request->dayTimeslot, false);
             return redirect('/admin_dash')->with('success',$course->course." ". "course" ." " . 'has been created.');
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
            $data =array ('course'=> Course::find($id)
                
            );
            
        return view('aieap.course.single_course',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course= Course::find($id);
        $day = Day::all();
        $timeslot = Timeslot::all();
        $day_timeslot= DayTimeslot::all();
        $day_timeslot1=array();

         foreach ($day_timeslot as $day_timeslot){
             foreach($day_timeslot->hasDays as $days) {
                     foreach($day_timeslot->hasTimeslots as $timeslots){
                      $day_timeslot1[$day_timeslot->id]=$days->day." : ".$timeslots->starttime. " to ". $timeslots->endtime;  
                     }
                 }
             }
         return view ('aieap.course.edit_course_day_form')->withCourse($course)->withDayTimeslot($day_timeslot1)->withDay($day)->withTimeslot($timeslot);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseDayRequest $request, $id)
    {
         $course=Course::find ($id);
         $course->course=strip_tags(Input::get ('course', '<p><em><strong><br>'));
         $course->start_date=strip_tags(Input::get ('start_date', '<p><em><strong><br>'));
         $course->start_date=strip_tags(Input::get ('completion_date', '<p><em><strong><br>'));
         $decode_content=html_entity_decode(Input::get ('description'));
         $course->description=strip_tags($decode_content, '<p><em><strong><br>');
        //dd($course); 
         $course->save();
         $course->day_timeslot()->sync($request->dayTimeslot);
         return redirect('/admin_dash')->with('success',$course->course. " "."course"." " . 'has been updated.');   
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $query = DB::table('courses')->join('course_student', 'courses.id', '=', 'course_student.course_id')->where('course_student.course_id', '=', $id)->count();
                 echo($query);

                 if($query>=1){return redirect('/admin_dash')->with('warning', "This ". $course->course." ". "course" ." " . 'can not be deleted. It is in use.');
         }
         else{ $course->day_timeslot()->detach();
               $course->delete();
               return redirect ('/admin_dash')->with('success',$course->course." "."course"." ". 'has been deleted.');
             }
        
    }
}
