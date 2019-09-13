<?php 

	 require_once '../inc.php';
    if(!get_login_user_id())
    {
        ?><script>window.location = 'index.php';</script><?php
    }

	?>