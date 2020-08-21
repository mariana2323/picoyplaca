<!doctype html>
<html>
<head>
    <title>Obtener la restricción vehicular dependiendo de la fecha</title>
</head>
<body>


<!-- User details -->
<div>
    <form id="forma" action="restrictioncontroller/calculaterestriction">
        <label>Plate number/ Número de placa : </label>
        <input required type="text" id='plate' name="plate" placeholder="ABC-1234" pattern="[a-z][a-z][a-z]-?([0-9][0-9][0-9]|[0-9][0-9][0-9][0-9])"></input><br/>
        <label>Date/ Día : </label>
        <input required type="date" id='datea' name="datea"></input><br/>
        <label>Time/ Hora : </label>
        <input required type="time" id='timea' name="timea"></input><br/>
        <input type="submit" value="Consultar" id='boton'></input>
    </form>
</div>

</body>
</html>