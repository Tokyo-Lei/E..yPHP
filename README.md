

# E..yPHP

![](/Public/Uploads/logo.jpg)




[![](https://img.shields.io/badge/version-0.01-green.svg)](https://img.shields.io/badge/version-0.01-green.svg)
[![](https://img.shields.io/badge/php-7+-brightgreen.svg)](https://img.shields.io/badge/php-7+-brightgreen.svg)
[![](https://img.shields.io/badge/mysql-5+-orange.svg)](https://img.shields.io/badge/mysql-5+-orange.svg)
[![](https://img.shields.io/badge/license-Apache%202-blue.svg)](https://img.shields.io/badge/license-Apache%202-blue.svg)

## 这个框架的理由?

Un...反正很奇怪的思维，不好好写MVC思想和依赖Composer关系。
结果...只提供给PHP初学者学习使用。而且这个框架不走MVC模式思想，单独一个PHP文件执行，是比较古老的方法。
当然了，PHP7.X版本都可以使用。
模板引擎采用twig1.37.1版，数据库采用Medoo1.6版。


## 更新日志
- 2019年3月24日 新增碎片管理，更新数据库、内容管理修改删除
- 2019年3月21日 完成框架，优化对Liunx支持、简化数据库，开发结束。
- 2019年3月20日 完成分页，优化代码
- 2019年3月19日 完成基本配置页、内容页（分页未完成）、更换editormd编辑器、完成上传图片
- 2019年3月18日 完成分类页、用户页、内容页编辑插件
- 2019年3月15日 完成首页、路径重构
- 2019年3月14日 完成大体框架、后台制作启动
- 2019年3月13日 创建E..yPHP项目（为了解决虚拟主机问题）


## 框架使用

- 本代码开源遵循Apache Licence 2.0协议。
- 支持PHP7.X以上版本，建议Win平台Apache+php+mysql组合环境使用。
- 支持Windows和Liunx平台。
- 如果不使用数据库，请在App/Data.php注释数据库配置即可。
```php
//配置数据库
$_DB['mysql']['pconnect'] = true;//设置是否长连接
$_DB['mysql']['charset'] = 'utf8';//设置连接编码
$_DB['mysql']['server'] = '127.0.0.1';
$_DB['mysql']['username'] = 'root';
$_DB['mysql']['password'] = 'root';
$_DB['mysql']['database_name'] = 'tokyos.top';
$_DB['mysql']['database_type'] = 'mysql';
$_DB['mysql']['port'] = 3306;

//执行数据库
$_DB= new medoo($_DB['mysql']);                 
              
```

## 目录架构
```php
App		前后台PHP文件目录
   |-	Home	前台目录
   |-	Admin	后台目录
   |-   Data.php  MySQL数据库配置
Public		放置CSS、JS、IMG等目录
   |-	Home	前台静态资源目录
   |-	Admin	后台静态资源目录
          |- Admin_config.php 后台数据库配置
Library		函数目录 （不定期新增）
   |-	Medoo.php	数据库类            
   |-	Php_error.php	错误提示类
   |-	Twig	模板引擎类
   |-	ClassTree.class.php	分类归梯类
   |-	Post_Get.php	POST GET过滤类
   |-   Session.php  Session类
   |-   Editormd.uploader.class.php 编辑器上传类
   |-   File.class.php  文件操作类
   |-   Page.php 分页类
Templates		前台模板目录
Cache		模板缓存目录
404.html		404错误页面
.htaccess		伪静态、去掉index.php配置文件
Config.php		前台框架配置文件
index.php		前台框架入口文件
```

## 后台截图

![](/Public/Uploads/1.png)
![](/Public/Uploads/2.png)

## 模板引擎
- Twig是一款灵活、快速、安全的PHP模板引擎。
- 快速：Twig将模板编译为纯粹的，最优化的PHP代码。它的开销与常规的PHP代码相比，已经降到了极低。
- 安全：Twig拥有沙盒模式，用于评估未受信任的模板代码。这使得Twig可以用于允许用户自行修改模板设计的应用程序中。

## 具体如何使用？

index.php为例：加载模板文件
```php
echo $twig->render('index.html');  
```
数据传值：
```php
$name = '你好，全端观察世界！';
echo $twig->render('index.html',array('dete'=> $name));
```
具体语法请参考Twig

## 数据使用

- Medoo是一款超轻量级的PHP SQL数据库框架,由社交网站Catfan和开源项目Qatrix的创始人开发。
- 提供了简单,易学,灵活的API,提升开发Web应用的效率与性能,而且体积只有22KB。
new.php为例,获取数据传值模板：
```php
$datas = $_DB->select("tokyo_users", [
    "id",
    "username",
    "password"
]);
echo $twig->render('new.html', array('user' => $datas));       
```
new.html为例,模板循环：
```php
 {% for v in user %}
  <li><a href="#"> {{ v.id }} - {{ v.username }} </a>
  {% endfor %}            
```

## Aaache伪静态规则
```php
<IfModule mod_rewrite.c>
  Options +FollowSymlinks -Multiviews
  RewriteEngine On
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{QUERY_STRING} ^(.*)$
  RewriteRule ^index.html$ index.php
  RewriteRule ^admin$ /App/Admin/Index.php
  ReWriteRule ^new.html$ /App/Home/new.php
  ReWriteRule ^content_([0-9]+).html$ /App/Home/content.php?id=$1
  ErrorDocument 404 /Public/404.html
</IfModule>          
```

## nginx规则
```php

if (!-d $request_filename){
	set $rule_0 1$rule_0;
}
if (!-f $request_filename){
	set $rule_0 2$rule_0;
}
if ($args ~ "^(.*)$"){
	set $rule_0 3$rule_0;
}
if ($rule_0 = "321"){
	rewrite ^/index.html$ /index.php;
}
	rewrite ^/admin$ /App/Admin/Index.php;
      
```

## 应用第三方开源

- 编辑器 [Editor.md Examples][1]   
- 数据库处理 [Medoo][2] 
- 错误提示 [PHP ERROR][3]
- 模板引擎 [TWIG][4]
- 后台模板 [Bootstrapious][5]

## 感谢

- 汶（广州）   解决了技术方案
- 老钱（上海） 提出了思路方案


  [1]: http://pandao.github.io/editor.md/examples/
  [2]: https://medoo.lvtao.net/
  [3]: https://github.com/JosephLenton/PHP-Error
  [4]: https://twig.symfony.com/
  [5]: https://bootstrapious.com/p/bootstrap-4-dark-admin-premium
