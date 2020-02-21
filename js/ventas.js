$(document).on('ready',function()
{

	var today = new Date();
	var fecha = today.toISOString().substring(0, 10);

	$("#txtFechaVenta").val(fecha);


	$("#btnAddVenta").on("click",function(event)
	{
		var fechaventa = $("#txtFechaVenta").val();

		$("#btnGuardarVenta").prop("disabled",false);

		if(fechaventa == "")
		{
			$('#modalAlertaWarning .modal-body .mldMsj').text("Debe seleccionar la fecha");
		    $('#modalAlertaWarning').modal('show');
		}
		else {
			

		    $('#modalGuardarVenta').modal('show');

		}

	});

	$("#btnAddGasto").on("click",function(event)
	{
		var fechaventa = $("#txtFechaVenta").val();

		if(fechaventa == "")
		{
			$('#modalAlertaWarning .modal-body .mldMsj').text("Debe seleccionar la fecha");
		    $('#modalAlertaWarning').modal('show');
		}
		else {
			

		    $('#modalGuardarGasto').modal('show');

		}

	});


	$("#txtTotalVenta,#txtPagoEfectivo").on("keyup",function(event)
	{
		
		var totalVenta = $("#txtTotalVenta").val().trim();
		var pagoEfectivo = $("#txtPagoEfectivo").val().trim();

		if(totalVenta != "" && pagoEfectivo !="")
		{

			var patron = /^-?[0-9]+([,\.][0-9]*)?$/;

			if(patron.test(totalVenta) == true && patron.test(pagoEfectivo) == true)
			{

				pagoEfectivo = parseFloat(pagoEfectivo);
				totalVenta = parseFloat(totalVenta);
				

				if(pagoEfectivo >= totalVenta)
				{
					var cambio = pagoEfectivo - totalVenta;
					$("#spanPesos").css("display","inline-block");
					$("#spanCambio").text(cambio); 
				}
				else{
					$("#spanPesos").css("display","none");
					$("#spanCambio").text(""); 
				}

				
			}
			 else{
			 	$("#spanPesos").css("display","none");
				$("#spanCambio").text(""); 
			}


			
		}
		else{
			 	$("#spanPesos").css("display","none");
				$("#spanCambio").text(""); 
			}

	});

	$("#txtTotalVenta,#txtPagoEfectivo").on("change",function(event)
	{
		
		var totalVenta = $("#txtTotalVenta").val().trim();
		var pagoEfectivo = $("#txtPagoEfectivo").val().trim();

		if(totalVenta != "" && pagoEfectivo !="")
		{

			var patron = /^-?[0-9]+([,\.][0-9]*)?$/;

			if(patron.test(totalVenta) == true && patron.test(pagoEfectivo) == true)
			{
				pagoEfectivo = parseFloat(pagoEfectivo);
				totalVenta = parseFloat(totalVenta);

				if(pagoEfectivo >= totalVenta)
				{
					var cambio = pagoEfectivo - totalVenta;
					$("#spanPesos").css("display","inline-block");
					$("#spanCambio").text(cambio); 
				}
				else{
					$("#spanPesos").css("display","none");
					$("#spanCambio").text(""); 
				}

				
			}
			 else{
			 	$("#spanPesos").css("display","none");
				$("#spanCambio").text(""); 
			}


			
		}
		else{
			 	$("#spanPesos").css("display","none");
				$("#spanCambio").text(""); 
			}

	});


	$('#modalGuardarVenta').on('hide.bs.modal', function (e) 
  	{

  		$("#spanPesos").css("display","none");
		$("#spanCambio").text("");
		$("#txtTotalVenta").val("");
		$("#txtPagoEfectivo").val("");
  	    
  	});


	$("#btnGuardarVenta").on("click",function(event)
	{
		
		var totalVenta = $("#txtTotalVenta").val().trim();
		var pagoEfectivo = $("#txtPagoEfectivo").val().trim();
		var patron = /^-?[0-9]+([,\.][0-9]*)?$/;

		if(totalVenta != "")
		{
			if(pagoEfectivo !="")
			{

				if(patron.test(totalVenta) == true)
				{

					if(patron.test(pagoEfectivo) == true)
					{

						pagoEfectivo = parseFloat(pagoEfectivo);
						totalVenta = parseFloat(totalVenta);

						if(pagoEfectivo >= totalVenta)
						{

							let datosVentas = {
							 	total_venta: $("#txtTotalVenta").val().trim(),
							 	pago_efectivo: $("#txtPagoEfectivo").val().trim(),
							 	cambio: $("#spanCambio").text(),
							 	fecha: $("#txtFechaVenta").val(),
							 	id_fecha: $("#txtFechaVenta").attr("data-id-fecha")
							}

							$("#btnGuardarVenta").prop("disabled",true);

							$.ajax(
					               {
						               type: "POST",
						               url: "registrar_venta.php",
						               data:{datosVentas:datosVentas} ,
						               async: true,
						               dataType:"json",
						               success: function(result)
						               {              

						               	  if(result.error == false){

						               	  	 $("#txtFechaVenta").attr("data-id-fecha",result.id_fecha);

						               	  	 obtenerVentasFecha();

							          	  	 $('#modalGuardarVenta').modal('hide');


						               	  }
						               	  else{
						               	  	 
						               	  	 $('#modalAlertaError .modal-body .mldMsj').text(result.mensaje);
							          	  	 $('#modalAlertaError').modal('show');
						               	  	
						               	  }

						               	 
						               },
						               error:function(result)
						               {
						                    console.log(result.responseText);
						                    //$("#error").html(data.responseText); 
						               }
					          
					           });

						}
						else
						{
							$('#modalAlertaWarning .modal-body .mldMsj').html("<div> El <span style='background-color: aquamarine;'> pago en efectivo </span> debe ser mayor que el <span style='background-color: greenyellow;'>total de la venta</span></div>");
			    			$('#modalAlertaWarning').modal('show');
			    			
						}
					}
					else
					{
						$('#modalAlertaWarning .modal-body .mldMsj').html("<div> El <span style='background-color: aquamarine;'> pago en efectivo</span> debe ser solo números </div>");
		    			$('#modalAlertaWarning').modal('show');
		    			
					}
				}
				else{

					$('#modalAlertaWarning .modal-body .mldMsj').html("El <span style='background-color: greenyellow;'> total de la venta </span> debe ser solo números");
		    		$('#modalAlertaWarning').modal('show');
		    		
				}

			}
			else{
				$('#modalAlertaWarning .modal-body .mldMsj').html("Debe ingresar el <span style='background-color: aquamarine;'> pago en efectivo </span>");
		    	$('#modalAlertaWarning').modal('show');
		    	
			}
		}
		else{

			$('#modalAlertaWarning .modal-body .mldMsj').html("Debe ingresar el <span style='background-color: greenyellow;'> total de venta </span>");
		    $('#modalAlertaWarning').modal('show');

			
		}



	});

	$("#btnGuardarGasto").on("click",function(event)
	{
		
		var descripcionGasto = $("#txtDescripcionGasto").val().trim();
		var costoGasto = $("#txtCostoGasto").val().trim();
		var patron = /^-?[0-9]+([,\.][0-9]*)?$/;

		if(descripcionGasto != "")
		{
			if(costoGasto !="")
			{

				if(patron.test(costoGasto) == true)
				{


							let datosGastos = {
							 	gasto: costoGasto,
							 	descripcion: descripcionGasto,
							 	fecha: $("#txtFechaVenta").val(),
							 	id_fecha: $("#txtFechaVenta").attr("data-id-fecha")
							}

							$.ajax(
					               {
						               type: "POST",
						               url: "registrar_gastos.php",
						               data:{datosGastos:datosGastos} ,
						               async: true,
						               dataType:"json",
						               success: function(result)
						               {              

						               	  if(result.error == false){

						               	  	 $("#txtFechaVenta").attr("data-id-fecha",result.id_fecha);

						               	  	 obtenerGastosFecha();

							          	  	 $('#modalGuardarGasto').modal('hide');


						               	  }
						               	  else{
						               	  	 
						               	  	 $('#modalAlertaError .modal-body .mldMsj').text(result.mensaje);
							          	  	 $('#modalAlertaError').modal('show');
						               	  	
						               	  }

						               	 
						               },
						               error:function(result)
						               {
						                    console.log(result.responseText);
						                    //$("#error").html(data.responseText); 
						               }
					          
					           });

				}
				else{

					$('#modalAlertaWarning .modal-body .mldMsj').html("El <span style='background-color: orangered;'> costo del gasto </span> debe ser solo números");
		    		$('#modalAlertaWarning').modal('show');
		    		
				}

			}
			else{
				$('#modalAlertaWarning .modal-body .mldMsj').html("Debe ingresar el <span style='background-color: orangered;'> costo del gasto </span>");
		    	$('#modalAlertaWarning').modal('show');
		    	
			}
		}
		else{

			$('#modalAlertaWarning .modal-body .mldMsj').html("Debe ingresar la <span style='background-color: orange;'> descripción del gasto </span>");
		    $('#modalAlertaWarning').modal('show');

			
		}



	});

	$('#modalGuardarGasto').on('hide.bs.modal', function (e) 
  	{

		$("#txtDescripcionGasto").val("");
		$("#txtCostoGasto").val("");
  	    
  	});



	$("#txtFechaVenta").on("change",function(event)
	{
		
		obtenerVentasFecha();
		obtenerGastosFecha();

	});


	$("#totalSuelto").on("change",function(event)
	{
		

		$.ajax(
               {
	               type: "POST",
	               url: "registrar_suelto.php",
	               data:{
	               			fecha: $("#txtFechaVenta").val(),
	               			id_fecha: $("#txtFechaVenta").attr("data-id-fecha"),
	               			suelto: $("#totalSuelto").val().trim() 
	               		},
	               async: true,
	               dataType:"json",
	               success: function(result)
	               {              

	               	  if(result.error == false){

	               	  	$("#txtFechaVenta").attr("data-id-fecha",result.id_fecha);
	               	  	obtenerVentasFecha();

	               	  }
	               	  else{
	               	  	 
	               	  	 $('#modalAlertaError .modal-body .mldMsj').text(result.mensaje);
		          	  	 $('#modalAlertaError').modal('show');
	               	  	
	               	  }

	               	 
	               },
	               error:function(result)
	               {
	                    console.log(result.responseText);
	                    //$("#error").html(data.responseText); 
	               }
          
           });

	});

	$("body").on("click",".iconDeleteVenta",function(event)
	{
		var hora = $(this).parent().find("td").eq(4).text();
		var id_venta = $(this).attr("data-id-venta");
		
		$('#modalBorrarVenta .modal-body #stVenta').text(hora);
		$('#modalBorrarVenta').modal('show');
		$("#modalBorrarVenta").attr("data-id-venta",id_venta);

	});

	
	$("#btnAceptarEliminarVenta").on("click",function(event)
	{

		var id_venta = $("#modalBorrarVenta").attr("data-id-venta");
		
		$.ajax(
	           {
	               type: "POST",
	               url: "eliminar_venta.php",
	               data:{id_venta:id_venta},
	               async: true,
	               dataType:"json",
	               success: function(result)
	               {              

	               	  if(result.error == false){


	               	  	$('#modalBorrarVenta').modal('hide');

	               	  	 obtenerVentasFecha();

	               	  }
	               	  else{
	               	  	 
	               	  	 $('#modalAlertaError .modal-body .mldMsj').text(result.mensaje);
		          	  	 $('#modalAlertaError').modal('show');
	               	  	
	               	  }

	               	 
	               },
	               error:function(result)
	               {
	                    console.log(result.responseText);
	                    //$("#error").html(data.responseText); 
	               }
	      
	       });

	});
  	
  	$("body").on("click",".iconDeleteGasto",function(event)
	{
		var gasto = $(this).parent().find("td").eq(0).text();
		var id_gasto = $(this).attr("data-id-gasto");
		
		$('#modalBorrarGasto .modal-body #stGasto').text(gasto);
		$('#modalBorrarGasto').modal('show');
		$("#modalBorrarGasto").attr("data-id-gasto",id_gasto);

	});

	$("#btnAceptarEliminarGasto").on("click",function(event)
	{

		var id_gasto = $("#modalBorrarGasto").attr("data-id-gasto");
		
		$.ajax(
	           {
	               type: "POST",
	               url: "eliminar_gasto.php",
	               data:{id_gasto:id_gasto},
	               async: true,
	               dataType:"json",
	               success: function(result)
	               {              

	               	  if(result.error == false){


	               	  	$('#modalBorrarGasto').modal('hide');

	               	  	 obtenerGastosFecha();

	               	  }
	               	  else{
	               	  	 
	               	  	 $('#modalAlertaError .modal-body .mldMsj').text(result.mensaje);
		          	  	 $('#modalAlertaError').modal('show');
	               	  	
	               	  }

	               	 
	               },
	               error:function(result)
	               {
	                    console.log(result.responseText);
	                    //$("#error").html(data.responseText); 
	               }
	      
	       });

	});


	function obtenerVentasFecha()
	{

		$.ajax(
	       {
	           type: "POST",
	           url: "obtener_ventas_fecha.php",
	           data:{fecha_venta:$("#txtFechaVenta").val()} ,
	           async: true,
	           dataType:"json",
	           success: function(result)
	           {              

	           	  if(result.error == false){

	           	  	var tblVentas='';

	           	  	var sumaTotalVenta = 0;
	           	  	var sumaPagoEfectivo = 0;
	           	  	var sumaCambios = 0;

	           	  	 for(x = 0; x < result.resultado.length ;x++)
	           	  	 {
	           	  	 	if(result.resultado[x].id_venta != null)
	           	  	 	{



		           	  	 	tblVentas += `<tr style='font-size: 15px;'> 
		           	  	 					<td style='height: 30px;text-align: center' id='ventasTotales'>${x+1}</td>
					           	  	 	 	<td style='height: 30px;'>${result.resultado[x].total_venta}</td>
					           	  	 	 	<td style='height: 30px;'>${result.resultado[x].pago_efectivo}</td>
					           	  	 	 	<td style='height: 30px;'>${result.resultado[x].cambio}</td>
					           	  	 	 	<td style='height: 30px;'>${result.resultado[x].hora}</td>
					           	  	 	 	<td style='height: 30px;cursor:pointer' data-id-venta='${result.resultado[x].id_venta}' class='iconDeleteVenta'><i class="fas fa-trash-alt" ></i></td>
					           	  	 	</tr>`;

					        sumaTotalVenta += parseFloat(result.resultado[x].total_venta);
					        sumaPagoEfectivo += parseFloat(result.resultado[x].pago_efectivo);
					        sumaCambios += parseFloat(result.resultado[x].cambio);

				        }
	           	  	 	else{
	           	  	 		$("#tblVentas tbody").html('<tr><td colspan="6">Sin ventas</td></tr>');
	           	  	 	}

	           	  	 }

	           	  	 if(result.resultado.length>0)
	           	  	 {
	           	  	 	$("#totalSuelto").val(result.resultado[0].suelto);

	           	  	 	if(result.resultado[0].id_venta != null)
	           	  	 	{

	           	  	 		$("#txtFechaVenta").attr("data-id-fecha",result.resultado[0].id_fecha);
	           	  	 		$("#tblVentas tbody").html(tblVentas);
	           	  	 		$("#tblVentas tbody").append(`<tr style='border:1px solid red;background: blue;color: white'> 
	           	  	 								<td style='height: 20px;text-align: center'>Totales</td>
							           	  	 	 	<td style='height: 20px;text-align: center;border: 4px solid red;' id='ventasTotales'>${sumaTotalVenta}</td>
							           	  	 	 	<td style='height: 20px;text-align: center' id='sumaPagoEfectivo'>${sumaPagoEfectivo}</td>
							           	  	 	 	<td style='height: 20px;text-align: center' id='cambiosTotales'>${sumaCambios}</td>
							           	  	 	 	<td style='height: 20px;text-align: center'></td>
							           	  	 	 	<td style='height: 20px;text-align: center'></td>
							           	  	 	</tr>`);

	           	  	 		var patron = /^-?[0-9]+([,\.][0-9]*)?$/;

	           	  	 		if(patron.test($("#totalSuelto").val().trim()) == false){

	           	  	 			$("#lblTotalDinero").text(parseFloat(sumaTotalVenta));
	           	  	 		}
	           	  	 		else{

	           	  	 			$("#lblTotalDinero").text(parseFloat(result.resultado[0].suelto) + parseFloat(sumaTotalVenta));
	           	  	 		}
	           	  	 		

	           	  	 		
	           	  	 	}
	           	  	 	else{

	           	  	 		var patron = /^-?[0-9]+([,\.][0-9]*)?$/;

	           	  	 		if(patron.test($("#totalSuelto").val().trim()) == false){

	           	  	 			$("#lblTotalDinero").text("0");
	           	  	 		}
	           	  	 		else{

	           	  	 			$("#lblTotalDinero").text(parseFloat(result.resultado[0].suelto));
	           	  	 		}
	           	  	 		
	           	  	 	}
	           	  	 	
	           	  	 	$("#txtFechaVenta").attr("data-id-fecha",result.resultado[0].id_fecha);
	           	  	 	
	           	  	 	

	           	  	 	
	           	  	 }
	           	  	 else{
	           	  	 	$("#txtFechaVenta").attr("data-id-fecha","-1");
	           	  	 	$("#tblVentas tbody").html('<tr><td colspan="6">Sin ventas</td></tr>');
	           	  	 	$("#totalSuelto").val("");
	           	  	 	$("#lblTotalDinero").text("0");
	           	  	 }

	           	  	 
	           	  }
	           	  else{
	           	  	 
	           	  	 $('#modalAlertaError .modal-body .mldMsj').text(result.mensaje);
	          	  	 $('#modalAlertaError').modal('show');
	           	  	
	           	  }

	           	 
	           },
	           error:function(result)
	           {
	                console.log(result.responseText);
	                //$("#error").html(data.responseText); 
	           }
	  
	   		});
    }

    obtenerVentasFecha();

    function obtenerGastosFecha()
	{

		$.ajax(
	       {
	           type: "POST",
	           url: "obtener_gastos_fecha.php",
	           data:{fecha_venta:$("#txtFechaVenta").val()} ,
	           async: true,
	           dataType:"json",
	           success: function(result)
	           {              

	           	  if(result.error == false)
	           	  {

	           	  	var tblGastos='';

	           	  	var sumaTotalGastos = 0;

	           	  	 for(x = 0; x < result.resultado.length ;x++)
	           	  	 {
	           	  	 	
		           	  	 	tblGastos += `<tr style='font-size: 15px;'> 
		           	  	 					
					           	  	 	 	<td style='height: 30px;'>${result.resultado[x].descripcion}</td>
					           	  	 	 	<td style='height: 30px;'>${result.resultado[x].gasto}</td>
					           	  	 	 	<td style='height: 30px;cursor:pointer' data-id-gasto='${result.resultado[x].id_gasto}' class='iconDeleteGasto'><i class="fas fa-trash-alt" ></i></td>
					           	  	 	</tr>`;

					        sumaTotalGastos += parseFloat(result.resultado[x].gasto);

				       

	           	  	 }

	           	  	 if(result.resultado.length>0)
	           	  	 {
	           	  	 
	           	  	 		$("#txtFechaVenta").attr("data-id-fecha",result.resultado[0].id_fecha);
	           	  	 		$("#tblGastos tbody").html(tblGastos);
	           	  	 		$("#tblGastos tbody").append(`<tr style='border:1px solid red;background: blue;color: white'> 
	           	  	 								<td style='height: 20px;text-align: center'>Totales</td>
							           	  	 	 	<td style='height: 20px;text-align: center;border: 4px solid red;' class='gastosTotales'>${sumaTotalGastos}</td>
							           	  	 	 	<td style='height: 20px;text-align: center'></td>
							           	  	 	</tr>`);
	           	  	 	
	           	  	 }
	           	  	 else{
	           	  	 	
	           	  	 	$("#tblGastos tbody").html('<tr><td colspan="3">Sin gastos</td></tr>');
	           	  	 
	           	  	 }

	           	  	 
	           	  }
	           	  else{
	           	  	 
	           	  	 $('#modalAlertaError .modal-body .mldMsj').text(result.mensaje);
	          	  	 $('#modalAlertaError').modal('show');
	           	  	
	           	  }

	           	 
	           },
	           error:function(result)
	           {
	                console.log(result.responseText);
	                //$("#error").html(data.responseText); 
	           }
	  
	   		});
    }

    obtenerGastosFecha();

});