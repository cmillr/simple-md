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
	
	
	
	
	
	/* ### DO NOT EDIT BELOW THIS POINT. */
	
	
	// we know all we need to know about this environment, so set the constants
	define('TEMPLATEPATH','_template/'.$template.'/template.php');
	define('MARKDOWN_EXTS',$markdown_ext);
	
	
	
	
	// start 'er up
	include("_res/engine.php");
	