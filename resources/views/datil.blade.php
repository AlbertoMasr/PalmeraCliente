@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 5%">

    <h1>{{$datil}}</h1>

    <form method="POST" action="{{ route('home.agregarDatil') }}">
        @csrf

        <div class="form-group">

            <label for="cantidad">Ingrese la cantidad a comprar: </label>

            <input 
                type="number" 
                class="form-control @error('cantidad') is-invalid @enderror" 
                id="cantidad"
                name="cantidad"
                onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="[0-9]"
                required
            >

            <input type="hidden" id="idDatil" name="idDatil" value="{{$datil->getID()}}">

        </div>

        <button 
                type="submit" 
                class="btn btn-dark mb-1 mt-1" 
                name="agregar"
            >
                Agregar producto
        </button>

    </form>

</div>

@endsection