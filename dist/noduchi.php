<?php
//userパラメータがあれば、そのユーザのGithubページを取得
if( isset( $_GET['user'] ) ) {
    $context = stream_context_create( array(
        'http' => array( 'ignore_errors' => true )
    ) );
    //取得
    $url = 'https://github.com/' . htmlspecialchars($_GET['user'], ENT_QUOTES, 'UTF-8') . '/';
    $responce = file_get_contents( $url, false, $context );
    //レスポンスヘッダを解析し、ステータスコードを取得
    preg_match( '/HTTP\/[1|2]\.[0|1|x] ([0-9]{3})/', $http_response_header[0], $matches );
    $status_code = $matches[1];
    //取得したステータスコードをセット
    http_response_code( $status_code );
    //CORS
    header( 'Access-Control-Allow-Origin: *' );
    header( 'Content-Type: text/plain' );
    //結果を出力
    echo $responce;
}
else { //エラー
    http_response_code( 404 );
    echo 'User Not Found.';
}