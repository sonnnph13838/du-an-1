<?php

function list_products_top()
{
    $sql = "select * from food where 1 order by views_food desc limit 0,4";
    $topsanpham = executeQuery($sql, true);
    
    return $topsanpham;
}

// function list_products_sell()
// {
//     $sql = "select * from food where discount_food > 0 ";
//     $sanphamkm = executeQuery($sql, true);
//     return $sanphamkm;
// }
function show_cmt()
{
    $sql = "SELECT comment.*,user.name_user FROM comment JOIN user ON comment.id_user=user.id_user";
    $listcmt = executeQuery($sql, true);
    // dd($listcmt);
    client_render('ctsp/sp.php', compact('listcmt'));
}
function post_cmt()
{
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    if (isset($_POST['guibl']) && ($_POST['guibl'])) {
        $id_food = $_POST['id_food'];
        // dd($id_food);
        $id = ($_POST['id_user']);
        $date = date('m/d/Y', time());
        $cmt = $_POST['cmt'];
        $sql = "INSERT INTO comment (content, date,id_user,id_food) values ('$cmt', '$date','$id','$id_food')";
        executeQuery($sql);
    }
    header('location: ' . BASE_URL . 'spct&id_food=' . $_POST['id_food'].'&id_type=' . $_POST['id_type']);
}


// function list_products_top(){
// $sql = "select * from food where 1 order by views_food desc limit 0,4";
// $topsanpham = executeQuery($sql,true);
// return $topsanpham;
// }

function list_products_sell()
{
    $sql = "select * from food where discount_food > 0 ";
    $sanphamkm = executeQuery($sql, true);
    return $sanphamkm;
}
function loadone_sanpham()
{
    $id_food = $_GET['id_food'];
    $sql = "select * from food where id_food=" . $id_food;
    $sp = executeQuery($sql, true);
    $sqlcmt = "SELECT comment.*,user.name_user FROM comment JOIN user ON comment.id_user=user.id_user where id_food= " . $id_food;
    $listcmt = executeQuery($sqlcmt, true);
    $slx = "UPDATE food set views_food = views_food + 1 where id_food=" . $id_food;
    executeQuery($slx);
    // dd($listcmt);
    $id_type = $_GET['id_type'];
    $sql="select * from food where id_type = ".$id_type." AND id_food <> ".$id_food;
    $listspcl = executeQuery($sql, true);
    client_render('ctsp/sp.php', compact('sp', 'listcmt', 'listspcl'));
}

function post_timkiem()
{
    $tukhoa = isset($_GET['tukhoa']) ? $_GET['tukhoa'] : "";
    $sql="select * from food where 1";
    if($tukhoa!=""){
        $sql.=" and name_food like '%".$tukhoa."%'";
    } else{
        $tukhoa = "";
    }
    $listsanpham= executeQuery($sql,true);
    client_render('products/trang_sp.php', compact('listsanpham','tukhoa'));
    // } 
    // $listsanpham = executeQuery($sql,true);
    // client_render('products/trang_sp.php', compact('listsanpham'));
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
