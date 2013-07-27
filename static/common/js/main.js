/**
 * 基于jQuery的图片切换操作
 * 
 * @package jQuery JavaScript Library v1.8.0
 * @author 风格独特 
 * @version 1.0
 */

// 文档加载完后执行所有操作
$(function() {
    ImageChange("#img_change");
    ADChange('#ad_change');
	StuChange('.stu_change');
});

// 小图片切换部分
var imgTimer;
var imgIds = new Array();
var imgIdsNum = 0;
// 鼠标触发函数
function ImageChange(ID) {
    // 全局变量赋值
    imgIds[imgIdsNum++] = ID;
    var imgP = $(ID + " p");

    ImageAutoChange();
    imgP.hover(
        function() {
            var imgP = $(imgIds[imgIdsNum - 1] + " p");
            var imgSpan = $(imgIds[imgIdsNum - 1] + " span");
            var checkNum = imgP.index(imgP.filter(".img_numcheck"));
            var nextNum = imgP.index($(this));
            
            // 关闭imgTimer
            clearInterval(imgTimer);
            
            if(nextNum == checkNum) {
                return;
            }
            // 数字按钮的切换
            imgP.removeClass("img_numcheck");
            $(this).addClass("img_numcheck");
            
            // 图片的显示和隐藏
            imgSpan.css("display", "none");
            $(imgSpan[nextNum]).show(400);
        },
        function () {
            // 重启启动imgTimer
            ImageAutoChange();
        }
    );
}

// 定时触发函数
function ImageAutoChange () {
    if(imgIdsNum == 0) {
        return;
    }
    imgTimer = setInterval(function() {
                for(var i = 0; i < imgIdsNum; ++i) {
                    var imgP = $(imgIds[i] + " p");
                    var imgSpan = $(imgIds[i] + " span");
                    var imgPNum = imgP.size();
                    var checkNum = imgP.index(imgP.filter(".img_numcheck"));
                    var nextNum = (checkNum + 1) % imgPNum;
                    
                    // 数字按钮的切换
                    imgP.removeClass("img_numcheck");
                    $(imgP[nextNum]).addClass("img_numcheck");
                    
                    // 图片的显示和隐藏
                    imgSpan.css("display", "none");
                    $(imgSpan[nextNum]).show(400);
                }
            },
            4000 // 延时毫秒数
        );
}

// 大图片切换部分
var adTimer;
var adIds = new Array();
var adIdsNum = 0;
var perMovePx = -960;
var moveTiem = 1000;
// 鼠标触发函数
function ADChange(ID) {
    // 全局变量赋值
    adIds[adIdsNum++] = ID;
    var imgP = $(ID + " p");
    ADAutoChange();
        
    imgP.click(
        function() {
            // 关闭adTimer
            clearInterval(adTimer);
            
            var imgP = $(adIds[adIdsNum - 1] + " p");
            var checkNum = imgP.index(imgP.filter(".img_numcheck"));
            var nextNum = imgP.index($(this));
            
            // 数字按钮的切换
            imgP.removeClass("img_numcheck");
            $(this).addClass("img_numcheck");
            
            // 图片的横向移动
            var movePx = perMovePx * nextNum;
            $('#ad_img').animate({'margin-left': movePx + 'px'}, moveTiem);
            
            // 重启启动adTimer
            ADAutoChange();
        }
    );
}

// 定时触发函数
function ADAutoChange () {
    if(adIdsNum == 0) {
        return;
    }
    adTimer = setInterval(function() {
                for(var i = 0; i < adIdsNum; ++i) {
                    var imgP = $(adIds[i] + " p");
                    var imgPNum = imgP.size();
                    var checkNum = imgP.index(imgP.filter(".img_numcheck"));
                    var nextNum = (checkNum + 1) % imgPNum;
                    
                    // 数字按钮的切换
                    imgP.removeClass("img_numcheck");
                    $(imgP[nextNum]).addClass("img_numcheck");
                    
                    // 图片的横向移动
                    var movePx = perMovePx * nextNum;
                    $('#ad_img').animate({'margin-left': movePx + 'px'}, moveTiem);
                }
            },
            4000 // 延时毫秒数
        );
}

//学员切换
var blocknum = 0;
var stuwid = -600;

//单击触发函数
function StuChange (ID) {
	var imgnum = $(ID + ' img').size();			//学员人数
	// 	$(".ws-prev").css({'background-image':'none','cursor':'none'});
	$(".ws-next").click(
		function() {						
			if(blocknum == parseInt((imgnum - 1) / 5)){
				return;
			}
			var movePx = stuwid * (++blocknum);
			$(ID + ' ul').animate({'margin-left': movePx + 'px'}, moveTiem);
			/*if(blocknum == parseInt((imgnum - 1) / 5)){
				$(".ws-next").css({'background-image':'none','cursor':'none'});
			}
			if(blocknum != 0){
				$(".ws-prev").css({'background-image':'url(../img/index_icon.png)','cursor':'pointer'});
			}*/
		}
	);
	$(".ws-prev").click(
		function() {
			if(blocknum == 0){
				return;
			}
			var movePx = stuwid * (--blocknum);
			$(ID + ' ul').animate({'margin-left': movePx + 'px'}, moveTiem);
			/*if(blocknum == 0){
				$(".ws-prev").css({'background-image':'none','cursor':'none'});
			}
			if(blocknum != parseInt((imgnum - 1) / 5)){
				$(".ws-next").css({'background-image':'url(../img/index_icon.png)','cursor':'pointer'});
			}*/
		}
	);
}