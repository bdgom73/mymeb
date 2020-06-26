<!DOCTYPE html>
<html lang="ko">
<head>
<?php
//데이터베이스 연결하기
include "db_info.php";



$page_size = 10;
$page_list_size = 10;

if (!$no || $no < 0) $no=0;

$query = "select id,name,email,title,DATE_FORMAT(wdate,'%Y-%m-%d') as date,view 
          from content order by id desc limit $no,$page_size";
$result = mysqli_query($conn, $query);

// 총 게시물 수 구하기
$result_count = mysqli_query($conn,"select count(*) from content");
$result_row = mysqli_fetch_row($result_count);
$total_row = $result_row[0];

// 총 페이지 계산
if ($total_row <= 0) $total_row = 0;    // 총 게시물의 값이 없으면 기본값으로 세팅

$total_page = floor(($total_row - 1) / $page_size);

// 현재 페이지 계산
$current_page = floor($no/$page_size);
?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/phpcss/style_php.css">


    <title>게시판</title>
</head>
<body>

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

    <main>
        <div class="main-notice">
                <h1><span>&lt;공지&gt;</span>게시판 이용방법</h1>
                <p>
                    간단한 테스트용 게시판입니다.<br/>
                    게시판 작성시 비밀번호를 필히 입력해주세요.<br/>
                    (수정 및 삭제시 비밀번호가 필요합니다.)
                </p>
        </div>


		        <main class="borad">
                    <!-- 게시판 타이틀 -->
                    <div class="hspan">자유 게시판</div> </a>
                    
                    
                    <!-- 게시물 리스트를 보이기 위한 테이블 -->
                    <table class="table-notice">
                    <!-- 리스트 타이틀 부분 -->
                    <tr class="table-notice-tr1" >
                        <th class="id_td">
                            번호
                        </th >
                        <th>
                            제 목
                        </th>
                        <th class="user_td">
                           글쓴이
                        </th>
                        <th class="date_td">
                            날 짜
                        </th>
                        <th class="no_td">
                           조회수
                        </th>
                    </tr>
                    <!-- 리스트 타이틀 끝 -->

                    <!-- 리스트 부분 시작 -->
                    <?php
                    while($row=mysqli_fetch_array($result))
                    {

                    ?>
                    <!-- 행 시작 -->
                    <tr class="table-notice-tr2">
                        <?
                            $boardtime = $row['date']; //$boardtime변수에 board['date']값을 넣음
                            $timenow = date('Y-m-d'); //$timenow변수에 현재 시간 Y-M-D를 넣음
                
                             if($boardtime==$timenow){
                                 $img = "<img src='../img/new.png' alt='new' title='new' >";
                            }else{
                                 $img ="";
                             }  ?>
                        <!-- 번호 -->
                        <td>
                             <a href=read.php?id=<?=$row['id']?>&no=<?=$no?>><?=$row['id']?></a>
                           
                        </td>
                        <!-- 번호 끝 -->
                        <!-- 제목 -->
                        <td  class="title_td">
                        <a href=read.php?id=<?=$row['id']?>&no=<?=$no?>><?=strip_tags($row['title'], 
                            '<b><i>');?><? echo $img;?></a>
                        </td>
                        <!-- 제목 끝 -->
                        <!-- 이름 -->
                        <td>
                           
                                <a href="mailto:<?=$row['email']?>"><?=$row['name']?></a>
                           
                        </td>
                        <!-- 이름 끝 -->
                        <!-- 날짜 -->
                       <td>
                            <?=$row['date']?>
                        </td>
                        <!-- 날짜 끝 -->
                        <!-- 조회수 -->
                        <td>
                            <?=$row['view']?>
                        </td>
                        <!-- 조회수 끝 -->
                    </tr>
                    <!-- 행 끝 -->

                    <?php
                    }    // end while

                    mysqli_close($conn);
                    ?>
                    </table>

                    <table class="table2">
                    <tr>
                    <td rowspan=4>
                   
                    &nbsp;

                    <?php

                    // 페이지 리스트
                    // 페이지 리스트의 첫번째로 표시될 페이지가 몇번째 페이지인지 구하는 부분
                    $start_page = (int)($current_page / $page_list_size) * $page_list_size;

                    // 페이지 리스트의 마지막 페이지가 몇번째 페이지인지 구하는 부분
                    $end_page = $start_page + $page_list_size - 1;
                    if ($total_page < $end_page) $end_page = $total_page;

                    // 이전 페이지 리스트 보여주기
                    if ($start_page >= $page_list_size){
                        $prev_list = ($start_page - 1) * $page_size ;
                        echo ("<a href=\'$PHP_SELF?no=$prev_list\'>◀</a>\n");
                    }

                    // 페이지 리스트를 출력
                    for ($i=$start_page; $i <= $end_page; $i++) {

                    $page = $page_size * $i;    // 페이지 값을 no 값으로 변환
                    $page_num = $i + 1;    // 실제 페이지 값이 0부터 시작하므로 표시할때는 1을 더해준다.

                        if ($no != $page) {
                            echo ("<a href=\"PHP_SELF?no=$page\">");
                        }

                        echo " $page_num";    //페이지를 표시

                        if ($no != $page) {
                            echo "</a>";
                        }

                    if ($total_page > $end_page)
                    {
                        // 다음 페이지 리스트는 마지막 리스트 페이지보다 한 페이지 증가하면 된다.
                        $next_list = ($end_page + 1) * $page_size;
                        echo ("<a href=$PHP_SELF?no=$next_list>▶ </a><p>");
                    }
                    }
                    ?>

                   
                    </td>
                    </tr>
                    </table>
                    <Div class="write">
                    <button>
                    <a href="write.php" class="write-go">글쓰기</a>
                     </div>
                     </button>
                            </div> 
                    </main>         
    
</body>
</html>