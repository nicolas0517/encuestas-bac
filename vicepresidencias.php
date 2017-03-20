<?php
    include("conexion.php");
    
    $con=conectar();
    $respuesta = "<option value='0'>Todas</option>";
    $vicepresidencia=consultar($con,"SELECT * FROM vicepresidencia");
    $filas = mysqli_num_rows($vicepresidencia);
    
    if ($filas === 0) {
		$respuesta = "<option value='0'>Ninguna</option>";
	} else {
        while($resultados = mysqli_fetch_array($vicepresidencia)) {
			$id = $resultados['k_vicepresidencia'];
			$nombre = utf8_encode($resultados['n_nombre']);

			//Output
			$respuesta .= '
            <option value= "' . $id . '">' . $nombre . '</option>
			';
		};
    };

    echo $respuesta;
?>
