# SimpleMD Website Engine

The SimpleMD website engine is intended for very simple, text-based
websites.  The idea is to install SimpleMD on your server and then
maintain your website entirely inside a markdown file tree, which 
will completely eliminate the high overhead of using a database for
your website.

The root directory of SimpleMD contains three directories. When you 
edit the `public_html/index.php` file, you will find
several options at the top; make sure the options are set as you
want them to be, save the file, and close. You'll be ready to go!

You'll likely also want to delete this file and the other temporary
markdown files in the `content` directory, as you'll probably not 
want them to be a part of your website.

## Directories

	/	
	|
	|- /content
	|
	|- /simplemd
	|  |
	|  |- /simplemd/templates
	|
	|- /public_html
	   |
	   |- /public_html/assets

These directories contain resources for the website. By default,
the directory structure is configured to keep the php source code
(in `/simplemd`) and the markdown source documents (in `content`)
out of the publicly-accessible portion of your webserver's file
tree. If you need to change any of these paths, be sure to update
the paths inside `index.php` in your document root.

`simplemd` houses all the php code for the website, including the
simplemd engine and the php markdown library. It also contains the
`templates` directory, in which you can create and edit your
various website templates.

`public_html` contains all your non-text content for your website.
Please note that if any path exists in both this `public_html`
directory *and* in your `content` document tree, the content from
`public_html` will take precedence and will be displayed.

All stylesheets, images, and other supporting content should go in
the `public_html/assets` directory, in an appropriate subdirectory.

The `content` directory should house all your markdown documents,
in the tree structure you want your URLs to use.

## Templates

As stated before, the `simplemd/templates` directory  contains the 
site template resources that SimpleMD uses to render your page to 
the browser.  If you'd like to build your own template, just 
create a directory inside `simplemd/templates` with a file called 
`template.php`; then change the template setting in your 
`/index.php` file to match the directory name, and you're all set!

You can optionally include a `404.md` file inside your template
directory if you'd like to customize the text of your 404 page.

