function verificar_login(user, password){
	var dato = "user="+ user 
				+"&password=" + password;
	$.ajax({
		type : "POST",
		url: "ajax/verificar_login.php",
		data: dato,
		success: function(data){
			if (data==1) {
				alertify.success("INGRESO CORRECTO");
				setTimeout(function(){window.location.href = "index.php";},3000);
			}else{
				alertify.error("INGRESE CORRECTAMENTE SU USUARIO Y CONTRASEÑA");
			}
		}
	});
}
//Funcion para matricular directamente despues de ser ingresado un nuevo estudiante
function matricular(dni){
		window.open = "matricula_semestre?dni='"+dni+"'";
	}
//funcion para redireccionar a la administracion de carreras
function admi_carrera(dato){
	//window.open = "admi_carrera?carrera='"+dato+"'";
	alert("hola");
}
//funcion para cerrar sesion
function cerrar_sesion(){
	if (confirm("¿esta seguro que desea cerrar sesion?")) {
		alertify.success("cerró sesion");
		window.location = "cerrar_sesion.php";
	}
	else{
		alertify.error("canceló cerrar sesion");
	}
}
//para ingresar unidaddidactica a matricula
function ing_matricula(s_academico, idunidad, idestudiante){
	
	datos="s_academico=" + s_academico
		+ "&idunidad=" + idunidad
		+ "&idestudiante=" + idestudiante;  

	$.ajax({
		type:"POST",
		url:"ajax/agregar_matricula.php",
		data: datos,
		success:function(r){
			if (r==1) {
				alertify.success("INGRESO CORRECTO DE UNIDAD DIDACTICA");
			}else{
				alertify.error("YA EXISTE DICHA UNIDAD DIDACTICA O LA LLEVO ANTERIORMENTE");
			}
		}
	});
}
//Para ingresar todos los cursos de un semestre
function ing_mat_semestre(s_academico, idestudiante, esc_pro, semestre){
	datos = "s_academico="+ s_academico+
			"&idestudiante=" + idestudiante+
			"&esc_pro=" + esc_pro+
			"&semestre=" + semestre;
			//alert(datos);
	$.ajax({
		type : "POST",
		url: "ajax/agregar_semestre.php",
		data: datos,
		success:function(r){
			if(r!=0){
				alertify.success("INGRESO CORRECTO DE UNIDADES DIDACTICAS");
			}else{
				alertify.error("NO SE PUDO REALIZAR CORRECTAMENTE EL PROCESO");
			}
		}
	})
}

//para eliminar un registro de matricula
function eliminar_matricula(idmatricula){
	dato = "idmatricula=" + idmatricula;
	$.ajax({
		type : "POST",
		url : "ajax/eliminar_matricula.php",
		data : dato,
		success: function(r){
			if (r==1) {
				alertify.success("REGISTRO ELIMINADO CORRECTAMENTE");
			}
			else{
				alertify.error("NO SE PUDO BORRAR REGISTRO");
			}
		}

	});
	var s_academico = $('#p_academico').val();
			var idestudiante = $('#idestudiante').val();
			setTimeout(function(){
				$.post('ajax/tabla_matriculas.php', {s_academico: s_academico, idestudiante: idestudiante}).done(function(respuesta){
			$('#tabla_matricula').html(respuesta);
			});},500);
}

//AJAX para mostrar matriculas
function mostrar_matricula(s_academico, idunidad, idestudiante){
	datos="s_academico=" + s_academico
		+ "&idunidad=" + idunidad
		+ "&idestudiante=" + idestudiante; 
	$.ajax({
		type:"POST",
		url:"ajax/mostrar_matricula.php",
		data: datos,
		success:function(){
			$('#tabla_matricula').load('mostrar_matricula.php');
		}
	});
}

function actualizar_nota(id_mat){
		var nota = $('#nota').val();
		$.post('actualizar_nota.php',{id_mat: id_mat, nota: nota});
	}

function datos_estudiante(datos){
	var dato = datos.split("||");
	$('#idpersona').val(dato[0]);
	$('#nombre').val(dato[1]);
	$('#apellidop').val(dato[2]);
	$('#apellidom').val(dato[3]);
	$('#direccion').val(dato[4]);
	$('#email').val(dato[5]);
	$('#telefono').val(dato[6]);
	$('#sexo').val(dato[7]);
	$('#fechanacimiento').val(dato[8]);
	$('#discapacidad').val(dato[9]);
	$('#conadis').val(dato[10]);
	$('#carrera').val(dato[11]);
	$('#fechaingreso').val(dato[12]);
}


function datos_carrera(datos){
	var dato = datos.split("||");
	$('#up_id_carrera').val(dato[0]);
	$('#up_nom_carrera').val(dato[1]);
	$('#up_f_creacion').val(dato[2]);
	$('#up_res_auto').val(dato[3]);
	$('#up_fec_auto').val(dato[4]);
	$('#up_res_reva').val(dato[5]);
	$('#up_fec_reva').val(dato[6]);
}

function datos_modulos(datos){
	var dato = datos.split("||");
	$('#up_id_modulo').val(dato[0]);
	$('#up_nom_modulo').val(dato[1]);
	$('#up_horas_modulo').val(dato[2]);
}

function datos_estudiante_up(datos){
	var dato = datos.split("||");
		$('#idpersonaup').val(dato[0]);
		$('#nombreup').val(dato[1]);
		$('#apellidopup').val(dato[2]);
		$('#apellidomup').val(dato[3]);
		$('#direccionup').val(dato[4]);
		$('#emailup').val(dato[5]);
		$('#telefonoup').val(dato[6]);
		$('#sexoup').val(dato[7]);
		$('#fechanacimientoup').val(dato[8]);
		$('#discapacidadup').val(dato[9]);
		$('#conadisup').val(dato[10]);
}
function datos_curso(datos){
	var dato = datos.split("||");
	$('#up_id_u_didactica').val(dato[0]);
	$('#up_nom_u_didactica').val(dato[1]);
	$('#up_creditos_u_didactica').val(dato[2]);
	$('#up_horas_u_didactica').val(dato[3]);
	$('#up_sem_u_didactica').val(dato[4]);
}
function datos_capacidad(datos){
	var dato = datos.split("||");
	$('#up_id_capacidad').val(dato[0]);
	$('#up_nom_capacidad').val(dato[1]);
}

function cambiarDisponibilidad(dato){
	alertify.confirm("deseas cambiar su disponibilidad?",function(){
		{
					var valor = $('#chk_disponibilidad'+dato).val();
					if (valor==1?valor=0:valor=1); 
					//dato para ajax
					var datos = "idcarrera="+dato+"&disponibilidad="+valor;
					$.ajax({
						type: "POST",
						url: "ajax/actualizar_disponibilidad.php",
						data: datos,
						success:function(r){
						if(r==1){
							alertify.success("SE CAMBIO LA DISPONIBILIDAD");
							$('#tabla_carreras').load('ajax/carreras.php');
						}else{
							alertify.error("NO SE PUDO REALIZAR CORRECTAMENTE EL PROCESO");
						}
					}
					})
		}
	});
	
}
 function modulo_cursos(dato){
 	$.post('ajax/modulo_cursos.php', {idmodulo: dato}).done(function(respuesta){
			$('#tabla_u_didacticas').html(respuesta);})
 }
 function modulo_capacidades(dato){
 	$.post('ajax/modulo_capacidades.php', {idmodulo: dato}).done(function(respuesta){
 		$('#tabla_u_didacticas').html(respuesta);})
 }
function eliminar_curso(idcurso){
	alertify.confirm("Esta seguro de eliminar el curso",function(){
		dato = "idcurso="+idcurso;
	$.ajax({
		type: "POST",
		url: "ajax/eliminar_curso.php",
		data: dato,
		success: function(r){
			if (r==1) {
				alertify.success("REGISTRO ELIMINADO CORRECTAMENTE");
			}
			else{
				alertify.error("NO SE PUDO BORRAR REGISTRO");
			}
		}
	})
	var idmodulo = $('#idmodulo').val();
	setTimeout(function(){modulo_cursos(idmodulo)},500);
	})
}

function eliminar_capacidad(idcapacidad){
	alertify.confirm("Esta seguro de eliminar la capacidad",function(){
				dato = "idcapacidad="+idcapacidad;
			$.ajax({
				type: "POST",
				url: "ajax/eliminar_capacidad.php",
				data: dato,
				success: function(r){
					if (r==1) {
						alertify.success("REGISTRO ELIMINADO CORRECTAMENTE");
					}
					else{
						alertify.error("NO SE PUDO BORRAR REGISTRO");
					}
				}
			})
			var idmodulo = $('#idmodulo').val();
			setTimeout(function(){modulo_capacidades(idmodulo)},500);
	});
}

function matricula(dni){
         alert("registro?dni='"+dni+"'");

}
//function para hacer listas dependientes de escuela,modulo y unidades didacticas
