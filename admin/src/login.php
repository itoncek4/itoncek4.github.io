<?php
    session_start();

    require 'config.php';

	if(isset($_POST['login'])) {;
        

        $login_user = "";
        $login_pass = "";
        $error = array();
        $login_success = array();
    
        if(empty($_SESSION['realname'])){
            $_SESSION['realname'] = "";
        }
                   
    	$login_user = mysqli_real_escape_string($db_web_conn, $_POST['player']);
    	$login_pass = mysqli_real_escape_string($db_web_conn, $_POST['password']);
        
    	$result    = mysqli_query($db_web_conn, "SELECT * FROM Server_AuthMe WHERE username='".$login_user."' OR realname='".$login_user."' OR email='".$login_user."'");
    	if(mysqli_num_rows($result) == 1) {
                                     
        	$fetch = mysqli_fetch_array($result);     
            
            if (empty($login_user)) {
    			array_push($error, "$error_empty_player");
    		}
    		if (empty($login_pass)) {
    			array_push($error, "$error_empty_password");
    		}
            if ($login_user != $fetch['realname']) {
                array_push($error, $error_bad_password);
            }

            if (password_verify($login_pass, $fetch['password'])) {

            	$_SESSION['realname']  = $fetch['realname'];
                $_SESSION['password']  = $fetch['password'];  
                $_SESSION['email']     = $fetch['email'];                 
                $_SESSION['id']        = $fetch['id']; 

                array_push($error, "1");             

                $Player = $_SESSION['realname'];
                $Player_Mojang_UUID_apiurl = file_get_contents("https://api.minetools.eu/uuid/$Player");
                $Player_Mojang_UUID_api = json_decode($Player_Mojang_UUID_apiurl,true);
                $Player_Mojang_UUID = $Player_Mojang_UUID_api['id'];
                if($Player_Mojang_UUID == 'null'):
                    $Player_Mojang_UUID = "8667ba71b85a4004af54457a9734eed7";
                endif;
            }
            else
            {
            	array_push($error, $error_bad_player);
            }
        }
        else
        { 
        	array_push($error, $error_bad_password);
        }      
    }

    if(isset($_POST['edit'])){
    	$edit_mail = mysqli_real_escape_string($db_web_conn, $_POST['email']);
    	mysqli_query($db_web_conn, "UPDATE Server_AuthMe WHERE realname='".$_SESSION['realname']."' SET email='".$edit_mail."'");
    }


    if(isset($_GET['logout'])) { 

        session_destroy();

		unset($_SESSION['realname']);
		unset($_SESSION['password']);
		unset($_SESSION['id']);
        unset($login_success);
        unset($Player_Mojang_UUID);

        echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
	}
?>