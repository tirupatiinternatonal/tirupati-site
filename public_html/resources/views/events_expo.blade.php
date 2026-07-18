@extends('layout.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script>
   Fancybox.bind("[data-fancybox='gallery']",{

Toolbar:{
display:[
"zoom",
"slideshow",
"fullscreen",
"close"
]
},

Slideshow:{
autoStart:true,
timeout:3000
},

Carousel:{
infinite:true
},

Image:{
zoom:true
}

});
</script>

@php
    $bannerbg = Helper::bannerimg();
@endphp
{!! $bannerbg !!}

<style>
    :root {
    --theme-primary: #0a5650;
    --theme-primary-hover: #08433e;
}

.events-section{
    background:linear-gradient(135deg,#f0f9f6 0%,#f8fafc 100%);
}

.main-card{
    width:100%;
    border-radius:28px;
    overflow:hidden;
    box-shadow:0 30px 70px rgba(10,86,80,.12);
}

.event-title{
    font-size:2.5rem;
    font-weight:800;
    line-height:1.15;
    color:#1e2937;
}

.date-badge{
    background:linear-gradient(135deg,var(--theme-primary),#12877a);
    color:#fff;
    border-radius:16px;
    padding:18px 22px;
    box-shadow:0 15px 30px rgba(10,86,80,.2);
}

/* ===========================
   Sidebar
=========================== */

.sidebar-wrapper{
    position:sticky;
    top:20px;
    z-index:10;
    margin-left:0!important;
    padding-left:0!important;
}

.sidebar-wrapper>.card{
    background:linear-gradient(180deg,#061524,#0A1F35);
    border:none!important;
    border-radius:22px!important;
    box-shadow:0 15px 35px rgba(0,0,0,.25);
}

.sidebar-title{
    position:relative;
    display:inline-block;
    margin:22px;
    font-size:34px;
    font-weight:700;
    color:#fff;
    line-height:1;
}

.sidebar-title::after{
    content:"";
    position:absolute;
    left:0;
    bottom:-2px;
    width:0;
    height:4px;
    background:#FFC107;
    border-radius:30px;
    transition:.35s ease;
}

.sidebar-wrapper:hover .sidebar-title::after{
    width:100%;
}

.sidebar-card{
    background:linear-gradient(180deg,#ffffff,#f8fbfd)!important;
    border:1px solid #dfe8ef!important;
    border-radius:18px!important;
    box-shadow:0 8px 25px rgba(0,0,0,.06);
    transition:.35s ease;
    overflow:hidden;
    position:relative;
}

.sidebar-card:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 40px rgba(0,0,0,.12);
    border-color:#0a5650!important;
}

.sidebar-card::after{
    content:"";
    position:absolute;
    left:0;
    bottom:0;
    width:0;
    height:3px;
    background:#21d4b5;
    transition:.35s;
}

.sidebar-card:hover::after,
.bg-theme-active::after{
    width:100%;
}

.sidebar-card h6{
    color:#1f2937!important;
}

.sidebar-card small{
    color:#6b7280!important;
}

.sidebar-card i{
    color:var(--theme-primary)!important;
}

.sidebar-card .card-body{
    padding:20px!important;
}

.bg-theme-active{
    background:linear-gradient(135deg,#0a5650,#12796f)!important;
    border:2px solid #21d4b5!important;
    box-shadow:0 20px 40px rgba(10,86,80,.30);
}

.bg-theme-active h6,
.bg-theme-active small,
.bg-theme-active i{
    color:#fff!important;
}

.view-events-btn{
    display:flex;
    align-items:center;
    gap:12px;
    width:100%;
    padding:16px 18px;
    border-radius:16px;
    background:#081b2f;
    border:1px solid rgba(255,255,255,.12);
    color:#fff;
    text-decoration:none;
    transition:.3s;
}

.view-events-btn:hover{
    background:#0a5650;
    border-color:#21d4b5;
    color:#fff;
    transform:translateY(-3px);
}

/* ===========================
   Event Info
=========================== */

.event-info{
    display:flex;
    align-items:center;
    gap:40px;
    padding:18px 25px;
    margin-top:25px;
    background:linear-gradient(135deg,#0a5650,#12877a);
    border-radius:16px;
}

.info-item{
    display:flex;
    align-items:center;
    gap:12px;
}

.info-item i{
    color:#fff;
    font-size:18px;
}

.info-item span{
    color:#fff;
    font-size:17px;
    font-weight:500;
}

/* ===========================
   Description
=========================== */

.description-container{position:relative;}

.description-text{
    max-height:250px;
    overflow:hidden;
    transition:max-height .5s ease;
    color:#4b5563;
    line-height:1.7;
}

.description-text.expanded{
    max-height:5000px;
}

.btn-link-theme{
    color:var(--theme-primary);
    text-decoration:none;
}

.btn-link-theme:hover{
    color:var(--theme-primary-hover);
}

/* ===========================
   Gallery
=========================== */

.gallery-item{
    display:block;
    position:relative;
    overflow:hidden;
    border-radius:18px;
    cursor:pointer;
}

.gallery-img{
    width:100%;
    height:240px;
    object-fit:cover;
    transition:.45s ease;
}

.gallery-item:hover .gallery-img{
    transform:scale(1.08);
}

.hover-overlay{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    display:flex;
    align-items:center;
    justify-content:center;
    background:rgba(10,86,80,.45);
    opacity:0;
    transition:.35s;
}

.hover-overlay i{
    font-size:42px;
    color:#fff;
}

.gallery-item:hover .hover-overlay{
    opacity:1;
}

.event-banner{
    transition:all .4s ease;
}

.event-banner:hover{
    transform:translateY(-8px);
    box-shadow:0 30px 70px rgba(10,86,80,.30);
}
</style>

<section class="events-section py-5">
    <div class="container-fluid px-0">
        <div class="row g-4">
            @if($event)
                <div class="col-xl-3 col-lg-4 pe-1" data-aos="fade-right" data-aos-duration="1100">
                    <div class="sidebar-wrapper">
                        <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                            <div class="card-body p-0">
                                <h5 class="sidebar-title">All Events</h5>
                                @foreach($events as $item)
                                    <a href="{{ request()->url() . '?id=' . $item->id }}" 
                                       class="sidebar-card card mb-3  text-decoration-none {{ $event->id == $item->id ? 'bg-theme-active shadow' : 'bg-white' }}"
                                       style="border-radius: 14px; margin:0 12px 16px 12px;">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <!--<img src="{{ asset('admin/image/event/'.$item->banner_image) }}" -->
                                                <!--     alt="{{ $item->title }}" -->
                                                <!--     class="rounded" style="width:75px;height:60px;object-fit:cover;">-->
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1 fw-semibold style-title" style="font-size: 0.95rem;">{{ $item->title }}</h6>
                                                    <small class="{{ $event->id == $item->id ? 'text-white-50' : 'text-muted' }}">
                                                        <i class="fas fa-calendar-alt me-1"></i> 
                                                        {{ $item->event_date ? \Carbon\Carbon::parse($item->event_date)->format('d M Y') : 'N/A' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                
                                <div class="mt-3 px-3 pb-3">
                                    <a href="{{ url('/events_expo') }}" class="view-events-btn">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>View All Events</span>
                                        <i class="fas fa-arrow-right ms-auto"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8 ps-1" data-aos="fade-left" data-aos-duration="1100">
                    <div class="main-card bg-white">
                        <div class="card-body p-4">

                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start gap-4">
                                <div class="flex-grow-1">
                                    <span class="badge px-3 py-2 fw-medium" style="background-color: #e6f2f0; color: var(--theme-primary);">EVENT DETAILS</span>
                                    <h1 class="event-title mt-3">{{ $event->title }}</h1>
                                </div>
                                <!--@if($event->event_date)-->
                                <!--<div class="date-badge text-center flex-shrink-0">-->
                                <!--    <div class="fs-2 fw-bold">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</div>-->
                                <!--    <div class="text-uppercase small fw-semibold">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</div>-->
                                <!--    <div class="small opacity-75">{{ \Carbon\Carbon::parse($event->event_date)->format('Y') }}</div>-->
                                <!--</div>-->
                                <!--@endif-->
                            </div>

                            <div class="event-info mt-4">
                                <div class="info-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span>{{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('d M Y') : 'N/A' }}</span>
                                </div>
                            
                                <div class="info-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $event->event_time ?? '10:00 AM' }}</span>
                                </div>
                            
                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $event->location ?? 'Pragati Maidan, New Delhi' }}</span>
                                </div>
                            </div>

                            @if(!empty($event->banner_image))
                            <div class="mt-4 rounded-4 overflow-hidden shadow-sm event-banner">
                                <img src="{{ asset('admin/image/event/'.$event->banner_image) }}"
                                     alt="{{ $event->title }}"
                                     class="img-fluid w-100 banner-img">
                            </div>
                            @endif

                            <div class="mt-4 description-container">
                                <div class="description-text" id="descText">
                                    {!! $event->description !!}
                                </div>
                                <button id="readBtn" class="btn btn-link btn-link-theme fw-semibold px-0 mt-2">
                                    Read More <i class="fas fa-chevron-down ms-1"></i>
                                </button>
                            </div>

                            @if(count($gallery) > 0)
                            <div class="mt-5 pt-4 border-top">
                                <h4 class="fw-bold mb-4" style="color: #1e2937;">Event Gallery</h4>
                                <div class="row gx-0">
                                    @foreach($gallery as $index => $item)
                                        <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                                            <div class="gallery-item">
                                                @if($item->img)
                                            
                                               <a href="{{ env('IMAGE_SHOW_PATH') . 'event/gallery/' . $item->img }}"
                                                  data-fancybox="gallery">
                                            
                                                    <img src="{{ asset('admin/image/event/gallery/'.$item->img) }}"
                                                         class="w-100 gallery-img">
                                            
                                                    <div class="hover-overlay d-flex align-items-center justify-content-center">
                                                        <i class="fas fa-search-plus text-white fs-1"></i>
                                                    </div>
                                            
                                                </a>
                                            
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @else
                    <div class="col-12">
                        <div class="container py-5">
                            <div class="text-center py-5">
                    
                                <i class="fas fa-calendar-times fa-5x text-secondary mb-4"></i>
                    
                                <h2 class="fw-bold mb-3">
                                    No Events Available
                                </h2>
                    
                                <p class="text-muted mb-4">
                                    There are currently no events or expos available.
                                    Please check back later for upcoming events.
                                </p>
                    
                                <a href="{{ url('/') }}" class="btn btn-success px-4 py-2">
                                    <i class="fas fa-home me-2"></i>
                                    Back to Home
                                </a>
                    
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({ once: true, duration: 1100 });

    document.getElementById('readBtn').addEventListener('click', function() {
        const desc = document.getElementById('descText');
        if (desc.classList.contains('expanded')) {
            desc.classList.remove('expanded');
            this.innerHTML = `Read More <i class="fas fa-chevron-down ms-1"></i>`;
            desc.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else {
            desc.classList.add('expanded');
            this.innerHTML = `Read Less <i class="fas fa-chevron-up ms-1"></i>`;
        }
    });
</script>
@endsection