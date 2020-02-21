<?php
include 'conexion.php';


$fecha = $_POST['fecha'];
$id_fecha = $_POST['id_fecha'];
$suelto = $_POST['suelto'];


try
{

		$query = "select * from fechas where fecha = '".$fecha."' ";

		$resul = mysqli_query($conexion,$query);

		if($resul==false)
	    {	
	    	$msjError = mysqli_error($conexion);
	        throw new Exception();
	    }

		$registros = mysqli_num_rows($resul);

		if($registros == 0){

			 	   $query = " insert into fechas (fecha,suelto) values ('".$fecha."','".addslashes($suelto)."')"; 

					$resul = mysqli_query($conexion,$query);

					if($resul==false)
				    {	
				    	$msjError = mysqli_error($conexion);
				        throw new Exception();
				    }

					$id_fecha = mysqli_insert_id($conexion);

		}
		else{

			    $query = " update fechas set suelto = '".addslashes($suelto)."' where fecha = '".$fecha."' ";

					$resul = mysqli_query($conexion,$query);
					if($resul==false)
				    {
				    	$msjError = mysqli_error($conexion);
				        throw new Exception();
				    }

		}

					


		$resultado_query = array(				'id_fecha'=> $id_fecha,
												'fecha' => $fecha,
												'suelto' => $suelto,
												'error'=> false,
												'mensaje'=>'El suelto fue guardado correctamente'
											);

		echo json_encode($resultado_query);

}
catch(Exception $e){
	

	$resultado_query = array(
							'error'=> true,
							'resultado'=> $msjError,
							'mensaje'=>'Ocurrió un error a la hora de guardar los datos favor de contactar al programador'
						);

    echo json_encode($resultado_query);


}

?>
