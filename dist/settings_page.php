<?php
function kayanohime_settings_page() {
    //JS読み込み
    wp_enqueue_script( 'kayanohime_checker', plugins_url() . KAYANOHIME_PLUGIN_PATH . 'js/app_admin.js', array(), KAYANOHIME_VERSION, true );
    //設定変更時にメッセージ表示
    if( true == $_GET['settings-updated'] ) { ?>

        <div id="settings_updated" class="updated notice is-dismissible"><p><strong>設定を保存しました。</strong></p></div>

<?php } ?>

    <div class="wrap">
        <h2>カヤノヒメ 設定</h2>
        <form method="post" action="options.php">
<?php settings_fields( 'kayanohime-settings' ); ?>
<?php do_settings_sections( 'kayanohime-settings' ); ?>
            <table class="form-table">
                <tr>
                    <th>Github アカウント</th>
                    <td><input type="text" name="kayanohime_github_account" id="kayanohime_github_account" value="<?= esc_attr( get_option( 'kayanohime_github_account' ) ); ?>" /></td>
                </tr>
            </table>
<?php submit_button( '変更を保存', 'primary large', 'submit', true, array( 'disabled' => 'disabled' ) ); ?>
        </form>
        <div id="kayanohime_pluginurl" data-pluginurl="<?= esc_attr( plugins_url() ); ?>"></div>
    </div>

<?php } ?>