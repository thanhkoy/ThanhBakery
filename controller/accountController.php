<?php
require_once('model/accountModel.php');

class accountController extends baseController
{
    public function index()
    {
        $this->registry->template->show("header");
        $this->registry->template->show("content");
        $this->registry->template->show("footer");
    }

    public function login()
    {
        $name = $_POST['username'];
        $pass = $_POST['password'];

        $ac = new accountModel();
        $return = $ac->login($name, $pass);

        if ($return == "admin") {
            header("location:admin/index.php");
        } elseif ($return == "client") {
            header("location:?f=menu");
        } else {
            header("location:?f=menu&err=err");
        }
    }

    public function logout()
    {
        $ac = new accountModel();
        $ac->logout();

        header("location:?f=menu");
    }

    function register()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $ac = new accountModel();
        $return = $ac->register($username, $password, $phone, $email, $address);
        if ($return == 'success') {
            $this->registry->template->show("ajax process/register");
        } else {
            $this->registry->template->show("ajax process/registerError");
        }
    }
}