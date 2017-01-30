<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 30/01/2017
 * Time: 11:09
 */

include('../RequestByTwitteroauth.php');
//$name = $_POST['nameFollower'];
$name = 'AJOfficiel';

require_once ('../Entity/Follower.php');
require_once ('../Component/Bdd.php');
require_once ('../Manager/FollowerListManager.php');

$db = new Bdd();
$fl = new FollowerListManager($db);
//$sql = "INSERT INTO friend (friend_id, name, screen_name, description, created_at) VALUES (:id, :name, :screen_name, :description, :created_at)";
//$stmt = $db->prepare($sql);

//var_dump($_REQUEST);
$followerList = new Follower();
$request = new RequestByTwitteroauth();
$cursor = -1;
$followers = $request->getFollowersList($name);
//var_dump(followers[0]->users);
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
    foreach ($followers[$i]->users as $follower) {

        $followerList->setName($follower->name);
        $followerList->setId($follower->id);
        $followerList->setScreenName($follower->screen_name);
        $followerList->setDescription($follower->description);
        $followerList->setCreatedAt($follower->created_at);
        $followerList->setLocation($follower->location);
//
////$fl->load([]);
//
//        var_dump($followerList->getId());
////        var_dump($tabId);
        if ( ! in_array($followerList->getId(),$tabId))  {
            $fl->save($followerList);
            echo $followerList->getId() . ' save<br>';
        }
        else{
            echo $followerList->getId() . ' already in database<br>';
        }
////    }
//    //var_dump($friend[1]);
////    foreach ($friend[1]->users as $key) {
////        var_dump($key->name);
    }
}