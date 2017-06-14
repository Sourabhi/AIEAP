@extends('aieap.master')
@section ('title','Modify Role')
@section ('content')
<br><br><br>
<div class="container">
 <div class=" col-xs-12">
   <div class="panel panel-default"> 
     <div class="panel-heading">  <h4> <strong> Edit Assigned User's Role! </strong></h4>
     </div>
     <div class="panel-body">
       <h4> <strong> Name: </strong>{{$user->name}} </h4>
       {!!Form::open(array('url' => 'admin/user/'. $user->id)) !!}
       {!!Form::hidden('_method', 'PUT') !!}
         <div class="form-group">
          <fieldset>
           @foreach ($roles as $role)
             <div class="radio">
               <label for="{{$role->id}}">
                 <input type="radio" name="role" id="{{$role->id}}" value="{{$role->id}}" <?php if($user->hasRole($role->role)) {print "checked";}?>>
                 {{$role->role}}
               </label>
             </div>
           @endforeach 
           </fieldset>
         </div>

         <div class="from-group">
           <div class="col-xs-6  col-sm-2">
             {!! Form::submit('Update',['class' => 'btn btn-warning']);!!}
           </div> 
         </div>
       {!! Form::close() !!}
       <div class="col-xs-6  col-sm-2">
       <a class ="btn btn-primary" href="{{URL::previous()}}"> <em class="fa fa-arrow-left" aria-hidden="true"></em> Back </a>
       </div>
     </div>   
   </div> 
 </div> 
</div>
@endsection