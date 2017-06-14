@extends('aieap.master')
@section('title','Update Course day')
@section('stylesheets3')
{!!Html::style('css/select2.min.css')!!}
{!!Html::style('css/datepicker.css') !!}

<link href="{{ asset('Trumbowyg-master/dist/ui/trumbowyg.css') }}" rel="stylesheet" type="text/css" >
@endsection
@section('content')



<div class="container"> 
  <ol class="breadcrumb">
    <li><a href="index">Home</a></li>
    <li class="active">Edit Course and Day</li>
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
    <div class=" col-sm-offset-2 col-sm-8">
     <div class="panel panel-default "> 
       <div class="panel-heading">  <h4> <strong> Edit Course-Day Form </strong></h4>
       </div>
       <div class="panel-body">
         {!!Form::open(array('url' => 'edit/course_day/'. $course->id)) !!}
         {!!Form::hidden('_method', 'PUT') !!}
           <div class="form-group">
             {!!Form::label('course', 'Course *', ['class'=>'col-sm-4 control-label']);!!} 
               <div class="col-sm-8">
                 {!!Form::text('course', $course->course,['class' => 'form-control', 'required'=>'required']);!!}<br>
               </div>
           </div>
 
       
           <div class="form-group">
             {!!Form::label('start_date', 'Start Date *', ['class'=>'col-sm-4 control-label']);!!} 
               <div class="col-sm-8">
                 {!!Form::text('start_date', $course->start_date,['placeholder'=>'dd-mm-yy','class' => 'form-control datepicker', 'required'=>'required']);!!}<br>
               </div>
           </div>

           <div class="form-group">
             {!!Form::label('completion_date', 'Completion Date *', ['class'=>'col-sm-4 control-label']);!!} 
               <div class="col-sm-8">
                 {!!Form::text('completion_date', $course->completion_date,['class' => 'form-control datepicker', 'required'=>'required']);!!}<br>
               </div>
           </div> 
            <div class="form-group">
               {!!Form::label('description', "Course's Description *",['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::textarea('description',$course->description,['size'=>'40x5','class' => 'form-control', 'required'=>'required', 'id'=>'trumbowyg-demo']);!!}<br>
                 </div>
             </div>
           <div class="form-group">
             {!!Form::label('dayTimeslot', 'Day and Timeslots *', ['class'=>'col-sm-4 control-label']);!!} 
               <div class="col-sm-8">
                 {!!Form::select('dayTimeslot[]',$day_timeslot, null, ['class'=>'select2-multi form-control', 'multiple'=>'multiple', 'id'=>'dayTimeslot'])!!}
                 <br><br>
               </div>
           </div>
           <div class="from-group">
             <div class=" col-xs-4 col-sm-offset-4 col-sm-4  col-md-1 col-lg-offset-4 col-lg-2 ">
               {!! Form::submit('Update',['class' => 'btn btn-primary']);!!}
             </div> 
           </div>
         {!! Form::close() !!}
         {!!Form::open(array('url' => 'delete/course_day/'. $course->id)) !!}
         {!!Form::hidden('_method', 'DELETE') !!}
           <div class="from-group">
             <div class=" col-xs-offset-1 col-xs-5  col-sm-offset-0 col-sm-2 col-md-offset-2 col-md-4 lg-offset-3 col-lg-1 ">
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
<br> <br>
@endsection
@section('scripts3')

<script src="{{ URL:: asset('Trumbowyg-master/dist/trumbowyg.js') }}">
</script>
<script src="{{ URL:: asset('js/trumbowyg_text.js') }}">
</script>

{!!Html::script('js/select2.min.js')!!}
{!!Html::script('js/datepicker.js')!!}
{!!Html::script('js/datepicker_yyyy_mm_dd.js')!!}
<script type="text/javascript"> 

$('.select2-multi').select2();
$('.select2-multi').select2().val({!!json_encode($course->day_timeslot()->getRelatedIds())!!}).trigger('change');

</script>
@endsection
