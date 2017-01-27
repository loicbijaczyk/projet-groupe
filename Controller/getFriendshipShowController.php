<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 24/01/2017
 * Time: 10:07
 */

require_once ('../RequestByTwitteroauth.php');

$sourceName = 'loicbija';
$targetName = 'AJOfficiel';

$request = new RequestByTwitteroauth();

$friendship = $request->getFriendshipShow();
var_dump($friendship);