<?php

include('RequestByTwitteroauth.php');

$request = new RequestByTwitteroauth();
$dm = $request->getFollowersList();

//$post = $request->postTweet('test api class');
//var_dump($post);
//$dm = $request->postDM('test api', 'loicbija');
//$dm = $request->getFriendsIds('AJOfficiel')->next_cursor;
//$dm = $request->getFollowersIds('AJOfficiel');
//$dm = $request->getFriendsList();

//do {
//    $cursor = -1;
//    $i = 0;
//    $dm = $request->getFriendsList('AJOfficiel');
//    $cursor ++;
//            $tab[$i] = $dm;
//            $i++;
//            $cursor = $dm->next_cursor;
//
//} while($cursor !=0 );
//foreach ($dm[0] as $val){
//    var_dump($val);
//}

var_dump($dm);