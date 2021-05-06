<transition name="fade">
<div class="mobileMenu" v-if="mobileMenu" v-cloak>
    <ul class="mr-">
        <?php $args = array(
        'menu_class' => 'nav nav-items',  
        // 'menu' => '(your_menu_id)'
        ); wp_nav_menu( $args ); ?>
    </ul>
    
</div>
</transition>
