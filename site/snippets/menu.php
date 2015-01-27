<nav role="navigation">

  <ul class="menu cf">
    <?php foreach($pages->visible() as $p): ?>
    <li>
      <a <?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>

      <?php if($p->hasVisibleChildren()): ?>
      <ul class="submenu">
        <?php foreach($p->children()->visible() as $p): ?>
        <li>
          <a href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
        </li>
        <?php endforeach ?>
      </ul>
      <?php endif ?>
    </li>
    <?php endforeach ?>
  </ul>
  <form class="search" role="search" action="<?php echo url('search') ?>">
    <label class="vh" for="search">Search</label>
    <input type="search" class="searchword" name="q" id="search" placeholder="Search..."/>
  </form>
</nav>