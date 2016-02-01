<?php class demo
{
	function hello()
	{
		/*
		 * Ornithopter.io is very simple to use. Some sample controllers and
		 * sample models (like this one) have been setup to help you understand
		 * the basics of using the MVC framework and structuring projects.
		 *
		 * Access the framework by calling... io::method();
		 */

		// My first name
		$first = 'Corey';

		// My last name
		$last = 'Olson';

		// My birthday is...
		$dob = 'November 14, 1987';

		// My birthday was a long time ago...
		$birthday = io::helper('time')->context( strtotime($dob) );

		// Hash a password or skip
		if ( isset($_GET['skip_bcrypt']) )

			// Slows down the script runtime severely
			$password = 'Skipped secure password hashing (CPU intensive)';

		else
			// A long time ago I used the password...
			$password = io::helper('bcrypt')->hash('yippie');

		// My home town is Chicago...
		date_default_timezone_set('America/Chicago');

		// The current time here is...
		$now = time();

		// Ornithopter.io has built in session management...
		io::library('session');

		// Load the session library on dynamic pages for users
		$session_id = io::library('session')->id();

		// Did you notice that?
		io::library('session')->set('favorite_food', 'pizza');

		// Chaining is allowed on most libraries and helpers (convenience)
		$session = io::library('session');

		// Making a reference; now I can type even less...
		$session->set('favorite_drink', 'coffee');

		// You can call libraries, helpers, models and controllers by shortnames
		$time = io::h('time');

		// Again I can now use the time helper class by referencing $time
		$christmas = $time->prefix('future')->postfix('future')->context( strtotime('December 25 ' . date('Y')) );

		// Now we can show some information with a view
		$page = io::view('welcome', array(
			'name' 		=> $first . ' ' . $last,
			'bday' 		=> $dob,
			'bday_ago'	=> $birthday,
			'pwd' 		=> $password,
			'currently' => $now,
			'sessid' 	=> $session_id,
			'xmas_is' 	=> $christmas
		));

		/*
		 * Noticed how we passed variables to the view? The array we passed to
		 * the view will create the $key => $variables within the view for an
		 * easy and effective templating system. Just echo the view to see!
		 */

		echo $page;
	}

	function internals()
	{
		/*
		 * You can echo HTML and other information directly from the controller
		 * however it is usually better to create views for displaying model data.
		 */

		// HTML Header
		echo '<h3>Ornithopter Routing Information</h3>';

		// Print a Go Home link
		echo '<a href="/">Go back to Ornithopter.io homepage</a>';

		// Access the internals of Ornithopter.io easily
		var_dump(io::help());

		// Print a Go Home link
		echo '<a href="/">Go back to Ornithopter.io homepage</a>';
	}
}