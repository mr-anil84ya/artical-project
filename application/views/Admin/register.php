<?php include('header.php')?>

<?php if($added_user=$this->session->flashdata('added_user')):
  $user_class=$this->session->flashdata('user_class')
  ?>
<div class="container">
  <br>
  <div class="row">
    <div class="col-lg-12">
      <div class="alert <?= $user_class ?>">
        <?php echo $added_user; ?>
      </div>
    </div>
  </div>
</div>
<?php endif ?>
<div class="container">
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6" style="margin-top:30px;border:5px dashed red;border-radius:20px;padding:40px;margin:20px;">
    <h1 class="d-flex justify-content-center">Registration Form</h1>
<?php echo form_open('users/sendemail'); ?>
  <div class="form-group">
    <label for="uname">Username</label>
    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','type'=>'text','name'=>'username','value'=>set_value('username')]);?>
    <?php echo form_error('username',"<div class='text-danger'>","</div>"); ?>
  </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <?php echo form_password(['class'=>'form-control','placeholder'=>'Enter Password','type'=>'password','name'=>'password','value'=>set_value('password')]);?>
    <?php echo form_error('password',"<div class='text-danger'>","</div>"); ?>
  </div>
  <div class="form-group">
    <label for="uname">First Name</label>
    <?php echo form_input(['class'=>'form-control','placeholder'=>'First Name','type'=>'text','name'=>'firstname','value'=>set_value('firstname')]);?>
    <?php echo form_error('firstname',"<div class='text-danger'>","</div>"); ?>
  </div> <div class="form-group">
    <label for="uname">Last Name</label>
    <?php echo form_input(['class'=>'form-control','placeholder'=>'Last Name','type'=>'text','name'=>'lastname','value'=>set_value('lastname')]);?>
    <?php echo form_error('lastname',"<div class='text-danger'>","</div>"); ?>
  </div> <div class="form-group">
    <label for="uname">Email</label>
    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Email','type'=>'text','name'=>'email','value'=>set_value('email')]);?>
    <?php echo form_error('email',"<div class='text-danger'>","</div>"); ?>
  </div>
  <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']); ?>
  <?php echo form_reset(['type'=>'reset','class'=>'btn btn-danger','value'=>' Reset ']); ?><br>
  <span>User Login? <a href="<?php echo site_url('login/index')?>">Sign In</a></span>
</div>
<div class="col-lg-3"></div>
</div>
</div>

<?php include('footer.php')?>