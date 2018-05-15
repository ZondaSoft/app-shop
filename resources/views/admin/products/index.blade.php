@extends('layouts.app')

@section('title','Listado de productos')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de Productos</h2>

            <a href="{{ url('admin/products/create') }}" class="btn btn-success">Agregar producto</a>

            <div class="team">
                <div class="row">

                    <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoria</th>
                            <th class="text-right">Precio</th>
                            <th class="text-right">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="text-left">{{ $product->id }}</td>
                            <td class="text-left">{{ substr($product->name,0,25) }}</td>
                            <td class="text-left">{{ substr($product->description,0,20) }}</td>
                            <td class="text-left">{{ $product->category ? $product->category->name : 'General' }}</td>
                            <td class="text-right">&dollar; {{ $product->price}}</td>
                        
                            <td class="td-actions text-right">
                                <form method="post" action="{{ url('/admin/products/'.$product->id.'/delete') }}">
                                    {{ csrf_field() }}

                                    <a type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    
                                    <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imágenes del producto..." class="btn btn-warning btn-simple btn-xs">
                                        <i class="fa fa-image"></i>
                                    </a>
                                    
                                    {{-- <a href="{{ url('/admin/products/'.$product->id.'/delete') }}" type="button" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </a> --}}

                                    <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                    
                    @endforeach

                    </tbody>
                    </table>

                    {{ $products->links() }}
                </div>
            </div>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection
