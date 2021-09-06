# welancraftSiteFiles
welancraft.top我的世界服务器网页文件

[网页访问地址](https://mc.royenheart.com)

⚠目前仍在施工中⚠

此项目遵循 [MPL-2.0](https://github.com/royenheart/welancraftSiteFiles/blob/main/LICENSE) 协议

若需进行修改部署到自己的服务器，请遵循上述协议

## TODO

- 完善各界面内容
- 丰富动画细节
- 公告内容自动生成（方便公告的填写）
- 精简代码（JS，CSS）
- 优化导航栏
- 加入英文版界面

## 文件结构与说明

```intro

welancraft
│   databaseLink.php  =>  获取数据库数据
│   header.php  =>  页眉
│   footer.php => 页脚
|   index.php  =>  正文
│   funcs.php => 函数声明
|   siteDataClass.php => 数据对象声明
|   siteException.php => 错误对象声明
│   siteIcon.jpg  =>  网页图标
│
├───archives
│   │   正文部分内容，详情请见文件夹内README.md文件
│   │
│   └───articlePage102
│           “公告“栏公告内容
│
├───assets
│   ├───css
│   │       各界面所需css文件
│   │
│   └───js
│           各界面所需js文件
│
├───resources
│       网页所需资源，如图片等，若需部署请自行修改地址和结构
│
└───serverDataDisplay
        MC服务器信息获取，详情请见文件夹内README.md文件

```

## 关于使用

可以部署于自己的Web服务器，请自行添加resources资源文件，数据库，index.php界面中的网络地址

Linux上可自行搭建LAMP，LNMP等环境

Windows上可使用Xampp集成环境

## 关于协作

### Issues

[访问官网](https://mc.royenheart.com)，若有任何Bug欢迎于Issues中提出

### Code

可修改archives中各界面的内容展示，可自行修改assets文件夹中对应界面的css和js文件

请注意不要和已有的函数定义等发生冲突，如的确需要进行修改，请修改assets/js/main.js和assets/css/main.css

也欢迎在整体框架上提出宝贵的意见

## 鸣谢

兰州大学动漫社MC分部

各位支持WeLanCraft的兰大同好

[兰州大学开源社区](https://github.com/LZUOSS)