<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 20/01/2017
 * Time: 15:06
 */

include('../RequestByTwitteroauth.php');
//$name = $_POST['nameFollower'];
$name = 'AJOfficiel';

require_once ('../Entity/Friend.php');
require_once ('../Component/Bdd.php');
require_once ('../Manager/FriendListManager.php');

$db = new Bdd();
$fl = new FriendListManager($db);
//$sql = "INSERT INTO friend (friend_id, name, screen_name, description, created_at) VALUES (:id, :name, :screen_name, :description, :created_at)";
//$stmt = $db->prepare($sql);

//var_dump($_REQUEST);
$friendObject = new Friend();
$request = new RequestByTwitteroauth();
$cursor = -1;
$friends = $request->getFriendsList($name);
//var_dump($friends[0]->users);
$base = $fl->load([]);
$tabId = [];
foreach ($base as $key){
//    var_dump($key);
   $tabId[] = $key->getId();
}
//var_dump($tabId);

//var_dump($dm);
for($i=0 ; $i<8 ; $i++) {
//var_dump($friend[0]->users);
    foreach ($friends[$i]->users as $friend) {

        $friendObject->setName($friend->name);
        $friendObject->setId($friend->id);
        $friendObject->setScreenName($friend->screen_name);
        $friendObject->setDescription($friend->description);
        $friendObject->setCreatedAt($friend->created_at);
//
////$fl->load([]);
//
//        var_dump($friendObject->getId());
////        var_dump($tabId);
        if ( ! in_array($friendObject->getId(),$tabId))  {
            $fl->save($friendObject);
            echo $friendObject->getId() . ' save<br>';
        }
        else{
            echo $friendObject->getId() . ' already in database<br>';
        }
////    }
//    //var_dump($friend[1]);
////    foreach ($friend[1]->users as $key) {
////        var_dump($key->name);
    }
}
//var_dump($base);

//
//
//$tab = [];
//foreach ($dm as $friend) {
//    $stmt->bindParam('id', $friend->id_str);
//    $stmt->bindParam('name', $friend->name);
//    $stmt->bindParam('screen_name', $friend->screen_name);
//    $stmt->bindParam('description', $friend->description);
//    $stmt->bindParam('created_at', $friend->created_at);
//
//    $stmt->execute();
//    var_dump($friend);
//
//}

//    $tab[] = $friend->name;
//}
//var_dump($tab);
//var_dump(json_encode($tab));
//echo json_encode($tab);
//var_dump($dm->users);
//$tablol = [0,1,2,3,4,5,6];
//
//if(!in_array(2673661812,$tabId)){
//if(!in_array(26736618,$tabId)){
//    echo 'ok';
//} else {
//    echo 'fail';
//}

