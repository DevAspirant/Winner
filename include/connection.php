<?php 
$connection = mysqli_connect('localhost','root','','nour_course');

if(!$connection){
    echo 'Error: ' . mysqli_connect_error();
}