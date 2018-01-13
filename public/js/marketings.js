$(document).ready(function(){
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
	$('#cari').on('click', function(){
		var urll = $(this).attr('data-url');
		var area = $('#area').val();
		var brand = $(this).attr('data-brand');
		var fullUrl = urll+area;
        $.ajax({
            type: 'POST',
            url : fullUrl,
            data:  {area:'area',brand:'brand'},
            success : function(data, statusTxt, xhr){
                //console.log(xhr.status);-> berhasil = 200, gagal = 404
                //console.log(xhr.statusText);-> berhasil = OK, gagal = Not Found
                //console.log(statusTxt);->berhasil = success, gagal = error
                $('#table').addClass('table table-hover animated flipInX');
                $("#aImg").attr("href","/marketing/"+data.sales.slug);
                $("#img").attr('src',"/marketingImg/"+data.sales.img);
                $("#name").html(data.sales.name);
                $("#pt").html(data.sales.pt);
                $("#alamat").html(data.sales.alamat);
                $("#tentang").html(data.sales.tentang);
                $("#hp1").html(" 0"+data.sales.hp1);
                $("#hp1").attr("href","tel://+62"+data.sales.hp1);
                $("#hp2").html(" 0"+data.sales.hp2);
                $("#prof").attr("href","/marketing/"+data.sales.slug);
                $("#hp2").attr("href",data.link.link);
            },error : function(data, statusTxt, xhr){
                $('#table').addClass('table table-hover animated flipInX');
                $("#img").attr('src','https://lh3.googleusercontent.com/-fA4GNmqpiLo/WQBwGMc_1nI/AAAAAAAAAkQ/p2pkw2WDaJUj4pJciG3_2AeC1LW3gFNswCHM/s200/%255BUNSET%255D');
                $("#name").html('Places Available');
                $("#pt").html('-');
                $("#alamat").html('-');
                $("#tentang").html('-');
                $("#hp1").html(' -');
                $("#hp1").attr("href","#");
                $("#hp2").html(' -');
                $("#hp2").attr("href","#");
                $("#prof").attr("href","#");
            }
        });
	});
    $('#area').on('change', function(){
        $('#table').removeClass('animated flipInX');
    });

});