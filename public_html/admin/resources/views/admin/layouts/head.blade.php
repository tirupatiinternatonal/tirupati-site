<script src="{{URL::asset('public/assets/accounts/js/jquery2.js')}}"></script>

<nav class="main-header navbar navbar-expand navbar-white navbar-light p-0">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item ml-1">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('admin/home')}}" class="nav-link">{{setting()->name}}</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block pt-2" style="padding-left: 130px;">
        <spam id="date" class="date"></spam> <spam id="time" class="time"></spam></a>
      </li>


    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fa fa-search"></i>
            </a>
            <div class="navbar-search-block">

                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" onkeyup="SearchValue()" id="name" name="name"
                        type="search" placeholder="Search" aria-label="Search" value="">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </li>

        <!-- Navbar Search -->

        <li class="nav-item dropdown mt-2">
            <a href="" id="refresh" class="text-white btn btn-success btn-xs" onclick="reloadThePage()">Refresh!</a>
        </li>
        &nbsp;
        &nbsp;




        <li class="nav-item dropdown">
            <a class="nav-link user-panel" data-toggle="dropdown" href="#">
                <img src="{{ env('IMAGE_SHOW_PATH').'profile/'.Auth::user()->photo }}"
                    class="img-circle elevation-2"
                    >

            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


                <div class="row border-bottom mr-0">
                    <div class="col-md-12 text-center">
                        <img class=""
                            src="{{ env('IMAGE_SHOW_PATH').'profile/'.Auth::user()->photo }}"
                            >
                    </div>
                    <!--<div class="col-md-8">
                        <h4></h4>
                        <p>{{Auth::user()->name}}</p>

                    </div>-->
                </div>

                <!--<a href="https://www.school.rukmanisoftware.com/profile/edit/1" class="dropdown-item border-bottom">
                    <i class="fa fa-user-circle mr-2"></i>Profile Setting

                </a>-->
                <a href="{{ URL('admin/profile') }}" class="dropdown-item border-bottom">
                    <i class="fa fa-user mr-2"></i>Profile

                </a>
                <a href="{{ URL('admin/change_password') }}" class="dropdown-item border-bottom">
                    <i class="fa fa-key mr-2"></i>Change Password

                </a>
                

                <a class="dropdown-item" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="uil uil-sign-out-alt font-size-18 align-middle mr-1 text-muted"></i> <span class="align-middle"><i class="fa fa-sign-out mr-2"></i> @lang('translation.Sign_out')</span></a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>


            </div>
        </li>



    </ul>
</nav>
<style>
.navbar-white {
     /*background-color: #31638eed;*/
     color: #fff;
    /*background-image: linear-gradient(to bottom right, #4327ca, #00ffc378);*/
    background-image: linear-gradient(to bottom right, #3F51B5, #00C4B1);
            }
</style>
  <script>
    var today = new Date();
var day = today.getDate();
var month = today.getMonth() + 1;

function appendZero(value) {
    return "0" + value;
}

function theTime() {
    var d = new Date();
    document.getElementById("time").innerHTML = d.toLocaleTimeString("en-US");
}

if (day < 10) {
    day = appendZero(day);
}

if (month < 10) {
    month = appendZero(month);
}

today = day + "-" + month + "-" + today.getFullYear();

document.getElementById("date").innerHTML = today;

var myVar = setInterval(function () {
    theTime();
}, 1000);

</script> 