<script src="style/js/jquery-1.7.2.min.js"></script>
<script>
	$(document).ready(function() 
	{
		/* OBTENEMOS TABLA */
		$.ajax({
			type: "GET",
			url: "editinplace.php?tabla=1"
		})
		.done(function(json) {
			json = $.parseJSON(json)
			for(var i=0;i<json.length;i++)
			{
				$('.editinplace').append(
					"<tr><td class='id'>"+json[i].id+"</td><td class='editable' data-campo='nombre'><span>"+json[i].nombre+"</span></td><td class='editable' data-campo='apellidos'><span>"+json[i].apellidos+"</span></td><td class='editable' data-campo='email'><span>"+json[i].email+"</span></td><td class='editable' data-campo='telefono'><span>"+json[i].telefono+"</span></td></tr>");
			}
		});
		
		var td,campo,valor,id;
		$(document).on("click","td.editable span",function(e)
		{
			e.preventDefault();
			$("td:not(.id)").removeClass("editable");
			td=$(this).closest("td");
			campo=$(this).closest("td").data("campo");
			valor=$(this).text();
			id=$(this).closest("tr").find(".id").text();
			td.text("").html("<input type='text' name='"+campo+"' value='"+valor+"'><a class='enlace guardar' href='#'>Guardar</a><a class='enlace cancelar' href='#'>Cancelar</a>");
		});
		
		$(document).on("click",".cancelar",function(e)
		{
			e.preventDefault();
			td.html("<span>"+valor+"</span>");
			$("td:not(.id)").addClass("editable");
		});
		
		$(document).on("click",".guardar",function(e)
		{
			$(".mensaje").html("<img src='images/loading.gif'>");
			e.preventDefault();
			nuevovalor=$(this).closest("td").find("input").val();
			$.ajax({
				type: "POST",
				url: "editinplace.php",
				data: { campo: campo, valor: nuevovalor, id:id }
			})
			.done(function( msg ) {
				$(".mensaje").html(msg);
				td.html("<span>"+nuevovalor+"</span>");
				$("td:not(.id)").addClass("editable");
				setTimeout(function() {$('.ok,.ko').fadeOut('fast');}, 3000);
			});
		});
	});
</script>
<table class="editinplace">
	<tr>
		<th>Cod.</th>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>E-mail</th>
		<th>Tel&eacute;fono</th>
	</tr>
</table>
<?php  
$dbhost="localhost";
$dbname="tablaEditable";
$dbuser="root";
$dbpass="";
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if (isset($_POST) && count($_POST)>0)
{
	if ($db->connect_errno) 
	{
		die ("<span class='ko'>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</span>");
	}
	else
	{
		$query=$db->query("update editinplace set ".$_POST["campo"]."='".$_POST["valor"]."' where idusuario='".intval($_POST["id"])."' limit 1");
		if ($query) echo "<span class='ok'>Valores modificados correctamente.</span>";
		else echo "<span class='ko'>".$db->error."</span>";
	}
}

if (isset($_GET) && count($_GET)>0)
{
	if ($db->connect_errno) 
	{
		die ("<span class='ko'>Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error."</span>");
	}
	else
	{
		$query=$db->query("select * from editinplace order by idusuario asc");
		$datos=array();
		while ($usuarios=$query->fetch_array())
		{
			$datos[]=array(	"id"=>$usuarios["idusuario"],
							"nombre"=>$usuarios["nombre"],
							"apellidos"=>$usuarios["apellidos"],
							"email"=>$usuarios["email"],
							"telefono"=>$usuarios["telefono"]
			);
		}
		echo json_encode($datos);
	}
}
?>