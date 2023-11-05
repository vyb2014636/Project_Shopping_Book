<?php
function checkUser($username, $password) {
    $conn = connectdb();
    $stmt =  $conn -> prepare ("SELECT * FROM tbl_user WHERE username = '".$username."' AND  password = '".$password."'  " );
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    if(count($kq)>0) return $kq[0]['role'];
    else return 0;
}
