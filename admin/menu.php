<!DOCTYPE>
<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}
?>

<html>
		<head>
			<title> Admin IMK</title>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="../css/admin.css">
			<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
			<script src="../js/jquery-1.11.3.js"></script>
			<script src="../js/jquery.dataTables.min.js"></script>
			<script src="../js/bootstrap.js"></script>
			<meta name="viewport" content="width=device-width, initial-scale=1">
		</head>
<body style="background-color : #f5f5f5;">
		<div id="wrapper">
			<div id="sidebar-wrapper">
					<div class="btn-toogle">
					<div class="kiri"></div>
					<div class="kanan"><a href="#" id="menu-toggle"><img src="../img/toggle.png" ></a></div>
			</div>
			<img class = "img_user" src="../img/profile.png">
			<div class="user_id">
					<h3>User ID : <?php echo $_SESSION['username']; ?> </h3> 
			</div>
			<ul class="sidebar-nav">
				<li><a href="index.php">&nbsp  <span class="glyphicon glyphicon-home"></span>&nbsp  Dashboard </a></li>
				<li><a href="menu.php">&nbsp  <span class="glyphicon glyphicon-briefcase"></span>&nbsp  Menu</a></li>
				<li><a href="report.php"> &nbsp <span class="glyphicon glyphicon-book"></span>&nbsp  Report</a></li>
			</ul>
			</div>
		<div id="main-content">
			<div  class="container-fluid main" >
					<nav  class="nav-top">
							<a href="logout.php" class="btn btn-danger button-logout" >LOG OUT</a>
							<h5 class="welcome"></h5>	
					</nav>
					<?php include "menu_view.php" ?>
			</div>
		</div>
</div>
<script>
//java script buat nav side 
 $("#menu-toggle").click( function (e){
  e.preventDefault();
  $("#wrapper").toggleClass("menuDisplayed");
  });

 function preview_image_logo(){
     $('#image_preview > img').replaceWith("<img src='"+URL.createObjectURL(event.target.files[0])+"' class='img-upload'><br>");
  }


$(document).ready(function(){
    $('#myTable').DataTable();
    $('input[aria-controls="myTable"]').addClass("search-table");
    $('select[aria-controls="myTable"]').addClass("search-table");
});

$(document).ready(function () {
$(".edit").click(function(e) {
	console.log("hello");
var m = $(this).attr("id");
console.log(m);
$.ajax({
     url: "menu_edit.php",
     type: "GET",
     data : {id: m},
     success: function (ajaxData){
       $("#ModalEdit").html(ajaxData);
       $("#ModalEdit").modal('show',{backdrop: 'true'});
     }
   });
});
});

  function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }


</script>
</body>
</html>