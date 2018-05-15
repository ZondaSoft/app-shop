@extends('layouts.app')

@section('title','Bienvenido a app-Shop++')

@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Editar producto</h2>

            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
                {{ csrf_field() }}
                
                <div class="col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre del producto</label>
                        <input type="text" class="form-control" value = "{{ old('name',$product->name) }}" name="name">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Descripción</label>
                        <input type="text" class="form-control" value = "{{ old('description',$product->description) }}" name="description">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Precio del producto</label>
                        <input type="number" class="form-control" step="0.01" value = "{{ old('price',$product->price) }}" name="price">
                    </div>
                </div>

                <div class="col-sm-4">
                <textarea class="form-control" placeholder="Detalle del producto" rows="5" name="long_description">{{ old('long_description',$product->long_description) }}</textarea>
                </div>

                <button class="btn btn-success">Grabar</button>
                <a href="{{ url('/admin/products') }}" class="btn btn-danger">Cancelar</a>
            </form>

        </div>
    </div>

</div>

@include('includes.footer')
@endsection
