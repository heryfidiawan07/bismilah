$(document).ready(function(){
    $(document).on('click', '.browse', function(){
      var file = $(this).parent().parent().parent().find('.file');
      file.trigger('click');
    });
    $(document).on('change', '.file', function(){
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
    $('#media').on('change', function(){
        if (typeof (FileReader) != "undifined") {
            var tmp = $('#tmp');
            tmp.empty();
            var reader = new FileReader();
            reader.onload = function(e){
                $("<img />", {
                    "src"  : e.target.result,
                    "width": "150"
                }).appendTo(tmp);
            }
            tmp.show();
            reader.readAsDataURL($(this)[0].files[0]);
        }
    });
});