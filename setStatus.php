<?php
    include('db_connection.php');
    $id = $_GET['id'];
    $getStatus = "SELECT (Present) from info_visitor where ID=".$id;
    $result = $link->query($getStatus);
    $present = $result->fetch_assoc()['Present'];

    if ($present) {
        $sql = "UPDATE info_visitor SET Present=false WHERE ID=".$id;
    } else {
        $sql = "UPDATE info_visitor SET Present=true WHERE ID=".$id;
    }
    $link->query($sql);

    // echo $link->query("SELECT (Present) from info_visitor where ID=".$id)->fetch_assoc()['Present']
    header('location: search.php')

?>
