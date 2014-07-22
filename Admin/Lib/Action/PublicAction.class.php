<?php

/*
 * 不需要验证的模块
 */
class PublicAction extends Action{
    
    protected function _initialize(){
        import('ORG.Util.Input');
    }
    //用于检测public模块中某些action是否已经登录
    private function checkIfLogin(){
        if(!$_SESSION['is_login']){
            $this->redirect('Public/login');
        }
    }
    
    //后台首页
    public function index(){
        $this->checkIfLogin();
        $this->display();
    }
    
    //后台首页顶部
    public function top(){
        $this->checkIfLogin();
        C ( 'SHOW_PAGE_TRACE', false );
        $this->display();
    }
    
    //左侧
    public function menu(){
        $this->checkIfLogin();
        C ( 'SHOW_PAGE_TRACE', false );
        $this->display();
    }
    
    //右侧主要部分
    public function main(){
        $this->checkIfLogin();
        $info = array(
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式'=>php_sapi_name(),
            'ThinkPHP版本'=>THINK_VERSION.' [ <a href="http://thinkphp.cn" target="_blank">查看最新版本</a> ]',
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',
            '服务器时间'=>date("Y年n月j日 H:i:s"),
            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '剩余空间'=>round((@disk_free_space(".")/(1024*1024)),2).'M',
            'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
            'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
            'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
            );
        $this->assign('info',$info);
        $this->display();
    }
    
    //登录页面
    public function login(){
        $this->display();
    }
    
    //检查登录页面
    public function checkLogin(){
        if(IS_POST&&isset($_POST['username'])&&isset($_POST['password'])){
            if(md5($_POST['verify'])	!= session('verify')){
                $this->error('验证码错误');
            }
            //通过绑定参数来防止sql注入
            $username=  Input::getVar('username');
            $password=I('password','','md5');
            $status=1;
            $user_info=M('admin')->where("username='%s' and password='%s' and status=%d",array($username,$password,$status))->find();
            if(!empty($user_info)){
                session(C('USER_AUTH_KEY'),$user_info['id']);
                session('username',$user_info['username']);
                session('is_login',true);  //用于表示已经登录
                if($user_info['username']==C('RBAC_SUPERADMIN')){
                    session(C('ADMIN_AUTH_KEY'),TRUE);
                }
                import('ORG.Util.RBAC');
                RBAC::saveAccessList();
                $this->success('登录成功','index');
            }else{
                $this->error('用户名或密码错误');
            }
        }
    }
    


    //登出页面
    public function logout(){
        unset($_SESSION[C('USER_AUTH_KEY')]);
        unset($_SESSION);
        session_destroy();
        $this->success('注销成功','login');
    }
    
    验证码
    public function verify(){
        import('ORG.Util.Image');
	Image::buildImageVerify();
    }
    
    
    //测试页面
//    public function test(){
//        $i="'1";
//        $k=  Input::getVar($i);
//        echo ($k);
//    }
}

