<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 20/01/2017
 * Time: 14:58
 */

include('../RequestByTwitteroauth.php');
//$name = $_POST['nameFollower'];
$name = 'AJOfficiel';

//var_dump($_REQUEST);

$request = new RequestByTwitteroauth();
$dm = $request->getFollowersIds($name);
var_dump($dm);
//var_dump(json_encode($tab));
//echo json_encode($tab);
//var_dump($dm->users);