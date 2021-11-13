<?php 
	if (isset($_GET['action'])) {
		switch($_GET['action']) {
			case 'page_1': 
				include("page_1.php");
				break;
			case 'page_2':
				include("page_2.php");
				break;
			case 'page_3':
				include("page_3.php");
				break;
			default:
				echo "No";
		}
	}
