$(document).ready(function(){
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
	$('#cari').on('click', function(){
		var urll = $(this).attr('data-url');
        var brand = $('#brand').val();
		var area = $('#area').val();
		var fullUrl = urll+brand+'/'+area;
        //console.log(fullUrl);
        $.ajax({
            type: 'POST',
            url : fullUrl,
            data:  {area:'area',brand:'brand'},
            success : function(data){
                if (data.name == undefined || data.iklan == 0) {
                    //alert('kosong');
                    $('#table').addClass('table table-hover animated flipInX');
                    $("#img").attr('src','https://lh3.googleusercontent.com/-fA4GNmqpiLo/WQBwGMc_1nI/AAAAAAAAAkQ/p2pkw2WDaJUj4pJciG3_2AeC1LW3gFNswCHM/s200/%255BUNSET%255D');
                    $("#name").html('Places Available');
                    $("#pt").html('-');
                    $("#alamat").html('-');
                    $("#tentang").html('-');
                    $("#hp1").html('-');
                    $("#hp1").attr("href","#");
                    $("#hp2").html('-');
                    $("#hp2").attr("href","#");
                    $("#prof").attr("href","#");
                }
                if (data.iklan == 1) {
                    //console.log(data.name);
                    $('#table').addClass('table table-hover animated flipInX');
                    $("#aImg").attr("href","/marketing/"+data.slug);
                    $("#img").attr('src',"/marketingImg/"+data.img);
                    $("#name").html(data.name);
                    $("#pt").html(data.pt);
                    $("#alamat").html(data.alamat);
                    $("#tentang").html(data.tentang);
                    $("#hp1").html("0"+data.hp1);
                    $("#hp1").attr("href","tel://+62"+data.hp1);
                    $("#hp2").html("0"+data.hp2);
                    $("#hp2").attr("href","https://api.whatsapp.com/send?phone=62"+data.hp2+"&text="+data.name);
                    $("#prof").attr("href","/marketing/"+data.slug);
                }
            }
        });
	});
    $('#area').on('change', function(){
        $('#table').removeClass('animated flipInX');
    });
    $('#brand').on('change', function(){
        $('#table').removeClass('animated flipInX');
    });

});