<?php include('header.php')?>
<div class="container">
  <div class="row" style="display:flex;justify-content:end;padding:50px 0px 0px 0px;">
    <a href="adduser" class="btn btn-lg btn-primary">+Add Articles</a>
  </div>
</div>
<!-- <?php print_r($articles);?> -->
<div class="container">
<h1>welcome to Admin Dashboard!</h1>
    <?php if($error=$this->session->flashdata('loged_in')): ?>
      <div class="alert alert-success">
        <?php echo $error; ?>
      </div>
    <?php endif ?>
    <?php if($add_msg=$this->session->flashdata('added_msg')): ?>
      <div class="alert alert-success">
        <?php echo $add_msg; ?>
      </div>
    <?php endif ?>
    <?php if($delete_article=$this->session->flashdata('delete_article')):
      $delete_class=$this->session->flashdata('delete_class')
      ?>
      <div class="alert <?= $delete_class ?>">
        <?php echo $delete_article; ?>
      </div>
    <?php endif ?>
<div class="row">
<table class="table table-striped table-bordered">
  <thead>
    <tr class="bg-primary">
      <th scope="col">#</th>
      <th scope="col">Artical Title</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php if(count($articles)): ?>
    <?php foreach ($articles as $art): ?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $art->article_title; ?></td>
      <td><a href="#" class="btn btn-primary">Edit</a></td>
      <td>
        <?= 
        form_open('admin/delarticles'),
        form_hidden('id',$art->id),
        form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
        form_close();
        ?>
      
    </tr>
    <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">Not Data Found</td>
        </tr>
    <?php endif; ?>
  </tbody>
</table>
</div>
</div>

<?php include('footer.php')?>