<?php
include_once "product.php";
class main {
    public static function createProduct()
    {
        $productObject = new product;
        $data= [
            'name'=>'laptop',
            'price'=>5000,
            'quantity'=>10
        ];
        $productObject->create($data);
    }

    public static function updateProduct()
    {
        $productObject = new product;
        $data= [
            'name'=>'mobile',
            'price'=>15000,
            'quantity'=>20,
            'id'=>2
        ];
        $productObject->update($data);
    }

    public static function deleteProduct()
    {
        $productObject = new product;
        $data= [
            'id'=>10
        ];
        $productObject->delete($data);
    }

    public static function getAllProducts () :array{
        $productObject = new product;
        $products = $productObject->read()->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    
    public static function getProduct () {
        $productObject = new product;
        $data= [
            'id'=>2
        ];
        $products = $productObject->getProduct($data)->fetchObject();
        return $products;
    }
}

// main::createProduct();
// main::deleteProduct();
// main::updateProduct();
// print_r(main::getAllProducts());
// print_r(main::getProduct());