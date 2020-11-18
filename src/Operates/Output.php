<?php
/****************************************************************
 * Author:  king -- LiBaoJia
 * Date:    2020/9/13 7:43 PM
 * Email:   livsyitian@163.com
 * QQ:      995265288
 * IDE:     PhpStorm
 * User:    芸众商城 www.yunzshop.com
 ****************************************************************/


namespace BaoJiaLi\WeChatDevtools\Operates;


use BaoJiaLi\WeChatDevtools\Traits\InfoOutputTrait;

class Output implements IOperate
{
    use InfoOutputTrait;

    public function action()
    {
        if (!$this->infoOutput) {
            return '{"code":-1,"error":"Wrong output path","status":"FAIL"}';
        }
        try {
            $content = '{"code":0,"error":"Results waiting, please try again later","status":"WAIT"}';
            if (is_file($this->infoOutput)) {
                $content = file_get_contents($this->infoOutput);
                if ($content) {
                    $result = json_decode($content, true);
                    //二维码登录输出返回 status == SUCCESS  上传输出返回 size 包信息
                    if (isset($result['size'])) $content = '{"code":0,"status":"SUCCESS"}';
                }
                !$content && $content = '{"code":-1,"error":"File read error, check for file existence or file read permissions","status":"FAIL"}';
            }
            if ($this->remove == true) $this->removeOutput();
        } catch (\Exception $exception) {

        }
        return $content;
    }

    /**
     * 如果标记删除，删除输出文件
     */
    private function removeOutput()
    {
        is_file($this->infoOutput) && unlink($this->infoOutput);
    }
}
