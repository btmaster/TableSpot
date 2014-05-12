<?php 
	include_once('Db.class.php');
	class Gerecht
	{
		private $m_sGerecht;
		private $m_iPrijs;
		private $m_iMenu;

		public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case 'gerecht':
				$this->m_sGerecht = $p_vValue;
				break;

				case 'prijs':
				$this->m_iPrijs = $p_vValue;
				break;

				case 'menu':
				$this->m_iMenu = $p_vValue;
				break;
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case 'gerecht':
					return $this->m_sGerecht;
				break;

				case 'prijs':
					return $this->m_iPrijs;
				break;

				case 'menu':
					return $this->m_iMenu;
				break;
			}
		}

		public function Save()
		{
			$db = new Db();
			$sql = "insert into gerecht(Gerecht, Prijs, FK_Menu_ID) VALUES (
				'".$this->m_sGerecht."',
				'".$this->m_iPrijs."',
				'".$this->m_iMenu."');";
			$db->conn->query($sql);
		}

		public function GetAll($menu)
		{
			$db = new Db();
			$sql = "SELECT * FROM gerecht WHERE FK_Menu_ID = '" . $menu . "';";
			
			$select = $db->conn->query($sql);
			return $select;
		}
	}
?>