@extends('layout.app')
@section('content')

@php
$bannerbg = Helper::bannerimg();

$testimo = DB::table('testimonila')
            ->join('citys', 'testimonila.city', '=', 'citys.id')
            ->join('states', 'testimonila.state', '=', 'states.id')
            ->join('countries', 'testimonila.country', '=', 'countries.id')
            ->select('testimonila.*', 'citys.name as citynam', 'states.name as statenam', 'countries.name as cntrynam')
            ->get();

@endphp

<style>
    .containers {
    margin: 26px 27px 0px 27px;
    box-shadow: 0 2px 2px 0 rgb(0 0 0 / 8%), 0 6px 20px 0 rgb(0 0 0 / 8%);
}
</style>
    <!-- Banner -->
    
    {!! $bannerbg !!}
	
    <!-- /Banner -->


<!-- view -->


<section class="section-faq">
    <div class="containers">
        <div class="row gutter-y-60">
            
                @foreach($integration as $item)
                    <!-- Ensure 'photo' field exists for each model in the collection -->
                    
                    
                     <div class="col-md-2 col-lg-2 wow fadeInUpBig">
                        <a href="{{ url('integrationDetail'.'?id='.$item->id) }}">
                            <div class="tmodbox">
                                <div class="iconbox p-1">
                                    <img src="{{ asset('admin/image/integration/' . $item->photo) }}" class="img-fluid" alt="">
                                </div>
                                <h3 >{{ $item->title }}</h3>
                            </div>
                        </a>
                    </div>
                    
                   
                @endforeach


        </div>
    </div>
</section>


@endsection