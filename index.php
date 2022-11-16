<?php
function gotoPage($location)
{
  header('location:' . $location);
  exit();
}

gotoPage('user/index');
