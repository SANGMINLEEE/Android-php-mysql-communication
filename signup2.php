<?header("content-tyep:text/html; charset=UTF-8");

//mysql 데이터베이스 등록하기

$name=$_POST[name];
$id=$_POST[id];
$password=$_POST[password];

/*
$memo= $_POST[memo];

echo $regdate=date("YmdHis",time());
$ip=getenv("REMOTE_ADDR");


 $connect=mysql_connect("localhost","dlaak0630","tkdals12"); //연결
 mysql_select_db("dlaak0630",$connect); //db선택




$query="insert into bbs_1(id, user_id, name, pw, memo, regdate, ip) 
					values('$id' ,'$user_id', '$name', '$pw','$memo','$regdate','$ip')";
					*/

$mobilechk = '/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/i'; 

 // 모바일 접속인지 PC로 접속했는지 체크합니다.
 if(preg_match($mobilechk, $_SERVER['HTTP_USER_AGENT'])) {
    echo 'You are using Mobile.'; 
 } else { 
    echo 'You are using PC .'; 
 } 



$connect=mysql_connect("localhost","dlaak0630","tkdals12");
mysql_select_db("dlaak0630",$connect); 


if(!$connect){
	 echo "연결에 실패 하였습니다.". mysql_error();
 }


$query="insert into Members(name,id,password)
					values('$name','$id','$password')";


mysql_query("set names utf8",$connect);
mysql_query($query,$connect);

mysql_close;


echo "
<html>
<head>
<title>
USERNAME, USERID, PASSWORD IS SAVED IN DB
</title>
</head>
<body>
<br>
IF YOU WANT TO GO BACK<br>
CLICK HERE<br>
<button type='button' '>click here</button>


</body>
</html>
"
 ?>

