<?php
session_start();

class feedbackModel extends db
{
    public function feedback($content)
    {
        $username = $_SESSION['username'];
        $conn = db::getInstance();
        $conn->query("insert into feedback(fb_content, fb_datetime, cust_username) VALUES ('{$content}', now(), '{$username}')");
    }
}