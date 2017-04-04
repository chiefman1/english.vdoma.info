<?php
/**
 *Работа с классом
 *class->mysqlQuery('SELECT question, answer FROM english')->fetchRow()
 *class->delete($table, $where = '')->mysqlQuery();
 *class->insert($table, $data)->mysqlQuery();
 *
 */
namespace db;

class MysqlDb
{
    private  $_connectDb = false;
    protected $_sqlQuery = false;
    private  $_resultQuery = false;
    private  $_result = false;

    function __construct(){
        if(!mysql_connect(HostName,UserName,Password))
        {   echo "DON't Не могу соединиться с базой ".DBName."!<br>";
            echo mysql_error();
            exit;
        }

        mysql_select_db(DBName) or die("Не могу выбрать базу данных");
        $code = "utf-8";
        mysql_query ("set character_set_client='{$code}'");
        mysql_query ("set character_set_results={$code}");
        mysql_query ("set collation_connection='{$code}_general_ci'");

        $this->_connectDb = true;
    }

    public function mysqlQuery($sql=''){
        if(!$sql){
            if($this->_sqlQuery){
                $sql = $this->_sqlQuery;
            }else{
                return false;
            }
        }
        $this->_resultQuery = mysql_query($sql) or die(mysql_error());
        return $this;
    }

    public function fetchAssoc(){
        if($this->_resultQuery){
            $data =  mysql_fetch_assoc($this->_resultQuery);
            $this->_result = $data;
            return $data;
        }elseif($this->_sqlQuery){
            $this->mysqlQuery()->fetchAssoc();
            return $this->_result;
        }
        return false;
    }

    public function fetchArray(){
        if($this->_resultQuery){
            $size = mysql_num_rows($this->_resultQuery);
            for ($i = 0; $i < $size; $i++) {
                $data[] = mysql_fetch_array($this->_resultQuery);
            }
            $this->_result = $data;
            return $data;
        }elseif($this->_sqlQuery){
            $this->mysqlQuery()->fetchArray();
            return $this->_result;
        }
        return false;
    }

    public function fetchObject(){
        if($this->_resultQuery){
            $data = mysql_fetch_object($this->_resultQuery);
            $this->_result = $data;
            return $data;
        }elseif($this->_sqlQuery){
            $this->mysqlQuery()->fetchObject();
            return $this->_result;
        }
        return false;
    }

    public function fetchObjectArray(){
        if($this->_resultQuery){
            while($row = mysql_fetch_object($this->_resultQuery)){
                $data[]= $row;
            }
            $this->_result = $data;
            return $data;
        }elseif($this->_sqlQuery){
            $this->mysqlQuery()->fetchObjectArray();
            return $this->_result;
        }
        return false;
    }

    public function fetchRow(){
        if($this->_resultQuery){
            $data = mysql_fetch_row($this->_resultQuery);
            $this->_result = $data;
            return $data;
        }elseif($this->_sqlQuery){
            $this->mysqlQuery()->fetchRow();
            return $this->_result;
        }
        return false;
    }

    public function insert($table, $data)
    {
        $str1 = '';
        $str2 = '';
        foreach ($data as $field => $value) {
            if ($str1) {
                $str1 .= ', ';
            }
            if ($str2) {
                $str2 .= ', ';
            }
            $str1 .= '`' . $field . '`';
            $str2 .= "'" . $value . "'";
        }
        $sql = 'INSERT INTO ' . $table . ' (' . $str1 . ') VALUES (' . $str2 . ')';
        $this->_sqlQuery = $sql;
        return $this;
    }

    function delete($table, $where = '')
    {
        $sql = "DELETE FROM $table" . (($where) ? " WHERE $where" : '');
        $this->_sqlQuery= $sql;
        return $this;
    }

    public function getSqlQuery(){
        return $this->_sqlQuery;
    }

    public function getResultQuery(){
        return $this->_resultQuery;
    }


}