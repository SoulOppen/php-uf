@extends('plantilla')
@section('content')
    <h1 class="my-3">Agregar Valor Uf</h5>
      <form action="{{route('value_crear')}}" method="POST" class="row">
        @csrf
        <div class="mb-3 col-6">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-control" id="date" placeholder="fecha" name="fecha" fecha value="{{ old('fecha') }}">
        </div>
        <div class="mb-3 col-6">
            <label class="form-label">Valor</label>
            <input type="float" class="form-control" id="value" placeholder="valor uf" name="valor" value="{{ old('valor') }}">
        </div>
        <div class="row d-flex justify-content-around w-100">
          <a href='{{'datos'}}' class="btn btn-primary btn-block w-25  ">Ver Datos</a>
          <button type="submit" class="btn btn-success btn-block w-25 ">Agregar</button>
        </div>
    </form>
  
@endsection