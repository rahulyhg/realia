<div class="properties-sort">
	<form method="get" action="?" id="sort-form">
		<?php $skip = array(
			'filter-sort-by', 'filter-sort-order'
		); ?>

		<?php foreach ( $_GET as $key => $value ) : ?>
			<?php if ( ! in_array( $key, $skip ) ) : ?>
				<input type="hidden" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_html( $value ); ?>">
			<?php endif; ?>
		<?php endforeach; ?>

		<div class="properties-sort-inner">
			<div class="filter-sort-title">
				<h3><?php echo __( 'Sorting options', 'realia' ); ?></h3>
			</div><!-- /.filter-sort-title -->

			<div class="filter-sort-by-wrapper">
				<select name="filter-sort-by">
					<option value=""><?php echo __( 'Sort by', 'realia' ); ?></option>
					<option value="price" <?php if ( ! empty( $_GET['filter-sort-by'] ) && $_GET['filter-sort-by'] == 'price' ): ?>selected="selected"<?php endif; ?>><?php echo __( 'Price', 'realia' ); ?></option>
					<option value="title" <?php if ( ! empty( $_GET['filter-sort-by'] ) && $_GET['filter-sort-by'] == 'title' ): ?>selected="selected"<?php endif; ?>><?php echo __( 'Title', 'realia' ); ?></option>
					<option value="published" <?php if ( ! empty( $_GET['filter-sort-by'] ) && $_GET['filter-sort-by'] == 'published' ): ?>selected="selected"<?php endif; ?>><?php echo __( 'Published', 'realia' ); ?></option>
				</select>
			</div><!-- /.filter-sort-by-wrapper -->

			<div class="filter-sort-order-wrapper">
				<select name="filter-sort-order">
					<option value=""><?php echo __( 'Order', 'realia' ); ?></option>
					<option value="asc" <?php if ( ! empty( $_GET['filter-sort-order'] ) && $_GET['filter-sort-order'] == 'asc' ): ?>selected="selected"<?php endif; ?>><?php echo __( 'ASC', 'realia' ); ?></option>
					<option value="desc" <?php if ( ! empty( $_GET['filter-sort-order'] ) && $_GET['filter-sort-order'] == 'desc' ): ?>selected="selected"<?php endif; ?>><?php echo __( 'DESC', 'realia' ); ?></option>
				</select>
			</div><!-- /.filter-sort-order-wrapper-->
		</div><!-- /.properties-sort-inner -->
	</form>
</div><!-- /.properties-sort -->