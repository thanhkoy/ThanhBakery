<?php
session_start();

class accountModel extends db
{
    public function login($name, $pass)
    {
        $return = "";

        $conn = db::getInstance();

        $rs = $conn->query("select * from customer where cust_username = '{$name}' and cust_pw = '{$pass}'");
        $count = $rs->rowCount();

        $rs2 = $conn->query("select * from employee where emp_username = '{$name}' and emp_pw = '{$pass}'");
        $count2 = $rs2->rowCount();

        if ($count2 > 0) {
            $_SESSION["admin"] = $name;
            $return = "admin";
        } elseif ($count > 0) {
            $_SESSION["username"] = $name;
            $return = "client";
        } else {
            $return = "none";
        }
        return $return;
    }

    public function logout()
    {
        session_destroy();
    }

    public function register($username, $password, $phone, $email, $address)
    {
        $return = '';
        $conn = db::getInstance();
        $count = $conn->query("select * from customer where cust_username = '{$username}' or cust_phonenum = {$phone} or cust_email = '{$email}'")->rowCount();
        if ($count > 0) {
            $return = 'error';
        } else {
            $conn->query("insert into customer (cust_username, cust_pw, cust_phonenum, cust_email, cust_address) values ('{$username}', '{$password}', {$phone}, '{$email}', '{$address}')");
            $return = 'success';
        }
        return $return;
    }
}