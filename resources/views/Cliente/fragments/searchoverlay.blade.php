@section('searchoverlay')


<svg class="d-none">
    <defs>
        <symbol id="icon-cross" viewBox="0 0 24 24">
            <title>cross</title>
            <path
                    d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"
            />
        </symbol>
    </defs>
</svg>




<div class="searchOverlay page">
    <button
            id="btn-searchOverlay-close"
            class="btn btn--searchOverlay-close"
            aria-label="Close searchOverlay form"
    >
        <svg class="icon icon--cross">
            <use xlink:href="#icon-cross"></use>
        </svg>
    </button>
    <div class="searchOverlay__inner  searchOverlay__inner--up">
        <form class="searchOverlay__form" action="index.html">
            <input
                    class="searchOverlay__input"
                    name="searchOverlay"
                    type="text"
                    placeholder="Search"
                    autocomplete="off"
                    spellcheck="false"
            />
            <span class="searchOverlay__info">Hit enter to searchOverlay or ESC to close</span>
        </form>
    </div>
    <div class="searchOverlay__inner searchOverlay__inner--down">
        <div class="searchOverlay__related">
            <div class="searchOverlay__suggestion">
                <div class="card mb-3">
                    <div class="card-header transparent b-b">
                        <strong>New Artists</strong>
                    </div>
                    <ul class="playlist list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="col-10">
                                    <figure class="avatar avatar-md float-left  mr-3 mt-1">
                                        <img src="{{ asset('Tema/assets/img/demo/u1.jpg') }}" alt="">
                                    </figure>
                                    <h6>Zoe Foe</h6>
                                    <small>5 Albums - 50 Songs</small>
                                </div>
                                <a href="#" class="ml-auto"><i class="icon-more"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="col-10">
                                    <figure class="avatar avatar-md float-left  mr-3 mt-1">
                                        <img src="{{ asset('Tema/assets/img/demo/u2.jpg') }}" alt="">
                                    </figure>
                                    <h6>Zoe Foe</h6>
                                    <small>5 Albums - 50 Songs</small>
                                </div>
                                <a href="#" class="ml-auto"><i class="icon-more"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="col-10">
                                    <figure class="avatar avatar-md float-left  mr-3 mt-1">
                                        <img src="{{ asset('Tema/assets/img/demo/u3.jpg') }}" alt="">
                                    </figure>
                                    <h6>Zoe Foe</h6>
                                    <small>5 Albums - 50 Songs</small>
                                </div>
                                <a href="#" class="ml-auto"><i class="icon-more"></i></a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="col-10">
                                    <figure class="avatar avatar-md float-left  mr-3 mt-1">
                                        <img src="{{ asset('Tema/assets/img/demo/u6.jpg') }}" alt="">
                                    </figure>
                                    <h6>Zoe Foe</h6>
                                    <small>5 Albums - 50 Songs</small>
                                </div>
                                <a href="#" class="ml-auto"><i class="icon-more"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="searchOverlay__suggestion">
                <div class="card mb-3">
                    <div class="card-header transparent b-b">
                        <strong>Events</strong>
                    </div>
                    <ul class="playlist list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex align-items-center ">
                                <div class="col-8 ">
                                    <a href="video-single.html">
                                        <h6>Battal of Bands</h6>
                                    </a>
                                    <small class="mt-1"><i class="icon-placeholder-3 mr-1 "></i> London Music Hall
                                    </small>
                                </div>
                                <div class="ml-auto">
                                    <div class="text-lg-center  bg-primary r-10 p-2 text-white primary-bg">
                                        <div class="s-18">24</div>
                                        <small>July, 2019</small>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center ">
                                <div class="col-8 ">
                                    <a href="video-single.html">
                                        <h6>Battal of Bands</h6>
                                    </a>
                                    <small class="mt-1"><i class="icon-placeholder-3 mr-1 "></i> London Music Hall
                                    </small>
                                </div>
                                <div class="ml-auto">
                                    <div class="text-lg-center  bg-primary r-10 p-2 text-white primary-bg">
                                        <div class="s-18">08</div>
                                        <small>July, 2019</small>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center ">
                                <div class="col-8 ">
                                    <a href="video-single.html">
                                        <h6>Battal of Bands</h6>
                                    </a>
                                    <small class="mt-1"><i class="icon-placeholder-3 mr-1 "></i> London Music Hall
                                    </small>
                                </div>
                                <div class="ml-auto">
                                    <div class="text-lg-center  bg-primary r-10 p-2 text-white primary-bg">
                                        <div class="s-18">12</div>
                                        <small>July, 2019</small>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection