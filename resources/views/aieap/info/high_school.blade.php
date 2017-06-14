@extends('aieap.master')
@section ('title','For High School Students')
@section ('content')
<div class="container"> 
	<ol class="breadcrumb">
    <li><a href="index">Home</a></li>
    <li>Courses</li>
    <li class="active">For High School Students</li>
  </ol>
	<div class="row">
   <div class="col-xs-12 col-sm-5 ">
     <div class="text-center">
       <P class="h4"> <strong> For High School Students </strong>
       </p>
     </div>
     <br><br>
     <p > This course is suitable for young students who are seeking the opportunity to study in a high-school in Canada or USA. AIEAP guide these students to achieve suitable results to meet the necessary prerequisite level of English for entry into a Year 8 to Year 12 high school courses in Canada or USA. <br> <br>
          This course is designed to support ESL students in improving their language skills in reading, vocabulary acquisition, writing, speaking, and listening. The language skills will enable students to write high school-level paragraphs and essays. The course will foster an understanding of cultural references related to studying, working, and living in a North American context. <br> <br>
          AIEAP also provide students with regular academic and progress reporting to ensure that they are on right track with their learning goals.
          Instructor who teach this course are T.E.S.L. (Teacher of English as a Second Language) certified from an accredited institution.
       <br> <br> <br>

       Class size: <br> <br>
       Duration: <br> <br>
       Age: 12-18 Years old <br> <br>
     </p>
     </div>
             
   <div class=" col-xs-12  col-sm-7 ">
         <div class="panel panel-default">
           <div class="panel-heading">
             <P class="h4"> <strong> Start Date and Time Schedule </strong></P>
           </div>
           <div class="panel-body">
             <h4> <strong> Start Date:</strong></h4>
               <ul>
                 <li> <strong>Semister 1:</strong> yy/mm/dd to yy/mm/dd </li>
                 <li> <strong>Semister 2:</strong> yy/mm/dd to yy/mm/dd </li>
                 <li> <strong>Semister 3:</strong> yy/mm/dd to yy/mm/dd </li>
                 <li> <strong>Semister 4:</strong> yy/mm/dd to yy/mm/dd </li>
               </ul>
                <!--  <div class="table-responsive"> did not work for Edge-->
           <div style="overflow-x:auto"> <!-- serves same purpose as table-responsive and works on Edge-->
                 <table class="table table-bordered">
                   <thead>
                     <tr class="info">
                        <td>Week</td>
                        <td>Day</td>
                        <td>Morning Time</td>
                        <td>Afternoon Time</td>
                        <td>Evening Time</td>
                     </tr>
                   </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00 </td>
                  </tr>
                  <tr class="active">
                    <td>2</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00 </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00 </td>
                  </tr>
                  <tr class="active">
                    <td>4</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00 </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00 </td>
                  </tr>
                  <tr class="active">
                    <td>6</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00 </td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00 </td>
                  </tr>
                  <tr class="active">
                    <td>8</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00 </td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>Monday</td>
                   <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00 </td>
                  </tr>
                  <tr class="active">
                    <td>10</td>
                   <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00 </td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <a href="{{url('enrolment_form/')}}"> <strong> Apply Now </strong></a>
           
          </div>
        </div>
      </div>
    </div>
  </div>
<br><br><br>
@endsection 