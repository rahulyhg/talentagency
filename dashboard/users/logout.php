<?php

    session_unset();
    session_destroy();
    echo '<script type="text/javascript"> windows.location.replace("'.SITE_ROOT.'";) </script>';
	 
?>