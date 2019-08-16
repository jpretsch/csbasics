<?php

$t = $_GET['t'];

switch($t){
    case 'fib':
        include 'fibinacci.php';
        break;
    case 'bub':
        include 'bubble_sort.php';
        break;
    case 'll':
        include 'linked_list.php';
        break;
    case 'bintree':
        include 'binary_tree.php';
        break;
    default:
        echo 'Nothing to do';
}