/**
 * 主页框架所需js动画
 * 正文相关动画请于上级目录中各个正文对应文件夹内文件进行更改、
 * 
 * @author royenheart
 */

var illegal = ["100","101","102","103","104","105"]; // 页面id

var picshowSource = {
    "100":["./resources/siteSources/"+"picshow01.jpg","Lzuer's MC"],
    "101":["./resources/siteSources/"+"picshow02.jpg","服务器列表"],
    "102":["./resources/siteSources/"+"picshow03.jpg","服务器公告"],
    "103":["./resources/siteSources/"+"picshow04.jpg","加入我们"],
    "104":["./resources/siteSources/"+"picshow05.jpg","服务器展示"],
    "105":["./resources/siteSources/"+"picshow06.jpg","❤致谢❤"],
    "106":["./resources/siteSources/"+"picshow07.jpg","出错啦！"]
} /* 首页图片和标题 */

/**
 * js根据指定的参数名获取url中对应参数名的参数值\
 * 
 * @param {String} name 参数名
 * @param {String} none_default 未获取到参数时的默认值
 * @returns component_of_pageid
 */
function getUrlString(name, none_default) {
    let adapt = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    let value = window.location.search.substr(1).match(adapt);
    return (value != null)?decodeURIComponent(value[2]):none_default; // 首页为"100"
}

/**
 * js根据界面尺寸改变首页图片以及图片栏尺寸
 * 
 * @param {String} value 图片id 
 */
function picshowTextChange(value) {
    
    /* 参数不符合规范，即value未在对应键值对中定义 */
    
    if (illegal.indexOf(value) == -1) {
        value = "106"; // 跳转至出错界面
    }
    
    var picshow = document.getElementById("picshow");
    var picshowTest = document.getElementById("picshowText");

    picshow.style.backgroundImage = ""+
    "url(" + picshowSource[value][0] + ")";

    picshow.style.height = 1080*(document.body.clientWidth / 1920) + "px";

    picshowTest.innerHTML = picshowSource[value][1];
}

/**
 * 根据页面尺寸或手机和PC端切换导航栏形式
 * 
 */
function navChange() {
    var sUserAgent = navigator.userAgent;
    var agentList = ["Android","iPhone","iPad","iPod","Symbian"];

    var headerContent = document.getElementById("headerContent");

    if (sUserAgent.indexOf(agentList) > -1 || document.documentElement.clientWidth < 1165) {
        headerContent.innerHTML = ""+
        "<div class=headerContentBox id=a><a href=\"https://mc.royenheart.com\">WeLanCraft</a></div>"+
        "<div class=nav>"+
        "   <div>导航"+
        "       <div>"+
        "           <p><a href=\"https://mc.royenheart.com\">首页</a></p>"+
        "           <p><a href=\"https://mc.royenheart.com/index.php?page=101\">服务器</a></p>"+
        "           <p><a href=\"https://mc.royenheart.com/index.php?page=102\">公告</a></p>"+
        "           <p><a href=\"https://mc.royenheart.com/index.php?page=103\">加入</a></p>"+
        "           <p><a href=\"https://mc.royenheart.com/index.php?page=104\">展示</a></p>"+
        "           <p><a href=\"https://mc.royenheart.com/index.php?page=105\">鸣谢</a></p>"+
        "       </div>"+
        "   </div>"+
        "</div>";
    } else {
        headerContent.innerHTML = ""+
        "<div class=\"headerContentBox\" id=\"a\"><a href=\"https://mc.royenheart.com\">WeLanCraft</a></div>"+
        "<div class=\"headerContentBox\" id=\"g\"><a href=\"https://mc.royenheart.com/index.php?page=105\">鸣谢</a></div>"+
        "<div class=\"headerContentBox\" id=\"f\"><a href=\"https://mc.royenheart.com/index.php?page=104\">展示</a></div>"+
        "<div class=\"headerContentBox\" id=\"e\"><a href=\"https://mc.royenheart.com/index.php?page=103\">加入</a></div>"+
        "<div class=\"headerContentBox\" id=\"d\"><a href=\"https://mc.royenheart.com/index.php?page=102\">公告</a></div>"+
        "<div class=\"headerContentBox\" id=\"c\"><a href=\"https://mc.royenheart.com/index.php?page=101\">服务器</a></div>"+
        "<div class=\"headerContentBox\" id=\"b\"><a href=\"https://mc.royenheart.com\">首页</a></div>";
    }
}

/* 界面载入 */
function load() {
    let urlPage = getUrlString("page","100"); // 获取page参数，str字符串形式

    /* 修改导航栏 */

    navChange();

    /* 更改图片栏图片以及首页图片标题 */

    picshowTextChange(urlPage);

}

window.onload = load;
window.onresize = function() {

    /* 修改导航栏 */

    navChange();

    /* 修改图片栏高度 */

    var picshow = document.getElementById("picshow");
    picshow.style.height = 1080*(document.body.clientWidth / 1920) + "px";
    
}