<?php

include('twitteroauth-master/autoload.php');
use Abraham\TwitterOAuth\TwitterOAuth;

/**
 * Created by PhpStorm.
 * User: loic
 * Date: 12/01/2017
 * Time: 11:35
 */


class RequestByTwitteroauth
{
    const CONSUMER_KEY = 'wQma7Yn6qyB3aWsP7HduUBjMj';
const CONSUMER_KEY_SECRET = 'LKqRDvsdbo4rQysVbgU00LKAJTZGUn4UGjbdASptcZiOY0fEHP';
const ACCESS_TOKEN = '811526104418750464-jRAQ6ZvtCvlMrszvt5leMGH54qVJxkc';
const ACCESS_TOKEN_SECRET = 'c242AKj6y8ivnyLtzUH8H1bxyaZTwuax1i2aTHUJilTB8';

public function connection()
{
    return $connection = new TwitterOAuth(self::CONSUMER_KEY, self::CONSUMER_KEY_SECRET, self::ACCESS_TOKEN, self::ACCESS_TOKEN_SECRET);
}

    public function postTweet($text)
    {
        $conn = $this->connection();
        return $conn->post("statuses/update", ["status" => $text]);
    }

    public function postDM($text, $screenName = 'loicbija')
    {
        $conn = $this->connection();
        return $conn->post("direct_messages/new",['text' => $text, 'screen_name' => $screenName]);
    }

    public function getFollowersIds($screenName = 'loicbija')
    {
        $conn = $this->connection();
        return $conn->get("followers/ids", ['screen_name' => $screenName]);
    }

    public function getFollowersList($screenName = 'loicbija', $count = 5)
    {
        $conn = $this->connection();
        return $conn->get("followers/list", ['screen_name' => $screenName, 'count' => $count]);
    }

    public function getFriendsIds($screenName = 'loicbija')
    {
        $conn = $this->connection();
        return $conn->get("friends/ids", ['screen_name' => $screenName]);
    }

//    public function getFriendsList($screenName = 'loicbija', $count= 200)
//    {
//        $conn = $this->connection();
//        return $conn->get("friends/list", ['screen_name' => $screenName, 'count' => $count]);
//    }

//    public function getFriendsList($screenName = 'AJOfficiel', $count = 200)
//    {
//        $conn = $this->connection();
//        $cursor = '-1';
//        $tab = [];
//        do {
//            $ids = $conn->get("friends/list", ["screen_name" => $screenName, "count" => $count, "cursor" => $cursor]);
//            $tab[$cursor][] = $ids;
//            $cursor = $ids->next_cursor_str;
//        } while ($cursor != 0);
//           var_dump($tab);
//    }

    public function getFriendsList($screenName = 'AJOfficiel', $count = 200)
    {
        $conn = $this->connection();
        $cursor = '-1';
        $tab = [];
        $tabreturn = [];
        for($i=0 ; $i<2 ; $i++){
            $ids = $conn->get("friends/list", ["screen_name" => $screenName, "count" => $count, "cursor" => $cursor]);
            $tab[] = $ids;
//            $tab[$cursor][] = $ids;
            $cursor = $ids->next_cursor_str;
        //}
//            $tabreturn = $tab[$i]->users;


//        var_dump($tab);
//        var_dump($tab[0]->users);
//        var_dump($tab[1]->users);
//            foreach ($tab[$i]->users as $val){
//                var_dump($val);
//                foreach ($val->name as $value)
//                {
//                    var_dump($value);
//                }
//            var_dump($val);
//            }
//        var_dump($name);
        }
//        var_dump($tab);
        return $tab;
    }
    //
//    public function autoFollow (){
//
//        $conn = $this->connection();
//        $followers = $conn->get('followers/ids', array('cursor' => -1));
//        $friends = $conn->get('friends/ids', array('cursor' => -1));
//
//        foreach ($followers->ids as $i => $id) {
//            if (empty($friends->ids) or !in_array($id, $friends->ids)) {
//                $conn->post('friendships/create', array('user_id' => $id));
//            }
//        }
//}

    public function notFriend ($screenName = 'AJOfficiel'){

        $conn = $this->connection();
        $followers = $conn->get('followers/ids', ["screen_name" => $screenName, 'cursor' => -1]);
//        var_dump($followers);
        $friends = $conn->get('friends/ids', ["screen_name" => $screenName, 'cursor' => -1]);
//        var_dump($friends);
        return array_diff($followers->ids,$friends->ids);
    }

    public function notFollower ($screenName = 'AJOfficiel'){

        $conn = $this->connection();
        $followers = $conn->get('followers/ids', ["screen_name" => $screenName, 'cursor' => -1]);
//        var_dump($followers);
        $friends = $conn->get('friends/ids', ["screen_name" => $screenName, 'cursor' => -1]);
//        var_dump($friends);
        return array_diff($friends->ids,$followers->ids);
    }

    public function rateLimit(){
        $conn = $this->connection();
        return $conn->get('application/rate_limit_status', ['resources' => 'friends, followers, statuses']);
    }

    public function getfriendships(){
        $conn = $this->connection();
        return $conn->get('friendships/incoming');
    }

    public function getFriendshipShow($source_screen_name = 'loicbija' , $target_screen_name = 'AJOfficiel')
    {
        $conn = $this->connection();
        return $conn->get('friendships/show', ['source_screen_name' => $source_screen_name, 'target_screen_name' => $target_screen_name]);
    }




}
