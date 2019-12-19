<?php
/**
 * WeChat - Devtools by BaoJia Li
 *
 * @package     WeChatDevtools
 *
 * @author      BaoJia Li
 * @User        king/QQ:995265288
 * @Date        2019/12/6 5:25 PM
 * @link        https://gitee.com/li-bao-jia
 */

namespace BaoJiaLi\WeChatDevtools\Facades;


use BaoJiaLi\WeChatDevtools\DevtoolsService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static login($format = 'image', $qrOutput = '', $resultOutput = '')
 * @method static loginOutput($resultOutput = '')
 * @method static removeLoginOutput($qrOutput = '', $resultOutput = '')
 * @method static modify($appId, $version ='', $description = '', $projectPath = '')
 * @method static upload($projectPath = '', $version = '', $desc = '', $infoOutput = '')
 * @method static uploadOutput()
 * @method static removeUploadOutput($infoOutput = '')
 * @method static close($projectPath = '')
 *
 * Class Devtools
 * @package BaoJiaLi\WeChatDevtools\Facades
 */
class Devtools extends Facade
{
    /**
     * @see DevtoolsService
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Devtools';
    }
}
