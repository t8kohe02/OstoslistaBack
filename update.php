<?php
require_once 'inc/headers.php';
require_once 'inc/functions.php';

try {
    $db = openDB();
    $query = $db->prepare('update item set description=:description, amount=:amount where id=:id');
    $query->bindValue(':description',$description,PDO::PARAM_STR);
    $query->bindValue(':amount',$amount,PDO::PARAM_INT);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('id' => $id,'description' => $description, 'amount' => $amount);
    print json_encode($data);
} catch (PDOException $pdoex){
    returnError($pdoex);
}
