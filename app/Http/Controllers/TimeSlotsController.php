<?php

namespace aieapV1\Http\Controllers;

use Illuminate\Http\Request;
use aieapV1\Http\Requests\CreateTimeslotRequest;
use aieapV1\Http\Requests\UpdateTimeslotRequest;
use aieapV1\Http\Requests;
use aieapV1\Timeslot;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use aieapV1\Role;
use aieapV1\User; 
use aieapV1\Course;
use aieapV1\Student;
use aieapV1\Day;  
use aieapV1\QueryVisitor;
use aieapV1\DayTimeslot;
use DB;
use aieapV1\Http\Controllers\Controller;

class TimeSlotsController extends Controller
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
        return view ('aieap.timeslot.timeslot_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTimeslotRequest $request)
    {  
       //dd($request);
       $timeslot=new Timeslot;
       $timeslot->timeslot=strip_tags(Input::get ('timeslot','<p><em><br><strong>'));
       $timeslot->starttime=strip_tags(Input::get ('starttime','<p><em><br><strong>'));
       $timeslot->endtime=strip_tags(Input::get ('endtime','<p><em><br><strong>'));
       $query=DB::table('timeslots')->where([['timeslot','=', Input::get('timeslot')],
      ['starttime','=', Input::get('starttime')],['endtime','=', Input::get('endtime')]])->count();
       //echo($query);
       if($query>=1){
          $test = Timeslot:: onlyTrashed()->where([['timeslot','=', Input::get('timeslot')],
        ['starttime','=', Input::get('starttime')],['endtime','=', Input::get('endtime')]])->count();
          //echo($test);
         if ($test>=1){$test1 = Timeslot:: onlyTrashed()->where([['timeslot','=', Input::get('timeslot')],
        ['starttime','=', Input::get('starttime')],['endtime','=', Input::get('endtime')]])->restore();
         return redirect('/admin_dash')->with('success', "This ". $timeslot->timeslot." ". "timeslot" ." " . ' has  been restored with previous information. Please update the Start Time and End Time if it is required.');}
         
         else {return redirect('/admin_dash')->with('warning', "This ". $timeslot->timeslot." ". "timeslot" ." " . ' has already been taken.');} 
        }

        else{ $timeslot->save();
             return redirect('/admin_dash')->with('success',$timeslot->timeslot." ". "timeslot" ." " . 'has been created.');
            }     
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { $data= array(
         'timeslot'=> Timeslot::find($id)
        );
        return view('aieap.timeslot.single_timeslot',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= array ('timeslot'=> Timeslot::find($id));
        return view ('aieap.timeslot.edit_timeslot',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeslotRequest $request, $id)
    {
       $timeslot=Timeslot::find ($id);
       $timeslot->timeslot=strip_tags(Input::get ('timeslot','<p><em><br><strong>'));
       $timeslot->starttime=strip_tags(Input::get ('starttime','<p><em><br><strong>'));
       $timeslot->endtime=strip_tags(Input::get ('endtime','<p><em><br><strong>'));
       $query=DB::table('timeslots')->where([['starttime','=', Input::get('starttime')],['endtime','=', Input::get('endtime')]])->count();
       
         if($query>=1){return redirect('/admin_dash')->with('warning', "This ". $timeslot->timeslot." ". "timeslot" ." " . ' has already been taken.');
         }
         else{ $timeslot->save();
               return redirect('/admin_dash')->with('success',$timeslot->timeslot." ". "timeslot" ." " . 'has been updated.');
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
       $timeslot= Timeslot::find($id);
       $query = DB::table('timeslots')->join('day_timeslot', 'timeslots.id', '=', 'day_timeslot.timeslot_id')->where('day_timeslot.timeslot_id', '=', $id)->count();
                 echo($query);
       if($query>=1){return redirect('/admin_dash')->with('warning', "This ". $timeslot->timeslot." ". "timeslot" ." " . 'can not be deleted. It is in use.');
         }
         else{ $timeslot->days()->detach();
               $timeslot->delete();
              return redirect('/admin_dash')->with('success',$timeslot->timeslot." ". "timeslot" ." " . 'has been deleted.');
             }
       
    }
}