<?php
/**
 * WeChat - Applet by BaoJia Li
 *
 * @author      BaoJia Li
 * @User        king/QQ:995265288
 * @Tool        PhpStorm
 * @Date        2019/12/13  9:39 AM
 * @link        https://gitee.com/li-bao-jia
 */

namespace BaoJiaLi\WeChatDevtools\Operates;


use BaoJiaLi\WeChatDevtools\Traits\CurlTrait;

class Upload
{
    use CurlTrait;

    /**
     * @var string
     */
    private $version = '1.0.0';

    /**
     * @var string
     */
    private $desc;

    /**
     * @var string
     */
    private $infoOutput;

    /**
     * @var string
     */
    private $projectPath;

    /**
     * Upload | 上传
     *
     * @param string $projectPath
     * @param string $version
     * @param string $desc
     * @param string $infoOutput
     *
     * @return bool|mixed
     */
    public function action($projectPath = '', $version = '', $desc = '', $infoOutput = '')
    {
        $params = $this->params($projectPath, $version, $desc, $infoOutput);

        return $this->send('upload', $params);
    }

    /**
     * Upload info output | 上传包信息输出
     *
     * @param string $infoOutput
     *
     * @return string
     */
    public function output($infoOutput = '')
    {
        $this->setInfoOutput($infoOutput);
        try {
            $content = '{"code":0,"error":"Uploading results waiting, please try again later","status":"WAIT"}';
            if (is_file($this->infoOutput)) {
                $content = file_get_contents($this->infoOutput);

                !$content && $content = '{"code":-1,"error":"File read error, check for file existence or file read permissions","status":"FAIL"}';
            }

        } catch (\Exception $exception) {

        }
        return $content;
    }

    /**
     * @param string $infoOutput
     *
     * @return string
     */
    public function removeOutput($infoOutput = '')
    {
        $this->setInfoOutput($infoOutput);

        $result = true;

        is_file($this->infoOutput) && $result = unlink($this->infoOutput);

        return $result ? '{"code":0,"message":"Remove upload output successfully","status":"SUCCESS"}' : '{"code":-1,"error":"Failed to remove upload output","status":"FAIL"}';
    }

    /**
     * @param string $projectPath
     * @param string $version
     * @param string $desc
     * @param string $infoOutput
     *
     * @return array
     */
    private function params($projectPath, $version, $desc, $infoOutput)
    {
        $this->setDesc($desc);
        $this->setVersion($version);
        $this->setInfoOutput($infoOutput);
        $this->setProjectPath($projectPath);

        return [
            strtolower('desc')        => $this->desc,
            strtolower('version')     => $this->version,
            strtolower('infoOutput')  => $this->infoOutput,
            strtolower('projectPath') => $this->projectPath
        ];
    }

    /**
     * @param string $projectPath
     */
    private function setProjectPath($projectPath)
    {
        $this->projectPath = $projectPath ? $projectPath : $this->defaultProjectPath();
    }

    /**
     * @param string $version
     */
    private function setVersion($version)
    {
        $version && $this->version = $version;
    }

    /**
     * @param string $desc
     */
    private function setDesc($desc)
    {
        $this->desc = $desc ? $desc : '';
    }

    /**
     * @param string $infoOutput
     */
    private function setInfoOutput($infoOutput)
    {
        $this->infoOutput = $infoOutput ? $infoOutput : $this->defaultInfoOutput();
    }

    /**
     * @return string
     */
    private function defaultInfoOutput()
    {
        return \Config::get('devtools.upload_output');
    }

    /**
     * @return string
     */
    private function defaultProjectPath()
    {
        return \Config::get('devtools.applet_path');
    }
}
