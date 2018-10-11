<?php
require_once('model/productModel.php');

class menuController extends baseController
{
    public function index()
    {
        $pd = new productModel();

        $data_cat = $pd->getCategory();
        $this->registry->template->data_cat = $data_cat;

        $data_prd = array();
        foreach ($data_cat as $value) {
            $list_prd = $pd->getProduct($value['cat_id']);
            array_push($data_prd, $list_prd);
        }
        $this->registry->template->data_prd = $data_prd;

        $this->registry->template->show("header");
        $this->registry->template->show("menu/menu");
        $this->registry->template->show("footer");
    }

    public function search()
    {
        $pm = new productModel();
        $data = $pm->search($_POST['search']);
        $this->registry->template->data = $data;

        $this->registry->template->show("header");
        $this->registry->template->show("menu/search");
        $this->registry->template->show("footer");
    }

    public function detail()
    {
        $id = $_GET['id'];
        $pm = new productModel();
        $data = $pm->detail($id);
        $this->registry->template->data = $data[0];
        $this->registry->template->star = $data[1];

        $this->registry->template->show("header");
        $this->registry->template->show("menu/detail");
        $this->registry->template->show("footer");
    }

    public function rate()
    {
        $value = $_POST['value'];
        $id = $_POST['id'];
        $pm = new productModel();
        $pm->rate($value, $id);
    }
}