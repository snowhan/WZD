<?php

class AdminModel extends RelationModel{
    
    //主表
    protected $tableName='admin';
    
    //定义关联关系
    protected $_link=array(
        'role'=>array(
            'mapping_type'=>MANY_TO_MANY,  //多对多关系
            'foreign_key'=>'user_id',       //主表在中间表的外键
            'relation_key'=>'role_id',      //副表在中间表的外键
            'relation_table'=>'wzd_role_user',   //中间表
            'mapping_fields'=>'id,name,remark',     //范围
        ),
    );
}

