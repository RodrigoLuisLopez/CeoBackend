@section('navbar')

    
<!--navbar-->
<nav class="navbar-wrapper navbar-bottom-fixed shadow">
    <div class="navbar navbar-expand player-header justify-content-between  bd-navbar">
        <div class="d-flex align-items-center">
            <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle  paper-nav-toggle-sidenav ml-2 mr-2">
                <i></i>
            </a>
            <a class="navbar-brand d-none d-lg-block" href="index.html">
                <div class="d-flex align-items-center s-14 l-s-2">
                    <span>RECORD</span>
                </div>
            </a>
        </div>
        <!--Player-->
        <div id="mediaPlayer" class="player-bar col-lg-8 col-md-5" data-auto="true">
            <div class="row align-items-center grid">
                <div class="col">
                    <div class="d-flex align-items-center">
                        <button id="previousTrack" class="btn btn-link d-none d-sm-block">
                            <i class="icon-back s-18"></i>
                        </button>
                        <button class=" btn btn-link" id="playPause">
                            <span id="play"><i class="icon-play s-36"></i></span>
                            <span id="pause" style="display: none"><i class="icon-pause s-36 text-primary"></i></span>
                        </button>
                        <button id="nextTrack" class="btn btn-link d-none d-sm-block">
                            <i class="icon-next s-18"></i>
                        </button>
                    </div>
                </div>
                <div class="col-8 d-none d-lg-block">
                    <div id="waveform"></div>
                </div>
                <div class="col d-none d-lg-block">
                    <small class="track-time mr-2 text-primary align-middle"></small>
                    <a data-toggle="control-sidebar">
                        <i class="icon icon-menu-3 s-24 align-middle"></i>
                    </a>
                </div>
            </div>

        </div>
        <!--@Player-->
        <!--Top Menu Start -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

        <!-- Right Sidebar Toggle Button -->
        <li class="searchOverlay-wrap">
            <a href="#" id="btn-searchOverlay" class="nav-link mr-3 btn--searchOverlay no-ajaxy">
                <i class="icon icon-search s-24"></i>
            </a>

        </li>
        <!-- User Account-->
        <li class="dropup custom-dropdown user user-menu ">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <figure class="avatar">
                    <img src="{{ asset('Tema/assets/img/demo/u7.png') }}" alt="">
                </figure>
                <i class="icon-more_vert "></i>
            </a>
            <div class="dropdown-menu p-4 dropdown-menu-right">
                <div class="row box justify-content-between my-4">
                    <div class="col text-center">
                        <a class="ajaxifyPage" href="saved.html">
                            <i class="icon icon-save s-24"></i> <span>Saved</span>
                        </a>
                    </div>
                    <div class="col text-center">
                        <a class="ajaxifyPage" href="saved.html">
                            <i class="icon icon-heart s-24"></i> <span>Favourites</span>
                        </a>
                    </div>
                    <div class="col text-center">
                        <a class="ajaxifyPage" href="profile.html">
                            <i class="icon-user-4  s-24"></i>
                            <div class="pt-1">Profile</div>
                        </a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
    </div>

</nav>

@endsection