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
use BaoJiaLi\WeChatDevtools\Traits\InfoOutputTrait;
use BaoJiaLi\WeChatDevtools\Traits\QrFormatTrait;
use BaoJiaLi\WeChatDevtools\Traits\QrOutputTrait;

class Login implements IOperate
{
    use QrFormatTrait, QrOutputTrait, InfoOutputTrait, CurlTrait;

    /**
     * 登陆 | Login
     *
     * @return mixed
     */
    public function action()
    {
        $result = $this->send('login', $this->parameters());

        if ($result && $result == $this->qrOutput) {
            return json_encode(['code' => 0, 'qr_code' => $this->qrOutput, 'status' => 'SUCCESS']);
        }
        if (!$result) {
            return json_encode(['code' => -1, 'error' => 'Devtools does not open', 'status' => 'FAIL']);
        }
        return $result;
    }

    private function parameters()
    {
        return [
            'qr-format'     => $this->qrFormat,
            'qr-output'     => $this->qrOutput,
            'result-output' => $this->infoOutput
        ];
    }

//    /**
//     * @param string $resultOutput
//     *
//     * @return string
//     */
//    public function output($resultOutput = '')
//    {
//        $this->setResultOutput($resultOutput);
//        try {
//            $content = '{"code":0,"error":"Scanning results waiting, please try again later","status":"WAIT"}';
//            if (is_file($this->resultOutput)) {
//                $content = file_get_contents($this->resultOutput);
//
//                !$content && $content = '{"code":-1,"error":"File read error, check for file existence or file read permissions","status":"FAIL"}';
//            }
//        } catch (\Exception $exception) {
//
//        }
//        return $content;
//    }
//
//    /**
//     * @param string $qrOutput
//     * @param string $resultOutput
//     *
//     * @return string
//     */
//    public function removeOutput($qrOutput = '', $resultOutput = '')
//    {
//        $this->setQrOutput($qrOutput);
//        $this->setResultOutput($resultOutput);
//
//        $result = true;
//
//        is_file($this->qrOutput) && $result = unlink($this->qrOutput);
//        $result && is_file($this->resultOutput) && $result = unlink($this->resultOutput);
//
//        return $result ? '{"code":0,"message":"Remove login output successfully","status":"SUCCESS"}' : '{"code":-1,"error":"Failed to remove login output","status":"FAIL"}';
//    }
//
//    /**
//     * @param string $qrFormat
//     * @param string $qrOutput
//     * @param string $resultOutput
//     *
//     * @return array
//     */
//    private function params($qrFormat, $qrOutput, $resultOutput)
//    {
//        $this->setQrFormat($qrFormat);
//        $this->setQrOutput($qrOutput);
//        $this->setResultOutput($resultOutput);
//
//        return [
//            strtolower('format')        => $this->qrFormat,
//            strtolower('qrOutput')      => $this->qrOutput,
//            strtolower('result-output') => $this->resultOutput
//        ];
//    }
//
//    /**
//     * @param string $qrFormat
//     */
//    private function setQrFormat($qrFormat)
//    {
//        in_array($qrFormat, $this->defaultFormat()) && $this->qrFormat = $qrFormat;
//    }
//
//    /**
//     * @param string $qrOutput
//     */
//    private function setQrOutput($qrOutput)
//    {
//        $this->qrOutput = $qrOutput ?: $this->defaultQrPath();
//
//        $pathDir = substr($this->qrOutput, 0, strrpos($this->qrOutput, DIRECTORY_SEPARATOR, -4));
//
//        $this->midirs($pathDir);
//    }
//
//    /**
//     * @param string $resultOutput
//     */
//    private function setResultOutput($resultOutput)
//    {
//        $this->resultOutput = $resultOutput ?: $this->defaultResultOutput();
//
//        $pathDir = substr($this->resultOutput, 0, strrpos($this->resultOutput, DIRECTORY_SEPARATOR, -5));
//
//        $this->midirs($pathDir);
//    }
//
//    /**
//     * @param string $dirs
//     */
//    private function midirs($dirs)
//    {
//        !is_dir($dirs) && mkdir($dirs, 0755, true);
//    }
//
//    /**
//     * Login QR code return format optional values.
//     *
//     * @return array
//     */
//    private function defaultFormat()
//    {
//        return ['image', 'base64', 'terminal'];
//    }
//
//    /**
//     * Default login qr code path
//     *
//     * @return string
//     */
//    private function defaultQrPath()
//    {
//        return \Config::get('devtools.login_qr');
//    }
//
//    /**
//     * Default login result output path
//     *
//     * @return string
//     */
//    private function defaultResultOutput()
//    {
//        return \Config::get('devtools.login_output');
//    }
}
