<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="../css/mystyle2.css" /> 
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Orden de Ingreso</title>
</head>

<body>
<div class="icon-bar">

<div class="logo"> Logo</div>
    <div class="hamburguer">
<div class="line"></div>
<div class="line"></div>
<div class="line"></div>
</div>
<nav class="nav-bar">
<ul>
<li>
<a href="../rolAdmin/home.php" class="active">Home</a>
</li>
<li>
<a href="../rolAdmin/registro.php" class="">Registros Hospital</a>
</li>
<li>
<a href="../rolAdmin/areas.php" class="">Listado de Registros</a>
</li>
<li>
<a href="../rolAdmin/registroMascota.php" class="">Registro de Clientes</a>

</li>
<li>
<a href="../rolAdmin/inventario.php" class="">Inventario</a>
</li>
<li>
<a href="" class="">Salir</a>
</li>

</ul>

</div>

    </header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <h2>Reportes</h2>
    <hr>


    <form action="">

        <select name="" id="type">

            <optgroup>
                <option value="1"> Reporte General Usuarios</option>
                <option value="2"> Reporte Ventas</option>
                <option value="3"> PDF</option>

            </optgroup>
        </select>


    </form>
    <div id="container" style="width: 600px; height: 400px;"></div>

    <script>
        $(document).ready(function() {
            // Hacer una petición AJAX para obtener los datos desde PHP
            let type = 0;

            const url = {
                '1': '../backend/consult-users.php',
                '2': '../backend/consult-ventas.php',
                '3': '../backend/consult-xd.php',
            };

            const name = {
                '1': 'Usuarios',
                '2': 'Ventas',
                '3': 'xd'
            };
            const xd = {};
            xd.GRa1fic1 = () => {
                $.ajax({
                    url: '../backend/consult-users.php',
                    dataType: 'json',
                    success: function(data) {
                        // Configurar Highcharts con los datos obtenidos
                        Highcharts.chart('container', {
                            title: {
                                text: 'Gráfico de Datos'
                            },
                            xAxis: {
                                categories: data.map(item => item.nombre),
                                title: {
                                    text: 'User'
                                }
                            },
                            yAxis: {
                                title: {
                                    text: 'Rol ID'
                                }
                            },
                            series: [{
                                    name: 'Rol ID',
                                    data: data.map(item => parseInt(item.id_rol))
                                },
                                {
                                    name: 'Rol ',
                                    data: data.map(item => parseInt(item.id_rol ) + 2)
                                }
                            ]
                        });
                    }
                })
            }
            xd.grafic2 = ( url, name) => {
                $.ajax({
                    url: url,
                    dataType: 'json',
                    success: function(data) {
                        // Configurar Highcharts con los datos obtenidos
                        Highcharts.chart('container', {
                            title: {
                                text: 'Gráfico de Datos'
                            },
                            xAxis: {
                                categories: data.map(item => item.nombre),
                                title: {
                                    text: name
                                }
                            },
                            yAxis: {
                                title: {
                                    text: 'Rol ID'
                                }
                            },
                            series: [{
                                    name: 'Rol ID',
                                    data: data.map(item => parseInt(item.id_rol))
                                },
                                {
                                    name: 'Rol ',
                                    data: data.map(item => parseInt(item.id_rol) + 2) // 1 + 2 =>12
                                }
                            ]
                        });
                    }
                })
            }
            const type_html = $('#type');
            type_html.change(function() {
                let x = $(this).val();
                if (x == 3) {
                    alert('voy a crar un pdf')
                    return
                }
                if (x == 1) {
                    xd.GRa1fic1()
                    return
                }
                
                if (x == 2) {
                    xd.grafic2(url[x], name[x])
                    return
                }
                console.log(url[x]);
                $.ajax({
                    url: url[x],
                    dataType: 'json',
                    success: function(data) {
                        // Configurar Highcharts con los datos obtenidos
                        Highcharts.chart('container', {
                            title: {
                                text: 'Gráfico de Datos'
                            },
                            xAxis: {
                                categories: data.map(item => item.nombre),
                                title: {
                                    text: name[x]
                                }
                            },
                            yAxis: {
                                title: {
                                    text: 'Rol ID'
                                }
                            },
                            series: [{
                                    name: 'Rol ID',
                                    data: data.map(item => parseInt(item.id_rol))
                                },
                                {
                                    name: 'Rol ',
                                    data: data.map(item => parseInt(item.id_rol + 2))
                                }
                            ]
                        });
                    }
                });
            });



        });

        /*
    $.ajax({
        url: '../backend/consult-users.php',
        dataType: 'json',
        success: function(data) {
            // Configurar Highcharts con los datos obtenidos
            Highcharts.chart('container', {
                title: {
                    text: 'Gráfico de Datos'
                },
                xAxis: {
                    categories: data.map(item => item.nombre),
                    title: {
                        text: 'Usuarios'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Rol ID'
                    }
                },
                series: [{
                    name: 'Rol ID',
                    data: data.map(item => parseInt(item.id_rol)) 
                }]
            });
        }
    });
});*/
    </script>

    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function(){
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
</body>

</html>