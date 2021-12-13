<?php
    function list_cart(){
        $sql = "SELECT * FROM `cart_food` a JOIN cart b ON a.id_cart=b.id_cart where id_bill =" . $_GET['id'];
	    $listCthd = executeQuery($sql, true);
	    $sql = "SELECT * FROM `cart_option` a JOIN cart b ON a.id_cart=b.id_cart where id_bill =" . $_GET['id'];
	    $listOption = executeQuery($sql, true);
        admin_render('bill/cart.php',
        compact('listCthd', 'listOption')
        );
       
    }
