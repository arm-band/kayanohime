<?php
class Kayanohime_Widget extends WP_Widget {
    //コンストラクタ
    function __construct() {
        parent::__construct(
            'kayanohime_widget',
            'カヤノヒメ',
            array( 'description' => 'Githubの草を取得し、ウィジェットとして表示します' )
        );
    }

    //ウィジェット(フロント)
    public function widget( $args, $instance ) {
        extract( $args );
        //css読み込み
        wp_enqueue_style( 'kayanohime_css', plugins_url() . KAYANOHIME_PLUGIN_PATH . 'css/app.css', array(), KAYANOHIME_VERSION, 'screen' );
        //JS読み込み
        wp_enqueue_script( 'kayanohime_js', plugins_url() . KAYANOHIME_PLUGIN_PATH . 'js/app.js', array(), KAYANOHIME_VERSION, true );

        if( $instance['title'] != '' ) {
            $title = apply_filters( 'widget_title', $instance['title'] );
        }
        echo $before_widget;
        if( $title ) {
            echo $before_title . $title . $after_title;
        }
?>

    <div id="kayanohime_widget" class="kayanohime_widget">
        <h3><a href="https://github.com/<?= esc_attr( get_option( 'kayanohime_github_account' ) ); ?>/">@<?= esc_html( get_option( 'kayanohime_github_account' ) ); ?></a></h3>
        <div id="kayanohime_grass" class="kayanohime_grass">
            <div class="kayanohime_loader"><div class="kayanohime_effect"></div><span class="kayanohime_loadtext">Loading...</span></div>
            <div id="kayanohime_github_account" data-username="<?= esc_attr( get_option( 'kayanohime_github_account' ) ); ?>">
            <div id="kayanohime_pluginurl" data-pluginurl="<?= esc_attr( plugins_url() ); ?>">
        </div>
    </div>

<?php
    echo $after_widget;
    }

    //ウィジェット管理画面のフォーム項目
    public function form( $instance ) { ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?= $this->get_field_name( 'title' ); ?>" value="<?= esc_attr( $instance['title'] ); ?>">
        </p>

<?php }

    //更新時処理
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );

        return $instance;
    }
}

//登録
add_action( 'widgets_init', function () {
    register_widget( 'Kayanohime_Widget' );
} );