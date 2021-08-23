var addr = "https://mc.royenheart.com/resources/"; // 资源地址
var siteSources = addr+"siteSources/"; // 网页资源地址

var prePicshowWidth;

var illegal = ["100","101","102","103","104","105"]; // 增加参数检测

var picshowSource = {
    "100":[siteSources+"picshow01.jpg","Lzuer's MC"],
    "101":[siteSources+"picshow02.jpg","服务器列表"],
    "102":[siteSources+"picshow03.jpg","服务器公告"],
    "103":[siteSources+"picshow04.jpg","加入我们"],
    "104":[siteSources+"picshow05.jpg","服务器展示"],
    "105":[siteSources+"picshow06.jpg","❤致谢❤"],
    "106":[siteSources+"picshow07.jpg","出错啦！"]
}

/* 获取URL参数 */
function getUrlString(name) {
    let adapt = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    let value = window.location.search.substr(1).match(adapt);
    return (value != null)?decodeURIComponent(value[2]):"100"; // 首页为"100"
}

/* 图片栏图片随URL参数转换 */
function picshowTextChange(value) {
    
    /* 参数不符合规范，即value未在对应键值对中定义 */
    
    if (illegal.indexOf(value) == -1) {
        value = "106"; // 跳转至出错界面
    }
    
    /* 声明Image对象 */

    var picshowImage = new Image();

    // 引用对象
    var header = document.getElementById("header");
    var picshow = document.getElementById("picshow");
    var picshowIntro = document.getElementById("picshowText");
    var article = document.getElementById("article");
    var footer = document.getElementById("footer");
    
    // 获取宽度与高度
    var valueOfSize = {
        "width": {
            "header": header.clientWidth,
            "picshow": picshow.clientWidth,
            "article": article.clientWidth,
            "footer": footer.clientWidth
        },
        "height": {
            "header": header.clientHeight,
            "picshow": picshow.clientHeight,
            "article": article.clientHeight,
            "footer": footer.clientHeight
        }
    }

    /* 设置图片属性 */

    picshowImage.alt = "图片显示错误";
    picshowImage.id = "picshowPic";
    picshowImage.src = picshowSource[value][0];
    
    /* 图片修改 */

    picshow.removeChild(document.getElementById("picshowPic"));
    picshow.appendChild(picshowImage);
    
    timer = setInterval(function() {
        if(picshowImage.complete) {
            var picHeight = document.getElementById("picshowPic").clientHeight;
            picshow.style.height = picHeight + "px"; // 根据载入的图片设置图片栏高度
            picshow.style.top = valueOfSize["height"]["header"] + "px"; // 设置图片栏与页眉距离
            prePicshowWidth = picshow.clientWidth;
            picshowIntro.innerHTML = picshowSource[value][1]; // 更改信息
            picshowIntro.style.top =  (picHeight-30-picshowIntro.clientHeight)/2+"px";
            article.style.top = valueOfSize["height"]["header"] - 30 + "px";
            footer.style.top = valueOfSize["height"]["header"] - 30 + "px";
            clearInterval(timer);
        }
    }, 100);
}

/* 根据界面尺寸切换导航栏 */
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
    let urlPage = getUrlString("page"); // 获取page参数，str字符串形式

    /* 修改导航栏 */

    navChange();

    /* 更改图片栏图片以及大小 */

    picshowTextChange(urlPage);

}

window.onload = load;
window.onresize = function() {

    /* 修改导航栏，得先修改，否则会导致页眉高度不一致 */

    navChange();
    
    /* 修改图片栏高度 */

    var picshow = document.getElementById("picshow");
    var picshowIntro = document.getElementById("picshowText");
    var header = document.getElementById("header");
    var article = document.getElementById("article");
    var footer = document.getElementById("footer");

    var scale = picshow.clientWidth / prePicshowWidth;
    scale *= picshow.clientHeight;

    picshow.style.height = scale + "px";
    picshow.style.top = header.clientHeight + "px"; // 设置图片栏与页眉距离
    article.style.top = header.clientHeight - 30 + "px";
    footer.style.top = header.clientHeight - 30 + "px";
    picshowIntro.style.top =  (picshow.clientHeight-30-picshowIntro.clientHeight)/2+"px";

    prePicshowWidth = picshow.clientWidth;
}