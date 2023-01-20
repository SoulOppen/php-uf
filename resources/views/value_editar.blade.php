@extends('plantilla')
@section('content')
    <h1 class="my-3">Valores Uf</h5>
    <form action="{{route('value_update',$value->id)}}" method="POST" class="row">
        @method('PUT')
        @csrf
        
        <div class="mb-3 col-6">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-control" id="date" placeholder="fecha" name="fecha" fecha value="{{ $value->fecha }}">
        </div>
        <div class="mb-3 col-6">
            <label class="form-label">Valor</label>
            <input type="float" class="form-control" id="value" placeholder="valor uf" name="valor" value="{{ $value->valor }}">
        </div>
        <div class="row d-flex justify-content-center w-100 col-12">
            <button type="submit" class="btn btn-warning btn-block w-50 ">Editar</button>
        </div>
    </form>
    
@endsection