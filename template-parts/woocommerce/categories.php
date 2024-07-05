<?php 

$args = array(
      'taxonomy' => 'product_cat',
      'hide_empty' => false,
      'parent'   => 0
  );
$product_cat = get_terms( $args );

?>

<?php if( !empty($product_cat)): ?>
<section class="widget main-categories-filter desktop-main-categories d-sm-block d-none">
    <div id="accordion-p-categories" class="accordion-transparent accordion">
       <?php foreach($product_cat as $parent_product_cat) : ?>
        <?php $termchildren = get_term_children( $parent_product_cat->term_id, 'product_cat' ); ?>
        <div class="card">
            <div class="card-header" id="headingOne-<?php echo $parent_product_cat->term_id; ?>">
                <h4 class="mb-0">
                    <span class="parent-cat-name">            
                        <?php echo '<a href="'.get_term_link($parent_product_cat->term_id).'">'.$parent_product_cat->name.'</a>' ?>         
                    </span>
                    <span>
                        <div class="angle-dropdown-cat">
                            <?php if (!empty($termchildren)): ?>
                                <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#prod-category-sn-<?php echo $parent_product_cat->term_id; ?>" aria-expanded="true" aria-controls="prod-category-sn-<?php echo $parent_product_cat->term_id; ?>">
                                    <img class="accordion-item-arow" style="height: 12px;" src="<?php echo PATH_SN ?>/uploads/angle-down.svg"  alt="angle">
                                </button>
                            <?php else: ?>
                                <div class="arrow-none-cat"></div>
                            <?php endif; ?>
                        </div>
                    </span>
                    
                </h4>
            </div>
            <?php if( !empty( $termchildren )): ?>
            <div id="prod-category-sn-<?php echo $parent_product_cat->term_id; ?>" class="collapse children-cat-items" aria-labelledby="headingOne-<?php echo $parent_product_cat->term_id; ?>" data-bs-parent="#accordion">
                <div class="card-body">
                    <ul class="list-group">
                        <?php 
                        $child_args = array(
                            'taxonomy'   => 'product_cat',
                            'hide_empty' => false,
                            'parent'     => $parent_product_cat->term_id
                        );
                        $child_product_cats = get_terms( $child_args );
                        foreach ($child_product_cats as $child_product_cat)
                        {
                            echo '<li class="list-group-item"><a href="'.get_term_link($child_product_cat->term_id).'">'.$child_product_cat->name.'</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<!-- Mobile categories filter -->
<div class="mobile-main-cat-filer d-sm-none d-block mb-4">
    <!-- <p class="d-inline-flex gap-1"> -->
 
      <button class="btn btn-bordered filter-collapse-btn" type="button" data-bs-toggle="collapse" data-bs-target="#main-categories-collapse" aria-expanded="false" aria-controls="main-categories-collapse">
        Kategorie
      </button>
    <!-- </p> -->
    <div class="collapse" id="main-categories-collapse">
      <div class="card card-body">
         <div id="accordion-p-categories" class="accordion-transparent accordion">
           <?php foreach($product_cat as $parent_product_cat) : ?>
            <?php $termchildren = get_term_children( $parent_product_cat->term_id, 'product_cat' ); ?>
            <div class="card">
                <div class="card-header" id="headingOne-<?php echo $parent_product_cat->term_id; ?>">
                    <h4 class="mb-0">
                        <span class="parent-cat-name">            
                            <?php echo '<a href="'.get_term_link($parent_product_cat->term_id).'">'.$parent_product_cat->name.'</a>' ?>         
                        </span>
                        <span>
                            <div class="angle-dropdown-cat">
                                <?php if (!empty($termchildren)): ?>
                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#prod-category-sn-<?php echo $parent_product_cat->term_id; ?>" aria-expanded="true" aria-controls="prod-category-sn-<?php echo $parent_product_cat->term_id; ?>">
                                        <img class="accordion-item-arow" style="height: 12px;" src="<?php echo PATH_SN ?>/uploads/angle-down.svg"  alt="angle">
                                    </button>
                                <?php else: ?>
                                    <div class="arrow-none-cat"></div>
                                <?php endif; ?>
                            </div>
                        </span>
                        
                    </h4>
                </div>
                <?php if( !empty( $termchildren )): ?>
                <div id="prod-category-sn-<?php echo $parent_product_cat->term_id; ?>" class="collapse children-cat-items" aria-labelledby="headingOne-<?php echo $parent_product_cat->term_id; ?>" data-bs-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-group">
                            <?php 
                            $child_args = array(
                                'taxonomy'   => 'product_cat',
                                'hide_empty' => false,
                                'parent'     => $parent_product_cat->term_id
                            );
                            $child_product_cats = get_terms( $child_args );
                            foreach ($child_product_cats as $child_product_cat)
                            {
                                echo '<li class="list-group-item"><a href="'.get_term_link($child_product_cat->term_id).'">'.$child_product_cat->name.'</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
      </div>
    </div>    
</div>

<!-- Mobile categories filter end -->

<script type="text/javascript">
jQuery(document).ready(function($) {
  $('.accordion .btn-link').on('click', function(){
    $(this).find('.accordion-item-arow').toggleClass('item-expanded');
  });
});
</script>
