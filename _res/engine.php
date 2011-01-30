<?php
	
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
	
	// include resources
	include_once($doc_root.'_res/md/markdown.php');
	
	// if there's no requested path, use markdown file named 'index'.
	if (isset($_GET["mdpg"]) && strlen($_GET["mdpg"]) > 0) $mdpg = $_GET["mdpg"];
	else $mdpg = "index";
	
	if ($mdpg == "sitemap") { sitemap($doc_root); exit(); }
	
	$file = false;
	
	foreach (explode("|",MARKDOWN_EXTS) as $ext) {
		if (file_exists($doc_root.$mdpg.".".$ext)) {
			$file = $doc_root.$mdpg.".".$ext;
			break;
		}
	}
	
	
	if ($file !== false) {
		$unformatted_content = file_get_contents ( $file );
		$the_content = Markdown($unformatted_content);
		$the_title = "Test Page!!";
		include($doc_root.TEMPLATEPATH);
	}
	else {
		$the_title = "Page not found.";
		$the_content = "<h1>404 - Page not found</h1>\n\n<p>Sorry, but this link is bad. ".
			"Please notify the webmaster of the site where you found it.</p>";
		header("HTTP/1.0 404 Not Found");
		include($doc_root.TEMPLATEPATH);
	}
	
	
	function sitemap( $doc_root , $base_path = "" ) {
		

		if (is_dir($doc_root.$base_path)) {
			
			// get an array containing all filenames in the directory
			$filenames = scandir($doc_root.$base_path);
			
			// iterate through all filenames, ignoring:  .  ..  _res  _template
			foreach ($filenames as $fn) { if ($fn != "." && $fn != ".." && $fn != "_template"&& $fn != "_res") {
					
					// run this function recursively for directories
					if (is_dir($doc_root.$base_path.$fn)) { sitemap($doc_root,$base_path.$fn."/"); }
					else {
						
						// look at only the files ending with a markdown extension...
						foreach (explode("|",MARKDOWN_EXTS) as $ext) { if (endswith($fn,".".$ext)) {
							
							// echo them into a list
							echo $base_path.$fn."<br>";
						
						} }
						
					}
					
			} }
		}
	}