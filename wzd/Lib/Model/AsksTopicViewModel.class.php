<?php
/**
 * 问题与主题视图
 *
 */
class AsksTopicViewModel extends ViewModel{
	public $viewFields = array(
     'Asks_topic'=>array(),   
     'Topic'=>array('topicname', '_on'=>'Asks_topic.topic_id=Topic.id'),
   );	
}
?>