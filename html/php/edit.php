<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../css/style_php4.css">
<title>게시판</title>


</head>

<body>
<header class="header"> 
        <Div class="header-main">
        <div class="main_header">
            <div class="main_header_img">
                <a href="index.html">
                    <img src="../img/1.png" alt="로고이미지" >
                </a>
            </div>
        </div>
        <div class="main_nav">
            <Div class="main_nav_ul">
                <ul class="main_nav">
                    <li class="nav1"><a href="root/progress.html">진행도</a></li>
                    <li class="nav2"><a href="root/explanation.html">작품설명</a></li>
                    <li class="nav3"><a href="root/monitoring.html">모니터링</a></li>
                    <li class="nav4"><a href="root/freeboard.html">자유게시판</a></li>
                    <li class="nav5"><a href="root/questionboard.html">질문게시판</a></li>
                </ul>
            </Div>
        </div>
    </div>>
        
    </header>

    <div class="hspan">
            글 수 정 하 기
        </div>
<!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
<form action=update.php?id=<?=$_GET['id']?> method=post>
    
   
<?
    //데이터 베이스 연결하기
    include "db_info.php";
    $id = $_GET['id'];
    $no = $_GET['no'];

    // 먼저 쓴 글의 정보를 가져온다.
    $result=mysqli_query($conn,"SELECT * FROM content WHERE id=$id");
    $row=mysqli_fetch_array($result);
?>
<!-- 입력 부분 -->

        <table class="table-content">
            <tr>
                <th>이름</th>
                <td >
                    <INPUT type=text name=name 
                    value="<?=$row['name']?>">
                </td>
            </tr>
            <tr>
                <th >이메일</th>
                <td>
                    <INPUT type=text name=email 
                    value="<?=$row['email']?>">
                </td>
            </tr>
            <tr>
                <th>비밀번호</th>
                <td >
                    <INPUT type=password name=password >
                    (비밀번호가 맞아야 수정가능)
                </td>
            </tr>
            <tr>
                <th colspan="2">제 목</th>
</tr>
<tr>
                <td colspan="2">
                    <INPUT type=text name=title size=60
                    value="<?=$row['title']?>">
                </td>
            </tr>
            <tr>
                <th colspan="2">내용</th>
</tr>
<Tr>
                <td colspan="2">
                    <TEXTAREA name=content class="contenttext" rows=15><?=$row['content']?></TEXTAREA>
                </td>
            </tr>
            
            <Table class="table2">
            <tr class="write">
                <td>
                    <INPUT type=submit value="글 저장하기">
                    &nbsp;&nbsp;
                    <INPUT type=reset value="다시 쓰기">
                    &nbsp;&nbsp;
                    <INPUT type=button value="되돌아가기"
                    onclick="history.back(-1)">
                </td>
            </tr>
            </table>
            </TABLE>
    
<!-- 입력 부분 끝 -->
</table>
</form>

</body>
</html>
