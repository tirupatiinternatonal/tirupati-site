@extends('layout.app')
@section('content')

@php
$bannerbg = Helper::bannerimg();

// Fetch all quotations for plan_type 1 and 2

$oneQuotation = DB::table('quotation')
    ->where('plan_type', 'LIKE', '%One Time%')
    ->orderBy('id')
    ->get();

$yearQuotation = DB::table('quotation')->where('plan_type', 'Yearly Subscription')->orderBy('id')->get();
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


<!-- One Time Subscription -->
<section class="section-subs">
    <div class="containers">
        <div class="sec-title text-center">
            <p class="sec-title__tagline wow fadeInDown" data-wow-duration="4s">Our Plan</p>
            <h3 class="sec-title__title">One Time Subscription Plan</h3>
        </div>

        <div class="row">
            @forelse ($oneQuotation as $item)
                <div class="col-md-12 col-lg-4 mb-5 {{ $item->popular == 1 ? 'popular' : '' }}">
                    <div class="subs-card">
                        <div class="card-head">
                            <h3>{{ $item->plan_name }}</h3>
                            <div class="botlin"></div>
                            <div class="botbotlin"></div>
                        </div>
                        <p class="highlit">{{ $item->discount_label }}</p>
                        <div class="card-price">
                            <h1 style="font-size: 46px;">₹ {{ $item->amount }}/-</h1>
                        </div>
                        <div class="card-cont">
                            <ul>
                                @php
                                    $features = DB::table('quotation_details')->where('quotation_id', $item->id)->get();
                                @endphp
                                @foreach ($features as $feature)
                                    <li>{{ $feature->features }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-foot">
                            <a href="{{ url('payNow') }}?id={{ $item->id }}" class="cd-hero__btn cd-btn-prim full-btn">
                                Get Plan
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No One Time Subscription Plan Found.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Yearly Subscription -->
<section class="section-subs">
    <div class="containers">
        <div class="sec-title text-center">
            <p class="sec-title__tagline wow fadeInDown" data-wow-duration="4s">Our Plan</p>
            <h3 class="sec-title__title">Yearly Subscription Plan</h3>
        </div>

        <div class="row">
            @forelse ($yearQuotation as $item)
                <div class="col-md-12 col-lg-4 mb-5 {{ $item->popular == 1 ? 'popular' : '' }}">
                    <div class="subs-card">
                        <div class="card-head">
                            <h3>{{ $item->plan_name }}</h3>
                            <div class="botlin"></div>
                            <div class="botbotlin"></div>
                        </div>
                        <p class="highlit">{{ $item->discount_label }}</p>
                        <div class="card-price">
                            <h1 style="font-size: 46px;">₹ {{ $item->amount }}/-</h1>
                        </div>
                        <div class="card-cont">
                            <ul>
                                @php
                                    $features = DB::table('quotation_details')->where('quotation_id', $item->id)->get();
                                @endphp
                                @foreach ($features as $feature)
                                    <li>{{ $feature->features }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-foot">
                            <a href="{{ url('payNow') }}?id={{ $item->id }}" class="cd-hero__btn cd-btn-prim full-btn">
                                Get Plan
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No Yearly Subscription Plan Found.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
