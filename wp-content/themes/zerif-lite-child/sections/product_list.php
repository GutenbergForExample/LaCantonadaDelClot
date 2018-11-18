<section class="focus" id="productlist">
    <div class="container">
        <!-- SECTION HEADER -->
        <div class="section-header">
            <!-- SECTION TITLE AND SUBTITLE -->
            <?php
            /* Title */
            zerif_productlist_header_title_trigger();

            /* Subtitle */
            zerif_productlist_header_subtitle_trigger();
            ?>
        </div>
        <div class="row">
                <?php
                if ( is_active_sidebar( 'product-list-sidebar' ) ) {
                    dynamic_sidebar( 'product-list-sidebar' );
                } else  {
                    echo "<div class=\"woocommerce-page\">"; 
                    echo do_shortcode("[products]");
                    echo "</div>"; 
                }
                ?>
        
    </div> <!-- / END CONTAINER -->
</section>  <!-- / END NEW SECTION -->
