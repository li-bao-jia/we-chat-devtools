<?php
/**
 * WeChat - Applet by BaoJia Li
 *
 * @author      BaoJia Li
 * @User        king/QQ:995265288
 * @Tool        PhpStorm
 * @Date        2019/12/123:42 PM
 * @link        https://gitee.com/li-bao-jia
 */


return [

    /*
    |--------------------------------------------------------------------------
    | WeChat devtools default http url
    |--------------------------------------------------------------------------
    */

    'http_url' => 'http://127.0.0.1',

    /*
    |--------------------------------------------------------------------------
    | 微信开发者工具安装路径
    |--------------------------------------------------------------------------
    |
    | 例：(todo 用来运算"<开发者工具安装路径的MD5>"，暂未使用)
    |
    | macOS: /Applications/wechatwebdevtools.app/Contents/MacOS
    |
    | Windows: C:\Program Files (x86)\Tencent\微信web开发者工具
    |
    */

    'install_path' => env('DEVTOOLS_INSTALL_PATH', ''),

    /*
    |--------------------------------------------------------------------------
    | WeChat devtools default http url
    --------------------------------------------------------------------------
    |
    | Exists in the project directory by default
    |
    | Please replace the path where you want to store the login results
    |
    */

    'output_path' => env('DEVTOOLS_OUTPUT_PATH', ''),

    /*
    |--------------------------------------------------------------------------
    | 微信小程序项目路径
    |--------------------------------------------------------------------------
    |
    | 存储微信小程序代码的绝对路径
    |
    | Store WeChat Applet Code Path
    |
    */

    'applet_path' => env('DEVTOOLS_APPLET_PATH', []),

    /*
    |--------------------------------------------------------------------------
    | 微信开发者工具端口号文件位置绝对路径
    |
    | WeChat devtools port number file location
    |--------------------------------------------------------------------------
    |
    | macOS : ~/Library/Application Support/微信开发者工具
    |
    | Windows : ~/AppData/Local/微信开发者工具/User Data
    */

    'port_path' => env('DEVTOOLS_PORT_PATH', ''),
];
