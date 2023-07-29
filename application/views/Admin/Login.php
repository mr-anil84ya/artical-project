<?php include('header.php')?>

<div class="container">
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6" style="margin-top:30px;border:5px dashed red;border-radius:20px;padding:40px;margin:20px;">
    
    <h1 class="d-flex justify-content-center">Login Form</h1>
    <?php if($error=$this->session->flashdata('login_failed')): ?>
      <div class="alert alert-danger">
        <?php echo $error; ?>
      </div>
    <?php endif ?>
    <?php if($err=$this->session->flashdata('log_out')): ?>
      <div class="alert alert-info">
        <?php echo $err; ?>
      </div>
    <?php endif ?>
<?php echo form_open('login/index'); ?>
  <div class="form-group">
    <label for="uname">Username</label>
    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','type'=>'text','name'=>'uname','value'=>set_value('uname')]);?>
    <?php echo form_error('uname',"<div class='text-danger'>","</div>"); ?>
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <?php echo form_password(['class'=>'form-control','placeholder'=>'Enter Password','type'=>'password','name'=>'pass','value'=>set_value('pass')]);?>
    <?php echo form_error('pass',"<div class='text-danger'>","</div>"); ?>
  </div>
  <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']); ?>
  <?php echo form_reset(['type'=>'reset','class'=>'btn btn-danger','value'=>' Reset ']); ?><br>
  <span>User Not Register? <a href="<?php echo site_url('users/register')?>">Sign Up</a></span>
  
</div>
<div class="col-lg-3"></div>
</div>
</div>

<?php include('footer.php')?>