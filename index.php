<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Ejercicio 2</title>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
</head>
<body>

<div class="fondo">
    <section class="form-register">
    <form action="#" method="POST">
    <h4>Registro de Tarjetas de Datos</h4>
<div class="cedulaDatos">
    <h5>Ingrese el número de cédula: </h5>
    <input type="text" class="controlador" id="cedulaIdentidadID" name="cedulaVenezuela"  minlength="7" maxlength="9" placeholder="Ingrese el número de cédula: ">
</div>

<div class="nombreDatos">
    <h5>Ingrese el nombre del alumno: </h5>
    <input type="text" class="controlador" id="nombreAlumnoID" name="nombreAlumno" placeholder="Ingrese el nombre de alumno: " >
</div>

<div class="notasMatematicas">
    <h5>Ingrese la nota del alumno en Matemáticas</h5>
    <input type="number" class="controlador" id="notaMatematicasID" name="notaMatematicas" min="1" max="20" placeholder="Ingrese la nota del alumno en Matemáticas: ">
</div>

<div class="notasFisica">
    <h5>Ingrese la nota del alumno en Física</h5>
    <input type="number" class="controlador" id="notaFisicaID" name="notaFisica" min="1" max="20" placeholder="Ingrese la nota del alumno en Física: ">
</div>

<div class="notasProgramacion">
    <h5>Ingrese la nota del alumno en Programación</h5>
    <input type="number" class="controlador" id="notaProgramacionID" name="notaProgramacion" min="1" max="20" placeholder="Ingrese la nota del alumno en Programación: ">
</div> <br>

    <button type = "submit" class="botones"  name= "btn" bonclick ="alert('Empleado registrado exitosamente!')" class="botonClase"> Registrar </button>    <br> <br> <br>
</form>
</section>

</div>

</body>
</html>


<?php 

include "clase.php";

session_start();

if(!isset($_SESSION['Alumnos'])) {

    $_SESSION['Alumnos'] = [];

}


if(isset($_POST['btn'])) {

    if(isset($_POST['cedulaVenezuela']) && isset($_POST['nombreAlumno']) && isset($_POST['notaMatematicas']) && isset($_POST['notaFisica']) && isset($_POST['notaProgramacion']) && !empty($_POST['cedulaVenezuela']) && !empty($_POST['nombreAlumno']) && !empty($_POST['notaMatematicas']) && !empty($_POST['notaFisica']) && !empty($_POST['notaProgramacion']))  {

        $alumno = new Alumno();
        $alumno->setCedula($_POST['cedulaVenezuela']);
        $alumno->setNombre($_POST['nombreAlumno']);
        $alumno->setnotaMatematicas($_POST['notaMatematicas']);
        $alumno->setnotaFisica($_POST['notaFisica']);
        $alumno->setnotaProgramacion($_POST['notaProgramacion']);

        array_push($_SESSION['Alumnos'], $alumno);
        generarPromedio();

    } else{
        echo "No funcionó, intentar nuevamente";
    }

    }
    
    function generarPromedio() {

        $aprobadosMatematicas = 0;
        $aprobadosFisica = 0;
        $aprobadosProgramacion = 0;
    
        $aplazadosMatematicas = 0;
        $aplazadosFisica = 0;
        $aplazadosProgramacion = 0;
    
        $promedioMatematica = 0;
        $promedioFisica = 0;
        $promedioProgramacion = 0;
    
        $sumaNotasMatematica = 0;
        $sumaNotasFisica = 0;
        $sumaNotasProgramacion = 0;
    
        $aprobadosTres = 0;
        $aprobadosDos = 0;
        $aprobadoUno = 0;
    
        $notaMaximaMatematicas = 0;
        $notaMaximaFisica = 0;
        $notaMaximaProgramacion = 0;
    
    $init = count($_SESSION['Alumnos']);//Contador de alumnos en el arreglo
    
    if(isset($_SESSION['Alumnos'])){//Función para determinar si el alumno aprobó o aplazo Matemáticas
        for($i=0; $i<$init; $i++){
            if ( $_SESSION['Alumnos'][$i]->getnotaMatematicas() >= 10) {
                $aprobadosMatematicas ++;
            } else {
                $aplazadosMatematicas++;
            }
        }
    }
    
    //Ciclo para determinar la nota mas alta de Matematicas
    
    for($i=0;$i<$init;$i++)  {
        if($_SESSION['Alumnos'][$i]->getnotaMatematicas() > $notaMaximaMatematicas){
            
            $notaMaximaMatematicas = $_SESSION['Alumnos'][$i]->getnotaMatematicas();
            
        }
    
    
    }
    
    for($i=0;$i<$init;$i++){ //ciclo para obtener todas las notas de matematicas
    
        $sumaNotasMatematica += $_SESSION['Alumnos'][$i]->getnotaMatematicas();
    }
    
    
    if(isset($_SESSION['Alumnos'])){//Función para determinar si el alumno aprobó o reprobó Física
        for($i=0; $i<$init; $i++){
            if ($_SESSION['Alumnos'][$i]->getnotaFisica() >= 10) {
                $aprobadosFisica ++;
            } else {
                $aplazadosFisica++;
            }
        }
    }
    
    //Ciclo para determinar la nota más alta de Física
    
    for($i=0;$i<$init;$i++)  {
        if($_SESSION['Alumnos'][$i]->getnotaFisica() > $notaMaximaFisica){
    
            $notaMaximaFisica = $_SESSION['Alumnos'][$i]->getnotaFisica();
        
        }
    
    }
    
    
    for($i=0;$i<$init;$i++){ //ciclo para obtener todas las notas de Física
    
        $sumaNotasFisica += $_SESSION['Alumnos'][$i]->getnotaFisica()  ;
    }
    
    if(isset($_SESSION['Alumnos'])){//Funcion para determinar si el alumno aprobo o reprobo programacion
        for($i=0; $i<$init; $i++){
            if ($_SESSION['Alumnos'][$i]->getnotaProgramacion() >= 10) {
                $aprobadosProgramacion ++;
            } else {
                $aplazadosProgramacion++;
            }
        }
    }
    
    
    
    //Ciclo para determinar la nota más alta de Programación
    
    for($i=0;$i<$init;$i++)  {
        if($_SESSION['Alumnos'][$i]->getnotaProgramacion() > $notaMaximaProgramacion){
    
            $notaMaximaProgramacion = $_SESSION['Alumnos'][$i]->getnotaProgramacion();
            
        }
    
    }
    
    for($i=0;$i<$init;$i++){ //ciclo para obtener todas las notas de programación
    
        $sumaNotasProgramacion += $_SESSION['Alumnos'][$i]->getnotaProgramacion();
    }
    
    if(isset($_SESSION['Alumnos'])) {//Método para ver cuantos aprobaron las tres materias
        for($i=0;$i<$init;$i++) {
            if($_SESSION['Alumnos'][$i]->getnotaMatematicas() >= 10 && $_SESSION['Alumnos'][$i]->getnotaFisica() >= 10 && $_SESSION['Alumnos'][$i]->getnotaProgramacion()){
    
                $aprobadosTres++;
            }
        }
    }
    
    if(isset($_SESSION['Alumnos'])) {//Método para ver cuántos aprobaron  dos materias
        for($i=0;$i<$init;$i++){
            if($_SESSION['Alumnos'][$i]->getnotaMatematicas() >= 10 && $_SESSION['Alumnos'][$i]->getnotaFisica() >= 10 && $_SESSION['Alumnos'][$i]->getnotaProgramacion() < 10 || $_SESSION['Alumnos'][$i]->getnotaMatematicas() >= 10 && $_SESSION['Alumnos'][$i]->getnotaProgramacion() >= 10 && $_SESSION['Alumnos'][$i]->getnotaFisica() < 10 || $_SESSION['Alumnos'][$i]->getnotaFisica() >= 10 && $_SESSION['Alumnos'][$i]->getnotaProgramacion() >= 10 && $_SESSION['Alumnos'][$i]->getnotaMatematicas() < 10) {
                $aprobadosDos++;
                
            }
    
        }
    }
    
    
    if(isset($_SESSION['Alumnos'])) {//Método para ver cuántos aprobaron una materias
        for($i=0;$i<$init;$i++){
            if($_SESSION['Alumnos'][$i]->getnotaMatematicas() >= 10 && $_SESSION['Alumnos'][$i]->getnotaFisica() < 10 && $_SESSION['Alumnos'][$i]->getnotaProgramacion() < 10 || $_SESSION['Alumnos'][$i]->getnotaMatematicas() < 10 && $_SESSION['Alumnos'][$i]->getnotaProgramacion() >= 10 && $_SESSION['Alumnos'][$i]->getnotaFisica() < 10 || $_SESSION['Alumnos'][$i]->getnotaFisica() >= 10 && $_SESSION['Alumnos'][$i]->getnotaProgramacion() < 10 && $_SESSION['Alumnos'][$i]->getnotaMatematicas() < 10) {
                $aprobadoUno++;
            }
    
        }
    }

    //Mostrar todos los resultados 

    echo "<h2 class='resultados'>Total de alumnos aprobados en Matemáticas: ". $aprobadosMatematicas . "</h2>";
        echo "<h2 class='resultados'>Total de alumnos aplazados en Matemáticas: ". $aplazadosMatematicas . "</h2>";
        echo "<h2 class='resultados'>La nota máxima de Matemáticas es: ".$notaMaximaMatematicas . "</h2>";
        if($init == 0 && $sumaNotasMatematica == 0){//Promedio de Matematicas
            echo "<h2 class='resultados'>No se pudo sacar el promedio de Matemáticas ya que no hay notas registradas</h2>";
        } else {
            $promedioMatematica = ($sumaNotasMatematica / $init);
        
            echo "<h2 class='resultados'>El promedio de Matemáticas de los alumnos es de: " . $promedioMatematica . "</h2>";
        
        
        }
        echo "<h2 class='resultados'>Total de alumnos aprobados en Física: ". $aprobadosFisica . "</h2>";
        echo "<h2 class='resultados'>Total de alumnos aplazados en Física: ". $aplazadosFisica . "</h2>";
        echo "<h2 class='resultados'>La nota maxima de Fisica es: ".$notaMaximaFisica . "</h2>";
        if($init == 0 && $sumaNotasFisica == 0){//Promedio de Física
            echo "<h2>No se pudo sacar el promedio de Física ya que no hay notas registradas</h2>";
        } else {
            $promedioFisica = ($sumaNotasFisica / $init);
        
            echo "<h2 class='resultados'>El promedio de Física de los alumnos es de: " . $promedioFisica . "</h2>"; 
        }
        echo "<h2 class='resultados'>Total de alumnos aprobados en Programación: ". $aprobadosProgramacion . "</h2>";
        echo "<h2 class='resultados'>Total de alumnos aplazados en Programación: ". $aplazadosProgramacion . "</h2>";
        echo "<h2 class='resultados'>La nota maxima de Programacion es: ".$notaMaximaProgramacion . "</h2>";
        if($init == 0 && $sumaNotasProgramacion == 0){//Promedio de Programación
            echo "<h2 class='resultados'>No se pudo sacar el promedio de Programacion ya que no hay notas registradas</h2>";
        } else {
            $promedioProgramacion = ($sumaNotasProgramacion / $init);
            echo "<h2 class='resultados'>El promedio de Programacion de los alumnos es de: " . $promedioProgramacion . "</h2>";
        }
        echo "<h2 class='resultados'>Total de alumnos que aprobaron tres materias: ". $aprobadosTres . "</h2>";
        echo "<h2 class='resultados'>Total de alumnos que aprobaron dos materias: ". $aprobadosDos . "</h2>";
        echo "<h2 class='resultados'>Total de alumnos que aprobaron una materia: ". $aprobadoUno . "</h2>";

   

    }

    
    


?>

