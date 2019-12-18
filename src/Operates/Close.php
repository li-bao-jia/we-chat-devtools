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

class Close
{
    use CurlTrait;

    /**
     * @var string
     */
    private $projectPath;

    /**
     * Close the current project window | 关闭当前项目窗口
     *
     * @param string $projectPath
     *
     * @return string
     */
    public function action($projectPath = '')
    {
        $this->setProjectPath($projectPath);

        $result = $this->send('close', [strtolower('projectPath') => $this->projectPath]);

        if ($result === false) {
            return '{"code":-1,"error":"Incorrect closing operation","status":"FAIL"}';
        }
        return '{"code":0,"message":"Close operation succeeded","status":"SUCCESS"}';
    }

    /**
     * @param string $projectPath
     */
    private function setProjectPath($projectPath)
    {
        $this->projectPath = $projectPath ?: $this->defaultProjectPath();
    }

    /**
     * @return string
     */
    private function defaultProjectPath()
    {
        return \Config::get('devtools.applet_path');
    }
}
