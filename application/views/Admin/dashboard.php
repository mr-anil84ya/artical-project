<?php include('header.php')?>
<?php print_r($articles);?>
<div class="container">
<h1>welcome to Admin Dashboard!</h1>
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
      <td><a href="#" class="btn btn-danger">Delete</a></td>
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