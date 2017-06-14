@extends('aieap.master')
@section('title','Update Student profile')
@section('stylesheets5')
{!!Html::style('css/select2.min.css')!!}
{!!Html::style('country-select-js-master/build/css/countrySelect.css')!!}
{!!Html::style('css/datepicker.css') !!}
<!-- <link rel="stylesheet" href="country-select-js-master/build/css/countrySelect.css"> -->
@endsection
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
         <div class="panel-heading">  <h4> <strong> Update Student Profile </strong></h4>
         </div>
         <div class="panel-body">
           {!!Form::open(array('url' => 'edit/student/'. $student->id, 'files'=>'true')) !!}
             {!!Form::hidden('_method', 'PUT') !!}
               <div class="form-group">
                 {!!Form::label('title', 'Title *', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::select('title',['Mr.'=>'Mr.', 'Mrs.'=>'Mrs.','Miss'=>'Miss','Dr'=>'Dr','Professor'=>'Professor'], $student->title, ['class' => 'form-control']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('first_name', 'First Name *', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::text('first_name',$student->first_name,['class' => 'form-control','required' => 'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('last_name', 'Last Name *', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::text('last_name',$student->last_name,['class' => 'form-control','required' => 'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('date_of_birth', 'Date of Birth *', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::text('date_of_birth',$student->date_of_birth,['class' => 'form-control datepicker','required' => 'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('gender', 'Gender*', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::select('gender',['Male'=>'Male', 'Female'=>'Female','Prefer not to say'=>'Prefer not to say'], $student->gender, ['class' => 'form-control','required' => 'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('house_no', 'House No.*', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::text('house_no',$student->house_no,['class' => 'form-control','required' => 'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('town', 'Town*', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::text('town',$student->town,['class' => 'form-control','required' => 'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('state', 'State/Province*', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::text('state',$student->state,['class' => 'form-control','required' => 'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('postcode', 'Postcode*', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::text('postcode',$student->postcode,['class' => 'form-control','required' => 'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('country', 'Country*', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                    {!!Form::text('country', $student->country,['class' =>'form-control country','required' => 'required', 'id'=>'country']);!!}<br> <br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('nationality', 'Nationality*', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::text('nationality',$student->nationality,['class' => 'form-control','required' => 'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('phone', 'Phone/Mobile*', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::text('phone',$student->phone,['class' => 'form-control','required' => 'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('email', 'Email*', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::email('email',$student->email,['class' => 'form-control','required' => 'required']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('courses', 'Courses *', ['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::select('courses[]',$courses, null, ['class'=>'select2-multi form-control','id'=>'courses', 'multiple'=>'multiple']);!!}
                     <br><br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('comments', 'Comments *',['class'=>'col-sm-4 control-label']);!!} 
                   <div class="col-sm-8">
                     {!!Form::textarea('comments',$student->comments,['size'=>'40x5','class' => 'form-control']);!!}<br>
                   </div>
               </div>

               <div class="form-group">
                 {!!Form::label('image', 'Upload a New Photo (Size: 10-500 KB)',['class'=>'col-sm-4 control-label']);!!} <br>
                   <div class="col-sm-8">
                     {!!Form::file('image');!!}<br>
                   </div>
               </div>

               <div class="from-group">
                 <div class=" col-xs-4 col-sm-4  col-md-1  col-lg-2 ">
                   {!! Form::submit('Update',['class' => 'btn btn-primary']);!!}
                 </div> 
               </div>
           {!! Form::close() !!}

           {!!Form::open(array('url' => 'delete/student/'. $student->id)) !!}
           {!!Form::hidden('_method', 'DELETE') !!}
             <div class="from-group">
               <div class=" col-xs-offset-3 col-xs-5  col-sm-offset-1 col-sm-2 col-md-offset-2 col-md-4 lg-offset-3 col-lg-1 ">
                 {!! Form::submit('Delete',['class' => 'btn btn-warning']);!!}<br> <br>
               </div> 
             </div>
           {!! Form::close() !!}
           <div class="col-xs-12 col-sm-offset-4 col-sm-8 col-md-offset-4 col-md-8 col-lg-2 ">
             <a href="{{URL::previous()}}"> <em class="fa fa-arrow-left" aria-hidden="true"></em> Back </a>
           </div>
         </div>
       </div>
     </div>
   </div>
</div>
<br><br>
@endsection

@section('scripts5')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

{!!Html::script('country-select-js-master/build/js/countrySelect.min.js')!!}
{!!Html::script('js/country_list.js')!!}
<!--<script src="country-select-js-master/build/js/countrySelect.min.js"></script>
<script src="js/country_list.js"></script>-->
{!!Html::script('js/datepicker.js')!!}
{!!Html::script('js/datepicker_yyyy_mm_dd.js')!!}
{!!Html::script('js/select2.min.js')!!}
<script type="text/javascript"> 
$('.select2-multi').select2();
$('.select2-multi').select2().val({!!json_encode($student->courses()->getRelatedIds())!!}).trigger('change');
</script>
@endsection

