<?php
require 'conn.php';

if (isset($_GET['id'])) {
    $del_id = $_GET["id"];

    $delete = $conn->prepare("delete from contact where id = :id");
    $delete->execute(array(
        ':id' => $del_id
    ));

    if ($delete) {
        header("location:../contact.php");
    }
}


