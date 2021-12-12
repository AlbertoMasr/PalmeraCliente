@extends('layouts.app')

@section('active_reference')

    {{ Breadcrumbs::render('home.datil', $datil) }}

@endsection

@section('content')

<div class="container" style="margin-top: 5%">

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">

          <div class="carousel-item active">
            <img class="d-block w-100 img-rounded" src="http://127.0.0.1:8000/img/{{$datil->getVariedad()}}.jpg">
          </div>

        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>

    </div>

    <h2 class="mt-3">{{$datil->objetoVariedad->getVarNombre()}} - {{$datil->objetoCategoria->getCatNombre()}}</h2>

    <form method="POST" action="{{ route('home.agregarDatil') }}">
        @csrf

        <div class="form-group">

            <label for="cantidad">Ingrese la cantidad a comprar: (Disponibles en stock: {{$datil->getStock()}})</label>

            <div class="input-group" style="width: 30%">

                <input 
                    type="number" 
                    class="form-control @error('cantidad') is-invalid @enderror" 
                    id="cantidad"
                    name="cantidad"
                    min="1"
                    max="999"
                    onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="[0-9]"
                    required
                >

                @error('cantidad')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button 
                    type="submit" 
                    class="btn btn-success ml-3" 
                    name="agregar"
                >
                    Agregar producto

                </button>

            </div>

            <input type="hidden" id="idDatil" name="idDatil" value="{{$datil->getID()}}">

        </div>

    </form>

</div>

@endsection