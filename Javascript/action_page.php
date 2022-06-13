
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "rojmel";

$cont_to_db = mysqli_connect($servername, $username, $password, $database);
// if (!$cont_to_db) {
//     echo "Connetion Failed!!<br>" . mysqli_connect_error();
// } else {
//     echo "Database : $database Connected successfully.<br>";
// 
?>


<?php

    $sql = "SELECT DISTINCT(Name) FROM `rojmel`;";
    $result = mysqli_query($cont_to_db,$sql);
    while ($list = mysqli_fetch_assoc($result)) {
        echo $list['Name'] ."</br>";
    }
?>
