<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INCRITE</title>
<link href="../css/estilo.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/myjava.js"></script>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<?
	include "../php/conexion.php";
?>
	</head>
<body>
    <header>INDUSTRIA DE CRISTAL TEMPLADO</header>
    <section>
    <table border="0" align="center">
    	<tr>
        	<td width="335"><input type="text" placeholder="Marca" id="bs-marca"/></td>
            <td width="335"><input type="text" placeholder="Clave/Accesorios" id="bs-clave"/></td>
            <td width="100"><button id="nuevo-producto" class="btn btn-primary">Nuevo registro</button></td>
            <td width="200"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar Busqueda a PDF</a></td>
        </tr>
    </table>
    </section>

    <div class="registros" id="agrega-registros"></div>
    <center>
        <ul class="pagination" id="pagination"></ul>
    </center>
    <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
    <div class="modal fade" id="registra-producto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita (llenar todos los campos)</b></h4>
            </div>
            <form action="javascript: fn_agregar();" method="post"  id="formulario" onsubmit="return agregaRegistro();">
            <div class="formulario">
				<table border="0" width="100%">
               		 <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-prod" name="id-prod" readonly="readonly" style="visibility:hidden; height:5px;"/></td>
                    </tr>
                     <tr><!--VALORES A MOSTRAR EN LA PAGINA DE INICIO-->
                    	<td width="150">Operacion: </td>
                        <td><input type="text" required="required" readonly="readonly" id="pro" name="pro"/></td>
                    </tr>
                	<tr>
                    	<td>Clave: </td>
                        <td><input type="text" class="required" name="CLAVE" id="CLAVE" maxlength="15"/></td>
                    </tr>
                    <tr>
                    	<td>Marca: </td><!--VALORES DEL SELECT (MARCAS) IMPORTANTE!!!!-->
                        <td><select required="required" name="MARCA" id="MARCA">
                        		<option value="SAAB">SAAB</option>
                                <option value="TOYOTA">TOYOTA</option>
                                <option value="NISSAN">NISSAN</option>
								    <option value="DEFENDER">DEFENDER</option>
                               <!-- <option value="EJEMPLO">EJEMPLO</option> EJEMPLO PARA AGREGAR NUEVAS MARCAS-->
                            </select></td>
                    </tr>
                    <tr>
                    	<td>Precio CL: </td>
                        <td><input type="number" required="required" name="CL" id="CL"/></td>
                    </tr>
                    <tr>
                    	<td>Precio TX</td>
                        <td><input type="number"  required="required" name="TX" id="TX"/></td>
                    </tr>
					<tr>
                    	<td>Precio GRIS</td>
                        <td><input type="number"  required="required" name="GRIS" id="GRIS"/></td>
                    </tr>
					<tr>
                    	<td>Precio PRIV</td>
                        <td><input type="number"  required="required" name="PRIV" id="PRIV"/></td>
                    </tr>
                    <tr>
					<tr>
                    	<td>Equivalencia</td>
                        <td><input type="text"  name="EQUIVALENCIA" id="EQUIVALENCIA"/></td>
                    </tr>
					<tr>
                    	<td>0</td>
                        <td><input type="number"  required="required" name="O" id="O"/></td>
                    </tr>
					<tr>
                    	<td>Parte</td>
                        <td><input type="text"  required="required" name="PARTE" id="PARTE"/></td>
                    </tr>
					<tr>
                    	<td>Accesorios</td>
                        <td><input type="text"  required="required" name="ACCESORIOS" id="ACCESORIOS"/></td>
                    </tr>
					<tr>
                    	<td>Modelo</td>
                        <td><input type="text"  required="required" name="MODELO" id="MODELO"/></td>
                    </tr>
					<tr>
                    	<td>Tipo</td>
                        <td><input type="text"  required="required" name="TIPO" id="TIPO"/></td>
                    </tr>
					<tr>
                    	<td>Medida</td>
                        <td><input type="text"  required="required" name="MEDIDA" id="MEDIDA"/></td>
                    </tr>
                    	<td colspan="2">
                        	<div id="mensaje"></div>
                        </td>
						
                    </tr>
                </table>
            </div>
            
            <div class="modal-footer">
            	<input type="submit" value="Registrar" class="btn btn-success" id="reg" onclick="agregar_producto()/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
			<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		$("#formulario").validate({
			rules:{
				CLAVE:{
					required: true,
					remote: "ajax_verificar_usu_per.php"
				}
			},
			messages: {
				CLAVE: "El usuario existe"
			},
			onkeyup: false,
			submitHandler: function(form) {
				var respuesta = confirm('\xBFDesea realmente agregar a esta nueva persona?')
				if (respuesta)
					form.submit();
			}
		});
	});
	
	</script>
          </div>
        </div>
      </div>
      

</body>

</html>
