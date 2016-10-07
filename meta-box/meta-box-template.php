<?php
/**
 * Facebook Instant Articles for WP.
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 *
 * @package default
 */

use Facebook\InstantArticles\Client\InstantArticleStatus;
use Facebook\InstantArticles\Client\ServerMessage;
?>

<!-- Transformer messages -->
<?php if ( count( $adapter->transformer->getWarnings() ) > 0 ) : ?>
	<p>
		<span class="dashicons dashicons-warning"></span>
		This post was transformed into an Instant Article with some warnings
		[<a href="https://wordpress.org/plugins/fb-instant-articles/faq/" target="_blank">Learn more</a> |
		<a href="<?php echo esc_url( $settings_page_href ); ?>">Transformer rule configuration</a> |
		<a href="#" class="instant-articles-toggle-debug">Toggle debug information</a>]
	</p>
	<ul class="instant-articles-messages">
		<?php foreach ( $adapter->transformer->getWarnings() as $warning ) : ?>
			<li class="wp-ui-text-highlight">
				<span class="dashicons dashicons-warning"></span>
				<div class="message">
					<?php echo esc_html( $warning ); ?>
					<span>
						<?php
							if ( $warning->getNode() ) {
								echo esc_html(
									$warning->getNode()->ownerDocument->saveHTML( $warning->getNode() )
								);
							}
						?>
					</span>
				</div>
				</dl>
			</li>
		<?php endforeach; ?>
	</ul>

<?php else : ?>
	<p>
		<span class="dashicons dashicons-yes"></span>
		This post was transformed into an Instant Article with no warnings
		[<a href="#" class="instant-articles-toggle-debug">Toggle debug information]</a>
	</p>
<?php endif; ?>

<div class="instant-articles-transformer-markup">
	<div>
		<label for="source">Source Markup:</label>
		<textarea class="source" readonly><?php echo esc_textarea( $adapter->get_the_content() ); ?></textarea>
	</div>
	<div>
		<label for="transformed">Transformed Markup:</label>
		<textarea class="source" readonly><?php echo esc_textarea( $article->render( '', true ) ); ?></textarea>
	</div>
	<br clear="all">
</div>
