@extends('aieap.master')
@section ('title','Single Visitor Query')
@section ('content')
<br><br><br>
<div class="container">
   <div class=" col-xs-12">
     <div class="panel panel-default"> 
       <div class="panel-heading">  <h4> <strong> This is a Single Visitor's Query Page! </strong></h4>
       </div>
       <div class="panel-body">
         <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
           <table class="table table-bordered">
             <thead>
               <tr class="info">
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
               <tr class="active">
                 <td>{{ $visitor->id}}</td>
                 <td>{{ $visitor->first_name}}</td>
                 <td>{{ $visitor->last_name}} </td>
                 <td>{{ $visitor->email}} </td>
                 <td>{{ $visitor->phone}} </td>
                 <td>{{ $visitor->nationality}} </td>
                 <td>{{ $visitor->message}} </td>
                 <td>{{ $visitor->created_at}} </td>
                 <td>{{ $visitor->updated_at}} </td>
               </tr>
             </tbody>
           </table>
         </div>
           <div class="row">
         <div class= "col-xs-12 col-sm-4 col-md-4 col-lg-3">
           <a href="{{url('edit/query/'.$visitor->id)}}"><em class ="fa fa-gear"></em> Update Visitor's Query</a> 
         </div>
         <div class="col-xs-12 col-sm-2 col-md-4 col-lg-3">
           <a href="{{URL::previous()}}"><em class="fa fa-arrow-left" aria-hidden="true"></em> Back </a>
         </div>
       </div> 
         
       </div> 
     </div> 
   </div>
 </div>
@endsection