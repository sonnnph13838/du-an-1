<?php

function slectData(){
    $sql = "select * from contact_infor";
    $contact = executeQuery($sql,false);
    return $contact;
}

?>