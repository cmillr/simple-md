# How to host git or hg Repositories on your MediaTemple (gs) GridService

In brief: (gs) already has a working git installation; just create 
a directory called git in your `~/data` directory and `git init` 
inside subdirectories there. You'll be able to access your new 
repositories through the following command, where `example.com` is
your domain name, and `{projectname}` is the name of your git repo:

	$ hg clone git+ssh://example.com@example.com/data/git/{projectname}

If you want to use Mercurial, follow these same steps, but also 
install git-hg on your local machine; this will allow your local 
machine to push to and pull from git repositories, including the one 
on your (gs) server.

## Managing a (gs) website using git or hg

In brief: You don't want your `.git/` or `.hg/` directories, or for 
that matter even your `.gitignore` or `.hgignore` files sitting in 
your website's public `html/` directory; the answer to this is simply 
to create a repository that *contains* the `html/` directory, along 
with any other files and directories your website may need (such as 
the `cgi-bin`).

