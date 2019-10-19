<?php
$this->load->view('templates/header');
?>
<div class="row">
    <div class="col-lg-12">
        <h2>CodeIgniter Contact Form Example</h2>                 
    </div>
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-12">        
        <a href="<?php print site_url();?>" class="pull-right btn btn-primary btn-xs" style="margin: 2px;;"><i class="fa fa-list"></i> List</a>
        <a href="#" class="pull-right btn btn-info btn-xs" style="margin: 2px;"><i class="fa fa-mail-reply"></i> Back To Tutorial</a>                
    </div>
</div><!-- /.row -->
<br>
<div class="row">
    <div class="col-lg-12">
        <?php if(!empty($this->session->flashdata('msg'))){ ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('msg'); ?>
            </div>        
        <?php } ?>
        <?php if(validation_errors()) { ?>
          <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
          </div>
        <?php } ?>
    </div>
</div>
 <form action="<?php print site_url();?>contact/send" method="POST" class="add-emp" id="add-emp">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-user-o"></i>
                    </span>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Full Name">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
        </div>    
        <div class="col-lg-6">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </span>
                    <input type="text" name="contact_no" class="form-control" id="contact-no" placeholder="Contact No.">
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-comments"></i>
                    </span>
                    <textarea name="comment" cols="3" rows="5" class="form-control" id="comment" placeholder="Comments"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-right">
            <button type="reset" name="reset_add_emp" id="re-submit-emp" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
            <button type="submit" name="add_emp" id="submit-emp" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
        </div>
    </div>  
</form>
<?php
$this->load->view('templates/footer');
?>