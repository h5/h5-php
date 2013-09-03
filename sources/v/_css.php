<?php
$files = [
	'https://raw.github.com/necolas/normalize.css/master/normalize.css',
	URI_BASE . '/assets/style.lss',
];

$files = array_merge($files, (array)@$_super['css']);
ksort($files);
?>

<?php foreach ($files as $file): ?>
	<link rel="stylesheet" href="<?= $file ?>" />
<?php endforeach ?>