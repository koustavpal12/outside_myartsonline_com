<?php

$title = !empty($metaTitle) ? $metaTitle : '::Title';
$metaDescription = !empty($metaDescription) ? $metaDescription : 'Test...';
$metaKeywords = !empty($metaKeywords) ? $metaKeywords : '';
$FooterContent = !empty($FooterContent) ? $FooterContent : '';
$H1_Tag = !empty($H1_Tag) ? $H1_Tag : '';

?>
<!doctype html>
<html lang="en">
<meta name="" content="" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="<?php echo $metaDescription; ?>">
<?php if ($metaKeywords) { ?>
	<meta name="keywords" content="<?php echo $metaKeywords; ?>" /><?php } ?>
<title><?php echo $title; ?></title>

<link href="<?php echo CDN_BASE_URL.CSS_DIR; ?><?php echo BOOTSTRAP_CSS; ?>" rel="stylesheet">
<link href="<?php echo CDN_BASE_URL.CSS_DIR; ?><?php echo ICON_CSS; ?>" rel="stylesheet">

<link href="<?php echo CDN_BASE_URL.CSS_DIR; ?><?php echo JQUERY_UI_CSS; ?>" rel="stylesheet">
<link href="<?php echo CDN_BASE_URL.CSS_DIR; ?><?php echo JQUERY_VALIDATION_ENGINE_CSS; ?>" rel="stylesheet">
</head>

<body class="body_en">

	<?php $this->load->view('layout_includes/header-template'); ?>
	<div class="clr"></div>
	<!--Body Top Row Start Here-->
	<?php echo $content_for_layout_main; ?>
	<!--Body Top Row End Here-->
	<div class="clr"></div>
	<?php $this->load->view('layout_includes/footer'); ?>

	<script src="<?php echo CDN_BASE_URL.JS_DIR; ?><?php echo JQUERY_MIN_JS; ?>"></script>
	<script src="<?php echo CDN_BASE_URL.JS_DIR; ?><?php echo BOOTSTRAP_JS; ?>"></script>
	<script>
		jQuery.fn.bstooltip = jQuery.fn.tooltip;
	</script>
	<script src="<?php echo CDN_BASE_URL.JS_DIR; ?><?php echo JQUERY_UI_MIN_JS; ?>"></script>
	<script src="<?php echo CDN_BASE_URL.JS_DIR; ?><?php echo JQUERY_VALIDATION_ENGINE_JS; ?>"></script>
	<script src="<?php echo CDN_BASE_URL.JS_DIR; ?><?php echo JQUERY_VALIDATION_ENGINE_EN_JS; ?>"></script>


	<?php
	if (isset($common_js_arr) && count($common_js_arr) > 0) {
		foreach ($common_js_arr as $c_js) {
	?>
			<script src="<?php echo CDN_BASE_URL.JS_DIR; ?><?php echo $c_js; ?>"></script>
		<?php } ?>
	<?php } ?>
	<?php
	if (isset($js_arr) && count($js_arr) > 0) {
		foreach ($js_arr as $js) {
	?>
			<script src="<?php echo CDN_BASE_URL.JS_DIR; ?><?php echo $js; ?>"></script>
		<?php } ?>
	<?php } ?>
	<?php
	if (isset($css_arr) && count($css_arr) > 0) {
		foreach ($css_arr as $css) {
	?>
			<link href="<?php echo CDN_BASE_URL.CSS_DIR; ?><?php echo $css; ?>" rel="stylesheet">
		<?php } ?>
	<?php } ?>








</body>

</html>
