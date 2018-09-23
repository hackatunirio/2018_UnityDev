function fonte(e)
{
	var elemento = $('.acessibilidade');
	var fonte = elemento.css('font-size');

	if(e == 'a')
		elemento.css('fontSize', parseInt(fonte) +1);
	
	else if( e == 'd')
		elemento.css('fontSize', parseInt(fonte) -1);
}

/*$(function()
{
	$('#nascimento').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy',
		dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabádi'],
		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
		dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab', 'Dom'],
		monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
	});
});*/

jQuery(document).ready(function($)
{
	$("#botaoAbrir").on("click", function()
	{
		$("body").toggleClass("menu-Aberto");

		$('#menu-mobile-mask').css('display', 'block');
		$('#menu-mobile').css('display', 'block');

	});

	$("#menu-mobile-mask, .btn-close").on("click", function()
	{
		$("body").removeClass("menu-Aberto");
		$('#menu-mobile-mask').css('display', 'none');
		$('#menu-mobile').css('display', 'none');
	});
})