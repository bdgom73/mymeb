<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?
    //데이터 베이스 연결하기
    include "db_info.php";
	
    $id = $_GET['id'];
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // 글의 비밀번호를 가져온다.
    $query = "SELECT password FROM content WHERE id=$id";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);

    //입력된 값과 비교한다.
    if ($pass==$row['password']) { //비밀번호가 일치하는 경우
        $query = "UPDATE content SET name='$name', email='$email',
        title='$title', content='$content' WHERE id=$id";//업데이트 쿼리문
        $result=mysqli_query($conn, $query);
    }
    else { // 비밀번호가 일치하지 않는 경우
        echo ("
        <script>
        alert('비밀번호가 틀립니다.');
        history.go(-1);
        </script>
        ");
        exit;//반드시 exit를 써줘야됨. 안그러면 아래의 코드가 실행이됨.
    }

    //데이터베이스와의 연결 종료
    mysqli_close($conn);

    //수정하기인 경우 수정된 글로..
    echo ("<meta http-equiv='Refresh' content='1;
    URL=read.php?id=$id'>");
?>


<body>

<style>
     body{
        background-color:#2d2d2d;
    }
</style>
<center>
<div class="next">
<font size=2>정상적으로 수정되었습니다.</font>
</div>
</center>
</body>
</html>
