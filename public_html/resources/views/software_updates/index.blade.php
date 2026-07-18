@extends('layout.app')

@section('content')

@php
    use Carbon\Carbon;
    $bannerbg = Helper::bannerimg();
@endphp

{!! $bannerbg !!}


<script>
document.addEventListener("DOMContentLoaded", function () {

    let h3 = document.querySelector('.page-header__title h3');
    let h2 = document.querySelector('.page-header__title h2');

    if (h3 && h3.innerHTML.trim() == "") {
        h3.innerHTML = "Software Updates";
    }

    if (h2 && h2.innerHTML.trim() == "") {
        h2.innerHTML = "Latest Software Updates";
    }

});
</script>



<style>

.update-container {
    max-width: 1200px;
    margin: 60px auto;
    padding: 40px;
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 12px 35px rgba(0,0,0,0.08);
}

.update-title {
    font-size: 34px;
    font-weight: 700;
    color: #0b5e55;
    margin-bottom: 40px;
    text-align: center;
}

.version-card {
    background: linear-gradient(135deg,#0b5e55,#167d74);
    color: #fff;
    padding: 16px 20px;
    border-radius: 12px;
    cursor: pointer;
    transition: .3s;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 60px;
}

.version-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 28px rgba(0,0,0,0.18);
}

.version-left {
    display: flex;
    align-items: center;
    gap: 12px;
}

.version-number {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #fff;
    color: #0b5e55;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}

.latest {
    background: #ffcc00;
    color: #000;
    font-size: 11px;
    padding: 3px 8px;
    border-radius: 5px;
    margin-left: 6px;
}

.update-detail {
    display: none;
    margin-top: 30px;
    padding: 40px;
    background: #f8fbfb;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    width: 100%;
}

.update-detail h5 {
    color: #0b5e55;
    margin-top: 18px;
}

.update-detail ul {
    padding-left: 18px;
}

.update-detail li {
    margin-bottom: 6px;
}

</style>



<section class="update-container">

    <div class="update-title">
        Software Updates
    </div>


    <div class="row g-4">

        @foreach($updates as $key => $update)

        <div class="col-lg-3 col-md-4 col-sm-6">

            <div class="version-card {{ $loop->first ? 'latest-card' : '' }}" onclick="showUpdate({{ $update->id }}, this)">

                <div class="version-left">

                    <div class="version-number">
                        {{ $key + 1 }}
                    </div>

                    <div>
                        {{ $update->version }}

                        @if($loop->first)
                            <span class="latest">Latest</span>
                        @endif
                    </div>

                </div>

                <div style="font-size:22px">+</div>

            </div>

        </div>

        @endforeach


        <!-- DETAIL BOX -->

        <div class="col-12">
            <div id="detailBox" class="update-detail"></div>
        </div>

    </div>

</section>



<!-- Hidden Update Data -->

@foreach($updates as $update)

<div id="data{{ $update->id }}" style="display:none">

    <p>
        <strong>Release Date :</strong>
        {{ Carbon::parse($update->release_date)->format('d F Y') }}
    </p>


    @if(!empty($update->new_features))

        <h5>✨ New Features</h5>

        <ul>
            @foreach(preg_split("/\r\n|\n|\r/", $update->new_features) as $item)
                @if(trim($item) != '')
                    <li>{{ $item }}</li>
                @endif
            @endforeach
        </ul>

    @endif



    @if(!empty($update->improvements))

        <h5>⚡ Improvements</h5>

        <ul>
            @foreach(preg_split("/\r\n|\n|\r/", $update->improvements) as $item)
                @if(trim($item) != '')
                    <li>{{ $item }}</li>
                @endif
            @endforeach
        </ul>

    @endif



    @if(!empty($update->bug_fixes))

        <h5>🐞 Bug Fixes</h5>

        <ul>
            @foreach(preg_split("/\r\n|\n|\r/", $update->bug_fixes) as $item)
                @if(trim($item) != '')
                    <li>{{ $item }}</li>
                @endif
            @endforeach
        </ul>

    @endif



    @if(!empty($update->security_updates))

        <h5>🔒 Security Updates</h5>

        <ul>
            @foreach(preg_split("/\r\n|\n|\r/", $update->security_updates) as $item)
                @if(trim($item) != '')
                    <li>{{ $item }}</li>
                @endif
            @endforeach
        </ul>

    @endif



    @if(!empty($update->technical_changes))

        <h5>⚙ Technical Changes</h5>

        <ul>
            @foreach(preg_split("/\r\n|\n|\r/", $update->technical_changes) as $item)
                @if(trim($item) != '')
                    <li>{{ $item }}</li>
                @endif
            @endforeach
        </ul>

    @endif

</div>

@endforeach



<script>

function showUpdate(id, el) {

    let box = document.getElementById('detailBox');
    let data = document.getElementById('data' + id);

    // content set
    box.innerHTML = data.innerHTML;
    box.style.display = "block";

    // find current row
    let card = el.closest('.col-lg-3');

    // get all cards
    let allCards = [...document.querySelectorAll('.col-lg-3')];

    // index of clicked card
    let index = allCards.indexOf(card);

    // calculate row end (4 cards per row)
    let rowEnd = Math.floor(index / 4) * 4 + 3;

    if(rowEnd >= allCards.length){
        rowEnd = allCards.length - 1;
    }

    // insert detail after that row
    allCards[rowEnd].after(box);

}

</script>

@endsection