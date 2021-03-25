@extends('cliente.root')
@section('cuerpo')

    <!-- partial:partials/_header.html -->
    <!-- partial -->


    <div class="container-fluid relative animatedParent animateOnce no-p">
        <div class="animated fadeInUpShorts">
            <!--Banner-->
            @if ($post->fotopost)
                <div class="relative xv-slide" data-bg-possition="top"
                    style="background-image:url('{{ $post->fotopost->url }}');">
                    <div class="bottom-gradient "></div>
                </div>


            @else
                <div class="relative xv-slide" data-bg-possition="top"
                    style="background-image:url('{{ asset('Tema/assets/img/demo/b5.jpg') }}');">
                    <div class="bottom-gradient "></div>
                </div>



            @endif


            <!--@Banner-->
            <div class="row p-3">
                <div class="col-lg-8 offset-lg-2 p-3">
                    <div class="my-5 d-lg-flex align-items-center">
                        <figure class="avatar avatar-md float-left mr-3 mt-1">
                            @if ($post->usuariobasico->fotouser)
                                <img src="{{ $post->usuariobasico->fotouser->url }}" alt="" />
                            @else
                                <img src="{{ asset('userdefaultimg.png') }}" alt="">
                            @endif
                        </figure>
                        <div>
                            <h6>{{ $post->usuariobasico->name }}</h6>
                            {{ $post->usuariobasico->email }}
                        </div>

                        <div class="ml-auto pt-3 p-lg-0">

                            <div style="float: left; width: 33%;">
                                <a href="{{ route('likes.store', ['post_id' => $post->id, 'usaurio_id' => $post->usuariobasico->id, 'back' => Request::path()]) }}"
                                    class="ml-3">
                                    <i class="icon-like s-24"></i>
                                </a>

                            </div>

                            <div style="float: left; width: 33%;">
                                <a href="{{ route('blog.edit', [$post->id, 'idd' => $post->id, 'type' => 'Post', 'back' => Request::path()]) }}"
                                    class="ml-3">
                                    <i class="icon-edit s-24"></i>
                                </a>
                            </div>

                            <div style="float: left; width: 33%;">
                                {!! Form::open(['route' => ['blog.destroy', $post->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="icon-trash s-24"></i>', ['type' => 'submit', 'class' => 'boton-transparente', 'onclick' => "return confirm('Esta seguro de eliminar este post?')"]) !!}
                                {!! Form::close() !!}
                            </div>



                        </div>

                    </div>

                    <article>
                        <h1 class="font-weight-lighter">{{ $post->titulo }} </h1>

                        <div class="cardx video-responsive">


                            <!--<figure>-->
                            <!--<img src="assets/img/demo/b1.jpg" alt=""/>-->
                            <!--</figure>-->
                            <div class="card-bodyz my-5">
                                <p>{{ substr($post->contenido, 0, 500) }}</p>


                                <p>{{ substr($post->contenido, 500, 500) }}</p>
                                <p>{{ substr($post->contenido, 1000, 500) }}</p>

                                <p>{{ substr($post->contenido, 1500, 2000) }}</p>

                            </div>


                        </div>
                    </article>


                    <div class="mt-1 mb-5">
                        <div>
                            <h3><i class="icon-list-1 s-24 text-primary mr-3"></i> Comentarios</h3>


                            @foreach ($comentarios as $comentario)
                                <div class="media my-5 ">
                                    <div class="avatar avatar-md mr-3 mt-1">
                                        @if ($comentario->usuario->fotouser)
                                            <img src="{{ $comentario->usuario->fotouser->url }}" alt="" />
                                        @else
                                            <img src="{{ asset('userdefaultimg.png') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0">{{ $comentario->usuario->name }}</h6>
                                        {{ $comentario->comentario }}
                                    </div>
                                </div>
                            @endforeach


                            <hr>
                            <div class="post-comments my-5">
                                <div>



                                    {!! Form::open(['route' => 'comentables.store'], ['class' => 'form-material']) !!}

                                    {!! Form::hidden('comentable_id', $post->id, ['class' => 'form-control']) !!}

                                    {!! Form::hidden('comentable_type', 'Post', ['class' => 'form-control']) !!}

                                    {!! Form::hidden('back', Request::path(), ['class' => 'form-control']) !!}

                                    {!! Form::hidden('user_id', Auth::user()->id, null, ['class' => 'form-control']) !!}


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea name="comentario" id="comentario" rows="5"
                                                        class="form-control r-0" placeholder="Comentario"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row text-center">

                                        <div class="col-lg-12"><input type="submit" class="btn btn-primary r-0"
                                                value="Comentar"></div>
                                    </div>

                                    {!! Form::close() !!}




                                </div>
                            </div>





                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- partial:partials/_foot.html -->
    <!-- partial -->

@endsection
