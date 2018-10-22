<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mash Able Light</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href=<?php echo base_url() . "assets/plugins/bootstrap/dist/css/bootstrap.min.css" ?>>
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href=<?php echo base_url() . "assets/icon/themify-icons/themify-icons.css" ?>>
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href=<?php echo base_url() . "assets/icon/icofont/css/icofont.css"?>>
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href=<?php echo base_url() . "assets/pages/flag-icon/flag-icon.min.css"?>>
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href=<?php echo base_url() . "assets/pages/menu-search/css/component.css"?>>
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href=<?php echo base_url() . "assets/css/style.css"?>>

    <link rel="stylesheet" type="text/css" href=<?php echo base_url() . "assets/css/linearicons.css"?>>
    <link rel="stylesheet" type="text/css" href=<?php echo base_url() . "assets/css/simple-line-icons.css"?>>
    <link rel="stylesheet" type="text/css" href=<?php echo base_url() . "assets/css/ionicons.css"?>>
    <link rel="stylesheet" type="text/css" href=<?php echo base_url() . "assets/css/jquery.mCustomScrollbar.css"?>>
</head>

<body>
<!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Bootstrap Basic Tables</h4>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Bootstrap Table</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Basic Table</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- Basic table card start -->
                <div class="card">
                    <div class="card-header">
                        <h5>Basic table</h5>
                        <span>use class <code>table</code> inside table element</span>
                        <span><button class="btn btn-info"><i class="icofont icofont-ui-add"></i>Add</button></span>
                        <div class="card-header-right">
                            <i class="icofont icofont-rounded-down"></i>
                            <i class="icofont icofont-refresh"></i>
                            <i class="icofont icofont-close-circled"></i>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <?php
                                        foreach ($columns as $column) {
                                        ?>
                                        <th><?php echo $column;?></th>
                                        <?php
                                        }
                                        ?>
                                        <th>controls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($rows as $row) {
                                    ?>
                                    <tr>
                                        <?php
                                        foreach ($columns as $column) {
                                        ?>
                                        <td><?php echo $row->$column ?></td>
                                        <?php
                                        }
                                        ?>

                                        <td><button class="btn btn-warning"><i class="icofont icofont-ui-edit"></i></button><button class="btn btn-danger"><i class="icofont icofont-ui-delete"></i></button></td>
                                    </tr>
                                    <?php    
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Basic table card end -->
            </div>
            <!-- Page-body end -->
        </div>
    </div>
    <!-- Main-body end -->

    <!-- Required Jquery -->
    <script type="text/javascript" src=<?php echo base_url() . "assets/plugins/jquery/dist/jquery.min.js"?>></script>
    <script type="text/javascript" src=<?php echo base_url() . "assets/plugins/jquery-ui/jquery-ui.min.js"?>></script>
    <script type="text/javascript" src=<?php echo base_url() . "assets/plugins/tether/dist/js/tether.min.js"?>></script>
    <script type="text/javascript" src=<?php echo base_url() . "assets/plugins/bootstrap/dist/js/bootstrap.min.js"?>></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src=<?php echo base_url() . "assets/plugins/jquery-slimscroll/jquery.slimscroll.js"?>></script>
    <!-- modernizr js -->
    <script type="text/javascript" src=<?php echo base_url() . "assets/plugins/modernizr/modernizr.js"?>></script>
    <script type="text/javascript" src=<?php echo base_url() . "assets/plugins/modernizr/feature-detects/css-scrollbars.js"?>></script>
    <!-- classie js -->
    <script type="text/javascript" src=<?php echo base_url() . "assets/plugins/classie/classie.js"?>></script>
    <!-- Custom js -->
    <script type="text/javascript" src=<?php echo base_url() . "assets/js/script.js"?>></script>
    <script src=<?php echo base_url() . "assets/js/pcoded.min.js"?>></script>
    <script src=<?php echo base_url() . "assets/js/demo-12.js"?>></script>
    <script src=<?php echo base_url() . "assets/js/jquery.mCustomScrollbar.concat.min.js"?>></script>
    <script src=<?php echo base_url() . "assets/js/jquery.mousewheel.min.js"?>></script>

</body>
</html>