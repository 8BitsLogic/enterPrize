<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo base_url('admin') ?>" class="site_title user-profile"><img alt="logo" src="<?php echo $this->themeUrl . '/images/logo.jpg'; ?>" ><span>Admin</span></a>
        </div>

        <div class="clearfix"></div>

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <!--<h3>General</h3>-->
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-shekel"></i> Agent <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/agent'); ?>">List</a></li>
                            <li><a href="<?php echo base_url('admin/agent/invite'); ?>">Invite</a></li>
                            <li><a href="<?php echo base_url('admin/agent/new'); ?>">New</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-shekel"></i> Leads <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/lead'); ?>">List</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-shekel"></i> Payment <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/payment'); ?>">List</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-shekel"></i> Home Page main slider <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/slide'); ?>">List</a></li>
                            <li><a href="<?php echo base_url('admin/slide/new'); ?>">New</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-shekel"></i> Product <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/product'); ?>">List</a></li>
                            <li><a href="<?php echo base_url('admin/product/new'); ?>">New</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-shekel"></i> Community Post <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/community/queries'); ?>">Queries</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-shekel"></i> Email CMS <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/email_cms'); ?>">List</a></li>
                            <li><a href="<?php echo base_url('admin/email_cms/new'); ?>">New</a></li>
                            <li><a>Email Setting <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="<?php echo base_url('admin/email_cms/setting'); ?>">List Settings </a></li>
                                    <li><a href="<?php echo base_url('admin/email_cms/setting/new'); ?>">New setting </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-shekel"></i> Test <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/test'); ?>">List</a></li>
                            <li><a href="<?php echo base_url('admin/test/new'); ?>">New</a></li>
                            <li><a>Question<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="<?php echo base_url('admin/test/question'); ?>">List Question</a></li>
                                    <li><a href="<?php echo base_url('admin/test/question/new'); ?>">New Question</a></li>
                                    <li><a>Answer <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li class="sub_menu"><a href="<?php echo base_url('admin/test/answer'); ?>">List Answer </a></li>
                                            <li><a href="<?php echo base_url('admin/test/answer/new'); ?>">New Answer </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>   

                    <li><a><i class="fa fa-shekel"></i> Training <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/training') ?>">List</a></li>
                            <li><a href="<?php echo base_url('admin/training/new') ?>">New</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-shekel"></i> Static pages <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/cms') ?>">List</a></li>
                            <li><a href="<?php echo base_url('admin/cms/new') ?>">New</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-shekel"></i> Form Builder <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/form_builder/form') ?>">List</a></li>
                            <li><a href="<?php echo base_url('admin/form_builder/form/new') ?>">New</a></li>
                            <li><a>Form Fields<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?php echo base_url('admin/form_builder/field/list') ?>">List Fields</a></li>
                                    <li><a href="<?php echo base_url('admin/form_builder/field/new') ?>">New Field</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</div>