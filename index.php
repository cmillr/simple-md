<?php
	
	$markdown_ext = "md|markdown|MARKDOWN|text";
	$template = "default";
	
	
	// Settings are all done, no need to modify below this point.
	
	include_once('_res/markdown.php');
	
	function endswith($string, $test) {
    	$strlen = strlen($string);
    	$testlen = strlen($test);
    	if ($testlen > $strlen) return false;
    	return substr_compare($string, $test, -$testlen) === 0;
	}
	
	// get the document root for the current directory
	$doc_root = $_SERVER['SCRIPT_FILENAME'];
	$doc_root_pieces = explode("/",$doc_root);
	array_pop($doc_root_pieces);
	$doc_root = implode("/",$doc_root_pieces)."/";
	
	// if there's no 
	if (isset($_GET["mdpg"]) && strlen($_GET["mdpg"]) > 0) $mdpg = $_GET["mdpg"];
	else $mdpg = "index";
	
	if ($mdpg == "sitemap") { sitemap($doc_root); exit(); }
	
	$file = false;
	
	foreach (explode("|",$markdown_ext) as $ext) {
		if (file_exists($doc_root.$mdpg.".".$ext)) {
			$file = $doc_root.$mdpg.".".$ext;
			break;
		}
	}
	
	if ($file !== false) {
		$unformatted_content = file_get_contents ( $file );
		$the_content = Markdown($unformatted_content);
		$the_title = "Test Page!!";
		include("_templates/".$template."/template.php");
	}
	else echo "404.";
	
	
	function sitemap( $doc_root , $base_path = "" ) {
		
		//echo "sitemapping ".$doc_root.$base_path."<br>";
		if (is_dir($doc_root.$base_path)) {
			$filenames = scandir($doc_root.$base_path);
			foreach ($filenames as $fn) { if ($fn != "." && $fn != ".." && $fn != "_template"&& $fn != "_res") {
				
				if (is_dir($doc_root.$base_path.$fn)) { sitemap($doc_root,$base_path.$fn."/"); }
				else {
					echo $base_path.$fn."<br>";
					foreach (explode("|",$markdown_ext) as $ext) {
						if (endswith($fn,".".$ext)) {
							echo $base_path.$fn;
						}
					}
				}
				
				//echo "ALL: ".$base_path.$fn."<br>";
				
			}}
		}
		
	}