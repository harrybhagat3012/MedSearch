<?php
$obj  =new mysqli("localhost","root","","medical");
session_start();

if (!isset($_SESSION['userid']))
 {
	header('location:index.php');
}

$result=$obj->query("select * from showroom");



?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from appstack.bootlab.io/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Aug 2021 05:07:27 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Express Shopping</title>

	<link rel="canonical" href="tables-bootstrap.html" />
	<link rel="shortcut icon" href="img/favicon.ico">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<link href="css/light.css" rel="stylesheet">
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
	<link class="js-stylesheet" href="css/light.css" rel="stylesheet">
	<script src="js/settings.js"></script>
	<!-- END SETTINGS -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2120269,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script><script async src="https://www.googletagmanager.com/gtag/js?id=G-Q3ZYEKLQ68"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Q3ZYEKLQ68');
</script></head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
		
<?php include'common/sidebar.php';?>
		<div class="main">
			<?php include'common/header.php';?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">View Medical</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Medical</h5>
									<h6 class="card-subtitle text-muted">Check CareFully </h6>
								</div>
								<table class="table">
									<thead>
										<tr>
											<th style="width:10%;">Medical ID</th>
											<th style="width:10%">Name</th>
											<th style="width:9%">Email</th>
											<th style="width:12%">Contact</th>
											<th style="width:15%">Address</th>
											<th style="width:18%">State</th>
											<th style="width:18%">City</th>
											<th style="width:50%">Area</th>
											<th style="width:50%">Owner Name</th>
											<th style="width:50%">Image</th>
											<th style="width:50%">Reg Date</th>
											<th style="width:50%">Status</th>
											<th style="width:15%">Delete</th>
											<th style="width:15%">Edit</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										while($row=$result->fetch_object())
										{
											
										
											$sta=$obj->query("select * from state where s_id='$row->state_id'");
											$state=$sta->fetch_object();

							 				$ci=$obj->query("select * from city where c_id='$row->city_id'");
											$city=$ci->fetch_object();

											$ar=$obj->query("select * from area where a_id='$row->area_id'");
											$area=$ar->fetch_object();
                                          ?>
                                          <tr>
												<td><?php echo $row->shop_id;?></td>
											    <td><?php echo $row->name;?></td>
											    <td><?php echo $row->email;?></td>
											    <td><?php echo $row->contact;?></td>
											    <td><?php echo $row->address;?></td>
											    <td><?php echo $state->s_name;?></td>
											    <td><?php echo $city->city;?></td>
											    <td><?php echo $area->area_name;?></td>
											    <td><?php echo $row->owner_name;?></td>
											    <td><img src="../showroom/img/Product/<?php echo "$row->image" ?>"  height="90" width="90"></td>
											    <td><?php echo $row->reg_date;?></td>
											    <td><span class="badge bg-success"><?php echo $row->status;?></td>
                                                <td><a href="shodel.php?sdelid=<?php echo "$row->shop_id"?>">Delete</a></td>
	                                             <td><a href="shou.php?supdid=<?php echo "$row->shop_id"?>">Update</a></td>
	                                         </tr>
                                          <?php
										}
										?>
										</tbody>
								</table>
							</div>
						</div>

						
			</main>

			<?php include'common/footer.php';?>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>


<!-- Mirrored from appstack.bootlab.io/tables-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Aug 2021 05:07:27 GMT -->
</html>