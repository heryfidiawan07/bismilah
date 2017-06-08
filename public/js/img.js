$(document).ready(function(){
	$('img').addClass('spekImg');
	$('.spekImg').parent().addClass('scrollImg');
	//untuk table
	$('#spekShow').children('table').addClass('table table-conseded');
	$('.table-conseded').before("<div class='scrollTab' >");
	$('.table-conseded').prependTo(".scrollTab");
});