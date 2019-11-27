<?php $this->load->view('admin/partials/admin_header.php'); ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?=$lang['title']?></h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <hr>

        <!-- add new model -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".add-model"><?=$lang['btn_add']?></button>

        <div class="modal fade add-model" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel"><?=$lang['title_header']?></h4>
                    </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('admin/car_model/addModel'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <label for="model_name"> <?=$lang['tf_name']?>:</label>
                                    <input type="text" class="form-control" name="model_name">
                                </div>
                                <div class="form-group">
                                   <label for="manufacturer_id"> <?=$lang['tf_mf_name']?>:</label>
                                   <select name="manufacturer_id" id="manufacturer_id" class="form-control">
                                        {manufacturers}
                                            <option value="{id}" >{manufacturer_name}</option>
                                        {/manufacturers}
                                   </select>
                                </div>

                                <div class="form-group">
                                    <label for="model_description"><?=$lang['tf_description']?>:</label>
                                    <textarea name="model_description" id="model_description"  rows="10" class="form-control summernote"></textarea>
                                </div>
                            
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="buttonSubmit" value="<?=$lang['btn_add']?>">
                                </div>
                            </fieldset>         
                        </form>
                </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <!-- /add-new-model --> 
        
        <!-- all models --> 
        <div class="row">
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?=$lang['title_header']?></h2>
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
                                    <th><?=$lang['th_mf_name']?></th>
                                    <th><?=$lang['th_discription']?></th>
                                    <th><?=$lang['th_action']?></th>
                                </tr>
                            </thead>
                            <tbody>


                                {models}
                                    <tr>
                                        <td>{id}</td>
                                        <td>{model_name}</td>
                                        <td>{manufacturer_name}</td>
                                        <td>{model_description}</td>
                                        
                                        <td>
                                            <ul class="list-inline">
                                              <!--  <li><a href="#" class="btn btn-primary btn-xs">Edit</a></li>  -->
                                                <li><a href="<?= base_url('admin/car_model/deleteModel/{id}'); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?')"><?=$lang['btn_delete']?></a></li>
                                            </ul>
                                        </td>
                                        
                                    </tr>
                                {/models}
                            </tbody>
                        </table>
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