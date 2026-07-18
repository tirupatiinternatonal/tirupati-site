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

                {!! $settings->overview !!}

            </div>
		</div>
	</section>

	
@endsection
