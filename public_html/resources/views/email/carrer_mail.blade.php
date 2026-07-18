<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAREER FORM</title>
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 15%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>    
</head>
<body>
     <h4>Apply for job </h4>
     <p> My name is {{$name ?? ''}} I belongs to {{$city ?? ''}}. I'm {{$age ?? ''}} years old and here is my full residental address {{$address ?? ''}},{{$pin ?? ''}}</p>
    <p> I want to apply for that job role {{$apply_for ?? ''}}</p>
    <p> Here is my contact information {{$phone ?? ''}},{{$userEmail ?? ''}}</p>
    <p> there I attach my resume for your reference </p>
     <p> Thank you<br>
     {{$name ?? ''}}
     </p>
     

</body>
</html>