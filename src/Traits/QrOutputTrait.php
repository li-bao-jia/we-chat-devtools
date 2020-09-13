<?php


namespace BaoJiaLi\WeChatDevtools\Traits;


trait QrOutputTrait
{
    /**
     * 二维码图片名称
     *
     * @var string
     */
    protected $qrOutput;

    /**
     * 指定二维码图片名称，或有结束符号的绝对地址，或是全路径（路径 + 图片名称），默认格式为 png
     *
     * @param string $qrOutput
     *
     * @return $this
     */
    public function setQrOutputFile($qrOutput = '')
    {
        $this->qrOutput = $this->validateQrOutput($qrOutput);

        return $this;
    }

    /**
     * @param string $qrOutput
     *
     * @return string
     */
    private function validateQrOutput($qrOutput)
    {
        return $this->qrOutputPath($qrOutput) . $this->qrOutputFile($qrOutput);
    }

    /**
     * 字符串中路径部分，无:返回默认存储路径
     *
     * @param string $qrOutput
     *
     * @return string
     */
    private function qrOutputPath($qrOutput)
    {
        return $this->askPath($this->_qrOutputPath($qrOutput) ?: $this->defaultPath());
    }

    /**
     * 字符串中图片名称部分，无:返回默认图片名称
     *
     * @param string $qrOutput
     *
     * @return string
     */
    private function qrOutputFile($qrOutput)
    {
        return $this->askFile($this->_qrOutputFile($qrOutput) ?: $this->defaultFile());
    }

    /**
     * 字符串中路径部分
     *
     * @param string $qrOutput
     *
     * @return string
     */
    private function _qrOutputFile($qrOutput)
    {
        if(strripos($qrOutput, DIRECTORY_SEPARATOR) === false) {
            return $qrOutput;
        }
        return substr($qrOutput, strripos($qrOutput, DIRECTORY_SEPARATOR) + 1);
    }

    /**
     * 字符串中图片名称部分
     *
     * @param string $qrOutput
     *
     * @return string
     */
    private function _qrOutputPath($qrOutput)
    {
        return substr($qrOutput, 0, strrpos($qrOutput, DIRECTORY_SEPARATOR));
    }

    /**
     * 验证文件是否 .png 结尾，如果不是 添加 .png结尾
     *
     * @param string $file
     *
     * @return string
     */
    private function askFile($file)
    {
        return substr($file, -4) == ".png" ? $file : $file . '.png';
    }

    /**
     * 验证路径是否存在结束符号，不存在添加结束符号
     *
     * @param string $path
     *
     * @return string
     */
    private function askPath($path)
    {
        $this->createPath($path);

        return substr($path, -1) == DIRECTORY_SEPARATOR ? $path : $path . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string $dirs
     */
    private function createPath($dirs)
    {
        !is_dir($dirs) && mkdir($dirs, 0755, true);
    }

    /**
     * 默认二维码图片名
     *
     * @return string
     */
    private function defaultFile()
    {
        return "qr.png";
    }

    /**
     * 默认存储路径
     *
     * @return string
     */
    private function defaultPath()
    {
        return \Config::get('devtools.output_path');
    }
}
