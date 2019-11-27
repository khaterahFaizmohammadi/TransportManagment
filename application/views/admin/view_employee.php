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
                        <table class="table table-striped">
                            <tr>
                                <th>
                                <?=$lang['th_emp_img']?>
                                </th>
                                <th>
                                <?=$lang['th_emp_id']?>
                                </th>
                                <th>
                                <?=$lang['th_emp_name']?>
                                </th>
                                <th>
                                <?=$lang['th_emp_email']?>
                                </th>
                                <th>
                                <?=$lang['th_emp_mobile']?>
                                </th>
                                
                                <th>
                                <?=$lang['th_emp_position']?>
                                </th>
                                <th>
                                <?=$lang['th_emp_gender']?>
                                </th>
                                <th>
                                <?=$lang['th_emp_access']?>
                                </th>
                                <th colspan="2">
                                <?=$lang['th_emp_action']?>
                                </th>
                                
                            </tr>
                            
                            {emp}
                            <tr>
                                <td>
                                <img class="img-circle" style="width:50px;" src="<?=base_url('uploads')?>{image}" alt="">
                                </td>
                                <td>{id}</td>
                                <td>{first_name} {last_name}</td>
                                <td>{email}</td>
                                <td>{mobile}</td>
                                <td>{position}</td>
                                <td>{gender}</td>
                                <td>{type}</td>
                                <td>
                                    <a href=" <?php echo base_url(); ?>admin/employee/edit/{id}" class="btn btn-primary btn-xs">Edit</a>
                                    <a onclick="return confirm('All records will be deleted, continue?')" href=" <?php echo base_url(); ?>admin/employee/delete/{id}" class="btn btn-danger btn-xs">Delete</a>
                                </td>
                            </tr>
                            {/emp}
                        </table>
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