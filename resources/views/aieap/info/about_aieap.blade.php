@extends('aieap.master')
@section ('title','About AIEAP')
@section('content')  
<div class="container"> 
 <ol class="breadcrumb">
   <li><a href="index">Home</a></li>
   <li>About</li>
   <li class="active">About AIEAP</li>
 </ol>
 <div class=" text-center"> 
   <div class="jumbotron">
     <p class="h4"><strong>About The American Institute of English for Academic Preparation</strong>
     </p>
   </div>
 </div>
   <div class="row">
     <div class="col-sm-6">
       <p>Our talented instructors who have been trained at the best universities in 
North America, will help develop students' academic writing and reading 
skills which would boost his or her self-reliance with learning. Indeed, educators 
suggest that students who develop their academic English skills during their 
early years, will get good grades in schools/colleges/universities, and will adapt 
quickly in high demanding workplaces scenarios. <br><br>
         <a href="#" data-toggle="tooltip" data-placement="bottom" title="The American Institute of English for Academic Preparation"> AIEAP </a> has accreditaton (<a href="image/Master%20Business%20Licence.pdf" >Master Business Licence</a>) provided by the Ministry of Education, Toronto, Ontario to pursue accademic activities.       
       </p> <br><br><br><br>
       <a class="left" href="image/Rules%20and%20Regulation.pdf" title="Rules and Regulation in PDF" >
        Rules and Regulation (PDF Version)
       </a> <br><br>
       <a class="left" href="image/code-of-conducts.pdf" title="Students' Code of Conducts in PDF" >
         Students' Code of Conducts  (PDF Version)</a> 
     </div> 
     <div class="col-sm-6">
       <div class="panel panel-default"> 
         <div class="panel-heading">  <p> <strong> Location </strong></p>
         </div>
         <div class="panel-body">
           <div id="map-container" class="col-sm-6 ">
           </div>
   
           <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
           <script src="http://maps.google.com/maps/api/js?sensor=false" >
           </script>
           <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6XJHdpO52Br9Ls4MOARX5XeljknbvWp8&callback=initMap"
  type="text/javascript">
           </script>
           
           <script>  
             function init_map() {
             var var_location = new google.maps.LatLng(43.753870,-79.251815);
             var var_mapoptions = {center: var_location,
                                    zoom: 14
                                   };
 
             var var_marker = new google.maps.Marker({ position: var_location,
                                                         map: var_map,
                                                         title:"Venice"});
 
             var var_map = new google.maps.Map(document.getElementById("map-container"),
                                                 var_mapoptions);
             var_marker.setMap(var_map); 
               }
             google.maps.event.addDomListener(window, 'load', init_map);
           </script>
         </div>
       </div> 
     </div>
   </div>
 </div>
 <br><br>
 @endsection    

