<?php snippet('header') ?>

  <main role="main">

    <?php if(param('tag')): // show tag results ?>
    <?php $tag = urldecode(param('tag'));
          $articles = $pages->find('blog')
                            ->children()
                            ->visible()
                            ->filterBy('tags', $tag, ',')
                            ->flip()
                            ->paginate(10);

          echo '<h1 class="result">Articulos marcados como “<mark>' , $tag , '</mark>”</h1>';
    ?>

    <ul class="results">
      <?php foreach($articles as $article): ?>
      <li>
        <h2><a href="<?php echo $article->url() ?>"><?php echo html($article->title()) ?></a></h2>
        <div class="meta">
          <time datetime="<?php echo $article->date('c') ?>"><?php echo $article->date('d m Y'); ?></time>
          <?php if ($article->tags() != ''): ?> |
          <ul class="tags">
            <?php foreach(str::split($article->tags()) as $tag): ?>
            <li><a href="<?php echo url('blog/tag:' . urlencode($tag)) ?>">#<?php echo $tag; ?></a></li>
            <?php endforeach ?>
          </ul>
          <?php endif ?>
        </div>
      </li>
      <?php endforeach ?>
    </ul>


    <?php else: // show latest articles ?>

    <h1 class="vh">Blog</h1>

    <?php $articles = $pages->find('blog')->children()->visible()->flip()->paginate(3) ?>

    <?php foreach($articles as $article): // article overview ?>

    <?php if($article->template() == 'article.text'): // text posts ?>
    <article>
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
      <div class="text">
        <p><?php echo excerpt($article->text(), 400) ?></p>
        <a href="<?php echo $article->url() ?>">seguir leyendo →</a>
      </div>
    </article>
    

    <?php elseif($article->template() == 'article.link'): // link posts ?>
    <article>
      <header>
        <h1><a href="<?php echo $article->customlink() ?>"><?php echo html($article->linktitle()) ?> →</a></h1>
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
          <li>
            <a href="<?php echo $article->url() ?>">permalink</a>
          </li>
        </ul>
      </header>
      <div class="text">
        <?php echo kirbytext($article->text()) ?>
      </div>
    </article>

    <?php elseif($article->template() == 'article.video'): // video posts ?>
    <article>
      <header>
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
          <li>
            <a href="<?php echo $article->url() ?>">permalink</a>
          </li>
        </ul>
      </header>
      <div class="text">
        <?php echo kirbytext($article->text()) ?>
      </div>
    </article>
  
    <?php endif ?>

    <?php endforeach // article overview ends ?>


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