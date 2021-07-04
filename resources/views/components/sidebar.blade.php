<div class="sidebar" data-color="brown" data-active-color="danger">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-mini">
        <div class="logo-image-small">
          <img src="{{asset('assets/img/logo-small.png')}}">
        </div>
      </a>
      <a href="{{route('home')}}" class="simple-text logo-normal">
        Teaching form
        <!-- <div class="logo-image-big">
          <img src="../assets/img/logo-big.png">
        </div> -->
      </a>
    </div>
    <div class="sidebar-wrapper">
      {{-- <div class="user">
        <div class="photo">
          <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" />
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" class="collapsed">
            <span>
              Chet Faker
              <b class="caret"></b>
            </span>
          </a>
          <div class="clearfix"></div>
          <div class="collapse" id="collapseExample">
            <ul class="nav">
              <li>
                <a href="#">
                  <span class="sidebar-mini-icon">MP</span>
                  <span class="sidebar-normal">My Profile</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sidebar-mini-icon">EP</span>
                  <span class="sidebar-normal">Edit Profile</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="sidebar-mini-icon">S</span>
                  <span class="sidebar-normal">Settings</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div> --}}
      <ul class="nav">
        <li class="active">
          <a href="{{route('classroom')}}">
            <i class="nc-icon nc-ruler-pencil"></i>
            <p>Class room</p>
          </a>
        </li>
        @if (Auth()->user()->type === 1)
        <li class="">
          <a href="../examples/dashboard.html">
            <i class="nc-icon nc-chart-bar-32"></i>
            <p>Report</p>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </div>