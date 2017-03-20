<?php
    include("conexion.php");

    $filtro = $_POST['filtro'];
    $respuesta = "";
    
    if (isset($filtro)) {

        $con=conectar();

        $consulta=consultar($con,"SELECT r.n_descripcion rango, sr.k_subrango, sr.n_descripcion subrango FROM rango r, subrango sr WHERE r.k_elemento= $filtro AND sr.k_rango = r.k_rango");
        $filas = mysqli_num_rows($consulta);
        if ($filas === 0) {
            $respuesta = "<p>No se encontraron rangos</p>";
        } else {
            while($resultados = mysqli_fetch_array($consulta)) {
                $id = $resultados['k_subrango'];
                $descripcion_rango = utf8_encode($resultados['rango']);
                $descripcion_subrango = utf8_encode($resultados['subrango']);

                //Output
                $respuesta .= '
                    <div class="checkbox">
                        <label><input type="checkbox" value="' . $id . '" id="rango' . $id . '" class="check_rangos">' . $descripcion_rango . ' - ' . $descripcion_subrango . '</label>
                    </div>
                ';
            };
        }
        
    }

    echo $respuesta;
?>