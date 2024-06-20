<?php 

$args = array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
    'parent' => 0
);
$product_cat = get_terms($args);

$current_cat_id = 0;
if (is_product_category()) {
    $current_category = get_queried_object();
    $current_cat_id = $current_category->term_id;

    // Iteracja aż do głównej kategorii
    while ($current_category->parent != 0) {
        $current_category = get_term($current_category->parent, 'product_cat');
        $current_cat_id = $current_category->term_id;
    }
}


?>

<?php if (!empty($product_cat)): ?>
<div class="main-categories-buttons">
    <ul class="main-category-list">
        <?php foreach ($product_cat as $parent_product_cat) : ?>
            <?php 
                $is_current = ($parent_product_cat->term_id == $current_cat_id) ? ' current' : '';
            ?>
            <li class="main-category-item<?php echo $is_current; ?>">
                <a href="<?php echo get_term_link($parent_product_cat->term_id); ?>">
                    <?php echo $parent_product_cat->name; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
