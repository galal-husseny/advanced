<?php
include_once __DIR__."/../database/connection.php";
class product extends connection{
 
    
    public function create(array $data)
    {
        $insert = "INSERT INTO `products` (`name`,`price`,`quantity`) VALUES (:name,:price,:quantity)";
        $insertPreparation = $this->con->prepare($insert);
        $insertPreparation->execute($data);
        return true;
    }

    public function read()
    {
        $select = "SELECT * FROM `products`";
        return $this->con->query($select);
    }

    public function update(array $data)
    {
        $update = "UPDATE `products` SET `name`=:name , `price`=:price, `quantity`=:quantity WHERE `id`=:id";
        $updateprepration = $this->con->prepare($update);
        $updateprepration ->execute($data);
        return true;
    }

    public function delete(array $data)
    {
        $delete = "DELETE FROM `products` WHERE `id`=:id";
        $deleteprepration = $this->con->prepare($delete);
        $deleteprepration ->execute($data);
        return true;
    }

    public function getProduct(array $data)
    {
        $select = "SELECT * FROM `products` WHERE id=:id";
        $selectprepration = $this->con->prepare($select);
        $selectprepration ->execute($data);
        return $selectprepration;
    }
}