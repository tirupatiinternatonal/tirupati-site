@extends('layout.app')
@section('content')
	<section class="page-header">
			<div class="page-header__bg"
				style="background-image: url(http://tirupati-international.in/public/assets/images/ccertificate.jpeg);"></div>
			<!-- /.page-header__bg -->
			<div class="container">
				<h2 class="page-header__title">Certificate</h2><!-- /.page-header__title -->
				<ul class="list-unstyled breadcrumb-one">
					<li><a href="index-2.html">Home</a></li>
					<li><span>Certificate</span></li>
				</ul><!-- /.list-unstyled breadcrumb-one -->
			</div><!-- /.container -->
		</section><!-- /.page-header -->
		<section>
    <div class="container-fluid">
        <div class"row" style="text-align:center; justify-content:center;margin:20px 20px">
        <h3><b> Together we stand, together we fall. All for one and one for all! Learn together,earn together. </b></h3>
        </div>
    </div>
</section>
			<section>
		    <div class="container-fluid">
		        
		            <div class="row">
		                <div class="gallery-type">
		                    
		                    @if (!empty($gallery))
		                    
		                    @php
		                  
		                    $i=1;
		                    @endphp
		                    
		                    @foreach ($gallery as $key=>$item)
		                <div class="col-xs-1 col-md-3">
		                    
		                    <img class="gallery" src="{{ env('IMAGE_SHOW_PATH').'event/'.$item->photo ?? '' }}" alt="" style="height:300px; width:80%;">
		                </div>
		                @endforeach
		                
		                @endif
		            </div>
		        </div>
		    </div>
		</section>
	
	
@endsection
