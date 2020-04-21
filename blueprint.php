<?php
/**
 * Dynamic Elementor Blueprint
 * Version: 1.0.0
 *
 * You can modify this blueprint to your liking. For example a user is created named "testadmin" with a password of "password". You can change these and the admin_email address. 
 * Also if you do not want a particular function to occur you can comment that line out by placing two fowrad slashes in front of the line. For example: // ds_cli_exec( "wp plugin delete akismet" ); 
 * This will no longer delete the Akismet plugin.
 * A little farthur down the blueprint you will see examples for both Mac and Windows. Comment or uncomment out the one for your operating system and adjust the paths to where you have your Premium plugin 
 * or theme located.
 */

//** Download the latest version of WordPress
ds_cli_exec( "wp core download" );

//** Install WordPress
ds_cli_exec( "wp core install --url=$siteName --title='Dynamic Elementor Blueprint' --admin_user=testadmin --admin_password=password --admin_email=pleaseupdate@$siteName" );

//** Change the tagline
ds_cli_exec( "wp option update blogdescription 'The sites tagline'" );

//** Change Permalink structure
ds_cli_exec( "wp rewrite structure '/%postname%' --quiet" );

//** Discourage search engines from indexing this site
ds_cli_exec( "wp option update blog_public 'on'" );

//** Remove Default Themes (Except twentytwenty for debugging)
ds_cli_exec( "wp theme delete twentynineteen" );
ds_cli_exec( "wp theme delete twentyseventeen" );

//** Remove Plugins
ds_cli_exec( "wp plugin delete akismet" );
ds_cli_exec( "wp plugin delete hello" );

//** Remove Default Post/Page
ds_cli_exec( "wp post delete 1 --force" ); // Hello World!
ds_cli_exec( "wp post delete 2 --force" ); // Sample Page

//** Delete First Comment
ds_cli_exec( "wp comment delete 1 --force" );

//** set the timezone
ds_cli_exec( "wp option update timezone_string 'America/Los_Angeles'" );

//** Install Elementor core
/** Download plugin from repository, unzip, activate */
ds_cli_exec( "wp plugin install elementor --activate" );

/** Install & Activate Elementor Pro Plugin located on the Computer - Use Path based on DS-CLI */
/* Mac example */
//ds_cli_exec( "cp /Volumes/Data/Premium_theme\elementor-pro-2.9.2.zip ./; wp plugin install elementor-pro-2.9.2.zip --activate; rm elementor-pro-2.9.2.zip" );

/* Windows example */
ds_cli_exec( "cp 'C:/Premium_theme/elementor-pro-2.9.2.zip' ./; wp plugin install elementor-pro-2.9.2.zip --activate; rm elementor-pro-2.9.2.zip" );

//** Download theme from repository and activate
ds_cli_exec( "wp theme install hello-elementor --activate" );

//** Check if index.php unpacked okay
if ( is_file( "index.php" ) ) {

	//** Cleanup the empty folder, download, and this script.
	ds_cli_exec( "rm blueprint.php" );	
	ds_cli_exec( "rm index.htm" );
}
