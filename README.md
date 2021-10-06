# welancraftSiteFiles
welancraft.top我的世界服务器网页文件

[网页访问地址](https://mc.royenheart.com)

⚠目前仍在施工中⚠

此网页框架遵循 [MPL-2.0](https://github.com/royenheart/welancraftSiteFiles/blob/main/LICENSE) 协议

若需进行修改部署到自己的服务器，请遵循上述协议

## TODO

- 完善各界面内容
- 丰富动画细节
- 公告内容自动生成（方便公告的填写）
- 精简代码（JS，CSS）
- 优化导航栏
- 加入英文版界面

## 文件结构与说明

```shell
WelanCraftSiteFiles
├─archives - 正文内容存放
│  └─articlePage102 - 公告内容存放
├─assets
│  ├─css - 各页面css文件
│  │  ├─100
│  │  ├─101
│  │  ├─102
│  │  ├─103
│  │  ├─104
│  │  ├─105
│  │  └─main
│  └─js - 各页面js文件
│      ├─100
│      ├─101
│      ├─102
│      ├─103
│      ├─104
│      ├─105
│      └─main
├─resources - 资源文件夹
├─serverDataDisplay - 获取各服务器数据
│   ├─data
│   └─src
├─index.php - 主页文件
├─footer.php - 页脚文件
├─header.php - 页眉文件
├─funcs.php - 网页资源获取方法声明
├─databaseLink.php - 数据库连接
├─siteDataClass.php - 数据结构声明
└─siteException.php - 错误声明
```

## 关于使用

可以部署于自己的Web服务器，请自行添加resources资源文件，数据库，index.php界面中的网络地址

Linux上可自行搭建LAMP，LNMP等环境

Windows上可使用Xampp集成环境

## 关于协作

### Issues

[访问官网](https://mc.royenheart.com)，若有任何Bug欢迎于Issues中提出

## 鸣谢

兰州大学动漫社MC分部

各位支持WeLanCraft的兰大同好

[兰州大学开源社区](https://github.com/LZUOSS)