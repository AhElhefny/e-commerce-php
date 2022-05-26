$(function () {

axios('https://jsonplaceholder.typicode.com/posts').then((res)=>{
    console.log(res.data)
})
    'use strict';

    // $('input').each(function () {
    //     if($(this).attr('required')==='required'){
    //         $(this).after('<span class="ast">*</span>');
    //     }
    // });

    var passfiled=$('.pass');

    $('.show_password').hover(function () {
        passfiled.attr('type','text');
    },function () {
        passfiled.attr('type','password');
    });
/////////////////////////////////////////////////////////////
    $('.live').keyup(function () {
        $($(this).data('class')).text($(this).val());
    });


    $('#itImg').change(function () {
        var reader=new FileReader();
        reader.onload=function(e){
            $('#it-photo').attr('src',e.target.result);
        }
        reader.readAsDataURL($(this)[0].files[0]);

    });


    // $('.live-desc').keyup(function () {
    //     $('.live-preview .caption p').text($(this).val());
    // });
    //
    // $('.live-price').keyup(function () {
    //     $('.live-preview .price-tag').text('$' + $(this).val());
    // });

    //////////////////////////////////////////////////////////////


});


function editComment(e,id) {
    var formData=new FormData()
    formData.append('id',id);
    formData.append('comment',e.target.innerText);
    axios.post('/ecommerce/editComment.php',formData);
}