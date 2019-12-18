<?php
/**
 * WeChat - Applet by BaoJia Li
 *
 * @author      BaoJia Li
 * @User        king/QQ:995265288
 * @Tool        PhpStorm
 * @Date        2019/12/13  2:57 PM
 * @link        https://gitee.com/li-bao-jia
 */

namespace BaoJiaLi\WeChatDevtools\Operates;


class Modify
{
    /**
     * @var string
     */
    private $appId;

    /**
     * @var string
     */
    private $projectPath;

    /**
     * Modify WeChat Mini Program appId ｜ 修改微信小程序 appId
     *
     * @param string $appId
     * @param string $projectPath
     *
     * @return bool
     */
    public function action($appId, $projectPath = '')
    {
        $this->setAppId($appId);
        $this->setProjectPath($projectPath);

        return $this->updateAppId();
    }

    /**
     * @param string $appId
     */
    private function setAppId($appId)
    {
        $this->appId = $appId;
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
        return \Config::get('devtools.applet_path') . '/project.config.json';
    }

    /**
     * @return bool
     */
    private function updateAppId()
    {
        if (!$this->appId || !$this->projectPath) {
            return false;
        }
        $result = true;
        try {
            $content = file_get_contents($this->projectPath);

            $content ? $content = json_decode($content, true) : $result = false;

            if ($result) {
                $content['appid'] = $this->appId;

                $result = !!file_put_contents($this->projectPath, json_encode($content, true));
            }
        } catch (\Exception $exception) {
            $result = false;
        }
        return $result ? '{"code":0,"message":"AppId changed successfully","status":"SUCCESS"}' : '{"code":-1,"error":"Failed to change AppId","status":"FAIL"}';
    }
}
