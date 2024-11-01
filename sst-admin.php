<div class="wrap">

<style type="text/css">
   div.inside ul li {
      line-height: 16px;
      list-style-type: square;
      margin-left: 15px;
   }
</style>

<h2>Simple Social Tiny - <?php _e('Settings'); ?>:</h2>

<p><?php _e('<strong>Simple Social Tiny</strong> by <strong>Neeraj Miglani</strong>. This plugin adds a social media buttons, such as: <strong>Google +1</strong>, <strong>Google Follow</strong>, <strong>Facebook Like it</strong>, <strong>Twitter share</strong> and <strong>Pinterest</strong>. The most flexible social buttons plugin ever.', 'simplesocialtiny'); ?></p>

<?php

if(strtolower($_POST['hiddenconfirm']) == 'y') {

	/**
	 * Compile settings array
	 * @see http://codex.wordpress.org/Function_Reference/wp_parse_args
	 */

	

	$updateSettings = array(
		'googleplus' => $_POST['sst_googleplus'],
		'googlefollow' =>$_POST['sst_googlefollow'],
		'fblike' => $_POST['sst_fblike'],
		'twitter' => $_POST['sst_twitter'],
		'pinterest' => $_POST['sst_pinterest'],

		'beforepost' => $_POST['sst_beforepost'],
		'afterpost' => $_POST['sst_afterpost'],
		'beforepage' => $_POST['sst_beforepage'],
		'afterpage' => $_POST['sst_afterpage'],
		'beforearchive' => $_POST['sst_beforearchive'],
		'afterarchive' => $_POST['sst_afterarchive'],

		'showfront' => $_POST['sst_showfront'],
		'showcategory' => $_POST['sst_showcategory'],
		'showarchive' => $_POST['sst_showarchive'],
		'showtag' => $_POST['sst_showtag'],
		
		'twitterusername' => str_replace(array("@", " "), "", $_POST['sst_twitterusername']),
		'googlelink' =>  $_POST['sst_googlelink'],
	);

	$this->update_settings( $updateSettings );

} 

/**
 * HACK: Use one big array instead of a bunchload of single options
 * @author Fabian Wolf
 * @link http://usability-idealist.de/
 * @since 1.2.1
 */

// get settings from database
$settings = $this->get_settings();

extract( $settings, EXTR_PREFIX_ALL, 'sst' );

?>

<div><a href="http://web2rule.com/wp-banner/" target="_blank"><img src="<?php echo plugins_url(); ?>/simple-social-tiny/banner.jpg" /></a></div>

<div class="postbox-container" style="width:69%">
   <div id="poststuff">
      <form name="sst_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

      <div class="postbox">
         <h3><?php _e('Select buttons', 'simplesocialtiny'); ?></h3>
         <div class="inside">
            <h4><?php _e('Select social media buttons:', 'simplesocialtiny'); ?></h4>
			<div style="float:right; margin-right:160px;margin-top:50px;">
         	<a href="http://web2rule.com/simple-social-expandable-set-up-video/" target="_blank"><img src="<?php echo plugins_url(); ?>/simple-social-tiny/w2.jpg" alt="W2 Plugin Set up" /></a>
         </div>

			<p><select name="sst_googleplus" id="sst_googleplus">
				<option value=""<?php if(empty($sst_googleplus) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialtiny'); ?></option>

			<?php for($pos = 1; $pos < 6; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($sst_googleplus == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select> &nbsp;
			<label for="sst_googleplus"><?php _e('Google plus one (+1)', 'simplesocialtiny'); ?></label></p>
			
            <p><select name="sst_googlefollow" id="sst_googlefollow">
				<option value=""<?php if(empty($sst_googlefollow) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialtiny'); ?></option>

			<?php for($pos = 1; $pos < 6; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($sst_googlefollow == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select> &nbsp;
			<label for="sst_googleplus"><?php _e('Google Follow', 'simplesocialtiny'); ?></label></p>

			<!-- fblike -->
			<p><select name="sst_fblike" id="sst_fblike">
				<option value=""<?php if(empty($sst_fblike) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialtiny'); ?></option>

			<?php for($pos = 1; $pos < 6; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($sst_fblike == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select> &nbsp;
			<label for="sst_fblike"><?php _e('Facebook Like it', 'simplesocialtiny'); ?></label></p>
			<!-- /fblike -->

			<!-- twitter -->
			<p><select name="sst_twitter" id="sst_twitter">
				<option value=""<?php if(empty($sst_twitter) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialtiny'); ?></option>

			<?php for($pos = 1; $pos < 6; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($sst_twitter == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select> &nbsp;
			<label for="sst_twitter"><?php _e('Twitter share', 'simplesocialtiny'); ?></label></p>
			<!-- /twitter -->
			
			<!--  pinterest -->
			<p><select name="sst_pinterest" id="sst_pinterest">
				<option value=""<?php if(empty($sst_pinterest) != false) {
				 	 ?>selected="selected"<?php
				} ?>><?php _e('inactive', 'simplesocialtiny'); ?></option>

			<?php for($pos = 1; $pos < 6; $pos++) { ?>
				<option value="<?php echo $pos; ?>"<?php if($sst_pinterest == $pos) {
					 ?>selected="selected"<?php
				} ?>> # <?php echo $pos; ?> </option>
			<?php } ?>
			</select> &nbsp;
			<label for="sst_pinterest"><?php _e('Pinterest - Pin It', 'simplesocialtiny'); ?></label> </p>
			<!--  /pinterest -->

			<p><label for="sst_override_css"><input type="checkbox" name="sst_override_css" id="sst_override_css" value="1" <?php if($sst_override_css) { echo 'checked="checked"'; } ?>/> <?php _e('Disable plugin CSS (only advanced users)'); ?></label></p>
         </div>
         
      </div>

      <div class="postbox">
         <h3><?php _e('Single posts - display settings', 'simplesocialtiny'); ?></h3>
         <div class="inside">
            <h4><?php _e('Place buttons on single post:', 'simplesocialtiny'); ?></h4>
            <p><input type="checkbox" name="sst_beforepost" id="sst_beforepost" value="1" <?php if(!empty($sst_beforepost)) { ?>checked="checked"<?php } ?> /> <label for="sst_beforepost"><?php _e('Before the content', 'simplesocialtiny'); ?></label></p>
            <p><input type="checkbox" name="sst_afterpost" id="sst_afterpost" value="1" <?php if(!empty($sst_afterpost)) { ?>checked="checked"<?php } ?> /> <label for="sst_afterpost"><?php _e('After the content', 'simplesocialtiny'); ?></label></p>
         </div>
      </div>

      <div class="postbox">
         <h3><?php _e('Single pages - display settings', 'simplesocialtiny'); ?></h3>
         <div class="inside">
            <h4><?php _e('Place buttons on single pages:', 'simplesocialtiny'); ?></h4>
            <p><input type="checkbox" name="sst_beforepage" id="sst_beforepage" value="1" <?php if(!empty($sst_beforepage)) { ?>checked="checked"<?php } ?> /> <label for="sst_beforepage"><?php _e('Before the page content', 'simplesocialtiny'); ?></label></p>
            <p><input type="checkbox" name="sst_afterpage" id="sst_afterpage" value="1" <?php if(!empty($sst_afterpage)) { ?>checked="checked"<?php } ?> /> <label for="sst_afterpage"><?php _e('After the page content', 'simplesocialtiny'); ?></label></p>
         </div>
      </div>

      <div class="postbox">
         <h3><?php _e('Archives - display settings', 'simplesocialtiny'); ?></h3>
         <div class="inside">
            <h4><?php _e('Select additional places to display buttons:', 'simplesocialtiny'); ?></h4>
            <p><input type="checkbox" name="sst_showfront" id="sst_showfront" value="1" <?php if(!empty($sst_showfront)) { ?>checked="checked"<?php } ?> /> <label for="sst_showfront"><?php _e('Show at frontpage', 'simplesocialtiny'); ?></label></p>
            <p><input type="checkbox" name="sst_showcategory" id="sst_showcategory" value="1" <?php if(!empty($sst_showcategory)) { ?>checked="checked"<?php } ?> /> <label for="sst_showcategory"><?php _e('Show at category pages', 'simplesocialtiny'); ?></label></p>
            <p><input type="checkbox" name="sst_showarchive" id="sst_showarchive" value="1" <?php if(!empty($sst_showarchive)) { ?>checked="checked"<?php } ?> /> <label for="sst_showarchive"><?php _e('Show at archive pages', 'simplesocialtiny'); ?></label></p>
            <p><input type="checkbox" name="sst_showtag" id="sst_showtag" value="1" <?php if(!empty($sst_showtag)) { ?>checked="checked"<?php } ?> /> <label for="sst_showtag"><?php _e('Show at tag pages', 'simplesocialtiny'); ?></label></p>

            <h4><?php _e('Place buttons on archives:', 'simplesocialtiny'); ?></h4>
            <p><input type="checkbox" name="sst_beforearchive" id="sst_beforearchive" value="1" <?php if(!empty($sst_beforearchive)) { ?>checked="checked"<?php } ?> /> <label for="sst_beforearchive"><?php _e('Before the content', 'simplesocialtiny'); ?></label></p>
            <p><input type="checkbox" name="sst_afterarchive" id="sst_afterarchive" value="1" <?php if(!empty($sst_afterarchive)) { ?>checked="checked"<?php } ?> /> <label for="sst_afterarchive"><?php _e('After the content', 'simplesocialtiny'); ?></label></p>
         </div>
      </div>
      
      <div class="postbox">
         <h3><?php _e('Additional features'); ?></h3>
         <div class="inside">
            <p><label for="sst_twitterusername"><?php _e('Twitter @username', 'simplesocialtiny'); ?>: <input type="text" name="sst_twitterusername" id="sst_twitterusername" value="<?php echo (isset($sst_twitterusername)) ? $sst_twitterusername : "";?>" /></label></p>
            
            <p><label for="sst_googlelink"><?php _e('Google Profile Link ', 'simplesocialtiny'); ?>: <input type="text" name="sst_googlelink" id="sst_googlelink" value="<?php echo (isset($sst_googlelink)) ? $sst_googlelink : "";?>" /></label></p>
            
            
            </div> 
         
      </div>

      <div class="submit">
         <input type="hidden" name="hiddenconfirm" value="Y" />
         <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes'); ?>" />
      </div>

   </form>
</div>
</div>


</div>