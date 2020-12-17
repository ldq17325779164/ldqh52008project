<?php

$con = mysqli_connect('localhost','root','123456','ldq');

$tel1 = $_POST['tel1'];


$sql = "SELECT * FROM `stu` WHERE `tel`='$tel1' ";

$res = mysqli_query($con,$sql);

if (!$res) {
die('error for mysql: ' . mysqli_error($con));
}

$row = mysqli_fetch_assoc($res);

if (!$row) {
// 没有匹配的数据 登录失败
echo json_encode(array(
    "code" => 0,
    "message" => "登录失败"
));
// print_r("该用户没注册");
} else {
// 有匹配的数据 登录成功
echo json_encode(array(
    "code" => 1,
    "message" => "登录成功"
));
// print_r("登录成功");

}

    ?>