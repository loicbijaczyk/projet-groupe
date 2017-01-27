<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 23/01/2017
 * Time: 11:08
 */
require_once ('../RequestByTwitteroauth.php');

$name = ('loicbija');

$request = new RequestByTwitteroauth();
$notFriend = $request->notFriend($name);

var_dump($notFriend);