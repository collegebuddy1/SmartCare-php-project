<?php
if(isset ($_GET['doc_sp']) && !empty($_GET['doc_sp'])){
    include('dbconnect.php');
    $id= $_GET['doc_sp'];
    $query = "SELECT name FROM doctor WHERE specialist='$id'";
    $do = mysqli_query($conn,$query);
    $count = mysqli_num_rows($do);

    if($count > 0){
        while($row=mysqli_fetch_array($do)){
            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
        }
    }
}


if(isset ($_GET['doctor']) && !empty($_GET['doctor'])){
    include('dbconnect.php');
    $id= $_GET['doctor'];
    $query = "SELECT ID FROM doctor WHERE name='$id'";
    $do = mysqli_query($conn,$query);
    $count = mysqli_num_rows($do);

    if($count > 0){
        while($row=mysqli_fetch_array($do)){
            echo '<option value="'.$row['ID'].'">'.$row['ID'].'</option>';
        }
    }
}
else{
    echo '<h1>Error</h1>';
}
?>