@extends('aieap.master')
@section ('title','Academic English Course')
@section ('content')
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index">Home</a></li>
    <li>Courses</li>
    <li class="active">Academic English Course</li>
  </ol>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-5 ">
        <div class="text-center">
           <P class="h4"> <strong> Academic English Course </strong></P><br><br>
        </div>
        <p > This course is suitable for students who wish to enrol in a college or university for further study. The course outlines the standards of university/high school-level English. It assists the student to develop skills in grammar, sentence variety, punctuations, paragraph development, preliminary essay development, vocabulary, basic copy rights issues, and reading comprehension. This course will help you read and understand academic texts. These are language skills which are essential for success in college programs and professional life. Understanding cultural references related to studying, working and living in a North American context will be incorporated throughout the course.<br>
          <br>
          <br>
          Class size: <br>
          <br>
          Duration: <br>
          <br>
          Age: 18 and Over <br>
          <br>
        </p>
      </div>
      <div class=" col-xs-12  col-sm-7 ">
        <div class="panel panel-default">
          <div class="panel-heading">
            <p class="h4"> <strong> Start Date and Time Schedule </strong></p>
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
                    <td>18:00-20:00</td>
                  </tr>
                  <tr class="active">
                    <td>2</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00</td>
                  </tr>
                  <tr class="active">
                    <td>4</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00</td>
                  </tr>
                  <tr class="active">
                    <td>6</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00</td>
                  </tr>
                  <tr class="active">
                    <td>8</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00</td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00</td>
                  </tr>
                  <tr class="active">
                    <td>10</td>
                    <td>Monday</td>
                    <td>9:00-12:00</td>
                    <td>13:00-15:00</td>
                    <td>18:00-20:00</td>
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
</div>
<br><br><br>
@endsection 

