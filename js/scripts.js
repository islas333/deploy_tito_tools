// Scripts
$(function() {

	$( '#verificar-files' ).click(function() {
		var listfiles = $( '#lista-files' ).val();
		var pathProyecto = $( '#path-proyecto' ).val();
		var pathDeploy = $( '#path-deploy' ).val();
		var page = $( this ).attr("page");
		
		cargaAjaxSimple(page,listfiles,pathProyecto,pathDeploy);
	});


	$( '#verificar-files-depurar' ).click(function() {
		var listfiles = $( '#lista-files-depurar' ).val();
		var page = $( this ).attr("page-depurar");
		var pathProyecto = $( '#path-proyecto' ).val();

		depurarListaFiles(page,listfiles,pathProyecto);
	});


	function cargaAjaxSimple(page,listfiles,pathProyecto,pathDeploy) {
		var dataString = 'data='+listfiles+'&pathProyecto='+pathProyecto+'&pathDeploy='+pathDeploy;
		$.ajax({
			type:'POST',
			url: page,
			data: dataString,
			dataType: 'json',
			beforeSend: function() {
			},success: function(data) {
				// $("#msnArrayOriginal").empty();
				$("#msnArrayOriginal").addClass("uk-alert-primary");
				// $("#msnArrayOriginal").append('<a class="uk-alert-close" uk-close></a>');
				$("#msnArrayOriginal").html('<p>'+data.arrayOriginal+'</p>');
				$("#msnArrayUnico").addClass("uk-alert-primary");
				$("#msnArrayUnico").html('<p>'+data.arrayUnico+'</p>');
				$("#msnTest").addClass("uk-alert-primary");
				$("#msnTest").html('<p>'+data.test+'</p>');
			},error: function() {
				alert("Error en carga simple");
			}
		});
	}

	function depurarListaFiles(page,listfiles,pathProyecto) {
		
		var dataString = 'data='+listfiles+'&pathProyecto='+pathProyecto;
		$.ajax({
			type:'POST',
			url: page,
			data: dataString,
			dataType: 'json',
			beforeSend: function() {
			},success: function(data) {
				$("#msnNumFiles").empty();
				$("#msnNumFiles").html(data.numeroArchivos);
				$("#msnNumFilesUnique").html(data.numeroUnico);
				$("#verRepetidos").html(data.verRepetidos);
				$("#integridadFiles").html(data.integridadFiles);
				$("#integridadFilesNot").html(data.integridadFilesNot);
				$("#listaDeploy").html(data.listaDeploy);
			},error: function() {
				alert("Error en al depuracion de archivos");
			}
		});
	}

	function cargaAjaxSimpleJson(page,listfiles,pathProyecto,pathDeploy) {
		var dataString = 'data='+listfiles+'&pathProyecto='+pathProyecto+'&pathDeploy='+pathDeploy;
		$.ajax({
			type:'POST',
			url: url,
			data: datos,
			// data: ({ par1 : var1, par2 : var2 , par3 : var3 }),
			dataType: 'json',
			beforeSend: function() {
			},success: function(data) {
			},error: function() {
				alert("Error en carga simple return JSON");
			}
		});
	}

	function test(dato){
		return dato;
	}

});
