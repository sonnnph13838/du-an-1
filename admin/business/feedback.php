<?php
require_once './dao/system_dao.php';
function list_feedback()
{
    $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
    $sql = "SELECT * from feedback where email like '%$keyword%'";
    $list_feedback =  pdo_query($sql);
    admin_render(
        'feedback/list-feedback.php',
        compact('list_feedback', 'keyword'),
        'admin-assets/custom/category_index.js'
    );

}
function formreply(){
    $sql = "SELECT * from feedback where id =".$_GET['id'];
    $list_feedback =  pdo_query($sql);
    admin_render(
        'feedback/reply.php', compact('list_feedback')
    );
}

?>