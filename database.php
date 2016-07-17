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
	
	public function getuser($email)
	{		$con=database::connect();
			$res=mysql_query("select * from user_tbl where pk_email_id='$email'",$con);
			return $res;
			database::disconnect();
	}
	public function viewcart($email_id,$flag)
	{		$con=database::connect();
			$res=mysql_query("select o.*,p.* from order_tbl as o,pro_tbl as p where o.fk_pro_id=p.pro_id and fk_email_id='$email_id' and o.flag='$flag'",$con);
			return $res;
			database::disconnect();
	}
	public function useredit($email,$photo,$name,$mobile,$gender)
	{		$con=database::connect();
			$res=mysql_query("update user_tbl set user_photo='$photo',user_name='$name',user_mobile='$mobile',user_gender='$gender' where pk_email_id='$email'",$con);
			return $res;
			database::disconnect();
	}
	public function getpro()
	{		$con=database::connect();
			$res=mysql_query("select p.* , c.* from pro_tbl as p , cat_tbl as c where c.cat_id=p.fk_cat_id ",$con);
			return $res;
			database::disconnect();
	}
	public function addcart($amnt,$date,$pro_id,$email_id,$qty,$flag)
	{		$con=database::connect();
			$res=mysql_query("insert into order_tbl values(Null,'$amnt','$date','$pro_id','$email_id','$qty','$flag')",$con);
			return $res;
			database::disconnect();
	}
	public function getpro1($pro_id)
	{		$con=database::connect();
			$res=mysql_query("select * from pro_tbl where pro_id='$pro_id'",$con);
			return $res;
			database::disconnect();
	}
	
	public function catins($name)
	{		$con=database::connect();
			$res=mysql_query("insert into cat_tbl values(Null,'$name')",$con);
			return $res;
			database::disconnect();
	}
	public function prodel($pro_id)
	{		$con=database::connect();
			$res=mysql_query("delete from pro_tbl where pro_id='$pro_id'",$con);
			return $res;
			database::disconnect();
	}
	public function preorder($email_id)
	{		$con=database::connect();
			$res=mysql_query("select o.*,p.* from order_tbl as o,pro_tbl as p where o.fk_pro_id=p.pro_id and fk_email_id='$email_id' and flag='order'",$con);
			return $res;
			database::disconnect();
	}
	public function probycat($id)
	{		$con=database::connect();
			$res=mysql_query("select * from pro_tbl where fk_cat_id='$id'",$con);
			return $res;
			database::disconnect();
	}
	public function getcat()
	{		$con=database::connect();
			$res=mysql_query('select count(p.pro_id)"cnt",c.cat_name,p.fk_cat_id,c.cat_id from cat_tbl as c,pro_tbl as p  where c.cat_id=p.fk_cat_id group by(c.cat_name)',$con);
			return $res;
			database::disconnect();
	}
	public function addtocart($pro_id,$email_id)
	{		$con=database::connect();
			$res=mysql_query("select * from order_tbl where fk_pro_id='$pro_id' and fk_email_id='$email_id'",$con);
			return $res;
			database::disconnect();
	}
	public function prodis($cat_id,$id)
	{		$con=database::connect();
			$res=mysql_query("select * from pro_tbl where fk_cat_id='$cat_id' and pro_id!='$id'",$con);
			return $res;
			database::disconnect();
	}
	public function cartdel($order_id)
	{		$con=database::connect();
			$res=mysql_query("delete  from order_tbl where order_id='$order_id'",$con);
			return $res;
			database::disconnect();
	}
	public function wishdis($order_id)
	{		$con=database::connect();
			$res=mysql_query("select *from order_tbl where order_id='$order_id'",$con);
			return $res;
			database::disconnect();
	}
	public function updatewish($order_id)
	{		$con=database::connect();
			$res=mysql_query("update order_tbl set flag='cart' where order_id='$order_id'",$con);
			return $res;
			database::disconnect();
	}
	public function payment($flag,$pro_id,$email_id)
	{		$con=database::connect();
			$res=mysql_query("update order_tbl set flag='$flag' where fk_pro_id='$pro_id' and fk_email_id='$email_id'",$con);
			return $res;
			database::disconnect();
	}
	public function login($email,$pwd)
	{		$con=database::connect();
			$res=mysql_query("select * from user_tbl where pk_email_id='$email' and user_password='$pwd'",$con);
			return $res;
			database::disconnect();
	}
	public function catedit($name,$id)
	{		$con=database::connect();
			$res=mysql_query("update cat_tbl set cat_name='$name' where cat_id='$id'",$con);
			return $res;
			database::disconnect();
	}
	public function userdis($type)
	{		$con=database::connect();
			$res=mysql_query("select * from user_tbl where type='User'",$con);
			return $res;
			database::disconnect();
	}
	public function proins($str,$name,$price,$soh,$mfg,$warrenty,$color,$detail,$catid)
	{		$con=database::connect();
			$res=mysql_query("insert into pro_tbl values(Null,'$str','$name','$price','$soh','$mfg','$warrenty','$color','$detail','$catid')",$con);
			return $res;
			database::disconnect();
	}
	public function proedit1($photo,$name,$price,$soh,$mfg,$warrenty,$detail,$color,$catid,$id)
	{		$con=database::connect();
			$res=mysql_query("update pro_tbl set pro_photo='$photo',pro_name='$name',pro_price='$price',pro_soh='$soh',pro_mfg='$mfg',pro_warrenty='$warrenty',pro_detail='$detail',pro_color='$color',fk_cat_id='$catid' where pro_id='$id'",$con);
			return $res;
			database::disconnect();
	}

	public function catdel($id)
	{		$con=database::connect();
			$res=mysql_query("delete from cat_tbl where cat_id='$id'",$con);
			return $res;
			database::disconnect();
	}
	public function catdis()
	{		$con=database::connect();
			$res=mysql_query("select * from cat_tbl",$con);
			return $res;
			database::disconnect();
	}
	public function catedit1($id)
	{		$con=database::connect();
			$res=mysql_query("select * from cat_tbl where cat_id='$id'",$con);
			return $res;
			database::disconnect();
	}
	public function changepwd($email,$new)
	{		$con=database::connect();
			$res=mysql_query("update user_tbl set user_password='$new'where pk_email_id='$email' ",$con);
			return $res;
			database::disconnect();
	}
	public function signup($email,$pwd,$name,$mobile,$gender,$type,$code)
	{		$con=database::connect();
			$res=mysql_query("insert into user_tbl values('$email','$name','$mobile','$gender','$pwd',Null,'$type','$code','false')",$con);
			return $res;
			database::disconnect();
	}
	public function orderadd($price,$date,$pro_id,$email_id,$qty,$flag)
	{		$con=database::connect();
			$res=mysql_query("insert into order_tbl values(Null,'$price','$date','$pro_id','$email_id','$qty',
		'$flag')",$con);
			return $res;
			database::disconnect();
	}
	public static function disconnect()
	{
		mysql_close(self::$con);
		self::$con=NULL;
	}
}

?>


