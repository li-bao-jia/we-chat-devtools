<?php
/****************************************************************
 * Author:  king -- LiBaoJia
 * Date:    2020/9/9 8:18 PM
 * Email:   livsyitian@163.com
 * QQ:      995265288
 * IDE:     PhpStorm
 * User:    芸众商城 www.yunzshop.com
 ****************************************************************/


namespace BaoJiaLi\WeChatDevtools\Traits;


trait QrFormatTrait
{
    /**
     * 指定登录二维码返回格式，图片格式为 png
     *
     * @var string
     */
    protected $qrFormat = 'image';

    /**
     * 指定登录二维码返回格式，可选值有 image、base64、terminal
     *
     * @param string $qrFormat
     *
     * @return $this
     */
    public function setQrFormat($qrFormat = 'image')
    {
        in_array($qrFormat, $this->defaultQrFormat()) && $this->qrFormat = $qrFormat;

        return $this;
    }

    /**
     * 二维码默认格式集合
     *
     * @return array
     */
    private function defaultQrFormat()
    {
        return ['image', 'base64', 'terminal'];
    }
}
