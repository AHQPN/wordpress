<?php
/**
 * Dynamic Render for SM Header
 * Builds a megamenu up to 3 levels deep from a standard WordPress Nav Menu.
 */

// Attributes passed from the block
$logo_url          = $attributes['logoUrl'] ?? '';
$logo_width        = $attributes['logoWidth'] ?? 160;
$site_name         = $attributes['siteName'] ?? 'LACOSTE';
$menu_id           = $attributes['menuId'] ?? 0;
$bg_color          = $attributes['bgColor'] ?? '#ffffff';
$text_color        = $attributes['textColor'] ?? '#000000';
$show_search       = $attributes['showSearch'] ?? true;
$show_locale       = $attributes['showLocale'] ?? true;
$show_storeLocator = $attributes['showStoreLocator'] ?? true;
$store_locator_url = $attributes['storeLocatorUrl'] ?? '#';
$show_account      = $attributes['showAccount'] ?? true;
$show_cart         = $attributes['showCart'] ?? true;
$sticky_header     = $attributes['stickyHeader'] ?? true;

$wrapper_attributes = get_block_wrapper_attributes( [
    'class'       => 'sm-header-wrapper',
    'data-sticky' => $sticky_header ? 'true' : 'false',
    'style'       => '--sm-header-bg:' . esc_attr( $bg_color ) . ';--sm-header-text:' . esc_attr( $text_color ) . ';',
] );

// Helper function to build a hierarchical tree from a flat array of wp_nav_menu items
function sm_build_menu_tree( array $elements, $parentId = 0 ) {
    $branch = array();
    foreach ( $elements as $element ) {
        if ( $element->menu_item_parent == $parentId ) {
            $children = sm_build_menu_tree( $elements, $element->ID );
            if ( $children ) {
                $element->children = $children;
            } else {
                $element->children = array();
            }
            $branch[] = $element;
        }
    }
    return $branch;
}

$menu_tree = [];
if ( $menu_id ) {
    $raw_menu_items = wp_get_nav_menu_items( $menu_id );
    if ( $raw_menu_items && ! is_wp_error( $raw_menu_items ) ) {
        $menu_tree = sm_build_menu_tree( $raw_menu_items );
    }
}

function sm_has_submenu( $item ) {
    return ! empty( $item->children );
}

?>
<div <?php echo $wrapper_attributes; ?>>
    <!-- ============ HEADER BAR ============ -->
    <header class="sm-header" id="sm-header">
        <div class="sm-header__inner">

            <?php if ( $show_search ) : ?>
                <!-- Mobile left: Search -->
                <div class="sm-header__mobile-left sm-header__mobile-only">
                    <button type="button" class="sm-header__search-trigger" aria-label="Search">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8" /><line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
                    </button>
                </div>
            <?php endif; ?>

            <!-- Logo LEFT -->
            <div class="sm-header__logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sm-header__logo-link">
                    <?php if ( $logo_url ) : ?>
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $site_name ); ?>" class="sm-header__logo-img sm-header__logo-img--desktop" style="width: <?php echo esc_attr( $logo_width ); ?>px" />
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $site_name ); ?>" class="sm-header__logo-img sm-header__logo-img--mobile sm-header__mobile-only" style="width: 100px" />
                    <?php else : ?>
                        <span class="sm-header__logo-text sm-header__logo-text--desktop"><?php echo esc_html( $site_name ); ?></span>
                        <span class="sm-header__logo-text sm-header__logo-text--mobile sm-header__mobile-only"><?php echo esc_html( $site_name ); ?></span>
                    <?php endif; ?>
                </a>
            </div>

            <!-- Nav CENTER -->
            <nav class="sm-header__nav" id="sm-nav" aria-label="Main navigation">
                <ul class="sm-header__nav-list">
                    <?php foreach ( $menu_tree as $i => $item ) : ?>
                        <li class="sm-header__nav-item<?php echo sm_has_submenu( $item ) ? ' has-submenu' : ''; ?>" data-menu-index="<?php echo $i; ?>">
                            <?php if ( sm_has_submenu( $item ) ) : ?>
                                <button type="button" class="sm-header__nav-link" aria-expanded="false" aria-controls="sm-mega-<?php echo $i; ?>">
                                    <span><?php echo esc_html( $item->title ); ?></span>
                                    <svg class="sm-icon-chevron" width="8" height="5" viewBox="0 0 8 5" fill="none"><path d="M1 1l3 3 3-3" stroke="currentColor" stroke-width="1.5"/></svg>
                                </button>
                            <?php else : ?>
                                <a href="<?php echo esc_url( $item->url ); ?>" class="sm-header__nav-link">
                                    <span><?php echo esc_html( $item->title ); ?></span>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    
                    <?php if ( $show_search ) : ?>
                        <li class="sm-header__nav-item sm-header__nav-item--search sm-header__desktop-only">
                            <button type="button" class="sm-header__nav-link sm-header__search-trigger" aria-label="Search">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8" /><line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
                            </button>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>

            <!-- Utilities RIGHT -->
            <div class="sm-header__utilities">
                <?php if ( $show_locale ) : ?>
                    <div class="sm-header__lang-switcher sm-header__desktop-only">
                        <button type="button" class="sm-header__utility-text sm-header__lang-toggle" aria-expanded="false" aria-label="Change language">EN</button>
                    </div>
                <?php endif; ?>
                
                <?php if ( $show_storeLocator ) : ?>
                    <a href="<?php echo esc_url( $store_locator_url ); ?>" class="sm-header__icon-btn sm-header__desktop-only" aria-label="Store locator">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" /><circle cx="12" cy="10" r="3" /></svg>
                    </a>
                <?php endif; ?>

                <?php if ( $show_account ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="sm-header__icon-btn sm-header__desktop-only" aria-label="Account">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" /><circle cx="12" cy="7" r="4" /></svg>
                    </a>
                <?php endif; ?>

                <?php if ( $show_cart ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'cart' ) ); ?>" class="sm-header__icon-btn sm-header__cart-btn" aria-label="Cart">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" /><line x1="3" y1="6" x2="21" y2="6" /><path d="M16 10a4 4 0 0 1-8 0" /></svg>
                        <span class="sm-header__cart-count" data-cart-count="">
                            <?php echo WC()->cart ? WC()->cart->get_cart_contents_count() : '0'; ?>
                        </span>
                    </a>
                <?php endif; ?>

                <button type="button" class="sm-header__hamburger sm-header__mobile-only" aria-label="Menu" id="sm-hamburger">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="3" y1="6" x2="21" y2="6" /><line x1="3" y1="12" x2="21" y2="12" /><line x1="3" y1="18" x2="21" y2="18" /></svg>
                </button>
            </div>
        </div>
    </header>
    
    <!-- ============ SEARCH BAR OVERLAY ============ -->
    <?php if ( $show_search ) : ?>
        <div class="sm-header__search-bar" id="sm-search-bar" aria-hidden="true">
            <div class="sm-header__search-bar-inner">
                <form role="search" method="get" class="sm-header__search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="sm-header__search-field-wrap">
                        <svg class="sm-header__search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8" /><line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
                        <input 
                            type="search" 
                            id="sm-header-search-input"
                            class="sm-header__search-input" 
                            placeholder="<?php echo esc_attr__( 'Tìm kiếm sản phẩm...', 'sm-storefront' ); ?>" 
                            value="<?php echo get_search_query(); ?>" 
                            name="s" 
                            autocomplete="off"
                        />
                        <input type="hidden" name="post_type" value="product" />
                    </div>
                </form>
                <button type="button" class="sm-header__search-close" id="sm-search-close" aria-label="Close search">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                </button>
            </div>

            <!-- Live Search Results -->
            <div class="sm-search-results" id="sm-search-results" aria-live="polite">
                <div class="sm-search-results__loading" id="sm-search-loading" style="display:none;">
                    <div class="sm-search-results__spinner"></div>
                    <span>Đang tìm kiếm...</span>
                </div>
                <div class="sm-search-results__list" id="sm-search-results-list"></div>
                <div class="sm-search-results__empty" id="sm-search-empty" style="display:none;">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><circle cx="11" cy="11" r="8" /><line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
                    <p>Không tìm thấy sản phẩm nào.</p>
                </div>
                <a href="#" class="sm-search-results__view-all" id="sm-search-view-all" style="display:none;">
                    Xem tất cả kết quả →
                </a>
            </div>
        </div>
    <?php endif; ?>

    <!-- ============ MEGA MENU PANELS (Desktop) ============ -->
    <?php foreach ( $menu_tree as $i => $top_item ) : ?>
        <?php if ( sm_has_submenu( $top_item ) ) : ?>
            <div class="sm-mega" id="sm-mega-<?php echo $i; ?>" aria-hidden="true" data-mega-index="<?php echo $i; ?>">
                <div class="sm-mega__overlay" data-mega-close=""></div>
                <div class="sm-mega__panel">
                    <button type="button" class="sm-mega__close" data-mega-close="" aria-label="Close menu">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                    </button>
                    <div class="sm-mega__body">
                        <div class="sm-mega__columns">
                            <!-- Level 1 Items (Columns) -->
                            <?php foreach ( $top_item->children as $ci => $child_item ) : ?>
                                <div class="sm-mega__col">
                                    <?php if ( sm_has_submenu( $child_item ) ) : ?>
                                        <h3 class="sm-mega__col-title"><?php echo esc_html( $child_item->title ); ?></h3>
                                        <ul class="sm-mega__list">
                                            <!-- Level 2 Items (Links) -->
                                            <?php foreach ( $child_item->children as $gi => $grandchild_item ) : ?>
                                                <li><a href="<?php echo esc_url( $grandchild_item->url ); ?>" class="sm-mega__link"><?php echo esc_html( $grandchild_item->title ); ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else : ?>
                                        <a href="<?php echo esc_url( $child_item->url ); ?>" class="sm-mega__col-title sm-mega__col-title--link"><?php echo esc_html( $child_item->title ); ?></a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <!-- ============ MOBILE DRAWER ============ -->
    <div class="sm-mobile-drawer" id="sm-mobile-drawer" aria-hidden="true">
        <div class="sm-mobile-drawer__overlay" data-drawer-close=""></div>
        <div class="sm-mobile-drawer__panels">
            
            <!-- Main panel (Level 0) -->
            <div class="sm-mobile-drawer__panel is-active" data-panel-id="main">
                <div class="sm-mobile-drawer__header">
                    <button type="button" class="sm-mobile-drawer__close" data-drawer-close="" aria-label="Close menu">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                    </button>
                </div>
                <nav class="sm-mobile-drawer__nav">
                    <ul class="sm-mobile-drawer__list">
                        <?php foreach ( $menu_tree as $i => $item ) : ?>
                            <li class="sm-mobile-drawer__item">
                                <?php if ( sm_has_submenu( $item ) ) : ?>
                                    <button type="button" class="sm-mobile-drawer__link" data-drill-trigger="panel-<?php echo $i + 1; ?>">
                                        <span><?php echo esc_html( $item->title ); ?></span>
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                                    </button>
                                <?php else : ?>
                                    <a href="<?php echo esc_url( $item->url ); ?>" class="sm-mobile-drawer__link"><span><?php echo esc_html( $item->title ); ?></span></a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <div class="sm-mobile-drawer__secondary">
                        <ul class="sm-mobile-drawer__secondary-list">
                            <?php if ( $show_account ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="sm-mobile-drawer__secondary-link">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" /><circle cx="12" cy="7" r="4" /></svg>
                                        <span>My Account</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ( $show_storeLocator ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( $store_locator_url ); ?>" class="sm-mobile-drawer__secondary-link">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" /><circle cx="12" cy="10" r="3" /></svg>
                                        <span>Find a boutique</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
            </div>

            <!-- Sub panels (Level 1) -->
            <?php foreach ( $menu_tree as $i => $top_item ) : ?>
                <?php if ( sm_has_submenu( $top_item ) ) : ?>
                    <div class="sm-mobile-drawer__panel" data-panel-id="panel-<?php echo $i + 1; ?>" data-parent-panel="main">
                        <div class="sm-mobile-drawer__header">
                            <button type="button" class="sm-mobile-drawer__back" data-drill-back="" aria-label="Back">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                            </button>
                            <div class="sm-mobile-drawer__breadcrumbs">
                                <span>Home</span> / <span><?php echo esc_html( $top_item->title ); ?></span>
                            </div>
                            <button type="button" class="sm-mobile-drawer__close" data-drawer-close="" aria-label="Close">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                            </button>
                        </div>
                        <div class="sm-mobile-drawer__content">
                            <h2 class="sm-mobile-drawer__panel-title"><?php echo esc_html( $top_item->title ); ?></h2>
                            <ul class="sm-mobile-drawer__sub-list">
                                <?php foreach ( $top_item->children as $ci => $child_item ) : ?>
                                    <li>
                                        <?php if ( sm_has_submenu( $child_item ) ) : ?>
                                            <button type="button" class="sm-mobile-drawer__sub-link" data-drill-trigger="subpanel-<?php echo $i + 1; ?>-<?php echo $ci + 1; ?>">
                                                <span><?php echo esc_html( $child_item->title ); ?></span>
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                                            </button>
                                        <?php else : ?>
                                            <a href="<?php echo esc_url( $child_item->url ); ?>" class="sm-mobile-drawer__sub-link"><span><?php echo esc_html( $child_item->title ); ?></span></a>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Sub-sub panels (Level 2) -->
            <?php foreach ( $menu_tree as $i => $top_item ) : ?>
                <?php if ( sm_has_submenu( $top_item ) ) : ?>
                    <?php foreach ( $top_item->children as $ci => $child_item ) : ?>
                        <?php if ( sm_has_submenu( $child_item ) ) : ?>
                            <div class="sm-mobile-drawer__panel" data-panel-id="subpanel-<?php echo $i + 1; ?>-<?php echo $ci + 1; ?>" data-parent-panel="panel-<?php echo $i + 1; ?>">
                                <div class="sm-mobile-drawer__header">
                                    <button type="button" class="sm-mobile-drawer__back" data-drill-back="" aria-label="Back">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                                    </button>
                                    <div class="sm-mobile-drawer__breadcrumbs">
                                        <span>Home</span> / <span><?php echo esc_html( $top_item->title ); ?></span> / <span><?php echo esc_html( $child_item->title ); ?></span>
                                    </div>
                                    <button type="button" class="sm-mobile-drawer__close" data-drawer-close="" aria-label="Close">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                                    </button>
                                </div>
                                <div class="sm-mobile-drawer__content">
                                    <h2 class="sm-mobile-drawer__panel-title"><?php echo esc_html( $child_item->title ); ?></h2>
                                    <ul class="sm-mobile-drawer__sub-list">
                                        <?php foreach ( $child_item->children as $gi => $grandchild_item ) : ?>
                                            <li>
                                                <a href="<?php echo esc_url( $grandchild_item->url ); ?>" class="sm-mobile-drawer__sub-link"><span><?php echo esc_html( $grandchild_item->title ); ?></span></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>
    </div>

    <?php if ( $show_search ) : ?>
    <script>
        var smHeaderSearch = <?php echo wp_json_encode( array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'sm_header_search_nonce' ),
        ) ); ?>;
    </script>
    <?php endif; ?>
</div>
