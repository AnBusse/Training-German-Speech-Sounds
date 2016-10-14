<?php
// statistics.php - Displays the amount of tasks and how many of them the user already completed successfully, based on the cookies set when the user completes a tasks

require_once "helpers/db.php";

// Select all elements from the word_table (words equal possible question items)
$stat_query = "SELECT word_id, word, id_of_category FROM word_table WHERE url_to_file != '' AND id_of_category != '0' ORDER BY id_of_category ASC";
$stat_result = $my_db_object->query($stat_query);



while ($row = mysqli_fetch_assoc($stat_result)) {
    $category[$row['id_of_category']][] = $row;
}

$cnt1 = count($category['1']);
$cnt2 = count($category['2']);
$cnt3 = count($category['3']);
$cnt4 = count($category['4']);
$cnt5 = count($category['5']);
$cnt6 = count($category['6']);
$cnt7 = count($category['7']);
$cnt8 = count($category['8']);
$cnt9 = count($category['9']);
$cnt10 = count($category['10']);
$cnt11 = count($category['11']);
$cnt12 = count($category['12']);
$cnt13 = count($category['13']);
$cnt14 = count($category['14']);
$cnt15 = count($category['15']);
$cnt16 = count($category['16']);
$cnt17 = count($category['17']);
$cnt18 = count($category['18']);

// Find out how many correct answers the user already gave per category:

// Step 1 - Set the counter variables:
$counter_c1 = 0;
$counter_c2 = 0;
$counter_c3 = 0;
$counter_c4 = 0;
$counter_c5 = 0;
$counter_c6 = 0;
$counter_c7 = 0;
$counter_c8 = 0;
$counter_c9 = 0;
$counter_c10 = 0;
$counter_c11 = 0;
$counter_c12 = 0;
$counter_c13 = 0;
$counter_c14 = 0;
$counter_c15 = 0;
$counter_c16 = 0;
$counter_c17 = 0;
$counter_c18 = 0;

// Step 2: Loop through the $_COOKIE array and count the cookies set for each category:
foreach ($_COOKIE as $key => $value) {
		// If the value is not the session ID cookie, the sound of the day cookie or the cookie consent cookie:
		if ($value != "PHPSESSID" && $value !="my_item" && $value !="user_cookie_consent"){
			switch ($key) {
			// If the key of the cookie array item starts with the Category ID, increment the respective counter variable by one
			case (strpos($key, "1:") !== FALSE && strpos($key, "1:") == 0): 
				$counter_c1 = $counter_c1 + 1;
				break;
			case (strpos($key, "2:") !== FALSE && strpos($key, "2:") == 0):
				$counter_c2 = $counter_c2 + 1;
				break;
			case (strpos($key, "3:") !== FALSE && strpos($key, "3:") == 0):
				$counter_c3 = $counter_c3 + 1;
				break;
			case (strpos($key, "4:") !== FALSE && strpos($key, "4:") == 0):
				$counter_c4 = $counter_c4 + 1;
				break;
			case (strpos($key, "5:")!== FALSE && strpos($key, "5:") == 0):
				$counter_c5 = $counter_c5 + 1;
				break;
			case (strpos($key, "6:") !== FALSE && strpos($key, "6:") == 0):
				$counter_c6 = $counter_c6 + 1;
				break;
			case (strpos($key, "7:") !== FALSE && strpos($key, "7:") == 0):
				$counter_c7 = $counter_c7 + 1;
				break;
			case (strpos($key, "8:") !== FALSE && strpos($key, "8:") == 0):
				$counter_c8 = $counter_c8 + 1;
				break;
			case (strpos($key, "9:") !== FALSE && strpos($key, "9:") == 0):
				$counter_c9 = $counter_c9 + 1;
				break;
			case (strpos($key, "10:") !== FALSE && strpos($key, "10:") == 0):
				$counter_c10 = $counter_c10 + 1;
				break;
			case (strpos($key, "11:") !== FALSE && strpos($key, "11:") == 0):
				$counter_c11 = $counter_c11 + 1;
				break;
			case (strpos($key, "12:") !== FALSE && strpos($key, "12:") == 0):
				$counter_c12 = $counter_c12 + 1;
				break;
			case (strpos($key, "13:") !== FALSE && strpos($key, "13:") == 0):
				$counter_c13 = $counter_c13 + 1;
				break;
			case (strpos($key, "14:") !== FALSE && strpos($key, "14:") == 0):
				$counter_c14 = $counter_c14 + 1;
				break;
			case (strpos($key, "15:") !== FALSE && strpos($key, "15:") == 0):
				$counter_c15 = $counter_c15 + 1;
				break;
			case (strpos($key, "16:") !== FALSE && strpos($key, "16:") == 0):
				$counter_c16 = $counter_c16 + 1;
				break;
			case (strpos($key, "17:") !== FALSE && strpos($key, "17:") == 0):
				$counter_c17 = $counter_c17 + 1;
				break;
			case (strpos($key, "18:") !== FALSE && strpos($key, "18:") == 0):
				$counter_c18 = $counter_c18 + 1;
				break;
			default:
				// Do nothing
				break;
		}
	}
}

// Step 3: Echo the counter variables in the appropriate places in the HTML code
?>

	<div id="identify" class="stat">
		<span class="underline">Identify the Correct Pronunciation:</span>
		<ul class="stat_list">
			<li>Easy: <?php echo $counter_c1; ?>/<?php echo $cnt1; ?>
				<button class="my_reset" id="1">Reset</button>
			</li>
			<li>Medium: <?php echo $counter_c2; ?>/<?php echo $cnt2; ?>
				<button class="my_reset" id="2">Reset</button>
			</li>
			<li>Hard: <?php echo $counter_c3; ?>/<?php echo $cnt3; ?>
				<button class="my_reset" id="3">Reset</button>
			</li>
			<li>Expert: <?php echo $counter_c13; ?>/<?php echo $cnt13; ?>
				<button class="my_reset" id="13">Reset</button>
			</li>
		</ul>
	</div>
	<div id="fill_gap" class="stat">
		<span class="underline">Fill the Gap:</span>
		<ul class="stat_list">
			<li>Easy - Part 1: <?php echo $counter_c4; ?>/<?php echo $cnt4; ?>
				<button class="my_reset" id="4">Reset</button>
			</li>
			<li>Easy - Part 2: <?php echo $counter_c15; ?>/<?php echo $cnt15; ?>
				<button class="my_reset" id="15">Reset</button>
			</li>
			<li>Medium - Part 1: <?php echo $counter_c5; ?>/<?php echo $cnt5; ?>
				<button class="my_reset" id="5">Reset</button>
			</li>
			<li>Medium - Part 2: <?php echo $counter_c14; ?>/<?php echo $cnt14; ?>
				<button class="my_reset" id="14">Reset</button>
			</li>
			<li>Medium - Part 3: <?php echo $counter_c16; ?>/<?php echo $cnt16; ?>
				<button class="my_reset" id="16">Reset</button>
			</li>
			<li>Hard - Part 1: <?php echo $counter_c6; ?>/<?php echo $cnt6; ?>
				<button class="my_reset" id="6">Reset</button>
			</li>
			<li>Hard - Part 2: <?php echo $counter_c17; ?>/<?php echo $cnt17; ?>
				<button class="my_reset" id="17">Reset</button>
			</li>
			<li>Hard - Part 3: <?php echo $counter_c18; ?>/<?php echo $cnt18; ?>
				<button class="my_reset" id="18">Reset</button>
			</li>
		</ul>
	</div>
	
	<div id="stress" class="stat">
	<span class="underline">Stressing German Words:</span>
		<ul class="stat_list">
			<li>Easy: <?php echo $counter_c7; ?>/<?php echo $cnt7; ?>
				<button class="my_reset" id="7">Reset</button>
			</li>
			<li>Medium: <?php echo $counter_c8; ?>/<?php echo $cnt8; ?>
				<button class="my_reset" id="8">Reset</button>
			</li>
			<li>Hard: <?php echo $counter_c9; ?>/<?php echo $cnt9; ?>
				<button class="my_reset" id="9">Reset</button>
			</li>
		</ul>
	</div>
	
	<div id="specials" class="stat">
	<span class="underline">German Specials:</span>
		<ul class="stat_list">
			<li>Unstressed "e": <?php echo $counter_c10; ?>/<?php echo $cnt10; ?>
				<button class="my_reset" id="10">Reset</button>
			</li>
			<li>Final "r": <?php echo $counter_c11; ?>/<?php echo $cnt11; ?>
				<button class="my_reset" id="11">Reset</button>
			</li>
			<li>Consonant <br> Devoicing: <?php echo $counter_c12; ?>/<?php echo $cnt12; ?>
				<button class="my_reset" id="12">Reset</button>
			</li>
		</ul>
	</div>
	<button id="my_reset_all" class="my_reset">Reset All</button>
