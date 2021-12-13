@extends('layouts.app')

@section('active_reference')

    {{ Breadcrumbs::render('carrito') }}

@endsection

@section('content')

    <div class="container" style="margin-top: 7%">

        <div class="card d-inline-flex p-2" style="width: 80%">

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

                <div class="card-columns row mx-auto pt-5"> 

                    <div class="card p-3">

                        <div class="d-inline-flex p-2">

                            <a href="{{ route('home.datil', $producto->objetoDatil->getID()) }}">
                                <img class="card-img-top" src="http://127.0.0.1:8000/img/{{$producto->objetoDatil->getVariedad()}}.jpg" style="width: 150px; height: 150px">
                            </a>

                        </div>

                        <div class="d-inline-flex p-2">

                            <div class="card-body">

                                <div class="d-inline-flex p-2">

                                    <h5 class="card-title">{{$producto->objetoDatil->objetoVariedad->getVarNombre()}} - {{$producto->objetoDatil->objetoCategoria->getCatNombre()}}</h5>

                                </div>

                                <div class="d-inline-flex p-2">

                                    Subtotal: ${{ ($producto->getCantidades() * $producto->objetoDatil->getPrecio()) }}

                                </div>


                                <form method="POST" action="{{ route('carrito.actualizarProducto') }}">
                                @csrf

                                        <div class="container">
                                        <div class="row">
                                        <div class="col justify-content-center align-self-center">
                                       <h6 class=""> Cantidad: </h6> 
                                       </div>
                                        <div class="col justify-content-center align-self-cente">
                                       <input class="p-2" type="number" id="cantidad" name="cantidad" min="1" max="1001" value="{{$producto->getCantidades()}}" />
                                       </div>
                                        <div class="col justify-content-center align-self-cente">
                                        
                                        <input type="hidden" id="idDatil" name="idDatil" value="{{$producto->getIdDatiles()}}">
                                        <input type="hidden" id="idCliente" name="idCliente" value="{{$producto->getIdClientes()}}">

                                       </div>
                                        <div class="col justify-content-center align-self-cente">
                                        <button 
                                                type="submit" 
                                                class="btn btn-primary btn-sm p-2" 
                                                name="actualizar"
                                            >
                                                Actualizar
                                        </button>
                                       </div>
                                        <div class="col justify-content-center align-self-cente">

                                        <a class="btn btn-danger btn-sm ml-auto p-2 text-center" href="{{ route('carrito.eliminarProducto', ['idCliente' => $producto->getIdClientes(), 'idDatil' => $producto->getIdDatiles()] ) }}"> Eliminar </a>     
                                        </div> 
                                        </div>                                      
                                        </div>     

                                </form>
                            
                            </div>

                        </div>
                
                    </div>
                
                </div> 

            @endforeach 

        </div>

        <div class="card d-inline-flex p-2" style="width: 15%">

            <h5>{{count($productoCarrito)}} producto(s) <br>Total: ${{$total}} </h5>
            <a class="btn btn-primary"  href="{{ route('compra.solicitarTarjeta', ['total' => $total] ) }}"> Pagar </a>
        
        </div>

    </div>

@endsection