<?php
class Share_Select
{
	public static $instance;
	
	public static function getInstance()
	{
		if ( is_null( self::$instance ) ) 
			self::$instance = new Share_Select();
		return self::$instance;
	}
	
	public function __construct()
	{
		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );
		add_action( 'wp_footer', array( $this, 'wp_footer' ) );
	}
	
	public function register_scripts()
	{
		wp_enqueue_script( 'jquery' );

		wp_register_script( 'contentshare-js', plugins_url( '/assets/js/contentshare.min.js', __FILE__ ), array( 'jquery' ), true );
		$ss_plugin_url = plugin_dir_url( __FILE__ );
		wp_localize_script( 'contentshare-js', 'ssPluginDir', $ss_plugin_url );
		wp_enqueue_script( 'contentshare-js' );

		wp_register_script( 'tooltipster-js', plugins_url( '/assets/js/jquery.tooltipster.min.js', __FILE__), array( 'jquery' ), true);
		wp_enqueue_script( 'tooltipster-js' );

		wp_register_style( 'tooltipster-css', plugins_url( '/assets/css/tooltipster.min.css', __FILE__ ) );
		wp_enqueue_style( 'tooltipster-css' );
	}
	
	public function wp_footer()
	{
		include dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'share-select-inline.php';
	}
	
}
Share_Select::getInstance();