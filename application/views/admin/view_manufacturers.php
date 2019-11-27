<?php $this->load->view('admin/partials/admin_header.php'); ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?=$lang['title']?></h3>
                <?php echo $this->session->flashdata('message') ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?=$lang['title_header_all']?></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?=$lang['th_id']?></th>
                                    <th><?=$lang['th_name']?></th>
                                    <th><?=$lang['th_logo']?></th>
                                    <th><?=$lang['th_action']?></th>
                                </tr>
                            </thead>
                            <tbody>
                                {manufacturers}
                                    <tr>
                                        <td>{id}</td>
                                        <td>{manufacturer_name}</td>
                                        <td width="80px;">
                                            <img class="img-responsive" src="<?php echo base_url()."uploads"; ?> {manufacturer_logo}" alt="{manufacturer_logo}" ></td>
                                        <td>
                                        <th>
                                            <a href="<?= base_url('admin/manufacturers/deleteManufacturer/{id}')?>" class="btn btn-danger btn-xs" onclick=" return confirm('Are you sure to delete')"><?=$lang['btn_delete']?></a>
                                        </th>
                                    </tr>
                                {/manufacturers}
                            </tbody>
                        </table>
                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col -->

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?=$lang['title_header_add']?>r</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        
                        <?php echo form_open_multipart('admin/manufacturers/addManufacturer'); ?>
                            <fieldset>
                                <div class="form-group">
                                   <label for="manufacturer_name"> <?=$lang['tf_name']?>:</label>
                                   <input class="form-control" name="manufacturer_name" id="manufacturer_name" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label for="manufacturer_logo"><?=$lang['tf_logo']?></label>
                                    <input type="file" class="form-control" name="manufacturer_logo" id="manufacturer_logo">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="<?=$lang['btn_add']?>">
                                </div>
                            </fieldset>         
                        </form>

                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col --> 
        </div> <!-- /row --> 
    </div>
</div> <!-- /.col-right --> 
<!-- /page content -->



<?php $this->load->view('admin/partials/admin_footer.php'); ?>

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