@extends('plantilla')
@section('content')
    <h1 class="my-3">Valores Uf</h5>
      @if(count($values)==0)
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
        <div class="row d-flex justify-content-center w-100 col-12">
            <button type="submit" class="btn btn-success btn-block w-50 ">Agregar</button>
        </div>
    </form>
  @else
  <table class="table table-striped my-3">
  <thead>
    <tr>
      <th scope="col">Dia</th>
      <th scope="col">Valor</th>
      <th scope="col" colspan="2" >Acciones</th>
    </tr>
  </thead>
  
  <tbody>
  
  @foreach($values as $value)
    <tr>
      <th scope="row">
        <a href="{{route('value_uno',$value)}}"> <?php
          $input = $value->fecha;
          $date = strtotime($input);
          echo date('d-m-y', $date);    
      ?>
        </a>
        </th>
      <td>{{$value->valor}}</td>
      <td class="container col-2">
        <a href="{{route('value_editar',$value)}}" class=" btn btn-warning w-50">Editar</a>
      </td>
      <td class="container col-2">
        <form action="{{route('value_eliminar',$value)}}" method="POST" class="d-inline">
          @method("DELETE")
          @csrf
          <button type="submit" class="btn btn-danger w-50">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach()
</tbody>
</table>
<div class="d-flex justify-content-center" >
  {{$values->links()}}
</div>
<div class="container">
  <a href="{{route('agregar')}}" class=" btn btn-success w-50">+</a>
</div>
@endif
    
@endsection