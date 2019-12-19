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
use BaoJiaLi\WeChatDevtools\Operates\Upload;

class DevtoolsService
{
    /**
     * @var Login
     */
    private $loginOperate;

    /**
     * @var Upload
     */
    private $uploadOperate;

    /**
     * @var Close
     */
    private $closeOperate;


    public function __construct()
    {
        $this->closeOperate = new Close();
        $this->loginOperate = new Login();
        $this->uploadOperate = new Upload();
    }

    /*
     * Login Class | 登陆操作集合
     * ------------------------------------------------------------------------------------------
     */
    /**
     * Login | 登录
     *
     * @param string $format
     * @param string $qrOutput
     * @param string $resultOutput
     *
     * @return string
     */
    public function login($format = 'image', $qrOutput = '', $resultOutput = '')
    {
        return $this->loginOperate->action($format = 'image', $qrOutput, $resultOutput);
    }

    /**
     * Login result output | 登陆结果
     *
     * @param string $resultOutput
     *
     * @return string
     */
    public function loginOutput($resultOutput = '')
    {
        return $this->loginOperate->output();
    }

    /**
     * Remove login result output file | 移除登陆输出文件
     *
     * @return bool
     */
    public function removeLoginOutput()
    {
        return $this->loginOperate->removeOutput();
    }

    /*
     * Modify Class | 修改小程序AppId
     * ------------------------------------------------------------------------------------------
     */
    /**
     * Modify WeChat Mini Program appId ｜ 修改微信小程序 appId
     *
     * @param string $appId
     * @param string $version
     * @param string $description
     * @param string $projectPath
     *
     * @return bool
     */
    public function modify($appId, $version ='', $description = '', $projectPath = '')
    {
        return (new Modify())->action($appId, $version, $description, $projectPath);
    }

    /*
     * Upload Class | 上传操作集合
     * ------------------------------------------------------------------------------------------
     */
    /**
     * Upload result output | 上传结果
     *
     * @param string $projectPath
     * @param string $version
     * @param string $desc
     * @param string $infoOutput
     *
     * @return mixed
     */
    public function upload($projectPath = '', $version = '', $desc = '', $infoOutput = '')
    {
        return $this->uploadOperate->action($projectPath, $version, $desc, $infoOutput);
    }

    /**
     * Upload info output | 上传包信息
     *
     * @return string
     */
    public function uploadOutput()
    {
        return $this->uploadOperate->output();
    }

    /**
     * Remove upload result output file | 移除上传输出文件
     *
     * @param string $infoOutput
     *
     * @return string
     */
    public function removeUploadOutput($infoOutput = '')
    {
        return $this->uploadOperate->removeOutput($infoOutput);
    }

    /*
     * Close Class | 关闭操作集合
     * ------------------------------------------------------------------------------------------
     */
    /**
     * Close the current project window | 关闭当前项目窗口
     *
     * @param string $projectPath
     *
     * @return mixed
     */
    public function close($projectPath = '')
    {
        return $this->closeOperate->action($projectPath);
    }
}
