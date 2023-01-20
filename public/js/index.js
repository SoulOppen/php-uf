<script>
    let values=<?php echo $values;?>;
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
    values_s=sortJSON(values,'fecha','asc')
    let fechas=[]
    let valores=[]
    for(value of values){
        fechas.push(value['fecha_2'])
        valores.push(value['valor'])
    }
    const min=document.getElementById("min")
    i=1
    for (value of values_s){
    
    const newElement = document.createElement('option')
    newElement.value=value['fecha'];
    newElement.textContent =value['fecha_2'] ;
    if i==1{
    newElement.select="true"
    min.appendChild(newElement);
    }
}
    const max=document.getElementById("max")
    for (value of values_s){)
    const newElement = document.createElement('option')
    newElement.value=value['fecha'];
    newElement.textContent =value['fecha_2'] ;
    max.appendChild(newElement);
}
    console.log (fechas)
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
    type: 'line',
    data: {
        labels: fechas,
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
  </script>