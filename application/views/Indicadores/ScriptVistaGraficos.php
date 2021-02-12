<script>
    $.ajax({
            url: "<?php echo base_url();?>Indicadores/Graficos/data_genero",
            type: "post",
            dataType: "json",
            success: function(data)
            {
                console.log(data);
                var ctx = document.getElementById("ChartGenero");
                var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Lectores", "Lectoras"],
                    datasets: [{
                    label: 'Numero de lectores en la biblioteca por genero',
                    data: data,
                    backgroundColor: [
                        'rgba(0, 178, 151, 0.6)',
                        'rgba(232, 62, 140, 0.6)'
                    ],
                    borderColor: [
                        'rgba(0, 178, 151, 0.6)',
                        'rgba(232, 62, 140, 0.6)'
                    ],
                    borderWidth: 1
                    }]
                },
                options: {
                    responsive: false,
                    scales: {
                    xAxes: [{
                        ticks: {
                        maxRotation: 0,
                        minRotation: 0
                        },
                        gridLines: {
                        offsetGridLines: true // à rajouter
                        }
                    }],
                    yAxes: [{
                        ticks: {
                        beginAtZero: true
                        }
                    }]
                    }
                }
                });
            }
        });
</script>  
<script>
    $("#BtnPrintg").click(function(){
        $("#ChartGenero").get(0).toBlob(function(blob){
            saveAs(blob,"Reporte_lectores_genero.png")
        });
    });
</script> 
<script>
    $.ajax({
            url: "<?php echo base_url();?>Indicadores/Graficos/data_grado",
            type: "post",
            dataType: "json",
            success: function(data)
            {
                //console.log(data);
                var ctx = document.getElementById("ChartGrado");
                var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Inicial", "Primaria","Secundaria","Tecnica incompleta","Tecnica completa","Universitaria incompleta","Universitaria completa"],
                    datasets: [{
                    label: 'Numero de lectores en la biblioteca por grado de instruccion',
                    data: data,
                    backgroundColor: [
                        'rgba(11, 66, 193, 0.6)',
                        'rgba(46, 159, 249, 0.6)',
                        'rgba(16, 190, 218, 0.6)',
                        'rgba(249, 70, 87, 0.6)',
                        'rgba(248, 120, 179, 0.6)',
                        'rgba(195, 243, 96, 0.6)',
                        'rgba(244, 153, 23, 0.6)'
                    ],
                    borderColor: [
                        'rgba(11, 66, 193, 0.6)',
                        'rgba(46, 159, 249, 0.6)',
                        'rgba(16, 190, 218, 0.6)',
                        'rgba(249, 70, 87, 0.6)',
                        'rgba(248, 120, 179, 0.6)',
                        'rgba(195, 243, 96, 0.6)',
                        'rgba(244, 153, 23, 0.6)'
                    ],
                    borderWidth: 1
                    }]
                },
                options: {
                    responsive: false,
                    scales: {
                    xAxes: [{
                        ticks: {
                        maxRotation: 0,
                        minRotation: 0
                        },
                        gridLines: {
                        offsetGridLines: true // à rajouter
                        }
                    }],
                    yAxes: [{
                        ticks: {
                        beginAtZero: true
                        }
                    }]
                    }
                }
                });
            }
        });
</script>  
<script>
    $("#BtnPrintgr").click(function(){
        $("#ChartGrado").get(0).toBlob(function(blob){
            saveAs(blob,"Reporte_lectores_grado.png")
        });
    });
</script>    