<?php
/**
 * WeChat - Applet by BaoJia Li
 *
 * @author      BaoJia Li
 * @User        king/QQ:995265288
 * @Tool        PhpStorm
 * @Date        2019/12/17  9:42 AM
 * @link        https://gitee.com/li-bao-jia
 */

namespace BaoJiaLi\WeChatDevtools\Operates;


use BaoJiaLi\WeChatDevtools\Traits\CurlTrait;
use BaoJiaLi\WeChatDevtools\Traits\ProjectPathTrait;

class Close implements IOperate
{
    use ProjectPathTrait, CurlTrait;

    /**
     * 关闭当前项目窗口 | Close the current project window
     *
     * @param string $projectPath
     *
     * @return string
     */
    public function action()
    {
        if (!$this->projectPath) {
            return '{"code":-1,"error":"Project Path cannot be empty","status":"FAIL"}';
        }
        $result = $this->send('close', [strtolower('projectPath') => $this->projectPath]);

        if ($result === false) {
            return '{"code":-1,"error":"Incorrect closing operation","status":"FAIL"}';
        }
        return '{"code":0,"message":"Close operation succeeded","status":"SUCCESS"}';
    }
}
