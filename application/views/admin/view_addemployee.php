<?php $this->load->view('admin/partials/admin_header.php'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?=$lang['title']?></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?=$lang['header_title']?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <label><?php echo $message; ?></label>
                        <form method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                <?=$lang['tf_emp_image']?> : <input class="form-control"  name="profile" id="username" type="file" ><span id="user-availability-status"></span>
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_email']?> : <input class="form-control" placeholder="E-mail" name="u_email" id="username" type="email" onBlur="checkAvailability()" ><span id="user-availability-status"></span>
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_pass']?> : <input class="form-control" placeholder="Password" name="u_pass" type="password" >
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_fname']?> : <input class="form-control" placeholder="First Name" name="f_name" type="text"  >
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_lname']?> : <input class="form-control" placeholder="Last Name" name="l_name" type="text" >
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_mobile']?> : <input class="form-control" placeholder="Mobile" name="u_mobile" type="number"  >
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_position']?> : <input class="form-control" placeholder="Position" name="u_position" type="text" >
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_gender']?> : <input type="radio" name="u_gender" value="male"> <?=$lang['radio_emp_g_male']?>
                                    <input type="radio" name="u_gender" value="female"> <?=$lang['radio_emp_g_female']?>
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_bdate']?>:<input type="date" name="u_bday">
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_address']?>: <textarea rows="3" cols="10" class="form-control"  name="u_address"></textarea>
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_access']?>:
                                    <input type="radio" name="u_type" value="admin"> <?=$lang['radio_emp_admin']?>
                                    <input type="radio" name="u_type" value="employee"> <?=$lang['radio_emp_employee']?>
                                </div>
                                <br/>
                                <input type="submit" name="buttonSubmit" value="<?=$lang['btn_confirm']?>" class="btn btn-success" />
                            </fieldset>
                        </form>
                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col --> 
        </div> <!-- /row --> 
    </div>
</div> <!-- /.col-right --> 
<!-- /page content -->

<?php $this->load->view('admin/partials/admin_footer'); ?>

<?php if($this->session->flashdata('message') != NULL) : ?>
<script>
    swal({
      title: "Success",
      text: "<?php echo $this->session->flashdata('message'); ?>",
      type: "success",
      timer: 1500,
      showConfirmButton: false
    });
</script>
<?php endif ?>