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
    | WeChat applet project path
    |--------------------------------------------------------------------------
    |
    | Store WeChat Applet Code Path
    |
    */

    'applet_path' => '',

    /*
    |--------------------------------------------------------------------------
    | WeChat devtools port number file location
    |--------------------------------------------------------------------------
    |
    | macOS : ~/Library/Application Support/微信开发者工具/Default/.ide
    |
    | Windows : ~/AppData/Local/微信开发者工具/User Data/Default/.ide

    */

    'port_path' => '',

    /*
    |--------------------------------------------------------------------------
    | WeChat devtools default login qr code path
    --------------------------------------------------------------------------
    |
    | Specify the file path and write the QR code data in the file
    |
    | If specified, the QR code will be written to the file in the specified path.
    |
    | If not specified, the QR code will be returned as the request response
    |
    */

    'login_qr' => storage_path('app/public/devtools/login_qr.png'),

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

    'login_output' => storage_path('app/public/devtools/login_output.json'),

    /*
    |--------------------------------------------------------------------------
    | WeChat devtools upload info output path
    --------------------------------------------------------------------------
    |
    | The extra information uploaded this time will be output to the specified path in json format
    |
    | Such as code package size and subpackage size information.
    |
    */

    'upload_output' => storage_path('app/public/devtools/upload_output.txt'),

    /*
    |--------------------------------------------------------------------------
    | WeChat devtools default http url
    |--------------------------------------------------------------------------
    |
    */

    'http_url' => 'http://127.0.0.1',
];
