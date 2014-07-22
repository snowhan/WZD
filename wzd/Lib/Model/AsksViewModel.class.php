<?php
/**
 * 问题与用户信息视图
 *
 */
class AsksViewModel extends ViewModel{
	public $viewFields = array(
     'Asks'=>array('id','title','anonymous','uid','view','replys','content'),
     'User'=>array('realname','logo','_on'=>'Asks.uid=User.id'),
   );
}