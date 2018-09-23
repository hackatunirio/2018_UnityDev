<script>
	$('#reacaoTimeEventoCurtir').click(function() {

		alert('teste');
 
	    var dados = $('#cadUsuario').serialize();

	    $.ajax({
	        type: 'POST',
	        dataType: 'json',
	        url: 'salvar.php',
	        async: true,
	        data: dados,
	        success: function(response) {
	            location.reload();
	        }
	    });

	    return false;
	});
</script>