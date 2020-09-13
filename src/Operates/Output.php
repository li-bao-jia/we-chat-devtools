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
                    if (isset($result['status']) && $result['status'] == 'SUCCESS' && $this->remove == true) {
                        $this->removeOutput();
                    }
                }
                !$content && $content = '{"code":-1,"error":"File read error, check for file existence or file read permissions","status":"FAIL"}';
            }
        } catch (\Exception $exception) {

        }
        return $content;
    }

    private function removeOutput()
    {
        is_file($this->infoOutput) && $result = unlink($this->infoOutput);
//        return $result ? '{"code":0,"message":"Remove output successfully","status":"SUCCESS"}' : '{"code":-1,"error":"Failed to remove output","status":"FAIL"}';
    }
}
