<?php 
/**
* 
*/
class Database
{
	private static $dsn = 'mysql:host=localhost; dbname=inotes';
	private static $username = 'root';
	private static $password = '';
	private static $db = null;


	function __construct()
	{

	}
	public static function connect()
	{
		if (self::$db == null) {
			try {
				self::$db = new PDO(self::$dsn, self::$username, self::$password);
				// self::$conn = setAttribute(PDO::ATTR_ERRMORE, PDO::ERRMORE_EXCEPTION);
				// self::$conn = query('set names "utf8"');
				// print_r('ok');
			} catch (PDOException $e) {
				echo "Kết nối thất bại";
				echo($error_message = $e->getMassage());
				die();
			}
		}
		return self::$db;
	}
	
	public static function disconnect()
	{
		if (self::$conn != null) {
			self::$conn = null;
		}
	}
}
?>