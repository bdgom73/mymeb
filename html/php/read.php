<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../css/phpcss/style_php3.css">
<title>게시판</title>

</head>

<body >
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

<BR>
<?php
    //데이터 베이스 연결하기
    include "db_info.php";

    $id = $_GET['id'];
    $no = $_GET['no'];
    // 글 정보 가져오기
    $result=mysqli_query( $conn ,"SELECT * FROM content WHERE id=$id");
    $row=mysqli_fetch_array($result);
?>

<Div>
<table class="table-content">
<tr>
    <th colspan=4 class="title_con">
        <?=$row['title']?>
    </th>
</tr>
<tr>
    <th colspan=1 class="write_con">글쓴이</th>
    <th  colspan=3><?=$row['name']?></th>
</tr>
<tr>
    <th colspan=1 class="email_con">이메일</th>
    <th colspan=3><?=$row['email']?></th>
</tr>
<tr>
    <th class="date_con">
    날짜
    </th>
    <th>
        <?=$row['wdate']?>
    </th>
    <th class="no_con">조회수</th>
    <th ><?=$row['view']?></th>
</tr>

<tr>
    <td colspan=4 class="pre_con">
   
    <pre><?=$row['content']?></pre>
    
    </td>
</tr>
<!-- 기타 버튼 들 -->

    
    <table class="table2">
        <tr>
            <th class="write">
                <Button>
                    <a href=list.php?no="<?=$no?>">
                    목록보기</a>
                </Button>
                <Button>
                <a href=write.php>
                글쓰기</a>
                </Button>
                <Button>
                <a href=edit.php?id="<?=$id?>">
                수정</a>
                </Button>
                <Button>
                <a href=predel.php?id="<?=$id?>">
               삭제</a>
               </Button>
            </th>
            <!-- 기타 버튼 끝 -->
            <!-- 이전 다음 표시 -->
        <td>
<?
    // 현재 글보다 id 값이 큰 글 중 가장 작은 것을 가져온다. 삭제됬을때를 생각해서 이렇게 구현함
    // 즉 바로 이전 글 ORDER BY id ASC가 함축됨 즉 오름차순으로 정렬되있음
    $query=mysqli_query($conn,"SELECT id FROM content WHERE id > $id LIMIT 1");
    $prev_id=mysqli_fetch_array($query);

    if ($prev_id['id']) // 이전 글이 있을 경우
    {
        echo ("<a href=read.php?id=$prev_id[id]><div class='write'><button>이전</button></div></a>");
    }
    else
    {
        echo "<div class='write'><button>이전</button></div>";
    }
?>
</td>
<td>
<?php
    //내림차순으로 정렬하고 작은 것 한개 가져옴
    $query=mysqli_query($conn,"SELECT id FROM content WHERE id <$id
    ORDER BY id DESC LIMIT 1");
    $next_id=mysqli_fetch_array($query);

    if ($next_id['id'])
    {
        echo "<a href=read.php?id=$next_id[id]>
        <div class='write'><button>다음</button></div></a>";
    }
    else
    {
        echo "<div class='write'><button>다음</button></div>";
    }
?>
            </td>
        </tr>
    </table>
    </b>
    </td>
</tr>
</table>

</Div>
<p><b>댓글기능은 현재 추가중입니다.</b></p>

</body>
</html>

<?
    // 조회수 업데이트
    $result=mysqli_query($conn,"UPDATE content SET view=view+1 WHERE id=$id");

    mysqli_close($conn);
?>
