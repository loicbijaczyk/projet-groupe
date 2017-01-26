<?php

include('../RequestByTwitteroauth.php');
require_once ('../Component/Bdd.php');


//$name = $_POST['nameFollower'];
//$count = $_POST['countFollower'];

$name = 'AJOfficiel';
$count = 200;

//var_dump($_REQUEST);

$db = new Bdd();

$sql = "INSERT INTO follower (follower_id, screen_name, name, description, created_at) VALUES (:id, :screen_name, :name,  :description, :created_at)";
$stmt = $db->prepare($sql);

//$id = 12;
//$name = 'scname';
//$stmt->bindParam('id', $id);
//$stmt->bindParam('screen_name', $name);
//
//$stmt->execute();



$request = new RequestByTwitteroauth();
//$dm = $request->getFollowersList();
$dm = $request->getFollowersList($name, $count);
$tab = [];
foreach ($dm->users as $val){
    $tab['name'][] = $val->name;
    $tab['description'][] = $val->description;


    $stmt->bindParam('id', $val->id);
    $stmt->bindParam('screen_name', $val->screen_name);
    $stmt->bindParam('name', utf8_encode($val->name));
    $stmt->bindParam('description', $val->description);
    $stmt->bindParam('created_at', $val->created_at);
//    $stmt->bindParam('id', $id);
//    $stmt->bindParam('screen_name', $name);
    var_dump($val);

//
//    $stmt->execute();
}
//var_dump(json_encode($tab));
//echo json_encode($tab);
//var_dump($dm->users);




