<!doctype html>
<html>
<head>
    <title>Obtener la restricción vehicular dependiendo de la fecha</title>
</head>
<body class="bodyini">
<link rel="stylesheet" href="<?php base_url() ?>css/estilo.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

<div class="botonesprinc">
    <form id="forma" action="restrictioncontroller/calculaterestriction">
        <div style="margin: 10px 0px 10px 0px" class="input-group">
            <span class="input-group-addon">Plate number/ Número de placa : </span>
            <input class="form-control" required type="text" id='plate' name="plate" placeholder="(ABC-1234) o (AB-123)"
                   pattern="((([a-z][a-z][a-z]|[A-Z][A-Z][A-Z])-?([0-9][0-9][0-9]|[0-9][0-9][0-9][0-9]))|(([a-z][a-z]|[A-Z][A-Z])-?[0-9][0-9][0-9]))"></input><br/>
        </div>
        <div class="input-group">
            <span class="input-group-addon">Date/ Día : </span>
            <input class="form-control" required type="date" id='datea' name="datea"></input><br/>
        </div>
        <div style="margin: 10px 0px 10px 0px" class="input-group">
            <span class="input-group-addon">Time/ Hora : </span>
            <input class="form-control" required type="time" id='timea' name="timea"></input><br/>
        </div>
        <input class="btn btn-success" type="submit" value="Consultar" id='boton'></input>
    </form>
</div>

</body>
</html>