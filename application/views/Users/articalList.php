<?php include('header.php')?>

<div class="container">
<h1>Users Panel</h1>
<?php echo count($article); ?>
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
      <td><a href="https://www.youtube.com/embed/<?php echo $art->article_body; ?>">https://www.youtube.com/embed/<?php echo $art->article_body; ?></a></td>
    </tr>
    <div class="row col-xs-12 col-lg-6">
      <div>
    <iframe width="460" height="315" src="https://www.youtube.com/embed/<?php echo $art->article_body; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br>
    </div>
    <h1><?php echo $art->article_title; ?></h1>
    </div>
    
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