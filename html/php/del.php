<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='Refresh' content='1; URL=list.php'>
</head>
<?php
//데이터 베이스 연결하기
include "db_info.php";
$id = $_GET['id'];
$pass = $_POST['password'];

$result=mysqli_query($conn,"SELECT password FROM content WHERE id=$id");
$row=mysqli_fetch_array($result);

if ($pass==$row['password'] )//비밀번호 맞는지 확인함.
{
    $query = "DELETE FROM content WHERE id=$id "; //데이터 삭제하는 쿼리문
    $result=mysqli_query($conn,$query);
}
else
{
    echo ("
    <script>
    alert('비밀번호가 틀립니다.');
    history.go(-1);
    </script>
    ");
    exit;
}
?>
<body>
<div class="content">성공적으로 삭제되었습니다.</div>
<Style>
    .content{
        font-size:30px;
        text-align:center;
        color:white;
        
    }
    body{
        background-color:#2d2d2d;
    }
</style>
</body>
</html>

