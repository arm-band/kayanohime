<?php
//メニュー作成
function kayanohime_create_menu() {
    add_menu_page( 'Kayanohime', 'カヤノヒメ設定', 'administrator', 'kayanohime', 'kayanohime_settings_page', 'dashicons-carrot' );
    // 独自関数をコールバック関数とする
    add_action( 'admin_init', 'register_kayanohime_settings' );
}
add_action( 'admin_menu', 'kayanohime_create_menu' );
//コールバック
function register_kayanohime_settings() {
    register_setting( 'kayanohime-settings', 'kayanohime_github_account' );
}