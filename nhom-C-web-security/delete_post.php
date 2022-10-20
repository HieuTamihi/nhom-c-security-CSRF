<?php
session_start();
require_once 'models/PostModel.php';
$userModel = new PostModel();

$user = NULL;
$id = NULL;

if (!empty($_GET['post_id']) && !empty($_GET['tokenPost'])) {
    $id = $_GET['post_id'];
    // $get = $_GET['tokenPost'] . "123";
    $get = $_SESSION['tokenUser'];

    $userModel->deleteUserById($id,  $get); //Delete existing post
}
var_dump($get);
var_dump($_SESSION['tokenUser']);

header('location: list_post.php');
