@extends('Cliente.root')


@section('cuerpo')
<div class="container-fluid relative animatedParent animateOnce">
    <div class="wrapper animated fadeInUpShort p-md-5 p-3">
        <section>
            <div class="relative mb-5">
                <h1 class="mb-2 text-primary">Blog</h1>
                <p>Some ready widgets for you to use easily anywhere.</p>
            </div>
            <div class="row">
                <div class="col-md-8">


                    
                    @foreach ($posts as $post)
                    
                    <div class="card mb-3">
                        <div class="p-3">
                            <div class="d-md-flex align-items-center">
                                <div class="mr-3 ml-md-4 text-md-center">
                                    <div class="s-24">{{ substr($post->created_at,0,2) }}</div>
                                    <small> {{ substr($post->created_at,2,20) }}</small>
                                </div>
                                <div>
                                <a href="{{ route('blog.show', $post->id) }}">
                                    <h2 class="font-weight-lighter h3 my-3 text-primary">
                                    {{ $post->titulo }}            
                                    </h2>
                                </a>
                                    <ul class="align-baseline list-inline">
                                        <li class="list-inline-item"><i class="icon-like text-primary mr-2"></i>likes</li>
                                        <li class="list-inline-item"><i class="icon-list-1 text-primary mr-2"></i>7
                                            Comentarios
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <figure class="mb-3">
                            @if ($post->fotoPost)
                                <img src="{{ $post->fotoPost->url }}" alt="" />
                            @else
                                <img src="{{ asset('Tema/assets/img/demo/b1.jpg') }}" alt="">
                            @endif
                        </figure>
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <p>{{ substr($post->contenido,0,222) }}...</p>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <div>
                                    <div class="avatar avatar-sm mr-2">
                                        @if ($post->usuariobasico->fotouser)
                                            <img src="{{ $post->usuariobasico->fotouser->url }}" alt="" />
                                        @else
                                            <img src="{{ asset('userdefaultimg.png') }}" alt="">
                                        @endif
                                    </div>
                                    {{ $post->usuariobasico->name }}
                                </div>
                                <a href="{{ route('blog.show', $post->id) }}" class="ml-auto"><i class="icon icon-link mr-2 "></i>Leer mas</a>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    {{ $posts->render() }}
                
                
                </div>









                <aside class="col-md-4">

                    <div class="card mb-3">
                        <div class="card-header transparent b-b">
                            <strong>Más publicaciones</strong>
                        </div>
                        <ul class="playlist list-group list-group-flush">
                           
                            @foreach ($post_derecha as $post)
                            <li class="list-group-item">
                                <div class="d-flex align-items-center ">
                                    <div class="col-5">
                                        @if ($post->fotoPost)
                                            <img class="r-3" src="{{ $post->fotoPost->url }}" alt="Card image" />
                                        @else
                                            <img class="r-3" src="{{ asset('Tema/assets/img/demo/b5.jpg') }}" alt="Card image">
                                        @endif
                                    </div>
                                    <div class="ml-3">
                                        <a href="{{ route('blog.show', $post->id) }}">
                                            <h6>{{ substr($post->contenido,0,40) }}...</h6>
                                        </a>
                                        <small class="mt-1">{{ $post->usuariobasico->name }}</small>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>



                    <div class="card mb-3">
                        <div class="card-header transparent b-b">
                            <strong>Otros Perfiles</strong>
                        </div>
                        <ul class="playlist list-group list-group-flush">
                            @foreach ($usuariobasicos as $usuariobasico)
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <div class="col-10">
                                        <figure class="avatar avatar-md float-left  mr-3 mt-1">
                                            @if ($usuariobasico->fotouser)
                                            <img src="{{ $usuariobasico->fotouser->url }}" alt="" />
                                            @else
                                            <img src="{{ asset('userdefaultimg.png') }}" alt="">
                                            @endif
                                        </figure>
                                        <h6>{{ $usuariobasico->name }}</h6>
                                        <small>{{ $usuariobasico->privacidad->nombre }}</small>
                                    </div>
                                    <a href="#" class="ml-auto"><i class="icon-more"></i></a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>



                    
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

                        </ul>
                    </div>
                    
                </aside>





            </div>
        </section>
    </div>
</div>
    
@endsection