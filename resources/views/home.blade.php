@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 5%">

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

            <img class="card-img-top" src="../" alt="Datiles">

            <a href="{{ route('home.datil', ['datil' => $datil->getID(), 'opcion' => 1]) }}">

                <div class="card-body">

                    <h5 class="card-title">{{$datil->getVariedad()}} - {{$datil->getCategoria()}}</h5>
                    <p class="card-text">{{$datil->getPrecio()}}</p>
                
                </div>

            </a>
       
        </div>
    
    </div>

    @endforeach

    <br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident vel culpa adipisci expedita, labore corrupti? Temporibus necessitatibus similique accusamus laborum officia laudantium maxime fugiat optio accusantium repudiandae blanditiis, nostrum voluptatum!
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident vel culpa adipisci expedita, labore corrupti? Temporibus necessitatibus similique accusamus laborum officia laudantium maxime fugiat optio accusantium repudiandae blanditiis, nostrum voluptatum!
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident vel culpa adipisci expedita, labore corrupti? Temporibus necessitatibus similique accusamus laborum officia laudantium maxime fugiat optio accusantium repudiandae blanditiis, nostrum voluptatum!
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident vel culpa adipisci expedita, labore corrupti? Temporibus necessitatibus similique accusamus laborum officia laudantium maxime fugiat optio accusantium repudiandae blanditiis, nostrum voluptatum!
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</div>
@endsection
