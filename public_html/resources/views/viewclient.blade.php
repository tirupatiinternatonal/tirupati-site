@extends('layout.app')
@section('content')
@php
$bannerbg = Helper::bannerimg();
$settings = DB::table('settings')->first();
@endphp

<?php
$servername = "localhost";
$username = "tirupatihms_hms";
$password = "tirupati@123";
$db = "tirupatihms_crm";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

//   $setting = "SELECT * FROM students WHERE id=1";
// $result1 = $conn->query($setting);

$sql = "SELECT * FROM students";
            $result = $conn->query($sql);
            
            // print_r($result->fetch_assoc());
            // $data = $result->fetch_assoc();

?>


    <!-- Banner -->
    
    {!! $bannerbg !!}
	
    <!-- /Banner -->		
		
		
	<section class="section-clients">	
		<div class="container-fluid xyz" >
		    
        	
            <div class="row justify-content-center" id="loginDiv">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <!-- Client Data fill-up Form -->
                        <form id="addClientDataForm" method="#" action="#" class="p-3">
                            <!-- CSRF Token -->
                            @csrf
                            <p class="text-center mb-0 text-dark" >
                                Login to view Clients
                            </p>
                            <div class="mb-3">
                                <!-- User Name -->
                                <label for="userName" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="userName" name="userName" placeholder="User Name" autocomplete="off">
                            </div>
                            
                            <div class="mb-3">
                                <!-- Password -->
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="new-password">
                            </div>
                            
                            <!-- Submit Button with 25% width -->
                            <button type="submit" class="btn btn-primary w-25 mx-auto d-block">Submit</button>
                        </form>
                        <small class="text-danger  text-center " style="font-size:13px" >
                            *To Get This Page Login Credentials Please Contact @ <a href="tel:+91-9588840007" class="text-danger" >+91-9588840007</a><a class="text-danger" href="tel:+91-9462702855"> +91-9462702855</a>

                        </small>
                    </div>
                </div>
            </div>
            
            
            
		    <div class="row" id="clientData">
		        <div class="col-md-12 top">
            			<div class="form-group">
            				<input type="text" id="myInput" class="form-control" style="line-height: 40px;" placeholder="Search" title="Search" width="100%">
            				</label>
            		    </div>
            		</div> 
		        <div class="col-md-12 mt-4">
		          
	            <table id="example1" class="table table-bordered table-striped"> 
                    <thead>
                        <tr class="thdbox">
                            <th width="5%" class="text-center">S.No.</th>
                            <th width="25%" class="">Hospital Name/Clients</th>
                            <th width="25%" class="">Address</th>
                            <th width="10%" class="text-center">City</th>
                            <th width="10%" class="text-center">State</th>
                            <th width="10%" class="text-center">PINCode</th>
                            <th width="15%" class="text-center">Running Date</th>
                        </tr>
                    </thead>
                    <tbody id="body">
                        @if(!empty($result->fetch_assoc()))
                            @php
                                $i = 1;
                                
                            @endphp
                        @while($item = $result->fetch_assoc())
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td id="name">{{ $item['name'] ?? '' }}</td>
                            <td>{{ $item['address'] ?? '' }}</td>
                            <td class="text-center">{{ $item['city'] ?? '' }}</td>
                            <td class="text-center">{{ $item['state'] ?? '' }}</td>
                            <td class="text-center">{{ $item['pincode'] ?? '' }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($item['admission_date'])) ?? '' }}</td>
                        </tr>
                        @endwhile
                        @else
                            <tr class="odd">
                                <td valign="top" colspan="7" class="dataTables_empty">No data available in table</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                
		        </div>
		    </div>
		</div>
	</section>
	


<script>
    $(document).ready(function(){
        var clientData = $('#clientData').html();
        $('#clientData').html('');
        var username = "{{ $settings->client_view_user ?? '' }}";
        var password = "{{ $settings->client_view_password ?? '' }}";
        
        $("#addClientDataForm").submit(function(event){
            event.preventDefault();  
            
            var filledUserName = $("#userName").val();
            var filledPassword = $("#password").val();
        
           if(filledUserName === username && filledPassword === password) {
              
                $('#loginDiv').addClass('d-none');
                $('#clientData').html(clientData);
            } else {
                if(filledUserName !== username) {
                    alert("Username does not match");
                }
                if(filledPassword !== password) {
                    alert("Password does not match");
                }
            }
        });
        
        
            $("#clientData").on("keyup", "#myInput", function() {
                var value = $(this).val().toLowerCase();
                $("#body tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        
    });
</script>
@endsection
