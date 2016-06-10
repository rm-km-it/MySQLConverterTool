<?php
require_once('Generic.php');

/**
* Converter: mysql_result
*
* @category   Functions
* @package    MySQLConverterTool
* @author     Andrey Hristov <andrey@php.net>, Ulf Wendel <ulf.wendel@phpdoc.de>
* @copyright  1997-2006 The PHP Group
* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
* @version    CVS: $Id:$, Release: @package_version@
* @link       http://www.mysql.com
* @since      Class available since Release 1.0
*/
class MySQLConverterTool_Function_Result extends MySQLConverterTool_Function_Generic {  
    
    public $new_name = 'mysqli_fetch_array';

    
    public function __construct() {   
    }
    
    public function handle(Array $params = array()) {
        
        if (count($params) != 3)
            return array(self::PARSE_ERROR_WRONG_PARAMS, NULL);
            
        list($res, $row, $col) = $this->extractParamValues($params);
        
        if($row != 0) {
            return array('Currently the only supported value for $row is 0', NULL);
        }
       
        return array(NULL, sprintf('mysqli_fetch_array(%s)[%s]', $res, $col));
    }
    
    
    function getConversionHint() {
        
        return 'Emulated using mysqli_fetch_array()[$col].';
    }
    

}
?>