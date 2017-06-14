<!DOCTYPE html>
<html lang="en">
<head>
<title>aieap|@yield ('title')</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href="{{ asset('css/styles1.css') }}" rel="stylesheet" type="text/css" >
<style type="text/css" >
   #map-container { position: relative; height: 250px; width:100%; }
</style>
<script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script> 
</head>

<body>
   <nav class="navbar navbar-default" data-spy="affix" data-offset="150" >
     <div class="container-fluid"> 
       <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span>                
         <span class="icon-bar"></span>                
         <span class="icon-bar"></span>                
         <span class="icon-bar"></span>            
       </button>
      
       <div class="collapse navbar-collapse" id="navbarCollapse">
         <ul class="nav navbar-nav">
           <li class="{{ Request::is('index') ? 'active' : '' }}"><a href="{{url('index/')}}">Home <span class="sr-only">(current)</span></a></li>
           <li class="{{ Request::is('about_us')||Request::is('facilities') ? 'dropdown active' : '' }}"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
             <ul class="dropdown-menu">
               <li ><a href="{{url('about_aieap/')}}"> About AIEAP <span class="sr-only">(current)</span></a></li>
               <li><a href="{{url('facilities/')}}">Facilities <span class="sr-only">(current)</span></a></li>
             </ul>
           </li>
           <li class="{{ Request::is('academic_english')||Request::is('beginners')||Request::is('general_english')||Request::is('high_school')||Request::is('junior')||Request::is('professional')||Request::is('pronunciation_fluency')||Request::is('ielts') ? 'dropdown active' : '' }}"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Courses <span class="caret"></span></a>
             <ul role="menu" class="dropdown-menu">
               <li><a href="{{url('academic_english/')}}">Academic English Course <span class="sr-only">(current)</span></a></li>
               <li><a href="{{url('beginners/')}}">For Beginners<span class="sr-only">(current)</span></a></li>
               <li><a href="{{url('general_english/')}}">General English<span class="sr-only">(current)</span></a></li>
               <li><a href="{{url('high_school/')}}">For High School Students <span class="sr-only">(current)</span></a></li>
               <li><a href="{{url('junior/')}}">Junior Program <span class="sr-only">(current)</span></a></li>
               <li><a href="{{url('professional/')}}">Professional English <span class="sr-only">(current)</span></a></li>
               <li><a href="{{url('pronunciation_fluency/')}}">Pronunciation and Fluency Programs <span class="sr-only">(current)</span></a></li>
               <li><a href="{{url('ielts/')}}">IELTS Preparation <span class="sr-only">(current)</span></a></li>
             </ul>
           </li>
           <li class="{{ Request::is('courses_fees') ? 'active' : '' }}"> <a href="{{url('courses_fees/')}}">Fees <span class="sr-only">(current)</span></a> </li>
           <li class="{{ Request::is('enrolment_process')||Request::is('conditions')||Request::is('enrolment_form') ? 'dropdown active' : '' }}"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Enrolment <span class="caret"></span></a>
           <ul role="menu" class="dropdown-menu">
              <li><a href="{{url('enrolment_process/')}}">Enrolment Process <span class="sr-only">(current)</span></a></li>
              <li><a href="{{url('conditions/')}}"> Conditions of Acceptance <span class="sr-only">(current)</span></a></li>
              <li><a href="{{url('enrolment_form/')}}">Online Enrolment Form <span class="sr-only">(current)</span></a></li>
           </ul>
           </li>

           <!--<ul class="nav navbar-nav navbar-right">-->
             @if(Auth::user())
               <li class="{{ Request::is('admin_dash') ? 'active' : '' }}">
                 <a href="{{url('admin_dash/')}}">Admin <span class="sr-only">(current)</span></a>
               </li>
             @endif
             <!-- Authentication Links -->
             @if (Auth::guest())
               <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">Login<span class="sr-only">(current)</span></a></li>
               <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ url('/register') }}">Register<span class="sr-only">(current)</span></a></li>
             @else
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                   {{ Auth::user()->name }} <span class="caret"></span>
                 </a>
                 <ul class="dropdown-menu" role="menu">
                   <li><a href="{{ url('/logout') }}"><em class="fa fa-btn fa-sign-out"></em>Logout</a></li>
                 </ul>
               </li>
             @endif
           <!--</ul>-->
         </ul>
       </div><!-- /.navbar-collapse --> 
     </div> <!-- /.container-fluid --> 
   </nav>

   <!--container carousel-->
   <div class="container">
     <div class="row">
       <div class="col-xs-12">
         <div class="carousel slide" data-ride="carousel" id="AIEAP">
           <ol class="carousel-indicators">
             <li data-target="#AIEAP" data-slide-to="0" class="active"></li>
             <li data-target="#AIEAP" data-slide-to="1"></li>
             <li data-target="#AIEAP" data-slide-to="2"></li>
             <li data-target="#AIEAP" data-slide-to="3"></li>
           </ol>
       
           <div class="carousel-inner">
             <div class="item active"> <img  src="{{URL::asset('/image/AIEAP_web1.png')}}" class="img-responsive" alt="AIEAP1 picture student reading"> </div>
             <div class="item"> <img  src="{{URL::asset('/image/AIEAP_web2.png')}}" class="img-responsive" alt="AIEAP2 picture student graduation" > </div>
             <div class="item"> <img  src="{{URL::asset('/image/AIEAP_web3.png')}}" class="img-responsive" alt="AIEAP3 picture student studying"> </div>
             <div class="item"> <img  src="{{URL::asset('/image/AIEAP_web4.png')}}" class="img-responsive" alt="AIEAP4 picture student graduation" > </div>
           </div>
           
           <!--carousel-inner--> 
        
           <a class="left carousel-control" 
              href="#AIEAP" role="button" 
              data-slide="prev"> <span class="glyphicon  glyphicon-chevron-left"></span> </a> <a class="right carousel-control" 
              href="#AIEAP" role="button" 
              data-slide="next"> <span class="glyphicon  glyphicon-chevron-right"></span> </a> </div>
           <!--carousel--> 
       </div>
     </div>
     @if(Session::has('success'))
       <div class= "alert alert-success" role="alert">
         {{Session::get('success')}}
       </div>
     @elseif(Session::has('warning'))
       <div class= "alert alert-warning" role="alert">
         {{Session::get('warning')}}
       </div>
      @endif
   </div>
   @yield('content')
        
   @yield ('DayTimeslot')
   @yield('DayTimeslotForm')
   @yield('stylesheets')
   @yield('scripts')
   @yield('EditDayTimeslot')
   @yield('stylesheets1')
   @yield('scripts1')
   @yield ('CourseDay')
   @yield('stylesheets2')
   @yield('scripts2')
   @yield('EditCourseDay')
   @yield('stylesheets3')
   @yield('scripts3')
   @yield ('OnlineEnrolmentForm')
   @yield('stylesheets4')
   @yield('scripts4')
   @yield('EditStudentProfile')
   @yield('stylesheets5')
   @yield('scripts5')
        
  <footer class="container-fluid">
   <div class="row">
     <div class="col-md-6">
       <div class="h3"> Contact Us </div>
         <ul class="nav nav-pills nav-stacked">
           <li class="{{ Request::is('contact_us') ? 'active' : '' }}"><a href="{{url('contact_us/')}}"> <strong>Contact </strong><span class="sr-only">(current)</span></a></li>
           <li class="{{ Request::is('staff_teachers') ? 'active' : '' }}"><a href="{{url('staff_teachers/')}}"> <strong>Staff and Teachers</strong><span class="sr-only">(current)</span></a> </li>
           <li class="{{ Request::is('representatives') ? 'active' : '' }}"><a href="{{url('representatives/')}}"> <strong>Representatives </strong><span class="sr-only">(current)</span> </a></li>
         </ul>
     </div>
     <div class="col-md-6">
       <div class="h3"> Help and Support </div>
         <ul class="nav nav-pills nav-stacked">
           <li class="{{ Request::is('travel_trans_acco') ? 'active' : '' }}"><a href="{{url('travel_trans_acco/')}}"> <strong>Travel, Transport and Accommodation</strong><span class="sr-only">(current)</span></a></li>
           <li class="{{ Request::is('visa') ? 'active' : '' }}"><a href="{{url('visa/')}}"><strong>Visa Information</strong><span class="sr-only">(current)</span></a> </li>
           <li class="{{ Request::is('welfare') ? 'active' : '' }}"><a href="{{url('welfare/')}}"><strong> Student Welfare </strong><span class="sr-only">(current)</span></a></li>
         </ul>
     </div>
   </div>
   
   <div class="row bottom">
     <div class="col-md-12 text-center"><p>&copy;All rights reserved</p>
       <p>  <a href="https://www.facebook.com/" class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook"></span></a> </p></div>
   </div>
 </footer>
</body>
</html>