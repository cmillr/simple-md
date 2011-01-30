<?php 
  
  if (!isset($the_title)) $the_title = "";
  
  
?><!DOCTYPE html>
<html>
  <head>
  	<meta charset=utf8 />
  	<title><?=$the_title?></title>
  	<!-- <link rel="stylesheet" href="/_/css/style.css" /> -->
  	<style>

body { font:normal 14px/1.4 sans-serif;color:#444;background:#999;margin:0;padding:0; }
#outer { width: 960px;margin:0 auto 0 auto;padding:2em 0; }
#wrap { background:#fff;padding:60px 80px; }
code, pre, tt { font-family:monospace, sans-serif; }
code { background-color:#def; }
pre code { display:block; padding:.3em .5em; margin:1.5em .2em; background:#333;color:#fff; border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px; }

  	</style>
  </head>
  <body>
    
    <div id="outer"><div id="wrap">
    
    	<?=$the_content?>
    
    </div></div>
    
  </body>
</html>