<?php

/*
 * 标签关系
 */
class TagModel extends RelationModel{
    
    protected $tableName='tags';
    
    protected $_link=array(
        'getUser'=>array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'User',
            'foreign_key'=>'uid',
            'mapping_name'=>'user',
            'mapping_fields'=>'username',
        ),
    );
}
