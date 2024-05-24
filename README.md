# we-chat-devtools

### 微信开发者工具小程序上传封装SDK（PHP）

PHP 开发环境下，开发者可以通 HTTP 请求指示工具进行登录、预览、上传等操作。

## 需求

- PHP >= 7.0.0

## 安装

> 通过 Composer 安装 we-chat-devtools

1.项目目录下执行

    composer require li-bao-jia/we-chat-devtools

2.或编辑 composer.json 文件安装

    "require": {
        "li-bao-jia/we-chat-devtools": "*"
    }

## 用法

    1、使用前，你需要根据具操作系统了解微信开发者工具端口号文件位置：

        macOS : ~/Library/Application Support/微信开发者工具/<开发者工具安装路径的MD5>/Default/.ide
        
        Windows : ~/AppData/Local/微信开发者工具/User Data/<开发者工具安装路径的MD5>/Default/.ide
    
    2、如果你已经获取了端口号
        
        2.1、你可以这样使用

        (new Devtool())->setPort($port)->setMethod('login')->setParameters($parameters)->response()

        或

        (new Devtool(['port' => $port]))->setMethod('login')->setParameters($parameters)->response()

    3、如果你想自动获取端口号，可以这样

        3.1、你需要提供你的安装路径 install_path、端口前缀 port_path_prefix、端口后缀 port_path_suffix，如下：

        (new Devtool([
            'install_path' => "/Applications/wechatwebdevtools.app/Contents/MacOS",
            'port_path_prefix' => "/Users/my-name/Library/Application Support/微信开发者工具",
            'port_path_suffix' => "/Default/.ide"
        ]))->setMethod('login')->setParameters($parameters)->response()

        或

        (new Devtool())->setConfig([
            'install_path' => "/Applications/wechatwebdevtools.app/Contents/MacOS",
            'port_path_prefix' => "/Users/my-name/Library/Application Support/微信开发者工具",
            'port_path_suffix' => "/Default/.ide"
        ])->setMethod('login')->setParameters($parameters)->response()

        
    4、……

## 方法

|方法  | 参数                | 返回    | 注释            |
|----|-------------------|-------|---------------|
| setConfig | array $config     | $this | 数组的方式改变设置项    |
| setUrl | string $url       | $this | http url 改变方法 |
| setPort | string $port      | $this | 设置端口号         |
| setMethod | string $method    | $this | 设置请求方法        |
| setVersion | string $version   | $this | 定义版本 默认 v2    |
| setParameters | array $parameters | $this | 已数组的方式传递参数    |
| response | _                 | mixed | 开发者工具返回内容     |

微信文档参考:

- [HTTP 调用 · 微信开发者工具 · 小程序](https://developers.weixin.qq.com/miniprogram/dev/devtools/http.html)

## 支持

    ……

## 许可证

这个软件包是根据 [MIT许可证](http://opensource.org/licenses/MIT) 授权的开源软件

## 说明

坚持做一个快乐的开发者

## 计划

+ √ 升级V2，项目重定义
+ ……
+ 
+ x 完成单元测试、自动测试
+ ……
+ 

## 联系方式

- DEVELOPER: BaoJia Li

- QQ: 751818588

- EMAIL: livsyitian@163.com
