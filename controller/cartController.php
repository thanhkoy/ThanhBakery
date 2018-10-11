<?php
require_once('model/cartModel.php');

class cartController extends baseController
{
    public function index()
    {
        $pm = new cartModel();
        $data = $pm->listItem();
        if (isset($data)) {
            $this->registry->template->data_item = $data;
        } else {
            $this->registry->template->data_item = 0;
        }
        $this->registry->template->show("ajax process/cart");
    }

    public function addCart()
    {
        $id = $_POST['id'];
        $pm = new cartModel();
        $pm->addCart($id);
    }

    public function editCart()
    {
        $pm = new cartModel();
        $pm->editCart($_POST['id'], $_POST['quantity']);
        $data = $pm->listItem();
        $this->registry->template->data_item = $data;

        $this->registry->template->show("ajax process/cart");
    }

    public function addCode()
    {
        $pm = new cartModel();
        $pm->addCode($_POST['code']);
        $data = $pm->listItem();
        $this->registry->template->data_item = $data;

        $this->registry->template->show("ajax process/cart");
    }

    public function checkout()
    {
        $pm = new cartModel();
        $pm->checkout($_POST['fullname'], $_POST['address']);

        $this->registry->template->show("ajax process/checkout");
    }
}