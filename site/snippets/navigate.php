<nav class="nextprev cf" role="navigation">
  <?php if($prev = $page->prevVisible()): ?>
  <a class="prev" href="<?php echo $prev->url() ?>">&larr; anterior</a>
  <?php endif ?>
  <?php if($next = $page->nextVisible()): ?>
  <a class="next" href="<?php echo $next->url() ?>">siguiente &rarr;</a>
  <?php endif ?>
</nav>