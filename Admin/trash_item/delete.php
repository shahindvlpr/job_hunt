<?php
    require_once('../../db/dbh.php');
    $id = $_GET['id'];

    $query_delete = "DELETE FROM trash_item WHERE job_seeker_id = $id;";
    $deleteData = mysqli_query($conn, $query_delete);

    header("Location: index.php");
?>