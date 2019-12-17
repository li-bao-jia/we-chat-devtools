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
     * @return mixed
     */
    public function action($projectPath = '')
    {
        $this->setProjectPath($projectPath);

        return $this->send('close', [strtolower('projectPath') => $this->projectPath]);
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
