@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 5%">

         @foreach( $productoCarrito as $producto )

            <div class="card-columns"> 

                <div class="card p-3">

                    <img href="{{ route('home.datil', $producto->objetoDatil->getID()) }}" class="card-img-top" src="../" >

                    <div class="card-body">

                        <h5 class="card-title">{{$producto->objetoDatil->objetoVariedad->getVarNombre()}} - {{$producto->objetoDatil->getCategoria() == 1 ? 'Orgánico' : 'No Orgánico'}}</h5>
                        <input type="number" min="1" max="1000" value="{{$producto->getCantidades()}}" />
                        
                    
                    </div>

                    <a class="btn btn-primary" > Actualizar </a>
                    <a class="btn btn-danger" href="{{ route('carrito.eliminarProducto', ['idCliente' => $producto->getIdClientes(), 'idDatil' => $producto->getIdDatiles()] ) }}"> Eliminar </a>                    
            
                </div>
            
            </div> 

        @endforeach 

        <a class="btn btn-primary" > Pagar </a>

    </div>

@endsection