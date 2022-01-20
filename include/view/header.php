<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Convert Text into MP3 - Free online TTS service</title>
  <meta name="keywords" content="Free, online, converter, TTS, tts, TextToSpeech, Text, To, Speech, mp3, sound, audio." />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript">
    function toCount(entrance, exit, text, characters) {
      var entranceObj = document.getElementById(entrance);
      var exitObj = document.getElementById(exit);
      var length = characters - entranceObj.value.length;
      if (length <= 0) {
        length = 0;
        text = '<span class="disable"> ' + text + ' <\/span>';
        entranceObj.value = entranceObj.value.substr(0, characters);
      }
      exitObj.innerHTML = text.replace("{CHAR}", length);
    }
  </script>

</head>

<body>

  <div id="fb-root"></div>
  <div class="main">

    <div class="blok_header">
      <div class="header">

        <div class="clr"></div>
        <div class="menu">
          <div class="logo">
            <a href="index.php">
              <img width="100%" src="images/logo.png" border="0" alt="logo" />
            </a>
          </div>
          <ul>
            <li><a href="index.php">Home</a></li>

            <?php
            if (isset($_SESSION['login']) && isset($_SESSION['loginname']) && $_SESSION['login'] == 1) {
            ?>
              <li><a href="home.php"><?php echo $_SESSION["loginname"] ?> - Home Page</a></li>
              <li><a href="auth/logout.php">Logout</a></li>
            <?php
            } else {
            ?>
              <li><a href="signup.php">Sign Up</a></li>
              <li><a href="login.php">Login</a></li>
            <?php
            }
            ?>
          </ul>
          <div style="float:right; margin:5px 0 0 0;">
            <!>
              <div class="addthis_toolbox addthis_default_style ">
                <!-- <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
         -->
                <table style="margin:0" cellpadding="2" cellspacing="0" align="right">
                  <tr valign="top">
                    <td valign="top">

                      <div class="addthis_inline_share_toolbox"></div>
                    </td>
                  </tr>
                </table>
              </div>
              <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-5e3ea8d167a9e2b7"></script>
              <!>

          </div>
        </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
    <div class="clr"></div>
    <div class="header_text2">
      <div class="header_text_resize2">
        <h2></h2>
        <p><span>Free online Text To Speech (TTS) service with natural sounding voices.<br />
          </span>Convert any English text into MP3 audio file and play it on your PC or iPod.</p>
        <div class="clr">
        </div>
      </div>

    </div>
    <div class="body_resize">
      <div class="body">