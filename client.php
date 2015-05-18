
<?php
// custom api soap client example
$mageFilename = 'app/Mage.php';

require_once $mageFilename;

umask(0);

Mage::app();

$myhellomsg = "<b>Helloworld Mydons</b>";

try {
    $soap = new SoapClient('http://localhost/magento/api/v2_soap/?wsdl');
    $sessionId = $soap->login('apiUser', 'testtest12');
    //echo "Login ID : $sessionId";
    #$result = $soap->call($sessionId, 'online.get', array());
    $result = $soap->onlineGet($sessionId);
    echo $result."\n";
    $result = $soap->onlineGet($sessionId);
    echo $result."\n";

}
catch(Exception $e) {
    echo $e->getMessage();
}

