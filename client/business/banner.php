<?php

function lst_banner(){
    $sql = "select * from slide";
    $list_banner = executeQuery($sql);
    return $list_banner;
}

?>