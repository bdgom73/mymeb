<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../css/phpcss/style_php4.css">
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

<div>
    <div class="hspan">글쓰기</div>
<!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
<form action=insert.php method=post>
<table class="table-content">
    
    <!-- 입력 부분 -->
           
            <tr>
                <th class="name_con">이름</th>
                <td>
                    <INPUT type="text" name="name"  maxlength=10>
                </td>
            </tr>
            <tr>
                <th>이메일</th>
                <td>
                    <INPUT type=text name="email" maxlength=25>
                </td>
            </tr>
            <tr>
                <th >비밀번호</th>
                <td>
                    <INPUT type=password name="password"  maxlength=20>
                    (수정,삭제시 반드시 필요)
                </td>
            </tr>
           
            <tr>
                <th colspan="2">제목</th>
            </tr>
            <Tr>
                <td colspan="2">
                    <INPUT type="text" name="title"  maxlength=60>
                </td>
            </tr>
            <style>
                .contenttext{
                    resize: none; 
                }
            </style>
            <tr>
                <th colspan="2">내용</th>
            </tr>
            <Tr class="d">
                
                <td colspan="2">
                    <TEXTAREA class="contenttext" name="content" cols="100%" rows=15></TEXTAREA>
                </td>
            
            </tr>
            

            <table class="table2">
            <tr>
                <th class="write">
                    
                        <INPUT type="submit" value="저장하기" >
                    
                    
                        <INPUT type="reset" value="전체지우기" >

                        <INPUT type="button" onclick="history.back(-1)" value=" 뒤로가기"> 
                       <!--버튼이 클릭되었을때 발생하는 이벤트로 자바스크립트를 실행함. 이렇게 하면 바로 이전페이지로 감-->

                </th>
            </tr>
            </table>
            </table>

<!-- 입력 부분 끝 -->

</form>
            </div>
</body>
</html>
