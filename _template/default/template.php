<?php 
  
  if (!isset($the_title)) $the_title = "";
  
  
?><!DOCTYPE html>
<html>
  <head>
  	<meta charset=utf8 />
  	<title><?=$the_title?></title>
  	<!-- <link rel="stylesheet" href="/_/css/style.css" /> -->
  	<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono|Droid+Sans:regular,bold' rel='stylesheet' type='text/css'>

  	<style>

body { font:normal 14px/1.4 'Droid Sans',sans-serif;color:#444;background:#999;margin:0;padding:0; }
#outer { width: 860px;margin:0 auto 0 auto;padding:2em 0; }
#wrap { background:#fff;padding:100px 150px;box-shadow:0 0 8px #444;-moz-box-shadow:0 0 8px #444;-webkit-box-shadow:0 0 8px #444; }
code, pre, tt { font-family:'Droid Sans Mono',monospace,sans-serif; }
code { background-color:#def; }
pre code { display:block; padding:.3em .5em; margin:1.5em .2em; background:#333;color:#fff; border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px; }
h1 { font-weight: normal; font-size: 275%; line-height: 1.2; text-align: center; margin: 0 -50px 1.5em -50px; }
ul, ol { margin-left:0;padding-left:0; }

  	</style>
  </head>
  <body>
    
    <div id="outer"><div id="wrap">
    
    	<?=$the_content?>
    
    </div></div>
    
  </body>
</html>