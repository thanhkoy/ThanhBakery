<?php
session_start();

class productModel extends db
{
    public function getCategory()
    {
        $conn = db::getInstance();
        $rs = $conn->query('select * from category');
        $data = $rs->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getProduct($cat_id)
    {
        $conn = db::getInstance();
        $rs = $conn->query("select * from product WHERE prd_status = 1 and cat_id = {$cat_id}");
        $data = $rs->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function search($key)
    {
        $conn = db::getInstance();
        $rs = $conn->query("select * from product where prd_name like '%{$key}%'");
        $data = $rs->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function detail($id)
    {
        $conn = db::getInstance();

        $rs = $conn->query("select * from product where prd_id = {$id}");
        $data = $rs->fetchAll(PDO::FETCH_ASSOC);

        if (!isset($_SESSION['username'])) {
            $result = $conn->query("select AVG(rate_value) AS tbc from product_rating WHERE prd_id = {$id}");
            $star = $result->fetchAll(PDO::FETCH_ASSOC);
            array_push($data, $star);
        } else {
            $username = $_SESSION['username'];
            $result = $conn->query("select rate_value AS tbc from product_rating where prd_id = {$id} AND cust_username = '{$username}'");
            $star = $result->fetchAll(PDO::FETCH_ASSOC);
            array_push($data, $star);
        }
        return $data;
    }

    public function rate($value, $id)
    {
        $username = $_SESSION['username'];
        $conn = db::getInstance();

        $rs = $conn->query("select * from product_rating where prd_id = {$id} and cust_username = '{$username}'");
        $count = $rs->rowCount();
        if ($count > 0) {
            $conn->query("update product_rating set rate_value = {$value} where prd_id = {$id} and cust_username = '{$username}'");
        } else {
            $conn->query("insert into product_rating (rate_value, prd_id, cust_username) values ({$value}, {$id}, '{$username}')");
        }
    }
}