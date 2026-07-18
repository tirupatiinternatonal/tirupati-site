@extends('layout.app')
@section('content')
@php
$students =DB::table('students')->get();
$students =DB::table('students')->paginate(25);
@endphp


<style>
    .sorting{
     border:4px solid #00acee; 
     
    }
    .view_client{
     border:4px solid #00acee;   
    }
    .table{
        margin-top:30px; 
        margin-right:20px;
    }
    .xyz{
         overflow:scroll;
         border:5px solid;
        padding:40px;
    }
    .heading{
          text-align: center;
  font-size: 30px;
  background-color: thistle;
  color: black;
  padding: 10px;
  margin-left:40%;
  margin-right:40%;
}
 #myInput{
     width: 200px;
margin-left: 10px;
border: #222bab;
  border-top-style: none;
  border-right-style: none;
  border-bottom-style: none;
  border-left-style: none;
border-style: inset;
border-block-width: thick;
 }   
</style>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
	<section class="page-header">
			<div class="page-header__bg"
				style="background-image: url(http://tirupati-international.in/public/assets/images/client.jpeg);"></div>
			<!-- /.page-header__bg -->
			<div class="container">
				<h2 class="page-header__title">View Our Client</h2><!-- /.page-header__title -->
				<ul class="list-unstyled breadcrumb-one">
					<li><a href="{{url('welcome')}}">Home</a></li>
					<li><span>View Our Client</span></li>
				</ul><!-- /.list-unstyled breadcrumb-one -->
			</div><!-- /.container -->
		</section><!-- /.page-header -->
		<div class="container-fluid xyz">
		    <div class="row">
		        <div class="col-md-2 heading">
		        <hl>OUR CLIENTS</hl>
		        </div>
		        <input class="form-control" id="myInput" type="text" placeholder="Search..">
		        <div class="col-md-12">
		        <table id="myTable" class="table table-striped table-bordered table-info table-hover"> 
				<thead class="thead-light">
				    
						<tr >
						    <th class="sorting" tabindex="0"   colspan="1" >Sr.</th>
						    <th class="sorting" tabindex="0"  colspan="1"  > Hospital/Client/Company</th>
						    <th class="sorting" tabindex="0" colspan="1" > Address</th>
						    <th class="sorting" tabindex="0" colspan="1" > City</th>
						    <th class="sorting" tabindex="0" colspan="1" >State</th>
						    <th class="sorting" tabindex="0"  colspan="1" >Country</th>
						    <th class="sorting" tabindex="0"  colspan="1">Software Date</th>
						    <th class="sorting" tabindex="0"  colspan="1" >Duration</th>
						    <th class="sorting" tabindex="0"  colspan="1">Software Version</th>
						   <!-- <th class="sorting" tabindex="0"  colspan="1">Country</th>
						   
						    <th class="sorting" tabindex="0"  colspan="1" >date</th>-->
						    </tr>
				</thead> 
				<tbody id="myTable">
				     @if (!empty($students))
		                    
		                    @php
		                  
		                    $i=1;
		                    @endphp
		                    
		                    @foreach ($students as $key=>$item) 
				<tr class="view_client">
				   
				    <td >
				       {{$item->id ?? ''}} 
				    </td>
				    
				    <td >{{$item->name ?? ''}}</td>
				    <td>{{$item->address ?? ''}}</td>
				    <td>{{$item->city ?? ''}}</td>
				    <td>{{$item->state ?? ''}}</td>
				    <td>{{$item->village ?? ''}}</td>
				     <td>{{ \Carbon\Carbon::parse($item->admission_date)->format('d/m/Y')}}</td>
@php				     
$to = \Carbon\Carbon::now();
$from = \Carbon\Carbon::parse($item->admission_date)->format('Y-m-d');
$diff_in_days = $to->diffInDays($from);
$days=$diff_in_days+1;

				   @endphp

 <td>{{$days}}</td>

				</tr>
				@endforeach
		                
		                @endif
				</tbody>
			</table>
			<span>
			    {{$students->links()}}
			</span>
			<style>
			    .w-5{
			        display:none;
			    }
			</style>
		    </div>
		    </div>
		</div>
	
@endsection
