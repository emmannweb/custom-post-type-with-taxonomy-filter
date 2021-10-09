<?php get_header(); ?>
    <section class="container-fluid custom_box">
      <div class="container">

        <div class="banner">

          <div class="banner_overlay">
            <div class="custom_menu">
              <div class="logo">
                <!-- <img src="images/onex-1.png" alt="labo web firm"> -->
                <h4 class="logo">labo web firm</h4>
              </div>
              <div class="barr">
                <i class="fa fa-bars"></i>
              </div>
            </div>

            <header>
              <div class="header_text">
                <div class="first_subtitle">
                  <h4>Digital Agency</h4>
                </div>
                <div class="main_title">
                  <h1>Labo Web Firm</h1>
                </div>
                <div class="saber_mais">
                  <a class="btn btn-default  btn_csutom"href="#"> Read More</a>

                </div>
              </div>
            </header>

          </div>
        </div>

      </div>

    </section>

    <!-- PORQUE ESCOLHER A ONEX -->
    <section class="container-fluid " >
      <div class="container pq_onex">
        <div class="row">
          <div class="col-sm-6 col_pd">
            <div class="title_pr_escolher">
              <h1>Why choosing  <span class="span_onex">Labo Web Firm</span>to make your project?</h1>
            </div>
            <div class="desc_pq">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                 sed do eiusmod tempor incid clas idunt ut labore et dolore magna aliqua.
                 Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                 ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                  in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                 Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                  officia deserunt mollit anim id est laborum.</p>
            </div>

          </div>
          <div class="col-sm-6 col_pd">
            <div class="col_img">
                <img class="img-fluid"src="<?php echo get_template_directory_uri() . '/'?>images/pq_img.jpg" alt="">
            </div>
          </div>
        </div>

      </div>

    </section>
    <div class="container container_filter">

          <div class="filters filter-button-group">
          		  <ul><h4>
          		    <li class="active" data-filter="*">All</li>

                  <?php
                    $terms = get_terms('porfiolio_category');
                    foreach ($terms as  $term) { ?>
                      <li data-filter=".<?php  echo $term->slug; ?>"><?php echo $term->name; ?></li>
                <?php  }

                  ?>
          		    <!-- <li data-filter=".webdesign">Logo</li>
          		    <li data-filter=".webdev">videos</li>
          		    <li data-filter=".brand">Websites</li> -->
          		  </h4></ul>
          		</div>

          		<div class="content grid">
                <?php
                    $args = array(
                      'post_type' => 'portfolio',
                      'posts_per_page' => 8
                    );

                    $query = new WP_Query($args);

                    while ($query->have_posts()) {
                      $query->the_post();

                      $termsArray = get_the_terms($post->ID, 'porfiolio_category');

                      $termsSLug = "";
                      foreach ($termsArray as $term) {
                        $termsSLug .= $term->slug . ' ';
                      }

                      ?>

                      <div class="single-content <?php echo  $termsSLug; ?>  grid-item">
                        <img class="p2" src="<?php the_post_thumbnail_url(); ?>">
                      </div>

                <?php  }

                  ?>




            </div>
    </div>
<?php get_footer(); ?>
