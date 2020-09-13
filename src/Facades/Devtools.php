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
use BaoJiaLi\WeChatDevtools\Operates\Close;
use BaoJiaLi\WeChatDevtools\Operates\Login;
use BaoJiaLi\WeChatDevtools\Operates\LoginOutput;
use BaoJiaLi\WeChatDevtools\Operates\Modify;
use BaoJiaLi\WeChatDevtools\Operates\Open;
use BaoJiaLi\WeChatDevtools\Operates\Output;
use BaoJiaLi\WeChatDevtools\Operates\Upload;
use Illuminate\Support\Facades\Facade;

/**
 * @method Open open()
 * @method Close close()
 * @method Login login()
 * @method Modify modify()
 * @method Upload upload()
 * @method Output output()
 *
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
