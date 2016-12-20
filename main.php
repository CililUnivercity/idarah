<?php
	session_start();
	require_once("connect.php");

	if(!isset($_SESSION['UserID']))
	{
		echo "Please Login!";
                header("location:index.php");
		exit();
	}
	
	//*** Update Last Stay in Login System
	$sql = "UPDATE user SET LastUpdate = NOW() WHERE u_id = '".$_SESSION["UserID"]."' ";
	$query = mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JISDA || Jamiah islam syaikh daut al-fathani</title>
    <link rel="icon" href="icon/favicon.png" sizes="16x16" type="image/png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Pagination -->
    <link rel="stylesheet" href="pagination/reset.css" type="text/css">
    <link rel="stylesheet" href="pagination/style.css" type="text/css">
    <link rel="stylesheet" href="function/checkuser.css" type="text/css">
    <link rel="stylesheet" href="select/dist/css/bootstrap-select.css">
    <link href="font/font.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        body{ font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}
        div#pagination_controls{font-size:21px;}
        div#pagination_controls > a{ color:#06F; }
        div#pagination_controls > a:visited{ color:#06F; }
    </style>
    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="ajax/framework.js"></script>
    <script type="text/javascript" src="ajax/control.js"></script>
    <style type="text/css">
        .img
            { background:#ffffff;
            padding:12px;
            border:1px solid #999999; }
        .shiva{
         -moz-user-select: none;
            background: #2A49A5;
            border: 1px solid #082783;
            box-shadow: 0 1px #4C6BC7 inset;
            color: white;
            padding: 3px 5px;
            text-decoration: none;
            text-shadow: 0 -1px 0 #082783;
            font: 12px Verdana, sans-serif;}
        </style>

  </head>
    <body> 
        
        <?php include("menu/indexMenu.php"); ?>
        <br><br><br>
        
        <div class="col-md-3">
             <?php include("menu/sidebarMenu.php"); ?>
        </div>
        
        <div class="col-md-9">
        
           <?php 
                        include("connect.php");
                        
                        $page = $_GET['page']; // To get the page

                        switch ($page) {

                            case 'main':
                                include 'module/index.php';
                                break;
                            case 'user':
                                include 'module/user/index.php';
                                break;
                            case 'profile':
                                include 'module/profile/index.php';
                                break;
                            case 'student':
                                include 'module/student/index.php';
                                break;
                            case 'student&&ajax':
                                include 'content/student/master.php';
                                break;
                            case 'register':
                                include 'module/register/index.php';
                                break;
                            case 'payment':
                                include 'content/payment/index.php';
                                break;
                            case 'report':
                                include 'module/report/index.php';
                                break;
                            case 'activity':
                                include 'module/activity/index.php';
                                break;
                            case 'calendar':
                                include 'module/calendar/index.php';
                                break;
                            case 'setting':
                                include 'module/setting/index.php';
                                break;
                            case 'post':
                                include 'module/post/index.php';
                                break;
                            case 'rs':
                                include 'module/special/index.php';
                                break;
                            case 'dol':
                                include 'module/dol/index.php';
                                break;
                            case 'transcript':
                                include 'module/transcript/index.php';
                                break;
                            case 'admissions':
                                include 'module/admission/index.php';
                                break;
                            case 'proof':
                                include 'content/proof/index.php';
                                break;
                            case 'attendance':
                                include 'content/attendance/index.php';
                                break;
                            case 'mustawa':
                                include 'content/mustawa/index.php';
                                break;
                        }
            ?>
         
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="function/checkuser.js"></script>
        <script type="text/javascript" src="function/checkstudent.js"></script>
        <script type="text/javascript" src="function/checkteacher.js"></script>
        <script type="text/javascript" src="function/all.js"></script>
        <script src="select/dist/js/bootstrap-select.js"></script>
        <script language="javascript">
            function printdiv(printpage)
            {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr+newstr+footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
            }
        </script>
        <script type="text/javascript">
		tinymce.init({
		selector: "textarea",
		theme: "modern",
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		toolbar2: "print preview media | forecolor backcolor emoticons",
		image_advtab: true,
		templates: [
			{title: 'Test template 1', content: 'Test 1'},
			{title: 'Test template 2', content: 'Test 2'}
		]
	});
	</script>
        <script type="text/javascript" src="webcam.js"></script>
    </body>
</html>
<?
	mysqli_close($con);
?>
