<?php
  $query = get('q');
  $results = page('blog')
                ->search($query, array('words' => true))
                ->visible()->sortBy('date', 'desc')
                ->paginate(3);
?>
<?php snippet('header') ?>

  <main role="main">

    <?php $countItems = $results->pagination()->countItems();

          if($results) {

            echo '<h1 class="result">';

            if($countItems == 0) {
              echo 'No hay resultados';
            }
            elseif($countItems == 1) {
              echo $countItems , ' resultado';
            }
            else {
              echo $countItems , ' resultados';
            }

            echo  ' para “<mark>' , $query , '</mark>”</h1>';
    } ?>

    <?php if($results->count() != 0): ?>
    <?php foreach($articles as $article): ?>
    <article class="results">
      <header>
        <h1><a href="<?php echo $article->url() ?>"><?php echo html($article->title()) ?></a></h1>          
          <ul class="tags meta">
            <li>
              <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('d m Y'); ?></time>
            </li>
            <?php if($article->tags() != ''): ?>
            <?php foreach(str::split($article->tags()) as $tag): ?>
            <li> 
              <a href="<?php echo url('tag:' . urlencode($tag)) ?>">#<?php echo $tag; ?></a>
            </li>
            <?php endforeach ?>
              
            <?php endif ?>
          </ul> 
      </header>
<!--       <div class="text">
        <p><?php echo excerpt($article->text(), 100) ?></p>
        <a href="<?php echo $article->url() ?>">seguir leyendo →</a>
      </div> -->
    </article>
    <?php endforeach ?>
    <?php endif ?>

    <?php if($articles->pagination()->hasPages()): // pagination ?>
      <nav class="nextprev cf" role="navigation">
        <?php if($articles->pagination()->hasprevPage()): ?>
        <a class="prev" href="<?php echo $articles->pagination()->prevPageURL() ?>">&larr; anterior</a>
        <?php endif ?>
        <?php if($articles->pagination()->hasnextPage()): ?>
        <a class="next" href="<?php echo $articles->pagination()->nextPageURL() ?>">siguiente &rarr;</a>
        <?php endif ?>
      </nav>
    <?php endif ?> 

  </main>

<?php snippet('footer') ?>