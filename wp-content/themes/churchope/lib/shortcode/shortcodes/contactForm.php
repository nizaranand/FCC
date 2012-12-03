<?php
defined('WP_ADMIN') || define('WP_ADMIN', true);
require_once('../../../../../../wp-load.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php _e('Contact form','churchope'); ?></title>
<script language="javascript" type="text/javascript" src="<?php echo includes_url();?>/js/jquery/jquery.js?ver=1.7.1"></script>
<?php wp_print_scripts( 'jquery' ); ?>
<?php wp_print_scripts( 'jquery-ui-core' ); ?>
<?php wp_print_scripts( 'jquery-ui-sortable' ); ?>
<?php wp_print_scripts( 'jquery-ui-draggable' ); ?>
<script language="javascript" type="text/javascript" src="<?php echo includes_url();?>/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();?>/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url();?>/js/tinymce/utils/form_utils.js"></script>
<script type="text/javascript">
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var postId = decodeURI((RegExp('post' + '=' + '(.+?)(&|$)').exec(window.parent.location)||[,null])[1]);
	var ajax_nonce_shortcode = '<?php echo wp_create_nonce( 'th_contactform_shortcode' ); ?>';
	var ajax_nonce_json = '<?php echo wp_create_nonce( 'th_contactform_shortcode_to_json' ); ?>';
</script>
<script type="text/javascript" src="<?php echo CONTACT_FORM_SHORTCODE_URL; ?>js/contactform.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function () {
		FB.ContactForm.init();
		FB.ContactForm.resizePop();
		jQuery('#fb-field-my-email').val('<?php echo get_bloginfo('admin_email')?>');
	});
	jQuery(window).resize(function() {
	  	setTimeout(function () { FB.ContactForm.resizePop(); }, 50);
	});
</script>

<script language="javascript" type="text/javascript">
	function init() {
		tinyMCEPopup.resizeToInnerSize();
	}
</script>
<style>
	/* Reset */
	html { height: 100%; }
	body, div, ul, ol, li, h1, h2, h3, h4, h5, h6, form, fieldset, legend, input, button, textarea, p, blockquote, th, td { margin: 0; padding: 0; }
	body { background: #F9F9F9; font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif; font-size:12px; color: #333; line-height:1.5em; height: 100%; width: 100%; padding-bottom: 20px !important; }
	a { color: #21759B; text-decoration: none; }
	a:hover { text-decoration: underline; text-shadow: none !important; }
	h1 { font-size: 21px; color:#5A5A5A; font-family:Georgia,"Times New Roman",Times,serif; font-weight:normal; margin-bottom: 21px; }
	h3 { font-size: 13px; color: #666; margin-bottom: 18px; }
	input { width: 301px; }
	input[type='text'] { padding: 3px 5px; margin-right: 4px; -moz-border-radius:3px; border-radius:3px; -webkit-border-radius:3px; }
	input[type='text']:focus { border: 2px solid #80B8D9; outline: 0 !important; }
	input[type='checkbox'], input[type='radio'] { width: auto !important; float: left; margin-top: 3px; }
	input[type='radio'] { margin-right: 8px; }
	input.fieldError, select.fieldError, textarea.fieldError { border: 2px solid #D56F55; }
	img { border: none; }
	label { color: #222; font-weight: bold; display: block; margin-bottom: 4px; }
	label.radio { width: auto; margin: -2px 0 0 5px; }
	label span.label-required { color: #AAA; margin-left: 4px; font-weight: normal; }
	td { vertical-align: top; }
	select { width: 300px; }
	textarea { height: 100px; width: 311px; }
	/* Core */
	#media-upload-header { border-bottom: 1px solid #DFDFDF; font-weight:bold; margin:0; padding:3px 5px 0 5px; position:relative; background: #FFF; }
	#sidemenu { bottom:-1px; font-size:12px; list-style:none outside none; padding-left:10px; position:relative; left:0; margin:0 5px; overflow:hidden; }
	#sidemenu a { text-decoration:none; border-top: 1px solid #FFF; display:block; float:left; line-height:28px; padding:0 13px; outline: none; }
	#sidemenu a.current { background-color:#F9F9F9; border-color:#DFDFDF #DFDFDF #F9F9F9; color:#D54E21; -moz-border-radius:4px 4px 0 0; border-radius:4px 4px 0 0; -webkit-border-radius:4px 4px 0 0; border-style:solid; border-width:1px; font-weight:normal; }
	#sidemenu li { display:inline; margin-bottom:6px; line-height:200%; list-style:none outside none; margin:0; padding:0; text-align:center; white-space:nowrap; }
	.button { background-color:#FFFFFF; background:url("<?php echo home_url(); ?>/wp-admin/images/white-grad.png") repeat-x scroll left top #F2F2F2; border-color:#BBBBBB; min-width:80px; text-align:center; color:#464646; text-shadow:0 1px 0 #FFFFFF; border-style:solid; border-width:1px; cursor:pointer; width: auto; font-size:11px !important; line-height:13px; padding:3px 11px; margin-top: 12px; text-decoration:none; -moz-border-radius:11px; border-radius:11px; -webkit-border-radius:11px }
	.button-primary { background-color:#FFFFFF; font-weight: bold; background: url('<?php echo home_url(); ?>/wp-admin/images/button-grad-active.png') repeat-x scroll left top #21759B; border-color:#298CBA; text-align:center; color:#EAF2FA; text-shadow:0 -1px 0 rgba(0, 0, 0, 0.3); border-style:solid; border-width:1px; cursor:pointer; width: auto; font-size:11px !important; line-height:13px; padding:3px 11px; margin-top: 21px; text-decoration:none; -moz-border-radius:11px; border-radius:11px; -webkit-border-radius:11px }
	.clear { clear: both; }
	.fb-add-field { padding-left: 10px;}
	.fb-add-option { margin: 0 0 14px 100px; }
	.fb-container { margin: 21px; padding-bottom: 20px; }
	.fb-desc, #fb-add-field { margin-top: 34px;  background: none repeat scroll 0 0 #FFFFFF; border: 1px solid #E2E2E2; border-radius: 4px 4px 4px 4px;  padding: 13px; width: 350px; }
	.fb-extra-fields { margin-bottom: 2px; }
	.fb-form-case { background: #FFF; padding: 13px; border: 1px solid #E2E2E2; width: 336px; -moz-border-radius:4px; border-radius:4px; -webkit-border-radius:4px }
	.fb-form-case a { outline: none; }
	.fb-form-case input[type='text'], .fb-form-case textarea { background: #E1E1E1; }
	.fb-radio-label { display: inline-block; margin-left: 8px; float: left; width: 290px; }
	.fb-new-fields { position: relative; border: 1px dashed #FFF; background: #FFF; padding: 4px 10px 10px; cursor: default; }
	.fb-new-fields:hover { border: 1px dashed #BBDBEA; background: #F7FBFD; }
	.fb-options { width: 170px !important; }
	.fb-remove { background: url('<?php echo CONTACT_FORM_SHORTCODE_URL; ?>/images/remove-field.gif') no-repeat; position: absolute; cursor: pointer !important; right: -26px; top: 27px; width: 20px; height: 23px; }
	.fb-remove:hover { background: url('<?php echo CONTACT_FORM_SHORTCODE_URL; ?>/images/remove-field-hover.gif') no-repeat; }
	.fb-remove-small { top: 2px !important; }
	.fb-remove-option { position: absolute; top: 1px; right: 10px; width: 20px; height: 23px; background: url('<?php echo CONTACT_FORM_SHORTCODE_URL; ?>/images/remove-option.gif') no-repeat; }
	.fb-remove-option:hover { background: url('<?php echo CONTACT_FORM_SHORTCODE_URL; ?>/images/remove-option-hover.gif') no-repeat; }
	.fb-reorder { cursor: move; position: relative; }
	.fb-reorder:hover div { display: block !important; width: 130px !important; position: absolute; top: 0; right: 0; z-index: 200; padding: 5px 10px; color: #555; font-size: 11px; background: #FFF; border: 1px solid #CCC; -moz-border-radius:4px; border-radius:4px; -webkit-border-radius:4px; }
	.fb-right { position: absolute; left: 442px; top: 125px; width: 315px; margin: 57px 21px 0 0; }
	.fb-right .fb-new-fields { border: none; background: #F9F9F9; padding: 0; }
	.fb-right input[type='text'] { width: 195px; margin-bottom: 14px; }
	.fb-right label { color: #444; width: 100px; float: left; font-weight: normal; }
	.fb-right select { width: 150px !important; margin-bottom: 14px; }
	.fb-right textarea { margin-bottom: 13px; }
	.fb-right p { color: #999; line-height: 19px; }
	.fb-settings input[type='text'], .fb-settings textarea { background-image: none !important; }
	.fb-success { position: absolute; top: -3px; right: 100px; padding: 6px 23px 4px 23px; background: #FFFFE0; font-weight: normal; border: 1px solid #E6DB55; color: #333; -moz-border-radius:4px; border-radius:4px; -webkit-border-radius:4px; }
	.right { float: right; }
</style>
</head>

<body  onload="init();">
	<div id="media-upload-header">
		<div id="fb-success" class="fb-success" style="display: none;"><?php _e('Your new field was saved successfully','churchope'); ?></div>

	</div>
	<div class="fb-right">
	
		<div id="fb-add-field" style="display: none;">
			<h3><?php _e('Edit this new field','churchope'); ?></h3>
			
			<label for="fb-new-label"><?php _e('Label','churchope'); ?></label>
			<input type="text" id="fb-new-label" value="<?php _e('New field','churchope'); ?>" />
			
			<label for="fb-new-label"><?php _e('Field type','churchope'); ?></label>
			<select id="fb-new-type">
				<option value="checkbox"><?php _e('Checkbox','churchope'); ?></option>
				<option value="select"><?php _e('Drop down','churchope'); ?></option>
				<option value="email"><?php _e('Email','churchope'); ?></option>
				<option value="name"><?php _e('Name','churchope'); ?></option>
				<option value="radio"><?php _e('Radio','churchope'); ?></option>
				<option value="text" selected="selected"><?php _e('Text','churchope'); ?></option>
				<option value="textarea"><?php _e('Textarea','churchope'); ?></option>
				<option value="url"><?php _e('Website','churchope'); ?></option>
			</select>
			<div class="clear"></div>
			
			<div id="fb-options" style="display: none;">
				<div id="fb-new-options">
					<label for="fb-option0"><?php _e('Options','churchope'); ?></label>
					<input type="text" id="fb-option0" optionid="0" value="<?php _e('First option','churchope'); ?>" class="fb-options" />
				</div>
				<div id="fb-add-option" class="fb-add-option">
					<a href="#" id="fb-another-option"><?php _e('Add another option','churchope'); ?></a>
				</div>
			</div>
			
			<div class="fb-required">
				<label for="fb-new-label"></label>
				<input type="checkbox" id="fb-new-required" />
				<label for="fb-new-label" class="fb-radio-label"><?php _e('Required?','churchope'); ?></label>
				<div class="clear"></div>
			</div>
			<div id="fb-reply" style="display: none;">
				<label for="fb-new-label"></label>
				<input type="checkbox" id="fb-new-reply" />
				<label for="fb-new-label" class="fb-radio-label"><?php _e('Use for reply?','churchope'); ?></label>
				<div class="clear"></div>
			</div>
			
			<input type="hidden" id="fb-field-id" />
			<input type="submit" class="button" value="<?php _e('Save this field','churchope'); ?>" id="fb-save-field" name="save">
		</div>
	</div>
	<form id="fb-preview">
		<div id="fb-add-field" class="fb-container" style="float:left">
			<h1><?php _e("Here's what your form will look like","churchope"); ?></h1>
			<div id="sortable" class="fb-form-case">
				
				<div id="fb-extra-fields" class="fb-extra-fields"></div>
				
				<a href="#" id="fb-new-field" class="fb-add-field"><?php _e('Add a new field','churchope'); ?></a>
			</div>
			<input type="submit" class="button-primary" tabindex="4" value="<?php _e('Add this form to my post','churchope'); ?>" id="fb-save-form" name="save">
		</div>
		<div id="fb-email-settings" class="fb-container" style="float: left;">
			<h1><?php _e('Email settings','churchope'); ?></h1>
			<div class="fb-form-case fb-settings">
				<label for="fb-fieldname"><?php _e('Enter your email address','churchope'); ?></label>
				<input type="text" id="fb-field-my-email" style="background: #FFF !important;" />

				<label for="fb-fieldemail" style="margin-top: 14px;"><?php _e('What should the subject line be?','churchope'); ?></label>
				<input type="text" id="fb-field-subject" style="background: #FFF !important;" />
			</div>

		</div>
	</form>
</body>
</html>