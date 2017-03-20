<?php
    include("conexion.php");

    $filtro = $_POST['filtro'];
    $respuesta = "";
    
    if (isset($filtro)) {

        $con=conectar();

        $consulta=consultar($con,"SELECT e.n_descripcion evidencia, se.k_subevidencia, se.n_descripcion subevidencia FROM evidencia e, subevidencia se WHERE e.k_elemento= $filtro AND se.k_evidencia = e.k_evidencia");
        $filas = mysqli_num_rows($consulta);
        if ($filas === 0) {
            $respuesta = "<p>No se encontraron evidencias</p>";
        } else {
            while($resultados = mysqli_fetch_array($consulta)) {
                $id = $resultados['k_subevidencia'];
                $descripcion_evidencia = utf8_encode($resultados['evidencia']);
                $descripcion_subevidencia = utf8_encode($resultados['subevidencia']);

                //Output
                $respuesta .= '
                    <div class="checkbox">
                        <label><input type="checkbox" value="' . $id . '" id="evidencia' . $id . '" class="check_evidencias">' . $descripcion_evidencia . ' - ' . $descripcion_subevidencia . '</label>
                    </div>
                ';
            };
        }
        
    }

    echo $respuesta;
?>