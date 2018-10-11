<?php
session_start();

class contactController extends baseController
{
    public function index()
    {
        $this->registry->template->show("header");
        $this->registry->template->show("contact/contact");
        $this->registry->template->show("footer");
    }
}