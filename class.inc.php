<?php


/**
 * DBase connection
 */
class dBaseConnect {
	
	protected $host = "localhost";
	protected $user = "film_user";
	protected $pass = "fp_pwd@mysql";
	protected $dbase = "upperlink";
	public $last_insert_id = 0;

	public $connResource;
	//functions
	function __construct(){
		$this->connResource = mysqli_connect($this->host, $this->user, $this->pass, $this->dbase);
	}
	function dbconn(){
		return mysqli_select_db($this->connResource, $this->dbase);
	}
	function queries($q){
		$db = $this->dbconn();
		$query = mysqli_query($this->connResource, $q) or die(mysqli_error($this->connResource));
		$this->last_insert_id = mysqli_insert_id($this->connResource);
		return $query;
	}
}


/**
 * Admin
 */
class Admin
{
	function isLogged(){
		if(isset($_SESSION["user"])){
			return true;
		}
		return false;
	}

	function login($user, $pwd){
		if($user == "admin" && $pwd == "adio"){
			$_SESSION["user"] = "admin";
		}
	}
	
}

/**
 * Apply Software engineer Class
 */
class Apply extends dBaseConnect
{
	function getPassUrl(){
		if(!isset($_FILES["passport"]))
			return false;
		if(filesize($_FILES["passport"]["tmp_name"]) > 2*1024*1024)
			return false;
		$rand  = rand(100000, 999999);
		$url = "passports/".$rand.$_FILES["passport"]["name"];
		move_uploaded_file($_FILES["passport"]["tmp_name"], $url);
		return $url;
	}

	function getResUrl(){
		if(!isset($_FILES["resumee"]))
			return false;
		if(filesize($_FILES["resumee"]["tmp_name"]) > 2*1024*1024)
			return false;
		$rand  = rand(100000, 999999);
		$url = "resumees/".$rand.$_FILES["resumee"]["name"];
		move_uploaded_file($_FILES["resumee"]["tmp_name"], $url);
		return $url;
	}

	function apply_data(){
		$lname = (isset($_POST["lname"])) ? addslashes($_POST["lname"]) : "";
		$fname = (isset($_POST["fname"])) ? addslashes($_POST["fname"]) : "";
		$tel = (isset($_POST["tel"])) ? addslashes($_POST["tel"]) : "" ;
		$email = (isset($_POST["email"])) ? addslashes($_POST["email"]) : "" ;
		$cover = (isset($_POST["coverletter"])) ? addslashes($_POST["coverletter"]) : "" ;

		$pass = $this->getPassUrl();

		$res = $this->getResUrl();

		if($pass != false && $res != false){
			if($lname != "" && $fname != "" && $tel != "" && $email != "" && $cover != ""){
				
				$check = parent::queries("SELECT count(*) FROM `application`");
				$data = mysqli_fetch_assoc($check);

				if($data["count(*)"] >= 4)
					throw new Exception("Application Closed for now", 1);
				$sql = "INSERT INTO `application`(`lname`, `fname`, `email`, `coverletter`, `passport`, `resumee`, `phone`) VALUES ('$lname', '$fname', '$email', '$cover', '$pass', '$res', '$tel')";
				parent::queries($sql);
			}else{
				throw new Exception("Please provide ll rquired fields", 1);
			}
		}else{
			throw new Exception("Something wrong with file size uploaded", 1);
		}
	}

	function __construct()
	{
		@mkdir("passports");
		@mkdir("resumees");
		parent::__construct();
	}
}

/**
 * 
 */
class GetData extends dBaseConnect
{
	public $data = null;
	function returnAll(){
		return $this->data;
	}
	
	function __construct()
	{
		parent::__construct();
		$squery = parent::queries("SELECT * FROM `application`");
		$data = [];
		while ($row = mysqli_fetch_assoc($squery)) {
			$data[] = $row;
		}
		$this->data = $data;
	}
}
?>