<?php
/**
 * WeChat - Applet by BaoJia Li
 *
 * @author      BaoJia Li
 * @User        king/QQ:995265288
 * @Tool        PhpStorm
 * @Date        2019/12/13  10:43 AM
 * @link        https://gitee.com/li-bao-jia
 */

namespace BaoJiaLi\WeChatDevtools\Traits;


trait CurlTrait
{
    /**
     * @param string $method
     * @param array $params
     *
     * @return mixed
     */
    private function send($method, $params = [])
    {
        $url = $this->getUrl($method);

        return \Curl::to($url)->withData($params)->get();
    }

    /**
     * @param string $method
     *
     * @return string
     */
    private function getUrl($method)
    {
        $port = $this->getPort();

        return "http://127.0.0.1:{$port}/v2/{$method}";
    }

    /**
     * @return string
     */
    private function getPort()
    {
        try {
            $port =  file_get_contents($this->portPath());
        } catch (\Exception $exception) {
            $port = '';
        }
        return $port;
    }

    /**
     * @return mixed
     */
    private function portPath()
    {
        return \Config::get('devtools.port_path');
    }

}
