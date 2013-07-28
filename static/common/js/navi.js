// JavaScript Document

$(function() {
    navihover();
});
//导航下拉菜单效果
function navihover() {
    $("#navi li").hover(
        function(){
            $(this).addClass('navihover');
            $('div', $(this)).css({'display':'block'});
        },
        function(){
            $(this).removeClass('navihover');
            $('div', $(this)).css({'display':'none'});
        }
    );
}