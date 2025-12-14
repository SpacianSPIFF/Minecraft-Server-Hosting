<?php
$cmd = "cd server_files && java -Xmx1024M -Xms1024M -jar minecraft_server.1.19.2.jar nogui";
// $cmd = "cd server_files && java -Xmx512M -Xms32M -jar minecraft_server.1.19.2.jar nogui";

session_start();
$_SESSION['server_handle'] = null;
$_SESSION['pipes'] = null;
$status = null;
$incomingData = null;

if (isset($_POST["status"])) {
  $status = $_POST["status"];
}

if (isset($_POST["data"])) {
  $incomingData = $_POST["data"];
}

// Start Server
if ($status == "start") {
  echo "Starting Server...";

  $descriptorspec = array(
    0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
    1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
  );
    
  $_SESSION['server_handle'] = proc_open($cmd, $descriptorspec, $_SESSION['pipes']);
  // $pipes now looks like this:
  // 0 => writeable handle connected to child stdin
  // 1 => readable handle connected to child stdout

  $reading_data = stream_get_contents($_SESSION['pipes'][1]);
  echo $reading_data;
  
  $reading_data = stream_get_contents($_SESSION['pipes'][1]);
  fclose($_SESSION['pipes'][1]);

  $exit_code = proc_close($_SESSION['server_handle']);

  echo "Server closed with exit code ".$exit_code;
}

// Stop Server
if ($status == "stop") {
  echo "Server Stopped!";

  fwrite($pipes[0], "stop");
  fclose($pipes[0]);

  $reading_data = stream_get_contents($pipes[1]);
  fclose($pipes[1]);

  $exit_code = proc_close($server_handle);

  echo "Server closed with exit code ".$exit_code;
}

// Communicate with minecrfat server process
if (!is_null($incomingData)) {
  echo "Data: ".$data;

  if (strcmp(strtolower($data), "stop") || strcmp(strtolower($data), "/stop"))

  fwrite($pipes[0], $data);
  // fclose($pipes[0]);
}
?>