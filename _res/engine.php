<?php
	
	// check current path for the all-important trailing slash
	if ( ! endswith($_SERVER['REQUEST_URI'],"/") ) { 
	    header("Location: ".$_SERVER['REQUEST_URI']."/");
	    exit(); 
	}
	
	// get the document root for the current directory
	$doc_root = implode('/',explode('/',$_SERVER['SCRIPT_FILENAME'],-1)).'/';
	
	// include markdown resources
	include_once($doc_root.'_res/md/markdown.php');
	
	// if there's no requested path, look for a markdown file named 'index'.
	if (isset($_GET["mdpg"]) && strlen($_GET["mdpg"]) > 0) $mdpg = $_GET["mdpg"];
	else $mdpg = "index/";
	
	// strip the trailing slash
	$mdpg = substr($mdpg, 0, strlen($mdpg)-1);
	
	// TODO: handle sitemap better
	if ($mdpg == "sitemap") { sitemap($doc_root); exit(); }
	
	// see if the file exists
	$file = find_file( $doc_root.$mdpg , DIR_FIRST );
	
	
	if ($file !== false) {
	
		// if the file the user requested exists, show it
		$unformatted_content = file_get_contents ( $file );
		$the_content = Markdown($unformatted_content);
		$the_title = "Test Page!!";
		include($doc_root.TEMPLATEPATH);
	
	} else {
		
		// if the file the user requested doesn't exist, show a 404		
		if (is_file($doc_root.TEMPLATEPATH."404.md")) {
			
			// if the template has a 404.md, use that for the markdown text...
			$unformatted_content = file_get_contents ( $doc_root.TEMPLATEPATH."404.md" );
			$the_content = Markdown($unformatted_content);
			$the_title = "Test Page!!";
			header("HTTP/1.0 404 Not Found");
			include($doc_root.TEMPLATEPATH);
			
		} else {
			
			// ...otherwise use the default markdown text
			$the_title = "Page not found.";
			$the_content = "<h1>404 - Page not found</h1>\n\n<p>Sorry, but this link is bad. ".
				"Please notify the webmaster of the site where you found it.</p>";
			header("HTTP/1.0 404 Not Found");
			include($doc_root.TEMPLATEPATH);
			
		}
		
	}
	
	
	
	/* --- UTILITY FUNCTIONS --- */
	
	
	// returns a BOOL indicating whether the provided
	// $string ends with the string $test
	function endswith($string, $test) {
    	$strlen = strlen($string);
    	$testlen = strlen($test);
    	if ($testlen > $strlen) return false;
    	return substr_compare($string, $test, -$testlen) === 0;
	}
	
	
	// returns either a string indicating the correct
	// path to the file, or FALSE if it couldn't be found
	function find_file ( $file_string , $dir_first = true ) {
		
		// if we need to check the directory first, then
		// call this function recursively to do so
		if ( $dir_first && is_dir($file_string)) { 
			$dir_file = find_file($file_string."/index",false);
			if ($dir_file !== false ) return $dir_file;
		}
		
		// check the file path with all possible extensions
		foreach (explode("|",MARKDOWN_EXTS) as $ext) {
			if (file_exists($file_string.".".$ext)) {
				return $file_string.".".$ext;
			}
		}
		
		// if we haven't found anything yet, then
		// we're out of luck; return false
		return false;	
		
	}
	

	// generates a (text-only, for now) sitemap including
	// only the markdown files
	function sitemap( $doc_root , $base_path = "" ) {
		

		if (is_dir($doc_root.$base_path)) {
		
			// set up a return array
			$to_return = array();
			
			// get an array containing all filenames in the directory
			$filenames = scandir($doc_root.$base_path);
			
			// iterate through all filenames, ignoring:  .  ..  _res  _template
			foreach ($filenames as $fn) { 
				if ($fn != "." && $fn != ".." && $fn != "_template"&& $fn != "_res") {
					
					// run this function recursively for directories
					if (is_dir($doc_root.$base_path.$fn)) { sitemap($doc_root,$base_path.$fn."/"); }
					else {
						
						// look at only the files ending with a markdown extension...
						foreach (explode("|",MARKDOWN_EXTS) as $ext) { 
							if (endswith($fn,".".$ext)) {
							
								// get the path minus extension minus period
								$without = $base_path.substr($fn,0,-strlen(".".$ext));
								//$without = substr($fn,0,-strlen(".".$ext));
								
								// strip 'index' from the path
								if (endswith($without,"/index")) { $without = substr($without,0,-6); }
							
								// echo them into a list
								//$to_return[] = $without;
								echo "<a href=\"/".$without."/\">".$without."</a><br>";
						
							}	
						}	
					}	
				}
			}
			
			//return $to_return;
				
		}	
	}
	
	
