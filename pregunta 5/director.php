<?php
    require_once("conexion.php");

    //session_start();
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: login.php');
        }
    }
    
    $sql = "SELECT 
    case per.departamento when '02' then 'La Paz'
              when '03' then 'Cochabamba'
              when '04' then 'Oruro'
              when '05' then 'Potosi'
              when '06' then 'Tarija'
              when '07' then 'Santa Cruz'
              else 'otro'
              end departamento,
    per.departamento, avg(ins.notaFinal) promedio
    from persona per join inscripcion ins
    on per.ci = ins.ciEst
    group by per.departamento";

    $resultado = mysqli_query($conexion, $sql);
?>
<table border="1px">
    <tr>
        <td>Departamento</td>
        <td>Num Dep</td>
        <td>Nota promedio</td>

    </tr>
<?php
    while($fila = mysqli_fetch_array($resultado)){
        echo "<tr>";
        echo "<td>".$fila[0]."</td>";
        echo "<td>".$fila[1]."</td>";
        echo "<td>".$fila[2]."</td>";
        echo "</tr>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Director</title>
</head>
<body>
    <h1>Director </h1>
    <h2>Promedio de notas por departamento</h2>
    
</body>
</html>