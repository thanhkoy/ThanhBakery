<?php
session_start();

class cartModel extends db
{
    public function addCart($id)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $quantity = 0;
        if (isset($_SESSION['cart'][$id])) {
            $quantity = $_SESSION['cart'][$id] + 1;
        } else {
            $quantity = 1;
        }
        $_SESSION['cart'][$id] = $quantity;
    }

    public function listItem()
    {
        $item[] = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $k => $v) {
                $item[] = $k;
            }
        }
        $str = implode(",", $item);
        $conn = db::getInstance();
        $rs = $conn->query("select * from product where prd_id in ({$str})");
        $data = $rs->fetchAll(PDO::FETCH_ASSOC);
        $total = 0;
        foreach ($data as $value) {
            $total += $_SESSION['cart'][$value['prd_id']] * $value['prd_price'];
        }
        $_SESSION['total'] = $total;
        return $data;
    }

    public function editCart($id, $quantity)
    {
        if (($quantity == 0) and (is_numeric($quantity))) {
            unset ($_SESSION['cart'][$id]);
        } else if (($quantity > 0) and (is_numeric($quantity))) {
            $_SESSION['cart'][$id] = $quantity;
        }
    }

    public function addCode($code)
    {
        $conn = db::getInstance();
        $rs = $conn->query("select * from coupon where coupon_code = '{$code}' and coupon_quantity > 0");
        $data = $rs->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['code_info'] = array();
        if (!empty($data)) {
            foreach ($data as $value) {
                $_SESSION['code'] = $value['coupon_value'];
                array_push($_SESSION['code_info'], $value['coupon_id']);
                array_push($_SESSION['code_info'], $value['coupon_quantity']);
            }
        }
    }

    public function checkout($fullname, $address)
    {
        $conn = db::getInstance();

        $name = $fullname;
        $add = $address;
        $username = $_SESSION['username'];
        $total = $_SESSION['total'];
        if (isset($_SESSION['code'])) {
            $code = $_SESSION['code'];
            $_SESSION['code_info'][1] = $_SESSION['code_info'][1] - 1;
            $conn->query("update coupon set coupon_quantity = {$_SESSION['code_info'][1]} where coupon_id = {$_SESSION['code_info'][0]}");
        } else {
            $code = 0;
        }
        $conn->query("insert into bill (bill_receiver, bill_oderdate, bill_address, cust_username, bill_total, coupon_value) values ('{$name}', now(), '{$add}', '{$username}', {$total}, {$code})");
        $new_id = $conn->lastInsertId();
        foreach ($_SESSION['cart'] as $k => $v) {
            $prd_id = $k;
            $quantity = $v;
            $rs = $conn->query("select * from product where prd_id = {$prd_id}");
            $price = $rs->fetchAll(PDO::FETCH_ASSOC);
            foreach ($price as $value) {
                $conn->query("insert into bill_detail (bill_id, prd_id, prd_price, quantity) values ({$new_id}, {$prd_id}, {$value['prd_price']}, {$quantity})");
            }
        }
        $resultSet = $conn->query("select * from customer where cust_username = '{$username}'");
        $data = $resultSet->fetchAll(PDO::FETCH_ASSOC);
        $point = 0;
        foreach ($data as $item) {
            $point = $item['cust_accumulate'];
        }
        $point = $point + $total;
        if ($point > 5000000) {
            $conn->query("update customer set cust_level = 1 where cust_username = '{$username}'");
        }
        $conn->query("update customer set cust_accumulate = {$point} where cust_username = '{$username}'");
        unset($_SESSION['code']);
        unset($_SESSION['code_info']);
        unset($_SESSION['cart']);
        unset($_SESSION['total']);
    }
}