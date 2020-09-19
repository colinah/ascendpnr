
<form role="search" method="get" class="search-form search-form1" action="<?php echo home_url( '/' ); ?>">
    <label>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search .....…', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <!-- <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" /> -->
        <button type="submit" class="search-submit"><i id="icon-submit" class="fa fa-search"></i></button>
</form>
<button class="search-button search-button1"><i class="fa fa-search search-icon"></i></button>







<!-- <form class="example" action="/action_page.php">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form> -->