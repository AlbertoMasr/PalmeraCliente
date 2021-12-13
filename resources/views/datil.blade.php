@extends('layouts.app')

@section('active_reference')

    {{ Breadcrumbs::render('home.datil', $datil) }}

@endsection

@section('content')

<div class="container" style="margin-top: 7%;">
    <div class="row">
        <div class="col">
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
        </div>
        <div class="col">
            <h2 class="mt-3">{{$datil->objetoVariedad->getVarNombre()}} - {{$datil->objetoCategoria->getCatNombre()}}</h2>

            <h4  class="mt-3">{{$datil->objetoVariedad->getVarDescripcion()}}</h4>

            <form method="POST" action="{{ route('home.agregarDatil') }}">
                @csrf

                <div class="form-group">

                    </div>

                    <label for="cantidad">Ingrese la cantidad a comprar: (Disponibles en stock: {{$datil->getStock()}} kg)

                        @if ($datil->getStock() == 0)

                        <span style="color: gray">producto agotado</span>
                            
                        @elseif( $datil->getStock()< 50)
                        <br>
                        <span style="color: red">Quedan muy pocos, ¡aprovecha!</span>
                            
                        @endif
                    
                    </label>

                    <div class="input-group col-md-6">

                        @if ($datil->getStock() == 0)

                        <div class="container">
                            <div class="form-group row">
                            <input 
                                type="number" 
                                class="form-control mt-2 @error('cantidad') is-invalid @enderror" 
                                id="cantidad"
                                name="cantidad"
                                min="1"
                                max="999"
                                onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="[0-9]"
                                required
                                disabled
                            >

                            @error('cantidad')
                                <span class="invalid-feedback d_block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group row">
                            <button 
                                type="submit" 
                                class="btn btn-success mt-2" 
                                name="agregar"
                                disabled
                            >
                                Agregar producto

                            </button>
                                </div>
                                </div>
                        @else
                        <div class="container">
                            <div class="form-group row">
                                <input 
                                    type="number" 
                                    class="form-control mt-2 @error('cantidad') is-invalid @enderror" 
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
                            </div>
                            <div class="form-group row">
                                <button 
                                    type="submit" 
                                    class="btn btn-success mt-2" 
                                    name="agregar"
                                >
                                    Agregar producto

                                </button>
                            </div>
                            @endif

                        </div>
                    </div>
                    <input type="hidden" id="idDatil" name="idDatil" value="{{$datil->getID()}}">

                </div>

            </form>
        </div>
    </div>
</div>

@endsection