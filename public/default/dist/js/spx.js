function removeImage(src,id){

    var r = confirm("Loại bỏ ảnh này?");
    if (r == true) {
        var old_list_image = $("#images").val();
        var replace_str = "|"+src+"|";
        //alert(replace_str);
        var new_list = old_list_image.replace(replace_str,'');
        $("#images").val(new_list);
        document.getElementById(id).remove();

    }
    // else {
    //    //txt = "You pressed Cancel!";
    //}

}

var apps = new Object();



$(document).ready(function (){
    $('.btn-spx-toggle-toolbar').click(function () {
        $('.toolbar-box').toggle(500);
        return false;
    });

    // login:
    $(".login-box-body input[name='user_email']").blur(function () {
        var val = $(this).val();
        console.log(val.indexOf('@'));
        if(val.indexOf('@') ==-1){
            var p1 = /^[A-Za-z0-9_]{3,30}$/;

            if(p1.test(val) ==false){
                $('.login-box-msg').html('<p class="alert alert-danger">Tên đăng nhập không hợp lệ, cần nhập từ 3-30 ký tự, không chứa ký tự đặc biệt.</p>');
                $(this).css('border','1px solid red');
                $(this).css('color','red');
            }else{
                $('.login-box-msg').html('');
                $(this).css('border','1px solid green');
                $(this).css('color','green');
            }
        }else{
            var p2 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (p2.test(val)) {
                $('.login-box-msg').html('');
                $(this).css('border','1px solid green');
                $(this).css('color','green');

            }
            else
            {
                $('.login-box-msg').html('<p class="alert alert-danger">Email không hợp lệ</p>');
                $(this).css('border','1px solid red');
                $(this).css('color','red');
            }
        }
    });
    $(".login-box-body input[name='passwd']").blur(function () {
        var val = $(this).val();
        if(val.length<6){
            $('.login-box-msg').html('<p class="alert alert-danger">Password cần nhập ít nhất 6 ký tự</p>');
            $(this).css('border','1px solid red');
            $(this).css('color','red');
        }else{
            $('.login-box-msg').html('');
            $(this).css('border','1px solid green');
            $(this).css('color','green');
        }


    });


    $('.brows-image-news').click(function(event) {
        event.preventDefault();
        window.open(window.location.protocol + "//" + window.location.host  + "/public/elfinder/image_news.html?mode=image", "popupWindow", "width=800,height=420,scrollbars=yes");
    });





    //----------- ready---------
});