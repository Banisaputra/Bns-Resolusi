<?php
error_reporting(0);
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
  echo "<script>alert('Untuk mengakses halaman, Anda harus login dulu.'
        <meta http-equiv='refresh' content='0;url=index.php'>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else {
  $act = isset($_GET['act']) ? $_GET['act'] : '';
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title> Maintenance Machines System Information</title>

    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="assets/css/chosen.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="assets/js/ace-extra.min.js"></script>
    <script src="assets/js/highcharts.js"></script>
    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body class="skin-1">
    <div id="navbar" class="navbar navbar-default ace-save-state">
      <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
          <span class="sr-only">Toggle sidebar</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-header pull-left">
          <a href="?halamane=beranda" class="navbar-brand">
            <small>
              Aplikasi Maintanance dan Penggunaan Peralatan Laboratorium
            </small>
          </a>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
          <ul class="nav ace-nav">
            <?php
            include "config/koneksi.php";
            if ($_SESSION['leveluser'] == 'admin' or $_SESSION['leveluser'] == 'teknisi' or $_SESSION['leveluser'] == 'superAdm' ) {
              $jum = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM perbaikan WHERE status='Open'"));
              if ($jum > 0) {
                $icon = "animated";
                $Notifications = "$jum Notifications";
              } else {
                $icon = "";
                $Notifications = "0 Notifications";
              }
            ?>
              <li class="purple dropdown-modal">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <i class="ace-icon fa fa-bell icon-<?php echo "$icon"; ?>-bell"></i>
                  <span class="badge badge-important"><?php echo "$jum"; ?></span>
                </a>
                <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                  <li class="dropdown-header">
                    <i class="ace-icon fa fa-exclamation-triangle"></i>
                    <?php echo "$Notifications"; ?>
                  </li>
                  <li class="dropdown-content">
                    <ul class="dropdown-menu dropdown-navbar navbar-pink">
                      <?php
                      $queryX  = "SELECT * FROM perbaikan WHERE status='Open'";
                      $tampilX = mysqli_query($konek, $queryX);
                      while ($r = mysqli_fetch_array($tampilX)) {
                        echo " <li>
                      <a href='#'>
                        <div class='clearfix'>
                          <span class='pull-left'>
                            <i class='btn btn-xs no-hover btn-pink fa fa-comment'></i>
                            $r[judul]
                          </span>
                        </div>
                      </a>
                    </li>";
                      }
                      ?>


                    </ul>
                  </li>

                  <li class="dropdown-footer">
                    <a href="?halamane=perbaikan">
                      See all notifications
                      <i class="ace-icon fa fa-arrow-right"></i>
                    </a>
                  </li>
                </ul>
              </li>


              <?php
              include "config/koneksi.php";
              $jumXX = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM perawatan WHERE status='Open'"));
              if ($jumXX > 0) {
                $NotificationsXX = "$jumXX Notifications";
              } else {
                $NotificationsXX = "0 Notifications";
              }

              ?>


              <li class="green dropdown-modal">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                  <i class="ace-icon fa fa-edit"></i>
                  <span class="badge badge-green"><?php echo "$jumXX"; ?></span>
                </a>

                <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                  <li class="dropdown-header">
                    <i class="ace-icon fa fa-check"></i>
                    <?php echo "$NotificationsXX"; ?>
                  </li>

                  <li class="dropdown-content">
                    <ul class="dropdown-menu dropdown-navbar">
                      <?php
                      $queryXX  = "SELECT * FROM perawatan WHERE status='Open'";
                      $tampilXX = mysqli_query($konek, $queryXX);
                      while ($c = mysqli_fetch_array($tampilXX)) {
                        echo " <li>
                      <a href='#'>
                        <div class='clearfix'>
                          <span class='pull-left'>
                            <i class='btn btn-xs no-hover btn-purple fa fa-check-square-o'></i>
                            Perawatan $c[point_chek]
                          </span>
                        </div>
                      </a>
                    </li>";
                      }
                      ?>


                    </ul>
                  </li>

                  <li class="dropdown-footer">
                    <a href="?halamane=jadwal">
                      Lihat semua jadwal
                      <i class="ace-icon fa fa-arrow-right"></i>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>


            <li class="light-blue dropdown-modal">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <img class="nav-user-photo" src="assets/images/avatars/avatar2.png" alt="Jason's Photo" />
                <span class="user-info">
                  <small>Welcome,</small>
                  <?php echo "$_SESSION[namauser]"; ?>
                </span>
                <i class="ace-icon fa fa-caret-down"></i>
              </a>

              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li><a href="#"><i class="ace-icon fa fa-user"></i>Profile</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="ace-icon fa fa-power-off"></i>Logout</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div><!-- /.navbar-container -->
    </div>

    <!-- start .nav-list -->
    <div class="main-container ace-save-state" id="main-container">
      <script type="text/javascript">
        try {
          ace.settings.loadState('main-container')
        } catch (e) {}
      </script>

      <div id="sidebar" class="sidebar responsive ace-save-state">
        <script type="text/javascript">
          try {
            ace.settings.loadState('sidebar')
          } catch (e) {}
        </script>

        <ul class="nav nav-list">
          <?php
          if ($_GET['halamane'] == 'beranda') {
            $b_active = "active";
          }
          if ($_GET['halamane'] == 'user') {
            $u_active_open = "active open";
            $u_active = "active";
          }
          if ($_GET['halamane'] == 'mesin') {
            $u_active_open = "active open";
            $m_active = "active";
          }
          if ($_GET['halamane'] == 'prodi') {
            $u_active_open = "active open";
            $d_active = "active";
          }
          if ($_GET['halamane'] == 'jadwal') {
            $t_active_open = "active open";
            $j_active = "active";
          }
          if ($_GET['halamane'] == 'perbaikan') {
            $t_active_open = "active open";
            $p_active = "active";
          }
          if ($_GET['halamane'] == 'report' and $_GET['id'] == 'perawatan') {
            $r_active_open = "active open";
            $per_active = "active";
          }
          if ($_GET['halamane'] == 'report' and $_GET['id'] == 'perbaikan') {
            $r_active_open = "active open";
            $perb_active = "active";
          }
          if ($_GET['halamane'] == 'report' and $_GET['id'] == 'penggunaan') {
            $r_active_open = "active open";
            $pem_active = "active";
          }
          if ($_GET['halamane'] == 'riwayat') {
            $r_active_open = "active open";
            $riw_active = "active";
          }
          if ($_GET['halamane'] == 'perbaikan-approval' and  $act == '') {
            $tbh1_active = "active";
          }
          if ($_GET['halamane'] == 'perbaikan-approval' and  $act == 'penggunaan') {
            $tbh2_active = "active";
          }
          if ($_GET['halamane'] == 'perbaikan-approval' and  $act == 'tambahperbaikan') {
            $tbh_active = "active";
          }
          ?>

          <li class="<?php echo "$b_active"; ?>">
            <a href="?halamane=beranda">
              <i class="menu-icon fa fa-home"></i>
              <span class="menu-text"> Dashboard </span>
            </a><b class="arrow"></b>
          </li>
          <!-- Admin START -->
          <?php if ($_SESSION['leveluser'] == 'admin' or $_SESSION['leveluser'] == 'superAdm') { ?>
            <li class="<?php echo "$u_active_open"; ?>">
              <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-database"></i>
                <span class="menu-text">Master</span>
                <b class="arrow fa fa-angle-down"></b>
              </a><b class="arrow"></b>
              <ul class="submenu">
                <li class="<?php echo "$u_active"; ?>">
                  <a href="?halamane=user"><i class="menu-icon fa fa-caret-right"></i>User</a><b class="arrow"></b>
                </li>
                <li class="<?php echo "$m_active"; ?>">
                  <a href="?halamane=mesin"><i class="menu-icon fa fa-caret-right"></i>Mesin</a><b class="arrow"></b>
                </li>
                <li class="<?php echo "$d_active"; ?>">
                  <a href="?halamane=prodi"><i class="menu-icon fa fa-caret-right"></i>Program Studi</a><b class="arrow"></b>
                </li>
              </ul>
            </li>
          <?php  } ?>
          <!-- Admin END -->
          <!-- Admin & Teknisi START -->
          <?php if ($_SESSION['leveluser'] == 'admin' or $_SESSION['leveluser'] == 'teknisi' or $_SESSION['leveluser'] == 'superAdm') { ?>
            <li class="<?php echo "$t_active_open"; ?>">
              <a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-book"></i>
                <span class="menu-text">Transaksi</span><b class="arrow fa fa-angle-down"></b>
              </a><b class="arrow"></b>
              <ul class="submenu">
                <li class="<?php echo "$j_active"; ?>">
                  <a href="?halamane=jadwal"><i class="menu-icon fa fa-caret-right"></i>Perbaikan Rutin</a><b class="arrow"></b>
                </li>
                <li class="<?php echo "$p_active"; ?>">
                  <a href="?halamane=perbaikan"><i class="menu-icon fa fa-caret-right"></i>Perbaikan Non Rutin</a><b class="arrow"></b>
                </li>
              </ul>
            </li>
          <?php  } ?>
          <!-- Admin & Teknisi END -->
          <!-- User START -->
          <?php if ($_SESSION['leveluser'] == 'user') { ?>
            <li class="<?php echo "$tbh_active"; ?>">
              <a href="?halamane=perbaikan-approval&act=tambahperbaikan"><i class="menu-icon fa fa-list"></i>
                <span class="menu-text">Perbaikan Mesin</span>
              </a><b class="arrow"></b>
            </li>
            <li class="<?php echo "$tbh1_active"; ?>">
              <a href="?halamane=perbaikan-approval"><i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text">Aproval Maintenance</span>
              </a><b class="arrow"></b>
            </li>
            <li class="<?php echo "$tbh2_active"; ?>">
              <a href="?halamane=perbaikan-approval&act=penggunaan"><i class="menu-icon fa fa-briefcase"></i>
                <span class="menu-text">Penggunaan Mesin</span>
              </a><b class="arrow"></b>
            </li>
          <?php  } ?>
          <!-- User END -->
          <!-- Admin START -->
          <?php if ($_SESSION['leveluser'] == 'admin' or $_SESSION['leveluser'] == 'superAdm') { ?>
            <li class="<?php echo "$r_active_open"; ?>">
              <a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-bar-chart-o"></i>
                <span class="menu-text"> Laporan </span><b class="arrow fa fa-angle-down"></b>
              </a><b class="arrow"></b>
              <ul class="submenu">
                <li class="<?php echo "$per_active"; ?>">
                  <a href="?halamane=report&id=perawatan"><i class="menu-icon fa fa-caret-right"></i>Laporan Penjadwalan</a>
                  <b class="arrow"></b>
                </li>
                <li class="<?php echo "$perb_active"; ?>">
                  <a href="?halamane=report&id=perbaikan"><i class="menu-icon fa fa-caret-right"></i>Laporan Perbaikan</a>
                  <b class="arrow"></b>
                </li>
                <li class="<?php echo "$riw_active"; ?>">
                  <a href="?halamane=riwayat"><i class="menu-icon fa fa-caret-right"></i>Kartu Riwayat Mesin</a>
                  <b class="arrow"></b>
                </li>
                <li class="<?php echo "$pem_active"; ?>">
                  <a href="?halamane=report&id=penggunaan"><i class="menu-icon fa fa-caret-right"></i>Laporan Penggunaan Mesin</a>
                  <b class="arrow"></b>
                </li>
              </ul>
            </li>
          <?php  } ?>
          <!-- Admin END -->
          <b class="arrow"></b>
        </ul><!-- /.nav-list -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
      </div>
      <!--Content START -->
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li>
                <a href="#"><?php echo "" . strtoupper($_GET['halamane']) . ""; ?></a>
              </li>
              <li class="active">
                <?php
                if ($act == '') {
                  echo "View Data";
                } else {
                  echo "$act";
                }
                ?>
              </li>
            </ul>
            <!-- <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
              </form>
            </div> -->
          </div>

          <div class="page-content">
            <!-- <div class="ace-settings-container" id="ace-settings-container">
              <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-cog bigger-130"></i>
              </div>

              <div class="ace-settings-box clearfix" id="ace-settings-box">
                <div class="pull-left width-50">
                  <div class="ace-settings-item">
                    <div class="pull-left">
                      <select id="skin-colorpicker" class="hide">
                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                      </select>
                    </div>
                    <span>&nbsp; Choose Skin</span>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                    <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                  </div>


                </div>/.pull-left

              </div>/.ace-settings-box
            </div>/.ace-settings-container -->

            <!-- <div class="page-header">
              <h1>
                <?php echo "" . strtoupper($_GET['halamane']) . ""; ?>
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  <?php
                  if ($act == '') {
                    echo "View Data";
                  } else {
                    echo "$act";
                  }
                  ?>
                </small>
              </h1>
            </div> -->

            <div class="row">
              <div class="col-xs-12">
                <?php include "content.php"; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Content END -->

      <div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
              <span class="blue bolder">
                <script type='text/javascript'>
                  var credityear = new Date();
                  document.write(credityear.getFullYear());
                </script> &copy; Laboratorium FT
              </span>
            </span>
            &nbsp; &nbsp;
            <span class="action-buttons">
              <a href="#">
                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
              </a>
              <a href="#">
                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
              </a>
              <a href="#">
                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
              </a>
            </span>
          </div>
        </div>
      </div>
      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->
    <!-- .nav-list END -->
    <!-- basic scripts -->
    <!--[if !IE]> -->
    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <!-- <![endif]-->
    <!--[if IE]>
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/buttons.flash.min.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>
    <script src="assets/js/buttons.colVis.min.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script>
    <!-- ace scripts -->
    <script src="assets/js/ace-elements.min.js"></script>
    <script src="assets/js/ace.min.js"></script>
    <script src="assets/js/jquery-ui.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/chosen.jquery.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/spinbox.min.js"></script>
    <script src="assets/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/daterangepicker.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/bootstrap-colorpicker.min.js"></script>
    <script src="assets/js/jquery.knob.min.js"></script>
    <script src="assets/js/autosize.min.js"></script>
    <script src="assets/js/jquery.inputlimiter.min.js"></script>
    <script src="assets/js/jquery.maskedinput.min.js"></script>
    <script src="assets/js/bootstrap-tag.min.js"></script>
    <script>
      $(function() {
        $("#dynamic-table1").DataTable();
      });
      //datepicker plugin
      //link
      $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        })
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function() {
          $(this).prev().focus();
        });
      if (!ace.vars['touch']) {
        $('.chosen-select').chosen({
          allow_single_deselect: true
        });
        //resize the chosen on window resize
        $(window)
          .off('resize.chosen')
          .on('resize.chosen', function() {
            $('.chosen-select').each(function() {
              var $this = $(this);
              $this.next().css({
                'width': $this.parent().width()
              });
            })
          }).trigger('resize.chosen');
        //resize chosen on sidebar collapse/expand
        $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
          if (event_name != 'sidebar_collapsed') return;
          $('.chosen-select').each(function() {
            var $this = $(this);
            $this.next().css({
              'width': $this.parent().width()
            });
          })
        });
        $('#chosen-multiple-style .btn').on('click', function(e) {
          var target = $(this).find('input[type=radio]');
          var which = parseInt(target.val());
          if (which == 2) $('#form-field-select-4').addClass('tag-input-style');
          else $('#form-field-select-4').removeClass('tag-input-style');
        });
      }
    </script>
  </body>
  </html>
<?php } ?>