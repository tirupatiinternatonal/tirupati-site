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
                        Career Form') }}
                     </h3>
                     <div class="card-tools">
                        <button type="button" id="show" class="show tn btn-warning text-white btn-sm"><i class="fa fa-eye"></i> Show All/Hide</button>
                    </div>
                  </div>
                  <div class="row m-2">
                     <div class="col-12" style="width:100%; overflow-x:scroll;">
                        <table id="example1" class="table table-bordered table-striped dtr-inline" >
                           <thead>
                              <tr role="row">
                                 <th>Sr</th>
                                 <th>Name</th>
                                 <th>Mobile</th>
                                 <th>Email</th>
                                 <th>Apply Date</th>
                                 <th>gender</th>
                                 <th>Age</th>
                                 <th>Apply For</th>
                                 <th>Education</th>
                                 <th>Address</th>
                                 <th>City</th>
                                 <th>Pin</th>
                                <th>CV</th>
                               
                                 
                              </tr>
                           </thead>
                           <tbody class="product_list_show">
                              @if(!empty($data))
                              @php
                              $i=1;
                              @endphp
                              @foreach($data as $key => $value)
                              <tr>
                                 <td>{{$i++}}</td>
                                 <td>{{$value['name'] ?? ''}}</td>
                                 <td>{{$value['phone'] ?? ''}}</td>
                                 <td>{{$value['email'] ?? ''}}</td>
                                 <td>{{ date('d-M-Y', strtotime($value->created_at)) ?? '' }}</td>
                                 <td>{{$value['gender'] ?? ''}}</td>
                                 <td>{{$value['age'] ?? ''}}</td>
                                 <td>{{$value['apply_for'] ?? ''}}</td>
                                 <td>{{$value['education'] ?? ''}}</td>
                                 <td>{{$value['address'] ?? ''}}</td>
                                 <td>{{$value['city'] ?? ''}}</td>
                                 <td>{{$value['pin'] ?? ''}}</td>
                                 <td>
                                    <span class="file-link" 
                                          data-image="{{ $value['image'] ?? '' }}" 
                                          data-pdf="{{ $value['image'] ?? '' }}" 
                                          style="cursor:pointer">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                        @if(isset($value['image']))
                                            <a class="download-link" href="{{ url('/public/resume/' . $value['image']) }}" download>
                                                <i class="fa fa-download"></i>
                                                </a>
                                        @else
                                            No Image
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

<!-- Modal for displaying image or PDF -->
<div id="fileModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" style="cursor:pointer">&times;</span>
        <div id="modalContent">
            <!-- Image will be loaded here -->
            <!--<img id="modalImage" src="" alt="" style="display:none; width:50%;">-->
            <!-- PDF will be loaded here -->
            <iframe id="modalPdf" src="" frameborder="0" style="display:none; width:100%; height:800px;"></iframe>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('a.download-link').each(function() {
        var originalHref = $(this).attr('href');
        // Remove '/admin' from the URL
        var updatedHref = originalHref.replace('/admin', '');
        $(this).attr('href', updatedHref);
    });
});
</script>

<script>
$(document).ready(function() {
    $('.file-link').on('click', function() {
        var imagePath = $(this).data('image'); 
        var pdfPath = $(this).data('pdf');

        // Reset the modal content
        $('#modalImage').hide();
        $('#modalPdf').hide();
        
        if (imagePath) {
            $('#modalImage').attr('src', '/resume/' + imagePath).show(); 
        }

        if (pdfPath) {
            $('#modalPdf').attr('src', '/resume/' + pdfPath).show();
        }

        
        $('#fileModal').show(); 
    });

   
    $('.close').on('click', function() {
        $('#fileModal').hide();
        $('#modalImage').attr('src', '').hide(); 
        $('#modalPdf').attr('src', '').hide();
    });

    $(window).on('click', function(event) {
        if ($(event.target).is('#fileModal')) {
            $('#fileModal').hide();
            $('#modalImage').attr('src', '').hide();
            $('#modalPdf').attr('src', '').hide();
        }
    });
    
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

<style>
   .btn-xs {
   padding: .125rem .25rem;
   font-size: 17px;
   line-height: 1.5;
   border-radius: .15rem;
   }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection