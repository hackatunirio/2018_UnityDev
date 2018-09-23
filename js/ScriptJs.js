function ExporTime(){
	var numbernow= 2;
	var numberGo = 0;
	var nome = ["miguel", "Arthur", "Pedro", "Arthur"];
	if(numbernow > nome.length){
		numbernow = nome.length;
	}
	for (var i = numberGo; i < numbernow; i++) {
		$('.camp').append("<h1>"+nome[i]+"</h1>");
	}
	numberGo = numbernow;
}
$(document).ready(function(){
    $('.camp').bind('scroll', function() {
        if($(this).scrollTop() + $(this).innerHeight() >= this.scrollHeight) {
            numbernow = numbernow+2;
            ExporTime();
        }
    });
});