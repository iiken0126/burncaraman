<?php
function my_enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bundle_js', get_template_directory_uri(). '/assets/js/bundle.js', array() );
	wp_enqueue_style('my_styles_reset',get_template_directory_uri().'/assets/css/reset.css', array() );
	wp_enqueue_style( 'my_styles', get_template_directory_uri(). '/assets/css/style.css', array() );
	wp_enqueue_style( 'my_styles_club-single', get_template_directory_uri(). '/assets/css/club-single.css', array() );
	wp_enqueue_style( 'my_styles_search-result', get_template_directory_uri(). '/assets/css/search-result.css', array() );
	wp_enqueue_style( 'my_styles_single', get_template_directory_uri(). '/assets/css/single.css', array() );
    
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );
add_action('wp_enqueue_styles', 'my_enqueue_styles');
// ヘッダー、フッターのカスタムメニュー化
register_nav_menus(
	array(
		'place_global' => ' グローバル',
		'place_header' => ' ヘッダーナビ',
	)
);

function category_output (){
	$category = get_the_category();
	if($category[0]){
		$category[0]->cat_name;
		}
};

//ウィジェットの追加
function my_widgets_init() {
 
    register_sidebar( array(
        'name' => 'header-sns',
        'id' => 'header-sns',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );

	register_sidebar( array(
        'name' => 'footer-sns',
        'id' => 'footer-sns',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );

	register_sidebar( array(
        'name' => 'ad-left',
        'id' => 'ad-left',
    ) );

    register_sidebar( array(
        'name' => 'ad-header',
        'id' => 'ad-header',
    ) );

	register_sidebar( array(
        'name' => 'ad-right',
        'id' => 'ad-right',
    ) );

    register_sidebar( array(
        'name' => 'logo',
        'id' => 'logo',
    ) );
 
}
add_action( 'widgets_init', 'my_widgets_init' );



//アイキャッチ画像を使えるようにする
add_theme_support('post-thumbnails');

//トップページのブログ画像のサイズ設定
add_image_size('club-single', 300, 210, false);

//ブログ一覧の画像サイズ設定
add_image_size('m', 300, 210, false);


//おすすめ表示用のサイズ
add_image_size('reccomend',200,130,false);

//検索結果ページの画像
add_image_size('search-result',260,180,false);

//抜粋文の文字数変更
function my_excerpt_length($length) {
	return 20;
  }
  add_filter('excerpt_length', 'my_excerpt_length');


  function get_flexible_excerpt( $number ) {
	$value = get_the_excerpt();
	$value = wp_trim_words( $value, $number, '...' );
	return $value;
}

//タームの出力
function term_output( $taxonomy ){
	$post_id = get_the_id();
    if ($terms = get_the_terms($post_id, $taxonomy)) {
        foreach ( $terms as $term ) {
            echo ('<span>') ;
            echo esc_html($term->name)  ;
            echo ('</span>') ;
        }
    }
}

//画像出力（画像がない場合は、NO Image）

function image_output($image_size){
	if(has_post_thumbnail()): 
        the_post_thumbnail($image_size);
    else:
	echo('
    <div class="no_img">
        <img class="reccomend_no_img" src="');echo get_template_directory_uri();echo('/assets/img/no_image.png" alt="画像なし画像">
    </div>
	');
 endif; 
}
//レビューの平均と件数の表示
function fc_reviewrate_output($atts){
    global $wpdb;
$review_query="SELECT round(AVG(meta_value),1) AS review_avg,count(meta_value) AS review_cnt FROM $wpdb->postmeta WHERE post_id IN (SELECT post_id FROM $wpdb->postmeta WHERE meta_value=". get_the_ID() ." and meta_key='wpcr3_review_post') AND meta_key='wpcr3_review_rating'";
  
$myreview = $wpdb->get_row($review_query);
 return '<p class="reviewrate_output">平均評価（' .$myreview->review_cnt .'件）<img src="https://burncaraman.jp/wp-content/uploads/2023/09/rate_star'. round($myreview->review_avg).'.png"> <span>' .$myreview->review_avg. '</span></p>';
}
 
add_shortcode('sc_reviewrate_output', 'fc_reviewrate_output');

//評価のみの出力

function fc_rate_output($atts){
	global $wpdb;
$review_query="SELECT round(AVG(meta_value),1) AS review_avg FROM $wpdb->postmeta WHERE post_id IN (SELECT post_id FROM $wpdb->postmeta WHERE meta_value=".get_the_ID() ." and meta_key='wpcr3_review_post') AND meta_key='wpcr3_review_rating'";
$myreview = $wpdb->get_row($review_query);
return '<p class="reviewrate_output"><img src="https://burncaraman.jp/wp-content/uploads/2023/09/rate_star'. round($myreview->review_avg).'.png"> <span>' .$myreview->review_avg. '</span></p>'; 
}

add_shortcode( 'sc_rate_output', 'fc_rate_output' );

//件数のみの出力

function fc_review_output($atts){
	global $wpdb;
	$review_query="SELECT count(meta_value) AS review_cnt FROM $wpdb->postmeta WHERE post_id IN (SELECT post_id FROM $wpdb->postmeta WHERE meta_value=". get_the_ID() ." and meta_key='wpcr3_review_post') AND meta_key='wpcr3_review_rating'";
	$myreview = $wpdb->get_row($review_query);
	 return $myreview->review_cnt ;
}
add_shortcode('sc_review_output','fc_review_output');

//post per page事前に読み込み(archive.phpのみ)
add_action( 'pre_get_posts', 'my_pre_get_posts' );
function my_pre_get_posts( $query ) {
	if ( $query->is_archive() ) {
		$query->set( 'posts_per_page', '10' );
		return;
	  }
}