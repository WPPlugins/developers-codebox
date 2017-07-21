<?php
$load = '../../../wp-load.php';
if (file_exists($load)) {  //if it's >WP-2.6
	require_once $load;
}
else {
	wp_die('Error: Config file not found');
}

if( !$_GET['nonce'] || ($_GET['nonce'] == '') || (!wp_verify_nonce($_GET['nonce'], 'codeboxnonce')) ) die('You are not authorized to view this page.');

if( !defined('WP_ADMIN') || !WP_ADMIN ) define('WP_ADMIN', true); //let's set this as an admin page. Why?

if ($_GET['src'] == "org") {
?>

<div class="wrap">
	<p style="font-family: monospace; font-size: 12px;">Your code output will appear here. It's like magic, only nerdier.</p>
</div>

 <?php exit();
}
else {
	$nonce = $_POST['codeboxnonce'];
?>

<?php if (wp_verify_nonce($nonce, 'codeboxnonce') ) {
		
		$input = stripslashes($_POST['codeboxtext']);

		$eval = eval('?>'.$input); //this closes the PHP so that the user must use proper PHP syntax
		print_r($eval);

		echo '<br clear="all"/><br /><em>...done!</em>';

	}
	else {
		wp_die('Not Authorized');
	} ?>
			</div>

<?php
}
?>