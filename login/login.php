<?php
 session_start();
    session_unset();
    session_destroy();
 session_start();
include_once('functions.php');


if (isset($_POST['login'])) {
        $user = htmlentities(strtolower(trim($_POST['user'])));
        $pass = htmlentities(strtolower(trim($_POST['pass'])));

        $pass = sha1($pass);
    
        $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass' AND status = '1' ";
        $res = DB::queryFirstRow($query);
        if ($res) {
                
            $_SESSION['user_group_id'] = $res['user_group_id'];
            $_SESSION['user_id'] = $res['user_id'];
             $_SESSION['email'] = $res['email'];
            $_SESSION['username'] = $user;
            $_SESSION['client_id'] = $res['client_id'];
            $_SESSION['company_id'] = $res['company_id'];
            $_SESSION['firstname'] = $res['firstname'];
            $_SESSION['lastname'] = $res['lastname'];
            $_SESSION['fullname'] = $_SESSION['firstname']." ".$_SESSION['lastname'];
             
            $_SESSION['email'] = $res['email'];

// Redirect to appropriate home page after successfull login
			switch($_SESSION['user_group_id']){
				case 1 :
						// this is admin user redirect to app-admin	
						header('Location: ../mycompany/index.php');
			            exit;
					break;
				case 2 :
					// this is Client user Managing companies redirect to Client Portal	
						header('Location: ../mycompany/index.php');
			            exit;
					break;
				case 3 :
				// this is Company Manager User redirect to hrm module in Client Portal	
						header('Location: ../mycompany/index.php');
			            exit;

					break;
				default :
				// All other Users Go to Subscription page
						header('Location: ../public/subscribe/index.php');
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
//print_r($_POST);
//print_r($_SESSION);




?>