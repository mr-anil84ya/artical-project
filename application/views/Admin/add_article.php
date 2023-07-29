<?php include('header.php')?>

<div class="container">
<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6" style="margin-top:30px;border:5px solid black;border-radius:20px;padding:40px;margin:20px;">
    
    <h1 class="d-flex justify-content-center">Add Articles</h1>
<?php echo form_open('admin/userValidation'); ?>
<?php echo form_hidden('user_id',$this->session->userdata('id')); ?>
  <div class="form-group">
    <label for="uname">Article Title</label>
    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Article Title','type'=>'text','name'=>'article_title','value'=>set_value('article_title')]);?>
    <?php echo form_error('article_title',"<div class='text-danger'>","</div>"); ?>
  </div>
  <div class="form-group">
    <label for="pass">Article Body</label>
    <?php echo form_textarea(['class'=>'form-control','placeholder'=>'Enter Article Body','type'=>'text','name'=>'article_body','value'=>set_value('article_body')]);?>
    <?php echo form_error('article_body',"<div class='text-danger'>","</div>"); ?>
  </div>
  <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']); ?>
  <?php echo form_reset(['type'=>'reset','class'=>'btn btn-danger','value'=>' Reset ']); ?><br>
  
  
</div>
<div class="col-lg-3"></div>
</div>
</div>

<?php include('footer.php')?>