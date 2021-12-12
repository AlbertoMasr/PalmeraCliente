@extends('layouts.app')

@section('active_reference')

    {{ Breadcrumbs::render('carrito') }}

@endsection

@section('content')

    <div class="container" style="margin-top: 5%">

        <div class="card">

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

            @foreach( $productoCarrito as $producto )

                <div class="card-columns justify-content-around row mx-auto pb-5 "> 

                    <div class="card p-3">
                        <a href="{{ route('home.datil', $producto->objetoDatil->getID()) }}" width="100" heigth="100">
                            <img class="card-img-top" src="http://127.0.0.1:8000/img/{{$producto->objetoDatil->getVariedad()}}.jpg" >
                        </a>
                        <div class="card-body">

                            <h5 class="card-title">{{$producto->objetoDatil->objetoVariedad->getVarNombre()}} - {{$producto->objetoDatil->objetoCategoria->getCatNombre()}}</h5>

                            <form method="POST" action="{{ route('carrito.actualizarProducto') }}">
                            @csrf

                                Cantidad <input type="number" id="cantidad" name="cantidad" min="1" max="1001" value="{{$producto->getCantidades()}}" />
                                
                                Subtotal: ${{ ($producto->getCantidades() * $producto->objetoDatil->getPrecio()) }}
                                Precio PU: ${{ $producto->objetoDatil->getPrecio() }}

                                <input type="hidden" id="idDatil" name="idDatil" value="{{$producto->getIdDatiles()}}">
                                <input type="hidden" id="idCliente" name="idCliente" value="{{$producto->getIdClientes()}}">

                                <button 
                                        type="submit" 
                                        class="btn btn-primary" 
                                        name="actualizar"
                                    >
                                        Actualizar
                                </button>

                            </form>

                            <a class="btn btn-danger" href="{{ route('carrito.eliminarProducto', ['idCliente' => $producto->getIdClientes(), 'idDatil' => $producto->getIdDatiles()] ) }}"> Eliminar </a>                                            
                        
                        </div>
                
                    </div>
                
                </div> 

            @endforeach 

        </div>

        <div class="justify-content-end">
        <a class="btn btn-primary"  href="{{ route('compra.solicitarTarjeta', ['total' => $total] ) }}"> Pagar </a>
        Total: ${{$total}}
        </div>

    </div>

@endsection