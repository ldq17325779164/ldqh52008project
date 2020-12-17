<?php
    # 用户名 商品id
    $username = $_GET['username'];
    $cake_id = $_GET['id'];
    // $username = '婧婧';
    // $goods_id = '8';
    $con = mysqli_connect('localhost','root','123456','ldq');


    $sql = "SELECT * FROM `car` WHERE `username`='$username' AND `cake_id`='$cake_id'";
    $res = mysqli_query($con,$sql);

    if(!$res){
        die('error for mysql' . mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($res);
     # 如果购物车表中存在该条数据，让这个条数据中的goods_num 值加 1
    if($row){
        $cakeNum = $row['cake_num']+1;
       $res2= mysqli_query($con,"UPDATE `car` SET `cake_num` = '$cakeNum'  WHERE `username`='$username' AND `cake_id`='$cake_id'");
    }else{
        # 如果不存在，就往car表中 添加数据
        $res2= mysqli_query($con,"INSERT INTO `car` (`cake_id`, `username`, `cake_num`) VALUES ($cake_id, '$username', '1')");
    }
    if($res2){
        echo json_encode(array("code"=>true,"msg"=>"添加数据成功"));
    }

?>