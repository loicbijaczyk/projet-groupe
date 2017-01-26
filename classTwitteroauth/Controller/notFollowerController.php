<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 23/01/2017
 * Time: 10:15
 */

include('../RequestByTwitteroauth.php');
$name = ('loicbija');

$request = new RequestByTwitteroauth();
$tab = $request->notFollower($name);
var_dump($tab);