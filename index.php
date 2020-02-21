
<!DOCTYPE html>

<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/fontawesome.min.css" rel="stylesheet">
    <link href="css/solid.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/bootstrap2.min.css"> -->
    

    <title>Ventas</title>
    <style type="text/css">
      #tblVentas tbody tr:hover{
        background: khaki;
      }
      #tblGastos tbody tr:hover{
        background: khaki;
      }
    </style>
  </head>
  <body>

<nav class="navbar navbar-dark bg-primary" style="height:50px">
  <h2 style="margin-top:10px">Ventas por día</h2>
</nav>
   

<div class="container">
    <br>

    
      
        <div class="content row" >

               <div class="col-xs-12">

                       <div class="form-group">

                         <label for="txtFechaHoraElab">Fecha:</label>
                         <input type="date" class="form-control" id="txtFechaVenta" name="txtFechaVenta" data-id-fecha='-1'>
                                             
                          <br>

                        </div>

                </div>
                      
        </div>


    <div class="row" >

            <div class="col-xs-6">
              
              <div class="form-group" style="border:0px solid red;width:120px;margin-left:275px">
                
                <button  id="btnAddVenta" name="txAddVenta"  class="btn btn-primary"> Agregar Venta</button>

              </div>
  
          </div>

          <div class="col-xs-6">
              
              <div class="form-group" style="border:0px solid red;width:120px;margin-left:52%">

                <button  id="btnAddGasto" name="btnAddGasto"  class="btn btn-primary"> Agregar Gasto</button>

              </div>
  
          </div>


    </div>
    
     <div class="row" >

           <div class="col-xs-6" style="border:1px solid black;height:450px;width:60%" >
              
              <div class="form-group">
                     
                            <h3 style='width:200px;border:0px solid red;display: inline-block;'>Ventas</h3>

                            <div style='width: 240px;border: 0px solid red;display: inline-block;margin-left: 1%;'>
                                <label for="totalCambioDejar" >Suelto $:</label>
                                <input type="text" id="totalSuelto" >
                            </div>

                            <div style='width: 130px;border: 4px solid red;display: inline-block;margin-left: 9%;background: blue;color: white;text-align: center;font-size: 16px;'>
                                  <label id="lblTituloTotal">Total $: </label>
                                  <label id="lblTotalDinero" >0</label>
                            </div>
                            <div id='contVentas' style='height:390px;overflow: auto;border:0px solid red;margin-top: 5px;'>
                                  <table id='tblVentas' border="1"  style="text-align: center;font-weight: bold;width: 100%;">
                                      <thead style='background: antiquewhite;'>
                                          <tr>
                                            <th style='text-align: center;'>No.</th>
                                            <th style='text-align: center;'>Venta</th>
                                            <th style='text-align: center;'>Pago en efectivo</th>
                                            <th style='text-align: center;'>Cambio</th>
                                            <th style='text-align: center;'>Hora</th>
                                            <th style='text-align: center;'>Eliminar</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr><td colspan="6">Sin ventas</td></tr>
                                      </tbody>
                                  </table>
                                  <br>
                           </div>
              </div>
  
          </div>

           <div class="col-xs-6" style="border: 1px solid black;width: 35%;margin-left: 4%;height: 450px;">
              
                  <div class="form-group">
                         
                          <h3>Gastos</h3>

                          <div id='contGastos' style='height:390px;overflow: auto;border:0px solid red;margin-top: 5px;' >

                                 <table id='tblGastos' border="1"  style="text-align: center;font-weight: bold;width: 100%;">
                                   <thead style='background: antiquewhite;'>
                                                    <tr>
                                                      <th style='text-align: center;'>Gasto</th>
                                                      <th style='text-align: center;'>Costo</th>
                                                      <th style='text-align: center;'>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td colspan="3">Sin gastos</td></tr>
                                                </tbody>
                                </table>
                         </div>
                  </div>
          </div>

  
          </div>

      </div>

     

   
</div>


<div id="modalGuardarVenta" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 65%;height: 540px;margin-left: 70px;">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size: 30px;font-weight: bold;margin-left:22%;">Guardar Venta</h4>
      </div>
      <div class="modal-body">
            <br>
            <div class="row">
                         
                       <div class="col-xs-12">
                             
                             <div class="form-group">
                                 <label for="txtTotalVenta" style="font-size:25px;background-color: greenyellow;">Total de venta</label>
                                 <input type="text" class="form-control" id="txtTotalVenta" name="txtTotalVenta" style='height: 45px;font-size: 30px;'   maxlength="15" >
                             </div>

                       </div>
             </div>
                <br>
               <div class="row">

                       <div class="col-xs-12">

                             <div class="form-group">

                                   <label for="txtPagoEfectivo" style="font-size:25px;background-color: aquamarine;">Pago en efectivo</label>
                                 <input type="tex" class="form-control" id="txtPagoEfectivo" name="txtPagoEfectivo" style="height: 45px;font-size: 30px;" maxlength="15">

                           </div>

                       </div>
                </div>
                
                <br>
                 <div class="row">

                       <div class="col-xs-12">

                             <div class="form-group">

                                 <label for="txtCambio" style="font-size:25px">Cambio</label>
                                 <div style="font-size: 35px;text-align: center;background: black;border-radius: 10px;color: white;">
                                    <label id="txtPagoEfectivo" name="txtPagoEfectivo" ><span id='spanPesos' style="display:none">$</span><span id='spanCambio'></span></label>
                                 </div>
                           </div>

                       </div>
                </div>

      </div>
      <div class="modal-footer" style='margin-top:0%;'>
      <button type="button" class="btn btn-primary" id="btnGuardarVenta">Guardar</button>
      <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelarVenta">Cancelar</button>
      </div>
    </div>

  </div>
</div>


<div id="modalGuardarGasto" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 65%;height: 420px;margin-left: 70px;">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size: 30px;font-weight: bold;margin-left:22%;">Guardar Gasto</h4>
      </div>
      <div class="modal-body">
            <br>
            <div class="row">
                         
                       <div class="col-xs-12">
                             
                             <div class="form-group">
                                 <label for="txtDescripcionGasto" style="font-size:25px;background-color: orange;">Descripión gasto</label>
                                 <input type="text" class="form-control" id="txtDescripcionGasto" name="txtDescripcionGasto" style='height: 45px;font-size: 18px;'   maxlength="250" >
                             </div>

                       </div>
             </div>
                <br>
               <div class="row">

                       <div class="col-xs-12">

                             <div class="form-group">

                                   <label for="txtCostoGasto" style="font-size:25px;background-color: orangered;">Costo del gasto</label>
                                 <input type="tex" class="form-control" id="txtCostoGasto" name="txtCostoGasto" style="height: 45px;font-size: 22px;" maxlength="15">

                           </div>

                       </div>
                </div>

      </div>
      <div class="modal-footer" style='margin-top:0%;'>
      <button type="button" class="btn btn-primary" id="btnGuardarGasto">Guardar</button>
      <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelarGasto">Cancelar</button>
      </div>
    </div>

  </div>
</div>

<div id="modalBorrarVenta" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" data-id-venta='-1'>
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alerta</h4>
      </div>
      <div class="modal-body">
        <center><p class='mldMsj' style='font-size: 20px;'>¿Eliminar la venta con hora <strong id='stVenta'></strong>?</p></center>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnAceptarEliminarVenta">Aceptar</button>
      <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelarEliminarVenta">Cancelar</button>
      </div>
    </div>

  </div>
</div>



<div id="modalBorrarGasto" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" data-id-gasto='-1'>
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alerta</h4>
      </div>
      <div class="modal-body">
        <center><p class='mldMsj' style='font-size: 20px;'>¿Eliminar el gasto <strong id='stGasto'></strong>?</p></center>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnAceptarEliminarGasto">Aceptar</button>
      <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelarEliminarGasto">Cancelar</button>
      </div>
    </div>

  </div>
</div>




<div id="modalAlertaSuccess" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alerta</h4>
      </div>
      <div class="modal-body">
        <center><p><i class="fas fa-check-circle fa-lg"></i> <label class='mldMsj'></label> </p></center>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnMd">Aceptar</button>
      </div>
    </div>

  </div>
</div>

<div id="modalAlertaWarning" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alerta</h4>
      </div>
      <div class="modal-body">
        <center><p><i class="fas fa-exclamation-circle fa-lg"></i> <label class='mldMsj'></label> </p></center>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnMd">Aceptar</button>
      </div>
    </div>

  </div>
</div>

<div id="modalAlertaError" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alerta</h4>
      </div>
      <div class="modal-body">
        <center><p><i class="fas fa-times fa-lg"></i> <label class='mldMsj'></label> </p></center>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnMd">Aceptar</button>
      </div>
    </div>

  </div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="libreriasJS/jquery.min.js"></script>
    <script src="libreriasJS/popper.min.js"></script>
    <script src="libreriasJS/bootstrap.min.js"></script>
    <script src="libreriasJS/bootstrapValidator.js"></script>
    <script src="js/ventas.js"></script>
  </body>



</html>

