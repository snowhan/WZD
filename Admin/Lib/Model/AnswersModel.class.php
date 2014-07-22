<?php

/*
 * 回答belongs to问题
 */
class AnswersModel extends RelationModel{
    
    protected $tableName='answers';
    
    protected $_link=array(
        'asks'=>array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'Asks',
            'foreign_key'=>'ask_id',
            'mapping_name'=>'getAsk',
        ),
    );
}

