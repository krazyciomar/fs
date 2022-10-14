<?php


include "/usr/local/freeswitch/conf/webpass.php";

include "checkpass.php";

class USER
{	

	private $conn;
	
	public function __construct()
	{
/*
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
*/
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($uname,$umail,$upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass) 
		                                               VALUES(:uname, :umail, :upass)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($uname,$umail,$upass)
	{
		global $usuario,$password;
 
			if ($uname>5999) {
				$userRow['user_id']=$uname;
				$row=1;
			}


			if ($umail==$usuario && $upass==$password)
			{
					$_SESSION['user_session'] = 1;
					return true;
			}
			else
			{
					return false;
			}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>
