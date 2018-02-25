<?php
/**
 * Created by PhpStorm.
 * User: toni
 * Date: 25.02.18.
 * Time: 07:49
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__.'/vendor/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;


// Add user form
echo '<h2>Add a new user</h2>';
echo '<form action="welcome.php" method="post">
Id: <input type="text" name="id"><br>
Screen name: <input type="text" name="screen_name"><br>
<input type="submit">
</form>';


// List users in the database
$file = file("users.txt");
$len = count($file);
echo '<h2>Users is users.txt</h2>';
for($i = 0; $i < $len; $i++) {
    echo $file[$i] .
        '<a href="/?screen_name=' .
        trim(explode(',', $file[$i])[1])
        . '">Show followers</a>'
        .'<br>';
}

// gets followers for specific user
function get_followers($screen_name)
{
    // Initiate twitter API
    $access_token = '967643846363500544-mJnImpw58pv2bHzFHeIn6g6RdeK2omj';

    $access_token_secret = 'HoKL2pCJgfJlOU3GlZ8RO88dBRBWocE8YPZMpoLtQnVtE';

    $connection = new TwitterOAuth('ANsvnDrNA6OzTQu0aq9XcbcTN', 'xfYBSsId7qmQuv4KsZuqT13rFQjGSLLLdBbRp7OGCyIXUDIcTf', $access_token, $access_token_secret);


    return $connection->get("followers/list", ["screen_name" => $screen_name]);
}

// List followers of user
if(isset($_GET["screen_name"])) {
    echo '<h2>Followers of ' . $_GET["screen_name"] . '</h2>';
    $followers = get_followers('7sedam7');

    if(isset($followers->users)) {
        $users = $followers->users;

        foreach($users as $key => $value) {
            echo $value->screen_name . '<br>';
        }
    }

}

// Save data to text file
// file_put_contents("file.txt","\n31231231",FILE_APPEND);



