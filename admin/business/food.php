<?php
    require_once './dao/system_dao.php';
    function list_food()
    {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
        $sql = "SELECT * from food where name_food like '%$keyword%'";
        $list_food =  pdo_query($sql);
        $sqls = "SELECT * from category ";
        $list_category =  pdo_query($sqls);
        admin_render(
            'food/list_food.php',
            compact('list_food', 'keyword','list_category'),
            'admin-assets/custom/category_index.js'
        );
    }
    function edit_food()
    {
        $id = $_GET['id'];
        $sql = "SELECT * from food where id_food= $id";
        $list_food =  pdo_query_one($sql);
        
        
        $sqls = "SELECT * from category ";
        $list_category =  pdo_query($sqls);
        admin_render(
            'food/edit_food.php',
            compact('list_food','list_category')
        );
    }
    function add_food()
    {
        
        admin_render(
            'food/add_food.php'
        );
    }
