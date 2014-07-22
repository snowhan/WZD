<?php
class AnswersViewModel extends ViewModel{
	public $viewFields = array(
     	'Answers'=>array('follows','anonymous','createtime','useless','hate','praise','content','uid','id'),   
    	'User'=>array('realname','logo', '_on'=>'Answers.uid=User.id'),
   );
}
?>