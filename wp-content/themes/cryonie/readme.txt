Cryonie Wordpress Theme
Author: Denis Sureau - Scriptol.com 
License: GNU GPL 2.0. 
URL: Cryonie Theme 

Features
SEO-friendly. 
Flexible width (fluid, liquid). 
Minimum width of 480 pixels. 
Maximum width of 1280 pixels. 
Classic layout with two columns and menu to the left. 
Navigation bar with categories on the left and static pages on the right. 
Can hold 7 catégories and 4 pages (may be modified). 
List of recent articles below the posts. 
Easy to edit. 
A static page is provided (on this site) to try changes in the layout. 
In addition, a 8-page tutorial can help you adapt the theme to your needs.

Compatibility

The theme has been tested and works under:
All Firefox versions. 
Internet Explorer 8. 
Safari 4. 
Chrome 2. 
Opera 9. 
And more ... 



It works under older browsers but transparency is not handled by old version of IE for PNG image... that must be removed or replaced anyway (it is a part of the cryonie.com website and is here for demo only). 

Installing the theme

Extract the contents of the archive. Before putting it online, add your logo with a transparent background, so a GIF or PNG format.

The maximum size is 320 x 48 pixels, which can be modified in the style sheet (descriptor is: logo).

It is recommanded to remove the display of title and description in text form in header.php. In this block: 

  <div id="logo"  onclick="location.href='<?php echo get_settings('home'); ?>/';">
      <?php bloginfo('name'); ?> <br>
      <span class="sitedesc"><?php bloginfo('description'); ?></span>  
  </div>

Delete:

      <?php bloginfo('name'); ?> <br>
      <span class="sitedesc"><?php bloginfo('description'); ?></span>   

Then copy the cryonie directory into:

wp-content/themes/

Then go to the administration panel to activate this theme.

The theme is deliberately provided with additional elements to allow you to choose them by deleting some.

You can change the composition of the side panel with your selection of widgets from the administering panel. 

Else remove the elements that you do not want to keep inside sidebar.php, through the theme editor. 

It is advisable for SEO to remove the blogroll, categories that are already in navigation bar, the calendar. 

You can edit the style sheet (style.css) to change the minimum and maximum width, in the body descriptor. 



Live demo 

Cryonie.com


