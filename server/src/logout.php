<?php

session_start();

session_destroy();

header("Refresh:0; url=http://localhost/foodel/client/src/index.php");
exit;