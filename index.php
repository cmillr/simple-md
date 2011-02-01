<?php
	
	ini_set('error_reporting', E_ALL);
	
	/*
	
	MARKDOWN_EXT variable
	---------------------
	
	This is is the list of file extensions to be considered
	markdown files.  They should be listed together, delimited
	by the pipe (|) character.
	
	They should also be listed in order of precedence, highest
	to lowest. This means if you have both file `foo.md` and
	file `foo.markdown` in your site, and your $markdown_ext
	lists the `md` extension before the `markdown` extension,
	then the `foo.md` file will be displayed while the
	`foo.markdown` file will be ignored.
	
	Default:
	$markdown_ext = "md|markdown|MARKDOWN|text";
	
	*/
	$markdown_ext = "md|markdown|MARKDOWN|text";
	
	
	/*
	
	TEMPLATE variable
	-----------------
	
	This is the name of the directory inside `_template/` that
	contains your template file(s).
	
	The template file will contain all the HTML markup that you
	want to be surrounding your markdown-converted content. It
	should echo the `$content` variable where you want your
	content displayed and it should echo the
	
	Default:
	$template = "default";
	
	*/
	$template = "default";
	
	
	/*
	
	DIR INDEX PRIORITY variable
	-----------------
	
	This is a boolean indicating whether a directory index.md
	page will take precedence over a file named the same as the
	directory.
	
	For example, if you have both:
	
	example.md
	example/index.md
	
	Which of these should be displayed at the /example/ path?
	
	TRUE = the directory index.md takes precedence
	FALSE = the non-index file takes precedence
	
	Default:
	$dir_index_priority = true;
	
	*/
	$dir_index_priority = true;
	
	
	
	
	
	
	/* That's it, you're all done! Enjoy SimpleMD! */
	
	
	/* --------------------- DO NOT EDIT BELOW THIS POINT. --------------------- */
	
	
	// we know all we need to know about this environment, so set the constants
	define('TEMPLATEPATH','_template/'.$template.'/template.php');
	define('MARKDOWN_EXTS',$markdown_ext);
	define('DIR_FIRST',$dir_index_priority);
	
	
	
	// start 'er up
	include("_res/engine.php");
	