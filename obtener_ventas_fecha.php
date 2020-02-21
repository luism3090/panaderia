<?php
include 'conexion.php';


$fecha_venta = $_POST['fecha_venta'];


try
{

	$query = "select 	fe.id_fecha,
						fe.fecha as fecha_venta,
						fe.suelto,
						ve.id_venta,
						ve.total_venta,
				        ve.pago_efectivo,
				        ve.cambio,
				        DATE_FORMAT(hora,'%h:%i:%s') as hora
				from fechas fe
				left join ventas ve on (fe.id_fecha = ve.id_fecha) 
				where fe.fecha = '".$fecha_venta."' order by id_venta asc";

	$resul = mysqli_query($conexion,$query);

	if($resul==false)
	{	
		$msjError = mysqli_error($conexion);
	    throw new Exception();
	}

	$registros = mysqli_num_rows($resul);

	$datosVenta = array();

	if($registros>0)
	{

			while ($row = mysqli_fetch_array($resul))
			{

				array_push($datosVenta,array( 	'id_fecha' =>$row['id_fecha'],
												'fecha_venta' =>$row['fecha_venta'],
												'suelto' =>$row['suelto'],
												'id_venta' =>$row['id_venta'], 
												'total_venta' =>$row['total_venta'], 
												'pago_efectivo' =>$row['pago_efectivo'], 
												'cambio' =>$row['cambio'],
												'hora' =>$row['hora'],   
												
											 )
						  );
		 		
		 	}

	}
	

	$resultado_query = array(
							'resultado'=> $datosVenta,
							'error'=> false,
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