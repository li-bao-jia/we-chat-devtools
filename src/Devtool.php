<?php
/******************************************************************************************************************
 * @PACKAGE    we-chat-devtool
 *
 * @Author:    king -- LiBaoJia
 * @Date:      12/13/21 6:32 PM
 * @Email:     livsyitian@163.com
 * @User:      King/QQ:751818588
 * @IDE:       PhpStorm
 * @link:      https://gitee.com/li-bao-jia
 * @Homepage:  https://github.com/li-bao-jia
 ******************************************************************************************************************/

namespace BaoJiaLi\WeChatDevtool;


use Exception;

class Devtool
{
    /**
     * 开发者工具基础参数
     *
     * @var array
     */
    private $config = [
        'port'             => '',
        'method'           => '',
        'version'          => 'v2',
        'http_url'         => 'http://127.0.0.1',
        'install_path'     => '',
        'port_path_prefix' => '',
        'port_path_suffix' => ''
    ];

    /**
     * 开发者工具提交参数
     *
     * @var array
     */
    private $parameters;

    public function __construct($config = [], $parameters = [])
    {
        $this->setConfig($config);
        $this->parameters = $parameters;
    }

    /**
     * 设置开发者工具配置参数
     */
    public function setConfig(array $config): Devtool
    {
        foreach ($this->config as $key => $value) {
            if (isset($config[$key])) {
                $this->config[$key] = $config[$key];
            }
        }
        $this->config['port'] = $this->basePort();

        return $this;
    }

    /**
     * 设置 HTTP 请求 url
     */
    public function setUrl(string $url): Devtool
    {
        $this->config['http_url'] = $url;

        return $this;
    }

    /**
     * 设置端口号请求方法
     */
    public function setPort(string $port): Devtool
    {
        $this->config['port'] = $port;

        return $this;
    }

    /**
     * 设置接口请求方法
     */
    public function setMethod(string $method): Devtool
    {
        $this->config['method'] = $method;

        return $this;
    }

    /**
     * 设置版本号参数，默认 v2
     */
    public function setVersion(string $version = 'v2'): Devtool
    {
        $this->config['version'] = $version;

        return $this;
    }

    /**
     * 设置接口其他参数
     */
    public function setParameters(array $parameters): Devtool
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function response()
    {
        foreach ($this->config as $key => $value) {
            if (!$value) {
                throw new Exception($key . ' is empty');
            }
        }
        return $this->httpCurl($this->fullUrl());
    }

    /**
     * URL
     */
    private function fullUrl(): string
    {
        return $this->urlHost() . $this->urlPort() . $this->urlPath() . $this->urlParameters();
    }

    /**
     * URL 主机｜IP
     */
    private function urlHost(): string
    {
        return $this->config['http_url'];
    }

    /**
     * URL 端口
     */
    private function urlPort(): string
    {
        return ':' . $this->config['port'];
    }

    /**
     * URL 路径
     */
    private function urlPath(): string
    {
        return '/' . $this->config['version'] . '/' . $this->config['method'];
    }

    /**
     * URL 参数
     *
     * 生成 URL-encode 之后的请求字符串
     */
    private function urlParameters(): string
    {
        return count($this->parameters) > 0 ? '?' . http_build_query($this->parameters, null) : '';
    }

    /**
     * 端口号
     */
    private function basePort(): string
    {
        return ($port = @file_get_contents($this->portPath())) ? $port : "";
    }

    /**
     * 端口号路径
     */
    private function portPath(): string
    {
        return $this->config['port_path_prefix'] . $this->md5InstallPath() . $this->config['port_path_suffix'];
    }

    /**
     * 开发者工具安装路径的MD5
     */
    private function md5InstallPath(): string
    {
        return DIRECTORY_SEPARATOR . md5($this->config['install_path']);
    }

    /**
     * CURL GET
     *
     * @return int|mixed
     */
    private function httpCurl(string $url)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $response = curl_exec($ch);

        curl_close($ch);

        return curl_errno($ch) ?: json_decode($response, true);
    }
}
