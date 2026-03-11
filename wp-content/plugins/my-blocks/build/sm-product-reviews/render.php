<?php
/**
 * Dynamic render for SM Product Reviews block.
 */

if ( ! function_exists( 'wc_get_product' ) ) {
	return;
}

global $product;
if ( ! is_a( $product, 'WC_Product' ) ) {
	$product = wc_get_product( get_the_ID() );
}

if ( empty( $product ) ) {
	return;
}

$product_id = $product->get_id();
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

// Calculate star distribution
$ratings = array( 5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0 );
if ( $review_count > 0 ) {
    $comments = get_comments( array(
        'post_id' => $product_id,
        'status'  => 'approve',
        'type'    => 'review',
    ) );
    foreach ( $comments as $comment ) {
        $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
        if ( $rating >= 1 && $rating <= 5 ) {
            $ratings[ $rating ]++;
        }
    }
}

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'sm-product-reviews' ) );
?>
<section <?php echo $wrapper_attributes; ?> id="reviews">
    <div class="sm-reviews-inner">
        <div class="sm-reviews-header">
            <h3 class="sm-reviews-header-title"><?php esc_html_e( 'Customer Reviews', 'my-blocks' ); ?></h3>
        </div>

        <!-- Summary Section -->
        <div class="sm-reviews-summary">
            <div class="sm-summary-left">
                <div class="sm-avg-rating"><?php echo number_format( $average, 1 ); ?></div>
                <div class="star-rating">
                    <?php echo wc_get_rating_html( $average ); ?>
                </div>
                <div class="sm-total-count">
                    <?php echo sprintf( _n( 'Based on %s review', 'Based on %s reviews', $review_count, 'my-blocks' ), esc_html( $review_count ) ); ?>
                </div>
            </div>

            <div class="sm-summary-bars">
                <?php for ( $i = 5; $i >= 1; $i-- ) : 
                    $count = $ratings[ $i ];
                    $percentage = $review_count > 0 ? ( $count / $review_count ) * 100 : 0;
                ?>
                    <div class="sm-bar-item">
                        <div class="sm-bar-label"><?php echo $i; ?> <span style="color: #ffb400; font-size: 10px;">★</span></div>
                        <div class="sm-bar-track">
                            <div class="sm-bar-fill" style="width: <?php echo esc_attr( $percentage ); ?>%;"></div>
                        </div>
                        <div class="sm-bar-count"><?php echo esc_html( $count ); ?></div>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="sm-summary-right">
                <button class="sm-write-review-btn" onclick="document.querySelector('.sm-review-modal').classList.add('active')">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19 7-7 3 3-7 7-3-3z"></path><path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="m2 2 5 5"></path><path d="m9.5 14.5 4 4"></path></svg>
                    <?php esc_html_e( 'Write a Review', 'my-blocks' ); ?>
                </button>
            </div>
        </div>

        <!-- Review Modal -->
        <div class="sm-review-modal">
            <div class="sm-modal-overlay" onclick="document.querySelector('.sm-review-modal').classList.remove('active')"></div>
            <div class="sm-modal-content">
                <button class="sm-modal-close" onclick="document.querySelector('.sm-review-modal').classList.remove('active')">&times;</button>
                
                <h4 class="sm-form-title"><?php esc_html_e( 'Write a Review', 'my-blocks' ); ?></h4>
                
                <?php if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) : ?>
                    <p><?php echo sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'my-blocks' ), wp_login_url( get_permalink() ) ); ?></p>
                <?php else : ?>
                    <form action="<?php echo esc_url( site_url( '/wp-comments-post.php' ) ); ?>" method="post" id="commentform" class="comment-form">
                        <div class="sm-rating-select" id="sm-rating-selector">
                            <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                                <span class="sm-star-input" data-value="<?php echo $i; ?>">★</span>
                            <?php endfor; ?>
                            <input type="hidden" name="rating" id="rating" value="5" />
                        </div>

                        <div class="sm-form-grid">
                            <?php if ( ! is_user_logged_in() ) : ?>
                                <input type="text" name="author" placeholder="<?php esc_attr_e( 'Name', 'my-blocks' ); ?>" required />
                                <input type="email" name="email" placeholder="<?php esc_attr_e( 'Email', 'my-blocks' ); ?>" required />
                            <?php endif; ?>
                        </div>

                        <textarea name="comment" placeholder="<?php esc_attr_e( 'Share your thoughts about the product...', 'my-blocks' ); ?>" required></textarea>
                        
                        <input type="hidden" name="comment_post_ID" value="<?php echo esc_attr( $product_id ); ?>" />
                        <input type="hidden" name="comment_type" value="review" />
                        
                        <button type="submit" class="sm-submit-review"><?php esc_html_e( 'Submit Review', 'my-blocks' ); ?></button>
                    </form>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const stars = document.querySelectorAll('.sm-star-input');
                            const ratingInput = document.getElementById('rating');
                            
                            function updateStars(val) {
                                stars.forEach(s => {
                                    if(parseInt(s.dataset.value) <= val) {
                                        s.classList.add('active');
                                    } else {
                                        s.classList.remove('active');
                                    }
                                });
                            }

                            updateStars(5); // Initial

                            stars.forEach(star => {
                                star.addEventListener('click', function() {
                                    const val = this.dataset.value;
                                    ratingInput.value = val;
                                    updateStars(val);
                                });
                            });
                        });
                    </script>
                <?php endif; ?>
            </div>
        </div>

        <!-- Review List -->
        <div class="sm-reviews-list">
        <?php if ( $review_count > 0 ) : 
            $comments = get_comments( array(
                'post_id' => $product_id,
                'status'  => 'approve',
                'type'    => 'review',
            ) );

            foreach ( $comments as $comment ) : 
                $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
                $author_name = $comment->comment_author;
                $initial = !empty($author_name) ? strtoupper(substr($author_name, 0, 1)) : '?';
                $date = get_comment_date( 'M j, Y', $comment );
            ?>
                <div class="sm-review-item">
                    <div class="sm-review-top">
                        <div class="sm-review-author">
                            <div class="sm-avatar"><?php echo esc_html( $initial ); ?></div>
                            <div class="sm-auth-info">
                                <span class="sm-name"><?php echo esc_html( $author_name ); ?></span>
                                <span class="sm-date"><?php echo esc_html( $date ); ?></span>
                            </div>
                        </div>
                        <div class="sm-review-rating">
                            <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                                <span><?php echo $i <= $rating ? '★' : '☆'; ?></span>
                            <?php endfor; ?>
                        </div>
                    </div>
                    
                    <div class="sm-review-text">
                        <?php echo wp_kses_post( $comment->comment_content ); ?>
                    </div>

                    <?php 
                    // Check for replies (owner replies)
                    $replies = get_comments( array(
                        'parent' => $comment->comment_ID,
                        'status' => 'approve',
                        'order'  => 'ASC',
                    ) );

                    if ( ! empty( $replies ) ) :
                        foreach ( $replies as $reply ) : ?>
                            <div class="sm-review-reply">
                                <div class="sm-reply-header">
                                    <span class="sm-reply-label"><?php esc_html_e( 'Shop Owner', 'my-blocks' ); ?></span>
                                    <span class="sm-reply-name"><?php echo esc_html( $reply->comment_author ); ?></span>
                                </div>
                                <div class="sm-reply-content">
                                    <?php echo wp_kses_post( $reply->comment_content ); ?>
                                </div>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="sm-no-reviews"><?php esc_html_e( 'No reviews yet. Be the first to review!', 'my-blocks' ); ?></p>
        <?php endif; ?>
    </div>
</section>
