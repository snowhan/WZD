<?php

/*
 * RBAC后台管理控制
 */

class RbacAction extends CommonAction{
    
    //前台用户列表，node
    public function user_list(){
        $user=M('user')->field(array('id','username','realname','email','status'))->select();
        $this->assign('user',$user);
        $this->display();
    }
    
    //后台用户列表,node
    public function manager_list(){
        $manager=D('Admin')->field(array('id','username','status'))->relation(TRUE)->select();
        $this->assign('manager',$manager);
        $this->display();
    }
    
    //节点列表,node
    public function node_list(){
        $node=M('node')->order('sort')->select();
        $node=  node_merge($node);
        $this->assign('node',$node);
        $this->display();
    }
    
    //角色列表,node
    public function role_list(){
        $role=M('role')->select();
        $this->assign('role',$role);
        $this->display();
    }

    //权限管理,node,5
    public function accessManage(){
        if(IS_POST){
            $role_id=I('role_id','','intval');
            $data=array();
            foreach ($_POST['access'] as $v){
                $tmp=explode('_',$v);
                $data[]=array(
                    'role_id'=>$role_id,
                    'node_id'=>$tmp[0],
                    'level'=>$tmp[1],
                );
                $db=M('access');
                $db->where(array('role_id'=>$role_id))->delete();
                if(M('access')->addAll($data)){
                    $this->success('修改成功','role_list');
                }else{
                    $this->error('修改失败');
                }
            }
        }else if(IS_GET){
            if(isset($_GET['role_id'])){
                $role_id=I('role_id','','intval');
                $access=M('access')->where(array('role_id'=>$role_id))->getField('node_id',true);
                $node=M('node')->order('sort')->select();
                $node=  node_merge($node,$access);
                $this->assign('node',$node);
                $this->assign('role_id',$role_id);
                $this->display();
            }else{
                $this->error('访问出错');
            }
        }
    }

    //添加管理员，按钮放在后台用户列表页面,node,6
    public function addManager(){
        //如果是post请求
        if(IS_POST){
            if(isset($_POST['username'])&&isset($_POST['password'])){
                /*
                 * 此次记得过滤
                 */
//                $username=  Input::getVar($_POST['username']);
//                $password=I('password','','md5');
//                $status=I('status',1,'intval');
                $user=array(
                    'username'=>  Input::getVar('username'),
                    'password'=>I('password','','md5'),
                    'status'=>I('status',1,'intval'),
                );
                if(M('admin')->where("username='%s'",array(Input::getVar('username')))->find()){
                    //保证用户名唯一
                    $this->error('用户名已存在');
                }
                $role_id=I('role_id','','intval');
                if($uid=M('admin')->add($user)){
                    //这里用foreach为了方便如果可以一次添加好几个角色的时候用
                    foreach ($role_id as $v){
                        $role[]=array(
                            'role_id'=>$v,
                            'user_id'=>$uid,
                        );
                    }
                    M('role_user')->addAll($role);
                    $this->success('添加成功','manager_list');
                }else{
                    $this->error('添加失败');
                }
            }
        }else{
            //如果只是正常访问
            $this->role=M('role')->select();
            $this->display();
        }
    }
    
    
    //添加节点,按钮在节点列表里面，node，7
    public function addNode(){
        //如果是post请求
        if(IS_POST){
            $node=array(
                'name'=>  Input::getVar('name'),
                'status'=>I('status',1,'intval'),
                'title'=>  Input::getVar('title'),
                'sort'=>I('sort','','intval'),
                'pid'=>I('pid','','intval'),
                'level'=>I('level','','intval'),
            );
            if(M('node')->add($node)){
                $this->success('添加成功','node_list');
            }else{
                $this->error('添加节点失败');
            }
        }else{
            //如果是正常访问
            $this->pid=I('pid',0,'intval');  //默认为0，表示创建应用节点
            $this->level=I('level',1,'intval');     //默认为1，表示应用
            switch ($this->level){
                case 1:
                    $this->type='应用';
                    break;
                case 2:
                    $this->type='控制器';
                    break;
                case 3:
                    $this->type='动作方法';
                    break;
            }
            $this->display();
        }
    }
    
    //添加角色列表，按钮在角色列表里面,node,8
    public function addRole(){
        if(IS_POST){
            $role=array(
                'name'=>  Input::getVar('name'),
                'status'=>I('status',1,'intval'),
                'remark'=>  Input::getVar('remark'),
            );
            if(M('role')->add($role)){
                $this->success('添加成功','role_list');
            }else{
                $this->error('添加失败');
            }
        }else{
            $this->display();
        }
    }
      
    //前台用户管理，用于设置前台用户是否被禁，不用于删除前台用户,node,9
    public function user_manage(){
        if(IS_GET){
            if(isset($_GET['uid'])&&isset($_GET['status'])){
                $user_id=I('uid','','intval');
                $status=I('status','','intval');
                $user_info=array(
                    'status'=>  Input::getVar($status),
                );
                    //ori表示原来的状态，status表示要变成的状态，两个不一样才进行修改
                    if(M('user')->where("id=%d",array($user_id))->save($user_info)){
                        $this->redirect('user_list'); 
                    }else{
                        $this->error('修改失败');
                    }
            }else{
            }
        }else{
            $this->error('访问错误');
        }
    }
    
    //后台用户管理，可用于设置除admin外的所有后台用户，测试通过,node,10
    public function manager_manage(){
        if(IS_POST){
            //post表示有数据更新提交过来
            $uid=I('uid','','intval');
            $role_id=I('role_id','','intval');
            $status=array(
                'status'=>I('status',1,'intval')
                );
            foreach ($role_id as $v){
                $role[]=array(
                    'role_id'=>$v,
                    'user_id'=>$uid,
                );
            }
            M('role_user')->where("user_id=%d",array($uid))->delete();
            M('role_user')->addAll($role);
            M('admin')->where("id=%d",array($uid))->save($status);
            $this->success('保存成功','manager_list');
        }else if(IS_GET){
            //get表示通过后台用户列表点击编辑进入此页面
            if(isset($_GET['uid'])&&$_GET['uid']!=1){
                //有设置uid并且uid不是admin的id
                $user_id=I('uid','','intval');
                $user_info=M('admin')->where("id=%d",array($user_id))->find();
                $this->role=M('role')->select();
                if($user_info!=FALSE){
                    $this->assign('user',$user_info);
                    $this->display();
                }else{
                    $this->error('用户不存在');
                }
            }
        }else{
            $this->error('访问不正确');
        }
    }
    
    //节点编辑页面,node,11
    public function node_manage(){
        if(IS_GET){
            if(isset($_GET['node_id'])){
                $node=M('node')->where("id=%d",array(Input::getVar($_GET['node_id'])))->field(array('name','status','title','sort','level','id'))->find();
                    if($node!=FALSE){
                        $level=$node['level'];
                        switch ($level){
                            case 1:
                                $this->type='应用';
                                break;
                            case 2:
                                $this->type='控制器';
                                break;
                            case 3:
                                $this->type='动作方法';
                                break;
                            }
                    $this->assign('node',$node);
                    $this->display();
                }else{
                    $this->error('节点不存在');
                }
            }
        }else if(IS_POST){
            if(isset($_POST['node_id'])){
                $node_info=array(
                    'name'=>  Input::getVar('name'),
                    'title'=>  Input::getVar('title'),
                    'sort'=>I('sort',1,'intval'),
                    'status'=>I('status',1,'intval'),
                );
                if(M('node')->where("id=%d",array(Input::getVar($_POST['node_id'])))->save($node_info)){
                    $this->success('修改成功','node_list');
                }else{
                    $this->error('修改失败');
                }
            }
        }
    }
    
    //角色管理,node,12
    public function role_manage(){
        if(IS_GET){
            if(isset($_GET['role_id'])){
                $role_id=I('role_id','','intval');
                $role=M('role')->where("id=%d",array($role_id))->find();
                if($role!=FALSE){
                    $this->assign('role',$role);
                    $this->display();
                }else{
                    $this->error('角色不存在');
                }
            }
        }else if(IS_POST){
            if(isset($_POST['role_id'])){
                $role=array(
                    'name'=>  Input::getVar('name'),
                    'status'=>I('status',1,'intval'),
                    'remark'=>  Input::getVar('remark'),
                );
                if(M('role')->where("id=%d",array(Input::getVar($_POST['role_id'])))->save($role)){
                    $this->success('修改成功','role_list');
                }else{
                    $this->error('修改失败');
                }
            }
        }else{
            $this->error('访问错误');
        }
    }
    
    //节点删除
    public function node_delete(){
        if(IS_GET){
            if(isset($_GET['node_id'])){
                $node_id=I('node_id','','intval');
                if(M('node')->where("id=%d",array($node_id))->delete()){
                    $this->redirect('node_list');
                }else{
                    $this->error('删除失败');
                }
            }else{
                $this->error('访问出错');
            }
        }
    }
}

