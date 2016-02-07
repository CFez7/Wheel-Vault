<?php
// creates a session.
	session_start();

	function message() {
		if(isset($_SESSION["message"])){
			$output = "<div class=\"container\"><p>";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "</p></div>";

			$_SESSION["message"] = "";
			return $output;
		}
	}
?>