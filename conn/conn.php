<?php
header('Content-Type:text/html;charset=utf-8');
$conn = mysqli_connect('120.79.184.17','root','root', 'wxdevelopment',3306);
mysqli_query($conn,'set names utf8');