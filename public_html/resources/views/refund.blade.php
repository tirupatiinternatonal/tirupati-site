@extends('layout.app')
@section('content')

@php
$bannerbg = Helper::bannerimg();
$settings = DB::table('settings')->first();
@endphp


    <!-- Banner -->
    
    {!! $bannerbg !!}
	
    <!-- /Banner -->


    <section class="section-content">
        <div class="container-fluid">
            <div class="col-md-10 offset-1">

                {!! $settings->refund_policy !!}
                
                <!--<h3>Refund And Cancellation Policy Of Company</h3>-->
                
                <!--<p>Once Ordered Any HIMS Products related payment has been made which are non-refundable and no refunds are applicable for our Software & Any Peripheral Services/products, which you acknowledge prior to purchasing any product at our website/Relative Platform. Please make sure that you've carefully read product description before making a purchase.</p>-->
		
		    </div>
		</div>
	</section>
		


@endsection
