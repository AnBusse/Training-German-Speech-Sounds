<?php
// cookie_consent.php
// This page saves the information that the user agreed to the use of cookies in a cookie that is valid for 2 weeks

		$my_cookie_name = "user_cookie_consent";
		$my_cookie_value = $_POST['cookie_consent'];
		setcookie($my_cookie_name, $my_cookie_value, time() + (86400 * 14), "/"); // 86400 = 1 day => Keep cookie for 2 weeks
?>
