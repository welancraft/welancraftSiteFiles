var addr = "https://mc.royenheart.com/resources/";
var siteSources = addr+"siteSources/";

var picshowPic = {
    "100":siteSources+"picshow01.png",
    "101":siteSources+"picshow02.png",
    "102":siteSources+"picshow03.png",
    "103":siteSources+"picshow04.png",
    "104":siteSources+"picshow05.png",
    "105":siteSources+"picshow06.png"
}

var picshowText = {
    "100":"Lzuer's MC",
    "101":"现有服务器列表",
    "102":"各服务器公告",
    "103":"加入我们",
    "104":"服务器展示",
    "105":"❤致谢❤"
}

function getUrlString(name) {
    /* 获取URL参数 */
    let adapt = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    let value = window.location.search.substr(1).match(adapt);
    return (value != null)?decodeURIComponent(value[2]):"100"; // 首页为"100"
}

function picshowTextChange(value) {
    var picshowImage = new Image();
    
    /* 设置属性 */
    picshowImage.alt = "图片显示错误";
    picshowImage.id = "picshowPic";
    picshowImage.src = picshowPic[value];

    if (picshowImage.src == "undefined") {
        picshowImage.src = picshowPic["100"]; // 之后再添加出错图片
        value = "100";
    }
    
    /* 加入页面中 */
    var picshow = document.getElementById("picshow");
    var picshowIntro = document.getElementById("picshowText");
    
    var top = document.getElementById("header").clientHeight + "px"; // 设置图片栏与页眉上方距离
    picshow.style.top = top;

    picshow.removeChild(document.getElementById("picshowPic"));
    picshow.appendChild(picshowImage);

    timer = setInterval(function() {
        if(picshowImage.complete) {
            var height = document.getElementById("picshowPic").clientHeight + "px";
            picshow.style.height = height; // 根据载入的图片设置图片栏高度
            picshowIntro.innerHTML = picshowText[value];
            picshowIntro.style.top =  (document.getElementById("picshowPic").clientHeight-picshowIntro.clientHeight)/2+"px";
            clearInterval(timer);
        }
    }, 100);
}

window.onload = function() {
    let urlPage = getUrlString("page"); // 获取page参数

    /* 更改图片栏 */
    picshowTextChange(urlPage);
}