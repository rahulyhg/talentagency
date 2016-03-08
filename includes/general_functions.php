<?php
//Returns Date given in Selected Format
function getDateTime($time = 0, $form = "dtLong") {
	Switch($form) {
		case "dtVLong":
		$strform = "D, jS F, Y g:i:s a (\G\M\T O)";
		break;
		case "dtLong":
		$strform = "D, jS F, Y g:i a";
		break;
		case "dtShort":
		$strform = "jS M, Y g:i a";
		break;
		case "dtMin":
		$strform = "j-n-y G:i";
		break;
		case "dLong":
		$strform = "D, jS F Y";
		break;	
		case "dShort":
		$strform = "j-M-Y";
		break;
		case "dMin":
		$strform = "j-n-y";
		break;
		case "tLong":
		$strform = "G:i:s (\G\M\T O)";
		break;
		case "tShort":
		$strform = "G:i";
		break;
		case "mySQL":
		$strform = "Y-m-d H:i:s";
		break;
		case "DmySQL":
		$strform = "Y-m-d";
		break;
		case "dTAMS":
		$strform = "d-m-Y";
		break;
		default:
		$strform = "j-M-Y g:ia";	
	}
	if ($time == 0 ){	
	$formated_time = date($strform);
	} else {
	$time = strtotime($time);	
	$formated_time  = date($strform, $time);
	}
	return $formated_time;
}

// To Prevent SQL injection
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

function get_domain($url)
{
  $pieces = parse_url($url);
  $domain = isset($pieces['host']) ? $pieces['host'] : '';
  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    return $regs['domain'];
  }
  return false;
}


function get_host() {
    if ($host = $_SERVER['HTTP_X_FORWARDED_HOST'])
    {
        $elements = explode(',', $host);
		
        $host = trim(end($elements));
    }
    else
    {
        if (!$host = $_SERVER['HTTP_HOST'])
        {
            if (!$host = $_SERVER['SERVER_NAME'])
            {
                $host = !empty($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '';
            }
        }
    }
	
    // Remove port number from host
    $host = preg_replace('/:\d+$/', '', $host);
	
    return trim($host);
}
function round2dp($number){
		return number_format((float)$number, 2, '.', ',');
	}

function col_index($string , $line){
	
		$found = 0;
		$i = 0;
		while ($found == 0 && $i < count ($line))
		{
			if ($line[$i] == $string)
			{
					$found = 1;
			}
			else
			{
				$i = $i + 1;
			}
		}
		if ($found ==0) return -1;
		else return $i;
		
	}

function parseTree($root, $arr) {
        $return = array();
        # Traverse the tree and search for direct children of the root
        foreach($arr as $child => $parent) {
            # A direct child is found
            if($parent == $root) {
                # Remove item from tree (we don't need to traverse this again)
                unset($arr[$child]);
                # Append the child into result array and parse it's children
                $return[] = array(
                    'name' => $child,
                    'children' => parseTree($child, $arr)
                );
            }
        }
        return empty($return) ? null : $return;    
    }
    
function printTree($arr) {
        if(!is_null($arr) && count($arr) > 0) {
            echo '<ul>';
            foreach($arr as $node) {
                echo "<li>".  $node['sect_name'] . "";
                if (array_key_exists('children', $node)) {
                    printTree($node['children']);
                }
                echo '</li>';
            }
            echo '</ul>';
        }
    } 
    
function ShowYesNo($pass_value) 
{

	if($pass_value==1) return "YES";
	elseif($pass_value==0) return "NO";
	elseif($pass_value==-1) return "UNKNOWN";

}


function ShowTickCross($pass_value) 
{

	if($pass_value==1) return "<!-- <span class='glyphicon glyphicon-ok' ></span> -->YES";
	elseif($pass_value==0) return "<!-- <span class='glyphicon glyphicon-remove' ></span> -->NO";
	elseif($pass_value==-1) return "<!-- <span class='glyphicon glyphicon-question-sign' ></span> -->N/A";

}

function generer_token($nom = '') { 
    	$token = uniqid(rand(), true); 
    	$_SESSION[$nom.'_token'] = $token; 
    	$_SESSION[$nom.'_token_time'] = time(); 

    	return $token; 
}

function verifier_token($temps, $referer, $nom = '') { 

	if(isset($_SESSION[$nom.'_token']) && isset($_SESSION[$nom.'_token_time']))	{ 
		if( $_SESSION[$nom.'_token'] == $_POST['token'] )  {
			if($_SESSION[$nom.'_token_time'] >= (time() - $temps)) {
				if($_SERVER['HTTP_REFERER'] == $referer)   {
				return true; 
				}    						
			}
		}
	}  		 	   
    					
    	return false; 
}    

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source http://gravatar.com/site/implement/images/php/
 */
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function getAge( $dob )
{	
    $age = date_create($dob)->diff(date_create('today'))->y;
    
    return $age;

}
function monthdiff($date1 , $date2) 
	{
				
			$d1 = strtotime($date1);
			$d2 = strtotime($date2);
			$min_date = min($d1, $d2);
			$max_date = max($d1, $d2);
			$i = 1;

			while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
					    $i++;
					}
			return $i;
	}

function WriteToCSV($filename, $text)
{
	if (file_exists($filename)) { unlink ($filename); }
	$fh = fopen($filename, 'w') or die("can't open file"); 
	fwrite($fh, $text); 
	fclose($fh); 
}


function DateDiff($date1, $date2)
{
	$diff =  strtotime($date1) - strtotime($date2);
	$years = floor($diff / (365*60*60*24)); 
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
	return ($years."y".$months."m");
}

function ShowNum($number) {

    $new_number = number_format($number, 2, '.', ',');
    return $new_number;
}

function ShowThousand($number)
{
	$new_number = number_format($number/1000,0);
	return $new_number;
}

function getURL($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}

function IsChecked($chkname,$value)
{
    if(!empty($_POST[$chkname]))
    {
        foreach($_POST[$chkname] as $chkval)
        {
            if($chkval == $value)
            {
                return true;
            }
        }
    }
    return false;
}

function LastDayOfMonth($date="today") {

    $timestamp = strtotime($date);
    $lastDate = date("Y-m-t", $timestamp);
    return $lastDate;				   
}

function array_cartesian_product($arrays)
{
    $result = array();
    $arrays = array_values($arrays);
    $sizeIn = sizeof($arrays);
    $size = $sizeIn > 0 ? 1 : 0;
    foreach ($arrays as $array)
        $size = $size * sizeof($array);
    for ($i = 0; $i < $size; $i ++)
    {
        $result[$i] = array();
        for ($j = 0; $j < $sizeIn; $j ++)
            array_push($result[$i], current($arrays[$j]));
        for ($j = ($sizeIn -1); $j >= 0; $j --)
        {
            if (next($arrays[$j]))
                break;
            elseif (isset ($arrays[$j]))
                reset($arrays[$j]);
        }
    }
    return $result;
}

function valid_date($date, $format = 'YYYY-MM-DD'){
	
    if(strlen($date) >= 8 && strlen($date) <= 10){
        $separator_only = str_replace(array('M','D','Y'),'', $format);
        $separator = $separator_only[0];
        if($separator){
            $regexp = str_replace($separator, "\\" . $separator, $format);
            $regexp = str_replace('MM', '(0[1-9]|1[0-2])', $regexp);
            $regexp = str_replace('M', '(0?[1-9]|1[0-2])', $regexp);
            $regexp = str_replace('DD', '(0[1-9]|[1-2][0-9]|3[0-1])', $regexp);
            $regexp = str_replace('D', '(0?[1-9]|[1-2][0-9]|3[0-1])', $regexp);
            $regexp = str_replace('YYYY', '\d{4}', $regexp);
            $regexp = str_replace('YY', '\d{2}', $regexp);
            if($regexp != $date && preg_match('/'.$regexp.'$/', $date)){
                foreach (array_combine(explode($separator,$format), explode($separator,$date)) as $key=>$value) {
                    if ($key == 'YY') $year = '20'.$value;
                    if ($key == 'YYYY') $year = $value;
                    if ($key[0] == 'M') $month = $value;
                    if ($key[0] == 'D') $day = $value;
                }
                if (checkdate($month,$day,$year)) return true;
            }
        }
    }
    return false;
}

function left($str, $length) {
	return substr($str, 0, $length);
}

function right($str, $length) {
	return substr($str, -$length);
}