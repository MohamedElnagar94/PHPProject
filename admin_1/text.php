<?php

include "../database/connection.php";
$query = "SELECT * FROM users,rooms WHERE users.room_id = rooms.id";
$result = mysqli_query($connect,$query);
//$count = 1;
print_r($result) ;

//$row = mysqli_fetch_assoc($result);
while($row = mysqli_fetch_assoc($result)) {
    echo "<pre>";
    print_r($row) ;
    echo "</pre>";
}