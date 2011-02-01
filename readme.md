# SimpleMD Website Engine

The SimpleMD website engine is intended for very simple, text-based
websites.  The idea is to install SimpleMD on your server and then
maintain your website entirely inside a markdown file tree.

The root directory of SimpleMD contains three directories and an
`index.php` file.  You'll want to edit the `index.php` to find
several options at the top; make sure the options are set as you
want them to be, save the file, and close. You'll be ready to go!

## Directories

    $ ls
    _               _res            _template       index.php

These three directories contain resources for the website.  Anything
you put in the `_` directory will be accessible from the internet,
so you'll want to make it a home for stylesheets, scripts, etc.
Resources in the other two directories (`_res` and `_template`) 
will **not** be accessible from the internet.

`_res` is home to the system resource files, and you'll never need
to modify the contents unless you want to alter the program code
in some way. (If you do that, please push your changes back to
GitHub for the rest of us!)

## Templates

`_template` contains the site template resources that SimpleMD
uses to render your page to the browser.  If you'd like to build
your own template, just create a directory inside `_template`
with a file called `template.php`; then change the template setting
in your `/index.php` file to match the directory name, and you're
all set!

You can optionally include a `404.md` file inside your template
directory if you'd like to customize the text of your 404 page.

## FAQ

### So like, why do all the directory names start with an underscore?

Good question. On a Mac, which I do use (please refrain from
spitting until you're away from delicate electronics) as well as 
on Linux and most UNIX systems, directories are typically listed 
among the actual files, sorted alphabetically. So using all these 
underscore-led directory names will keep the system directories at
the top of the listing, and therefore will keep them from mingling
in the *rest* of the listing with all your markdown documents and 
structural directories.

