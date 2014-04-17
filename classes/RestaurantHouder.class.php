<?php 
	include_once("Db.class.php");
	class Restaurant{
		private $m_sFirstname;
		private $m_sLastname;
		private $m_sEmail;
		private $m_sPassword;
		private $m_sPasswordcheck;
		private $m_sSalt="DeSaltZalHetHierIsSuperVeiligMakenSe";

		

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty)
			{
				case "Firstname":
				$this->m_sFirstname = $p_vValue;
				break;

				case "Lastname":
				$this->m_sLastname = $p_vValue;
				break;

				case "Email":
				$this->m_sEmail = $p_vValue;
				break;

				case "Password":
				$this->m_sPassword = md5($p_vValue.$this->m_sSalt);
				break;

				case "Passwordcheck":
				$this->m_sPasswordcheck = md5($p_vValue.$this->m_sSalt);
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch ($p_sProperty) {
				case "Firstname":
				return $this->m_sFirstname;
				break;

				case "Lastname":
				return $this->m_sLastname;
				break;

				case "Email":
				return $this->m_sEmail;
				break;

				case "Password":
				return $this->m_sPassword;
				break;

				case "Passwordcheck":
				return $this->m_sPasswordcheck;
				break;
			}
		}

		public function Save()
		{
			if ($this->m_sPassword === $this->m_sPasswordcheck)
			{
				$db = new Db();
			
				$sql = "insert INTO restaurant_keeper (Email, Password, Firstname,Lastname)
				VALUES(
					'".$this->m_sEmail."',
					'".$this->m_sPasswordcheck."',
					'".$this->m_sFirstname."',
					'".$this->m_sLastname."');";
				$db->conn->query($sql);
				header("Location:Index.php");
			} else
			{
				throw new Exception("Wachtwoorden komen niet overeen");
				
			}
		}

		public function Login()
		{
			$db = new Db();
			$sql = "SELECT * FROM restaurant_keeper WHERE Email = 
			'".$this->m_sEmail."'
			and Password ='".$this->m_sPassword."';";
			$login = $db->conn->query($sql);
			$numberofRows = $login->num_rows;

			if($numberofRows == 1)
			{
				header("Location: Home.php");
			} else {
				$sql = "SELECT * FROM customers WHERE Email = 
			'".$this->m_sEmail."'and Password ='".$this->m_sPassword."';";
				throw new Exception("E-mailadres en wachtwoord komen niet overeen");
				$login = $db->conn->query($sql);
				$numberofRows = $login->num_rows;
				
			}

		}

	}






 ?>