# laravel-api-starter

这是一个 Laravel 5.5 + Dingo + JWT 的基础项目, 用于快速开始写 API

[![StyleCI](https://styleci.io/repos/95127265/shield)](https://styleci.io/repos/95127265)
[![License](https://img.shields.io/github/license/liyu001989/laravel-api-starter.svg)](LICENSE)
[![donate](https://img.shields.io/badge/paypal-donate-red.svg)](https://paypal.me/liyu001989)
[![donate](https://img.shields.io/badge/%E7%BA%A2%E5%8C%85-donate-red.svg)](https://cloud.githubusercontent.com/assets/2981799/25706351/cfba493c-3112-11e7-9985-aec05ff9734c.png)


- Laravel/RESTful 交流群: 216721539

## USEFUL LINK

读文档很重要，请先仔细读读文档 laravel, dingo/api，jwt，fractal 的文档。

- dingo/api [https://github.com/dingo/api](https://github.com/dingo/api)
- dingo api 中文文档 [dingo-api-wiki-zh](https://github.com/liyu001989/dingo-api-wiki-zh)
- jwt(json-web-token) [https://github.com/tymondesigns/jwt-auth](https://github.com/tymondesigns/jwt-auth)
- transformer [fractal](http://fractal.thephpleague.com/)
- apidoc 生成在线文档 [apidocjs](http://apidocjs.com/)
- rest api 参考规范 [jsonapi.org](http://jsonapi.org/format/)
- api 调试工具 [postman](https://www.getpostman.com/)
- 有用的文章 [https://old-oomusou.goodjack.tw/laravel/architecture](https://old-oomusou.goodjack.tw/laravel/architecture/)
- php lint [phplint](https://github.com/overtrue/phplint)
- Laravel 理念 [From Apprentice To Artisan](https://my.oschina.net/zgldh/blog/389246)
- 我对 REST 的理解 [http://blog.lyyw.info/2017/02/09/2017-02-09%20%E5%AF%B9rest%E7%9A%84%E7%90%86%E8%A7%A3/](http://blog.lyyw.info/2017/02/09/2017-02-09%20%E5%AF%B9rest%E7%9A%84%E7%90%86%E8%A7%A3/)

## USAGE

```
$ git clone git@github.com:liyu001989/laravel-api-starter.git
$ composer install
$ 设置 `storage` 目录必须让服务器有写入权限。
$ cp .env.example .env
$ vim .env
    DB_*
        填写数据库相关配置 your database configuration
    APP_KEY
        php artisan key:generate
    JWT_SECRET
        php artisan jwt:secret

$ php artisan migrate
$ php artisan db:seed (默认添加了10个用户)

头信息中可以增加 Accept:application/vnd.app.v1+json 切换v1和v2版本
```

如果访问一直不对，可以进入public 目录执行 `php -S localhost:8000 -t public`，然后尝试调用几个接口，从而确定是否为web服务器的配置问题。

## 相关说明

- 通过一个中间件 [https://github.com/liyu001989/dingo-serializer-switch](https://github.com/liyu001989/dingo-serializer-switch) 切换 fractal 的 serializer, 默认使用 array。
- 让 findOrFail 返回 404, 更方便使用
- 可以用过 `Accept-Language` 头来却换语言，比如 zh-CN, 当然也可以默认中文 

## License

[MIT license](http://opensource.org/licenses/MIT)
