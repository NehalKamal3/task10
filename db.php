<?php


$conn= mysqli_connect("localhost","root","","task10");


if(!$conn){
    echo 'error connection';
    exit();
}