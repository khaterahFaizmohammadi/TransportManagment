<?php $this->load->view('admin/partials/admin_header.php'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
				  <div class="row tile_count"> 
					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
						  <span class="count_top"><i class="glyphicon glyphicon-bed"></i> <?=$lang['total_vehicle']?> </span>
						  <div class="count"><?php echo count($vehicles); ?></div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
						  <span class="count_top"><i class="glyphicon glyphicon-bed"></i><?=$lang['total_employee']?> </span>
						  <div class="count"><?php echo count($employees); ?></div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
						  <span class="count_top"><i class="glyphicon glyphicon-bed"></i><?=$lang['total_custommer']?></span>
						  <div class="count"><?php echo count($customers); ?></div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
					  	<span class="count_top"><i class="glyphicon glyphicon-bed"></i><?=$lang['total_sold']?></span>
					  	<div class="count">
					  		<?php $price = 0; ?>
					  		<?php foreach($vehicles as $vehicle) : ?>
					  			<?php $price += $vehicle['selling_price']; ?>
					  		<?php endforeach; ?>
					  		<?= ' ' . $price ?>
					  	</div>
					</div>
				  </div>
            </div> <!-- /col --> 
        </div> <!-- /row -->
    </div>
</div> <!-- /.col-right --> 
<!-- /page content -->

<?php $this->load->view('admin/partials/admin_footer'); ?>
