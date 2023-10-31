<?php

//======================================================================
//
// FUNCTIONS.PHP
//
// Required Files:
//
// 1.  lib/class-method-layout.php
//     The Method_Layout class, which contains the foundation for your
//     theme layout class. This file should not be edited so that class
//     updates can easily be applied.
//
// 2.  lib/class-theme-layout.php
//     This is your theme's layout class, which extends the Method_Layout
//     class. All your frontend code goes into this file.
//
// 3.  lib/theme-setup.php
//     This file includes functions that setup theme features, custom
//     image sizes, required plugins, enqueued styles and scripts, and
//     navigation menu theme locations.
//
// 4.  lib/admin-customization.php
//     This file contains admin customizations and optimizations.
//
// 5.  lib/theme-customization.php
//     This file is where theme options are declared.
//
// 6.  lib/post-types-and-taxonomies.php
//     This file is where custom post types and taxonomies are declared.
//
// 7.  lib/helper-functions.php
//     This file contains a number of useful functions to assist in
//     a variety of tasks.
//
//======================================================================


//======================================================================
// THEME SETUP
//======================================================================

//-----------------------------------------------------
// Import a custom navwalker for Bootstrap 5
//-----------------------------------------------------

require_once get_template_directory() . '/inc/bootstrap-5-navwalker/class-bootstrap_5_wp_nav_menu_walker.php';

//-----------------------------------------------------
// Import theme files.
//-----------------------------------------------------
require_once __DIR__ . '/inc/blocks/all.php';
require_once('lib/class-method-layout.php');
require_once('lib/class-theme-layout.php');
require_once('lib/theme-setup.php');
require_once('lib/admin-customization.php');
require_once('lib/theme-customization.php');
require_once('lib/post-types-and-taxonomies.php');
require_once('lib/helper-functions.php');