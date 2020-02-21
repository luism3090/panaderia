<?php
include 'conexion.php';


$fecha_venta = $_POST['fecha_venta'];


try
{

	$query = "select 	fe.id_fecha,
						fe.fecha as fecha_venta,
						gas.id_gasto,
				        gas.gasto,
				        gas.descripcion,
						DATE_FORMAT(gas.hora,'%h:%i:%s') as hora_gasto
				from fechas fe
				join gastos gas on (fe.id_fecha = gas.id_fecha) 
				where fe.fecha = '".$fecha_venta."' order by id_gasto asc";

	$resul = mysqli_query($conexion,$query);

	if($resul==false)
	{	
		$msjError = mysqli_error($conexion);
	    throw new Exception();
	}

	$registros = mysqli_num_rows($resul);

	$datosGasto = array();

	if($registros>0)
	{

			while ($row = mysqli_fetch_array($resul))
			{

				array_push($datosGasto,array( 	'id_fecha' =>$row['id_fecha'],
												'fecha_venta' =>$row['fecha_venta'],
												'id_gasto' =>$row['id_gasto'],
												'gasto' =>$row['gasto'], 
												'descripcion' =>$row['descripcion'], 
												'hora_gasto' =>$row['hora_gasto']
												
											 )
						  );
		 		
		 	}

	}
	

	$resultado_query = array(
							'resultado'=> $datosGasto,
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