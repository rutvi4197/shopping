<?php 

	
	

class Database
{
	private static $host='rutvi.db.9462939.hostedresource.com';
	private static $uname='rutvi';
	private static $pwd='Demo9@1212';
	private static $con=NULL;
	
	public static function connect()
	{
		self::$con=mysql_connect(self::$host,self::$uname,self::$pwd);
		mysql_select_db('rutvi',self::$con);
		return self::$con;
	}
	public function getdata($query)
	{
		$res=mysql_query($query,self::myconnection());
		return $res;
	}
}

?>


