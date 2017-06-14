@extends('aieap.master')
@section('title','Edit User Profile')
@section('content')

<br><br>
<div class="container">
   @if (count($errors) > 0)
     <div class="alert alert-danger">
       <ul>
         @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
         @endforeach
       </ul>
     </div>
   @endif

   <div class="row">
     <div class=" col-sm-offset-2 col-sm-8 ">
       <div class="panel panel-default"> 
         <div class="panel-heading">  <h4> <strong> Edit User Profile </strong></h4>
         </div>
         <div class="panel-body">
           {!!Form::open(array('url' => 'edit/user/'. $user->id)) !!}
           {!!Form::hidden('_method', 'PUT') !!}
             <div class="form-group">
               {!!Form::label('name', 'Name *',['class'=>'col-sm-4 control-label']);!!}
                 <div class="col-sm-8">
                   {!!Form::text('name', $user->name,['placeholder'=>'Name','class' => 'form-control', 'required'=>'required']);!!}<br>
                 </div>
             </div>
             

             <div class="form-group">
               {!!Form::label('email', 'Email *',['class'=>'col-sm-4 control-label']);!!}
                 <div class="col-sm-8">
                   {!!Form::email('email', $user->email,['placeholder'=>'example@gmail.com','class' => 'form-control','required'=>'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('password', 'New Password',['class'=>'col-sm-4 control-label']);!!}
                 <div class="col-sm-8">
                   {!!Form::password('password', ['placeholder'=>'New Password', 'class' => 'form-control']);!!}<br>
                   <p>Password must contain at least 8 characters and include 1 numeric character, 1 uppercase character, 1 lowercase character and 1 special character.</p>
                 </div>

             </div>

              <div class="form-group">
               {!!Form::label('password_confirmation', 'Password Confirmation',['class'=>'col-sm-4 control-label']);!!}
                 <div class="col-sm-8">
                   {!!Form::password('password_confirmation', ['placeholder'=>'Confirm new password', 'class' => 'form-control']);!!}<br>
                 </div>
             </div>

             <div class="from-group">
               <div class="col-xs-6 col-sm-offset-4 col-sm-2 col-md-offset-5 col-md-1 col-lg-offset-5 col-lg-1 ">
                 {!! Form::submit('Update',['class' => 'btn btn-warning']);!!}
               </div> 
             </div>

           {!! Form::close() !!}
   
             <div class="col-xs-6 col-sm-offset-2 col-sm-2 col-md-offset-2 col-md-1 col-lg-offset-2 col-lg-1 ">
               <a class ="btn btn-primary" href="{{URL::previous()}}"> <em class="fa fa-arrow-left" aria-hidden="true"></em> Back </a>
             </div>
         </div>
       </div>
     </div>
   </div>
</div>
<br> <br>
@endsection


