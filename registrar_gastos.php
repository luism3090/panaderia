<?php
include 'conexion.php';


$gastos = $_POST['datosGastos'];

$gasto = $gastos['gasto'];
$descripcion = $gastos['descripcion'];
$fecha = $gastos['fecha'];
$id_fecha = $gastos['id_fecha'];


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

			 	   $query = " insert into fechas (fecha) values ('".$fecha."')"; 

					$resul = mysqli_query($conexion,$query);

					if($resul==false)
				    {	
				    	$msjError = mysqli_error($conexion);
				        throw new Exception();
				    }

					$id_fecha = mysqli_insert_id($conexion);

		}

					$query = " insert into gastos 
													(gasto,
													 descripcion,
													 id_fecha,
													 hora
													) 
													values (".addslashes($gasto).",
															'".addslashes($descripcion)."',
															".addslashes($id_fecha).",
															NOW()
															)";

					$resul = mysqli_query($conexion,$query);
					if($resul==false)
				    {
				    	$msjError = mysqli_error($conexion);
				        throw new Exception();
				    }


		$resultado_query = array(				'id_fecha'=> $id_fecha,
												'gasto'=> $gasto,
												'descripcion'=> $descripcion,
												'fecha' => $fecha,
												'error'=> false,
												'mensaje'=>'El gasto fue guardado correctamente'
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
