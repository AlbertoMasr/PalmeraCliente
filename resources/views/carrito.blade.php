@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 5%">

        @foreach( $carritoDeCompra as $producto )

            <div class="card-columns">

                <div class="card p-3">

                    <img class="card-img-top" src="../" alt="Datiles">

                    <a href="{{ route('home.datil', $producto->objetoDatil->getID()) }}">

                        <div class="card-body">

                            <h5 class="card-title">{{$producto->objetoDatil->getVariedad()}} - {{$producto->objetoDatil->getCategoria()}}</h5>
                            <p class="card-text">{{$producto->getCantidad()}}</p>
                        
                        </div>

                    </a>
            
                </div>
            
            </div>

        @endforeach

    </div>

@endsection