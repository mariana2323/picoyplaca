<!doctype html>
<html>
<head>
    <title>Consulta Pico y Placa</title>
</head>
<body>
<link rel="stylesheet" href="<?php base_url() ?>css/estilo.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<div class="textoini">
    <h1>PICO Y PLACA</h1>
    <h2>Restricciones vehiculares</h2>
    <img class="imgprinc" src="<?php base_url() ?> img/principal.jpg"/>
</div>
<div class="botonesprinc">
    <p class="pestilo">Si desea averiguar si usted puede circular con su vehículo de acuerdo a las normas antiguas <br>vigentes
        hasta el 2019, puede hacerlo presionando el botón: Pico y Placa</p>
    <a style="margin: 0px 0px 10px 0px;" href="<?php base_url() ?> picoplacacontroller" class="btn btn-success">Pico y
        Placa</a>
    <p class="pestilo">Si desea averiguar si usted puede o pudo haber circulado con su vehículo de acuerdo a las normas
        <br>vigentes actuales y pasadas, puede hacerlo presionando el botón Restricción Vehicular (Pandemia)</p>
    <a href="<?php base_url() ?>restrictioncontroller" class="btn btn-success">Restricción vehicular (Pandemia)</a>
</div>
</body>
</html>