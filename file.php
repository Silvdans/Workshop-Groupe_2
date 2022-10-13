<?php $command = escapeshellcmd("python script.py message");
$message = shell_exec($command);
 ?>