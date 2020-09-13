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


use BaoJiaLi\WeChatDevtools\Traits\ProjectPathTrait;

class Modify
{
    use ProjectPathTrait;

    /**
     * @var string
     */
    private $appId;

    /**
     * 修改微信小程序 appId ｜ Modify WeChat Mini Program appId
     *
     * @return bool
     */
    public function action()
    {
        return $this->updateAppId();
    }

    /**
     * @param string $appId
     *
     * @return Modify
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;

        return $this;
    }

    /**
     * @return string
     */
    private function updateAppId()
    {
        if (!$this->appId) {
            return '{"code":-1,"error":"App Id cannot be empty","status":"FAIL"}';
        }
        if (!$this->projectPath) {
            return '{"code":-1,"error":"Project Path cannot be empty","status":"FAIL"}';
        }
        try {
            $content = file_get_contents($this->projectPath);

            $content ? $content = json_decode($content, true) : $result = false;

            $content['appid'] = $this->appId;

            $result = !!file_put_contents($this->projectPath, json_encode($content, true));

        } catch (\Exception $exception) {
            $result = false;
        }
        return $result ? '{"code":0,"message":"AppId changed successfully","status":"SUCCESS"}' : '{"code":-1,"error":"Failed to change AppId","status":"FAIL"}';
    }
}
