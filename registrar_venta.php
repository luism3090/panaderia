<?php
include 'conexion.php';


$ventas = $_POST['datosVentas'];

$total_venta = $ventas['total_venta'];
$pago_efectivo = $ventas['pago_efectivo'];
$cambio = $ventas['cambio'];
$fecha = $ventas['fecha'];
$id_fecha = $ventas['id_fecha'];


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

					$query = " insert into ventas 
													(total_venta,
													 pago_efectivo,
													 cambio,
													 id_fecha,
													 hora
													) 
													values (".addslashes($total_venta).",
															".addslashes($pago_efectivo).",
															".addslashes($cambio).",
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
												'total_venta'=> $total_venta,
												'pago_efectivo'=> $pago_efectivo,
												'cambio'=> $cambio,
												'fecha' => $fecha,
												'error'=> false,
												'mensaje'=>'La venta fue guardada correctamente'
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
