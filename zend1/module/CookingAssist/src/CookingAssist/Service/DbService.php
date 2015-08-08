<?php
namespace CookingAssist\Service;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;


class DbService
{
    protected $dbAdapter;

    function __construct()
    {
        $this->dbAdapter = Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();        
    }
    
    function fetchAllLevels(){
//         $sql = new Sql($dbAdapter);
//         $select = $sql->select();
//         $select->from('Levels');
        $selectString = 'SELECT * FROM Levels';//$select->getSqlString();
        $result = $dbAdapter->query($selectString,Adapter::QUERY_MODE_EXECUTE);
        $levels = array();
        foreach ($result as $row){
            $levels[]= $row['Shortname'];
        }
        return $levels;
    }
}

?>