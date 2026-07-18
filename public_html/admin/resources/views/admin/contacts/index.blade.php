@extends('admin.layouts.app')
@section('title') @lang('translation.Dashboard')
@endsection @section('content')
<div class="content-wrapper">
   <section class="content pt-3">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12 col-md-12">
               <div class="card card-outline card-orange">
                  <div class="card-header bg-primary">
                     <h3 class="card-title">
                        <i class="fa fa-address-book-o"></i> &nbsp; {{ __('View
                        Enquiry') }}
                     </h3>
                     <div class="card-tools">
                        <button type="button" id="show" class="show tn btn-warning text-white btn-sm"><i class="fa fa-eye"></i> Show All/Hide</button>
                    </div>
                  </div>
                  <div class="row m-2">
                     <div class="col-12" style="width:100%; overflow-x:scroll;">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline">
                           <thead>
                              <tr role="row">
                                 <th>Sr</th>
                                 <th>Date</th>
                                 <th>Name</th>
                                 <th> Organization Name</th>
                                 <th>Mobile</th>
                                 <th>Email</th>
                                 <th>Gender</th>
                                 <th>Address</th>
                                 <th>Country</th>
                                 <th>State</th>
                                 <th>City</th>
                                 <th>Product/Service</th>
                                 <th>Message</th>
                                 <th>file</th>
                                
                               
                                 
                              </tr>
                           </thead>
                           <tbody class="product_list_show">
                              @if(!empty($data))
                              @php
                              $i=1;
                              @endphp
                              @foreach($data as $key => $value)
                                @php
                                    $country = DB::table('countries')->where('id', $value->country_id)->first();
                                    $state = DB::table('states')->where('id', $value->state_id)->first();
                                    $city = DB::table('citys')->where('id', $value->city_id)->first();
                                @endphp
                              <tr>
                                 <td>{{$i++}}</td>
                                <td>{{ \Carbon\Carbon::parse($value['created_at'])->format('d-m-Y') ?? '' }}</td>
                                 <td>{{$value['name'] ?? ''}}</td>
                                 <td>{{$value['organization_name'] ?? ''}}</td>
                                 <td>{{$value['phone'] ?? ''}}</td>
                                 <td>{{$value['email'] ?? ''}}</td>
                                 <td>{{$value['gender'] ?? ''}}</td>
                                 <td>{{$value['address'] ?? ''}}</td>
                                 <td>{{$country->name ?? ''}}</td>
                                 <td>{{$state->name ?? ''}}</td>
                                 <td>{{$city->name ?? ''}}</td>
                                 <td>{{$value['subj'] ?? ''}}</td>
                                 <td>{{$value['message'] ?? ''}}</td>
                                <td>
                                @if(!empty($value['file']))
                                    <a href="https://www.tirupati-international.in/assets/images/contact/{{$value['file'] ?? '' }}" 
                                       target="_blank"
                                       class="btn btn-sm btn-primary">
                                       View
                                    </a>
                                @else
                                    -
                                @endif
                                </td>    
                                </tr>
                              

                              @endforeach
                              @endif
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<style>
   .btn-xs {
   padding: .125rem .25rem;
   font-size: 17px;
   line-height: 1.5;
   border-radius: .15rem;
   }
</style>

<script>
$(document).ready(function(){
    $('#show').click(function(){
        
        var hasClass = $(this).hasClass("show");
      
        if(hasClass == true){
            
            $('#example1').DataTable().destroy();
            $(this).removeClass('show').addClass('hide');
        }else{
            $('#example1').DataTable({
                paging: true,
                searching: true,
                info: true,
                ordering: true,
                responsive: true,
                lengthMenu: [50, 100, 200, 500, 1000, 2000] ,
                autoWidth: false,
            });
            
            $(this).removeClass('hide').addClass('show');
        }
        
    });
});
</script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection