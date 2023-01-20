@extends('plantilla')
@section('header')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')
@foreach($values as $value)
<?php
          $input = $value->fecha;
          $date = strtotime($input);
          $date =date('d-m-y', $date); 
          $value->fecha_2=$date;   
?>
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
    let values=<?php echo $values;?>;
    let fechas=[];
    let fechas_2=[];
    let valores=[];
    const sortJSON=(data, key, orden)=> {
    return data.sort(function (a, b) {
        var x = a[key].toString(),
        y = b[key].toString();

        if (orden === 'asc') {
            return ((x < y) ? -1 : ((x > y) ? 1 : 0));
        }

        if (orden === 'desc') {
            return ((x > y) ? -1 : ((x < y) ? 1 : 0));
        }
    });
}
    values_s=sortJSON(values,'fecha','asc');
    
    for(value of values){
        fechas.push(value['fecha']);
        fechas_2.push(value['fecha_2']);
        valores.push(value['valor']);
        
    }
    let i=0;
    const min=document.getElementById("min");
    for (value of values_s){
    
    const newElement = document.createElement('option')
    newElement.value=value['fecha'];
    newElement.textContent =value['fecha_2'] ;
    min.appendChild(newElement);
    i++;
    }
    
    let j=0;
    const max=document.getElementById("max");
    
    for (value of values_s){
    const newElement = document.createElement('option');
    newElement.value=value['fecha'];
    newElement.textContent =value['fecha_2']; 
    
    if (i-1==j){     
        newElement.setAttribute('selected', "");
    }
    max.appendChild(newElement);

    j++
}   
    
    minimo=fechas[0];
    
    maximo=fechas[i-1];
    
    
    const ctx = document.getElementById('myChart').getContext('2d');
    
    grafico=new Chart(ctx, {
    type: 'line',
    data: {
        labels: fechas_2,
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
            alert("No se puede Graficar");
        }
        else {
            fechas_n=[];
            valores_n=[];
    k=i;
    while (k<=j){
        fechas_n.push(fechas_2[k]); 
        valores_n.push(valores[k]);
        k++;
        
    } 
    grafico.clear();
    grafico.destroy();
    grafico=new Chart(ctx, {
    type: 'line',
    data: {
        labels: fechas_n,
        datasets: [{
        label: 'Valor uf',
        data: valores_n,
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
            alert("No se puede Graficar");
        }
        else {
            fechas_n=[];
            valores_n=[];
    k=i;
    while (k<=j){
        fechas_n.push(fechas_2[k]); 
        valores_n.push(valores[k]);
        k++;
        
    } 
    grafico.clear();
    grafico.destroy();
    grafico=new Chart(ctx, {
    type: 'line',
    data: {
        labels: fechas_n,
        datasets: [{
        label: 'Valor uf',
        data: valores_n,
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
@endsection