<?php


namespace BaoJiaLi\WeChatDevtools\Traits;


trait InfoOutputTrait
{
    /**
     * 移除参数，默认 false
     *
     * @var bool
     */
    protected $remove = false;

    /**
     * 信息输出路径 或 全路径+名称
     *
     * @var string
     */
    protected $infoOutput;

    /**
     * 指定结果输出文件路径，或有结束符号的绝对地址，或是全路径（路径 + 文件名称），默认格式为 json
     * $remove 等于 true 时，删除输出文件
     *
     * @param string $infoOutput
     * @param bool $remove
     *
     * @return $this
     */
    public function setInfoOutputFile($infoOutput = '', $remove = false)
    {
        $this->remove = (bool)$remove;
        $this->infoOutput = $this->validateInfoOutput($infoOutput);

        return $this;
    }

    /**
     * @param string $infoOutput
     *
     * @return string
     */
    private function validateInfoOutput($infoOutput)
    {
        return $this->infoOutputPath($infoOutput) . $this->infoOutputFile($infoOutput);
    }

    /**
     * 字符串中路径部分，无:返回默认存储路径
     *
     * @param string $infoOutput
     *
     * @return string
     */
    private function infoOutputPath($infoOutput)
    {
        return $this->askInfoOutputPath($this->_infoOutputPath($infoOutput) ?: $this->defaultInfoOutputPath());
    }

    /**
     * 字符串中图片名称部分，无:返回默认图片名称
     *
     * @param string $infoOutput
     *
     * @return string
     */
    private function infoOutputFile($infoOutput)
    {
        return $this->askInfoOutputFile($this->_infoOutputFile($infoOutput) ?: $this->defaultInfoOutputFile());
    }

    /**
     * 字符串中路径部分
     *
     * @param string $infoOutput
     *
     * @return string
     */
    private function _infoOutputFile($infoOutput)
    {
        if (strripos($infoOutput, DIRECTORY_SEPARATOR) === false) {
            return $infoOutput;
        }
        return substr($infoOutput, strripos($infoOutput, DIRECTORY_SEPARATOR) + 1);
    }

    /**
     * 字符串中图片名称部分
     *
     * @param string $infoOutput
     *
     * @return string
     */
    private function _infoOutputPath($infoOutput)
    {
        return substr($infoOutput, 0, strrpos($infoOutput, DIRECTORY_SEPARATOR));
    }

    /**
     * 验证文件是否 .json 结尾，如果不是 添加 .json结尾
     *
     * @param string $file
     *
     * @return string
     */
    private function askInfoOutputFile($file)
    {
        return substr($file, -5) == ".json" ? $file : $file . '.json';
    }

    /**
     * 验证路径是否存在结束符号，不存在添加结束符号
     *
     * @param string $path
     *
     * @return string
     */
    private function askInfoOutputPath($path)
    {
        $this->createInfoOutputPath($path);

        return substr($path, -1) == DIRECTORY_SEPARATOR ? $path : $path . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string $dirs
     */
    private function createInfoOutputPath($dirs)
    {
        !is_dir($dirs) && $this->mkdir_r($dirs, 0755);
    }

    /**
     * 兼容 window 服务器不能递归创建目录
     *
     * @param $dirName
     * @param int $rights
     */
    private function mkdir_r($dirName, $rights = 0777)
    {
        $dirs = explode(DIRECTORY_SEPARATOR, $dirName);
        $dir = '';
        foreach ($dirs as $part) {
            $dir .= $part . DIRECTORY_SEPARATOR;
            if (!is_dir($dir) && strlen($dir) > 0) mkdir($dir, $rights);
        }
    }

    /**
     * 默认二维码图片名
     *
     * @return string
     */
    private function defaultInfoOutputFile()
    {
        return "info.json";
    }

    /**
     * 默认存储路径
     *
     * @return string
     */
    private function defaultInfoOutputPath()
    {
        return \Config::get('devtools.output_path');
    }
}
