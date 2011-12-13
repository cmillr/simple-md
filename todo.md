# Things to Be Improved In SimpleMD #

1. **robots.txt and sitemap.xml**: SimpleMD should be able 
to generate each of these items based on the contents of the
website file tree.  Global settings should turn this on, or
to block everything altogether.

2. **Page Titles**: SimpleMD should be able to generate a 
page title for each page based on the first heading in each
markdown document, or failing that, the first ~60 characters
of your file text.

3. **URI Trailing Character**: SimpleMD should have a setting 
for the end user to select the character he or she would like 
to have on the end of the URI, for search engine consistency:<br>
`example.com/pagename`<br>
`example.com/pagename/`<br>
`example.com/pagename.html`<br>
`example.com/pagename.php`<br>
...and so on.

4. **Directory Mapping**: SimpleMD should allow the user to
place all non-template files, including the SimpleMD engine
and the markdown processor, and even the site's markdown
document tree into directories outside the public root, as a
security measure.

5. **Object Orientation**: SimpleMD should switch to an
object-oriented architecture with a complete suite of unit
tests for the PHPUnit platform.

