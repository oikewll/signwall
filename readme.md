# 签到墙(PHP版 v1.0)

![签到墙二维码图片](http://fotoline.sinaapp.com/signwall/board/style/images/qrcode.png)

[>微信链接](http://fotoline.sinaapp.com/signwall/app.html)：http://fotoline.sinaapp.com/signwall/app.html

支持唯一ID作为`signid`应用不同场次和情景，需要同时在`signin.html`和`board.html`修改signid参数值；可支持多人同时签入；

#### 服务端

后端托管在[SAE](http://www.sinacloud.com/sae.html)，数据存储需要开启memcached，写服务器内存没有数据库；后端处理文件是`memdata.php`，基础参数`type=set`和`type=get`负责读写存储签到信息。

#### 微信H5

参考[微信开发文档](http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html)，需要一个**认证的微信公众号**才能拿到接口，登录认证/拉取用户公开信息规定只能在后端处理，可以参考`oauth.php`；还需要在**获取用户信息接口**的设置项修改回调域名；建议填写业务域名，输入框输入文字的时候不会出现提示层[(?)](https://res.wx.qq.com/mpres/htmledition/images/pic/setting/trusted_domain218877.jpg)；


#### web留言墙

[>查看DEMO](http://fotoline.sinaapp.com/signwall/board.html)


###### -EOF-
多多指教 oikewll#gmail.com