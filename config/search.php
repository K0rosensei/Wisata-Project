<?php
 if($_SERVER['REQUEST_METHOD'] == 'GET' || $_REQUEST['search'] != NULL){
     $search = $_REQUEST['search'];
     $query = "SELECT * FROM homestay WHERE Nama LIKE '%$search%'";
     $resultsearch = mysqli_query($conn, $query);
    //  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
     
 }

?>