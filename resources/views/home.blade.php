@extends('layouts.app')

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

            <div class="card-columns">

                <div class="card p-3">

                    <img class="card-img-top" src="/Meedjol.png" alt="Datiles">

                    <a href="{{ route('home.datil', $datil->getID()) }}">

                        <div class="card-body">

                            <h5 class="card-title">{{$datil->objetoVariedad->getVarNombre()}} - {{$datil->objetoCategoria->getCatNombre()}}</h5>
                            <p class="card-text">Precio: ${{ $datil->getPrecio()}}</p>
                        
                        </div>

                    </a>
            
                </div>
            
            </div>

        @endforeach

    </div>
@endsection