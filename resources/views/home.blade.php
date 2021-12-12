@extends('layouts.app')

@section('active_reference')

    {{ Breadcrumbs::render('home') }}

@endsection

@section('content')

    <div class="container" style="margin-top: 5%" enctype="multipart/form-data">

        @if (\Session::has('error'))

            <div class="alert alert-danger">
                <p>{{ \Session::get('error') }}</p>
            </div>

        @endif

        @if (\Session::has('mensaje'))

            <div class="alert alert-success">
                <p>{{ \Session::get('mensaje') }}</p>
            </div>

        @endif


        @foreach( $datiles as $datil )

        <div class="row mx-auto pb-5 justify-content-around">

            <div class="col-sm-6 text-center"> 

                <div class="card p-3">

                    <a href="{{ route('home.datil', $datil->getID()) }}" width="100" heigth="100">
                        <img class="card-img-top" src="http://127.0.0.1:8000/img/{{$datil->getVariedad()}}.jpg" >
                    </a>                    

                        <div class="card-body">

                            <h5 class="card-title">{{$datil->objetoVariedad->getVarNombre()}} - {{$datil->objetoCategoria->getCatNombre()}}</h5>
                            <p class="card-text">Precio: ${{ $datil->getPrecio()}}</p>
                        
                        </div>

                    </a>
            
                </div>
            
            </div>

        </div>

        @endforeach

    </div>
@endsection