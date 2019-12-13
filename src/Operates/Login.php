<?php
/**
 * WeChat - Applet by BaoJia Li
 *
 * @author      BaoJia Li
 * @User        king/QQ:995265288
 * @Tool        PhpStorm
 * @Date        2019/12/13  9:38 AM
 * @link        https://gitee.com/li-bao-jia
 */

namespace BaoJiaLi\WeChatDevtools\Operates;


use BaoJiaLi\WeChatDevtools\Traits\CurlTrait;

class Login
{
    use CurlTrait;

    /**
     * Login QR code return format, optional values are image, base64, terminal, default image.
     *
     * @var string
     */
    private $format = 'images';

    /**
     * Login QR code output path
     *
     * @var string
     */
    private $qrOutput;

    /**
     * Login result output path
     *
     * @var string
     */
    private $resultOutput;

    /**
     * Login | 登陆
     *
     * @param string $format
     * @param string $qrOutput
     * @param string $resultOutput
     *
     * @return mixed
     */
    public function action($format = 'image', $qrOutput = '', $resultOutput = '')
    {
        $params = $this->params($format, $qrOutput, $resultOutput);

        return $this->send('open', $params);
    }

    /**
     * Qr Code path
     *
     * @return string
     */
    public function qrCode()
    {
        return is_file($this->qrOutput) ? $this->qrOutput : '';
    }

    /**
     * @return string
     */
    public function output()
    {
        try {
            $content = file_get_contents($this->resultOutput);

            !$content && $content = '{"error":"File read error, check for file existence or file read permissions","status":"FAIL"}';

        } catch (\Exception $exception) {
            $content = '{"error":"QR code expired, please try again","status":"Wait"}';
        }
        return $content;
    }

    /**
     * @return bool
     */
    public function removeOutput()
    {
        return unlink($this->resultOutput);
    }

    /**
     * @param string $format
     * @param string $qrOutput
     * @param string $resultOutput
     *
     * @return array
     */
    private function params($format, $qrOutput, $resultOutput)
    {
        $this->setFormat($format);
        $this->setQrOutput($qrOutput);
        $this->setResultOutput($resultOutput);

        return [
            strtolower('format')       => $this->format,
            strtolower('qrOutput')     => $this->qrOutput,
            strtolower('resultOutput') => $this->resultOutput
        ];
    }

    /**
     * @param string $format
     */
    private function setFormat($format)
    {
        in_array($format, $this->defaultFormat()) && $this->format = $format;
    }

    /**
     * @param string $qrOutput
     */
    private function setQrOutput($qrOutput)
    {
        $this->qrOutput = $qrOutput ?: $this->defaultQrPath();
    }

    /**
     * @param string $resultOutput
     */
    private function setResultOutput($resultOutput)
    {
        $this->resultOutput = $resultOutput ?: $this->defaultResultOutput();
    }

    /**
     * Login QR code return format optional values.
     *
     * @return array
     */
    private function defaultFormat()
    {
        return ['image', 'base64', 'terminal'];
    }

    /**
     * Default login qr code path
     *
     * @return string
     */
    private function defaultQrPath()
    {
        return \Config::get('devtools.login_qr');
    }

    /**
     * Default login result output path
     *
     * @return string
     */
    private function defaultResultOutput()
    {
        return \Config::get('devtools.login_output');
    }
}
