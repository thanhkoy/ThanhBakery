<?php
/**
 * Created by PhpStorm.
 * User: Thành
 * Date: 6/19/2018
 * Time: 9:54 AM
 */

session_start();

class indexController extends baseController
{
    public function index()
    {
        $this->registry->template->show("header");
        $this->registry->template->show("content");
        $this->registry->template->show("footer");
    }

    /*public function add(){
        $ph = new phuhuynhModel();
        $rel = new relModel();

        $id = $ph->add($_POST['name'], $_POST['cmnd']);
        $rel->add($id, $_POST['hs_id']);
        header("Location:" . __BASE_URL . "?rt=rel&id={$id}");
    }*/
}