<?php
require_once('classes/class.PostTypes.php');
$theme_post_types = new Theme_Post_Types();

require_once('classes/class.Taxonomies.php');
$theme_taxonomies = new Theme_Taxonomies();

require_once('classes/class.General.php');
$theme_general = new Theme_General();

require_once('admin-menu-functions.php');
require_once('theme-options.php');
require_once('theme.helper.functions.php');