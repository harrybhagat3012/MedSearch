
<?php
$obj=new mysqli("localhost","root","","medical");
session_start();
if (!isset($_SESSION['userid']))
 {
	header('location:index.php');
}

$uid = $_SESSION["userid"];
$admin =$obj->query("select * from admin where id='$uid'");

$slot=$obj->query("SELECT customer.fname, customer.lname, customer.contact,showroom_bookslot.* FROM customer INNER JOIN 
showroom_bookslot on customer.id = showroom_bookslot.customer_id where showroom_bookslot.showroom_id='$uid'");

$raw =$admin->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from appstack.bootlab.io/dashboard-saas.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Aug 2021 05:07:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Express Shopping</title>

	<link rel="canonical" href="dashboard-saas.html" />
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

			<div class="content-top">
			
			
			<div style="height: 300px; border: 1px solid #d95459; border-radius: 10px;margin: 30px;">
				<h2 align="center" style="position: relative;top:120px;"> Welcome to Medical Search Web Application</h2>
				<p style="position: relative;left: 650px;top:134px;" class="text-danger">( Medical Panel )</p>
			</div>
		<div class="clearfix"> </div>
		</div>

			<?php include'common/footer.php';?>
		</div>
	</div>

	<script src="js/app.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [37.77, -122.41],
					name: "San Francisco: 375"
				},
				{
					coords: [40.71, -74.00],
					name: "New York: 350"
				},
				{
					coords: [39.09, -94.57],
					name: "Kansas City: 250"
				},
				{
					coords: [36.16, -115.13],
					name: "Las Vegas: 275"
				},
				{
					coords: [32.77, -96.79],
					name: "Dallas: 225"
				}
			];
			var map = new jsVectorMap({
				map: "us_aea_en",
				selector: "#usa_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						stroke: window.theme.white,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				regionStyle: {
					initial: {
						fill: window.theme["gray-200"]
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
			setTimeout(function() {
				map.updateSize();
			}, 250);
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			$("#datatables-dashboard-products").DataTable({
				pageLength: 6,
				lengthChange: false,
				bFilter: false,
				autoWidth: false
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Last year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .325,
						categoryPercentage: .5
					}, {
						label: "This year",
						backgroundColor: window.theme["primary-light"],
						borderColor: window.theme["primary-light"],
						hoverBackgroundColor: window.theme["primary-light"],
						hoverBorderColor: window.theme["primary-light"],
						data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
						barPercentage: .325,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					cornerRadius: 15,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							},
							stacked: true,
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							},
							stacked: true,
						}]
					}
				}
			});
		});
	</script>

</body>


<!-- Mirrored from appstack.bootlab.io/dashboard-saas.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 08 Aug 2021 05:07:22 GMT -->
</html>