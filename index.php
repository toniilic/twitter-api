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

$access_token = '967643846363500544-mJnImpw58pv2bHzFHeIn6g6RdeK2omj';

$access_token_secret = 'HoKL2pCJgfJlOU3GlZ8RO88dBRBWocE8YPZMpoLtQnVtE';

$connection = new TwitterOAuth('ANsvnDrNA6OzTQu0aq9XcbcTN', 'xfYBSsId7qmQuv4KsZuqT13rFQjGSLLLdBbRp7OGCyIXUDIcTf', $access_token, $access_token_secret);
$content = $connection->get("account/verify_credentials");

dump($content);
