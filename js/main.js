$(document).ready(function() {
    $('.id-column').hover(function() {
        $(this).find('.btnDel').show();
    }, function() {
        $(this).find('.btnDel').hide();
    });

    $('.attribute-column').hover(function() {
        $(this).find('.btnAlt').show();
    }, function() {
        $(this).find('.btnAlt').hide();
    });
    

     /*[ ]
	===========================================================*/

    $('.overlay').click(function(){
        $('.popup').css('display','none');
        $(this).css('display','none');
    });

    $('#btnClose').click(function(){
        $('.popup').css('display','none');
        $('.overlay').css('display','none');
    });
});