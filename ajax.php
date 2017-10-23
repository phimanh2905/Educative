<?php


    $conn=mysql_connect("localhost","root","") or die("Khong the ket noi voi database");
    mysql_select_db("educative",$conn);
    mysqli_set_charset($conn, "utf8");
    mysql_query("SET NAMES 'UTF8'");
    $email=$_POST['number'];
    $them="insert into newsfeed(email)values('".$email."')";
    $queryi=mysql_query($them);


    $name_addr=$_POST['name_addr'];
    $email_addr=$_POST['email_addr'];
    $content_addr=$_POST['content_addr'];
    $them2="insert into contact_form(name,email,content)values('".$name_addr."','".$email_addr."','".$content_addr."')";
    $query2=mysql_query($them2);


?>