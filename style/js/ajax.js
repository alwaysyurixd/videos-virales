/*$(document).on('ready',function(){
	$('form').on('submit',function(e){
		e.preventDefault();
		var data = $('form').serialize();
	
		$.ajax({
			url:'../administracion/editarArticulo.php',
			type:'post',
			dataType:'json',
			data:data,
			beforeSend: function(){
				$('.fa').css('display','inline');
			},
			success: function(info){
				console.log(info);
			},
			error: function(jqXHR,estado,error){
				console.log(estado);
				console.log(error);
			},
			complete: function(jqXHR,estado){
				console.log(estado);
			}
		})
		.done(function(){
			$('span').html('Modicado!');
		})
		.fail(function(){
			$('span').html('Error!');
		})
		.always(function(){
			setTimeout(function(){
				$('.fa').hide();
			},1000);		
		});
	})
})