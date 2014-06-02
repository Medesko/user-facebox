WP plugin
============

1) create a plugin which allows to

             a) add a profile picture to a WordPress author

             b) display this picture in each post

## How use  
Download and Unzip the plugin files.

Connect to your site’s server using FTP.

Navigate to the /wp-content/plugins directory.

Upload the plugin folder to the /wp-content/plugins directory on your web server.

Go to the Dashboard’s Plugins page and you see the new plugin listed and click to active.

Make sure to add post's get_avatar function in The Loop:  

<a href="http://onepassionate.com/">Demo</a> work with current WordPress and Twenty Thirteen theme

To insert in loop 
```
<?php 
	if ('post' == get_post_type() )
		echo get_avatar(get_the_author_meta('ID'));
?>
```
Now follow this Screenshots to set your avatar

![ScreenShoot](http://medesko.com/facebox.png)
![ScreenShoot2](http://medesko.com/facebox_upload.png)
![ScreenShoot2](http://medesko.com/screenshot2.png)

