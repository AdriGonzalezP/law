<?php
if(!function_exists('recupera')){
  function recupera($key,$default=null){return isset($_REQUEST[$key])?intval($_REQUEST[$key]):$default;}
}
