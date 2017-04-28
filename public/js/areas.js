$(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('.brands').on('click', function(){
        var brand = $(this).attr('data-id');
        var urll = $(this).attr('data-url');
        var fullUrl = urll+brand;
        //console.log(brand);
        $.ajax({
            type: 'POST',
            url : fullUrl,
            success : function(data){
                for (var i = 0; i < data.length; i++) {
                    for (var a = 1; a <= 10; a++) {
                        var area = $('.areas_'+a).val();
                        if (area == data[i].area_id) {
                            if (data[i].iklan == 1) {
                                $('.hasil_'+a).css('background-color','red');
                                $('.areas_'+a).css('display','none');
                            }
                        }
                    }
                }
            }
        });
    });
    $('.brands').on('change', function(){
        for (var a = 1; a <= 10; a++) {
            $('.hasil_'+a).css('background-color','unset');
            $('.areas_'+a).css('display','unset');
        }
    });

});