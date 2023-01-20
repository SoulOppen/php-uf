<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Value;

class PageController extends Controller
{
    public function inicio(){
        return view('home');
    }
    public function datos(){
        $values=Value::Paginate(5);
        return view('datos',compact('values'));

    }
    public function agregar(){
        return view('agregar');
    }
    public function value_uno($id) {
        
        $value=Value::findorfail($id);
        return view('value_uno',compact('value'));

    }
    public function crear(Request $request) {
        //return $request->all();
        $request->validate([
            'fecha'=>'required',
            'valor'=>'required|numeric',
        ]);
        $valueAgregar=new Value;
        $valueAgregar->fecha=$request->fecha;
        $valueAgregar->valor=$request->valor;
        $valueAgregar->save();
        return back()->with('mensaje','Valor Agregado');
    }
    public function editar($id){
        $value=Value::findorfail($id);
        return view('value_editar',compact('value'));  
    }
    public function actualizar(Request $request,$id){
        $valueActualizar=Value::findorfail($id);
        $valueActualizar->fecha=$request->fecha;
        $valueActualizar->valor=$request->valor;
        $valueActualizar->save();
        return back()->with('mensaje','Valor Modificado'); 
    }
    public function eliminar($id){
        $valueEliminar=Value::findorfail($id);
        $valueEliminar->delete();
        return redirect()->route("datos")->with("mensaje", "Dato Eliminado");
    }
    public function grafico() {
        $values=Value::all();
        return view('grafico',compact('values'));
    }
}
