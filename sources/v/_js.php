<?php
$files = [
	URI_BASE . '/assets/jquery.js',
	URI_BASE . '/assets/script.js',
];

$files = array_merge($files, (array)@$_super['js']);
ksort($files);
?>

<?php foreach ($files as $file): ?>
	<script src="<?= $file ?>"></script>
<?php endforeach ?>