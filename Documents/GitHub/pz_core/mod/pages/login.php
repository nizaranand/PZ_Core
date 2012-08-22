<?php
/**
 * Elgg login form for 1.9
 * this checsk for the md5 hash sum and rehashes users who have that hash to sha1 + blowfish
 * @package Elgg
 * @subpackage Core
 */
?>
<?php 

function salty() {
return substr(sha1(microtime() . rand()), 0, 8);
}
function improvepass()
{
$password = 'password';
$md5word = md5($password);
if($password == $md5word)
{
$password = sha1($password . salty()); // the first hash  
return CRYPT_BLOWFISH($password . salty());

}
else
forward();
}
?>


<div>
	<label><?php echo elgg_echo('loginusername'); ?></label>
	<?php echo elgg_view('input/text', array(
		'name' => 'username',
		'class' => 'elgg-autofocus',
		));
	?>
</div>
<div>
	<label><?php echo elgg_echo($password); ?></label>
	<?php echo elgg_view('input/password', array('name' => 'password')); ?>
</div>

<?php echo elgg_view('login/extend'); ?>

<div class="elgg-foot">
	<label class="mtm float-alt">
		<input type="checkbox" name="persistent" value="true" />
		<?php echo elgg_echo('user:persistent'); ?>
	</label>
	
	<?php echo elgg_view('input/submit', array('value' => elgg_echo('login'))); ?>
	
	<?php 
	if (isset($vars['returntoreferer'])) {
		echo elgg_view('input/hidden', array('name' => 'returntoreferer', 'value' => 'true'));
	}
	?>

	<ul class="elgg-menu elgg-menu-general mtm">
	<?php
		if (elgg_get_config('allow_registration')) {
			echo '<li><a class="registration_link" href="' . elgg_get_site_url() . 'register">' . elgg_echo('register') . '</a></li>';
		}
	?>
		<li><a class="forgot_link" href="<?php echo elgg_get_site_url(); ?>forgotpassword">
			<?php echo elgg_echo('user:password:lost'); ?>
		</a></li>
	</ul>
</div>
