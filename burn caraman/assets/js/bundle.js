jQuery(function($){

$('.q-row').on('click',function(){
    var opena = $(this).next(".a-row");
    $(opena).slideToggle();

    if($(this).hasClass('open')){
        $(this).removeClass('open');
    }else{
        $(this).addClass('open');
    }
    return false;
});

 //ハンバーガーメニュー
 $(".menu-btn").click(function () {
    $(this).toggleClass('active');
    $('.hum-menu-wrapper').toggleClass('is-active');
});
//スクロールヒントの起動
new ScrollHint('.js-scrollable');



 //トップページのタブ

 $(window).on('load',function(){
    $('.search-content-taiken').addClass('active');
    $('.taiken-tab').addClass('is-active');
});

$('.tab').on('click', function(){
    TabID = $(this).attr('id');
    $('.tab').removeClass("is-active");
    $('.search-content').removeClass("active");
    $(this).addClass("is-active");
    if(TabID == 'left-tab'){
        $('.search-content-taiken').addClass("active");
    }else{
        $('.search-content-nyukai').addClass("active");
    }
});

$('.nyukai-tab').on('click',function(){
    $("[name='ofnyukai_club[]']").prop('checked', true);
    $("[type='submit']").prop('value', '検索');
})

$('.taiken-tab').on('click',function(){
    $("[type='submit']").prop('value', '検索');
})

$(window).on('load',function(){
    $("[type='submit']").prop('value', '検索');
})

//チェックボックス親子の連動
// $('label').on('click',function(){
//     console.log($(this).children('input').prop('checked'));
//     if($(this).children('input').prop('checked',false)){
//         $(this).parent().find('input').removeAttr('checked').prop("checked", false).change();
//     }else{
//         $(this).parent().find('input').prop('checked',true);
        
//     }
// });



$('.clear-btn').on('click',function(){
    $('.search-content').find("[type='checkbox']").removeAttr('checked').prop("checked", false).change();
    $('.search-content').find("[value=0]").prop("selected", "selected").change();
})

});