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

namespace BaoJiaLi\WeChatDevtools;


class DevtoolsService
{
    /*
     * 打开工具
     */
    public function open()
    {
        return $this->action('open');
    }

    /*
     * 打开指定项目
     */
    public function openProject($projectPath)
    {
        return $this->action('open', [strtolower('projectPath') => $projectPath]);
    }

    /*
     * 登录
     */
    public function login($format = 'image', $qrOutput = '', $resultOutput = '')
    {
        return $this->action('login', [
            strtolower('format')       => $format,
            strtolower('qrOutput')     => $qrOutput,
            strtolower('resultOutput') => $resultOutput
        ]);
    }

    /*
     * 预览
     */
    public function preview($projectPath = '', $format = '', $qrOutput = '', $infoOutput = '', $compileCondition = '')
    {
        return $this->action('preview', [
            strtolower('format')           => $format,
            strtolower('qrOutput')         => $qrOutput,
            strtolower('infoOutput')       => $infoOutput,
            strtolower('projectPath')      => $projectPath,
            strtolower('compileCondition') => $compileCondition
        ]);
    }

    /*
     * 上传
     */
    public function upload($projectPath = '', $version = '', $desc = '', $infoOutput = '')
    {
        return $this->action('upload', [
            strtolower('desc')        => $desc,
            strtolower('version')     => $version,
            strtolower('infoOutput')  => $infoOutput,
            strtolower('projectPath') => $projectPath
        ]);
    }

    /*
     * 构建 npm
     */
    public function buildNpm($projectPath = '', $compileType = '')
    {
        return $this->action('buildnpm', [
            strtolower('compileType') => $compileType,
            strtolower('projectPath') => $projectPath
        ]);
    }

    /*
     * 自动预览
     */
    public function autoPreview($projectPath = '', $infoOutput = '')
    {
        return $this->action('/autopreview', [
            strtolower('infoOutput')  => $infoOutput,
            strtolower('projectPath') => $projectPath
        ]);
    }

    /*
     * 关闭
     */
    public function close()
    {
        return $this->action('close');
    }

    /*
     * 关闭指定项目窗口
     */
    public function closeProject($projectPath)
    {
        return $this->action('close', [strtolower('projectPath') => $projectPath]);
    }

    /*
     * 关闭开发者工具
     */
    public function quit()
    {
        return $this->action('quit');
    }

    /**
     * @param string $method
     * @param array $params
     * @return mixed
     */
    private function action($method, $params = [])
    {
        $url = $this->getUrl($method);

        return \Curl::to($url)->withData($params)->get();
    }

    /**
     * @param string $method
     * @return string
     */
    private function getUrl($method)
    {
        return "http://127.0.0.1/{$method}";
    }
}
