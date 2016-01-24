<?php
 session_start();
    session_unset();
    session_destroy();
 session_start();
include_once('functions.php');


if (isset($_POST['login'])) {
        $user = htmlentities(strtolower(trim($_POST['user'])));
        $pass = htmlentities(strtolower(trim($_POST['pass'])));

        $pass = md5($pass);
    
        $query = "SELECT * FROM tams_users WHERE user_name = '$user' AND password = '$pass' AND user_status = 'active' ";
        $res = DB::queryFirstRow($query);
        if ($res) {
                
            $_SESSION['role_id'] = $res['role_id'];
            $_SESSION['user_id'] = $res['user_id'];
             $_SESSION['user_email'] = $res['user_email'];
            $_SESSION['user_name'] = $user;
            $_SESSION['first_name'] = $res['first_name'];
            $_SESSION['last_name'] = $res['last_name'];
            $_SESSION['full_name'] = $_SESSION['first_name']." ".$_SESSION['last_name'];
             
// Redirect to appropriate home page after successfull login
			switch($_SESSION['role_id']){
				case 1 :
						// this is admin user redirect to app-admin	
						header('Location: ../dashboard/index.php');
			            exit;
					break;
				case 2 :
					// this is Client user Managing companies redirect to Client Portal	
						header('Location: ../dashboard/index.php');
			            exit;
					break;
				case 3 :
				// this is Company Manager User redirect to hrm module in Client Portal	
						header('Location: ../dashboard/index.php');
			            exit;

					break;
				default :
				// All other Users Go to Subscription page
						header('Location: ../index.php');
			            exit;
					break;
			}  	
 
            //header('Location: dashboard.php');
            //exit;
        }
        else {
           $_SESSION['errors'][] = 'Username or Password not found...';
           header('Location: index.php');
           exit;
        }
    }
 print_r($_POST);
 print_r($_SESSION);




?>