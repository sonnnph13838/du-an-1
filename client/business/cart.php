<?php
    function order(){
        client_render('cart/order.php');
    }
    function bill(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        if (isset($_POST['next_pay']) && ($_POST['next_pay'])) {
            $id_user=$_POST['id'];
            $name=$_POST['name'];
            $tel=$_POST['tel'];
            $email=$_POST['email'];
            $address=$_POST['address'];
            $date = date('m/d/Y h:i:s a', time());
            $sql = "INSERT into bill(id_user,name_bill,tel,email,address,date) VALUES ('$id_user','$name','$tel','$email','$address','$date')";
            $id_bill = pdo_execute_return_lastInsertId($sql);
            $sqls = "select *from bill where id_bill=$id_bill";
            $bill =  executeQuery($sqls,true);

        }
        client_render('cart/bill.php',compact('bill'));
    }
    function comfirmbill(){
        if (isset($_POST['pay']) && ($_POST['pay'])) {
            $id_bill=$_POST['id'];
            $payment = $_POST['pttt'];
            if($payment==0){
                $sql="UPDATE  bill set payment = 0 where id_bill=$id_bill";
                pdo_execute($sql);
            }elseif($payment==1){
                $sql="UPDATE  bill set payment = 1 where id_bill=$id_bill";
                pdo_execute($sql);
            }elseif($payment==2){
                $sql="UPDATE  bill set payment = 2 where id_bill=$id_bill";
                pdo_execute($sql);
            }
            
        }
        header('Location: '. BASE_URL . '');
    }
?>