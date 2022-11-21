Vue.component('modal', {
    template: '#modal-template'
});
// tạo đối tượng
// gắn thuộc tính element cho Vue biết là sẽ chọn phần tử html nào làm gốc
var SpxApp = new Vue({

    el: '#appDaoTao',


    mounted: function () {
        $(document).ready(function () {
            // $('.sidebar-menu').tree();
            //
            // $('.sidebar-toggle').click(function (event) {
            //     event.preventDefault();
            //     console.log('toggle');
            //     if (Boolean(localStorage.getItem('sidebar-toggle-collapsed'))) {
            //         localStorage.setItem('sidebar-toggle-collapsed', '');
            //     } else {
            //         localStorage.setItem('sidebar-toggle-collapsed', '1');
            //     }
            // });



        });

    },
    data: {

        msg: 'Xin chao',
        appMenu: {modalMSG:'',showModal:false}

    },
    methods: {
        changeStatusMenu:function (event) {
            var _obj  =  event.currentTarget;
            // lấy phần tử được click

            // console.log( $(_obj).attr('data_id'));
            var _url = '/admin/menu/change-status/' + $(_obj).attr('data_id');
            // $(this).attr('href');

            $.post( _url,{confirm:1,_token: $('meta[name=csrf-token]').attr('content')})
                .done(function(data, status) {
                    if(status == 'success'){
                        switch (data.status){
                            case 'refresh':
                                location.reload();
                                break;
                            case 'success':
                                if(data.new_status ==1)
                                    $(_obj).html('<span class="alert-success" style="padding: 3px;"> ON </span>');
                                else
                                    $(_obj).html('<span class="alert-warning" style="padding: 3px;"> OFF </span>');
                                // console.log(SpxApp.appMenu);
                                SpxApp.appMenu.modalMSG = data.success.join('\n');
                                SpxApp.appMenu.showModal=true;

                                break;
                            case 'error':
                                SpxApp.appMenu.modalMSG = data.errors.join('\n');
                                SpxApp.appMenu.showModal=true;
                                break;
                            case 'warning':
                                SpxApp.appMenu.modalMSG = data.warnings.join('\n');
                                SpxApp.appMenu.showModal=true;
                                break;
                        }

                    }
                })
                .fail(function(err) {
                    console.log('Change status menu error:');
                    console.log(err);
                    // alert( "error" );
                })
                .always(function() {
                    // console.log ("finished" );

                });
        }
    }

});

