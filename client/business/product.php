<?php 

function list_products_top(){
    $sql = "select * from food where 1 order by views_food desc limit 0,4";
    $topsanpham = executeQuery($sql,true);
    return $topsanpham;
}

function list_products_sell(){
    $sql = "select * from food where discount_food > 0 ";
    $sanphamkm = executeQuery($sql,true);
    return $sanphamkm;
}

function page_product(){
    client_render('products/trang_sp.php');
}

function list_product(){

    $sp_tung_trang = 6;
    if(!isset($_GET['trang'])){
        $trang = 1;
    }else {
        $trang = $_GET['trang'];
    }
    $sttrang = ($trang-1) * $sp_tung_trang;

    $sql = "select * from food ";
    if(isset($_GET['iddm'])){
        
        $iddm = $_GET['iddm'];
        $sql .= "where id_type = '$iddm' ";
    }
    
    $sql .= "order by id_food desc limit $sttrang,$sp_tung_trang";
    $sp = executeQuery($sql,true);
    return $sp;
}

function phan_trang(){
    $all_query = "select count(*) from food";
    if(isset($_GET['iddm'])){
        $iddm = $_GET['iddm'];
        $all_query .= " where id_type = '$iddm'";
    }
    $number_of_rows = get_rows($all_query);
    $button = ceil($number_of_rows/6);
    for($i=1;$i<=$button;$i++){
        if(isset($_GET['iddm'])){
            $link = BASE_URL . 'mon-an&iddm='.$iddm.'&trang='.$i;
        }else{
            $link = BASE_URL . 'mon-an&trang='.$i;
        }
            
        echo '<a class= "trang_so" href="'.$link.'">'.$i.'</a>';
    }
}
?>