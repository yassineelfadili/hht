<?php
require_once "NastikCreativePortfolioWordPressThemeBase.php";
class NastikCreativePortfolioWordPressTheme {
	public $plugin_file=__FILE__;
	public $responseObj;
	public $licenseMessage;
	public $showMessage=false;
	public $slug="nastik";
	function __construct() {
		add_action( 'admin_print_styles', [ $this, 'SetAdminStyle' ] );
		$licenseKey=get_option("NastikCreativePortfolioWordPressTheme_lic_Key","");
		$liceEmail=get_option( "NastikCreativePortfolioWordPressTheme_lic_email","");
		$templateDir=dirname(__FILE__)."/../../"; //or dirname(__FILE__);
		if(NastikCreativePortfolioWordPressThemeBase::CheckWPPlugin($licenseKey,$liceEmail,$this->licenseMessage,$this->responseObj,$templateDir."/style.css")){
			add_action( 'admin_menu', [$this,'ActiveAdminMenu'],99999);
			add_action( 'admin_post_NastikCreativePortfolioWordPressTheme_el_deactivate_license', [ $this, 'action_deactivate_license' ] );
			//$this->licenselMessage=$this->mess;
			require (NASTIK_THEME_PATH . '/includes/core/ab/core.php');
			
		}else{
			if(!empty($licenseKey) && !empty($this->licenseMessage)){
				$this->showMessage=true;
			}
			update_option("NastikCreativePortfolioWordPressTheme_lic_Key","") || add_option("NastikCreativePortfolioWordPressTheme_lic_Key","");
			add_action( 'admin_post_NastikCreativePortfolioWordPressTheme_el_activate_license', [ $this, 'action_activate_license' ] );
			add_action( 'admin_menu', [$this,'InactiveMenu']);
			remove_action( 'init', 'portfolio_post_types' );
			remove_action( 'init', 'timeline_post_types' );
			remove_action( 'init', 'service_post_types' );
			remove_action('init', 'nastik_register_metabox_list');
		}
        }
	function SetAdminStyle() {
		wp_register_style( "NastikCreativePortfolioWordPressThemeLic", get_theme_file_uri("_lic_style.css"),10);
		wp_enqueue_style( "NastikCreativePortfolioWordPressThemeLic" );
	}
	function ActiveAdminMenu(){
		 
		add_menu_page (  "Nastik Creative Portfolio WordPress Theme", "About Nastik", "activate_plugins", $this->slug, [$this,"Activated"], " dashicons-megaphone ");
		//add_submenu_page(  $this->slug, "NastikCreativePortfolioWordPressTheme License", "License Info", "activate_plugins",  $this->slug."_license", [$this,"Activated"] );

	}
	function InactiveMenu() {
		add_menu_page( "Nastik Creative Portfolio WordPress Theme", "About Nastik", 'activate_plugins', $this->slug,  [$this,"LicenseForm"], " dashicons-megaphone " );
		
	}
	function action_activate_license(){
		check_admin_referer( 'el-license' );
		$licenseKey=!empty($_POST['el_license_key'])?$_POST['el_license_key']:"";
		$licenseEmail=!empty($_POST['el_license_email'])?$_POST['el_license_email']:"";
		update_option("NastikCreativePortfolioWordPressTheme_lic_Key",$licenseKey) || add_option("NastikCreativePortfolioWordPressTheme_lic_Key",$licenseKey);
		update_option("NastikCreativePortfolioWordPressTheme_lic_email",$licenseEmail) || add_option("NastikCreativePortfolioWordPressTheme_lic_email",$licenseEmail);
		update_option('_site_transient_update_themes','');
		wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
	}
	function action_deactivate_license() {
		check_admin_referer( 'el-license' );
		$message="";
		if(NastikCreativePortfolioWordPressThemeBase::RemoveLicenseKey(__FILE__,$message)){
			update_option("NastikCreativePortfolioWordPressTheme_lic_Key","") || add_option("NastikCreativePortfolioWordPressTheme_lic_Key","");
			update_option('_site_transient_update_themes','');
		}
    	wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
    }
	function Activated(){
		?>
	<div class="clear"></div>
	<div class="wrap-theside">
		<div class="wrap theside-page-welcome about-wrap">
			<h1>Welcome to Nastik Creative Portfolio WordPress Theme</h1>
			<div class="about-text">
			   Find out what's new on Version 4.8!	
			</div>
			<div class="wp-badge vc-page-logo">
				Version 4.8
			</div>
			<div class="page-action">
				<a href="https://twitter.com/webredox?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @webredox</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				<div class="fb-like" data-href="https://www.facebook.com/webRedox/" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=161350844023659&autoLogAppEvents=1"></script>
			</div>
			<div class="page-content-theside ">
			<div class="wr-col-1">
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="NastikCreativePortfolioWordPressTheme_el_deactivate_license"/>
            <div class="el-license-container">
                
                <ul class="el-license-info">
                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("Status",$this->slug);?></span>

                        <?php if ( $this->responseObj->is_valid ) : ?>
                            <span class="el-license-valid"><?php _e("Valid",$this->slug);?></span>
                        <?php else : ?>
                            <span class="el-license-valid"><?php _e("Invalid",$this->slug);?></span>
                        <?php endif; ?>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("License Type",$this->slug);?></span>
                        <?php echo $this->responseObj->license_title; ?>
                    </div>
                </li>

               
                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("Your License Key",$this->slug);?></span>
                        <span class="el-license-key"><?php echo esc_attr( substr($this->responseObj->license_key,0,9)."XXXXXXXX-XXXXXXXX".substr($this->responseObj->license_key,-9) ); ?></span>
                    </div>
                </li>
                </ul>
                <div class="el-license-active-btn">
                    <?php wp_nonce_field( 'el-license' ); ?>
                    <?php submit_button('Deactivate'); ?>
                </div>
				<div class="infobox">
						<div class="bluetitle">1 Purchase Code per Website</div>
						<div class="simpletext">If you want to use Nastik Theme on another domain, please <a href="<?php echo $this->responseObj->expire_renew_link; ?>" target="_blank">purchase another license</a></div>
					</div>
            </div>
        </form>
			</div>
			<div class="wr-col-1">
			<div class="wr-right">
				<h3 class="wr-h3">Update History</h3>
				
				<div class="theside-chnagelog">
					<ul>
						<li><em>Fixed:</em> Some CSS issue has been fixed.</li>
						<!--<li><em>Updated : </em>Nastik Plugin New Version 1.9 || Please update Nastik Plugin via plugin section. If you are unable to update Nastik Plugin. Then uninstall/delete old Nastik Plugin from your site and re-install again by required plugin notification Or Appearance => Install Plugins.</li>-->
					</ul>				
				</div>
			</div>
			</div>
			</div>
		</div>
	</div>
		
        
		<?php
	}
	
	function LicenseForm() {
		?>
        
	<div class="clear"></div>
	<div class="wrap-theside">
		<div class="wrap theside-page-welcome about-wrap">
			<h1>Welcome to Nastik Creative Portfolio WordPress Theme</h1>
			<div class="about-text">
			   Nastik Theme Licensing.
			</div>
			<div class="wp-badge vc-page-logo">
				Version 4.8
			</div>
			<div class="page-action">
				<a href="https://twitter.com/webredox?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @webredox</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				<div class="fb-like" data-href="https://www.facebook.com/webRedox/" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=161350844023659&autoLogAppEvents=1"></script>
			</div>
			
			<div class="page-content-theside">
			<h3>Active License!</h3>
				<p><?php _e("Enter your item purchase code here, to activate the product, and get full feature updates and premium support.",$this->slug);?></p>
				<hr>
				<br>
				<br>
				<br>
				<div class="theside-chnagelog">
					<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="NastikCreativePortfolioWordPressTheme_el_activate_license"/>
            <div class="el-license-container">
                
				<?php
					if(!empty($this->showMessage) && !empty($this->licenseMessage)){
						?>
                       <div class="notice_webredox">
                            <p><?php echo $this->licenseMessage; ?></p>
                        </div>
						<?php
					}
				?>
               
    		    <div class="el-license-field">
    			    <label for="el_license_key"><?php _e("License code",$this->slug);?></label>
    			    <input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
    		    </div>
                <div class="el-license-field">
                    <label for="el_license_key"><?php _e("Email Address",$this->slug);?></label>
                    <?php
                        $purchaseEmail   = get_option( "NastikCreativePortfolioWordPressTheme_lic_email", get_bloginfo( 'admin_email' ));
                    ?>
                    <input type="text" class="regular-text code" name="el_license_email" size="50" value="<?php echo $purchaseEmail; ?>" placeholder="" required="required">
                    <div><small><?php _e("We will send update news of this product by this email address, don't worry, we hate spam",$this->slug);?></small></div>
                </div>
                <div class="el-license-active-btn">
					<?php wp_nonce_field( 'el-license' ); ?>
					<?php submit_button('Activate'); ?>
                </div>
            </div>
        </form>		
				</div>
			</div>
		</div>
	</div>
		<?php
	}
}

new NastikCreativePortfolioWordPressTheme();