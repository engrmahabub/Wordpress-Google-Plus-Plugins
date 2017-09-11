<?php 

class sm_google_plus_follow_button extends WP_Widget{
	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'sm_google_plus_follow_button', 

		// Widget name will appear in UI
		__('Google+ Follow Button', 'sm_google_plus_follow_button'), 

		// Widget description
		array( 'description' => __( 'Google+ Follow Button to your wordpress site.', 'sm_google_plus_follow_button' ), ) 
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes

		$google_plus_user				=	($instance['google_plus_user'])? $instance['google_plus_user']:'https://plus.google.com/+MahabuburRahman';
		$button_size					=	($instance['button_size'])? $instance['button_size']:'20';
		$annotation						=	($instance['annotation'])? $instance['annotation']:'bubble';		

		echo $args['before_widget'];

		 if ( ! empty( $title ) )
		 	echo $args['before_title'] . $title . $args['after_title'];
		?>

		<script src="https://apis.google.com/js/platform.js" async defer></script>
		
		<div 
			class="g-follow" 
			data-href="<?php echo $google_plus_user;?>" 
			data-annotation="<?php echo $annotation;?>"
			data-height="<?php echo $button_size; ?>"
			data-rel="publisher">			
		</div>
		<?php

		echo $args['after_widget'];
	}

	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Google+ Follow Button', 'sm_google_plus_follow_button' );
		}

		if(isset($instance['google_plus_user'])){
				$google_plus_user=$instance['google_plus_user'];
		}else{
			$google_plus_user='';
		}

		if(isset($instance['button_size'])){
			$button_size=$instance['button_size'];
		}else{
			$button_size='20';
		}

		if(isset($instance['annotation'])){
			$annotation=$instance['annotation'];
		}else{
			$annotation='';
		}


		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'google_plus_user' ); ?>"><?php _e( 'Google+ User/Page URL:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'google_plus_user' ); ?>" name="<?php echo $this->get_field_name( 'google_plus_user' ); ?>" type="text" value="<?php echo esc_attr( $google_plus_user ); ?>" >
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_size' ); ?>"><?php _e( 'Button size:' ); ?></label> 
			<input 
				class="radio" 
				type="radio" 
				name="<?php echo $this->get_field_name( 'button_size' ); ?>" 
				value="15" 
				<?php if ( isset( $button_size ) && $button_size=='15' ) { echo 'checked="checked"'; } ?>
				id="<?php echo $this->get_field_id( 'button_size_small' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'button_size_small' ); ?>"><?php _e( 'Small' ); ?></label>
			<input 
				class="radio" 
				type="radio" 
				name="<?php echo $this->get_field_name( 'button_size' ); ?>" 
				value="20"
				<?php if ( isset( $button_size ) && $button_size=='20' ) { echo 'checked="checked"'; } ?> 
				id="<?php echo $this->get_field_id( 'button_size_medium' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'button_size_medium' ); ?>"><?php _e( 'Medium' ); ?></label>
			<input 
				class="radio" 
				type="radio" 
				name="<?php echo $this->get_field_name( 'button_size' ); ?>"  
				value="24" 
				<?php if ( isset( $button_size ) && $button_size=='24' ) { echo 'checked="checked"'; } ?>
				id="<?php echo $this->get_field_id( 'button_size_large' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'button_size_large' ); ?>"><?php _e( 'Large' ); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'annotation' ); ?>"><?php _e( 'Annotation:' ); ?></label> 
			<select id="<?php echo $this->get_field_id( 'annotation' ); ?>" 
				name="<?php echo $this->get_field_name( 'annotation' ); ?>" >
				<option value="bubble" <?php if ( isset( $annotation ) && $annotation=='bubble' ) { echo 'selected="selected"'; } ?>>Bubble (horizontal)</option>
				<option value="vertical-bubble" <?php if ( isset( $annotation ) && $annotation=='vertical-bubble' ) { echo 'selected="selected"'; } ?>>Bubble (vertical)</option>
				<option value="none" <?php if ( isset( $annotation ) && $annotation=='none' ) { echo 'selected="selected"'; } ?>>None</option>
			</select>		
		</p>
		
		<?php 
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['google_plus_user'] = ( ! empty( $new_instance['google_plus_user'] ) ) ? strip_tags( $new_instance['google_plus_user'] ) : '';
		$instance['annotation'] = ( ! empty( $new_instance['annotation'] ) ) ? strip_tags( $new_instance['annotation'] ) : '';
		$instance['button_size'] = ( ! empty( $new_instance['button_size'] ) ) ? strip_tags( $new_instance['button_size'] ) : '';
		return $instance;
	}
}

