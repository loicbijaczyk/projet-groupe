<?php
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 24/01/2017
 * Time: 09:12
 */

require_once ('../RequestByTwitteroauth.php');

$request = new RequestByTwitteroauth();
$rate = $request->rateLimit();
var_dump($rate->resources->friends);
//var_dump($rate->resources->)