<?php

require_once('../RequestByTwitteroauth.php');
//var_dump($_REQUEST);
$text = $_POST['textDM'];
$follower = $_POST['screenNameDM'];

$request = new RequestByTwitteroauth();
$dm = $request->postDM($text,$follower);

//echo $dm;
echo json_encode($dm);


//$tab= [];
//foreach ($dm as $val){
//    $tab[] = $val;
//}
//$result = json_encode($tab);
//echo $result;
//$followers = $_POST['followers'];
//
//$request = new RequestByTwitteroauth();
//foreach ($followers as $follower) {
//    $post = $request->postDM($text,$follower);
//    var_dump($post);
////    echo $post;
//}


//var_dump($post);
