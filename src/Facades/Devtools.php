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
