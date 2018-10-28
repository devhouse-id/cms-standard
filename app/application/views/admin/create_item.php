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
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page header start -->
                <div class="page-header">
                    <div class="page-header-title">
                        <h4>Basic Form Inputs</h4>
                        <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span>
                    </div>
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Form Components</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Form Components</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Page header end -->
                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5>Basic Form Inputs</h5>
                                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                        <i class="icofont icofont-refresh"></i>
                                        <i class="icofont icofont-close-circled"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <h4 class="sub-title">Basic Inputs</h4>
                                    <form action="<?php echo base_url() . 'index.php/admin/' . $table .'/create'?>" method="post" enctype="multipart/form-data">
                                        <span><button class="btn btn-info">Save</button></span>
                                        <?php 
                                        foreach ($columns as $column) {
                                            $type = $column['type'];
                                            $name = $column['name'];
                                        ?>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"><?php echo $name;?></label>
                                            <div class="col-sm-10">
                                            <?php 
                                            if ($type == 'text') { 
                                                if ($column['readonly']) {
                                            ?>
                                                <input type="text" class="form-control" readonly="" name=<?php echo $column['name'];?>>
                                            <?php 
                                                } else {
                                            ?>
                                                <input type="text" class="form-control" name=<?php echo $column['name'];?>>
                                            <?php
                                                }
                                            } elseif ($type == 'text_area') {
                                            ?>
                                                <textarea rows="5" cols="5" class="form-control" placeholder="Default textarea" name="<?php echo $column['name'];?>"></textarea>
                                            <?php
                                            } elseif ($type == 'options') {
                                            ?>
                                                <select class="form-control" name=<?php echo $column['name'];?>>
                                                    <option value="">Select One Value Only</option>
                                                    <?php
                                                        foreach ($column['option_values'] as $option) {
                                                    ?>
                                                    <option value="<?php echo $option;?>"><?php echo $option;?></option>

                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            <?php 
                                            } elseif ($type == 'file') {
                                            ?>
                                                <input type="file" class="form-control" name=<?php echo $column['name'];?>>
                                                <input type="hidden" name="<?php echo 'upload_' . $column['name'];?>" value="True">
                                            <?php
                                            }
                                            ?>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                            <!-- Basic Form Inputs card end -->
                        </div>
                    </div>
                </div>
                <!-- Page body end -->
            </div>
        </div>
        <!-- Main-body end -->
        <!--<div id="styleSelector">-->

        <!--</div>-->
    </div>
</div>

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