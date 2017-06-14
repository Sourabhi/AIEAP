<?php

namespace aieapV1\Http\Controllers;

use Illuminate\Http\Request;

use aieapV1\Http\Requests;
use aieapV1\Http\Requests\CreateVisitorQueryRequest;
use aieapV1\Http\Requests\UpdateVisitorQueryRequest;
use aieapV1\Http\Requests\UpdateInfoUserRequest;
use aieapV1\QueryVisitor;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use aieapV1\Role;
use aieapV1\User; 
use aieapV1\Course;
use aieapV1\Student;
use aieapV1\Day;  
use aieapV1\Timeslot;

use aieapV1\DayTimeslot; 
use aieapV1\CourseTimetable;
use DB;
use aieapV1\Http\Controllers\Controller;
use Mail;
// use Purifier;
class VisitorQueryController extends Controller
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
        return view ('aieap.visitor_query.contact_us');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVisitorQueryRequest $request)
    {
       $visitor=new QueryVisitor;
       $visitor->first_name=strip_tags(Input::get ('first_name'));
       $visitor->last_name=strip_tags(Input::get ('last_name'));
       $visitor->email=strip_tags(Input::get ('email'));
       $visitor->phone=strip_tags(Input::get ('phone'));
       $visitor->nationality=strip_tags(Input::get ('nationality'));
       $visitor->message=strip_tags(Input::get ('message', '<p><em><strong><br>'));
       // $visitor->message=Purifier::clean(Input::get('description'));
      $data= array(
        
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'nationality'=>$request->nationality,
        'bodyMessage'=>strip_tags($request->message) 
        );
      $visitor->save();
       Mail::send('aieap.emails.contact', $data, function($query) use($data){
        $query->from($data['email']);
        $query->to('aieap@loca.com');
        $query->subject('Query');
        });

       Mail::send('aieap.emails.contactToVisitor', $data, function($query) use($data){
        $query->from('aieap@loca.com');
        $query->to($data['email']);
        $query->subject('Query');
        
       });

        
       //$data->save();
       return redirect('/query_confirm');

      /*return  ('Thank you for submitting your query. AIEAP will contact you regarding your query');*/
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
           'visitor'=> QueryVisitor::find($id)
           /*'infouser'=> InfoUser::where('UserId', $id)*/
            );
         return view('aieap.visitor_query.single_visitor_query',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data= array ('visitor'=> QueryVisitor::find($id));
         return view ('aieap.visitor_query.edit_visitor_query',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisitorQueryRequest $request, $id)
    {
       $visitor=QueryVisitor::find ($id);
       $visitor->first_name=strip_tags(Input::get ('first_name'));
       $visitor->last_name=strip_tags(Input::get ('last_name'));
       $visitor->email=strip_tags(Input::get ('email'));
       $visitor->phone=strip_tags(Input::get ('phone'));
       $visitor->nationality=strip_tags(Input::get ('nationality'));
       $visitor->message=strip_tags(Input::get ('message', '<p><em><strong><br>'));
       // $visitor->message=Purifier::clean(Input::get('description'));
       $visitor->save();
       return redirect('/visitor')->with('success',$visitor->first_name. " ".$visitor->last_name. "'s". " ". 'query has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $visitor= QueryVisitor::find($id);
       $visitor->delete();
       return redirect ('/visitor')->with('warning',$visitor->first_name. " ".$visitor->last_name. "'s". " ". 'query has been deleted.');
    }
}
