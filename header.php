<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<!doctype html>
<html lang="en-GB">

    <head>
        <title>Peppermint Soda Demo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css?cache=1" rel="stylesheet" media="all" />

        <script>
          (function(d) {
            var config = {
              kitId: 'pzd5ylw',
              scriptTimeout: 3000
            },
            h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
          })(document);
        </script>

        <script>document.documentElement.className = 'advanced';</script>

    </head>

    <body <?php body_class(); ?>>

    	<header></header>

    <nav id="nav">

          <a href="" class="menu-icon">Menu</a>

          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu-main' ) ); ?>

    </nav>