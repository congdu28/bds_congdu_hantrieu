function __preload(elm) {
    $(elm).before('<img id="loading" style="position: absolute; z-index: 100000;" src="/public/img/loading.gif"/>');
}
function __preloadThis(elm) {
    $(elm).html('<img id="loading"  src="/public/img/loading.gif"/>');
}
function __endload() {
    $('#loading').remove();
}
function makeParamsByOrder(_col) {
    var pr_link = sapp.pr;
    pr_link.ord = _col;
    if(sapp.pr.ord  ==_col){
        // cột hiện tại đã sắp xếp
        if(sapp.pr.ordval == 'asc')
            pr_link.ordval = 'desc';
        else
            pr_link.ordval = 'asc';
    }else
        pr_link.ordval = 'asc';
    return pr_link;
}

/**
 *
 * @param msg   content msg
 * @param elm  element to append msg
 * @param type = danger , warning, info, success
 * @private
 */
function __alert(msg,elm,type ) {
    var _msg = '';
    if(Array.isArray(msg))
        for(i = 0; i<msg.length; i++)
            _msg += msg[i] + '<br>';
    else
        _msg = msg;

    var dlg = '<div class="alert alert-'+type+' alert-dismissible">\n' +
        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + _msg +'</div>';
    $(elm).append(dlg);
}
function __emptyAlert(elm) {
    $(elm).html('');
}

// function loadH(current_hk_tinh) {
//
//     // console.log("curent t =  " +);
//     // console.log("curent huyen =  " +currencurrent_dia_chi_kd_tt_dia_chi_kd_h);
//
//     $.get( '/apps/list-h/' + current_hk_tinh)
//         .done(function( data ) {
//
//             // console.log(data);
//
//             var opt = '<option value=""> == Chọn huyện == </option>';
//             $.each(data,function (index, item) {
//                 // console.log(item);
//
//                 opt += '<option value="' + item.id + '" ';
//                 if(item.id == current_hk_huyen)
//                     opt  += ' selected ';
//
//                 opt +=  '>' + item.cap +' '+ item.ten_huyen + '</option>';
//
//             });
//
//             $('#hk_huyen').html(opt);
//
//         });
// }
function loadH(current_hk_tinh,hk_huyen = null) {

    // console.log("curent t =  " +);
    // console.log("curent huyen =  " +currencurrent_dia_chi_kd_tt_dia_chi_kd_h);
    let current_val_hkhuyen = 0;
    if(typeof current_hk_huyen == 'undefined')
        current_val_hkhuyen = hk_huyen!=null?hk_huyen:0;
    else
        current_val_hkhuyen = current_hk_huyen;
    $.get( '/apps/list-h/' + current_hk_tinh)
        .done(function( data ) {

            // console.log(data);

            var opt = '<option value=""> == Chọn huyện == </option>';
            $.each(data,function (index, item) {
                // console.log(item);
                opt += '<option value="' + item.id + '" ';
                if(item.id == current_val_hkhuyen)
                    opt  += ' selected ';

                opt +=  '>' + item.cap +' '+ item.ten_huyen + '</option>';

            });

            $('#hk_huyen').html(opt);

        });
}
function formatItemTruongTHPT (item) {
    if (item.loading) {
        return item.text;
    }
    // console.log(item);
    var markup = "<div class='clearfix'>" +  item.id + ". " + item.name + "</div>";
    return markup;
}

function formatItemSelectionTruongTHPT (item) {
    return item.name || item.id;
}
$(function () {
    $('.btnViewMore').click(function () {
        let stt = $(this).attr("data-stt");
        if(stt=='all')
            viewMoreAll(stt);
        else
            viewMore(stt);
    });
});
let  viewMoreAll = (stt) => {
    let moreText = document.getElementById("view-more-"+stt);
    let btnText = document.getElementById("myBtn-"+stt);
    // console.log(moreText);return;
    if (moreText.style.display !== "none") {
        btnText.innerHTML = '<i class="fa fa-angle-down config-icon"></i>';
        moreText.style.display = "none";
    } else {
        btnText.innerHTML = '<i class="fa fa-angle-up config-icon"></i>';
        moreText.style.display = "inline";
    }
};
let  viewMore = (stt) => {
    let dots = document.getElementById("dots-"+stt);
    let moreText = document.getElementById("view-more-"+stt);
    let btnText = document.getElementById("myBtn-"+stt);
    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = '<i class="fa fa-angle-down"></i> Xem thêm';
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = '<i class="fa fa-angle-up"></i> Thu gọn';
        moreText.style.display = "inline";
    }
};
//=================
$(document).ready(function () {

    if($('#appHomeQLDT').length>0){
        console.log('defined appHomeQLDT');
        var appHomeQLDT = new Object();

        appHomeQLDT.run = function (){
            appHomeQLDT.loadListLopToday();
        };

        appHomeQLDT.loadListLopToday = function () {
            __preloadThis('#list-lop-today');
            var _d = '';
            $.get('/apps/lop/ajax-lich-hoc-get-by-day/' + _d )
                .done(function (data, status) {
                    if (status == 'success') {
                        if(data.status ==1){

                            //
                            var _html_tb = '<table class="table table-bordered">\n' +
                                '                    <tr>\n' +
                                '                        <th class="text-center">\n' +
                                '                            Mã Lớp\n' +
                                '                        </th>\n' +
                                '                        <th class="text-center">\n' +
                                '                            Ca học\n' +
                                '                        </th>\n' +
                                '                        <th>Môn học</th>\n' +
                                '<th>Số giờ còn lại</th>\n'+
                                '                        <th>Giảng viên</th>\n' +
                                '                        <th>Phòng học</th>\n' +
                                '                    </tr>';

                            $.each(data.info,function (index,item) {
                                var _tong = parseInt(item.tong_so_gio_hoc) + parseInt(item.so_gio_them);
                                _html_tb += '<tr><td>'+item.ma_lop+'</td>';
                                _html_tb += '<td>'+item.ca_hoc+'</td>';
                                _html_tb += '<td>'+item.ten_mh+'</td>';
                                _html_tb += '<td>' + item.so_gio_con_lai + '/' + _tong + '</td>' ;
                                _html_tb += '<td>'+item.ho_ten+'</td>';
                                _html_tb += '<td>'+item.ten_phong + ' ('+ item.loai_phong +')</td>';



                                _html_tb += '</tr>';
                            });
                            _html_tb += '</table>';
                            $('#list-lop-today').html(_html_tb);
                        }else{
                            $('#list-lop-today').html("<span class='text-damger'>" + data.errors + '</span>');
                            // alert(data.errors);
                        }
                    }

                })
                .fail(function (err) {
                    console.log(err);
                    alert("error");
                });
        };

        appHomeQLDT.run();
    }

   if(typeof appMenu != 'undefined'){
       appMenu = new Object();
       appMenu.run = function () {
           this.elm_msg = $('#msg-box');
           $('.apMenu-chk-status').click(function () {
               if(confirm('Đồng ý thay đổi trạng thái?') != true) return false;
               appMenu.changeStatus(this);
               return false;
           });
       };
       appMenu.changeStatus = function (obj) {
           var _url = $(obj).attr('href');
           $.post( _url,{confirm:1,_token: $('#_token').attr('content')})
               .done(function(data, status) {
                   if(status == 'success'){
                       switch (data.status){
                           case 'refresh':
                               location.reload();
                               break;
                           case 'success':
                               if(data.new_status ==1)
                                   $(obj).html('<span class="alert-success" style="padding: 3px;"> ON </span>');
                               else
                                   $(obj).html('<span class="alert-warning" style="padding: 3px;"> OFF </span>');
                               __alert(data.success,appMenu.elm_msg,'success');
                               break;
                           case 'error':
                               __alert(data.errors,appMenu.elm_msg,'errors');
                               break;
                           case 'warning':
                               __alert(data.warnings,appMenu.elm_msg,'warnings');
                               break;
                       }
 
// @param msg   content msg
//                 * @param elm  element to append msg
//                 * @param type = danger , warning, info, success


                   }
                   // console.log(status);
                   // console.log(data);

                   // alert( "second success" );
               })
               .fail(function(err) {
                   console.log(err);
                   // alert( "error" );
               })
               .always(function() {
                   console.log ("finished" );

               });

       };
       appMenu.run();
   }

   if(typeof appKhoaHoc  != 'undefined'){
       appKhoaHoc = new Object();
       appKhoaHoc.run = function () {
           this.elm_msg = $('#msg-box');
           $('.apKhoaHoc-chk-status').click(function () {
               if(confirm('Đồng ý thay đổi trạng thái?') != true) return false;
               appKhoaHoc.changeStatus(this);
               return false;
           });

           if($('#list-mh-in-kh').length>0){

               $.get( '/apps/khoa-hoc/ajax-list-mh-' + $('#list-mh-in-kh').attr('id-kh') )
                   .done(function( data ) {

                       var _str = '';
                       $.each(data.list,function (index,item) {
                           // console.log(index);
                           if(_str ==''){
                               _str += '<table class="table table-bordered">';
                               _str  += '<tr><th  class="text-center">ID</th><th  class="text-center" style="line-height: 0.5">Mã</th><th style="line-height: 0.5">Tên MH</th><th style="line-height: 0.5">HK</th><th style="line-height: 0.5">TL</th><th style="line-height: 0.5">Thi</th></tr>';
                           }

                           _str  += '<tr><td class="text-center">'+item.id_mh+'</td><td style="line-height:1"  class="text-center">' +item.ma_mh +'</td><td style="line-height: 1">'+  item.ten_mh + '</td><td style="line-height: 1">' +item.hoc_ky + '</td><td style="line-height: 1" title="Thời lượng">' + item.thoi_luong +'h </td><td style="line-height: 1" title="Thời lượng">' + item.thoi_luong_thi +'h </td></tr>';
                       });
                       if(_str !='')
                           _str += '</table>';

                       $('#list-mh-in-kh').html(_str);

                   })
                   .fail(function() {
                       console.log('Error load list MH');
                   })
                   .always(function() {

                   });


           }

           $('.apKhoaHoc-list-mh').click(function () {
               // console.log('abc');
                var _id = $(this).attr('data-id');
                // console.log(_id);
                if($('#list-mh-'+_id).html() ==''){
                    // load data

                    __emptyAlert($('#msg-box'));
                    __preload($('#list-mh-'+_id));

                    $.get( '/apps/khoa-hoc/ajax-list-mh-' + _id )
                        .done(function( data ) {
                            // console.log(data);
                            if(data.errors.length > 0 )
                                __alert(data.errors,$('#msg-box'),'danger' );
                            if(data.warnings.length > 0 )
                                __alert(data.warnings,$('#msg-box'),'warning' );

                            var _str = '';
                            $.each(data.list,function (index,item) {
                                // console.log(index);
                                if(_str ==''){
                                    _str += '<table class="table table-bordered">';
                                    _str  += '<tr><th style="line-height: 0.5">Mã</th><th style="line-height: 0.5">Tên MH</th><th style="line-height: 0.5">HK</th><th style="line-height: 0.5">TL</th><th style="line-height: 0.5">Thi</th></tr>';
                                }



                                 _str  += '<tr><td style="line-height:1">' +item.ma_mh +'</td><td style="line-height: 1">'+  item.ten_mh + '</td><td style="line-height: 1">' +item.hoc_ky + '</td><td style="line-height: 1" title="Thời lượng">' + item.thoi_luong +'h </td><td style="line-height: 1" title="Thời lượng">' + item.thoi_luong_thi +'h </td></tr>';
                            });
                            if(_str !='')
                                _str += '</table>';
                            $('#list-mh-'+_id).html(_str);

                        })
                        .fail(function() {
                            console.log('Error load list MH');
                        })
                        .always(function() {
                            __endload();
                        });

                }
                $('#list-mh-'+_id).toggle();
           });

       };



       appKhoaHoc.changeStatus = function (obj) {
           var _url = $(obj).attr('href');
           $.post( _url,{confirm:1,_token: $('#_token').attr('content')})
               .done(function(data, status) {
                   if(status == 'success'){
                       switch (data.status){
                           case 'refresh':
                               location.reload();
                               break;
                           case 'success':
                               if(data.new_status ==1)
                                   $(obj).html('<span class="alert-success" style="padding: 3px;"> ON </span>');
                               else
                                   $(obj).html('<span class="alert-warning" style="padding: 3px;"> OFF </span>');
                               __alert(data.success,appKhoaHoc.elm_msg,'success');
                               break;
                           case 'error':
                               __alert(data.errors,appKhoaHoc.elm_msg,'errors');
                               break;
                           case 'warning':
                               __alert(data.warnings,appKhoaHoc.elm_msg,'warnings');
                               break;
                       }


// @param msg   content msg
//                 * @param elm  element to append msg
//                 * @param type = danger , warning, info, success


                   }
                   // console.log(status);
                   // console.log(data);

                   // alert( "second success" );
               })
               .fail(function(err) {
                   console.log(err);
                   // alert( "error" );
               })
               .always(function() {
                   console.log ("finished" );

               });

       };
       appKhoaHoc.run();
   }


   if(typeof appHocVien != 'undefined'){
       appHocVien = new Object();
       appHocVien.trangThaiChamSoc = [];
       appHocVien.cs_mahv = '';
       appHocVien.listLopRunning = [];
       appHocVien.xepLopHV = '';
       appHocVien.xepLopID = '';
       appHocVien.xepLopPhu = '';
       appHocVien.xepLopMH = '';
       appHocVien.tt_ht_mahv = '';
       appHocVien.listCTDT = [];
       appHocVien.listLop = [];
       appHocVien.getListLichSu = function(mahv){
           return new Promise((resolve, reject) => {
               $.get('/apps/hoc-vien/ajax-get-lich-su-cham-soc/'+mahv)
                   .done(function (data) {
                       resolve(data);
                   })
                   .fail(function (err) {
                       reject(err);
                   })
           }, mahv);
       }
       appHocVien.run = function () {
            console.log('app hoc vien');
        if($('.ls-cham-soc').length>0){
            $('.ls-cham-soc').click(function () {
                let mahv = $(this).attr('data-id');
                let name = $(this).attr('data-name');
                appHocVien.getListLichSu(mahv).then(data=>{
                    let html = `
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>STT</th>
                                <th>Lớp</th>
                                <th style="max-width: 300px;">Nội dung</th>
                                <th>Trạng thái</th>
                                <th>Ngày</th>
                                <th>Tư vấn</th>
                            </tr>
                        </tbody>
                    `;
                    if(data.length>0){
                        $.each(data, function(index, item){
                           html += `
                           <tr>
                                <td>${(index+1)}</td>
                                 <td>${item.ma_lop}</td>
                                <td style="max-width: 300px;">${item.noi_dung}</td>
                                <td>${item.ten_trang_thai}</td>
                                <td>${item.c_time}</td>
                                <td>${item.fullname}</td>
                            </tr>
                           `;
                        });
                    }
                    html += '</tbody></table>';
                    $("#app-modal-dialog .modal-dialog").addClass("modal-lg");
                    $('#app-modal-dialog-title').html('Lịch sử chăm sóc: '+name);
                    $('#app-modal-dialog-body').html(html);
                    $('#app-modal-dialog').modal('show');
                })
            });

        }
            // sync
           if($('.btn-sync-field').length>0){
               $('.btn-sync-field').click(function (){
                   var _mhv = $(this).attr('ma-hv');
                   var field_src = $(this).attr('field_src');
                   var field_target = $(this).attr('field_target');
                   var id_ts = $(this).attr('id_ts');

                   $.post( '/apps/hoc-vien/sync-fields-ts/'+_mhv,
                       {
                           _token: $('#_token').attr('content'),
                           field_src:field_src,
                           field_target:field_target,
                           id_ts:id_ts
                   })
                       .done(function(data, status) {
                           if(status == 'success'){

                               if(data.status !=1){
                                   alert( data.errors.join('\n'));
                               }else{

                                   location.reload(true);
                               }
                           }
                       })
                       .fail(function(err) {
                           console.log(err);
                           alert(err.responseJSON['message']);

                       })
                       .always(function() {
                           // console.log ("finished" );
                       });


               });
           }

            if($('#slx_update_trangthai_hoctap').length>0){
               appHocVien.UpdateTrangThaiChinh();
            }



           // lấy danh sách chương trình đào tạo
           $.get('/apps/ajax-list-ctdt')
               .done(function (data, status) {
                   if (status == 'success') {
                       appHocVien.listCTDT = data.list;
                   }
                   // console.log(status);


                   // alert( "second success" );
               })
               .fail(function (err) {
                   console.log(err);
                   // alert("error");
               });

           // Lấy danh sách lớp đang hoạt động
           $.get('/apps/lop/ajax-list-running', {_token: $('#_token').attr('content')})
               .done(function (data, status) {
                   if (status == 'success') {
                       if(typeof (data.errors) !='undefined')
                           alert(data.errors.join('\n'));
                       appHocVien.listLopRunning = data.data;
                   }
                   // console.log(status);
                   // console.log(data);

                   // alert( "second success" );
               })
               .fail(function (err) {
                   console.log(err);
                   // alert("error");
               });



           if (typeof current_hk_tinh !== 'undefined') {
               loadH(current_hk_tinh);
               $('#hk_tinh').on("select2:select", function (e) {
                   current_hk_tinh = $('#hk_tinh').val();
                   loadH(current_hk_tinh);
               });
           }
           if ($('#truong_thpt').length > 0)
               $("#truong_thpt").select2({

                   ajax: {
                       url: "/apps/truong-thpt/search-ajax.html",
                       dataType: 'json',
                       delay: 250,
                       data: function (params) {
                           console.log('search thpt...');
                           return {
                               search_name: params.term, // search term
                               page: params.page
                           };
                       },
                       processResults: function (data, params) {
                           params.page = params.page || 1;
                           return {
                               results: data.items,
                               pagination: {
                                   more: (params.page * data.item_per_page) < data.total_count
                               }
                           };
                       },
                       cache: true
                   },
                   // placeholder: 'Search for a repository',
                   escapeMarkup: function (markup) {
                       return markup;
                   }, // let our custom formatter work
                   minimumInputLength: 1,
                   templateResult: formatItemTruongTHPT,
                   templateSelection: formatItemSelectionTruongTHPT
               });

           if ($('.show-list-lop').length > 0) {
               $('.show-list-lop').click(function () {
                   var _url = '/apps/lop/ajax-list-by-hv-' + $(this).attr('data-id');
                   var _strHtml = '<table class="table table-bordered"><tr><th>Mã lớp</th><th>Ngày bắt đầu tham gia</th><th>Trạng thái</th></tr>';

                   $.get(_url, {_token: $('#_token').attr('content')})
                       .done(function (data, status) {
                           if (status == 'success') {
                               $.each(data, function (index, item) {
                                   // console.log(index);
                                   _strHtml += '<tr>';
                                   // ma_hv: "D180002", ngay_vao_lop:  trang_thai_hoc_tap: 2, lich_su_trang_thai: null}

                                   _strHtml += '<td>' + item.ma_lop + '</td><td>' + item.ngay_bat_dau + '</td>' + '</td><td>' + item.trang_thai + '</td>';
                                   _strHtml += '<tr>';
                               });
                               $('#app-modal-dialog-title').html('Danh sách lớp đã tham gia');
                               $('#app-modal-dialog-body').html(_strHtml);
                               $('#app-modal-dialog').modal('show');

                           }
                           // console.log(status);
                           // console.log(data);

                           // alert( "second success" );
                       })
                       .fail(function (err) {
                           console.log(err);
                           alert("error");
                       })
                       .always(function () {
                           console.log("finished");

                       });
               });
           }

           $("#app-modal-dialog").on("hide.bs.modal", function () {
               $('#app-modal-dialog-body').html('');
               $('#app-modal-dialog-title').html('');
           });

           if ($('.cham-soc-hv').length > 0) {
               // load list trang thai cham soc


               $.get('/apps/hoc-vien/ajax-list-ttcs')
                   .done(function (data, status) {
                       if (status == 'success') {
                           appHocVien.trangThaiChamSoc = data;
                           // console.log(data);
                       }
                   })
                   .fail(function (err) {
                       console.log(err);
                       alert("error");
                   })
                   .always(function () {
                       // console.log ("finished" );
                   });

               this.chamSocHocVien();
           }




           if ($('.modal-show-more-cs').length > 0)
           {
               $('.modal-show-more-cs').click(function () {
                   var _id_content = $(this).attr('data-content');

                   $('#app-modal-dialog-title').html('Chi tiết nội dung...');
                    $('#app-modal-dialog-body').html($('#'+ _id_content).val());
                   // $('#app-modal-dialog').modal({
                   //     backdrop: 'static',
                   //     keyboard: true  // to prevent closing with Esc button (if you want this too)
                   // })
                   $('#app-modal-dialog').modal('show');
               });
           }

           if($('#hv_chk_all').length>0){

               var $table = $('.table');
               var $tdCheckbox = $table.find('td input:checkbox');
               var $tdCheckboxChecked = [];
                // xử lý check
               $('#hv_chk_all').on('click',function () {
                   $tdCheckbox.prop('checked', this.checked);

               });
               $tdCheckbox.on('change', function(){
                   $tdCheckboxChecked = $table.find('tbody input:checkbox:checked');
                   $('#hv_chk_all').prop('checked', ($tdCheckboxChecked.length == $tdCheckbox.length));
                   // console.log($tdCheckboxChecked);
               });


               // xử lý nhập lớp
               // #btn-add-class-hv
                $('#btn-add-class-hv').on('click', function () {
                    // lấy ds các checkbox được check
                    appHocVien.xepLopHV = ''; // xóa danh sách iD hoc vien
                    var tdCheckboxChecked = $table.find('tbody input:checkbox:checked');
                    if(tdCheckboxChecked.length<1)
                    {
                        alert('Chưa chọn Học viên');
                        return false;
                    }



                    // console.log(tdCheckboxChecked);
                    // hiển thị dialog chọn lớp


                    var _strHtml = '<div id="xl_msg" style="margin-bottom: 10px"></div>';
                    _strHtml += '<div>Các học viên: ';
                    $.each(tdCheckboxChecked, function (index, item) {
                        // console.log(index);
                        var _val = $(item).val();
                        if(_val.length>3)
                        {
                            appHocVien.xepLopHV += _val + ', ';
                            _strHtml += _val + ', ';
                        }
                    });
                    _strHtml += '</div>';
                    // _strHtml += 'Hệ đào tạo: <select id="hdt" style="margin-bottom: 10px">';
                    // _strHtml += '<option value="1">Dài hạn</option><option value="2">Ngắn hạn</option></select>';


                    _strHtml += '<br><table><tr><td>Chọn Chương trình học: </td><td><select id="ctdt" style="margin-bottom: 10px; width:400px" class="form-control select2"><option value="">Chọn Chương trình học</option>';

                    console.log(appHocVien.listCTDT);
                    if(appHocVien.listCTDT.length>0)
                        $.each(appHocVien.listCTDT, function (index, item) {
                            _strHtml += '<option value="' + item.id + '">' + item.ten_chuong_trinh + '</option>';
                        });
                    _strHtml +='</select></td></tr>';

                    _strHtml += '<tr><td>Chọn Lớp: </td><td><select id="lop" style="margin-bottom: 10px; width:400px" class="form-control select2"><option value="">Chọn lớp</option>';

                    if(appHocVien.listLopRunning.length>0)
                    $.each(appHocVien.listLopRunning, function (index, item) {
                        _strHtml += '<option value="' + item.id + '">' + item.ma_lop + '</option>';

                    });
                    _strHtml +='</select><br><input type="checkbox" id="chk_lop_phu"> Là lớp phụ</td></tr>';
                    // _strHtml +='<tr><td>Ngày bắt đầu học</td><td><input type="text" id="date_start" value=""></td></tr>';
                    _strHtml +='</table>';
                    _strHtml +='<br>Chọn môn học:<br><div id="box-list-mh" style="max-height: 300px; overflow: auto"></div>';



                    _strHtml +='<br>Ghi chú: Cần kiểm tra kỹ thông tin trước khi lưu. Sau khi lưu sẽ không được sửa.<br><input type="button" id="btn-xep-lop" class="btn btn-primary pull-right" value="Xếp lớp"><div class="clearfix"></div> ';


                    $('#app-modal-dialog-title').html('<b><i class="fa  fa-users"></i> Xếp Lớp cho Học viên</b>');
                    $('#app-modal-dialog-body').html(_strHtml);
                    $('#app-modal-dialog').modal('show');
                    $('.select2').select2();
                    // console.log(appHocVien.listLopRunning);
                    $('#app-modal-dialog').on('change','#lop',function () {
                        var _id_lop_slected = $(this).val();
                        if(_id_lop_slected.length <1) {
                            appHocVien.xepLopID ='';
                            return;
                        }
                        appHocVien.xepLopID = _id_lop_slected;
                        appHocVien.xepLopMH = '';

                        // get list MH
                        $.get('/apps/mon-hoc/ajax-list-by-lop-'+_id_lop_slected, {_token: $('#_token').attr('content')})
                            .done(function (data, status) {
                                if (status == 'success') {

                                    if(data.status ==0){
                                        $('#box-list-mh').html('<ul style="list-style:none; color:red;"><li>' + data.errors.join(',')+'</li></ul>');
                                    }else{
                                        var _sub_str = '<ul style="list-style:none">';
                                        var _pr = $('#chk_lop_phu').is(':checked');

                                        $.each(data.listMH, function (index, item) {
                                            var _chk = (_pr==false)?' checked ':'';
                                            _sub_str += '<li><input class="chk-select-mh-xl" type="checkbox"  value="' + item.id +'__' + item.thoi_luong +'__' + item.id_kh + '" '+ _chk +'"> ' + item.ma_mh +'. '+ item.ten_mh + '</li>';

                                        });
                                        _sub_str += '</ul>';
                                        $('#box-list-mh').html(_sub_str);
                                    }
                                }
                                // console.log(status);
                                // console.log(data);

                                // alert( "second success" );
                            })
                            .fail(function (err) {
                                console.log(err);
                                alert("error");
                            });


                    });


                    $('#app-modal-dialog').off('click.confirm').on('click.confirm','#btn-xep-lop',function () {
                        console.log('xep lop');

                        // appHocVien.xepLopHV = '';
                        // appHocVien.xepLopID = '';
                        appHocVien.xepLopPhu = $('#chk_lop_phu').is(':checked')?1:0;
                        appHocVien.xepLopMH = [];

                        var list_chk_mh = $('#box-list-mh').find('input:checkbox:checked');
                        // console.log(list_chk_mh);
                        $.each(list_chk_mh, function (index, item) {

                            appHocVien.xepLopMH += $(item).val() +',';
                        });

                        var _ctdt =$('#ctdt').val();

                        // var _date_start = $('#date_start').val();
                        // if(_date_start.length<3){
                        //     alert('Cần nhập Ngày bắt đầu học');
                        //     return false;
                        // }

                        $.post( '/apps/xep-lop',{_token: $('#_token').attr('content'),
                            xepLopHV : appHocVien.xepLopHV,
                            xepLopID : appHocVien.xepLopID,
                            xepLopPhu : appHocVien.xepLopPhu,
                            xepLopMH : appHocVien.xepLopMH,
                            _ctdt:_ctdt
                            // , _date_start:_date_start
                        })
                            .done(function(data, status) {
                                if(status == 'success'){
                                    console.log(data);

                                    appHocVien.xepLopID = '';
                                    appHocVien.xepLopPhu = '';
                                    appHocVien.xepLopMH = '';

                                    if(data.status ==0){
                                        $('#xl_msg').html('<p style="color: red;">'+ data.msg +'</p>');
                                    }
                                    else
                                        if(data.status ==1){

                                        $('#app-modal-dialog-body').html('<p style="color: blue;">'+ data.msg +'</p>');
                                        // setTimeout( function(){
                                        //     location.reload(true)
                                        // },1000);
                                    }else

                                        {
                                            console.log('Error load data... post: /apps/xep-lop ');
                                            console.log(data);
                                            // alert('Error ???');
                                        }

                                }

                            })
                            .fail(function(err) {
                                console.log(err);
                                // alert( "error" );
                                $('#xl_msg').html('<p style="color: red;">'+ err.responseJSON['message'] +'</p>');
                            })
                            .always(function() {
                                // console.log ("finished" );
                            });


                    });

                });

           }

           // if(typeof  pageFullInfo != undefined){
           //
           //     appHocVien.showFullInfo();
           // }
          /*
           Phần nhập điểm
            */
           // console.log('test'+_id_lop_request);
           if (typeof _id_lop_request != 'undefined') {
               if (_id_lop_request != ''){
                   getListMon(_id_lop_request, _id_mh_request);
                getListHocVienV1(_id_lop_request, _id_mh_request);
               }
           }
           if ($('#_id_lop_request_ds_diem').length>0) {
                
                   getListMon($('#_id_lop_request_ds_diem').val(), $('#_id_mh_request_ds_diem').val());
               
           }
           $('#Lop').on("select2:select", function(e) {
               var lop =  $('#Lop').val();
               getListMon(lop,'');
           });
           ///function get ds mon
           function getListMon(id_lop,id_mh) {
               $.get( '/apps/mon-hoc/ajax-list-by-lop-' + id_lop)
                   .done(function( data ) {
                       // console.log(data);
                       var _selected='';
                       var opt = '<option value=""> Chọn Môn học </option>';
                       $.each(data.listMH,function (index, item) {
                           // console.log(item);
                            _selected = item.id == id_mh?'selected':'';
                            // console.log(_selected+'=>');
                           opt += '<option '+_selected+' value="' + item.id + '" ';

                           // if(item.id == current_hk_huyen)
                           //     opt  += ' selected ';

                           opt +=  '>'+item.id +'.'+ item.ma_mh + '. '  + item.ten_mh + '</option>';
                       });

                       $('#mh').html(opt);

                   });
           }

           // $('#dn').prop('disabled', true);
           $('#lan').prop('disabled', true);
           $('#mh').change(function(e) {
               // console.log($(this).val());
               if($(this).val()>0)
                   $('#lan').prop('disabled', false);
               else
           $('#lan').prop('disabled', true);
           });

           // $('#dn').change(function(e) {
           //     console.log($(this).val());
           //     if(parseInt($(this).val())===2)
           //         $('#lan').prop('disabled', false);
           //     else
           //         $('#lan').prop('disabled', true);
           // });
           if (typeof _id_mh_request !== 'undefined') {
               if (_id_mh_request !== '')
                   $('#lan').prop('disabled', false);
           }
           // if (typeof _diem_nhap !== 'undefined') {
           //     if (_diem_nhap == 2)
           //         $('#lan').prop('disabled', false);
           // }
           $('#btnLayDanhSach').click(function () {
               var lop = $('#Lop').val();
               var mon = $('#mh').val();
               // var loai_diem = $('#Lop').val();
               var lan = $('#lan').val();
               if(lop==''||mon==''||lan==''){
                   alert('Vui lòng chọn đủ thông tin trước khi lấy danh sách nhập điểm');
                   return;
               }
               console.log(lop+'=>'+mon);
               getListHocVienV1(lop,mon);

           });
           function getListHocVienV1(lop,mon) {
               $.get( '/apps/hoc-vien/ajax-list-nhap-diem-v2/' + lop+'?mon='+mon)
                   .done(function(data, status) {
                       if(status == 'success'){
                           if(data.status !=1 ){
                               // co loi
                               console.log(data.errors);
                               var _msg_err = [];
                               $.each(data.errors,function (index,item) {
                                   _msg_err += '<br>' + item;
                               });
                               $('#dshv tbody').remove();
                               $('#cs_msg').html('<span class="alert alert-danger">'+_msg_err+'</span>');
                               $('#btn-save-lh').hide();
                                
                           }
                           else{
                               $('#cs_msg span').remove();
                               var i=0;
                               var div = '<tbody><tr><th style="width: 10px">STT</th><th>Mã Học Viên</th><th>Họ tên</th><th>Nhập điểm</th><th>Trạng thái</th><th>Ngày sinh</th></tr>';
                               $.each(data.list,function (index,item) {
                                   i++;
                                   div +='<tr><td>'+i+'</td>';
                                   div +='<td>'+item.mahv+'</td>';
                                   div +='<td>'+item.ho_dem + ' ' + item.ten+'</td>';

                                   div +='<td><input type="number" min="0" max="100" step="0.1" class="form-control" name="'+item.idlmhv+'_diem" placeholder="Nhập điểm"></td>';

                                   var __trangthai = '';
                                   $.each(data.trang_thai_hoc,function (_idex,itemTT) {
                                       if(_idex ==item.trang_thai_hoc)
                                       {
                                           __trangthai = itemTT;
                                           return;
                                       }
                                   });

                                   div +='<td>'+__trangthai+'</td>';
                                   div +='<td>'+item.ngay_sinh+'</td>';
                                   div +='</tr>';

                               });
                               div +='</tbody>';
                               $('#dshv').html(div).show();
                               $('#btn-save-lh').show();

                           }
                       }

                   })
                   .fail(function(err) {
                       console.log(err);
                       // alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });
           }
           /*
           Kết thúc nhập điểm
            */

           if($('#btn-print-hv').length>0){
               $('#btn-print-hv').click(function () {
                   $('#frm-search-hv').append('<input type="hidden" name="event" value="print" />');
                   $('#frm-search-hv').attr('target','_blank');
                   $('#frm-search-hv').submit();
                   $('#frm-search-hv').removeAttr('target');
                   $('input[name=event]').remove();
               });
           }
           if($('#btn-export-hv').length>0){
               $('#btn-export-hv').click(function () {
                   $('#frm-search-hv').append('<input type="hidden" name="event" value="export" />');
                   $('#frm-search-hv').attr('target','_blank');
                   $('#frm-search-hv').submit();
                   $('#frm-search-hv').removeAttr('target');
                   $('input[name=event]').remove();
               });
           }


           if($('#btn-toggle-option').length>0){
               $('#btn-toggle-option').click(function () {
                   $('.option-show-col').toggle(300);
               });
               $('#saveOpton').click(function () {
                   location.reload();
               });


               $('.chk_show_col').on('ifChecked', function(event){
                   // alert(event.type + ' callback');
                   //   console.log($(this).val());
                   $.cookie($(this).val(), 1, { expires : 360 });
               });
               $('.chk_show_col').on('ifUnchecked', function(event){
                   // alert(event.type + ' callback');
                   $.cookie($(this).val(), 1, { expires : -365 });
                   // console.log($(this).val());
                   // $.cookie($(this).val(),'1' , { expires: -1, path: '/apps/hoc-vien/ds-v2' });
                   // console.log(event);
               });
           }

           if($('#frm-search-hv').length>0)
           $(".search_input").on('keyup', function (e) {
               if (e.keyCode == 13) {
                   // Do something
                   $('#frm-search-hv').submit();
               }
           });

           if($('#btn-toggle-option-search').length>0) {
               $('#btn-toggle-option-search').click(function () {
                   $('.option-show-search').toggle(300);
               });
           };


           if ($('.set-trang-thai-hoc-tap').length > 0) {
               appHocVien.setTrangThaiHocTap();
           };

           if($('.alert-log-tt').length>0){
               $('.alert-log-tt').click(function (){
                   $('#app-modal-dialog-title').html('Lịch sử thay đổi Trạng thái học tập: <b>' + $(this).attr('data-name') + '</b>');
                   $('#app-modal-dialog-body').html($(this).attr('data-alert'));

                   $('#app-modal-dialog').modal('show');
               });
           }

           $('.editId').click(function (e) {
              e.preventDefault();
              if(!$(this).attr('data-id')){
                  alert('Chưa có điểm');
                  return;
              }
              var obj = new Object();
              obj.id = $(this).attr('data-id');
              obj.id_mh = $(this).attr('data-mh');
              obj.mahv = $(this).attr('data-hv');
              $.post('/apps/hoc-vien/ajax-get-diem-hv-mh',{params:obj,_token:$('meta[name=_token]').attr('content')})
                  .done(function (data) {
                      if(data.status == 1){
                          showModal(data.list);
                      }
                      else{
                          alert(data.errors.join(', '));
                      }
                  })
                  .fail(function (err) {
                      console.log(err);
                  })
               function showModal(data) {
                  // console.log(obj);
                   _strHtml = '<div id="msg" style="color:red;"></div><form action="" method="post" id="form1"><table class="table table-bordered"><tr><th>Select</th><th>Mã môn</th><th>Môn học</th><th>Mã lớp</th><th>Khóa học</th></tr>';
                   $.each(data,function (index,item) {
                       _strHtml += '<tr><td style="text-align: center;vertical-align: middle;"><input type="radio" name="chooseid" class="minimal" value="'+item.id+'"></td><td>'+item.ma_mh+'</td><td>'+item.ten_mh+'</td><td>'+item.ma_lop+'</td><td>'+item.ten_khoa_hoc+'</td></tr>'
                   });
                   _strHtml += '</table><div class="form-group"><label for="">Ghi chú:</label><textarea name="ghichu" id="ghichu" class="form-control" rows="2"></textarea></div><button class="btn btn-primary" type="button" id="btnUpdate">Cập nhật</button></form>'
                   $('#app-modal-dialog-title').html('Thay đổi điểm mới');
                   $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                   $('#app-modal-dialog-body').append(_strHtml);

                   $('#app-modal-dialog').modal({
                       backdrop: 'static',
                       keyboard: false  // to prevent closing with Esc button (if you want this too)
                   });
                   $('#app-modal-dialog').modal('show');
                   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                       checkboxClass: 'icheckbox_minimal-blue',
                       radioClass   : 'iradio_minimal-blue'
                   })
                   if(data.length<=0)
                       $('#msg').text('Không có điểm nào khác cho môn học này');
               }
               $('#app-modal-dialog').on('click','#btnUpdate', function () {
                   if($('#form1 input[type=radio]:checked').length<=0){
                       $('#msg').text('Chọn 1 mục');
                       return false;
                   }
                   if($('#ghichu').val()==''){
                       $('#msg').text('Ghi lý do sửa');
                       return false;
                   }
                   $('#msg').text('');
                    $.post('/apps/hoc-vien/ajax-update-diem-moi-hv-mh',
                        {
                            id_new:$('#form1 input[type=radio]:checked').val(),
                            id_old:obj.id,
                            ghichu:$('#ghichu').val(),
                            _token:$('meta[name=_token]').attr('content')
                        })
                        .done(function (data) {
                            if(data.status==1){
                                alert('Thay đổi điểm thành công!');
                                window.location.reload();
                            }
                            else{
                                $('#msg').text(data.errors.join(', '));
                                // console.log(data);
                            }
                        })

               });
           });


       };

       appHocVien.chamSocHocVien = function () {
            //get ds lop

           $('.cham-soc-hv').click(function () {
                console.log('cham soc hv');
               var _mahv = $(this).attr('data-id');
               var _hoten = $(this).attr('data-name');
               $.get('/apps/hoc-vien/ajax-list-lop/'+_mahv)
                   .done(function (data) {
                       console.log(data);
                       appHocVien.listLop = data;
               // var _lop = $(this).attr('data-lop');
               appHocVien.cs_mahv = _mahv;
                       var _strHtml ="<div class='form-group'><label>Chọn lớp:</label><select id='lop' name='lop' class='form-control'>";
                       if(appHocVien.listLop.length>0){
                           $.each(appHocVien.listLop,function (index,item) {
                               _strHtml += '<option value="'+item.id_lop+'">' + item.ma_lop + '</option>';
                           });
                       }
                       _strHtml += '</select></div>';
                       _strHtml += 'Lý do cuộc gọi:<select id="ttcs" class="form-control col-sm-6 col-xs-6"  style="margin-bottom: 10px">';

               if(appHocVien.trangThaiChamSoc.length>0){
                   $.each(appHocVien.trangThaiChamSoc,function (index,item) {
                       _strHtml += '<option value="'+item.id+'">' + item.ten_trang_thai + '</option>';
                   });
               }
               _strHtml += '</select><br><br>';

               _strHtml += '<div id="cs_msg" style="margin-bottom: 10px"></div></div><textarea id="cs_content" rows="5" placeholder="Nhập nội dung cuộc gọi" class="col-sm-12 form-control" style="margin-bottom: 10px"></textarea>';

               _strHtml += '<br><br><input type="button" class="btn btn-primary" id="cs_btn_submit" value=" Save " />';

               $('#app-modal-dialog-title').html('<i class="fa  fa-graduation-cap"></i> Chăm sóc học viên: <b>'+_mahv+'. ' + _hoten + '</b>');
               $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
               $('#app-modal-dialog-body').append(_strHtml);

               $('#app-modal-dialog').modal({
                   backdrop: 'static',
                   keyboard: false  // to prevent closing with Esc button (if you want this too)
               })
               $('#app-modal-dialog').modal('show');
                   })
                   .fail(function (err) {
                       console.log(err);
                   });


           });

            // phải dùng sự kiện .on vì cs_btn_submit là add thêm lúc runtime
           $('#app-modal-dialog').on('click','#cs_btn_submit', function () {
                var _cs_content = $('#cs_content').val();
               var _ttcs = $('#ttcs').val();
               var _lop = $('#lop').val();
               $.post( '/apps/hoc-vien/add-cs/'+ appHocVien.cs_mahv,{_token: $('#_token').attr('content'),cs_content:_cs_content,ttcs:_ttcs,lop:_lop})
                   .done(function(data, status) {
                       if(status == 'success'){
                           if(data.status !=1 ){
                               // co loi
                               console.log(data.errors); 
                               $('#cs_msg').html('<span style="color:red">'+_msg_err.join('<br>')+'</span>');
                           }
                           else{
                               $('#app-modal-dialog-body').html('<span style="color:blue">'+data.msg.join('<br>')+'</span>');
                                // $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');

                           }
                       }

                   })
                   .fail(function(err) {
                       console.log(err);
                       $('#cs_msg').html('<span style="color:red">'+ err +'</span>');
                       // alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });

           });
       };
       appHocVien.setTrangThaiHocTap = function () {

           $('.set-trang-thai-hoc-tap').click(function () {
               console.log('set-trang-thai-hoc-tap');
               var _mahv = $(this).attr('data-id');
               var _hoten = $(this).attr('data-name');
               // var _lop = $(this).attr('data-lop');
               appHocVien.tt_ht_mahv = _mahv;

               var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';
               _strHtml += '<select id="tt_ht" class="form-control col-sm-6 col-xs-6"  style="margin-bottom: 10px">' +
                   '<option value="">Chọn trạng thái</option>';
                console.log(trang_thai_hoc_tap );

               if(typeof trang_thai_hoc_tap != 'undefined'){
                   $.each(trang_thai_hoc_tap,function (index,item) {
                       _strHtml += '<option value="'+index+'">' + item + '</option>';
                   });
               }
               _strHtml += '</select><textarea id="ghichu_tt" rows="5" placeholder="Nhập nội dung ghi chú" class="col-sm-12 form-control" style="margin-bottom: 10px"></textarea>';
               _strHtml += '<br><br><input type="button" class="btn btn-primary" id="btn_submit_tt" value=" Save " />';

               $('#app-modal-dialog-title').html('Đổi trạng thái học tập: <b>'+_mahv+'. ' + _hoten + '</b>');
               $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
               $('#app-modal-dialog-body').append(_strHtml);

               $('#app-modal-dialog').modal({
                   backdrop: 'static',
                   keyboard: false  // to prevent closing with Esc button (if you want this too)
               })
               $('#app-modal-dialog').modal('show');

           });

           // phải dùng sự kiện .on vì cs_btn_submit là add thêm lúc runtime
           $('#app-modal-dialog').on('click','#btn_submit_tt', function () {
               var _ghichu_tt = $('#ghichu_tt').val();
               var _tt_ht = $('#tt_ht').val();
               $.post( '/apps/hoc-vien/trang-thai-hoc-tap-chinh/'+ appHocVien.tt_ht_mahv,{_token: $('#_token').attr('content'),ghichu_tt:_ghichu_tt,tt_ht:_tt_ht})
                   .done(function(data, status) {
                       if(status == 'success'){
                           if(data.status !=1 ){
                               // co loi
                               console.log(data.errors);
                               var _msg_err = [];
                               $.each(data.errors,function (index,item) {
                                   _msg_err += '<br>' + item;
                               });

                               $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                           }
                           else{
                               $('#app-modal-dialog-body').html('<span style="color:blue">Đã lưu thành công!</span>');
                               // $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');
                               setTimeout(function () {
                                   location.reload();
                               }, 2000);

                           }
                       }

                   })
                   .fail(function(err) {
                       console.log(err);
                       // alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });

           });
       };

       appHocVien.UpdateTrangThaiChinh = function(){

       }


       appHocVien._ctdt = null;
       appHocVien._mahv = null;
       appHocVien._lop = null;

       appHocVien.showFullInfo = function () {
           appHocVien._ctdt = $('#ctdt_info').val();
           appHocVien._mahv = $('#ma_hv').text();
           // appHocVien._ctdt = $('#ctdt_info').val();
           if($('#ctdt_info').length>0)
           appHocVien.reloadNH();

           $('#page-full-info').on('change','#ctdt_info',function () {
               console.log('Change ctdt ' +  appHocVien._ctdt);
               appHocVien.reloadNH();
           });


       };
       appHocVien.reloadNH = function () {
           // ngành học

           appHocVien._ctdt = $('#ctdt_info').val();
           console.log('reload NH ' +  appHocVien._ctdt);
           $.get('/apps/nganh-hoc/list-by-ctdt-'+ appHocVien._ctdt)
               .done(function (data, status) {
                   if (status == 'success') {

                       $('#info-nganh-hoc').text(data.objItem.ten_nganh);
                   }
                   // console.log(status);
                   // alert( "second success" );
               })
               .fail(function (err) {
                   console.log(err);
                   alert("error");
               });

       };


       appHocVien.run();
   }


   if(typeof appGiaoVien != 'undefined'){
       appGiaoVien = new Object();

       appGiaoVien.run = function () {


           if($('.gv-view-list-mh').length>0)
           $('.gv-view-list-mh').click(function () {
               var _url = '/apps/mon-hoc/ajax-list-by-gv-'  + $(this).attr('data-id');
               var _gv_name = $(this).attr('data-name');

               $.get( _url)
                   .done(function(data, status) {
                       if(status == 'success'){

                           $('#app-modal-dialog-title').html('<b>Danh sách môn học của Giảng viên: '+_gv_name+'</b>');

                           var _html = '<table class="table table-bordered"><tr><th>Mã Môn học</th><th>Tên môn học</th></tr>';

                           $.each(data.list,function (index, item) {
                               // console.log(item);
                               _html += '<tr><td>'+item.ma_mh+'</td><td>'+item.ten_mh+'</td></tr>';
                           });

                           _html += '</table>';
                           $('#app-modal-dialog-body').html(_html);
                           $('#app-modal-dialog').modal({
                               backdrop: 'static',
                               keyboard: false  // to prevent closing with Esc button (if you want this too)
                           })
                           $('#app-modal-dialog').modal('show');
                       }
                   })
                   .fail(function(err) {
                       console.log(err);
                       alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });
               return false;
           });

            if($('.gv-xep-lop').length>0){
                $('.gv-xep-lop').click(function () {

                    var _gv_name = $(this).attr('data-name');
                    var _gv_id = $(this).attr('data-id');

                    $('#app-modal-dialog-title').html('<b>Xếp lớp giảng dạy cho GV: '+_gv_name+'</b>');

                    var _html = '<div id="xl_msg"></div> <table><tr><td>Môn học:</td><td><select class="form-control select2" id="xlgv-slx-mh"><option value="">Chọn Môn học</option></select></td></tr>';
                    _html +='<tr><td>Lớp:</td><td><select class="form-control select2"  id="xlgv-slx-lop"><option value="">Chọn Lớp </option></select></td></tr></table>';

                    _html +='<br>Ghi chú: Cần kiểm tra kỹ thông tin trước khi lưu (chức năng này đang phát triển, cần điều chỉnh thêm).<br><input type="button" id="btn-xep-lop-gv" class="btn btn-primary pull-right" value="Xếp lớp"><div class="clearfix"></div> ';
                    $('#app-modal-dialog-body').html(_html);
                    $('#app-modal-dialog').modal({
                        backdrop: 'static',
                        keyboard: false  // to prevent closing with Esc button (if you want this too)
                    })
                    $('#app-modal-dialog').modal('show');
                    $('.select2').select2();

                    var _url = '/apps/mon-hoc/ajax-list-by-gv-'  + _gv_id;
                    $.get( _url)
                        .done(function(data, status) {
                            if(status == 'success'){

                                $.each(data.list,function (index, item) {
                                    // console.log(item);
                                    $('#xlgv-slx-mh').append('<option value="'+item.id+'">'+ item.ma_mh + '. '+item.ten_mh+'</option>');
                                });

                            }
                        })
                        .fail(function(err) {
                            console.log(err);
                            alert( "error" );
                        })
                        .always(function() {
                            // console.log ("finished" );
                        });

                    $.get('/apps/lop/ajax-list-running', {_token: $('#_token').attr('content')})
                        .done(function (data, status) {
                            if (status == 'success') {
                                if(typeof (data.errors) == 'undefined')
                                $.each(data.data,function (index, item) {
                                    // console.log(item);
                                    $('#xlgv-slx-lop').append('<option value="'+item.id+'">'+item.ma_lop+'</option>');
                                });
                            }
                            // console.log(status);
                            // console.log(data);

                            // alert( "second success" );
                        })
                        .fail(function (err) {
                            console.log(err);
                            alert("error");
                        });


                    $('#app-modal-dialog').on('click','#btn-xep-lop-gv',function () {
                        console.log('xep lop gv');
                        // _gv_id
                        var _mh = $('#xlgv-slx-mh').val();
                        var _lp = $('#xlgv-slx-lop').val();

                        $.post( '/apps/xep-lop-gv',{_token: $('#_token').attr('content'),
                            _gv_id : _gv_id,
                            _mh : _mh,
                            _lp : _lp
                        })
                            .done(function(data, status) {
                                if(status == 'success'){
                                    console.log(data);

                                    if(data.status ==0){
                                        $('#xl_msg').html('<p style="color: red;">'+ data.msg +'</p>');
                                    }
                                    else{
                                        $('#xl_msg').html('<p style="color: blue;">'+ data.msg +'</p>');
                                    }
                                }

                            })
                            .fail(function(err) {
                                console.log(err);
                                // alert( "error" );
                                $('#xl_msg').html('<p style="color: red;">'+ err.responseJSON['message'] +'</p>');
                            })
                            .always(function() {
                                // console.log ("finished" );
                            });




                    });


                    return false;


                });
            }

       };

       appGiaoVien.run();

   }

   if(typeof appLop != 'undefined'){
       appLop = new Object();
       appLop.listKH = [];
       appLop.listUser = [];
       appLop.listKHLop = [];
       
       appLop.currentIdEdit = 0;
       appLop.status_cs = 0;
       appLop.dataHv = [];
       appLop.div = '';
       
       appLop.convertTime = function(time){
           var d = new Date(time);
           var dd = d.getDate();
           var mm = d.getMonth()+1; //January is 0!

           var yyyy = d.getFullYear();
           if(dd<10){
               dd='0'+dd;
           }
           if(mm<10){
               mm='0'+mm;
           }
           return d = dd+'/'+mm+'/'+yyyy;
       };
       appLop.hvShow = function (data,div,sort) {
           if(sort == 1){
               data.sort(function (a, b) {
                   if(a.ten > b.ten)
                       return -1;
                   if(a.ten < b.ten)
                       return 1;
                   return 0;
               });
           }
           var i=0;
           $.each(data,function (index,item) {
               i++;
               var disable = '';
               var val = '';
               if(item.diem_qt != null){
                   disable = 'disabled';
                   val = item.diem_qt;
               }
               div +='<tr><td>'+i+'</td>';
               div +='<td>'+item.mahv+'</td>';
               div +='<td>'+item.ho_dem + '</td>';
               div +='<td>'+ item.ten+'</td>';
               div +='<td>'+appLop.convertTime(item.ngay_sinh)+'</td>';
               div +='<td><input type="number" min="0" max="100" step="0.1" class="form-control" name="'+item.idlmhv+'_diem" placeholder="Nhập điểm"></td></tr>';
           });
           div +='</tbody>';
           $('#dshv').html(div).show();
       };
       appLop.run = function () {


           if($('.lop-add-kh').length >0)
           $.get('/apps/khoa-hoc/ajax-list-kh')
               .done(function(data, status) {
                   // console.log(data);
                   if(status == 'success'){
                       if(data.status ==1){
                           appLop.listKH = data.list;
                       }
                   }
               })
               .fail(function(err) {
                   console.log(err);
                   // alert( "error" );
               });

           if($('.cs-lop').length>0)
           $.get('/apps/lop/ajax-list-user-cb')
               .done(function(data, status) {
                   // console.log(data);
                   if(status == 'success'){
                       if(data.status ==1){
                           appLop.listUser = data.list;
                       }
                   }
               })
               .fail(function(err) {
                   console.log(err);
                   // alert( "error" );
               });

           /*
           * Hướng nghiệp thông tin lớp
           * */
           if($('.btn-edit-huongnghiep-gv').length>0){
               $('.btnEditHuongNghiepGV').click(function(){
                    var _idLop = $(this).attr('data-id');
                    var _txt = $('#huongnghiep_gv_'+_idLop).val();
                    // console.log(_idLop);
                    // console.log(_txt);

                   $.post( '/apps/lop/update-huongnghiep_gv/'+ _idLop,
                                {_token: $('#_token').attr('content'),
                                    _txt:_txt
                                   })
                       .done(function(data, status) {
                           if(status == 'success'){
                               if(data.status !=1 ){
                                   // co loi
                                   console.log(data.errors);
                                   var _msg_err = [];
                                   $.each(data.errors,function (index,item) {
                                       _msg_err += "\n" + item;
                                   });
                                   alert(_msg_err);
                               }
                               else{
                                   console.log("save GV OK");
                                   location.reload(true);
                                   // setTimeout( function(){
                                   //     location.reload(true)
                                   // },1000);

                               }
                           }

                       })
                       .fail(function(err) {
                           console.log(err);
                           // alert( "error" );
                       })
                       .always(function() {
                           // console.log ("finished" );
                       });
               });
           }
           if($('.btn-edit-huongnghiep-ghichu').length>0){
               $('.btnEditHuongNghiepGhichu').click(function(){
                   var _idLop = $(this).attr('data-id');
                   var _txt = $('#huongnghiep_ghichu_'+_idLop).val();
                   // console.log(_idLop);
                   // console.log(_txt);

                   $.post( '/apps/lop/update-huongnghiep_ghichu/'+ _idLop,
                       {_token: $('#_token').attr('content'),
                           _txt:_txt
                       })
                       .done(function(data, status) {
                           if(status == 'success'){
                               if(data.status !=1 ){
                                   // co loi
                                   console.log(data.errors);
                                   var _msg_err = [];
                                   $.each(data.errors,function (index,item) {
                                       _msg_err += "\n" + item;
                                   });
                                   alert(_msg_err);
                               }
                               else{
                                   console.log("save ghi chu OK");
                                   location.reload(true);
                                   // setTimeout( function(){
                                   //     location.reload(true)
                                   // },1000);

                               }
                           }

                       })
                       .fail(function(err) {
                           console.log(err);
                           // alert( "error" );
                       })
                       .always(function() {
                           // console.log ("finished" );
                       });
               });
           }

/*
Phần chăm sóc lớp
 */
           if($('.cs-lop').length>0)
               $('.cs-lop').click(function () {
                   appLop.currentIdEdit = $(this).attr('data-id');
                   $('#app-modal-dialog-title').html('<b>Thêm lịch chăm sóc lớp</b>');
                   var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';

                   _strHtml += '<div class="form-group"><label>User Chăm sóc lớp</label><select class="form-control select2" id="user_cs" name="user_cs[]" multiple="multiple" data-placeholder="Chọn người chăm sóc lớp" style="width: 100%;">';
                   if(appLop.listUser.length >0){
                       $.each(appLop.listUser,function (index,item) {
                           _strHtml += '<option value="'+item.id+'">' + item.username + '</option>';
                       });
                   }
















                   // console.log(_strHtml);
                   _strHtml += '</select></div>';
                   _strHtml += '<div class="form-group"><lable>Ngày bắt đầu:</lable><input type="text" placeholder="dd/mm/yyyy" class="form-control" id="start_date"></div>';
                   _strHtml += '<div class="form-group"><lable>Ngày kết thúc:</lable><input type="text" placeholder="dd/mm/yyyy" class="form-control" id="end_date"></div>';
                   _strHtml += '<br><br><input type="button" class="btn btn-primary" id="lich_cs_btn_submit" value=" Save " />';

                   $('#app-modal-dialog-body').html(_strHtml);
                   $('#app-modal-dialog').modal({
                       backdrop: 'static',
                       keyboard: false  // to prevent closing with Esc button (if you want this too)
                   });
                   $('#app-modal-dialog').modal('show');
                   $('.select2').select2();
               });

           $('#app-modal-dialog').on('click','#lich_cs_btn_submit',function(){
               var _id_user_cs = $('#user_cs').val();
               var _start_date = $('#start_date').val();
               var _end_date = $('#end_date').val();
               if(_id_user_cs == ''||_start_date == ''||_end_date == ''){
                   alert('Vui lòng nhập đầy đủ thông tin');
                   return;
               }
               // console.log(_id_user_cs+'=>'+_start_date+'=>'+_end_date);
               // return;
               $.post( '/apps/lop/ajax-add-lich-cs/'+ appLop.currentIdEdit,{_token: $('#_token').attr('content'),user_cs:_id_user_cs,start_date:_start_date,end_date:_end_date})
                   .done(function(data, status) {
                       if(status == 'success'){
                           if(data.status !=1 ){
                               // co loi
                               console.log(data.errors);
                               var _msg_err = [];
                               $.each(data.errors,function (index,item) {
                                   _msg_err += '<br>' + item;
                               });

                               $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                           }
                           else{
                               console.log("save lich cham soc OK");

                               $('#app-modal-dialog-body').html('<span style="color:blue">Đã lưu thành công! Đang tải lại trang...</span>');
                               setTimeout( function(){
                                   location.reload(true)
                               },1000);

                           }
                       }

                   })
                   .fail(function(err) {
                       console.log(err);
                       // alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });



           });

           $('#app-modal-dialog').on('keypress','#nam_thu',function(evt){
               evt.preventDefault();
           });




/*
kết thúc chăm sóc lớp
 */
    /*
           Phần change status
            */
           if($('.change_status').length>0)
               $('.change_status').click(function () {
                   appLop.currentIdEdit = $(this).attr('data-id');
                   appLop.status_cs = $(this).attr('data-status');
                   console.log(appLop.status_cs+'=>'+appLop.currentIdEdit);
                   $('#app-modal-dialog-title').html('<b>Ghi chú thay đổi trạng thái</b>');
                   var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';

                   _strHtml += '<div class="form-group"><lable>Ghi chú</lable><textarea type="text" rows="5" class="form-control" id="ghi_chu"></textarea></div>';
                   _strHtml += '<br><br><input type="button" class="btn btn-primary" id="ghichu_submit" value="Xong" />';

                   $('#app-modal-dialog-body').html(_strHtml);
                   $('#app-modal-dialog').modal({
                       backdrop: 'static',
                       keyboard: false  // to prevent closing with Esc button (if you want this too)
                   });
                   $('#app-modal-dialog').modal('show');
                   $('.select2').select2();
               });

           $('#app-modal-dialog').on('click','#ghichu_submit',function(){
               var _ghi_chu = $('#ghi_chu').val();
               console.log(_ghi_chu);
               if(_ghi_chu == ''){
                   alert('Vui lòng nhập ghi chú trước khi thay đổi trạng thái');
                   return;
               }
               $.post( '/apps/lop/change-status-cham-soc/'+ appLop.currentIdEdit,{_token: $('#_token').attr('content'),status:appLop.status_cs,ghi_chu:_ghi_chu})
                   .done(function(data, status) {
                       if(status == 'success'){
                           if(data.status !=1 ){
                               // co loi
                               console.log(data.errors);
                               var _msg_err = [];
                               $.each(data.errors,function (index,item) {
                                   _msg_err += '<br>' + item;
                               });

                               $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                           }
                           else{
                               console.log("save kh OK");

                               $('#app-modal-dialog-body').html('<span style="color:blue">Đã thay đổi trạng thái thành công! Đang tải lại trang...</span>');
                               setTimeout( function(){
                                   location.reload(true)
                               },1000);

                           }
                       }

                   })
                   .fail(function(err) {
                       console.log(err);
                       // alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });



           });

           /*
           kết thúc change status
            */


           if($('.lop-add-kh').length>0)
               $('.lop-add-kh').click(function () {
                   appLop.currentIdEdit = $(this).attr('data-id');
                   // $.get('/apps/lop/ajax-update-kh-to-lop-'+_idL)
                   //     .done(function(data, status) {
                   //         // console.log(data);
                   //         if(status == 'success'){
                   //             if(data.status ==1){
                   //                 appLop.listKHLop = data.list;
                   //             }
                   //         }
                   //     })
                   //     .fail(function(err) {
                   //         console.log(err);
                   //         // alert( "error" );
                   //     });


                   $('#app-modal-dialog-title').html('<b>Thêm Khóa học cho Lớp</b>');
                   var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';

                   _strHtml += '<select id="kh_to_lop" class="form-control select2" style="margin-bottom: 10px; width:300px"><option value="">Chọn Khóa học</option>';
                   if(appLop.listKH.length >0){
                       $.each(appLop.listKH,function (index,item) {
                           _strHtml += '<option value="'+item.id+'">' + item.ten_khoa_hoc + '(Hệ: '+item.ten_he_dao_tao+')' + '</option>';
                       });
                   }

                   // console.log(_strHtml);
                   _strHtml += '</select> Năm thứ: <input type="number" min="1" max="3" step="1"    id="nam_thu" value="1">';
                   _strHtml += '<br><br><p>Chú ý: Chức năng này chỉ thêm, không xóa, sửa. Nếu cần thiết vui lòng liên hệ Quản trị.</p><input type="button" class="btn btn-primary" id="add_kh_lop_btn_submit" value=" Save " />';

                   $('#app-modal-dialog-body').html(_strHtml);
                   $('#app-modal-dialog').modal({
                       backdrop: 'static',
                       keyboard: false  // to prevent closing with Esc button (if you want this too)
                   });
                   $('#app-modal-dialog').modal('show');
                   $('.select2').select2();
               });

           $('#app-modal-dialog').on('click','#add_kh_lop_btn_submit',function(){

               var _id_kh_add = $('#kh_to_lop').val();
               var _nam_thu = $('#nam_thu').val();

               $.post( '/apps/lop/ajax-update-kh-to-lop-'+ appLop.currentIdEdit,{_token: $('#_token').attr('content'),kh_to_lop:_id_kh_add,nam_thu:_nam_thu})
                   .done(function(data, status) {
                       if(status == 'success'){
                           if(data.status !=1 ){
                               // co loi
                               console.log(data.errors);
                               var _msg_err = [];
                               $.each(data.errors,function (index,item) {
                                   _msg_err += '<br>' + item;
                               });

                               $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                           }
                           else{
                               console.log("save kh OK");

                               $('#app-modal-dialog-body').html('<span style="color:blue">Đã lưu thành công! Đang tải lại trang...</span>');
                               setTimeout( function(){
                                   location.reload(true)
                               },1000);

                           }
                       }

                   })
                   .fail(function(err) {
                       console.log(err);
                       // alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });
           });

           $('#app-modal-dialog').on('keypress','#nam_thu',function(evt){
               evt.preventDefault();
           });

            if($('.frm_lich_hoc').length>0)
                appLop.lichHoc();

            if($('#diem_danh_lop').length>0)
                $('#diem_danh_lop').change(function () {
                    $('form[class=filter-box]').submit();
                });
           if($('#diem_danh_mh').length>0)
               $('#diem_danh_mh').change(function () {
                   $('form[class=filter-box]').submit();
               });
           if($('#diem_danh_d').length>0)
               $('#diem_danh_d').change(function () {
                   $('form[class=filter-box]').submit();
               });
       };

       appLop.lichHoc_lop = 0;
       appLop.lichHoc_mh = 0;
       appLop.loadLichHoc = function(){
           var lop =  $('#lop').val();
           if(lop.length==0) return;

           // load full info
           __preloadThis('#box-table-full-info');
           $.get( '/apps/lop/ajax-lich-hoc-full-info-' + lop)
               .done(function( data ) {

                   if(data.status == 1){
                       var _html_tb = '';

                       $.each(data.info,function (index, item) {
                           _html_tb += '<hr><h4 class="text-info"><i class="fa fa-book"></i> Chương trình Đào tạo: <b>'+item.ten_ctdt+'</b></h4>';

                           $.each(item.detail,function (id_lop, lop) {

                               _html_tb += '<h4 class="text-info"><i class="fa fa-mortar-board"></i> Khóa học: <b>'+lop.ten_khoa_hoc+'</b></h4>';
                               _html_tb += '<h4 class="text-info"><i class="fa fa-users"></i> Lớp: <b>'+lop.ma_lop+'</b> <a target="_blank" href="/apps/hoc-vien/trang-thai-hoc-tap-theo-lop/'+id_lop+'"' +
                                   '                               title="Trạng thái học tập"><i\n' +
                                   '                                        class="fa fa-sliders" style="width: 20px; padding:3px;  border-radius:3px; color:red"></i></a></h4>';

                               _html_tb += '<b>Ghi chú:</b> '+lop.ghi_chu+'<br>';

                               _html_tb += '<div class="table-responsive"><table class="table table-striped table-bordered">\n' +
                                   '<tr>\n' +
                                   '<th>#ID</th>\n' +
                                   '<th>Mã MH</th>\n' +
                                   '<th>Môn học</th>\n' +
                                   '<th>Trạng thái</th>\n' +
                                   '<th>Số giờ quy định</th>\n' +
                                   '<th>Thêm giờ</th>\n' +
                                   '<th>Bù giờ điểm danh</th>\n' +
                                   '<th>Số giờ đã học</th>\n' +
                                   '<th>Số giờ còn lại</th>\n' +
                                   '<th>Ca học</th>\n' +
                                   '<th>Ngày học</th>\n' +
                                   '<th>Giảng viên</th>\n' +
                                   '<th>Phòng học</th>\n' +
                                   '</tr>';

                               $.each(lop.mh,function (id_mh, monhoc) {
                                   console.log("Lich hoc ID lop: " + id_lop);
                                   _html_tb += '<tr><td>' +id_mh + '</td>';
                                   _html_tb += '<td>' + monhoc.ma_mh + '</td>';
                                   _html_tb += '<td>' + monhoc.ten_mh + '</td>';
                                   // var _tt = '';
                                   // if(monhoc.trang_thai==0)
                                   //     _tt = 'Chưa học';
                                   // else if(monhoc.trang_thai == 1)
                                   //     _tt = '<span class="text-info">Đang học</span>';
                                   // else if(monhoc.trang_thai == -1)
                                   //     _tt = '<span class="text-damger">Kết thúc</span>';

                                   _html_tb += '<td>' + monhoc.ten_trang_thai + '</td>';
                                   _html_tb += '<td class="text-center"><b>' + monhoc.tong_so_gio_hoc + '</b></td>';
                                   _html_tb += '<td class="text-center"><b>' + monhoc.so_gio_them + '</b></td>';
                                   _html_tb += '<td class="text-center"><b>' + monhoc.so_gio_bu + '</b></td>';
                                   _html_tb += '<td class="text-center"><b>' + monhoc.so_gio_da_hoc + '</b></td>';
                                   _html_tb += '<td class="text-center"><b>' + monhoc.so_gio_con_lai + '</b></td>';
                                   _html_tb += '<td>' + monhoc.ca_hoc + '</td>';
                                   _html_tb += '<td>' + monhoc.ngay_hoc + '</td>';

                                   if(monhoc.hoten_gv.length<3){
                                       _html_tb += '<td><a href="javascript:void(0);" class="link-add-gv-mh" data-lop="'+id_lop+'" data-mh="'+id_mh+'" m-name="'+monhoc.ma_mh + '. ' +monhoc.ten_mh+'"><i class="fa fa-plus"></i> Xếp GV</a></td>';
                                   }else
                                       _html_tb += '<td>' + monhoc.hoten_gv + '</td>';
                                   _html_tb += '<td>' + monhoc.phong_hoc + '</td>';
                                   _html_tb += '</tr>';
                               });
                               _html_tb += '</table></div>';
                           });
                       });

                       $('#box-table-full-info').html(_html_tb);


                   }else{
                       $('#box-table-full-info').html('<hr>'+ data.errors);
                   }
               })
               .fail(function(err) {
                   console.log(err);
                   // alert( "error" );
               });

           $.get( '/apps/mon-hoc/ajax-list-by-lop-' + lop,{ "_": $.now() })
               .done(function( data ) {
                   // console.log(data);
                   var opt = '<option value=""> Chọn Môn học </option>';
                   $.each(data.listMH,function (index, itemMH) {
                       // console.log(item);
                       opt += '<option value="' + itemMH.id + '" ';
                       opt +=  '>'+ itemMH.ma_mh + '. '  + itemMH.ten_mh + '</option>';

                   });
                   // console.log(opt);
                   $('#mh').html(opt);
                   // $('.select2').select2();
               });

       }
       appLop.___lop = 0;
       appLop.___mh = 0;
       appLop.____gv = 0;

       appLop.lichHoc = function (){
           // console.log('ok');
           if($('#lop').val()!=''){
               $.get( '/apps/mon-hoc/ajax-list-by-lop-' + $('#lop').val(),{ "_": $.now() })
                   .done(function( data ) {
                       // console.log(data);
                       var opt = '<option value=""> Chọn Môn học </option>';
                       $.each(data.listMH,function (index, itemMH) {
                           // console.log(item);
                           _selected = _mh==itemMH.id?'selected':'';
                           opt += '<option value="' + itemMH.id + '" '+_selected;
                           opt +=  '>'+ itemMH.ma_mh + '. '  + itemMH.ten_mh + '</option>';

                       });
                       // console.log(opt);
                       $('#mh').html(opt);
                       // $('.select2').select2();
                   });
           }

           $('#lop').on("select2:select", function(e) {

               // appLop.loadLichHoc();
               window.location.href='/apps/lop/lich-hoc?lop='+$(this).val();

           });


           $('#box-table-full-info').on('click','.link-add-gv-mh', function () {
               $('#app-modal-dialog-body').html('');
               //xxxxxxxxxxxxxxxxxxxxxxxxxxx
               appLop.___lop = $(this).attr('data-lop');
               appLop.___mh = $(this).attr('data-mh');
               var ___ma_mh = $(this).attr('m-name');

               $('#app-modal-dialog-title').html('<b>Xếp Giảng viên dạy môn học: '+___ma_mh+'</b>');

               var _html = '<select style="width: 250px;" class="form-control select2" id="slx_gv_xlmh2"><option value="">Chọn Giảng viên</option></select>';

               _html +='<br>Ghi chú: Cần kiểm tra kỹ thông tin trước khi lưu<br><div id="xl_by_mh_msg"></div><input type="button" id="btn-xep-lop-gv-lh" class="btn btn-primary pull-right" value="Lưu thông tin"><div class="clearfix"></div> ';
               $('#app-modal-dialog-body').html(_html);
               $('#app-modal-dialog').modal({
                   backdrop: 'static',
                   keyboard: false  // to prevent closing with Esc button (if you want this too)
               });
               $('#app-modal-dialog').modal('show');
               $('.select2').select2();
               var _url = '/apps/giang-vien/ajax-list-active?mon_day=' +appLop.___mh ;
               $.get( _url)
                   .done(function(data, status) {
                       if(status == 'success'){

                           $.each(data.list,function (index, item) {
                               // console.log(item);
                               $('#slx_gv_xlmh2').append('<option value="'+item.id+'">'+item.ho_ten + ' ('+item.ghi_chu+')'+'</option>');
                           });

                       }
                   })
                   .fail(function(err) {
                       console.log(err);
                       alert( "error load GV" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });
                // *** Chú ý: sự kiện $('#app-modal-dialog').on('click','#btn-xep-lop-gv-lh'..... nếu để
               // ở trong sự kiện click này thì mỗi lần hiện dialog lên nó sẽ tạo ra 1 đối tượng
               // khi sự kiện bấm nút lưu nó sẽ xảy ra tình trạng gửi nhiều lần theo số lần mở hộp thoại dialog
           });

           $('#app-modal-dialog').on('click','#btn-xep-lop-gv-lh',function () {
               // save click: Cái này không được đặt trong sự kiện hiển thị dialog
               console.log('xep gv mh');
               // _gv_id
               appLop.____gv  = $('#slx_gv_xlmh2').val();


               console.log("GV: " + appLop.____gv + "   mh: " + appLop.___mh + "   lop: " + appLop.___lop);

               $.post( '/apps/xep-lop-gv',{_token: $('#_token').attr('content'),
                   _gv_id : appLop.____gv,
                   _mh : appLop.___mh,
                   _lp : appLop.___lop
               })
                   .done(function(data, status) {
                       if(status == 'success'){
                           console.log(data);

                           if(data.status ==0){
                               $('#xl_by_mh_msg').html('<p style="color: red;">'+ data.msg +'</p>');
                           }
                           else{
                               $('#xl_by_mh_msg').html('<p style="color: blue;">'+ data.msg +'</p>');
                               appLop.loadLichHoc();
                           }
                       }

                   })
                   .fail(function(err) {
                       console.log(err);
                       // alert( "error" );
                       $('#xl_by_mh_msg').html('<p style="color: red;">'+ err.responseJSON['message'] +'</p>');
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });

           });



           $('#mh').on("select2:select", function(e) {
               appLop.lichHoc_lop =  $('#lop').val();
               appLop.lichHoc_mh =  $('#mh').val();
                window.location.href = '/apps/lop/lich-hoc?lop='+appLop.lichHoc_lop+'&mh='+appLop.lichHoc_mh;
                return false;
               $.get( '/apps/lop/ajax-lich-hoc-'+appLop.lichHoc_lop+'-' + appLop.lichHoc_mh )
                   .done(function( data ) {
                        console.log(data);

                       if(data.status !=1 ){
                           // co loi
                           console.log(data.errors);
                           var _msg_err = [];
                           $.each(data.errors,function (index,item) {
                               _msg_err += '\n' + item;
                           });
                           alert(_msg_err);
                           return;
                       }

                       var _info = data.info;
                       // $("#select").select2("val", "CA"); //set the value

                       $('#tx_ngay_bat_dau').val(_info.ngay_bat_dau);
                       $('#tx_ngay_hoc').val(_info.ngay_hoc);
                         $('#ca_hoc').val(_info.ca_hoc);
                       $('#phong_hoc').val(_info.id_phong_hoc);
                       // $('#phong_hoc').select2("val",_info.id_phong_hoc);
                       // $('#ca_hoc').select2("val",_info.ca_hoc);
                       // $('#ca_hoc').val(_info.ca_hoc);
                       $('#tx_so_gio_ca').val(_info.so_gio_1ca);
                       $('#tx_tong_so_gio_mh').val(_info.tong_so_gio_hoc);
                       $('#tx_so_gio_da_hoc').val(_info.so_gio_da_hoc);
                       $('#tx_so_gio_chua_hoc').val(parseInt(_info.tong_so_gio_hoc) + parseInt(_info.so_gio_them) - parseInt(_info.so_gio_da_hoc));
                       // $('#tx_ngay_hoc').val(_info.ngay_hoc);
                       $('#tx_so_gio_them').val(_info.so_gio_them);
                       $('#tx_so_gio_bu').val(_info.so_gio_bu);


                   });
           });

           $('#btn-save-lh').click(function () {
               var tx_ngay_hoc = $('#tx_ngay_hoc').val();
               var phong_hoc = $('#phong_hoc').val();
               var ca_hoc = $('#ca_hoc').val();
               // var tx_so_gio_ca = $('#tx_so_gio_ca').val();
               var tx_so_gio_da_hoc = $('#tx_so_gio_da_hoc').val();
               var tx_so_gio_chua_hoc = $('#tx_so_gio_chua_hoc').val();
               var tx_so_gio_them = $('#tx_so_gio_them').val();
               var tx_so_gio_bu = $('#tx_so_gio_bu').val();

               var tx_ngay_bat_dau = $('#tx_ngay_bat_dau').val();
               appLop.lichHoc_lop =  $('#lop').val();
               appLop.lichHoc_mh =  $('#mh').val();
               // console.log('abc');
               // console.log(appLop);
               // return false;

               $.post( '/apps/lop/ajax-lich-hoc-'+appLop.lichHoc_lop+'-' + appLop.lichHoc_mh,
                   {_token: $('#_token').attr('content'),
                       tx_ngay_hoc:tx_ngay_hoc,
                       phong_hoc:phong_hoc,
                       ca_hoc:ca_hoc,
                       // tx_so_gio_ca:tx_so_gio_ca,
                       tx_so_gio_da_hoc:tx_so_gio_da_hoc,
                       tx_so_gio_chua_hoc:tx_so_gio_chua_hoc,
                       tx_ngay_bat_dau:tx_ngay_bat_dau,
                       tx_so_gio_them:tx_so_gio_them,
                       tx_so_gio_bu:tx_so_gio_bu

                   })
                   .done(function(data, status) {
                       if(status == 'success'){
                           if(data.status !=1 ){
                               // co loi
                               console.log(data.errors);
                               var _msg_err = [];
                               $.each(data.errors,function (index,item) {
                                   _msg_err += '\n' + item;
                               });
                               alert(_msg_err);
                                return;
                               // $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                           }
                           else{

                               alert('Cập nhật thành công!');
                               window.location.reload();

                           }
                       }

                   })
                   .fail(function(err) {
                       console.log(err);
                       // alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });


           });

           /*
                      Phần nhập điểm
                       */
           // console.log('test'+_id_lop_request);
           if (typeof _id_lop_request != 'undefined') {
               if (_id_lop_request != ''){
                   getListMon(_id_lop_request, _id_mh_request);
                   getListHocVienV2(_id_lop_request, _id_mh_request);
               }
           }
           $('#Lop').on("select2:select", function(e) {
               var lop =  $('#Lop').val();
               getListMon(lop,'');
           });
           ///function get ds mon
           function getListMon(id_lop,id_mh) {
               $.get( '/apps/mon-hoc/ajax-list-by-lop-' + id_lop)
                   .done(function( data ) {
                       // console.log(data);
                       var _selected='';
                       var opt = '<option value=""> Chọn Môn học </option>';
                       $.each(data.listMH,function (index, item) {
                           // console.log(item);
                           _selected = item.id == id_mh?'selected':'';
                           // console.log(_selected+'=>');
                           opt += '<option '+_selected+' value="' + item.id + '" ';

                           // if(item.id == current_hk_huyen)
                           //     opt  += ' selected ';

                           opt +=  '>'+ item.ma_mh + '. '  + item.ten_mh + '</option>';

                       });

                       $('#mh').html(opt);

                   });
           }
           $('#btnLayDanhSach').click(function () {
               var lop = $('#Lop').val();
               var mon = $('#mh').val();
               var loai_diem = $('#Lop').val();
               var lan = $('#lan').val();
               if(lop==''||mon==''){
                   alert('Vui lòng chọn đủ thông tin trước khi lấy danh sách nhập điểm');
                   return;
               }
               console.log(lop+'=>>'+mon);
               getListHocVienV2(lop,mon);

           });
           function getListHocVienV2(lop,mon) {

               $.get( '/apps/hoc-vien/ajax-list-nhap-diem-v2/' + lop+'?mon='+mon)
                   .done(function(data, status) {
                       if(status == 'success'){
                           if(data.status !=1 ){
                               // co loi
                               console.log(data.errors);
                               var _msg_err = [];
                               $.each(data.errors,function (index,item) {
                                   _msg_err += '<br>' + item;
                               });
                               $('#dshv tbody').remove();
                               $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');

                           }
                           else{
                               $('#cs_msg span').remove();
                               appLop.dataHv = data.list;
                               var div = '<tbody><tr><th style="width: 10px">STT</th><th>Mã Học Viên</th><th>Họ đệm</th><th><button type="button" class="btn btn-link" id="btnSort">Tên</button></th><th>Ngày sinh</th><th>Nhập điểm</th></tr>';
                               // console.log(typeof arr);
                               appLop.div = div;
                               appLop.hvShow(data.list,div,0);
                               $('#dshv').append('<script>$("#btnSort").click(function(){appLop.hvShow(appLop.dataHv,appLop.div,1)});</script>');

                           }
                       }

                   })
                   .fail(function(err) {
                       console.log(err);
                       // alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });
           }

           /*
           Kết thúc nhập điểm
            */


       };



       appLop.run();
   }

   if(typeof appChuongTrinhDaoTao != 'undefined'){
       appChuongTrinhDaoTao = new Object();
       appChuongTrinhDaoTao.listKHDH = [];
       appChuongTrinhDaoTao.listKHNH = [];
       appChuongTrinhDaoTao._id_ct = 0;
       appChuongTrinhDaoTao.run = function () {
           $.get('/apps/khoa-hoc/ajax-list-kh')
               .done(function(data, status) {
                   // console.log(data);
                   if(status == 'success'){
                       if(data.status ==1){
                           appChuongTrinhDaoTao.listKHDH = data.list;
                       }
                   }
               })
               .fail(function(err) {
                   console.log(err);
                   // alert( "error" );
               });



           if ($('.ctdt-list-kh').length > 0)
               appChuongTrinhDaoTao.showListKH();
           if ($('.ctdt-list-mh').length > 0)
               appChuongTrinhDaoTao.showListMH();

           if ($('.ctdt-add-kh').length > 0)
               appChuongTrinhDaoTao.addKH();

       };
       appChuongTrinhDaoTao.addKH = function () {

           $('.ctdt-add-kh').click(function () {

               appChuongTrinhDaoTao._id_ct = $(this).attr('data-id');
               var _name = $(this).attr('data-name');

               var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';
               _strHtml += '<select id="kh_to_ct" multiple class="form-control select2"  style="margin-bottom: 10px; width: 400px;"><option value="">Chọn Module</option>';

               if(appChuongTrinhDaoTao.listKHDH.length >0){
                   $.each(appChuongTrinhDaoTao.listKHDH,function (index,item) {
                       _strHtml += '<option value="'+item.id+'">' + item.ten_khoa_hoc + '</option>';
                   });
               }

                console.log(_strHtml);
               _strHtml += '</select>';
               _strHtml += '<br><br><input type="button" class="btn btn-primary" id="ctdt_add_kh_btn_submit" value=" Save " />';

               $('#app-modal-dialog-title').html('Thêm Module cho Chương trình Đào tạo: <b>' + _name + '</b>'  );
               $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
               $('#app-modal-dialog-body').append(_strHtml);

               $('#app-modal-dialog').modal({
                   backdrop: 'static',
                   keyboard: false  // to prevent closing with Esc button (if you want this too)
               })
               $('#app-modal-dialog').modal('show');
               $('.select2').select2();
           });

           // phải dùng sự kiện .on vì cs_btn_submit là add thêm lúc runtime
           $('#app-modal-dialog').on('click','#ctdt_add_kh_btn_submit', function () {
               // cái này không được đặt trong sự kiện hiển thị dialog
               var kh_to_ct = $('#kh_to_ct').val();

               $.post( '/apps/chuong-trinh-dao-tao/add-kh/'+ appChuongTrinhDaoTao._id_ct,{_token: $('#_token').attr('content'),kh_to_ct:kh_to_ct})
                   .done(function(data, status) {
                       if(status == 'success'){
                           if(data.status !=1 ){
                               // co loi
                               console.log(data.errors);
                               var _msg_err = [];
                               $.each(data.errors,function (index,item) {
                                   _msg_err += '<br>' + item;
                               });

                               $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                           }
                           else{
                               $('#app-modal-body').html('');
                               $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');

                           }
                       }

                   })
                   .fail(function(err) {
                       console.log(err);
                       // alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });

           });
       };

       appChuongTrinhDaoTao.showListKH = function () {
           $('.ctdt-list-kh').click(function () {
               var _url = '/apps/khoa-hoc/ajax-list-kh-ctdt-'+$(this).attr('data-id');
               $.get( _url)
                   .done(function(data, status) {
                       if(status == 'success'){

                           $('#app-modal-dialog-title').html('Danh sách Module (Khóa học)');

                           if(data.status != 1){

                               $('#app-modal-dialog-body').html(data.errors.join('<br>'));
                               $('#app-modal-dialog').modal('show');
                               return;
                           }




                           var _html = '<table class="table table-bordered"><tr><th>Mã Khóa học</th><th>Tên khóa</th></tr>';

                           $.each(data.list,function (index,item) {
                               _html += '<tr><td>'+item.ma_khoa_hoc+'</td><td>'+item.ten_khoa_hoc+'</td></tr>';
                           });
                           _html += '</table>';

                           $('#app-modal-dialog-body').html(_html);
                           // $('#app-modal-dialog').modal({
                           //     backdrop: 'static',
                           //     keyboard: false  // to prevent closing with Esc button (if you want this too)
                           // });
                           $('#app-modal-dialog').modal('show');
                       }
                   })
                   .fail(function(err) {
                       console.log(err);
                       alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });
               return false;
           });

       };

       appChuongTrinhDaoTao.showListMH = function () {
           $('.ctdt-list-mh').click(function () {
               var _url = '/apps/khoa-hoc/ajax-list-mh-'+$(this).attr('data-id');
               var _name = $(this).attr('data-name');
               $.get( _url)
                   .done(function(data, status) {
                       if(status == 'success'){

                           $('#app-modal-dialog-title').html('Danh sách Môn học thuộc: ' + _name);

                           if(data.status != 'success'){

                               $('#app-modal-dialog-body').html(data.errors.join('<br>'));
                               $('#app-modal-dialog').modal('show');
                               return;
                           }


                           var _html = '<table class="table table-bordered"><tr><th>ID</th><th>Mã Môn học</th><th>Tên Môn học</th><th>Học kỳ</th></tr>';
                            if(data.list.length>0)
                           $.each(data.list,function (index,item) {
                               _html += '<tr><td>'+item.id_mh+'</td><td>'+item.ma_mh+'</td><td>'+item.ten_mh+'</td><td>'+item.hoc_ky+'</td></tr>';
                           });
                            else
                                _html +='Chưa thiết lập Môn học';
                           _html += '</table>';
                           console.log(_html);

                           $('#app-modal-dialog-body').html(_html);
                           // $('#app-modal-dialog').modal({
                           //     backdrop: 'static',
                           //     keyboard: false  // to prevent closing with Esc button (if you want this too)
                           // });
                           $('#app-modal-dialog').modal('show');
                       }
                   })
                   .fail(function(err) {
                       console.log(err);
                       alert( "error" );
                   })
                   .always(function() {
                       // console.log ("finished" );
                   });
               return false;
           });

       };

       appChuongTrinhDaoTao.run();
   }

   if(typeof appLichChamSoc != 'undefined'){
        appLichChamSoc = new Object();
        appLichChamSoc.run = function () {


        };

        appLichChamSoc.addCS = function () {
            // $('.btn-add-cs').click(function () {
            //
            //     $('#app-modal-dialog-title').html('Thêm Lịch chăm sóc');
            //     $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
            //     // $('#app-modal-dialog-body').append(_strHtml);
            //
            //     $('#app-modal-dialog').modal({
            //         backdrop: 'static',
            //         keyboard: false  // to prevent closing with Esc button (if you want this too)
            //     })
            //     $('#app-modal-dialog').modal('show');
            // });
        };
       appLichChamSoc.run();
   }
    if(typeof appQuanLyDaoTao != 'undefined'){
        appQuanLyDaoTao = new Object();
        appQuanLyDaoTao.danhgia = [];
        appQuanLyDaoTao.list_gv = [];
        appQuanLyDaoTao.run = function () {

            /*
            diem
             */
            if (typeof _id_lop_request2 != 'undefined') {
                if (_id_lop_request2 != ''){
                    getListMon(_id_lop_request2, _id_mh_request2);
                    getListHocVien(_id_lop_request2, _id_mh_request2);
                }
            }
            function getListMon(id_lop,id_mh) {
                $.get( '/apps/mon-hoc/ajax-list-by-lop-' + id_lop)
                    .done(function( data ) {
                        // console.log(data);
                        var _selected='';
                        var opt = '<option value=""> Chọn Môn học </option>';
                        $.each(data.listMH,function (index, item) {
                            // console.log(item);
                            _selected = item.id == id_mh?'selected':'';
                            // console.log(_selected+'=>');
                            opt += '<option '+_selected+' value="' + item.id + '" ';

                            // if(item.id == current_hk_huyen)
                            //     opt  += ' selected ';

                            opt +=  '>'+ item.ma_mh + '. '  + item.ten_mh + '</option>';

                        });

                        $('#mh').html(opt);

                    });
            }
            $('#btnDSDiemQuaTrinh').click(function () {
                var lop = $('#Lop').val();
                var mon = $('#mh').val();
                if(lop==''||mon==''||lop==null||mon==null){
                    alert('Vui lòng chọn đủ thông tin trước khi lấy danh sách nhập điểm');
                    return;
                }
                // console.log(lop+'=>'+mon);
                getListHocVien(lop,mon);

            });
            function getListHocVien(lop,mon) {
                $.get('/apps/quan-ly-dao-tao/ajax-get-list-hoc-vien/' + lop+'/'+mon)
                    .done(function(data, status) {
                        if(status == 'success'){
                            if(data.errors.length>0)
                              $('#cs_msg').html('<div class="alert alert-danger">'+data.errors.join('<br>')+'</div>');
                            else
                              $('#cs_msg').html('');

                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                              
                                $('#dshv tbody').remove();
                                
                                $('#btn-save-lh').hide();
                            }
                            else{
                                $('#cs_msg span').remove();
                                var i=0;
                                var div = '<tbody><tr><th style="width: 10px">STT</th><th style="width: 100px;">Mã Học Viên</th><th style="width: 200px;">Họ tên</th><th>Nhập điểm</th><th style="width: 100px;">Ngày sinh</th><th style="width: 150px;">Trạng thái</th></tr>';
                                var check = 1;
                                $.each(data.list,function (index,item) {
                                    if(item.locked_update_qt!=1)
                                        check=0;
                                    i++;
                                    div +='<tr><td>'+i+'</td>';
                                    div +='<td>'+item.mahv+'</td>';
                                    div +='<td>'+item.ho_dem + ' ' + item.ten+'</td>';
                                    const ns = item.ngay_sinh!=null?item.ngay_sinh.split('-').reverse().join('/'):'';
                                    // console.log(ns);
                                    var disabled = item.locked_update_qt==1?'disabled':'';
                                    div +='<td><input type="number" min="0" max="100" step="0.1" value="'+item.diem_qt+'" class="form-control" name="'+item.id_lmhv+'_diem" style="max-width:100px;" placeholder="Nhập điểm" '+disabled+'></td>';

                                    div +='<td>'+ns+'</td>';

                                    var __trangthai = '';
                                    $.each(data.trang_thai_hoc,function (_idex,itemTT) {
                                        if(_idex ==item.trang_thai_hoc)
                                        {
                                            __trangthai = itemTT;
                                            return;
                                        }
                                    });

                                    div +='<td>'+__trangthai+'</td>';

                                    div +='</tr>';

                                });
                                div +='</tbody>';
                                $('#dshv').html(div).show();
                                    if(check==0)
                                $('#btn-save-lh').show();
                                else
                                    $('#btn-save-lh').hide();
                            }
                        }

                    })
                    .fail(function(err) {
                        console.log(err);
                        // alert( "error" );
                    })
                    .always(function() {
                        // console.log ("finished" );
                    });
            }
            $('#btn-save-lh').click(function (e) {
               e.preventDefault();
               if(confirm('Điểm quá trình chỉ nhập 1 lần không thể sửa, nếu đã chắc chắn đã xem xét kỹ các trường hợp rồi ấn OK để tiếp tục?')){
                   $('#form_nhap_diem').submit();
               }
            });

            /*
            danh sach thi
             */
            if (typeof _id_lop_request3 != 'undefined') {
                if (_id_lop_request3 != ''){
                    getListMon(_id_lop_request3, _id_mh_request3);
                    getListThi(_id_lop_request3, _id_mh_request3);
                    $('#lan').val(_id_lan_request3).change();
                    if(_id_mh_request3!='')
                        $('#lan').prop('disabled',false);
                }
            }
            $('#btnDSThi').click(function () {
                var lop = $('#Lop').val();
                var mon = $('#mh').val();
                var lan = $('#lan').val();
                if(lop==''||mon==''||lop==null||mon==null||lan==''||lan==null){
                    alert('Vui lòng chọn đủ thông tin trước khi lấy danh sách thi');
                    return;
                }
                // console.log(lop+'=>'+mon);
                // getListThi(lop,mon);
                window.location.href="/apps/quan-ly-dao-tao/tao-danh-sach-thi?lop="+lop+'&mh='+mon+'&lan='+lan;
            });
            function getListThi(lop,mon) {
                $.get('/apps/quan-ly-dao-tao/ajax-get-list-hoc-vien/' + lop+'/'+mon)
                    .done(function(data, status) {
                        if(status == 'success'){
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<br>' + item;
                                });
                                $('#dshv tbody').remove();
                                $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                                $('#btn-save-lh').hide();
                            }
                            else{
                                var gv='';
                                var ngay_thi = '';
                                let phong_thi = '';
                                let cb_coi_thi = '';
                                const notShow = [2,3,6,7,8];
                                $('#cs_msg span').remove();
                                var i=0;
                                var div = '<tbody><tr><th style="width: 10px">STT</th><th style="width: 100px;">Mã Học Viên</th><th style="width: 200px;">Họ tên</th><th style="width: 100px;">Ngày sinh</th><th style="width: 150px;">Trạng thái</th><th><input type="checkbox" name="checkAll" id="hv_chk_all"> Có thi</th><th>Số Phách</th><th>Công thức tính</th><th>Ghi chú</th></tr>';
                                // var check = 1;
                                $.each(data.list,function (index,item) {
                                    // if(item.locked_update_qt!=1)
                                    //     check=0;
                                    // var _lan =
                                    console.log(item['phong_thi_lan_'+$('#lan').val()]);
                                    // console.log(item['id_gv_cham_lan_'+$('#lan').val()]);
                                    gv = $.isNumeric(item['id_gv_cham_lan_'+$('#lan').val()])?item['id_gv_cham_lan_'+$('#lan').val()]:gv;
                                    ngay_thi = item['ngay_thi_lan_'+$('#lan').val()]!=''&&item['ngay_thi_lan_'+$('#lan').val()]!=null?item['ngay_thi_lan_'+$('#lan').val()]:ngay_thi;
                                    phong_thi = item['phong_thi_lan_'+$('#lan').val()]!=''&&item['phong_thi_lan_'+$('#lan').val()]!=null?item['phong_thi_lan_'+$('#lan').val()]:phong_thi;
                                    cb_coi_thi = item['can_bo_coi_thi_lan_'+$('#lan').val()]!=''&&item['can_bo_coi_thi_lan_'+$('#lan').val()]!=null?item['can_bo_coi_thi_lan_'+$('#lan').val()]:cb_coi_thi;

// console.log(ngay_thi);
                                    i++;
                                    div +='<tr class="'+(notShow.includes(item.trang_thai_hoc)?'active':'')+'"><td>'+i+'</td>';
                                    div +='<td>'+item.mahv+'</td>';
                                    div +='<td>'+item.ho_dem + ' ' + item.ten+'</td>';
                                    const ns = item.ngay_sinh!=null?item.ngay_sinh.split('-').reverse().join('/'):'';
                                    div +='<td>'+ns+'</td>';

                                    var __trangthai = '';
                                    $.each(data.trang_thai_hoc,function (_idex,itemTT) {
                                        if(_idex ==item.trang_thai_hoc)
                                        {
                                            __trangthai = itemTT;
                                            return;
                                        }
                                    });

                                    div +='<td>'+__trangthai+'</td>';
                                    const cothi  = 'co_thi_lan_'+$('#lan').val();
                                    var checked = item[cothi]==1?'checked':'';
                                    div +='<td><input '+(notShow.includes(item.trang_thai_hoc)?'disabled':'')+' type="checkbox" name="chk_hv[]" value="'+item.id_lmhv+'" class="chk_hv" '+checked+'></td>';

                                    var _so_phach = item['so_phach_lan_'+$('#lan').val()];
                                    // console.log(_so_phach);
                                    if(_so_phach == null)
                                      _so_phach = '';
                                     div +='<td>'+_so_phach+'</td>';
                                    div +='<td><select name="'+item.id_lmhv+'_congthuc" class="form-control">';
                                    div += '<option value="1"'+(item.loai_cong_thuc == 1?'selected':'')+'>Theo mã học viên</option>';
                                    div += '<option value="2"'+(item.loai_cong_thuc == 2?'selected':'')+'>Công thức ngắn hạn</option>';
                                    div += '<option value="3"'+(item.loai_cong_thuc == 3?'selected':'')+'>Công thức dài hạn</option>';
                                    div += '</select></td>';

                                    div +='<td><textarea name="'+item.id_lmhv+'_ghichu" rows="1" class="form-control">'+(item.ghi_chu_thi==null?'':item.ghi_chu_thi)+'</textarea></td>';
                                    div +='</tr>';

                                });
                                div +='</tbody>';
                                $('#dshv').html(div).show();
                                const _date = ngay_thi!=''&&ngay_thi!=null?ngay_thi.split('-').reverse().join('/'):'';
                                $('#ngaythi').html('<span style="width:140px;display:inline-block">Ngày thi:</span> <input type="text" class="" style="max-width:168px;" name="ngaythi" placeholder="ngày thi: dd/mm/yyyy" id="_ngaythi" value="'+_date+'"/>');

                                $.get('/apps/ajax-get-list-giang-vien')
                                    .done(function (data) {
                                        if(data.status == 1){
                                            var _div = '<span style="width:140px;display:inline-block">Giảng viên chấm điểm:</span> <select name="gvcham" class="select2"><option value="">== Giảng viên chấm ==</option>';
                                            $.each(data.list,function (index,item) {
                                                var _select = item.id == gv?'selected':'';
                                                _div+='<option value="'+item.id+'" '+_select+'>'+item.ho_ten+'</option>';
                                            });
                                            _div += '</select>';
                                            $('#gvcham').html(_div).show();
                                            $('select[name=gvcham]').select2();
                                        }else{
                                            console.log(data.errors);
                                        }
                                    })
                                    .fail(function (err) {

                                    });
                                $('#phongthi').html('<span style="width:140px;display:inline-block">Phòng thi:</span> <input type="text" class="" style="max-width:168px;" name="phongthi" placeholder="" id="_phongthi" value="'+phong_thi+'"/>');
                                $('#canbocoithi').html('<span style="width:140px;display:inline-block">CB coi thi:</span> <input type="text" class="" style="max-width:168px;" name="canbocoithi" placeholder="" id="_canbocoithi" value="'+cb_coi_thi+'"/>');

                                // if(check==0)
                                    $('#btn-save-ds-thi').show();
                                // else
                                    // $('#btn-save-lh').hide();
                                if($('#hv_chk_all').length>0) {

                                    var $table = $('.table');
                                    var $tdCheckbox = $table.find('td input:checkbox');
                                    var $tdCheckboxChecked = [];
                                    // xử lý check
                                    $('#hv_chk_all').on('click', function () {
                                        $tdCheckbox.prop('checked', this.checked);

                                    });
                                    $tdCheckbox.on('change', function () {
                                        $tdCheckboxChecked = $table.find('tbody input:checkbox:checked');
                                        $('#hv_chk_all').prop('checked', ($tdCheckboxChecked.length == $tdCheckbox.length));
                                        // console.log($tdCheckboxChecked);
                                    });
                                }
                                $('#btn-save-ds-thi').click(function (e) {
                                    // if($('select[name=gvcham]').val()==''){
                                    //     alert('Chọn giảng viên chấm');
                                    //     return false;
                                    // }
                                    const patern = /^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/i;
                                    if(patern.test($('#_ngaythi').val())==false){
                                        alert('Ngày thi không hợp lệ! Định dạng dd/mm/yyyy');
                                        return false;
                                    }
                                    $('#form_nhap_diem').submit();
                                });
                            }
                        }

                    })
                    .fail(function(err) {
                        console.log(err);
                        // alert( "error" );
                    })
                    .always(function() {
                        // console.log ("finished" );
                    });
            }
            appQuanLyDaoTao.list_lop_mh = [];
            //lay danh sach lop mon cho nhap diem
            if (typeof _id_lan_request4 != 'undefined') {
                if (_id_lan_request4 != ''){
                    $('#lanthi').val(_id_lan_request4).change();
                    getListLopByLan(_id_lan_request4).then(function (value) {
                        appQuanLyDaoTao.list_lop_mh = value;
                        var _html = '<option value="">== Chọn lớp ==</option>';

                        $.each(value,function (index,item) {
                            let _selected = item.id_lop == _id_lop_request4?'selected':'';
                            _html += '<option value="'+item.id_lop+'" '+_selected+'>'+item.ma_lop+'</option>';
                        });
                        $('#lop').html(_html);
                    }).then(function (value) { getListMonNhap(_id_lop_request4) }).catch(function (reason) {
                        $('#show-mes').html(reason.join(''));
                    })


                }
            }
            $('#lanthi').change(function () {
                $('#show-mes').html('');
                $('#mon').html('<option value="">== Chọn môn ==</option>');
                $('#lop').html('<option value="">== Chọn lớp ==</option>');
                appQuanLyDaoTao.list_lop_mh = [];
                if($(this).val()!='') {
                    getListLopByLan($(this).val()).then(function (value) {
                        appQuanLyDaoTao.list_lop_mh = value;
                        var _html = '<option value="">== Chọn lớp ==</option>';
                        $.each(value,function (index,item) {
                            _html += '<option value="'+item.id_lop+'">'+item.ma_lop+'</option>';
                        });
                        $('#lop').html(_html);
                    }).catch(function (reason) {
                        $('#show-mes').html(reason.join(''));
                    })
                }
            });
            $('#lop').change(function () {
                $('#show-mes').html('');
                if($(this).val()!='') {
                    getListMonNhap($(this).val());
                }
            });
            function getListMonNhap(id_lop) {
                var arr = [];
                $.each(appQuanLyDaoTao.list_lop_mh,function (index,item) {
                    arr[index] = item;
                });
                // console.log($(this).val());
                // var id_lop = $(this).val()
                arr = arr.find(function (value) {
                    return  value.id_lop == id_lop;
                },id_lop).list_mh;
                var _html = '<option value="">== Chọn môn ==</option>';
                $.each(arr,function (index,item) {
                    let _selected = _id_mh_request4 == item.id_mh?'selected':'';
                    _html += '<option value="'+item.id_mh+'" '+_selected+'>'+item.ten_mh+'</option>';
                });
                $('#mon').html(_html);
            }
            function getListLopByLan(lan) {
                return new Promise(function(resolve, reject) {
                    $.get('/apps/quan-ly-dao-tao/ajax-get-lop-by-lan-thi/' + lan)
                        .done(function (data) {
                            if(data.status!=1){
                                data.errors = data.errors.map(function (value) {
                                    return '<div class="alert alert-danger">'+value+'</div>';
                                });
                                reject(data.errors);
                                // $('#show-mes').html(data.errors.join(''));
                            }else{
                                resolve(data.list);
                            }
                        })
                        .fail(function (err) {
                            console.log(err);
                        })
                });
            }
            // lấy danh sách môn học by lớp
            $('#lophoc').change(function(){
                // console.log('test');
                if($(this).val().length<1) {
                    $('#monhoc').html('');
                    return;
                }
                $.get('/apps/ajax-get-list-mon-hoc/'+$(this).val())
                    .done(function (data, status) {
                        if (status == 'success') {
                            $('#monhoc').html('<option value="">-- Chọn môn học --</option>');
                            $.each(data.list,function (index, item) {
                                // console.log(item);
                                $('#monhoc').append('<option value="'+item.id+'">'+item.ma_mh+'. '+item.ten_mh+'</option>');
                            });
                        }
                    })
                    .fail(function (err) {
                        console.log(err);
                        alert("error");
                    });
            });
            // lấy danh sách giảng viên by môn học và lớp
            $('#monhoc').change(function(){
                console.log('test');
                $.get('/apps/ajax-get-list-giang-vien/'+$(this).val()+'/'+$('#lophoc').val())
                    .done(function (data, status) {
                        if (status == 'success') {
                            $('#giangvien').html('<option value="">-- Chọn giảng viên --</option>');
                            $.each(data.list,function (index, item) {
                                // console.log(item);
                                $('#giangvien').append('<option value="'+item.id+'">'+item.ho_ten+'</option>');
                            });
                        }
                    })
                    .fail(function (err) {
                        console.log(err);
                        alert("error");
                    });
            });

//stop danh
            $('.btn-stop-time').click(function () {
                var res = confirm('Khi chọn dừng tất cả sinh viên của lớp này sẽ không thể đánh giá giảng viên này nữa!Bạn có muốn tiếp tục?');
                if(res) {
                    $.post('/apps/ajax-end-time', {
                        _token: _token,
                        id_giao_vien: $(this).attr('data-id-gv'),
                        id_lop: $(this).attr('data-id-lop'),
                        id_mon_hoc: $(this).attr('data-id-mon')
                    })
                        .done(function (data, status) {
                            console.log(data);
                            if (status == 'success') {
                                if (data.status != 1) {
                                    // co loi
                                    console.log(data.errors);
                                    var _msg_err = [];
                                    $.each(data.errors, function (index, item) {
                                        _msg_err += '<br>' + item;
                                    });

                                    $('#cs_msg').html('<span style="color:red">' + _msg_err + '</span>');
                                }
                                else {
                                    $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');
                                    setTimeout(function () {
                                        location.reload();
                                    }, 2000);
                                }
                            }

                        })
                        .fail(function (err) {
                            console.log(err);
                            // alert( "error" );
                        })
                        .always(function () {
                            // console.log ("finished" );
                        });
                }
            });
//xem danh gia
            $('.btn-view-dg').click(function(){
                var _id_gv = $(this).attr('data-id-gv');
                var _id_mh = $(this).attr('data-id-mon');
                var _id_lop = $(this).attr('data-id-lop');
                var _mahv = $(this).attr('data-mahv');
                $.get('/apps/ajax-view-danh-gia?id_gv='+_id_gv+'&id_mh='+_id_mh+'&id_lop='+_id_lop+'&mahv='+_mahv)
                    .done(function (data, status) {
                        // console.log(data);
                        if (status == 'success') {
                            $("#app-modal-dialog .modal-dialog").addClass("modal-lg");
                            $('#app-modal-dialog-title').html('Chi tiết đánh giá giảng viên: ' + data.giaovien + '<br/>ID tài khoản đánh giá: '+data.id_tk);
                            if (data.status != 1) {
                                // co loi
                                console.log(data.errors);
                                $('#app-modal-dialog-body').html(data.errors.join('<br>'));
                                $('#app-modal-dialog').modal('show');
                                var _msg_err = [];
                                $.each(data.errors, function (index, item) {
                                    _msg_err += '<br>' + item;
                                });

                                $('#cs_msg').html('<span style="color:red">' + _msg_err + '</span>');
                                return;
                            }
                            else {
                                // console.log(data.list);
                                appQuanLyDaoTao.danhgia = data.list;
                                if(Object.keys(data.list).length>0){
                                    var _html = '<table class="table table-bordered"><tr><th>Câu hỏi</th><th>Trả lời</th><th>Ghi chú</th></tr>';
                                    var ghichu = '';
                                    $.each(data.list,function (index,item) {
                                        ghichu = typeof item.ghichu !== 'undefined'?item.ghichu:'';
                                        _html +='<tr><td>'+index+'. '+item.cauhoi+'</td><td>'+item.dapan+'</td><td>Ghi chú:'+ghichu+'</td></tr>';
                                    });
                                    _html +='</table>';
                                    console.log(_html);
                                }
                                else{
                                    $('#cs_msg').html('<span style="color:red">Không có dữ liệu!</span>');
                                }

                                $('#app-modal-dialog-body').html(_html);
                                // $('#app-modal-dialog').modal({
                                //     backdrop: 'static',
                                //     keyboard: false  // to prevent closing with Esc button (if you want this too)
                                // });
                                $('#app-modal-dialog').modal('show');
                            }
                        }

                    })
                    .fail(function (err) {
                        console.log(err);
                        // alert( "error" );
                    })
                    .always(function () {
                        // console.log ("finished" );
                    });
            });
        };
        appQuanLyDaoTao.run();
    }

    if(typeof appHocPhi != 'undefined'){
        appHocPhi = new Object();
        appHocPhi.khoanthu = [];
        appHocPhi.chitiet = [];
        appHocPhi.id_phieu = 0;
        appHocPhi.run = function () {
            ////

            $.get('/apps/ajax-list-khoan-thu')
                .done(function (data, status) {
                    // console.log(data);
                    if (status == 'success') {
                        appHocPhi.khoanthu = data.list;
                        console.log(appHocPhi.khoanthu.length);
                    }
                })
                .fail(function (err) {
                    console.log(err);
                    alert("error");
                });
            $('.btnChiTiet').click(function () {
                appHocPhi.id_phieu = $(this).attr('data-id');
                var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';
                _strHtml += '<select id="khoan_thu" class="form-control col-sm-6 col-xs-6"  style="margin-bottom: 10px"><option value="">Chọn khoản thu</option>';

                if(appHocPhi.khoanthu.length>0){
                    console.log('test');
                    $.each(appHocPhi.khoanthu,function (index,item) {
                        _strHtml += '<option value="'+item.id+'">' + item.noi_dung + '</option>';
                    });
                }
                _strHtml += '</select>';
                _strHtml += '<br/><br/><input type="text" placeholder="Nhập số tiền" name="so_tien" id="so_tien" class="form-control"/>';
                _strHtml += '<br/><textarea name="ghi_chu" placeholder="Nhập ghi chú" id="ghi_chu" class="form-control"></textarea>';
                _strHtml += '<br><br><input type="button" class="btn btn-primary" id="btnAddChiTiet" value=" Save " />';

                $('#app-modal-dialog-title').html('Thêm học phí chi tiết');
                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                $('#app-modal-dialog-body').append(_strHtml);

                $('#app-modal-dialog').modal({
                    backdrop: 'static',
                    keyboard: false  // to prevent closing with Esc button (if you want this too)
                });
                $('#app-modal-dialog').modal('show');

            });

            // phải dùng sự kiện .on vì cs_btn_submit là add thêm lúc runtime
            $('#app-modal-dialog').on('click','#btnAddChiTiet', function () {

                var _id_khoan = $('#khoan_thu').val();
                var _so_tien = $('#so_tien').val();
                var _ghi_chu = $('#ghi_chu').val();
                if(_id_khoan == '' || _so_tien == ''){
                    alert('Vui lòng điền đầy đủ thông tin');
                    return;
                }
                $.post( '/apps/ajax-post-chi-tiet-hoc-phi',{_token: $('#_token').attr('content'),id_khoan_thu:_id_khoan,so_tien:_so_tien,id_phieu:appHocPhi.id_phieu,ghi_chu:_ghi_chu})
                    .done(function(data, status) {
                        if(status == 'success'){
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<br>' + item;
                                });

                                $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                            }
                            else{
                                $('#app-modal-dialog-body').html('<span style="color:blue">Đã lưu thành công!</span>');
                                // $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');

                            }
                        }

                    })
                    .fail(function(err) {
                        console.log(err);
                        // alert( "error" );
                    })
                    .always(function() {
                        // console.log ("finished" );
                    });

            });
            $('.btnDanhSach').click(function () {
                $('.modal-dialog').addClass('modal-lg');
                appHocPhi.id_phieu = $(this).attr('data-id');
                $.get('/apps/ajax-list-hoc-phi-chi-tiet/'+$(this).attr('data-id'))
                    .done(function (data, status) {
                        console.log(data);
                        if (status == 'success') {
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<br>' + item;
                                });
                                $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');

                                return;
                            }
                            else{
                                appHocPhi.chitiet = data.list;
                                var _strHtml = '<div class="box">';
                                // _strHtml += '';
                                if(appHocPhi.chitiet.length>0){
                                    _strHtml +='<table class="table table-bordered"><tr><th style="width: 10px">ID Khoản</th><th>Nội dung khoản</th><th>Số tiền</th><th>Ghi chú</th></tr>';
                                    // console.log('test');
                                    console.log(appHocPhi.chitiet);
                                    $('#cs_msg span').remove();
                                    $.each(appHocPhi.chitiet,function (index,item) {
                                        _strHtml += '<tr><td>'+item.id_khoan_thu+'</td><td>'+item.noi_dung+'</td><td>'+item.so_tien+'</td><td>'+item.ghi_chu+'</td></tr>';
                                    });
                                    _strHtml += '</table>';
                                }
                                $('#app-modal-dialog-title').html('Danh sách chi tiết học phí của phiếu: '+appHocPhi.id_phieu);
                                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                                $('#app-modal-dialog-body').append(_strHtml);

                                $('#app-modal-dialog').modal({
                                    backdrop: 'static',
                                    keyboard: false  // to prevent closing with Esc button (if you want this too)
                                });
                                $('#app-modal-dialog').modal('show');
                            }
                            // console.log(appHocPhi.khoanthu.length);
                        }
                    })
                    .fail(function (err) {
                        console.log(err);
                        alert("error");
                    });
            });

        };
        appHocPhi.run();
    }
    if(typeof appDoanhNghiep != 'undefined'){
        appDoanhNghiep = new Object();
        appDoanhNghiep.hocVien = [];
        appDoanhNghiep.chuyenNganh = [];
        appDoanhNghiep.id_doanh_nghiep = '';
        appDoanhNghiep.name = '';
        appDoanhNghiep.run = function () {
            ////

            $.get('/apps/ajax-list-nganh-hoc')
                .done(function (data, status) {
                    // console.log(data);
                    if (status == 'success') {
                        appDoanhNghiep.chuyenNganh = data.list;
                        // console.log(appHocPhi.chuyenNganh.length);
                    }
                })
                .fail(function (err) {
                    console.log(err);
                    alert("error");
                });
            $('.addHocVien').click(function () {
                appDoanhNghiep.id_doanh_nghiep = $(this).attr('data-id');
                var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';
                _strHtml += '<select id="mahv" class="form-control col-sm-6 col-xs-6 search_hv"  style="margin-bottom: 10px;width: 100%;"></select>';
                _strHtml += '<br/><br/><input type="text" placeholder="Nhập họ tên" name="ho_ten" id="ho_ten" class="form-control"/>';
                _strHtml += '<select id="nganh" class="form-control col-sm-6 col-xs-6"  style="margin-bottom: 10px;margin-top:10px;"><option value="">Chọn chuyên ngành</option>';

                if (appDoanhNghiep.chuyenNganh.length > 0) {
                    console.log('test');
                    $.each(appDoanhNghiep.chuyenNganh, function (index, item) {
                        _strHtml += '<option value="' + item.id + '">' + item.ten_nganh + '</option>';
                    });
                }
                _strHtml += '</select>';


                _strHtml += '<br/><input type="number" max="4" placeholder="Nhập năm ra trường itplus" name="nam_ra_truong" id="nam_ra_truong" class="form-control"/>';
                _strHtml += '<br/><input type="number" placeholder="Nhập mức lương" name="muc_luong" id="muc_luong" class="form-control"/>';
                _strHtml += '<br/><input type="text" placeholder="Nhập vị trí" name="vi_tri" id="vi_tri" class="form-control"/>';
                _strHtml += '<br><input type="button" class="btn btn-primary" id="btnAddHocVien" value=" Save " />';

                $('#app-modal-dialog-title').html('Thêm học viên');
                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                $('#app-modal-dialog-body').append(_strHtml);

                $('#app-modal-dialog').modal({
                    backdrop: 'static',
                    keyboard: false  // to prevent closing with Esc button (if you want this too)
                });
                $('.search_hv').select2();
                searchAjax();
                $('#app-modal-dialog').modal('show');

            });
            ///ajax select
            function searchAjax() {
                $(".search_hv").select2({
                    id: function(bond){ return bond.mahv; },
                    ajax: {
                        url: "/apps/ajax-get-ma-hoc-vien/",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                mahv: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {
                            // console.log(data);
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used

                            params.page = params.page || 1;
                            var select2data = $.map(data.list, function (obj) {
                                obj.id = obj.id || obj.mahv; // replace pk with your identifier
                                obj.text = obj.text || obj.mahv;
                                return obj;
                            });
                            return {
                                results: select2data,
                                pagination: {
                                    more: (params.page * 30) < select2data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    placeholder: 'Nhập mã học viên',
                    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                    minimumInputLength: 1,
                    templateResult: formatItem,
                    templateSelection: formatItemSelection
                });

                function formatItem (item) {
                    if (item.loading) {
                        return item.text;
                    }
                    // console.log(item);
                    var markup = "<div class='clearfix'>" +  item.mahv+ "</div>";
                    return markup;
                }

                function formatItemSelection (item) {
                    return item.mahv  || item.text;
                }
        };

            //end ajax
            // phải dùng sự kiện .on vì cs_btn_submit là add thêm lúc runtime
            $('#app-modal-dialog').on('click','#btnAddHocVien', function () {

                var _id_nganh_hoc = $('#nganh').val();
                var _ma_hoc_vien = $('#mahv').val();
                var _nam_ra_truong_itplus = $('#nam_ra_truong').val();
                var _muc_luong = $('#muc_luong').val();
                var _vi_tri = $('#vi_tri').val();
                var _ho_ten = $('#ho_ten').val();
                if(_id_nganh_hoc == '' || _nam_ra_truong_itplus == '' || _muc_luong == '' || _vi_tri == '' || _ho_ten ==''){
                    alert('Vui lòng điền đầy đủ thông tin');
                    return;
                }
                $.post( '/apps/ajax-post-hoc-vien-doanh-nghiep',{_token: $('#_token').attr('content'),mahv:_ma_hoc_vien,id_nganh_hoc:_id_nganh_hoc,nam_ra_truong_itplus:_nam_ra_truong_itplus,muc_luong:_muc_luong,vi_tri:_vi_tri,id_doanh_nghiep:appDoanhNghiep.id_doanh_nghiep,ho_ten:_ho_ten})
                    .done(function(data, status) {
                        if(status == 'success'){
                            console.log(data);
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<br>' + item;
                                });

                                $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                            }
                            else{
                                $('#app-modal-dialog-body').html('<span style="color:blue">Đã lưu thành công!</span>');
                                setTimeout(function () {
                                    location.reload();
                                },2000);
                                // $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');

                            }
                        }

                    })
                    .fail(function(err) {
                        console.log(err);
                        // alert( "error" );
                    })
                    .always(function() {
                        // console.log ("finished" );
                    });

            });
            $('.listHocVien').click(function () {
                appDoanhNghiep.name = $(this).attr('data-name');
                $('.modal-dialog').addClass('modal-lg');
                appDoanhNghiep.id_doanh_nghiep = $(this).attr('data-id');
                $.get('/apps/ajax-list-hoc-vien-doanh-nghiep/'+$(this).attr('data-id'))
                    .done(function (data, status) {
                        console.log(data);
                        if (status == 'success') {
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<li>' + item+ '</li>';
                                });
                                $('#cs_msg').html('<div class="callout callout-danger"><ul class="margin-bottom:0">'+_msg_err+'</ul></div>');

                                return;
                            }
                            else{
                                $('#cs_msg div').remove();
                                appDoanhNghiep.hocVien = data.list;
                                var _strHtml = '<div class="box">';
                                // _strHtml += '';
                                if(appDoanhNghiep.hocVien.length>0){
                                    _strHtml +='<table class="table table-bordered"><tr><th style="width: 10px">Mã học viên</th><th>Họ tên</th><th>Ngành học</th><th>Năm ra trường</th><th>Mức lương</th><th>Vị trí</th></tr>';
                                    // console.log('test');
                                    // console.log(appDoanhNghiep.hocVien);
                                    $('#cs_msg span').remove();
                                    $.each(appDoanhNghiep.hocVien,function (index,item) {
                                        _strHtml += '<tr><td>'+item.mahv+'</td><td>'+item.ho_ten+'</td><td>'+item.ten_nganh+'</td><td>'+item.nam_ra_truong_itplus+'</td><td>'+item.muc_luong+'</td><td>'+item.vi_tri+'</td></tr>';
                                    });
                                    _strHtml += '</table>';
                                }
                                $('#app-modal-dialog-title').html('Danh sách học viên của doanh nghiệp: '+appDoanhNghiep.name);
                                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                                $('#app-modal-dialog-body').append(_strHtml);

                                $('#app-modal-dialog').modal({
                                    backdrop: 'static',
                                    keyboard: false  // to prevent closing with Esc button (if you want this too)
                                });
                                $('#app-modal-dialog').modal('show');
                            }
                            // console.log(appHocPhi.khoanthu.length);
                        }
                    })
                    .fail(function (err) {
                        console.log(err);
                        alert("error");
                    });
            });
        };
        appDoanhNghiep.run();
    }



    if(typeof appHuongNghiep != 'undefined'){
        appHuongNghiep = new Object();
        appHuongNghiep.mahv = '';
        appHuongNghiep.lop = [];
       appHuongNghiep.note = [];
        appHuongNghiep.comment = [];
        appHuongNghiep.update = [];
        appHuongNghiep.idhvn = '';
        appHuongNghiep.tenhvn = '';
        appHuongNghiep.name = '';
        appHuongNghiep.run = function () {
            ////
            $('.btnComment').click(function () {
                appHuongNghiep.mahv = $(this).attr('data-id');
                appHuongNghiep.name = $(this).attr('data-name');
                var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';
                _strHtml += '<textarea rows="5" placeholder="Ghi chú" name="ghi_chu" id="ghi_chu" class="form-control"></textarea>';
                _strHtml += '<br><input type="button" class="btn btn-primary" id="btnAddNote" value=" Save " />';

                $('#app-modal-dialog-title').html('Thêm ghi chú học viên: '+appHuongNghiep.name);
                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                $('#app-modal-dialog-body').append(_strHtml);

                // $('#app-modal-dialog').modal({
                //     backdrop: 'static',
                //     keyboard: true  // to prevent closing with Esc button (if you want this too)
                // });
                $('#app-modal-dialog').modal('show');

            });
            // phải dùng sự kiện .on vì cs_btn_submit là add thêm lúc runtime
            $('#app-modal-dialog').on('click','#btnAddNote', function () {

                var _ghi_chu = $('#ghi_chu').val();
                if(_ghi_chu == ''){
                    alert('Vui lòng nhập ghi chú');
                    return;
                }
                $.post( '/apps/ajax-post-ghi-chu-hoc-vien',{_token: $('#_token').attr('content'),ma_hv:appHuongNghiep.mahv,noi_dung:_ghi_chu})
                    .done(function(data, status) {
                        if(status == 'success'){
                            console.log(data);
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<br>' + item;
                                });

                                $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                            }
                            else{
                                $('#app-modal-dialog-body').html('<span style="color:blue">Đã gửi thành công!</span>');
                                setTimeout(function () {
                                    location.reload();
                                },2000);
                                // $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');

                            }
                        }

                    })
                    .fail(function(err) {
                        console.log(err);
                        // alert( "error" );
                    })
                    .always(function() {
                        // console.log ("finished" );
                    });

            });

            $('.btnListClass').click(function () {
                appHuongNghiep.name = $(this).attr('data-name');
                // $('.modal-dialog').addClass('modal-lg');
                appHuongNghiep.mahv = $(this).attr('data-id');
                $.get('/apps/ajax-list-lop-hoc-vien/'+$(this).attr('data-id'))
                    .done(function (data, status) {
                        console.log(data);
                        if (status == 'success') {
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<li>' + item+ '</li>';
                                });
                                $('#cs_msg').html('<div class="callout callout-danger"><ul class="margin-bottom:0">'+_msg_err+'</ul></div>');

                                return;
                            }
                            else{
                                $('#cs_msg div').remove();
                                appHuongNghiep.lop = data.list;
                                var _strHtml = '<div class="box">';
                                // _strHtml += '';
                                if(appHuongNghiep.lop.length>0){
                                    _strHtml +='<table class="table table-bordered"><tr><th>Mã lớp</th><th>Tên lớp</th><th>Ngày bắt đầu học</th><th>Ngày kết thúc</th></tr>';
                                    // console.log('test');
                                    // console.log(appDoanhNghiep.hocVien);
                                    $('#cs_msg span').remove();
                                    $.each(appHuongNghiep.lop,function (index,item) {
                                        _strHtml += '<tr><td>'+item.ma_lop+'</td><td>'+item.ten_lop+'</td><td>'+item.ngay_bat_dau+'</td><td>'+item.ngay_ket_thuc+'</td></tr>';
                                    });
                                    _strHtml += '</table>';
                                }
                                $('#app-modal-dialog-title').html('Danh sách lớp của học viên: '+appHuongNghiep.mahv+ ' - ' + appHuongNghiep.name);
                                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                                $('#app-modal-dialog-body').append(_strHtml);

                                // $('#app-modal-dialog').modal({
                                //     backdrop: 'static',
                                //     keyboard: true  // to prevent closing with Esc button (if you want this too)
                                // });
                                $('#app-modal-dialog').modal('show');
                            }
                            // console.log(appHocPhi.khoanthu.length);
                        }
                    })
                    .fail(function (err) {
                        console.log(err);
                        // alert("error");
                    });
            });
            $('.btnListNote').click(function () {
                appHuongNghiep.name = $(this).attr('data-name');
                // $('.modal-dialog').addClass('modal-lg');
                appHuongNghiep.mahv = $(this).attr('data-id');
                $.get('/apps/ajax-list-comment-hoc-vien/'+$(this).attr('data-id'))
                    .done(function (data, status) {
                        console.log(data);
                        if (status == 'success') {
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<li>' + item+ '</li>';
                                });
                                $('#cs_msg').html('<div class="callout callout-danger"><ul class="margin-bottom:0">'+_msg_err+'</ul></div>');

                                return;
                            }
                            else{
                                $('#cs_msg div').remove();
                                appHuongNghiep.note = data.list;
                                var _strHtml = '<div class="box">';
                                // _strHtml += '';
                                if(appHuongNghiep.note.length>0){
                                    _strHtml +='<table class="table table-bordered"><tr><th>Ngày gửi</th><th>Người gửi</th><th>Nội dung</th><th>Action</th></tr>';
                                    // console.log('test');
                                    // console.log(appDoanhNghiep.hocVien);
                                    $('#cs_msg span').remove();
                                    $.each(appHuongNghiep.note,function (index,item) {
                                        _strHtml += '<tr><td>'+item.c_time+'</td><td>'+item.username+'</td><td>'+item.noi_dung+'</td><td class="text-center"><button class="btnDelete btn btn-link" data-id="'+item.id+'" ><i class="fa fa-trash text-danger"></i></button></td></tr>';
                                    });
                                    _strHtml += '</table>';
                                    _strHtml +="<script>$('.btnDelete').click(function(){if(confirm('Bạn có chắc chắn muốn xóa comment này?')){ var id = $(this).attr('data-id');$.get('/apps/ajax-delete-ghi-chu-hoc-vien/'+id) .done(function(data,status){if(status=='success'){if(data.status==0){var _msg_err = [];$.each(data.errors,function (index,item) {_msg_err += item;});alert(_msg_err);}else{alert('Xóa thành công!');location.reload();}}}) .fail(function(err){alert(err);})}});</script>";
                                }
                                $('#app-modal-dialog-title').html('Danh sách ghi chú: '+appHuongNghiep.mahv+ ' - ' + appHuongNghiep.name);
                                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                                $('#app-modal-dialog-body').append(_strHtml);

                                // $('#app-modal-dialog').modal({
                                //     backdrop: 'static',
                                //     keyboard: true  // to prevent closing with Esc button (if you want this too)
                                // });
                                $('#app-modal-dialog').modal('show');
                            }
                            // console.log(appHocPhi.khoanthu.length);
                        }
                    })
                    .fail(function (err) {
                        console.log(err);
                        // alert("error");
                    });
            });
            /*******************************
             *Phần học viên ngoài
             *******************************/
            $('.btnCommentHVN').click(function () {
                appHuongNghiep.idhvn = $(this).attr('data-id');
                appHuongNghiep.tenhvn = $(this).attr('data-name');
                var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';
                _strHtml += '<textarea rows="5" placeholder="Ghi chú" name="ghi_chu" id="ghi_chu" class="form-control"></textarea>';
                _strHtml += '<br><input type="button" class="btn btn-primary" id="btnAddNoteHVN" value=" Save " />';

                $('#app-modal-dialog-title').html('Thêm ghi chú học viên: '+appHuongNghiep.tenhvn);
                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                $('#app-modal-dialog-body').append(_strHtml);

                // $('#app-modal-dialog').modal({
                //     backdrop: 'static',
                //     keyboard: true  // to prevent closing with Esc button (if you want this too)
                // });
                $('#app-modal-dialog').modal('show');

            });
            // phải dùng sự kiện .on vì cs_btn_submit là add thêm lúc runtime
            $('#app-modal-dialog').on('click','#btnAddNoteHVN', function () {

                var _ghi_chu = $('#ghi_chu').val();
                if(_ghi_chu == ''){
                    alert('Vui lòng nhập ghi chú');
                    return;
                }
                $.post( '/apps/ajax-post-ghi-chu-hoc-vien-ngoai',{_token: $('#_token').attr('content'),id:appHuongNghiep.idhvn,noi_dung:_ghi_chu})
                    .done(function(data, status) {
                        if(status == 'success'){
                            console.log(data);
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<br>' + item;
                                });

                                $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                            }
                            else{
                                $('#app-modal-dialog-body').html('<span style="color:blue">Đã gửi thành công!</span>');
                                setTimeout(function () {
                                    location.reload();
                                },2000);
                                // $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');

                            }
                        }

                    })
                    .fail(function(err) {
                        console.log(err);
                        // alert( "error" );
                    })
                    .always(function() {
                        // console.log ("finished" );
                    });

            });
            $('.btnListComment').click(function () {
                appHuongNghiep.tenhvn = $(this).attr('data-name');
                // $('.modal-dialog').addClass('modal-lg');
                appHuongNghiep.idhvn = $(this).attr('data-id');
                $.get('/apps/ajax-list-comment-hoc-vien-ngoai/'+$(this).attr('data-id'))
                    .done(function (data, status) {
                        console.log(data);
                        if (status == 'success') {
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<li>' + item+ '</li>';
                                });
                                $('#cs_msg').html('<div class="callout callout-danger"><ul class="margin-bottom:0">'+_msg_err+'</ul></div>');

                                return;
                            }
                            else{
                                $('#cs_msg div').remove();
                                appHuongNghiep.comment = data.list;
                                var _strHtml = '<div class="box">';
                                // _strHtml += '';
                                if(appHuongNghiep.comment.length>0){
                                    _strHtml +='<table class="table table-bordered"><tr><th>User ID</th><th>Date Time</th><th>Content</th></tr>';
                                    // console.log('test');
                                    // console.log(appDoanhNghiep.hocVien);
                                    $('#cs_msg span').remove();
                                    $.each(appHuongNghiep.comment,function (index,item) {
                                        _strHtml += '<tr><td>'+item.user_id+'</td><td>'+item.time+'</td><td>'+item.content+'</td></tr>';
                                    });
                                    _strHtml += '</table>';
                                }
                                $('#app-modal-dialog-title').html('List comment: '+appHuongNghiep.idhvn+ ' - ' + appHuongNghiep.tenhvn);
                                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                                $('#app-modal-dialog-body').append(_strHtml);

                                // $('#app-modal-dialog').modal({
                                //     backdrop: 'static',
                                //     keyboard: true  // to prevent closing with Esc button (if you want this too)
                                // });
                                $('#app-modal-dialog').modal('show');
                            }
                            // console.log(appHocPhi.khoanthu.length);
                        }
                    })
                    .fail(function (err) {
                        console.log(err);
                        // alert("error");
                    });
            });
            $('.btnView').click(function () {
                appHuongNghiep.tenhvn = $(this).attr('data-name');
                // $('.modal-dialog').addClass('modal-lg');
                appHuongNghiep.idhvn = $(this).attr('data-id');
                $.get('/apps/ajax-list-update-hoc-vien/'+$(this).attr('data-id'))
                    .done(function (data, status) {
                        console.log(data);
                        if (status == 'success') {
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<li>' + item+ '</li>';
                                });
                                $('#cs_msg').html('<div class="callout callout-danger"><ul class="margin-bottom:0">'+_msg_err+'</ul></div>');

                                return;
                            }
                            else{
                                $('#cs_msg div').remove();
                                appHuongNghiep.update = data.list;
                                var _strHtml = '<div class="box">';
                                // _strHtml += '';
                                if(appHuongNghiep.update.length>0){
                                    _strHtml +='<table class="table table-bordered"><tr><th>Trạng thái việc làm</th><th>Thông tin công việc</th><th>Nhu cầu tìm việc</th><th>Ghi chú</th><th>Ngày gửi</th></tr>';
                                    // console.log('test');
                                    // console.log(appDoanhNghiep.hocVien);
                                    $('#cs_msg span').remove();
                                    $.each(appHuongNghiep.update,function (index,item) {
                                        var nhucau = item.nhu_cau_tim_viec == 0?'Không':'Có';
                                        var d = new Date(item.ngay_gui);
                                        var ngaygui = d.getDay()+'/'+d.getMonth()+'/'+d.getFullYear();
                                        _strHtml += '<tr><td>'+data.viec_lam[item.trang_thai_viec_lam]+'</td><td>'+item.thong_tin_cong_viec+'</td><td>'+nhucau+'</td><td>'+item.ghi_chu+'</td><td>'+ngaygui+'</td></tr>';
                                    });
                                    _strHtml += '</table>';
                                }
                                $('#app-modal-dialog-title').html('List update: '+appHuongNghiep.idhvn+ ' - ' + appHuongNghiep.tenhvn);
                                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                                $('#app-modal-dialog-body').append(_strHtml);

                                // $('#app-modal-dialog').modal({
                                //     backdrop: 'static',
                                //     keyboard: true  // to prevent closing with Esc button (if you want this too)
                                // });
                                $('#app-modal-dialog').modal('show');
                            }
                            // console.log(appHocPhi.khoanthu.length);
                        }
                    })
                    .fail(function (err) {
                        console.log(err);
                        // alert("error");
                    });
            });
            $('.btnUpdateV').click(function () {
                appHuongNghiep.idhvn = $(this).attr('data-id');
                $.post( '/apps/ajax-update-trang-thai-hoc-vien/'+appHuongNghiep.idhvn,
                  {_token: $('input[name="_token"]').val(),
                  ttvl:$('#trang_thai_viec_lam_'+ appHuongNghiep.idhvn).val()})
                    .done(function(data, status) {
                        if(status == 'success'){
                            console.log(data);
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<br>' + item;
                                });

                                $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                            }
                            else{
                                alert('Cập nhật thành công!');
                                // setTimeout(function () {
                                    location.reload();
                                // },2000);
                                // $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');

                            }
                        }

                    })
                    .fail(function(err) {
                        console.log(err);
                        // alert( "error" );
                    })
                    .always(function() {
                        // console.log ("finished" );
                    });
            });

            if($('.btnUpdateTrangthaiCapNhat').length >0)
            $('.btnUpdateTrangthaiCapNhat').click(function () {
                var _mhv_cap_nhat  = $(this).attr('data-id');

                $.post( '/apps/ajax-update-trangthai-capnhat/'+_mhv_cap_nhat,
                    {_token: $('input[name="_token"]').val(),
                        ttupdate:$('#update_trangthai_capnhat_'+ _mhv_cap_nhat).val()})
                    .done(function(data, status) {
                        if(status == 'success'){
                            console.log(data);
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<br>' + item;
                                });

                                $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                            }
                            else{
                                alert('Cập nhật thành công!');
                                // setTimeout(function () {
                                location.reload();
                                // },2000);
                                // $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');

                            }
                        }

                    })
                    .fail(function(err) {
                        console.log(err);
                        // alert( "error" );
                    })
                    .always(function() {
                        // console.log ("finished" );
                    });
            });


        };
        appHuongNghiep.run();
    }
 



  /***********************
     * Phần đồ án
     ***********************/
       // if(typeof appDoAn != 'undefined')
       if($('.appDoAn').length>0)
       {

           appDoAn = new Object();
           appDoAn.id_do_an = '';
           appDoAn.id_lop = '';
           appDoAn.id_nhom = '';
           appDoAn.hocVien = [];
           appDoAn.trangthai = [];
           appDoAn.info = [];
           appDoAn.setLanThi = function(id){
               let input = '';
               while(input !== null && (input < 1 || input > 4)) {
                   input = prompt('Nhập lần thi(0 < lần thi < 5)');
               }
               if(input === null)
                   return;
               document.getElementById("lan_"+id).value = input;
           };
           appDoAn.run = function () {
             ////


            /*appDoAn.hocvien = [];
            $('.addGroup').click(function () {
                appDoAn.id_do_an = $(this).attr('data-id');

                appDoAn.id_lop = $(this).attr('data-lop');
                $.get('/apps/ajax-get-hoc-vien-group/'+appDoAn.id_lop)
                    .done(function (data, status) {
                        // console.log(data);
                        if (status == 'success') {
                            appDoAn.hocvien = data.list;
                            console.log(appDoAn.hocvien);
                            // console.log(appHocPhi.chuyenNganh.length);
                        }
                    })
                    .fail(function (err) {
                        console.log(err);
                        alert("error");
                    });

                var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';
                _strHtml += '<input type="hidden" name="id_do_an" id="id_do_an"/>';
                _strHtml += '<input type="hidden" name="id_lop" id="id_lop"/>';
                _strHtml += '<div class="form-group"><input type="text" class="form-control col-sm-6 col-xs-6" name="ten_nhom" id="ten_nhom" placeholder="Tên nhóm..."/></div>';
                _strHtml += '<div class="form-group"><input type="text" class="form-control col-sm-6 col-xs-6" name="ten_de_tai" id="ten_de_tai" placeholder="Tên đề tài..."/></div>';
                _strHtml += '<div class="form-group"><select name="hoc_vien[]" id="hoc_vien" style="width: 100%" class="form-control select2 col-sm-6 col-xs-6" multiple="multiple" data-placeholder="Chọn học viên">';
                if (appDoAn.hocvien.length > 0) {
                    $.each(appDoAn.hocvien, function (index, item) {
                        _strHtml += '<option value="' + item.mahv + '">' + item.mahv +' - '+item.ho_dem+' '+item.ten+ '</option>';
                    });
                }
                _strHtml += '</select></div><script>$(\'.select2\').select2();</script>';

                _strHtml += '<br><input type="button" class="btn btn-primary" id="btnAddGroup" value=" Save " />';
                $('#app-modal-dialog-title').html('Thêm nhóm đồ án');
                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                $('#app-modal-dialog-body').append(_strHtml);

                $('#app-modal-dialog').modal({
                    backdrop: 'static',
                    keyboard: false  // to prevent closing with Esc button (if you want this too)
                });
                $('#app-modal-dialog').modal('show');

            });
            // phải dùng sự kiện .on vì cs_btn_submit là add thêm lúc runtime
            $('#app-modal-dialog').on('click','#btnAddGroup', function () {

                var id_do_an = $('#id_do_an').val();
                var id_lop = $('#id_lop').val();
                var ten_nhom = $('#ten_nhom').val();
                var ten_de_tai = $('#ten_de_tai').val();
                var hoc_vien = $('#hoc_vien').val();
                if(id_do_an == '' || id_lop == '' || ten_nhom == '' || ten_de_tai == '' || hoc_vien ==''){
                    alert('Vui lòng điền đầy đủ thông tin');
                    return;
                }
                $.post( '/apps/ajax-post-hoc-vien-doanh-nghiep',{_token: $('#_token').attr('content'),mahv:_ma_hoc_vien,id_nganh_hoc:_id_nganh_hoc,nam_ra_truong_itplus:_nam_ra_truong_itplus,muc_luong:_muc_luong,vi_tri:_vi_tri,id_doanh_nghiep:appDoAn.id_doanh_nghiep,ho_ten:_ho_ten})
                    .done(function(data, status) {
                        if(status == 'success'){
                            console.log(data);
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<br>' + item;
                                });

                                $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                            }
                            else{
                                $('#app-modal-dialog-body').html('<span style="color:blue">Đã lưu thành công!</span>');
                                setTimeout(function () {
                                    location.reload();
                                },2000);
                                // $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');

                            }
                        }

                    })
                    .fail(function(err) {
                        console.log(err);
                        // alert( "error" );
                    })
                    .always(function() {
                        // console.log ("finished" );
                    });

            });
            */
               // $('.chktonglai').on('ifClicked', function(){
               //     let id = $(this).attr('data-id');
               //     if(document.getElementById("chktonglai_"+id).checked === false){
               //         let input = '';
               //         while(input !== null && (input < 1 || input > 4)) {
               //             input = prompt('Nhập lần thi(0 < lần thi < 5)');
               //         }
               //         if(input === null)
               //         {
               //             console.log('uncheck');
               //             $(this).iCheck('uncheck');
               //             return;
               //         }
               //         document.getElementById("lan_"+id).value = input;
               //     }
               //     else
               //         document.getElementById("lan_"+id).value = 0;
               // });
               $('.btnTong').click(function () {
                   appDoAn.setLanThi($(this).data('id'));
                   var classs = 'hv_' + $(this).data('id');
                   var arr = [];
                   // var tonglai = document.getElementById("chktonglai_"+$(this).attr('data-id')).checked;
                   var lanthi = document.getElementById("lan_"+$(this).attr('data-id')).value;

                   $('input[type=checkbox].' + classs + ':checked').each(function (index, value) {
                       if (value.name.substr(0, 2) == 'hv') {
                           arr.push(value.name.substr(3));
                       }
                   });
                   if(arr.length<=0){
                       alert('Chọn học viên trước');
                       return false;
                   }
                   if(confirm('Chú ý: Khi đã tổng điểm thì sẽ không thể sửa được hệ số cá nhân hay điểm quá trình của học viên nữa. Tiếp tục?')){
                       var token = $('meta[name=_token]').attr('content');
                       $.post('/apps/ajax-tong-diem', {_token: token, list: arr, lanthi: lanthi})
                           .done(function (data, status) {
                               if (status == 'success') {
                                   console.log(data);
                                   if (data.status == 1) {
                                       // co loi
                                       var _msg_err = '';
                                       if(data.errors.length>0){
                                           $.each(data.errors, function (index, item) {
                                               _msg_err += item + '<br>';
                                           })
                                       }
                                       var _msg_suc = '';
                                       if(data.success.length>0){
                                           $.each(data.success, function (index, item) {
                                               _msg_suc += item + '<br>';
                                           })
                                       }

                                       $('#cs_msg').html('<span style="color:red">' + _msg_err + '</span><span style="color:green">' + _msg_suc + '</span>');
                                   }
                               }
                           })
                           .fail(function (err) {
                               console.log(err);
                           })
                   }
               });
            $('.dshv').click(function () {
                appDoAn.name = $(this).attr('data-name');
                $('.modal-dialog').addClass('modal-lg');
                appDoAn.id_nhom = $(this).attr('data-id');
                $.get('/apps/ajax-get-list-hoc-vien-in-group/'+$(this).attr('data-id'))
                    .done(function (data, status) {
                        console.log(data);
                        if (status == 'success') {
                            if(data.status !=1 ){
                                // co loi
                                console.log(data.errors);
                                var _msg_err = [];
                                $.each(data.errors,function (index,item) {
                                    _msg_err += '<li>' + item+ '</li>';
                                });
                                $('#cs_msg').html('<div class="callout callout-danger"><ul style="margin-bottom:0">'+_msg_err+'</ul></div>');

                                return;
                            }
                            else{
                                $('#cs_msg div').remove();
                                appDoAn.hocVien = data.list;
                                var _strHtml = '<div class="box">';
                                // _strHtml += '';
                                if(appDoAn.hocVien.length>0){
                                    _strHtml +='<table class="table table-bordered"><tr><th>ID</th><th style="width: 10px">Mã học viên</th><th>Họ tên</th><th>Hệ số cá nhân</th><th>Điểm</th><th>Trạng thái</th></tr>';
                                    // console.log('test');
                                    // console.log(appDoAn.hocVien);
                                    $('#cs_msg span').remove();
                                    $.each(appDoAn.hocVien,function (index,item) {
                                        var diem = item.diem==null?'':+item.diem;
                                        var heso = item.he_so_ca_nhan==null?'':item.he_so_ca_nhan;
                                        _strHtml += '<tr><td>'+item.id+'</td><td>'+item.mahv+'</td><td>'+item.ho_dem+' '+item.ten+'</td><td class="heso">'+heso+'</td><td>'+diem+'</td><td>'+data.trang_thai[item.trang_thai]+'</td></tr>';
                                    });
                                    _strHtml += '</table>';
                                }
                                $('#app-modal-dialog-title').html('Danh sách học viên nhóm: '+appDoAn.name);
                                $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                                $('#app-modal-dialog-body').append(_strHtml);

                                $('#app-modal-dialog').modal({
                                    // backdrop: 'static',
                                    keyboard: false  // to prevent closing with Esc button (if you want this too)
                                });
                                $('#app-modal-dialog').modal('show');
                            }
                            // console.log(appHocPhi.khoanthu.length);
                        }
                    })
                    .fail(function (err) {
                        console.log(err);
                        alert("error");
                    });

            });

               $('.nhapheso').click(function () {
                   // appDoAn.masv = $(this).attr('data-name');
                   $('.modal-dialog').addClass('modal-lg');
                   appDoAn.id_nhom = $(this).attr('data-id');
                   $.get('/apps/ajax-get-list-hoc-vien-do-an/'+$(this).attr('data-id'))
                       .done(function (data, status) {
                           console.log(data);
                           if (status == 'success') {
                               if(data.status !=1 ){
                                   // co loi
                                   console.log(data.errors);
                                   var _msg_err = [];
                                   $.each(data.errors,function (index,item) {
                                       _msg_err += '<li>' + item+ '</li>';
                                   });
                                   $('#cs_msg').html('<div class="callout callout-danger"><ul style="margin-bottom:0">'+_msg_err+'</ul></div>');

                                   return;
                               }
                               else{
                                   $('#cs_msg div').remove();
                                   appDoAn.hocVien = data.list;
                                   appDoAn.trangthai = data.trangthai;
                                   appDoAn.info = data.info;
                                   var _strHtml = '<div class="box"><div id="cs_msg"></div><div class="nav-tabs-custom"><ul class="nav nav-tabs"><li class="active"><a href="#tab_tt" data-toggle="tab">Trạng thái</a></li><li><a href="#tab_hs" data-toggle="tab">Hệ số cá nhân</a></li><li><a href="#tab_dqt" data-toggle="tab">Điểm quá trình(Dài hạn)</a></li><li class="pull-right header"><i class="fa fa-refresh"></i> Cập nhật trạng thái bảo vệ của học viên</li></ul><div class="tab-content"><div class="tab-pane active" id="tab_tt"><div class="container-fluid">';
                                   // _strHtml += '';
                                   if(appDoAn.hocVien.length>0){
                                       _strHtml +='<form action="" method="post" name="form1" id="form1"><input type="hidden" name="_token" value="'+$('meta[name=_token]').attr('content')+'"/><input type="hidden" name="case" value="1"><table class="table table-bordered"><tr><th style="width: 10px">#ID</th><th>Mã học viên</th><th>Họ tên</th><th>Trạng thái</th><th>Đủ đk bảo vệ</th></tr>';
                                       // console.log('test');
                                       // console.log(appDoAn.hocVien);
                                       $('#cs_msg span').remove();
                                       $.each(appDoAn.hocVien,function (index,item) {
                                           _strHtml += '<tr><td>'+item.id+'</td><td>'+item.mahv+'</td><td>'+item.ho_dem+' '+item.ten+'</td><td><select name="trang_thai_'+item.id+'" class="form-control" id="">';
                                           $.each(appDoAn.trangthai,function(k,v){
                                               var selected = item.trang_thai == k?'selected':'';
                                           _strHtml += '<option '+selected+' value="'+k+'">'+v+'</option>';
                                           });
                                           _strHtml +='</select></td>';
                                           _strHtml +=`
                                           <td>
                                           <select name="du_dk_bv_${item.id}" class="form-control" id="">
                                           <option value="">Chọn trạng thái</option>
                                            <option value="0">Không đủ điều kiện</option>
                                            <option value="1">Đủ điều kiện</option>
                                           </select>
                                           </td>
                                           `;
                                           _strHtml += '</tr>';
                                       });
                                       _strHtml += '</table><button class="btn btn-primary updateBtn" data-f="form1" id="" data-id="'+appDoAn.id_nhom+'">Cập nhật</button></form></div></div><!-- /.tab-pane --><div class="tab-pane" id="tab_hs"><div class="container-fluid"><form action="" method="post" name="form2" id="form2"><input type="hidden" name="_token" value="'+$('meta[name=_token]').attr('content')+'"/><input type="hidden" name="case" value="2"><table class="table table-bordered"><tr><th style="width: 10px">#ID</th><th>Mã học viên</th><th>Họ tên</th><th>Hệ số cá nhân</th></tr>';
                                       $.each(appDoAn.hocVien,function (index,item) {
                                           var disabled = '';
                                           if(item.locked == 1)
                                               disabled = 'disabled';
                                           _strHtml += '<tr><td>'+item.id+'</td><td>'+item.mahv+'</td><td>'+item.ho_dem+' '+item.ten+'</td>';
                                           _strHtml += '<td><input type="number" step="0.01" min="0" max="1" value="'+item.he_so_ca_nhan+'" class="form-control" name="heso_'+item.id+'" '+disabled+'></td>';
                                           _strHtml +='</tr>';
                                       });
                                       _strHtml += '</table><button class="btn btn-primary updateBtn" data-f="form2" id="" data-id="'+appDoAn.id_nhom+'">Cập nhật</button></form></div></div><div class="tab-pane" id="tab_dqt"><div class="container-fluid"><form action="" method="post" name="form3" id="form3"><input type="hidden" name="_token" value="'+$('meta[name=_token]').attr('content')+'"/><input type="hidden" name="case" value="3"><table class="table table-bordered"><tr><th style="width: 10px">#ID</th><th>Mã học viên</th><th>Họ tên</th><th>Điểm quá trình</th></tr>';
                                       $.each(appDoAn.hocVien,function (index,item) {
                                           var disabled = '';
                                           if(item.locked == 1||item.mahv.substr(0,1)=='N')
                                               disabled = 'disabled';
                                           _strHtml += '<tr><td>'+item.id+'</td><td>'+item.mahv+'</td><td>'+item.ho_dem+' '+item.ten+'</td>';
                                           _strHtml += '<td><input type="number" min="0" max="100" value="'+item.diem_qt+'" class="form-control" name="diemqt_'+item.id+'" '+disabled+'></td>';
                                           _strHtml +='</tr>';
                                       });
                                       _strHtml += '</table><button class="btn btn-primary updateBtn" data-f="form3" id="" data-id="'+appDoAn.id_nhom+'">Cập nhật</button></form></div></div></div></div>';
                                   }
                                   $('#app-modal-dialog-title').html('Danh sách học viên nhóm: '+appDoAn.info.ten_nhom+' - '+appDoAn.info.ma_lop);
                                   $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                                   $('#app-modal-dialog-body').append(_strHtml);

                                   $('#app-modal-dialog').modal({
                                       // backdrop: 'static',
                                       keyboard: false  // to prevent closing with Esc button (if you want this too)
                                   });
                                   $('#app-modal-dialog').modal('show');
                               }
                               // console.log(appHocPhi.khoanthu.length);
                           }
                       })
                       .fail(function (err) {
                           console.log(err);
                           alert("error");
                       });

               });
               $('#app-modal-dialog').on('click','.updateBtn',function(e){
                   e.preventDefault();
                   var all = '';
                   if($(this).attr('data-f')=='form1')
                       all = $('#form1').serialize();
                   else if($(this).attr('data-f')=='form2')
                       all = $('#form2').serialize();
                   else
                       all = $('#form3').serialize();
                   // console.log(all);return;
                   $.post('/apps/ajax-update-list-hs-hoc-vien-do-an/'+$(this).attr('data-id'),all)
                       .done(function (data,status) {
                           if(status == 'success'){
                               console.log(data);
                               if(data.status !=1 ){
                                   // co loi
                                   console.log(data.errors);
                                   var _msg_err = [];
                                   $.each(data.errors,function (index,item) {
                                       _msg_err +=   item+'<br>';
                                   });

                                   $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                               }
                               else{
                                   var _msg_success = '';
                                   if(data.success.length>0){
                                       $.each(data.success,function (index,item) {
                                           _msg_success +=   item+'<br>';
                                       });
                                   }
                                   console.log(_msg_success);
                                   var _msg_warning = '';
                                   if(data.warnings.length>0){
                                       $.each(data.warnings,function (index,item) {
                                           _msg_warning += item+'<br>';
                                       });
                                   }
                                   var html = '';
                                    if(_msg_success.length>0)
                                        html +='<span style="color:green">'+_msg_success+'</span>';
                                    if(_msg_warning.length>0)
                                        html +='<span style="color:orange">'+_msg_warning+'</span>';


                                   $('#cs_msg').html(html);

                               }
                           }
                       })
                       .fail(function (err) {
                           console.log(err);
                       })
               });



               //add new







               // $('#app-modal-dialog').on('click','.editHocVien',function () {
               //     $('.heso').append(function (e) {
               //        var text = $(this).text();
               //        var id = $(this).closest('tr').find('td:first').text();
               //        // console.log(id);
               //         $(this).text('');
               //         $("<input type='text' name='"+id+"' value='"+text.trim()+"'>").appendTo(this).focus();
               //         // $('#app-modal-dialog').on('click','btnUpdate',function () {
               //         $("#btnUpdate").click(function () {
               //              $('#form_edit input').each(
               //                  function(index){
               //                      var input = $(this);
               //                      // console.log(input);
               //                      var name = input.attr('name');
               //                      var value = '';
               //                      console.log(name);
               //                  }
               //              );
               //          });
               //     });

               // });



        };
        appDoAn.run();
    }
    
    
    
    /** attach **/
    var appAttachment = new Object();
    appAttachment.attachment = [];
    appAttachment.__t ='';
    appAttachment.__id = '';
    appAttachment.deleteFile = function(_url){
        $.post(_url,
            {_token: $('meta[name="_token"]').attr('content')}
        )
            .done(function(data, status) {
                // console.log(data);
                if(status == 'success'){
                    appAttachment.getDataAttach(appAttachment.__t,appAttachment.__id);
                }
            })
            .fail(function(err) {
                console.log(err);
            });
    };

    appAttachment.getDataAttach = function (__t, __id) {
        var _u = '/apps/ajax-get-attachment/'+__t + '-' + __id;
        $.get(_u)
            .done(function(data, status) {
                // console.log(data);
                if(status == 'success'){
                    var div = '<table class="table table-bordered"><tr><th>STT</th><th>Tên file</th><th>Size</th><th>Created time</th><th>User create</th><th>Action</th></tr>';
                    var i=0;
                    $.each(data.list,function (index,item) {
                        i++;

                        div +='<tr><td>'+i+'</td><td>'+
                            '<a target="_blank" href="/apps/download-attachment/'+__t+'-'+__id+'-'+item.file_sum+'">' + item.base_name + '</a>'+
                            '</td><td>'+item.file_size+'</td><td>'+item.c_time+'</td><td>'+item.c_id+'</td><td>' +
                            '<a target="_blank" href="/apps/delete-attachment/'+__t+'-'+__id+'-'+item.file_sum+'" class="link-delete"> Delete</a>'+
                            '</td></tr>';
                    });
                    div +='</table>';
                    $('#data_attach').html(div);
                }
            })
            .fail(function(err) {
                console.log(err);
                // alert( "error" );
            });
    }
    appAttachment.run = function(){
        $('.attachment').click(function () {

            appAttachment.__id = $(this).attr('data-id');
            appAttachment.__t = $(this).attr('t');
            // var __url = '/apps/attachment/' + __t +'-' +appAttachment.__id;
            appAttachment.getDataAttach( appAttachment.__t ,appAttachment.__id);
            $('#app-modal-dialog-title').html('<b><i class="fa fa-cloud-upload"></i> Đính kèm files</b>');
            var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';

            _strHtml +=' <form method="post"><input type="hidden" name="_token" value="'+$('input[name="_token"]').attr('value')+'"/>' +
                '                    <input id="fileupload" style="float:left" type="file" name="file_uploads[]" data-url="/apps/attachment/'+ appAttachment.__t +'-'+appAttachment.__id+'" multiple>\n' +
                '<p id="loading" style="clear:both;"></p></form><div id="data_attach"></div>';
            $('#app-modal-dialog-body').html(_strHtml);
            $('#app-modal-dialog').modal({
                // backdrop: 'static',
                keyboard: false  // to prevent closing with Esc button (if you want this too)
            });
            $('#app-modal-dialog').modal('show');

        });
        $('#app-modal-dialog').on('click','#fileupload',function(){
            'use strict';


            // Change this to the location of your server-side upload handler:
            var __url = '/apps/attachment/' + appAttachment.__t +'-' +appAttachment.__id;
            $('#loading').text('');
            $('#fileupload').fileupload({
                dataType: 'json',
                add: function (e, data) {
                    $('#loading').append('Upload: ' + data.files[0].name + "<br>");
                    data.submit();
                    console.log('Upload: ' + data.files[0].name);
                },
                done: function (e, data) {
                    // console.log(data);
                    if(data.result.errors.length>0){
                        alert('loi');
                        var str_err = '<ul>';
                        $.each(data.result.errors, function (index, err) {
                            str_err += '<li>'.err+'</li>';
                        });
                        str_err +='</ul>';
                        $('#cs_msg').addClass('alert alert-danger');
                        $('#cs_msg').html(str_err);
                    }
                    else{
                        $('#cs_msg').removeClass('alert alert-danger');
                        $('#cs_msg ul').remove();
                        $.each(data.result.files, function (index, file) {
                            $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list'));
                            if ($('#file_ids').val() != '') {
                                $('#file_ids').val($('#file_ids').val() + ',');
                            }
                            // $('#file_ids').val($('#file_ids').val() + file.fileID);//sau gán id file
                        });
                        // loadData();
                        // appLop.currentIdEdit(appLop.currentIdEdit);
                        appAttachment.getDataAttach( appAttachment.__t ,appAttachment.__id);
                    }
                    $('#loading').text('');
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                    );
                }
            });
        });

        $('#app-modal-dialog').on('click','.link-delete',function(){
            if(confirm("Xác nhận xóa file?")){
                var link = $(this).attr('href');
                appAttachment.deleteFile(link);
            }

            return false;
        });

    };
    if($('.attachment').length>0)
    appAttachment.run();
    


});





/*
bao cao tuan
 */
if($('.appBaoCaoTuan').length>0)
{

    appBaoCaoTuan = new Object();
    appBaoCaoTuan.list_user = [];
    appBaoCaoTuan.data = [];
    appBaoCaoTuan.run = function () {

        $('#nhan_bc').click(function (e) {
            e.preventDefault();
            // $('.modal-dialog').addClass('modal-lg');
            $.get('/apps/ajax-get-list-user')
                .done(function (data, status) {
                    console.log(data);
                    if (status == 'success') {
                        if(data.status !=1 ){
                            // co loi
                            console.log(data.errors);
                            var _msg_err = [];
                            $.each(data.errors,function (index,item) {
                                _msg_err += '<li>' + item+ '</li>';
                            });
                            $('#cs_msg').html('<div class="callout callout-danger"><ul style="margin-bottom:0">'+_msg_err+'</ul></div>');

                            return;
                        }
                        else{
                            $('#cs_msg div').remove();
                            appBaoCaoTuan.list_user = data.list;
                            appBaoCaoTuan.data = data.data.map(function (value) { return parseInt(value); });
                            var _strHtml = '<div class="box">';
                            // _strHtml += '';
                            if(appBaoCaoTuan.list_user.length>0){
                                _strHtml +='<form method="post" id="form1"><input type="hidden" name="_token" value="'+$('meta[name=_token]').attr('content')+'"> <div class="form-group"><label>Chọn người nhận</label><select class="form-control select2" multiple="multiple" data-placeholder="Choose" name="nguoi_nhan[]" style="width: 100%;">';
                                // console.log(appDoAn.hocVien);
                                $('#cs_msg span').remove();
                                $.each(appBaoCaoTuan.list_user,function (index,item) {
                                    console.log(appBaoCaoTuan.data);
                                    var selected = '';
                                    if($.inArray(item.id,appBaoCaoTuan.data)>=0)
                                        selected = 'selected';
                                    _strHtml += '<option value="'+item.id+'" '+selected+'>'+item.username+'</option>';
                                });
                                _strHtml += '</select></div><button id="btnSave" class="btn btn-primary pull-right">Cập nhật</button></form>';
                            }
                            $('#app-modal-dialog-title').html('Config người nhận báo cáo: ');
                            $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                            $('#app-modal-dialog-body').append(_strHtml);

                            $('#app-modal-dialog').modal({
                                backdrop: 'static',
                                keyboard: false  // to prevent closing with Esc button (if you want this too)
                            });
                            $('#app-modal-dialog').modal('show');
                            $('.select2').select2();
                        }
                        // console.log(appHocPhi.khoanthu.length);
                    }
                })
                .fail(function (err) {
                    console.log(err);
                    alert("error");
                });

        });
        $('#app-modal-dialog').on('click','#btnSave',function(e){
            e.preventDefault();

            $.post('/apps/ajax-config-nguoi-nhan',$('#form1').serializeArray())
                .done(function (data,status) {
                    if(status == 'success'){
                        console.log(data);
                        if(data.status !=1 ){
                            // co loi
                            console.log(data.errors);
                            var _msg_err = [];
                            $.each(data.errors,function (index,item) {
                                _msg_err +=   item+'<br>';
                            });

                            $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                        }
                        else{
                            alert('Cập nhật thành công!');
                            $('#app-modal-dialog').modal('hide');

                        }
                    }
                })
                .fail(function (err) {
                    console.log(err);
                })
        });
    };

    appBaoCaoTuan.run();
}


if($('.appUser').length>0)
{

    appUser = new Object();
    appUser.list_user = [];
    appUser.id = 0;
    appUser.data = [];

    appUser.run = function () {
        $('.set_pms').click(function () {
            appUser.id = $(this).attr('data-id');

            $.ajax({
                url:'/apps/user/ajax-get-permission/'+appUser.id,
                method:"get",
                dataType:"json",
                async:false
            })
            .done(function (data) {
                appUser.data = data;
            })
            .fail(function (err) {
                alert(err);
            });

            var _strHtml = '<div id="cs_msg" style="margin-bottom: 10px"></div>';
            _strHtml +='<div class="form-group">';
            _strHtml +='<label for="list_ext_pms">Nhập tên permission</label>';
            _strHtml += '<select id="pms" class="form-control col-sm-6 col-xs-6 list_ext_pms"  style="margin-bottom: 10px;width: 100%;" data-title="Enter permission name" title="Enter permission name" multiple>';
            // console.log(appUser.data);
            // if(appUser.data.length>0){

                $.each(appUser.data,function (index,item) {
                    _strHtml += '<option value="'+index+'" selected>'+index+'</option>';
                })
            // }
            _strHtml +='</select>';
            _strHtml += '</div>';
            _strHtml += '<br><input type="button" class="btn btn-primary" id="btnSetPms" value=" Save " />';
// console.log(_strHtml);return;
            $('#app-modal-dialog-title').html('Set Permissons');
            $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
            $('#app-modal-dialog-body').append(_strHtml);

            $('#app-modal-dialog').modal({
                backdrop: 'static',
                keyboard: false  // to prevent closing with Esc button (if you want this too)
            });
            $('.list_ext_pms').select2();
            appUser.searchAjax();
            $('#app-modal-dialog').modal('show');

        });
        ///ajax select
        appUser.searchAjax = function() {
            $(".list_ext_pms").select2({
                id: function(bond){ return bond.name; },
                ajax: {
                    url: "/apps/permission/ajax-get-all",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            name: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // console.log(data);
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used

                        params.page = params.page || 1;
                        var select2data = $.map(data, function (obj) {
                            obj.id = obj.id || obj.name; // replace pk with your identifier
                            obj.text = obj.text || obj.name;
                            return obj;
                        });
                        return {
                            results: select2data,
                            pagination: {
                                more: (params.page * 30) < select2data.total_count
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Enter permission name',
                escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                minimumInputLength: 1,
                templateResult: formatItem,
                templateSelection: formatItemSelection
            });

            function formatItem (item) {
                if (item.loading) {
                    return item.text;
                }
                // console.log(item);
                var markup = "<div class='clearfix'>" +  item.name+ "</div>";
                return markup;
            }

            function formatItemSelection (item) {
                return item.name  || item.text;
            }
        };

        //end ajax
        // phải dùng sự kiện .on vì cs_btn_submit là add thêm lúc runtime
        $('#app-modal-dialog').on('click','#btnSetPms', function () {
            var _list = $('#pms').val();
            $.post( '/apps/user/ajax-set-permission/'+appUser.id,{_token: $('#_token').attr('content'),list:_list})
                .done(function(data, status) {
                    if(status == 'success'){
                        console.log(data);
                        if(data.status !=1 ){
                            // co loi
                            console.log(data.errors);
                            var _msg_err = [];
                            $.each(data.errors,function (index,item) {
                                _msg_err += '<br>' + item;
                            });

                            $('#cs_msg').html('<span style="color:red">'+_msg_err+'</span>');
                        }
                        else{
                            $('#app-modal-dialog-body').html('<span style="color:blue">Đã lưu thành công!</span>');
                            setTimeout(function () {
                                location.reload();
                            },1000);
                            // $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');

                        }
                    }

                })
                .fail(function(err) {
                    console.log(err);
                    // alert( "error" );
                })
                .always(function() {
                    // console.log ("finished" );
                });

        });
    };
    appUser.run();
}
if($('.appTuyenSinh').length > 0){
    appTuyenSinh = new Object();
    appTuyenSinh.trangThaiChamSoc = [];
    appTuyenSinh.cs_mahv = '';
    appTuyenSinh.listLop = [];
    appTuyenSinh.listChamSoc = [];
    appTuyenSinh.formatDateTime = function(dateTime) {
        let explode = dateTime.split(' ');
        let date = explode[0].split('-').reverse().join('/');
        return date + ' ' + explode[1];
    }
    appTuyenSinh.getLichSu = function(_mahv){
        return new Promise(function (resolve, reject) {
            $.get('/apps/tuyen-sinh/hoc-vien/lich-su-cham-soc/'+_mahv)
                .done(function (data) {
                    resolve(data);
                    // appTuyenSinh.listChamSoc = data;
                })
                .fail(function (err) {
                    reject(err);
                });
        });
    }
    // appTuyenSinh.trangThaiChamSoc = () =>{
    //     return new Promise(((resolve, reject) => {
    //         $.get('/apps/hoc-vien/ajax-list-ttcs/1')
    //             .done(function (data, status) {
    //                 if (status == 'success') {
    //                     // appTuyenSinh.trangThaiChamSoc = data;
    //                     // console.log(data);
    //                     resolve(data);
    //                 }
    //             })
    //             .fail(function (err) {
    //                 reject(err);
    //                 console.log(err);
    //                 alert("error");
    //             })
    //             .always(function () {
    //                 // console.log ("finished" );
    //             });
    //     }));
    // }
    appTuyenSinh.chamSocHocVien = function () {
        $('.cham-soc-hv').click(function () {
            var _mahv = $(this).attr('data-id');
            var _hoten = $(this).attr('data-name');
            appTuyenSinh.getLichSu(_mahv).then(data=>{
                appTuyenSinh.listChamSoc = data;
                $.get('/apps/tuyen-sinh/hoc-vien/ajax-list-lop-tuyen-sinh/'+_mahv)
                    .done(function (data) {
                        // console.log(data);
                        appTuyenSinh.listLop = data;
                        // var _lop = $(this).attr('data-lop');
                        var _strHtml = "";

                        appTuyenSinh.cs_mahv = _mahv;
                        _strHtml +="<div class='form-group'><label>Chọn lớp:</label><select id='lop' name='lop' class='form-control'>";
                        if(appTuyenSinh.listLop.length>0){
                            $.each(appTuyenSinh.listLop,function (index,item) {
                                _strHtml += '<option value="'+item.id_lophoc+'">' + item.ten_lop + '</option>';
                            });
                        }
                        _strHtml += '</select></div>';
                        _strHtml += 'Lý do cuộc gọi:<select id="ttcs" class="form-control col-sm-6 col-xs-6"  style="margin-bottom: 10px">';

                        if(appTuyenSinh.trangThaiChamSoc.length>0){
                            $.each(appTuyenSinh.trangThaiChamSoc,function (index,item) {
                                _strHtml += '<option value="'+item.id+'">' + item.ten_trang_thai + '</option>';
                            });
                        }
                        _strHtml += '</select><br><br>';

                        _strHtml += '<div id="cs_msg" style="margin-bottom: 10px"></div></div><textarea id="cs_content" rows="5" placeholder="Nhập nội dung cuộc gọi" class="col-sm-12 form-control" style="margin-bottom: 10px"></textarea>';

                        _strHtml += '<br><br><input type="button" class="btn btn-primary" id="cs_btn_submit" value=" Save " />';

                        if(appTuyenSinh.listChamSoc.length>0){
                            _strHtml += "<table class='table table-bordered table-hover' style='margin-top:20px;'>";
                            _strHtml += "<tbody><tr><th>Trạng thái</th><th>Nội dung</th><th>Ngày chăm sóc</th></tr>";
                            $.each(appTuyenSinh.listChamSoc, function (index, item) {
                                _strHtml += "<tr><td>"+item.ten_trang_thai+"</td><td>"+item.noi_dung+"</td><td>"+appTuyenSinh.formatDateTime(item.c_time)+"</td></tr>"
                            })
                            _strHtml += "</tbody></table>";
                        }
                        $('#app-modal-dialog-title').html('<i class="fa  fa-graduation-cap"></i> Chăm sóc học viên: <b>'+_mahv+'. ' + _hoten + '</b>');
                        $('#app-modal-dialog-body').html('');// xoa rong truoc khi append
                        $('#app-modal-dialog-body').append(_strHtml);

                        $('#app-modal-dialog').modal({
                            backdrop: 'static',
                            keyboard: false  // to prevent closing with Esc button (if you want this too)
                        })
                        $('#app-modal-dialog').modal('show');
                    })
                    .fail(function (err) {
                        console.log(err);
                    });

            })
        });

        // phải dùng sự kiện .on vì cs_btn_submit là add thêm lúc runtime
        $('#app-modal-dialog').on('click','#cs_btn_submit', function () {
            var _cs_content = $('#cs_content').val();
            var _ttcs = $('#ttcs').val();
            var _lop = $('#lop').val();
            $.post( '/apps/tuyen-sinh/hoc-vien/add-cs-tuyen-sinh/'+ appTuyenSinh.cs_mahv,{_token: $('#_token').attr('content'),cs_content:_cs_content,ttcs:_ttcs,lop:_lop})
                .done(function(data, status) {
                    console.log(data);
                    if(status == 'success'){
                        if(data.status !=1 ){
                            // co loi
                            console.log(data.errors);
                            $('#cs_msg').html('<span style="color:red">'+data.errors.join('<br>')+'</span>');
                        }
                        else{
                            $('#app-modal-dialog-body').html('<span style="color:blue">'+data.msg.join('<br>')+'</span>');
                            // $('#cs_msg').html('<span style="color:blue">Đã lưu thành công!</span>');
                            setTimeout(()=>{
                                window.location.reload();
                            }, 1000);

                        }
                    }

                })
                .fail(function(err) {
                    console.log(err);
                    $('#cs_msg').html('<span style="color:red">'+ err +'</span>');
                    // alert( "error" );
                })
                .always(function() {
                    // console.log ("finished" );
                });
        });
    };
    appTuyenSinh.run = function () {
        $("#app-modal-dialog").on("hide.bs.modal", function () {
            $('#app-modal-dialog-body').html('');
            $('#app-modal-dialog-title').html('');
        });

        if ($('.cham-soc-hv').length > 0) {
            // load list trang thai cham soc


            $.get('/apps/hoc-vien/ajax-list-ttcs/1')
                .done(function (data, status) {
                    if (status == 'success') {
                        appTuyenSinh.trangThaiChamSoc = data;
                        // console.log(data);
                    }
                })
                .fail(function (err) {
                    console.log(err);
                    alert("error");
                })
                .always(function () {
                    // console.log ("finished" );
                });

            this.chamSocHocVien();
        }
        if($('#hv_chk_all').length>0) {

            var $table = $('.table');
            var $tdCheckbox = $table.find('td input:checkbox');
            var $tdCheckboxChecked = [];
            // xử lý check
            $('#hv_chk_all').on('click', function () {
                $tdCheckbox.prop('checked', this.checked);

            });
            $tdCheckbox.on('change', function () {
                $tdCheckboxChecked = $table.find('tbody input:checkbox:checked');
                $('#hv_chk_all').prop('checked', ($tdCheckboxChecked.length == $tdCheckbox.length));
                // console.log($tdCheckboxChecked);
            });
        }
    };
    appTuyenSinh.run();
}