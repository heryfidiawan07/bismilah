//js untuk spesifikasi
$(document).ready(function(){
	$('img').addClass('spekImg');
	$('.spekImg').parent().addClass('scrollImg');
	//untuk table
	$('#spekShow').children('table').addClass('table-striped');
	$('.table-striped').before("<div class='scrollTab' >");
	$('.table-striped').prependTo(".scrollTab");
	$('td').css('padding','10px');
});