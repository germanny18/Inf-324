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
    $sql = "SELECT per.departamento, avg(ins.notaFinal)
    FROM persona per JOIN inscripcion ins
    ON per.ci = ins.ciEst
    GROUP BY per.departamento";
    $resultado = mysqli_query($conexion, $sql);
?>
<table border="1px">
    <tr>
        <td>Departamento</td>
        <td>Nota promedio</td>

    </tr>
<?php
    while($fila = mysqli_fetch_array($resultado)){
       // print_r($fila);
        echo "<tr>";
        echo "<td>".$fila[0]."</td>";
        echo "<td>".$fila[1]."</td>";
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
    <h1>Area Director</h1>
    <h2>Promedio de notas por Departamento</h2>
    
</body>
</html>