<?php 

	$URL='web_p_project';
    require_once (realpath($_SERVER["DOCUMENT_ROOT"]) ."/".$URL.'/inc.php');
    if(is_user_login())
    {
        ?><script>window.location = '../index.php';</script><?php
    }
?>