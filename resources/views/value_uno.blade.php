@extends('plantilla')
@section('content')
    <h1 class="my-3">Valor Uf </h1>
    <h3 class="my-3">Fecha: {{date('d/m/Y',strtotime($value->fecha))}}
    <h3 class="my-3">Valor: {{$value->valor}}<h3>
    <div class="container d-flex justify-content-around my-3">
        <a href="{{route('value_editar',$value)}}" class=" btn btn-warning ">Editar</a>
        <form action="{{route('value_eliminar',$value)}}" method="POST">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
@endsection