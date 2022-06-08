<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header("location: ../login?status=login-terlebih-dahulu");
    exit();
}
$session_id=$_SESSION['id'];

$sql    = "SELECT * FROM mahasiswa WHERE id=$session_id";
$query  = mysqli_query($db, $sql);
$user   = mysqli_fetch_assoc($query);

?>