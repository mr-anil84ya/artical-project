<?php include('header.php')?>

<div class="container">
<h1>Users Panel</h1>
<div class="row">
<table class="table table-striped table-bordered">
  <thead>
    <tr class="bg-primary">
      <th scope="col">#</th>
      <th scope="col">Artical Title</th>
      <th scope="col">Article Body</th>
    
    </tr>
  </thead>
  <tbody>
    <?php if(count($article)): ?>
    <?php foreach ($article as $art): ?>
    <tr>
      <th scope="row"><?php echo $art->id; ?></th>
      <td><?php echo $art->article_title; ?></td>
      <td><?php echo $art->article_body; ?></td>
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