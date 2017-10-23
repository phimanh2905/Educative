<?php
/*lay ten san pham*/
    function get_product_name($pid){
        $result=mysql_query("select product_name from product where iID=$pid") or die("select name from product where serial=$pid"."<br/><br/>".mysql_error());
        $row=mysql_fetch_array($result);
        return $row['product_name'];
    }
/*lay gia ban*/
    function get_price($pid){
        $result=mysql_query("select cost from product where iID=$pid") or die("select name from product where serial=$pid"."<br/><br/>".mysql_error());
        $row=mysql_fetch_array($result);
        return $row['cost'];
    }
/*xoa san pham trong gio hang*/
    function remove_product($pid){
        $pid=intval($pid);
        $max=count($_SESSION['cart']);
        for($i=0;$i<$max;$i++){
            if($pid==$_SESSION['cart'][$i]['productid']){
                unset($_SESSION['cart'][$i]);
                break;
            }
        }
        $_SESSION['cart']=array_values($_SESSION['cart']);
    }
/*tong gia don hang*/
    function get_order_total(){
        $max=count($_SESSION['cart']);
        $sum=0;
        for($i=0; $i<$max; $i++) {
            $pid=$_SESSION['cart'][$i]['productid'];
            $q=$_SESSION['cart'][$i]['qty'];
            $price=get_price($pid);
            $sum+=$price*$q;
        }

        return $sum;
    }
/*add vao gio hang*/
    function addtocart($pid,$q){
        if($pid < 1 or $q < 1)

            return;
        
        if(is_array($_SESSION['cart'])){
            if(product_exists($pid)) return;
            $max=count($_SESSION['cart']);
            $_SESSION['cart'][$max]['productid']=$pid;
            $_SESSION['cart'][$max]['qty']=$q;
        }
        else{
            $_SESSION['cart']=array();
            $_SESSION['cart'][0]['productid']=$pid;
            $_SESSION['cart'][0]['qty']=$q;
        }
    }
/*thoat van luu session ve mat hang*/
    function product_exists($pid){
        $pid = intval($pid);
        $max = count($_SESSION['cart']);
        $flag = 0;
        for($i=0; $i < $max; $i++){
            if($pid == $_SESSION['cart'][$i]['productid']){
                $flag = 1;

                break;
            }
        }
        return $flag;
    }

?>