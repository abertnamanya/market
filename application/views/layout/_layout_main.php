<?php
if ($this->session->userdata('loggedin') == true) {
    ?>
    <?php $this->load->view('components/header'); ?>

    <body class="hold-transition sidebar-mini">
        <!--preloader-->
        <div id="preloader">
            <div id="status"></div>
        </div>
        <!-- Site wrapper -->
        <div class="wrapper">

            <?php $this->load->view('components/header_nav'); ?>
            <!--header nav-->
            <!-- Left side column. contains the sidebar -->
            <?php $this->load->view('components/side_nav'); ?>
            <!--left side bar-->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                </section>
                <!-- Main content -->
                <section class="content">
                    <!--main content-->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4> <?= $pageName ?></h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <?php echo $subview ?>
                                </div>
                            </div>
                        </div> 
                    </div>

                </section>
            </div>
            <!-- .content-wrapper -->
            <?php $this->load->view('components/footer'); ?>

        <?php
        } else {
            redirect('logincontroller');
        }?>