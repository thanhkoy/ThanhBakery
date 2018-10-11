<?php
require_once('model/feedbackModel.php');

class feedbackController extends baseController
{
    public function index()
    {
        $content = $_POST['content'];
        $fm = new feedbackModel();
        $fm->feedback($content);

        $this->registry->template->show("ajax process/feedback");
    }
}