<?php
/**
 *Работа с классом
 * class->mysqlQuery('SELECT question, answer FROM english')->fetchRow()
 * class->select('test')->from('english')->getSqlQuery();
 * class->select()->from('english')->mysqlQuery()->fetchObjectArray();
 * class->select()->from('english')->fetchObjectArray() //->fetchAssoc() //->fetchObject() //->fetchObjectArray();
 *
 *
 */
namespace db;
use \db\MysqlDb;

class CreateCommand extends MysqlDb
{
    private  $_select='';
    private $_from = '';
    private $_join = '';
    private $_where = '';
    private $_groupBy = '';
    private $_orderBy='';
    private $_limit = '';

    public function select($select=''){
        $this->_sqlQuery ='';
       if(!$select){
           $select .= '*';
       }
       if($this->_select){
           $this->_sqlQuery .= ', '.$select;
       }
       $this->_sqlQuery .= 'SELECT '.$select.' ';
       return $this;
    }

    public function from($from){
        if(!$from){
            return false;
        }
        $this->_sqlQuery .= ' FROM '.$from.' ';
        return $this;
    }

    public function query(){
        $this->_sqlQuery ='';
        if(!$this->_select){
            $this->_sqlQuery .='SELECT *';
        }else{
            $this->_sqlQuery .=$this->_select;
        }
        if(!$this->_from){
            return false;
        }else{
            $this->_sqlQuery .=$this->_from;
        }
        $this->mysqlQuery();
        return $this;
    }

    public function join($table, $conditions){
        $this->_sqlQuery .= ' JOIN '.$table.' ON '.$conditions;
        return $this;
    }

    public function leftJoin($table, $conditions){
        $this->_sqlQuery .= 'LEFT JOIN '.$table.' ON '.$conditions;
        return $this;
    }



}