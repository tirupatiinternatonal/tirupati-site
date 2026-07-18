<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
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
    
     <h4> <strong> Respected Sir/ Ma'am, Greeting from Tirupati Software Team !</strong> </h4>
     <p> Name :{{$name ?? ''}}</p>
     <p> Contact No.: {{$phone ?? ''}} </p>
     <p> Email - {{$email ?? ''}} </p>
     <p> Gender - {{$gender ?? ''}} </p>
     <p> Message -  {{$messages ?? ''}}</p>
     <p> <strong> Sincerely, </strong> <p>
     <p>  Yogesh Kumar Lohar <p>
     <p>  IT Manager & Head Depart. </p>
     <p> Contact No.- +91 95888 40007</p>
     <p> Email id - info@tiruapti-international.in </p>

</body>
</html>