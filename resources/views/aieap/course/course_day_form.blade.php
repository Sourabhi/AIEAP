@extends('aieap.master')
@section('title','Course_Day')
@section('stylesheets2')
{!!Html::style('css/select2.min.css')!!}
{!!Html::style('css/datepicker.css') !!}
<link href="{{ asset('Trumbowyg-master/dist/ui/trumbowyg.css') }}" rel="stylesheet" type="text/css" >
@endsection



@section('content')
<div class="container"> 
 <ol class="breadcrumb">
   <li><a href="index">Home</a></li>
   <li class="active">Course</li>
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
         <div class="panel-heading">  <h4> <strong> Course-Day Form </strong></h4>
         </div>
         <div class="panel-body">
           {!!Form::open(array('url' => 'create/course', 'data-toggle'=>'validator')) !!}
             <div class="form-group">
               {!!Form::label('course', 'Course *', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('course', '',['placeholder'=>'Give a course name','class' => 'form-control', 'required'=>'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('start_date', 'Start Date*', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('start_date', '',['placeholder'=>'yyyy-mm-dd','class' => 'form-control datepicker', 'required'=>'required']);!!}<br>
                 </div>
             </div>

             <div class="form-group">
               {!!Form::label('completion_date', 'Completion Date*', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::text('completion_date', '',['placeholder'=>'yyyy-mm-dd','class' => 'form-control datepicker']);!!}<br>
                 </div>
             </div>
             <div class="form-group">
               {!!Form::label('description', "Course's Description *",['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   {!!Form::textarea('description','',['placeholder'=>"Course's description", 'size'=>'40x5','class' => 'form-control', 'required'=>'required', 'id'=>'trumbowyg-demo']);!!}<br>
                 </div>
             </div>
             <div class="form-group">
               {!!Form::label('dayTimeslot', 'Day and Timeslot *', ['class'=>'col-sm-4 control-label']);!!} 
                 <div class="col-sm-8">
                   <select class="form-control select2-multi" id="dayTimeslot" name="dayTimeslot[]" multiple="multiple" required="required">
                     @foreach($day_timeslot as $day_timeslot)
                       @foreach($day_timeslot->hasDays as $days)
                         @foreach($day_timeslot->hasTimeslots as $timeslots)
                           <option value='{{$day_timeslot->id}}'>{{$days->day}} : {{$timeslots->starttime}} to {{$timeslots->endtime}} </option> 
                         @endforeach
                       @endforeach
                     @endforeach
                   </select> 
                   <br><br>
                 </div>
             </div>

             <div class="from-group">
               <div class="col-xs-12 col-sm-offset-4 col-sm-8">
                 {!! Form::submit('Submit',['class' => 'btn btn-success']);!!}
               </div>
             </div>
           {!! Form::close() !!}
         </div>
       </div>
      </div>
   </div>
 </div>
 <br><br><br>
@endsection
@section('scripts2')
{!!Html::script('js/select2.min.js')!!}
{!!Html::script('js/datepicker.js')!!}
{!!Html::script('js/datepicker_yyyy_mm_dd.js')!!}

<script src="{{ URL::asset('Trumbowyg-master/dist/trumbowyg.js') }}">
</script>
<script src="{{ URL::asset('js/trumbowyg_text.js') }}">

</script>


<script type="text/javascript"> 
$('.select2-multi').select2();

</script>
@endsection

