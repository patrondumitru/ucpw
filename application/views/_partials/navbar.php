
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?php echo $site_name; ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <?php 
          //debug($this->multi_menu);
          if (isset($multi_menu)) {echo $this->multi_menu->render(); }
        ?>

         <div class="dropdown m-b">
        <button class="btn" type="button" data-toggle="dropdown">Forms</button>

        <?php
        if (isset($iframe_items)){
          echo '<ul class="dropdown-menu" role="menu">';
            foreach ($iframe_items as $menu_link){
                echo '<li class="dropdown-submenu"><a href="'.site_url('en/iframe/'.$menu_link['id']).'" >'.$menu_link['url_name'].'</a></li>';
            }
          echo '</ul>';
          }
        ?>

    </div>

        </div>
      </div>
    </nav>