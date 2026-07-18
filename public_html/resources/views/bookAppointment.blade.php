@extends('layout.app')
@section('content')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<div class="responsive-iframe-container">
    <iframe src="https://project.tirupatihms.com/hms/appointments/patient_appointment" ></iframe>
</div>


<style>

   

    .responsive-iframe-container {
      position: relative;
      width: 100%;
      padding-bottom: 56.25%; 
      height: 500px;
      overflow: hidden;
      padding-left: 10px;
      padding-right: 10px;
     
    }

    .responsive-iframe-container iframe {
      position: absolute;
      top: 0;
      left: 0;
     
      height: 500px;
      border: 0;
       width: 90%;
      margin: auto;
      left: 0px;
      right: 0px;
    }
</style>
@endsection