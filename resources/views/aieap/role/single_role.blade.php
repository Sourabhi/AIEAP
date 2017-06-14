@extends('aieap.master')
@section ('title','Single Role')
@section ('content')
<br><br><br>
<div class="container">
 <div class=" col-xs-12">
   <div class="panel panel-default"> 
     <div class="panel-heading">  <h4> <strong> This is a Single Role Page! </strong></h4>
     </div>
     <div class="panel-body">
       <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
         <table class="table table-bordered">
           <thead>
             <tr class="info">
               <th>ID</th>
               <th>Role</th>
               <th>Description </th>
               <th>Created_at<br>(Y-M-D)(h:m:s)</th>
               <th>Updated_at<br>(Y-M-D)(h:m:s)</th>
             </tr>
           </thead>

           <tbody>
             <tr class="active">
               <td>{{ $role->id}}</td>
               <td>{{$role->role}}</td>
               <td>{{$role->description}}</td>
               <td>{{ $role->created_at}} </td>
               <td>{{ $role->updated_at}} </td>
             </tr>
           </tbody>
         </table>
       </div>
       <div class="row">
         <div class= "col-xs-12 col-sm-3 col-md-2">
            <a href="{{url('edit/role/'.$role->id)}}"> <em class ="fa fa-gear"></em> Update Role</a>
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