<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['token']) && $_POST['token'] == 'dsw3YzIS') {

			// $servername = "127.0.0.1";
			// $username = "root";
			// $password = "";
			// $db_name = "crafin_api";

			$servername = "127.0.0.1";
			$username = "uvvezse6hx3uj";
			$password = "y55b8engrxq7";
			$db_name = "dbv4c3xn59xsy6";

			$conn = new mysqli($servername, $username, $password, $db_name);
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			$query = "SELECT `id`,`brand`,`balance`,`time`, `email`,`status` FROM `gcpch_card_table` WHERE `time`>'2021/04/20' AND (status='hold' OR status='done')";
			// $query = "SELECT `id`,`brand`,`balance`,`time`, `email`,`status` FROM `gcpch_card_table` WHERE (status='hold' OR status='done')";
			$result = $conn->query($query) or die($conn->error);

			$gifts = [];
			while ($row = $result->fetch_assoc()) {
				$gifts [] = array(
					'id' => $row['id'],
					'brand' => $row['brand'],
					'balance' => $row['balance'],
					'time' => $row['time'],
					'email' => $row['email'],
					'status' => $row['status'],
				);
			}

			echo json_encode($gifts);

		} else {
			echo 'Bad request url';
		}

	} else {
		echo 'Bad request url';
	}