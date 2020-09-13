<?php
/****************************************************************
 * Author:  king -- LiBaoJia
 * Date:    2020/9/13 6:07 PM
 * Email:   livsyitian@163.com
 * QQ:      995265288
 * IDE:     PhpStorm
 * User:    芸众商城 www.yunzshop.com
 ****************************************************************/


namespace BaoJiaLi\WeChatDevtools\Traits;


trait ProjectPathTrait
{
    /**
     * 小程序项目路径
     *
     * @var string
     */
    protected $projectPath;

    public function setProjectPath($projectPath = '')
    {
        $this->projectPath = $projectPath;

        return $this;
    }
}
