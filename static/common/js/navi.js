// JavaScript Document

$(function() {
    navihover();
});
//导航下拉菜单效果
function navihover() {
    $("#navi li").hover(
        function(){
            $('div', $(this)).css({'display':'block'});
        },
        function(){
            $('div', $(this)).css({'display':'none'});
        }
    );
}