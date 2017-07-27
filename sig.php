<?php
  require __DIR__ . '/vendor/autoload.php';
  use \Firebase\JWT\JWT;
 
  $integros_app_secret = '...';
 
  $video_token = '...';
  $user_ip = $_SERVER['REMOTE_ADDR'];
  $expires_at = time() + 60 * 60;
 
  $video_payload = array(
    'token'   => $video_token,
    'user_ip' => $user_ip,
    'exp'     => $expires_at,
  );
 
  $sig = JWT::encode($video_payload, $integros_app_secret, 'HS256');
 
  $media_url = "https://media.integros.com/video/$video_token/mp4/index.json?sig=$sig";

  echo($media_url);
?>
