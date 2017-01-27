<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 24/01/2017
 * Time: 09:41
 */

require_once ('../RequestByTwitteroauth.php');

$request = new RequestByTwitteroauth();

$friendship = $request->getfriendships();
var_dump($friendship);
