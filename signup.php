<?header("Content-Type:text/html; charset=utf-8");

//mysql 데이터베이스 등록하기

$name=$_POST[name];
$id=$_POST[id];
$password=$_POST[password];
/*
$mobilechk = '/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/i'; 

 // 모바일 접속인지 PC로 접속했는지 체크합니다.
 if(preg_match($mobilechk, $_SERVER['HTTP_USER_AGENT'])) {
    echo 'You are using Mobile.'; 
 } else { 
    echo 'You are using PC .'; 
 } 

*/
$connect=mysqli_connect("localhost","dlaak0630","tkdals12");

 

if(!$connect){
	 echo "연결에 실패 하였습니다.". mysqli_error();
 }
mysqli_set_charset($connect,"utf8");  

mysqli_select_db($connect,"dlaak0630");

$query="select *from members where id='$id' or name='$name'";

//$result=mysqli_query($connect,$query);
$check=mysqli_fetch_array(mysqli_query($connect,$query));


if(isset($check)){
	echo "username is alreasy exist";
}
else{
$query="insert into members(name,id,password)
					values('$name','$id','$password')";
	mysqli_query($connect,$query);
		echo "successfull";
}


mysqli_close($connect);






//$res=mysqli_query($connect,"select shop,point,text from board");

//$result=array();

//echo "{\"result\":[";

//while($row=mysqli_fetch_array($res)){



	//echo '[shop] : '.$row['shop'];
//	echo '  [point] : '.$row['point'];
	//echo '  [text] : '.$row['text'];
	//array_push($result,
	//	array('shop'=>$row[0],'point'=>$row[1],'text'=>$row[2]
	//	));

//	echo "{\"shop\":\"$row[shop]\",\"point\":\"$row[point]\",\"text\":\"$row[text]\"},";

//}
//echo "]}";
//echo json_encode(array("result"=>$result));





 ?>

