<?php
/*
  Plugin Name: Kayanohime
  Plugin URI:
  Description: Githubの草を取得し、ウィジェットとして表示するWordPressプラグイン
  Version: 0.0.1
  Author: アルム＝バンド
  Author URI:
  License: MIT
 */
//定数
define('KAYANOHIME_PLUGIN_PATH', '/kayanohime/dist/');
define('KAYANOHIME_VERSION', '0.0.1');
 //メニューに追加
require_once( __DIR__ . '/dist/menu.php' );
//設定ページ
require_once( __DIR__ . '/dist/settings_page.php' );
//ウィジェット
require_once( __DIR__ . '/dist/widget.php' );