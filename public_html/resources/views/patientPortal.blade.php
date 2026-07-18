@extends('layout.app')
@section('content')
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<div class="responsive-iframe-container">
    <iframe src="https://project.tirupatihms.com/hms/patients/login" allowfullscreen></iframe>
</div>


<style>
    .responsive-iframe-container {
      position: relative;
      width: 100%;
      padding-bottom: 56.25%; /* 16:9 ratio (9 / 16 = 0.5625) */
      height: 0;
      overflow: hidden;
    }

    .responsive-iframe-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 0;
    }
</style>
@endsection