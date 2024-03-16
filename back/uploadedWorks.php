<?php

include('header.php');


require('env.php');
global $mail;
$select = $db->query('SELECT id FROM user');
$results = $select->fetch();
$counttable = count($results);
if($counttable!=0){
    foreach($results as $result){
        $target_dir = $result.'/';
        echo "Utilisateur " . $result . " :<br>";
        $folders = scandir($target_dir);
        for($i = 2; $i < count($folders); $i++){
            if ($folders[$i] != ".."){
                echo $folders[$i] . " :";
                $files = scandir($target_dir . $folders[$i]);
                for($i = 2; $i < count($files); $i++){
                    echo $files[$i] . "<br>";
                }
                echo "<br>";
            }
        }
        echo "<br>";
    }
}
else{
  return 'erreur req';
}




?>

<br>
<a href="index.php">Retour</a>