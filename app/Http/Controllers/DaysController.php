<?php

namespace aieapV1\Http\Controllers;

use Illuminate\Http\Request;
use aieapV1\Http\Requests\CreateDayTimeslotRequest;
use aieapV1\Http\Requests;
use aieapV1\Http\Requests\UpdateDayTimeslotRequest;
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

class DaysController extends Controller
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
        $days = Day::all();
        $timeslots = Timeslot::all();
        return view ('aieap.day.day_timeslot_form')->withDays($days)->withTimeslots($timeslots);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDayTimeslotRequest $request)       
    {  
        //dd($request);
        $day = new Day;
      
        $day->day=strip_tags(Input::get ('day','<p><em><br><strong>'));
     
         $query=DB::table('days')->where('day','=', Input::get('day'))->count();
       //echo($query);
       if($query>=1){
          $test = Day:: onlyTrashed()->where('day','=', Input::get('day'))->count();
          //echo($test);
         if ($test>=1){$test1 = Day:: onlyTrashed()->where('day','=', Input::get('day'))->restore();

         return redirect('/admin_dash')->with('success', "This ". $day->day." ". "day" ." " . ' has  been restored with previous information. Please update Timeslots field.');}
         
         else {return redirect('/admin_dash')->with('warning', "This ". $day->day." ". "day" ." " . ' has already been taken.');} 
        }

        else{ $day->save();
              $day->timeslots()->sync($request->timeslots, false);
             return redirect('/admin_dash')->with('success',$day->day." ". "day" ." " . 'has been created.');
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
        'day'=> Day::find($id)
        );
        return view('aieap.day.single_day',$data);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $day= Day::find($id);
         $timeslots= Timeslot::all();
         $timeslots1=array();
         foreach ($timeslots as $timeslot){
            $timeslots1[$timeslot->id]=$timeslot->timeslot." ".$timeslot->starttime." to ".$timeslot->endtime;
         }
         return view ('aieap.day.edit_day_timeslot_form')->withDay($day)->withTimeslots($timeslots1);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDayTimeslotRequest $request, $id)
    {  
        $day=Day::find ($id);
        $day->day=strip_tags(Input::get ('day','<p><em><br><strong>'));
        $day->save();
        $day->timeslots()->sync($request->timeslots );
        return redirect('/day')->with('success',"Timeslot of ".$day->day." " . 'has been updated.');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $day = Day::find($id);
        $query = DB::table('days')->join('day_timeslot', 'days.id', '=', 'day_timeslot.day_id')->join('course_timetable','day_timeslot.id','=','course_timetable.day_timeslot_id')->where('day_timeslot.day_id', '=', $id)->count();
                 //echo($query);
        if($query>=1){return redirect('/admin_dash')->with('warning', "This day ". $day->day." ".'can not be deleted. It is in use.');
         }
         else{ $day->timeslots()->detach();
               $day->delete();
              return redirect ('/admin_dash')->with('warning',$day->day." ". 'has been deleted.');
             }

    }
}
