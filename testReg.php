<?php
$pattern = "/^(-?[1-9][0-9]{0,4}\.[0-9]{1,20}|0)$/";
$str = '-123d3.1';
$str =  preg_match($pattern, $str) ? $str : '123';
echo $str;
