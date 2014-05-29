WP user-facebox plugin
============

Simple profile picture plugin to WordPress author 

## How use  
Unzip the plugin files.

Connect to your site’s server using FTP.

Navigate to the /wp-content/plugins directory.

Upload the plugin folder to the /wp-content/plugins directory on your web server.

Go to the Dashboard’s Plugins page and you see the new plugin listed and click to active.

Make sure to add post's get_avatar function in The Loop:  
```
<?php echo get_avatar( $post->post_author); ?>
```
Follow this Screenshots to set your avatar

![ScreenShoot](http://medesko.com/facebox.png)
![ScreenShoot2](http://medesko.com/facebox_upload.png)


<a href="#">Demo</a> 
