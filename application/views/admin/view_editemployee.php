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
                                <?=$lang['tf_emp_fname']?> : <input class="form-control" placeholder="First Name" name="f_name" type="text" value="<?php echo $userRow['first_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_lname']?> : <input class="form-control" placeholder="Last Name" name="l_name" type="text" value="<?php echo $userRow['last_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_mobile']?> : <input class="form-control" placeholder="Mobile" name="u_mobile" type="text" value="<?php echo $userRow['mobile']; ?>" required>
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_position']?> : <input class="form-control" placeholder="Position" name="u_position" type="text" value="<?php echo $userRow['position']; ?>" required>
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_pass']?> : <input class="form-control" placeholder="Password" name="u_pass" type="password" required>
                                </div>
                                <div class="form-group">
                                <?=$lang['tf_emp_gender']?> : <?php
                                    if(strcmp("male", $userRow['gender']) == 0)
                                        echo '<input type="radio" name="u_gender" value="male" checked> '.$lang['radio_emp_g_male'];
                                    else
                                        echo '<input type="radio" name="u_gender" value="male"> '.$lang['radio_emp_g_male'];
                                    if(strcmp("female",$userRow['gender']) == 0)
                                        echo ' &nbsp<input type="radio" name="u_gender" value="female" checked> '.$lang['radio_emp_g_female'];
                                    else
                                        echo '&nbsp <input type="radio" name="u_gender" value="female"> '.$lang['radio_emp_g_female'];
                                    ?>
                                </div>

                                <div class="form-group">
                                <?=$lang['tf_emp_bdate']?>:<input type="date"  value="<?php echo $userRow['birthday']; ?>" name="u_bday">
                                </div>
                                
                                <div class="form-group">
                                <?=$lang['tf_emp_address']?>: <textarea rows="3" cols="10" class="form-control"  name="u_address"><?php echo $userRow['address']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if(strcmp("admin",$this->session->userdata('type'))==0) {
                                    echo $lang['tf_emp_access'].': ';
                                    if(strcmp("admin",$userRow['type'])==0)
                                    echo '<input type="radio" name="u_type" value="admin" checked> '.$lang['radio_emp_admin'];
                                    else
                                    echo '<input type="radio" name="u_type" value="admin"> '.$lang['radio_emp_admin'];
                                    if(strcmp("Employee",$userRow['type'])==0)
                                    echo ' &nbsp<input type="radio" name="u_type" value="employee" checked>'.$lang['radio_emp_employee'];
                                    else
                                    echo '&nbsp <input type="radio" name="u_type" value="employee"> '.$lang['radio_emp_employee'];
                                    }
                                    ?>
                                </div>
                                <br/>
                                <input class="btn btn-success" type="submit" name="buttonSubmit" value="<?=$lang['btn_confirm']?>" />
                                <input type="hidden" name="u_id" value="<?php echo $userRow['id'] ?>">
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