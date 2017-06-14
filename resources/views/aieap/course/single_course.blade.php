@extends('aieap.master')
@section ('title','Single Course')
@section('content')
<br> <br>
 <div class="container">
   <div class=" col-xs-12">
     <div class="panel panel-default"> 
       <div class="panel-heading">  
         <h4> <strong>  {{$course->course}}--- Timetable  </strong></h4>
       </div>
       <div class="panel-body">
         <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
           <table class="table table-bordered">
             <thead>
               <tr class="info">
                 <th>ID</th>
                 <th>Course</th>
                 @foreach ($course->day_timeslot as $day_timeslot)
                 <th>Day</th>
                 <th>Timeslot</th>
                 @endforeach
                  <th>Description</th>
                 <th>Created_at<br>(Y-M-D)(h:m:s)</th>
                 <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
               </tr>
             </thead>

             <tbody>
               <tr class="active">
                 <td>{{ $course->id}}</td>
                 <td>{{ $course->course}}</td>
                 @foreach ($course->day_timeslot as $day_timeslot)
                   @foreach($day_timeslot->hasDays as $days)
                     <td>{{ $days->day}}</td>   
                   @endforeach
                   @foreach($day_timeslot->hasTimeslots as $timeslots)
                     <td>{{ $timeslots->timeslot}}: {{$timeslots->starttime}} to {{$timeslots->endtime}}</td>
                   @endforeach
                 @endforeach 
                 <td>{!!$course->description!!} </td>
                 <td>{{ $course->created_at}} </td>
                 <td>{{ $course->updated_at}} </td>
               </tr>
             </tbody>
           </table>
         </div>
         <div class="row">
           <div class= "col-xs-12 col-sm-3 col-md-2">
             <a href="{{url('edit/course_day/'.$course->id)}}"><em class ="fa fa-gear"></em> Update Course</a> 
           </div>
           <div class= "col-xs-12 col-sm-3 col-md-2">
             <a href="{{URL::previous()}}"><em class="fa fa-arrow-left" aria-hidden="true"></em> Back </a>
           </div>
         </div>
       </div> 
     </div> 
   </div>
 </div>
@endsection