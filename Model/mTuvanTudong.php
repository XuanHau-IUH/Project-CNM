<?php

include_once("Model/Connect.php");

class mTuvanTudong
{
	// Hàm lấy thông tin tư vấn từ khách hàng doanh nghiệp
	public function select_tuvan($query)
	{
		$conn;
		$p = new clsketnoi();
		if ($p->ketnoiDB($conn)) {
			$escaped_query = mysqli_real_escape_string($conn, $query); // Tránh SQL injection
			$string = "SELECT answer FROM chatbot WHERE query LIKE '%$escaped_query%'";
			$table = mysqli_query($conn, $string);
			$p->dongketnoi($conn);
			return $table;
		} else {
			return false;
		}
	}

	// Hàm lấy tin nhắn
	public function select_message()
	{
		$conn;
		$p = new clsketnoi();
		if ($p->ketnoiDB($conn)) {
			$string = "SELECT * FROM message";
			$table = mysqli_query($conn, $string);
			$p->dongketnoi($conn);
			return $table;
		} else {
			return false;
		}
	}

	public function insert_message($txt, $added_on, $user, $username = null)
	{
		$conn;
		$p = new clsketnoi();
		if ($p->ketnoiDB($conn)) {
			$escaped_txt = mysqli_real_escape_string($conn, $txt); // Tránh SQL injection
			$escaped_user = mysqli_real_escape_string($conn, $user); // Tránh SQL injection
			if ($username !== null) {
				$username = mysqli_real_escape_string($conn, $username); // Tránh SQL injection
				$sql = "INSERT INTO message (noiDung, added_on, type, username) VALUES ('$escaped_txt', '$added_on', '$escaped_user', '$username')";
			} else {
				$sql = "INSERT INTO message (noiDung, added_on, type) VALUES ('$escaped_txt', '$added_on', '$escaped_user')";
			}
			$result = mysqli_query($conn, $sql);
			$p->dongketnoi($conn);
			return $result;
		} else {
			return false;
		}
	}

	
}
