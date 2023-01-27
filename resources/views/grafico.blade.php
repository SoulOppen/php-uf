@extends('plantilla')
@section('header')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')
@if (count($values)<2)
    <a class="nav-link" href="{{ route('datos') }}">Datos</a>
@else
@foreach($values as $value)
    
@endforeach
<h1 class="my-3">Grafico historial Uf</h5>
<div>

    <select name="min" id="min"></select>
    <p class="d-inline">-</p>
    <select name="max" id="max"></select>
</div>
<div class="d-flex justify-content-center">
    <canvas id="myChart" style="max-height:50vh;max-width:50vW">
        <p>Grafico de valor uf en el tiempo</p>
    </canvas>
</div>

@endsection
@section('js')
<script>
    let values={{Js::from($values)}};
    console.log(values)
    let fechas=[];
    let valores=[];
    const sortJSON=(data, key, orden)=> {
    return data.sort(function (a, b) {
        var x = a[key],
        y = b[key];

        if (orden === 'asc') {
            return ((x < y) ? -1 : ((x > y) ? 1 : 0));
        }

        if (orden === 'desc') {
            return ((x > y) ? -1 : ((x < y) ? 1 : 0));
        }
    });
}
    values_s=sortJSON(values,'fecha','asc');
    console.log(values_s)
    for(value of values_s){
        fechas.push(value['fecha']);
        valores.push(value['valor']);
        }
    let i=0;
    const min=document.getElementById("min");
    for (value of values_s){
    
    const newElement = document.createElement('option')
    fecha_1=new Date(value['fecha']);
    newElement.value=value['fecha'];
    newElement.textContent =(fecha_1.getDate()+1) + "/" + (fecha_1.getMonth()+1) + "/" + fecha_1.getFullYear(); 
    min.appendChild(newElement);
    i++;
    }
    
    let j=0;
    const max=document.getElementById("max");
    
    for (value of values_s){
    const newElement = document.createElement('option');
    fecha_1=new Date(value['fecha']);
    newElement.value=value['fecha'];
    newElement.textContent =(fecha_1.getDate()+1) + "/" + (fecha_1.getMonth()+1) + "/" + fecha_1.getFullYear(); 
    
    if (i-1==j){     
        newElement.setAttribute('selected', "");
    }
    max.appendChild(newElement);

    j++
}   minimo=fechas[0];
    
    maximo=fechas[i-1];
    fechas_n=[]
    for(fecha of fechas ){
        f=new Date(fecha);
        fechas_n.push((f.getDate()+1) + "/" + (f.getMonth()+1) + "/" + f.getFullYear()); 
    }


        
    
    const ctx = document.getElementById('myChart').getContext('2d');
    
    grafico=new Chart(ctx, {
    type: 'line',
    data: {
        labels: fechas_n,
        datasets: [{
        label: 'Valor uf',
        data: valores,
        borderColor:'green',
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
});
    min.addEventListener ('change',(e)=>{
        let mnselected = min.options[min.selectedIndex].value;
        let mxselected = max.options[max.selectedIndex].value;
        
        i=0;
        j=0;
        for (fecha of fechas){
            if (fecha==mnselected){                
                break;
            }
        i++;                
        }
        for (fecha of fechas){
            if (fecha==mxselected){                
                break;
            }
        j++;                
        }
        if (mnselected>=mxselected){
            grafico.clear();
            alert("No se puede Graficar");
            
        }
        else {
            fechas_neo=[];
            valores_neo=[];
    k=i;
    while (k<=j){
        fechas_neo.push(fechas_n[k]); 
        valores_neo.push(valores[k]);
        k++;
        
    } 
    
    grafico.destroy();
    grafico=new Chart(ctx, {
    type: 'line',
    data: {
        labels: fechas_neo,
        datasets: [{
        label: 'Valor uf',
        data: valores_neo,
        borderColor:'green',
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
})
        }})
max.addEventListener('change',(e)=>{
        let mnselected = min.options[min.selectedIndex].value;
        let mxselected = max.options[max.selectedIndex].value;
        
        i=0;
        j=0;
        for (fecha of fechas){
            if (fecha==mnselected){                
                break;
            }
        i++;                
        }
        for (fecha of fechas){
            if (fecha==mxselected){                
                break;
            }
        j++;                
        }
        if (mnselected>=mxselected){
            grafico.clear();
            alert("No se puede Graficar");
        }
        else {
            fechas_neo=[];
            valores_neo=[];
    k=i;
    while (k<=j){
        fechas_neo.push(fechas_n[k]); 
        valores_neo.push(valores[k]);
        k++;
        
    } 
    grafico.destroy();
    grafico=new Chart(ctx, {
    type: 'line',
    data: {
        labels: fechas_neo,
        datasets: [{
        label: 'Valor uf',
        data: valores_neo,
        borderColor:'green',
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
})
}
}
)
    
  </script>
@endif
@endsection