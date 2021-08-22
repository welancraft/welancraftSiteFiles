var addr = "https://mc.royenheart.com/resources/"; // 资源地址
var siteSources = addr+"siteSources/"; // 网页资源地址

var illegal = ["100","101","102","103","104","105"]; // 增加参数检测

var picshowSource = {
    "100":[siteSources+"picshow01.jpg","Lzuer's MC"],
    "101":[siteSources+"picshow02.jpg","现有服务器列表"],
    "102":[siteSources+"picshow03.jpg","各服务器公告"],
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
    /* 声明Image对象 */

    var picshowImage = new Image();
    
    /* 参数不符合规范，即value未在对应键值对中定义 */

    if (illegal.indexOf(value) == -1) {
        value = "106"; // 跳转至出错界面
    }

    /* 设置图片属性 */

    picshowImage.alt = "图片显示错误";
    picshowImage.id = "picshowPic";
    picshowImage.src = picshowSource[value][0];
    
    /* 图片插入页面 */

    // 引用文档内对象
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

    picshow.style.top = valueOfSize["height"]["header"] + "px"; // 设置图片栏与页眉距离

    // 添加图片
    picshow.removeChild(document.getElementById("picshowPic"));
    picshow.appendChild(picshowImage);

    timer = setInterval(function() {
        if(picshowImage.complete) {
            var picHeight = document.getElementById("picshowPic").clientHeight;
            picshow.style.height = picHeight + "px"; // 根据载入的图片设置图片栏高度
            picshowIntro.innerHTML = picshowSource[value][1]; // 更改信息
            picshowIntro.style.top =  (picHeight-picshowIntro.clientHeight)/2+"px";
            article.style.top = valueOfSize["height"]["header"] + "px";
            footer.style.top = valueOfSize["height"]["header"] + "px"; // 由于是relative，因此相对于body位移页眉高度
            clearInterval(timer);
        }
    }, 100);
}

/* 界面载入 */
function load() {
    let urlPage = getUrlString("page"); // 获取page参数，str字符串形式

    /* 更改图片栏以及各大部分位置 */

    picshowTextChange(urlPage);
}

window.onload = load;
window.onresize = load;