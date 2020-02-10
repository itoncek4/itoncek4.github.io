<?php
// Code by JakubŠarm
// Spigot: https://www.spigotmc.org/members/kevinyoutube.109279/
// Server: https://www.wolfmc.cz/
// - 1. Database
 // Database connect
$db_web_server = 'localhost';
 $db_web_login = 'root';
 $db_web_password = "";
 $db_web_name = 'AuthMe';
 $db_web_conn = mysqli_connect( $db_web_server, $db_web_login, $db_web_password, $db_web_name );
 mysqli_select_db( $db_web_conn, $db_web_name ) or die( "Error with database connetction." );

 // AuthMe settings
// Table name = Server_AuthMe
// Row username = username
// Row realname = realname
// Row password = password
// Row email    = email
// - 2. Login settings
 // Background
$Background_img = "src/images/background.jpg";
 $Background_size = "cover";

 // Title
$Title_page = "MaxPixel"; //Page title
 $Title_login = "Přihlášení do administrace"; //Login modal title


 // Login Page
$Form_user_placeholder = "Jméno ze serveru / email";
 $Form_pass_placeholder = "Herní heslo";

 $Form_login_btn = "Přihlásit se";

 $Form_dont_have_account_text = "Nemáte účet? Přpiojte se na server a on se vám automaticky vytvoří.";
 $Form_dont_have_account_link_text = "mc.maxpixel.tk";
 $Form_dont_have_account_link_url = "#"; //Your register page url


 // Errors Message
$error_empty_player = "Jméno vyžadováno.";
 $error_empty_password = "Heslo vyžadováno.";

 $error_bad_player = "Neznámý hráč nebo špatné heslo.";
 $error_bad_password = "Neznámý hráč nebo špatné heslo.";

// - 3. Logout settings
$Title_logout = "Jsi přihlášen";
 $Form_logout_btn = "Odhlásit";
?>