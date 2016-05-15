<?php


date_default_timezone_set("Australia/Melbourne");

//Load config files
include('inc/config.dev.php');
//include('inc/config.test.php');
//include('inc/config.prod.php');
//Load database class
include('inc/db.class.php');

$db = new DB();

//print_r($db); //debug DB object



//Test if skill_audit_form has been submitted
if (isset($_POST['g-recaptcha-response']))
{
	//form has been sent
	
	//test captcha
	//create local variable of reCAPTCHA response
	$response_string = $_POST["g-recaptcha-response"];

	//assign const SECRET_KEY to local variable
	$secret_key = SECRET_KEY;

	//create a correctly formatted URL for API call
	$capchaAPICcall = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_string";

	//get the response data from google
	$data = file_get_contents($capchaAPICcall);

	//process the JSON into a PHP array
	$result = json_decode($data, true);
	
	//validate captcha
	if ($result['success'] != 1)
	{
    	//captcha failed so error our and die!

		$message['title'] = "reCAPTCHA test failed";
		$message['body'] = "<p>You failed the reCAPTCHA test, please go back and try again</p>";

		require_once('views/header.php');
		require_once('views/error.php');
		require_once('views/footer.php');
        die();

    } else {
		//captcha passed, write to database
		//TBA

		//write to members table

    	//Create a today data
    	$date = date('Y-m-d');
		
		$db->query('UPDATE ttm_members SET
			firstname = :Fname,
			lastname = :Lname,
			address = :Address,
			postcode = :Pcode,
			suburb = :Suburb,
			email = :Email,
			phone = :Phone,
			mobile = :Mobile,
			consent_contact = :consentContact,
			consent_sharing = :consentSharing,
			consent_projects = :consentProjects
			WHERE id = :memberID');

		$db->bind(':Fname', $_POST['firstname']);
		$db->bind(':Lname', $_POST['lastname']);
		$db->bind(':Address', $_POST['address']);
		$db->bind(':Pcode', $_POST['postcode']);
		$db->bind(':Suburb', $_POST['suburb']);
		$db->bind(':Email', $_POST['email']);
		$db->bind(':Phone', $_POST['phone']);
		$db->bind(':Mobile', $_POST['mobile']);
		$db->bind(':consentContact', $_POST['consent_contact_by_ttm']);
		$db->bind(':consentSharing', $_POST['participation_share_skills']);
		$db->bind(':consentProjects', $_POST['participation_projects']);
		$db->bind(':memberID', $_POST['member_id']);
		$db->execute();



		//write to ttm_members_stories
		if (isset($_POST['story'])) {
			$db->query('INSERT INTO ttm_member_stories (member, story, date_created) VALUES (:Member, :Story, :Date_Created)');
			$db->bind(':Member', $_POST['member_id']);
			$db->bind(':Story', $_POST['story']);
			$db->bind('Date_Created', $date);
			$db->execute();
		}
		

		//write to ttm_member_interests
		
		//first pull all interest to loop through
		$db->query('SELECT id FROM ttm_interests');
		$interests = $db->resultset();
		//loop through each interest
		foreach ($interests as $interest) {
			//test is the variable was posted
			if (isset($_POST['interest_' . $interest['id'] ]))
			{
				$db->query('INSERT INTO ttm_member_interests (member, interest) VALUES (:Member, :Interest) ');
				$db->bind(':Member', $_POST['member_id']);
				$db->bind(':Interest', $_POST['interest_' . $interest['id'] ]);
				$db->execute();	
			}
		}


		//write to ttm_member_skills
		//first pull all interest to loop through
		$db->query('SELECT id FROM ttm_skills');
		$skills = $db->resultset();
		//loop through each interest
		foreach ($skills as $skill) {
			//test is the variable was posted
			if (isset($_POST['skill_' . $skill['id'] ]))
			{
				$db->query('INSERT INTO ttm_member_skills (member, skill) VALUES (:Member, :Skill) ');
				$db->bind(':Member', $_POST['member_id']);
				$db->bind(':Skill', $_POST['skill_' . $skill['id'] ]);
				$db->execute();	
			}
		}

		//if write to DB succeeds, then display success message
		require_once('views/header.php');
		require_once('views/message_form_sent.php');
		require_once('views/footer.php');
	}


} elseif ( isset($_POST['go'])) {

	//login form posted
	$getEmail = $_POST['email'];
	$password = $_POST['password'];
		
	//validate the email
	if (!filter_var($getEmail, FILTER_VALIDATE_EMAIL)) {

		$message['title'] = "Invalid email address";
		$message['body'] = "<p>You have entered an invalid email address. Please go back and try again.</p>";

		require_once('views/header.php');
		require_once('views/error.php');
		require_once('views/footer.php');
		die();
	} else {

		//create has of posted password
		$password = md5($password);

		//query db for email
		$db->query('SELECT * from ttm_members WHERE email = :Email AND password= :Password');
		$db->bind(':Email', $getEmail);
		$db->bind(':Password', $password);
		$member = $db->single();
			

		if ($db->rowCount() == 0 ) {

			// if the email doesn't exist in the DB die!

			$message['title'] = "Sorry";
			$message['body'] = file_get_contents('views/sorry.php');

			require_once('views/header.php');
			require_once('views/error.php');
			require_once('views/footer.php');
			die();

		} else {

			//query to generate skills
			$db->query('SELECT id, skill, description FROM ttm_skills');
			$skills = $db->resultset();

			//query to generate interests 
			$db->query('SELECT id, interest, description FROM ttm_interests');
			$interests = $db->resultset();

			//print_r($rows);	
	
			//Load views
			//Load HTML header
			require_once('views/header.php');
			//load form
			require_once('views/skills_audit_form.php');
			//Load HTML footer
			require_once('views/footer.php');
				
		}

	}


} else {
		//Display the entry point

		$message['title'] = "Welcome to the TTM Skills Audit";
		$message['body'] = file_get_contents('views/welcome.php');

		require_once('views/header.php');
		require_once('views/error.php');
		require_once('views/footer.php');
		die();
	}




?>
