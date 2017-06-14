@extends('aieap.master')
@section ('title','Single User')
@section ('content')
<br><br><br>
<div class="container">
 <div class=" col-xs-12">
   <div class="panel panel-default"> 
     <div class="panel-heading"><h4><strong>{{$user->name}} 's Page!</strong></h4>
     </div>
     <div class="panel-body">
       <h5> <strong> Name: </strong>{{$user->name}} </h5>
       <h5> <strong> Email: </strong>{{$user->email}} </h5>
       <h5> <strong> Role: </strong>
         @foreach ($user->roles as $role)
           {{ $role->role}}
         @endforeach </h5>
       <div class="row">
         <div class= "col-xs-12 col-sm-3 col-md-2 col-lg-3">
           <a href="{{url('edit/user/'.$user->id)}}"> <em class="fa fa-pencil" aria-hidden="true"></em> Edit User Profile</a> &nbsp; 
         </div>
         <div class= "col-xs-12 col-sm-3 col-md-2 col-lg-3">
           <a href="{{url('admin/user/'.$user->id)}}"> <em class ="fa fa-gear"></em> Update Role</a> &nbsp;  
         </div>
         <div class= "col-xs-12 col-sm-3 col-md-2">
           <a href="{{URL::previous()}}"> <em class="fa fa-arrow-left" aria-hidden="true"></em> Back </a>
         </div>
       </div> 
     </div>
   </div>
 </div> 
</div>
 
 

@endsection
    <!-- <a class ="btn btn-warning" href="{{url('admin/user/'.$user->id)}}">
      <i class ="fa fa-gear"></i> Update Role</a> &nbsp;  
<a class ="btn btn-primary" href="{{URL::previous()}}"> Back </a> -->

   