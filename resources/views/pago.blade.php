@extends('layouts.app')

@section('active_reference')

    {{ Breadcrumbs::render('compra.solicitarTarjeta', $total) }}

@endsection

@section('content')

    <div class="container" style="margin-top: 5%">

    <form method="POST" action="{{ route('compra.validarPago') }}">
            @csrf

            <div class="card p-5">

            <div class="form-group">
                <h2>Total a pagar: ${{$total}}</h2>            
            </div>

            <div class="form-group">
                <label for="Nombre">Nombre completo</label>
                <input 
                    type="text" 
                    class="form-control @error('Nombre') is-invalid @enderror" 
                    id="Nombre"
                    placeholder="Nombre completo"
                    name="Nombre"
                >

                @error('Nombre')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="NoTarjeta">Número de tarjeta</label>
                <input 
                    type="text" 
                    id="NoTarjeta"
                    class="form-control @error('NoTarjeta') is-invalid @enderror" 
                    placeholder="Número de tarjeta"
                    name="NoTarjeta"
                    onkeypress="return event.charCode > 47 && event.charCode < 58;"
                    pattern="[0-9]{16}"
                    maxlength="16"
                >

                @error('NoTarjeta')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="FechaVencimiento">Fecha de vencimiento</label>
                <input 
                    type="text" 
                    id="mesVencimiento"
                    class="form-control @error('FechaVencimiento') is-invalid @enderror" 
                    placeholder="Fecha de vencimiento" 
                    name="FechaVencimiento" 
                    maxlength="4"
                    onkeypress="return event.charCode > 47 && event.charCode < 58;"
                    pattern="[0-9]{4}"
                >
                /
                <input 
                    type="text" 
                    id="AnioVencimiento"
                    class="form-control @error('FechaVencimiento') is-invalid @enderror" 
                    placeholder="Fecha de vencimiento" 
                    name="FechaVencimiento" 
                    maxlength="4"
                    onkeypress="return event.charCode > 47 && event.charCode < 58;"
                    pattern="[0-9]{4}"
                >

                @error('FechaVencimiento')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="form-group">
                <label for="CVV">CVV</label>
                <input 
                    type="password" 
                    id="CVV"
                    placeholder="CVV" 
                    class="form-control @error('CVV') is-invalid @enderror" 
                    name="CVV"
                    maxlength="3"
                    onkeypress="return event.charCode > 47 && event.charCode < 58;"
                    pattern="[0-9]{3}"
                >

                @error('CVV')
                    <span class="invalid-feedback d_block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>            

            <input type="hidden" id="Total" name="Total" value="{{$total}}">

            <button 
                type="submit" 
                class="btn btn-success mb-1 mt-1" 
                name="confirmarPago"
            >
                Confirmar Pago
            </button>

        </div>

        </form>

    </div>

@endsection