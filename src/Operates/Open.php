<?php
/****************************************************************
 * Author:  king -- LiBaoJia
 * Date:    2020/9/10 10:35 PM
 * Email:   livsyitian@163.com
 * QQ:      995265288
 * IDE:     PhpStorm
 * User:    芸众商城 www.yunzshop.com
 ****************************************************************/


namespace BaoJiaLi\WeChatDevtools\Operates;


use BaoJiaLi\WeChatDevtools\Traits\CurlTrait;

class Open implements IOperate
{
    use CurlTrait;

    public function action()
    {
        return $this->send('open');
    }
}
