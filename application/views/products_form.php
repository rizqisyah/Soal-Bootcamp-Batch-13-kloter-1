<?php 
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<section class="content">
        <h2 style="margin-top:0px">Products <?php echo $button ?></h2>
        <div class="box">
        <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Stock <?php echo form_error('stock') ?></label>
            <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" value="<?php echo $stock; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Category Id <?php echo form_error('category_id') ?></label>
            <select name="category_id" class="form-control">
            
            <?php foreach($dd_category as $row):?>
            <option value="<?=$row->id;?>" <?php if($row->id == $category_id) echo 'selected="selected"'; ?> > <?php echo $row->name; ?>  
            </option>
            <?php endforeach;?>
            </select>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('products') ?>" class="btn btn-default">Cancel</a>
	</form>
</div>
</div>
</section>
<?php 
$this->load->view('template/js');
$this->load->view('template/foot');
?>
