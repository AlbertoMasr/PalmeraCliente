@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 5%">

    <form method="POST" action="{{ route('compra.validarPago') }}">
            @csrf

            <div class="form-group">
                Total a pagar: ${{$total}}            
            </div>

            <div class="form-group">
                <label for="Nombre">Nombre completo</label>
                <input 
                    type="text" 
                    id="Nombre"
                    placeholder="Nombre completo"
                    name="Nombre"
                >

            </div>

            <div class="form-group">
                <label for="NoTarjeta">Número de tarjeta</label>
                <input 
                    type="number" 
                    id="NoTarjeta"
                    placeholder="Número de tarjeta"
                    name="NoTarjeta"
                >

            </div>

            <div class="form-group">
                <label for="FechaVencimiento">Fecha de vencimiento</label>
                <input 
                    type="text" 
                    id="FechaVencimiento"
                    placeholder="Fecha de vencimiento" 
                    name="FechaVencimiento" 

                >

            </div>

            <div class="form-group">
                <label for="CVV">CVV</label>
                <input 
                    type="number" 
                    id="CVV"
                    placeholder="CVV" 
                    name="CVV" 

                >

            </div>            

            <input type="hidden" id="Total" name="Total" value="{{$total}}">

            <button 
                type="submit" 
                class="btn btn-dark mb-1 mt-1" 
                name="confirmarPago"
            >
                Confirmar Pago
            </button>

        </form>

    </div>

@endsection