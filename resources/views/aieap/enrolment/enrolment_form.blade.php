@extends('aieap.master')
@section('title','Online Enrolment Form ')
@section('stylesheets4')
{!!Html::style('css/select2.min.css')!!}
{!!Html::style('css/datepicker.css') !!}
{!!Html::style('css/datepicker.css') !!}
<link rel="stylesheet" href="country-select-js-master/build/css/countrySelect.css">

@endsection
@section('content')

<div class="container"> 
 <ol class="breadcrumb">
    <li><a href="index">Home</a></li>
    <li>Enrolment</li>
    <li class="active">Online Enrolment Form</li>
 </ol> 
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
     <div class=" col-sm-offset-1 col-sm-10 ">
       <div class="panel panel-default "> 
         <div class="panel-heading">  <h4><strong> Online Enrolment Form </strong></h4>
         </div>
         <div class="panel-body">
           {!!Form::open(array('url' => 'enrolment_form', 'id'=> 'MyForm','data-toggle'=>'validator', 'files'=>'true')) !!}
             <div class="form-group">
               {!!Form::label('title', 'Title', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::select('title',['Mr.'=>'Mr.', 'Mrs.'=>'Mrs','Miss'=>'Miss', 'Dr'=>'Dr', 'Professor'=>'Professor'], null, ['placeholder'=>'Select a title','class' => 'form-control']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('first_name', 'First Name *', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('first_name','',['placeholder'=>'First Name','class' => 'form-control','required' => 'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('last_name', 'Last Name *', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('last_name','',['placeholder'=>'Last Name','class' => 'form-control','required' => 'required']);!!}<br>
                 </div>
             </div>
             
             <div class="form-group">
               {!!Form::label('date_of_birth', 'Date of Birth *', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('date_of_birth','',['placeholder'=>'yyyy-mm-dd','class' => 'form-control datepicker','required' => 'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('gender', 'Gender*', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::select('gender',['Male'=>'Male', 'Female'=>'Female','Prefer not to say'=>'Prefer not to say'], null, ['placeholder'=>'Select a gender','class' => 'form-control','required' => 'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('house_no', 'House No.*', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('house_no','',['placeholder'=>'Give House No.','class' => 'form-control','required' => 'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('town', 'Town*', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('town','',['placeholder'=>'Town','class' => 'form-control','required' => 'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('state', 'State/Province*', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('state','',['placeholder'=>'State/Province','class' => 'form-control','required' => 'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('postcode', 'Postcode*', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('postcode','',['placeholder'=>'Postcode','class' => 'form-control','required' => 'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('country', 'Country*', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('country','',['placeholder'=>'Country','class' =>'form-control country','required' => 'required', 'id'=>'country']);!!}<br> <br>

                 </div>
             </div>


             <div class="form-group">
               {!!Form::label('nationality', 'Nationality*', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('nationality','',['placeholder'=>'Nationality','class' => 'form-control','required' => 'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('phone', 'Phone/Mobile*', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('phone','',['placeholder'=>'Example: 001234567898','class' => 'form-control','required' => 'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('email', 'Email*', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::email('email','',['placeholder'=>'example@gmail.com','class' => 'form-control','required' => 'required']);!!}<br>
                 </div>
               </div>


              <div class="form-group">
               {!!Form::label('courses', 'Courses *', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   <select class="form-control select2-multi" name="courses[]" multiple="multiple" id="courses" required="required">
                     @foreach($courses as $course)
                       <option value='{{$course->id}}'>{{$course->course}}</option> 
                     @endforeach
                   </select> 
                   <br><br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('comments', 'Comments',['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::textarea('comments','',['placeholder'=>'Any comments', 'size'=>'40x5','class' => 'form-control']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('image', 'Upload Your Photo (Size: 10-500 KB)',['class'=>'col-sm-4 control-label']);!!} <br>
                 <div class="col-sm-8">
                   {!!Form::file('image');!!}<br>
                 </div>
             </div>

             <div class="from-group">
               <div class="col-xs-6 col-sm-4 col-md-4 col-lg-offset-4 col-lg-4">
                 {!! Form::submit('Submit',['class' => 'btn btn-success']);!!}
               </div>
             </div>
           {!! Form::close() !!}
           <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
             <button type="button"  class="btn btn-warning" onclick="FormReset()"> <strong> Reset</strong></button>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <br><br><br>
@endsection
@section('scripts4')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="country-select-js-master/build/js/countrySelect.min.js"></script>
<script src="js/country_list.js"></script>
{!!Html::script('js/select2.min.js')!!}
{!!Html::script('js/datepicker.js')!!}
{!!Html::script('js/datepicker_yyyy_mm_dd.js')!!}
<script type="text/javascript"> 
$('.select2-multi').select2();

</script>
@endsection
