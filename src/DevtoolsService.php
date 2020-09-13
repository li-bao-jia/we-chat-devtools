<?php
/**
 * WeChat - Devtools by BaoJia Li
 *
 * @package     WeChatDevtools
 *
 * @author      BaoJia Li
 * @User        king/QQ:995265288
 * @Date        2019/12/6 5:25 PM
 * @link        https://gitee.com/li-bao-jia
 */

namespace BaoJiaLi\WeChatDevtools;


use BaoJiaLi\WeChatDevtools\Operates\Close;
use BaoJiaLi\WeChatDevtools\Operates\Login;
use BaoJiaLi\WeChatDevtools\Operates\Modify;
use BaoJiaLi\WeChatDevtools\Operates\Open;
use BaoJiaLi\WeChatDevtools\Operates\Output;
use BaoJiaLi\WeChatDevtools\Operates\Upload;

class DevtoolsService
{
    /**
     * @var Open
     */
    private $openOperate;

    /**
     * @var Login
     */
    private $loginOperate;

    /**
     * @var Modify
     */
    private $modifyOperate;

    /**
     * @var Upload
     */
    private $uploadOperate;

    /**
     * @var Close
     */
    private $closeOperate;

    /**
     * 启动 | open
     *
     * @return Open
     */
    public function open()
    {
        !isset($this->openOperate) && $this->openOperate = new Open();

        return $this->openOperate;
    }

    /**
     * 登录 | Login
     *
     * @return Login
     */
    public function login()
    {
        !isset($this->loginOperate) && $this->loginOperate = new Login();

        return $this->loginOperate;
    }

    /**
     * 修改微信小程序 appId ｜ Modify WeChat Mini Program appId
     *
     * @return Modify
     */
    public function modify()
    {
        !isset($this->modifyOperate) && $this->modifyOperate = new Modify();

        return $this->modifyOperate;
    }

    /**
     * 上传结果 | Upload result output
     *
     * @return Upload
     */
    public function upload()
    {
        !isset($this->uploadOperate) && $this->uploadOperate = new Upload();

        return $this->uploadOperate;
    }

    /**
     * 读取路径文件，输出文件内容 | Info output
     *
     * @param string $infoOutput
     *
     * @return string
     */
    public function output($infoOutput = '')
    {
        !isset($this->output) && $this->output = new Output();

        return $this->output;
    }

    /**
     * Close the current project window | 关闭当前项目窗口
     *
     * @param string $projectPath
     *
     * @return mixed
     */
    public function close()
    {
        !isset($this->closeOperate) && $this->closeOperate = new Close();

        return $this->closeOperate;
    }
}
