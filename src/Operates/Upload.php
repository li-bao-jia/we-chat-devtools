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
     * @return string
     */
    public function output()
    {
        $error = '{"error":"File read error, check for file existence or file read permissions","status":"FAIL"}';
        try {
            $content = file_get_contents($this->infoOutput);

            !$content && $content = $error;

        } catch (\Exception $exception) {
            $content = $error;
        }
        return $content;
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
        $this->desc = !$desc ? $desc : '';
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
