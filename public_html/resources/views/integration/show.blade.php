@extends('layout.app')

@section('content')
<section class="section-view">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Title and Description Section -->
            <div class="col-12 text-center mb-4">
                <h1>{{ $integration->title }}</h1>
            </div>

            <!-- Image Section -->
        
                <img src="{{ asset('admin/image/integration/' . $integration->photo) }}" 
                     alt="{{ $integration->title }}" 
                     class="img-fluid rounded shadow-sm" style="height:90vh">
          

            <!-- Optional Integration Description Section -->
            <div class="col-12 mt-3">
                <p class="text-muted">{!! $integration->description !!}</p>
            </div>
        </div>
    </div>
</section>
@endsection
