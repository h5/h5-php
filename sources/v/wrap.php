<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="<?php echo URI_BASE ?>/assets/i/h5.png">
	<script>(function(B,C){B[C]=B[C].replace(/\bno-js\b/,'js');if(!/*@cc_on!@*/0)return;var e = "abbr article aside audio canvas command datalist details figure figcaption footer header hgroup mark meter nav output progress section summary time video".split(' '),i=e.length;while(i--){document.createElement(e[i])}})(document.documentElement,'className');</script>
	<title><?= isset($_super['title']) ? $_super['title'] . ' — ' : '' ?> h5 framework </title>
	<?= view('_css') ?>
</head> 
<body>

<?= $_content ?>

<?= view('_js') ?>

</body>
</html>