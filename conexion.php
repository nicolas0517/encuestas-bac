<?php

//pruebas locales

function conectar(){
    $user = "root";
    $pass = "mysql";
    $server="localhost";
    $db="modulo_normas";
    $con=mysqli_connect($server,$user,$pass) or die ("error al conectar a la bd ".mysqli_error());
    mysqli_select_db($con,$db);

    return $con;
}
/*
//servidor
function conectar(){
    $user = "normas";
    $pass = "normas";
    $server="localhost:3306";
    $db="modulo_normas";
    //$con= mysqli_connect($server,$user,$pass,$db);
    $con=mysqli_connect($server,$user,$pass) or die ("error al conectar a la bd prueba".mysqli_error());
    mysqli_select_db($con,$db);

    return $con;
}
*/
function consultar($conexion,$query){
    $consulta = mysqli_query($conexion,$query);
    //$resultado = mysqli_fetch_array($consulta);
    return $consulta;
}


?>