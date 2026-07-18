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

                {!! $settings->shipping_policy !!}
                
		    </div>
		</div>
	</section>
		


@endsection
