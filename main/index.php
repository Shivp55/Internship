<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
  <?php
  require_once "../includes/config.php";
  if (!isset($_SESSION['login_id']) && $_SESSION['login_id'] == "") {
    header("Location: http://localhost/banking/main/login.php");
    exit(0);
  }
  $ad_obj = new Admin;

  $mon = "Apr";
  $ad_obj->TOTAL_INVOICES_FOR_MONTH($mon);
  // echo $ad_data1 = $ad_obj->GET_ALL_ADMIN();

  // echo $amnt = $ad_data2->amount;

  $update = $ad_obj->GET_UPDATES();

  ?>

  <title>Glance Design Dashboard an Admin Panel Category Flat Bootstrap Responsive Website Template | Home ::
    w3layouts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/dist/css/adminlte.min.css">

  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>


  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

  <!-- Custom CSS -->
  <link href="css/style.css" rel='stylesheet' type='text/css' />

  <!-- font-awesome icons CSS -->
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- //font-awesome icons CSS-->

  <!-- side nav css file -->
  <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css' />
  <!-- //side nav css file -->

  <!-- js-->
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/modernizr.custom.js"></script>

  <!--webfonts-->
  <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
  <!--//webfonts-->

  <!-- chart -->
  <script src="js/Chart.js"></script>
  <!-- //chart -->

  <!-- Metis Menu -->
  <script src="js/metisMenu.min.js"></script>
  <script src="js/custom.js"></script>
  <link href="css/custom.css" rel="stylesheet">
  <!--//Metis Menu -->
  <style>
    #chartdiv {
      width: 90%;
      height: 295px;
    }
  </style>
  <!-- //pie-chart -->
  <!-- Google Api Chart -->

  <!-- highchart table -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highchartTable/2.0.0/jquery.highchartTable.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <!--  -->

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
  </script>
  <?php $date = date('m'); ?>
  <script type="text/javascript">
    google.charts.load('current', {
      packages: ['corechart']
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Monthly Sales', 'Q1_Sales', 'Q2_Sales', 'Q3_Sales', 'Q4_Sales'],
        ['Reviews', 40, 50, 60, 55],
        ['Total Users', 50, 55, 45, 60]
      ]);

      var options = {
        title: "Product Sales",
        legend: "bottom",
        hAxis: {
          title: "Sales"
        },
        vAxis: {
          title: "Perspectives"
        },
        animation: {
          startup: true,
          duration: 5000,
          easing: 'inAndOut'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById("googlechart"));
      chart.draw(data, options);
    }
  </script>


  <!--pie-chart --><!-- index page sales reviews visitors pie chart -->
  <script src="js/pie-chart.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#demo-pie-1').pieChart({
        barColor: '#2dde98',
        trackColor: '#eee',
        lineCap: 'round',
        lineWidth: 8,
        onStep: function(from, to, percent) {
          $(this.element).find('.pie-value').text(Math.round(percent) + '%');
        }
      });

      $('#demo-pie-2').pieChart({
        barColor: '#8e43e7',
        trackColor: '#eee',
        lineCap: 'butt',
        lineWidth: 8,
        onStep: function(from, to, percent) {
          $(this.element).find('.pie-value').text(Math.round(percent) + '%');
        }
      });

      $('#demo-pie-3').pieChart({
        barColor: '#ffc168',
        trackColor: '#eee',
        lineCap: 'square',
        lineWidth: 8,
        onStep: function(from, to, percent) {
          $(this.element).find('.pie-value').text(Math.round(percent) + '%');
        }
      });


    });
  </script>
  <!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

  <!-- requried-jsfiles-for owl -->
  <link href="css/owl.carousel.css" rel="stylesheet">
  <script src="js/owl.carousel.js"></script>
  <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        items: 3,
        lazyLoad: true,
        autoPlay: true,
        pagination: true,
        nav: true,
      });
    });
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
  </script>

  <script type="text/javascript">
    google.charts.load('current', {
      packages: ['corechart']
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['product', 'Sales'],
        ['Shoes', 40],
        ['Hats', 50],
        ['Coats', 35],
        ['Scarves', 20]
      ]);
      var options = {
        title: "Product Sales",
        pieHole: 0.4,
        pieStartAngle: 90,
        is3D: true,
        animation: {
          startup: true,
          duration: 3000,
          easing: 'inAndOut'
        }

      };
      var chart = new google.visualization.PieChart(document.getElementById("apichart"));
      chart.draw(data, options);
    }
  </script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
  </script>

  <script type="text/javascript">
    google.charts.load('current', {
      packages: ['corechart']
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
      $.ajax({
        url: '../ajax/admin_ajax.php',
        type: 'POST',
        data: {
          action: 'list'
        },
        success: function(data) {

        }
      });



      var data = google.visualization.arrayToDataTable([
        ['product', 'Invoices', 'Payments'],



        <?php
        $data_obj = new Admin;
        $data = $data_obj->GET_DATA_BY_WEEK_INVOICE();
        foreach ($data as $val) { ?>['<?php echo $val->week_of_month ?>', <?php if ($val->invoice > 0) {
                                                                            echo $val->invoice;
                                                                          } else {
                                                                            echo "0";
                                                                          }  ?>, <?php if ($val->payments > 0) {
                                                                                    echo $val->payments;
                                                                                  } else {
                                                                                    echo "0";
                                                                                  } ?>],
        <?php } ?>
      ]);

      var options = {
        title: "Sales",
        legend: "bottom",
        hAxis: {
          title: "Transaction Type"
        },
        vAxis: {
          title: "Amounts"
        },
        animation: {
          startup: true,
          duration: 2000,
          easing: 'inAndOut'
        }
      };

      var chart = new
      google.visualization.ColumnChart(document.getElementById("chart"));
      chart.draw(data, options);
    }
  </script>

  <style>
    #page-wrapper {
      padding: 1em;
      background-color: #ffff;
    }
  </style>
  <!-- //requried-jsfiles-for owl -->
</head>


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include './top-nav.php';
    include './sidenav.php';
    ?>
    <div class="content-wrapper">
      <!-- Content Wrapper. Contains page content -->
      <br>
      <div id="page-wrapper">
        <!-- <div class="main-page"> -->
        <div class="row">


          <div class="col-md-3 widget ">
            <div class="r3_counter_box">
              <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
              <div class="stats">
                <h5><strong><?php echo $ad_data1 = $ad_obj->GET_TOTAL_BANKS(); ?></strong></h5>
                <span>Total Banks</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 widget ">
            <div class="r3_counter_box">
              <i class="pull-left fa fa-money user2 icon-rounded"></i>
              <div class="stats">
                <h5><strong><?php echo  $ad_data2 = $ad_obj->GET_TOTAL_INVOICES(); ?></strong></h5>
                <span>Total Invoices</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 widget ">
            <div class="r3_counter_box">
              <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
              <div class="stats">
                <h5><strong><?php echo  $ad_data3 = $ad_obj->GET_TOTAL_PAYMENTS(); ?></strong></h5>
                <span>Total Payments</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 widget">
            <div class="r3_counter_box">
              <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
              <div class="stats">
                <h5><strong><?php echo $ad_data = $ad_obj->GET_ALL_SUPPLIERS(); ?></strong></h5>
                <span>Total Suppliers</span>
              </div>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>

        <div class="row-one widgettable">
          <div class="col-md-7 content-top-2 card">
            <div class="agileinfo-cdr">
              <div class="card-header">
                <h3>Weekly Sales</h3>
              </div>

              <div style="width:500px; height: 450px">
                <div id="chart" style="width:650px;height:450px;margin:0"></div>
              </div>


            </div>
          </div>
          <div class="col-md-3 stat">
            <div class="content-top-1">
              <div class="col-md-6 top-content">
                <h5>Sales</h5>
                <label style="font-size:22px;"><i class="fa-sharp fa-solid fa-indian-rupee-sign"></i><?php echo number_format($ad_obj->TOTAL_SALES()); ?></label>
              </div>
              <div class="col-md-6 top-content1">
                <div id="demo-pie-1" class="pie-title-center" data-percent=<?php echo ($ad_data3 = $ad_obj->TOTAL_SALES() * 100) / 1000000 ?>> <span class="pie-value"></span> </div>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="content-top-1">
              <div class="col-md-6 top-content">
                <h5>Total Balance</h5>
                <label style="font-size:22px;"><i class="fa-sharp fa-solid fa-indian-rupee-sign"></i><?php echo  number_format($ad_obj->GET_ALL_BALANCEs()); ?></label>

              </div>
              <div class="col-md-6 top-content1">
                <div id="demo-pie-2" class="pie-title-center" data-percent="<?php echo ($ad_obj->GET_ALL_BALANCEs() / 1000000 * 100) ?><"> <span class="pie-value"></span> </div>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="content-top-1">
              <div class="col-md-6 top-content">
                <h5>Visitors</h5>
                <label>12589+</label>
              </div>
              <div class="col-md-6 top-content1">
                <div id="demo-pie-3" class="pie-title-center" data-percent="90"> <span class="pie-value"></span> </div>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
          <div class="col-md-2 stat">
            <div class="content-top">
              <div class="top-content facebook">
                <a href="#"><i class="fa fa-facebook"></i></a>
              </div>
              <ul class="info">
                <li class="col-md-6"><b>1,296</b>
                  <p>Friends</p>
                </li>
                <li class="col-md-6"><b>647</b>
                  <p>Likes</p>
                </li>
                <div class="clearfix"></div>
              </ul>
            </div>
            <div class="content-top">
              <div class="top-content twitter">
                <a href="#"><i class="fa fa-twitter"></i></a>
              </div>
              <ul class="info">
                <li class="col-md-6"><b>1,997</b>
                  <p>Followers</p>
                </li>
                <li class="col-md-6"><b>389</b>
                  <p>Tweets</p>
                </li>
                <div class="clearfix"></div>
              </ul>
            </div>
            <div class="content-top">
              <div class="top-content google-plus">
                <a href="#"><i class="fa fa-google-plus"></i></a>
              </div>
              <ul class="info">
                <li class="col-md-6"><b>1,216</b>
                  <p>Followers</p>
                </li>
                <li class="col-md-6"><b>321</b>
                  <p>shares</p>
                </li>
                <div class="clearfix"></div>
              </ul>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>

        <div class="charts">
          <div class="col-md-5 charts-grids widget ">
            <div class="card-header">
              <h1>Google API Bar Chart</h1>
            </div>
            <div id="container" style="width: 100%; height:255px;">
              <div id="apichart" style="width:360px;height:100%;margin:0"></div>
            </div>
          </div>
          <div class="col-md-12 charts-grids widget states-mdl">
            <div class="card-header">
              <h1>Google API Bar Chart</h1>
            </div>
            <div id="chartdiv">
              <div id="googlechart" style="width:730px;height:100%;margin:0"></div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>





        <!-- for amcharts js -->
        <!-- <script src="js/amcharts.js"></script>
          <script src="js/serial.js"></script>
          <script src="js/export.min.js"></script>
          <link rel="stylesheet" href="css/export.css" type="text/css" media="all" />
          <script src="js/light.js"></script>
          for amcharts js -->

        <!-- <script src="js/index1.js"></script>  -->
        <div class="charts">
          <div class="mid-content-top charts-grids">
            <div class="middle-content">
              <h4 class="title">Carousel Slider</h4>
              <!-- start content_slider -->
              <div id="owl-demo" class="owl-carousel text-center">
                <div class="item">
                  <img class="lazyOwl img-responsive" data-src="images/slider1.jpg" alt="name">
                </div>
                <div class="item">
                  <img class="lazyOwl img-responsive" data-src="images/slider2.jpg" alt="name">
                </div>
                <div class="item">
                  <img class="lazyOwl img-responsive" data-src="images/slider3.jpg" alt="name">
                </div>
                <div class="item">
                  <img class="lazyOwl img-responsive" data-src="images/slider4.jpg" alt="name">
                </div>
                <div class="item">
                  <img class="lazyOwl img-responsive" data-src="images/slider5.jpg" alt="name">
                </div>
                <div class="item">
                  <img class="lazyOwl img-responsive" data-src="images/slider6.jpg" alt="name">
                </div>
                <div class="item">
                  <img class="lazyOwl img-responsive" data-src="images/slider7.jpg" alt="name">
                </div>

              </div>
            </div>
            <!--//sreen-gallery-cursual---->
          </div>
        </div>

        <div class="col_1">
          <div class="col-md-4 span_8">
            <div class="activity_box">
              <h2>Inbox</h2>
              <div class="scrollbar" id="style-1">
                <?php
                $sql = "SELECT * FROM transaction_master ORDER BY t_id DESC LIMIT 0,5";
                $result = mysqli_query($conn, $sql);
                $result1 = mysqli_num_rows($result);
                for ($i = 0; $i < 5; $i++) {
                  while ($rows = mysqli_fetch_assoc($result)) {

                ?>

                    <div class="activity-row">
                      <div class="col-xs-3 activity-img"><img src='images/1.jpg' class="img-responsive" alt="" /></div>
                      <div class="col-xs-7 activity-desc">
                        <h5><a href="#"><?php echo $_SESSION['name']; ?></a></h5>
                        <p>Hey ! I just Updated <?php
                                                $id = $rows['supplier_id'];
                                                $sup_obj = new Supplier;
                                                $sup_data = $sup_obj->GET_SUPPLIER_BY_ID($id);
                                                echo "<p style='font-weight:bold'>" . $sp_id = $sup_data->supplier_master_name . "</p>";
                                                ?></p>
                        <p><?php if ($rows['trans_type'] == 1) {
                              echo "<p style='color:red;'>Debited</p>";
                            } else if ($rows['trans_type'] == 2) {
                              echo "<p style='color:green;'>Credited</p>";
                            } else {
                              echo "<p style='color:blue;'>Added New Supplier</p>";
                            } ?></p>
                        <p><?php echo $rows['trans_amnt']; ?></p>
                      </div>
                      <div class="col-xs-2 activity-desc1">
                        <h6><?php $date = $sup_data->updated_on;
                            echo  $dt = date("h:i A", strtotime($date));

                            ?></h6>
                      </div>
                      <div class="clearfix"> </div>
                    </div>
                <?php }
                } ?>
              </div>
              <form action="#" method="post">
                <input type="text" value="Enter your text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your text';}" required="">
                <input type="submit" value="Submit" />
              </form>
            </div>
          </div>
          <div class="col-md-4 span_8">
            <div class="activity_box activity_box1">
              <h3>chat</h3>
              <div class="scrollbar" id="style-3">
                <div class="activity-row activity-row1">
                  <div class="col-xs-3 activity-img"><img src='images/1.jpg' class="img-responsive" alt="" /><span>06:01 AM</span></div>
                  <div class="col-xs-5 activity-img1">
                    <div class="activity-desc-sub">
                      <h5>Michael Chris</h5>
                      <p>Hello ! this is Michael chris</p>
                    </div>
                  </div>
                  <div class="col-xs-4 activity-desc1"></div>
                  <div class="clearfix"> </div>
                </div>
                <div class="activity-row activity-row1">
                  <div class="col-xs-2 activity-desc1"></div>
                  <div class="col-xs-7 activity-img2">
                    <div class="activity-desc-sub1">
                      <h5>Alexander</h5>
                      <p>Hi,How are you ? What about our next meeting?</p>
                    </div>
                  </div>
                  <div class="col-xs-3 activity-img"><img src='images/3.jpg' class="img-responsive" alt="" /><span>06:02 AM</span></div>
                  <div class="clearfix"> </div>
                </div>
                <div class="activity-row activity-row1">
                  <div class="col-xs-3 activity-img"><img src='images/1.jpg' class="img-responsive" alt="" /><span>06:05 AM</span></div>
                  <div class="col-xs-5 activity-img1">
                    <div class="activity-desc-sub">
                      <h5>Michael Chris</h5>
                      <p>Yeah fine, Hope you the same</p>
                    </div>
                  </div>
                  <div class="col-xs-4 activity-desc1"></div>
                  <div class="clearfix"> </div>
                </div>
                <div class="activity-row activity-row1">
                  <div class="col-xs-2 activity-desc1"></div>
                  <div class="col-xs-7 activity-img2">
                    <div class="activity-desc-sub1">
                      <h5>Alexander</h5>
                      <p>Wow that's great</p>
                    </div>
                  </div>
                  <div class="col-xs-3 activity-img"><img src='images/3.jpg' class="img-responsive" alt="" /><span>06:20 PM</span></div>
                  <div class="clearfix"> </div>
                </div>
              </div>
              <form action="#" method="post">
                <input type="text" value="Enter your text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your text';}" required="">
                <input type="submit" value="Send" />
              </form>
            </div>
          </div>
          <div class="col-md-4 span_8">
            <div class="activity_box activity_box2">
              <h3>todo</h3>
              <div class="scrollbar" id="style-2">
                <div class="activity-row activity-row1">
                  <div class="single-bottom">
                    <ul>
                      <li>
                        <input type="checkbox" id="brand" value="">
                        <label for="brand"><span></span> Integer sollicitudin lacinia condimentum.</label>
                      </li>
                      <li>
                        <input type="checkbox" id="brand1" value="">
                        <label for="brand1"><span></span> ligula sit amet hendrerit init lorem.</label>
                      </li>
                      <li>
                        <input type="checkbox" id="brand2" value="">
                        <label for="brand2"><span></span> Donec aliquam dolor eu augue condimentum.</label>
                      </li>
                      <li>
                        <input type="checkbox" id="brand9" value="">
                        <label for="brand9"><span></span> at tristique Pain that produces no resultant.</label>
                      </li>
                      <li>
                        <input type="checkbox" id="brand8" value="">
                        <label for="brand8"><span></span> Nulla finibus rhoncus turpis quis tristique.</label>
                      </li>
                      <li>
                        <input type="checkbox" id="brand7" value="">
                        <label for="brand7"><span></span> Cupidatat non proident Praising pain.</label>
                      </li>
                      <li>
                        <input type="checkbox" id="brand3" value="">
                        <label for="brand3"><span></span> libero vel elementum euismod, mauris tellus</label>
                      </li>
                      <li>
                        <input type="checkbox" id="brand4" value="">
                        <label for="brand4"><span></span> Donec aliquam dolor eu augue condimentum.</label>
                      </li>
                      <li>
                        <input type="checkbox" id="brand5" value="">
                        <label for="brand5"><span></span> Orci varius natoque penatibus et magnis dis.</label>
                      </li>
                      <li>
                        <input type="checkbox" id="brand6" value="">
                        <label for="brand6"><span></span> parturient Dolorem ipsum quia.</label>
                      </li>


                    </ul>
                  </div>
                </div>
              </div>
              <form action="#" method="post">
                <input type="text" value="Enter your text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your text';}" required="">
                <input type="submit" value="Submit" />
              </form>
            </div>
            <div class="clearfix"> </div>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
    </div>
  </div>
  </div>


  <script src="js/Chart.bundle.js"></script>
  <script src="js/utils.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
  </script>

  <script type="text/javascript">
    google.charts.load('current', {
      packages: ['corechart']
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['product', 'Sales'],
        ['Shoes', 40],
        ['Hats', 50],
        ['Coats', 35],
        ['Scarves', 20]
      ]);
      var options = {
        title: "Product Sales",
        hAxis: {
          title: "Sales"
        },
        vAxis: {
          title: "Products"
        }
      };

      var chart = new
      google.visualization.BarChart(document.getElementById("chart2"));
      chart.draw(data, options);
    }
  </script>
  <script>
    var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var color = Chart.helpers.color;
    var barChartData = {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [{
        label: 'Dataset 1',
        backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
        borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      }, {
        label: 'Dataset 2',
        backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
        borderColor: window.chartColors.blue,
        borderWidth: 1,
        data: [
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor(),
          randomScalingFactor()
        ]
      }]

    };

    window.onload = function() {
      var ctx = document.getElementById("canvas").getContext("2d");
      window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Chart.js Bar Chart'
          }
        }
      });

    };

    document.getElementById('randomizeData').addEventListener('click', function() {
      var zero = Math.random() < 0.2 ? true : false;
      barChartData.datasets.forEach(function(dataset) {
        dataset.data = dataset.data.map(function() {
          return zero ? 0.0 : randomScalingFactor();
        });

      });
      window.myBar.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
      var colorName = colorNames[barChartData.datasets.length % colorNames.length];;
      var dsColor = window.chartColors[colorName];
      var newDataset = {
        label: 'Dataset ' + barChartData.datasets.length,
        backgroundColor: color(dsColor).alpha(0.5).rgbString(),
        borderColor: dsColor,
        borderWidth: 1,
        data: []
      };

      for (var index = 0; index < barChartData.labels.length; ++index) {
        newDataset.data.push(randomScalingFactor());
      }

      barChartData.datasets.push(newDataset);
      window.myBar.update();
    });

    document.getElementById('addData').addEventListener('click', function() {
      if (barChartData.datasets.length > 0) {
        var month = MONTHS[barChartData.labels.length % MONTHS.length];
        barChartData.labels.push(month);

        for (var index = 0; index < barChartData.datasets.length; ++index) {
          //window.myBar.addData(randomScalingFactor(), index);
          barChartData.datasets[index].data.push(randomScalingFactor());
        }

        window.myBar.update();
      }
    });

    document.getElementById('removeDataset').addEventListener('click', function() {
      barChartData.datasets.splice(0, 1);
      window.myBar.update();
    });

    document.getElementById('removeData').addEventListener('click', function() {
      barChartData.labels.splice(-1, 1); // remove the label first

      barChartData.datasets.forEach(function(dataset, datasetIndex) {
        dataset.data.pop();
      });

      window.myBar.update();
    });
  </script>
  <!-- new added graphs chart js-->

  <!-- Classie --><!-- for toggle left push menu script -->
  <script src="js/classie.js"></script>
  <script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
      showLeftPush = document.getElementById('showLeftPush'),
      body = document.body;

    showLeftPush.onclick = function() {
      classie.toggle(this, 'active');
      classie.toggle(body, 'cbp-spmenu-push-toright');
      classie.toggle(menuLeft, 'cbp-spmenu-open');
      disableOther('showLeftPush');
    };


    function disableOther(button) {
      if (button !== 'showLeftPush') {
        classie.toggle(showLeftPush, 'disabled');
      }
    }
  </script>
  <!-- //Classie --><!-- //for toggle left push menu script -->

  <!--scrolling js-->
  <script src="js/jquery.nicescroll.js"></script>
  <script src="js/scripts.js"></script>
  <!--//scrolling js-->

  <!-- side nav js -->
  <script src='js/SidebarNav.min.js' type='text/javascript'></script>
  <script>
    $('.sidebar-menu').SidebarNav()
  </script>
  <!-- //side nav js -->

  <!-- for index page weekly sales java script -->
  <script src="js/SimpleChart.js"></script>
  <script>
    var graphdata1 = {
      linecolor: "#CCA300",
      title: "Monday",
      values: [{
          X: "6:00",
          Y: 10.00
        },
        {
          X: "7:00",
          Y: 20.00
        },
        {
          X: "8:00",
          Y: 40.00
        },
        {
          X: "9:00",
          Y: 34.00
        },
        {
          X: "10:00",
          Y: 40.25
        },
        {
          X: "11:00",
          Y: 28.56
        },
        {
          X: "12:00",
          Y: 18.57
        },
        {
          X: "13:00",
          Y: 34.00
        },
        {
          X: "14:00",
          Y: 40.89
        },
        {
          X: "15:00",
          Y: 12.57
        },
        {
          X: "16:00",
          Y: 28.24
        },
        {
          X: "17:00",
          Y: 18.00
        },
        {
          X: "18:00",
          Y: 34.24
        },
        {
          X: "19:00",
          Y: 40.58
        },
        {
          X: "20:00",
          Y: 12.54
        },
        {
          X: "21:00",
          Y: 28.00
        },
        {
          X: "22:00",
          Y: 18.00
        },
        {
          X: "23:00",
          Y: 34.89
        },
        {
          X: "0:00",
          Y: 40.26
        },
        {
          X: "1:00",
          Y: 28.89
        },
        {
          X: "2:00",
          Y: 18.87
        },
        {
          X: "3:00",
          Y: 34.00
        },
        {
          X: "4:00",
          Y: 40.00
        }
      ]
    };
    var graphdata2 = {
      linecolor: "#00CC66",
      title: "Tuesday",
      values: [{
          X: "6:00",
          Y: 100.00
        },
        {
          X: "7:00",
          Y: 120.00
        },
        {
          X: "8:00",
          Y: 140.00
        },
        {
          X: "9:00",
          Y: 134.00
        },
        {
          X: "10:00",
          Y: 140.25
        },
        {
          X: "11:00",
          Y: 128.56
        },
        {
          X: "12:00",
          Y: 118.57
        },
        {
          X: "13:00",
          Y: 134.00
        },
        {
          X: "14:00",
          Y: 140.89
        },
        {
          X: "15:00",
          Y: 112.57
        },
        {
          X: "16:00",
          Y: 128.24
        },
        {
          X: "17:00",
          Y: 118.00
        },
        {
          X: "18:00",
          Y: 134.24
        },
        {
          X: "19:00",
          Y: 140.58
        },
        {
          X: "20:00",
          Y: 112.54
        },
        {
          X: "21:00",
          Y: 128.00
        },
        {
          X: "22:00",
          Y: 118.00
        },
        {
          X: "23:00",
          Y: 134.89
        },
        {
          X: "0:00",
          Y: 140.26
        },
        {
          X: "1:00",
          Y: 128.89
        },
        {
          X: "2:00",
          Y: 118.87
        },
        {
          X: "3:00",
          Y: 134.00
        },
        {
          X: "4:00",
          Y: 180.00
        }
      ]
    };
    var graphdata3 = {
      linecolor: "#FF99CC",
      title: "Wednesday",
      values: [{
          X: "6:00",
          Y: 230.00
        },
        {
          X: "7:00",
          Y: 210.00
        },
        {
          X: "8:00",
          Y: 214.00
        },
        {
          X: "9:00",
          Y: 234.00
        },
        {
          X: "10:00",
          Y: 247.25
        },
        {
          X: "11:00",
          Y: 218.56
        },
        {
          X: "12:00",
          Y: 268.57
        },
        {
          X: "13:00",
          Y: 274.00
        },
        {
          X: "14:00",
          Y: 280.89
        },
        {
          X: "15:00",
          Y: 242.57
        },
        {
          X: "16:00",
          Y: 298.24
        },
        {
          X: "17:00",
          Y: 208.00
        },
        {
          X: "18:00",
          Y: 214.24
        },
        {
          X: "19:00",
          Y: 214.58
        },
        {
          X: "20:00",
          Y: 211.54
        },
        {
          X: "21:00",
          Y: 248.00
        },
        {
          X: "22:00",
          Y: 258.00
        },
        {
          X: "23:00",
          Y: 234.89
        },
        {
          X: "0:00",
          Y: 210.26
        },
        {
          X: "1:00",
          Y: 248.89
        },
        {
          X: "2:00",
          Y: 238.87
        },
        {
          X: "3:00",
          Y: 264.00
        },
        {
          X: "4:00",
          Y: 270.00
        }
      ]
    };
    var graphdata4 = {
      linecolor: "Random",
      title: "Thursday",
      values: [{
          X: "6:00",
          Y: 300.00
        },
        {
          X: "7:00",
          Y: 410.98
        },
        {
          X: "8:00",
          Y: 310.00
        },
        {
          X: "9:00",
          Y: 314.00
        },
        {
          X: "10:00",
          Y: 310.25
        },
        {
          X: "11:00",
          Y: 318.56
        },
        {
          X: "12:00",
          Y: 318.57
        },
        {
          X: "13:00",
          Y: 314.00
        },
        {
          X: "14:00",
          Y: 310.89
        },
        {
          X: "15:00",
          Y: 512.57
        },
        {
          X: "16:00",
          Y: 318.24
        },
        {
          X: "17:00",
          Y: 318.00
        },
        {
          X: "18:00",
          Y: 314.24
        },
        {
          X: "19:00",
          Y: 310.58
        },
        {
          X: "20:00",
          Y: 312.54
        },
        {
          X: "21:00",
          Y: 318.00
        },
        {
          X: "22:00",
          Y: 318.00
        },
        {
          X: "23:00",
          Y: 314.89
        },
        {
          X: "0:00",
          Y: 310.26
        },
        {
          X: "1:00",
          Y: 318.89
        },
        {
          X: "2:00",
          Y: 518.87
        },
        {
          X: "3:00",
          Y: 314.00
        },
        {
          X: "4:00",
          Y: 310.00
        }
      ]
    };
    var Piedata = {
      linecolor: "Random",
      title: "Profit",
      values: [{
          X: "Monday",
          Y: 50.00
        },
        {
          X: "Tuesday",
          Y: 110.98
        },
        {
          X: "Wednesday",
          Y: 70.00
        },
        {
          X: "Thursday",
          Y: 204.00
        },
        {
          X: "Friday",
          Y: 80.25
        },
        {
          X: "Saturday",
          Y: 38.56
        },
        {
          X: "Sunday",
          Y: 98.57
        }
      ]
    };
    $(function() {
      $("#Bargraph").SimpleChart({
        ChartType: "Bar",
        toolwidth: "50",
        toolheight: "25",
        axiscolor: "#E6E6E6",
        textcolor: "#6E6E6E",
        showlegends: true,
        data: [graphdata4, graphdata3, graphdata2, graphdata1],
        legendsize: "140",
        legendposition: 'bottom',
        xaxislabel: 'Hours',
        title: 'Weekly Profit',
        yaxislabel: 'Profit in $'
      });
      $("#sltchartype").on('change', function() {
        $("#Bargraph").SimpleChart('ChartType', $(this).val());
        $("#Bargraph").SimpleChart('reload', 'true');
      });
      $("#Hybridgraph").SimpleChart({
        ChartType: "Hybrid",
        toolwidth: "50",
        toolheight: "25",
        axiscolor: "#E6E6E6",
        textcolor: "#6E6E6E",
        showlegends: true,
        data: [graphdata4],
        legendsize: "140",
        legendposition: 'bottom',
        xaxislabel: 'Hours',
        title: 'Weekly Profit',
        yaxislabel: 'Profit in $'
      });
      $("#Linegraph").SimpleChart({
        ChartType: "Line",
        toolwidth: "50",
        toolheight: "25",
        axiscolor: "#E6E6E6",
        textcolor: "#6E6E6E",
        showlegends: false,
        data: [graphdata4, graphdata3, graphdata2, graphdata1],
        legendsize: "140",
        legendposition: 'bottom',
        xaxislabel: 'Hours',
        title: 'Weekly Profit',
        yaxislabel: 'Profit in $'
      });
      $("#Areagraph").SimpleChart({
        ChartType: "Area",
        toolwidth: "50",
        toolheight: "25",
        axiscolor: "#E6E6E6",
        textcolor: "#6E6E6E",
        showlegends: true,
        data: [graphdata4, graphdata3, graphdata2, graphdata1],
        legendsize: "140",
        legendposition: 'bottom',
        xaxislabel: 'Hours',
        title: 'Weekly Profit',
        yaxislabel: 'Profit in $'
      });
      $("#Scatterredgraph").SimpleChart({
        ChartType: "Scattered",
        toolwidth: "50",
        toolheight: "25",
        axiscolor: "#E6E6E6",
        textcolor: "#6E6E6E",
        showlegends: true,
        data: [graphdata4, graphdata3, graphdata2, graphdata1],
        legendsize: "140",
        legendposition: 'bottom',
        xaxislabel: 'Hours',
        title: 'Weekly Profit',
        yaxislabel: 'Profit in $'
      });
      $("#Piegraph").SimpleChart({
        ChartType: "Pie",
        toolwidth: "50",
        toolheight: "25",
        axiscolor: "#E6E6E6",
        textcolor: "#6E6E6E",
        showlegends: true,
        showpielables: true,
        data: [Piedata],
        legendsize: "250",
        legendposition: 'right',
        xaxislabel: 'Hours',
        title: 'Weekly Profit',
        yaxislabel: 'Profit in $'
      });

      $("#Stackedbargraph").SimpleChart({
        ChartType: "Stacked",
        toolwidth: "50",
        toolheight: "25",
        axiscolor: "#E6E6E6",
        textcolor: "#6E6E6E",
        showlegends: true,
        data: [graphdata3, graphdata2, graphdata1],
        legendsize: "140",
        legendposition: 'bottom',
        xaxislabel: 'Hours',
        title: 'Weekly Profit',
        yaxislabel: 'Profit in $'
      });

      $("#StackedHybridbargraph").SimpleChart({
        ChartType: "StackedHybrid",
        toolwidth: "50",
        toolheight: "25",
        axiscolor: "#E6E6E6",
        textcolor: "#6E6E6E",
        showlegends: true,
        data: [graphdata3, graphdata2, graphdata1],
        legendsize: "140",
        legendposition: 'bottom',
        xaxislabel: 'Hours',
        title: 'Weekly Profit',
        yaxislabel: 'Profit in $'
      });
    });
  </script>
  <!-- //for index page weekly sales java script -->


  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.js"> </script>
  <!-- //Bootstrap Core JavaScript -->

  <!-- -->
  <!-- Bootstrap 4 -->
  <script src="<?php echo SITE_URL ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/3c53481c56.js" crossorigin="anonymous"></script>
  <script src="<?php echo SITE_URL ?>assets/dist/js/adminlte.min.js"></script>

</body>

</html>