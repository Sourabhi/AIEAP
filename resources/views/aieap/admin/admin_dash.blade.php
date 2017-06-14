@extends('aieap.master')
@section ('title','Admin Dashboard')
@section ('content')
<div class="container">
 <ol class="breadcrumb">
   <li><a href="index">Home</a></li>
   <li class="active">Admin Dashboard</li>
 </ol>
 
 <div class="row">
   <div class="col-xs-12">
     <div class="panel panel-default">
       <div class="panel-heading">
         <h4> <strong>Administrator Dashboard</strong></h4>
       </div>
       <div class="panel-body">
         <ul class="nav nav-tabs" role="tablist">
           <li role="presentation" class="active"><a href="#timeslots" aria-controls="timeslots" role="tab" data-toggle="tab"><strong>Timeslots</strong></a></li>
           <li role="presentation"><a href="#days" aria-controls="days" role="tab" data-toggle="tab"><strong>Class Days</strong></a></li>
           <li role="presentation"><a href="#courses" aria-controls="courses" role="tab" data-toggle="tab"><strong>Courses</strong></a></li>
           <li role="presentation"><a href="#students" aria-controls="students" role="tab" data-toggle="tab"><strong>Students</strong></a></li>
           <li role="presentation"><a href="#roles" aria-controls="roles" role="tab" data-toggle="tab"><strong>Roles</strong></a></li>
           <li role="presentation"><a href="#users" aria-controls="users" role="tab" data-toggle="tab"><strong>Users</strong></a></li>
           <li role="presentation"><a href="#visitors" aria-controls="visitors" role="tab" data-toggle="tab"><strong>Visitor's Queries</strong></a></li>
         </ul>
          
         <!-- Tab panes -->
           <div class="tab-content">
             
            
             <div role="tabpanel" class="tab-pane active" id="timeslots">
               <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
                 <table class="table table-bordered">
                   <thead>
                     <tr class="info" >
                       <th><strong>ID</strong></th>
                       <th><strong> Timeslot </strong></th>
                       <th>Created_at<br>(Y-M-D)(h:m:s)</th>
                       <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
                     </tr>
                   </thead>
                 
                   <tbody>
                     @foreach ($timeslots as $timeslot)
                       <tr class="active">
                         <td><a href="{{url('timeslot/'. $timeslot->id)}}">{{ $timeslot->id}}</a></td>
                         <td>{{ $timeslot->timeslot}}</td>
                         <td>{{ $timeslot->created_at}}</td>
                         <td>{{ $timeslot->updated_at}}</td>
                       </tr>
                     @endforeach
                   </tbody>
                 </table>
               </div>
               <a class ="btn btn-info" href="{{url('create/timeslot/')}}">Create Timeslot</a>
             </div>
            <div role="tabpanel" class="tab-pane" id="days">
               <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
                 <table class="table table-bordered">
                   <thead>
                     <tr class="info" >
                       <th><strong>ID</strong></th>
                       <th><strong> Day </strong></th>
                       <th>Created_at<br>(Y-M-D)(h:m:s)</th>
                       <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
                     </tr>
                   </thead>
                   <tbody>
                     @foreach ($days as $day)
                       <tr class="active">
                         <td><a href="{{url('day/'.$day->id)}}">{{ $day->id}}</a></td>
                         <td>{{ $day->day}}</td>
                         <td>{{ $day->created_at}}</td>
                         <td>{{ $day->updated_at}}</td>
                       </tr>
                     @endforeach
                   </tbody>
                 </table>
               </div>
               <a class ="btn btn-info" href="{{url('create/day/')}}">Create Day</a>
             </div>
             <div role="tabpanel" class="tab-pane" id="courses">
               <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
                 <table class="table table-bordered">
                   <thead>
                     <tr class="info" >
                       <th><strong>ID</strong></th>
                       <th><strong> Course </strong></th>
                       <th><strong> Start Date </strong></th>
                       <th><strong> Completion Date </strong></th>
                       <th>Created_at<br>(Y-M-D)(h:m:s)</th>
                       <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
                     </tr>
                   </thead>
                   <tbody>
                     @foreach ($courses as $course)
                       <tr class="active">
                         <td><a href="{{url('course/'. $course->id)}}">{{ $course->id}}</a></td>
                         <td>{{ $course->course}}</td>
                         <td>{{ $course->start_date}}</td>
                         <td>{{ $course->completion_date}}</td>
                         <td>{{ $course->created_at}}</td>
                         <td>{{ $course->updated_at}}</td>
                       </tr>
                     @endforeach
                   </tbody>
                 </table>
               </div>
               <a class ="btn btn-info" href="{{url('create/course/')}}">Create Course</a>
               </div>

               <div role="tabpanel" class="tab-pane" id="students">
                 <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
                   <table class="table table-bordered">
                     <thead>
                       <tr class="info" >
                         <th><strong>ID</strong></th>
                         <th><strong> Title </strong></th>
                         <th><strong> First Name </strong></th>
                         <th><strong> Last Name </strong></th>
                         <th><strong> Date of Birth </strong></th>
                         <th><strong> Gender </strong></th>
                         <th><strong> House No </strong></th>
                         <th><strong> Town </strong></th>
                         <th><strong> State/Province </strong></th>
                         <th><strong> Postcode </strong></th>
                         <th><strong> Country </strong></th>
                         <th><strong> Nationality </strong></th>
                         <th><strong> Phone/Mobile </strong></th>
                         <th><strong> Email </strong></th>
                         <th><strong> Comments </strong></th>
                         <th><strong> User ID </strong></th>
                         <th>Created_at<br>(Y-M-D)(h:m:s)</th>
                         <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
                       </tr>
                     </thead>
                   
                     <tbody>
                       @foreach ($students as $student)
                         <tr class="active">
                           <td><a href="{{url('student/'. $student->id)}}">{{ $student->id}}</a></td>
                           <td>{{ $student->title}}</td>
                           <td>{{ $student->first_name}}</td>
                           <td>{{ $student->last_name}}</td>
                           <td>{{ $student->date_of_birth}}</td>
                           <td>{{ $student->gender}}</td>
                           <td>{{ $student->house_no}}</td>
                           <td>{{ $student->town}}</td>
                           <td>{{ $student->state}}</td>
                           <td>{{ $student->postcode}}</td>
                           <td>{{ $student->country}}</td>
                           <td>{{ $student->nationality}}</td>
                           <td>{{ $student->phone}}</td>
                           <td>{{ $student->email}}</td>
                           <td>{{ $student->comments}}</td>
                           <td>{{ $student->user_id}}</td>
                           <td>{{ $student->created_at}}</td>
                           <td>{{ $student->updated_at}}</td>  
                         </tr>
                       @endforeach
                     </tbody>
                   </table>
                 </div>
                 <br>
                 <a class ="btn btn-info" href="{{url('adminEnrolment/')}}">Create Enrolements</a>
               </div>
            
               <div role="tabpanel" class="tab-pane" id="roles">
                <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
                   <table class="table table-bordered">
                     <thead>
                       <tr class="info" >
                         <th><strong>ID</strong></th>
                         <th><strong> Role </strong></th>
                         <th>Created_at<br>(Y-M-D)(h:m:s)</th>
                         <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
                       </tr>
                     </thead>

                     <tbody>
                       @foreach ($roles as $role)
                         <tr class="active">
                           <td><a href="{{url('role/'. $role->id)}}">{{ $role->id}}</a></td>
                           <td>{!!$role->role!!}</td>
                           <td>{{ $role->created_at}}</td>
                           <td>{{ $role->updated_at}}</td>
                         </tr>
                       @endforeach
                     </tbody>
                   </table>
                 </div>
                 <a class ="btn btn-info" href="{{url('create/role/')}}">Create Roles</a>
               </div>

               <div role="tabpanel" class="tab-pane" id="users">
                 <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
                   <table class="table table-bordered">
                     <thead>
                       <tr class="info" >
                         <th><strong>ID</strong></th>
                         <th><strong> Name </strong></th>
                         <th><strong> Email </strong></th>
                         <th><strong> Password </strong></th>
                         <!--<th><strong>Student</strong></th>
                         <th><strong>Administrator</strong></th>
                         <th><strong>Teacher</strong></th>
                         <th><strong>Staff</strong></th>-->
                         <th>Created_at<br>(Y-M-D)(h:m:s)</th>
                         <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
                       </tr>
                     </thead>

                     <tbody>
                       @foreach ($users as $user)
                         <tr class="active">
                           <td><a href="{{url('user/'. $user->id)}}">{{ $user->id}}</a></td>
                           <td>{{ $user->name}}</td>
                           <td>{{ $user->email}}</td>
                           <td>{{ $user->password}}</td>
                           <!--<lable for="for_student"><td><input id="for_student" type="checkbox" {{$user->hasRole('Student')?'checked':''}} name="role_student" label="1"></td>.</label>
                           <lable for="for_admin"><td><input id="for_admin" type="checkbox"  {{$user->hasRole('Admin')?'checked':''}}  name="role_admin" label="2"></td>.</label>
                           <lable for="for_teacher"><td><input id="for_teacher" type="checkbox" {{$user->hasRole('Teacher')?'checked':''}} name="role_teacher" label="3"></td>.</label>
                           <lable for="for_staff"><td><input id="for_staff" type="checkbox" {{$user->hasRole('Staff')?'checked':''}} name="role_staff" label="4"></td>.</label>-->
                           <td>{{ $user->created_at}}</td>
                           <td>{{ $user->updated_at}}</td>
                         </tr>
                       @endforeach
                     </tbody>
                   </table>
                 </div>
                 <br>
                 <a class ="btn btn-info" href="{{url('/register/')}}">Create Register</a>
               </div>

               <div role="tabpanel" class="tab-pane" id="visitors">
                 <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
                   <table class="table table-bordered">
                     <thead>
                       <tr class="info" >
                         <th>ID</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Email</th>
                         <th>Phone</th>
                         <th>Nationality</th>
                         <th>Message</th>
                         <th>Created_at<br>(Y-M-D)(h:m:s)</th>
                         <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
                       </tr>
                     </thead>
                       
                     <tbody>
                       @foreach ($queryvisitors as $visitor)
                         <tr class="active">
                           <td><a href="{{url('visitor/'. $visitor->id)}}">{{ $visitor->id}}</a></td>
                           <td>{{ $visitor->first_name}}</td>
                           <td>{{ $visitor->last_name}} </td>
                           <td>{{ $visitor->email}} </td>
                           <td>{{ $visitor->phone}} </td>
                           <td>{{ $visitor->nationality}} </td>
                           <td>{{ $visitor->message}} </td>
                           <td>{{ $visitor->created_at}} </td>
                           <td>{{ $visitor->updated_at}} </td>
                         </tr>
                       @endforeach
                     </tbody>
                   </table>
                 </div>
                 <br>
                 <a class ="btn btn-info" href="{{url('restore/visitor/')}}">Restore Visitor</a>
               </div>
               </div>
           </div>
       </div>
     </div>
   </div> 
 </div>


@endsection
 
                    
                   
                   
                