@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Comentable</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'comentables.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('comentables.fields')
                </div>

            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
