<?php
if(!class_exists('TT_Parallax_Addons')){
	class TT_Parallax_Addons{
		function __construct(){

			add_action('admin_init',array($this,'tt_parallax_param_on_row'));

			add_filter('vc_shortcode_output', array($this, 'tt_execute_parallax_shortcode'), 10, 3);
			
		}/* end constructor */

		function tt_execute_parallax_shortcode($output, $obj, $attr) {
			if($obj->settings('base')=='vc_row') {
				$output .= $this->tt_parallax_shotcodes($attr, '');
			}
			return $output;
		}

		function tt_parallax_shotcodes($atts, $content){
			$tt_parallax = $tt_parallax_position = $tt_parallax_left_settings = $tt_parallax_image = $tt_parallax_image_position = $tt_parallax_ratio = $tt_parallax_hr_offset = $tt_parallax_vt_offset = $tt_parallax_right_settings = $tt_parallax_image_right = $tt_parallax_ratio_right = $tt_parallax_hr_offset_right = $tt_parallax_vt_offset_right = $tt_parallax_animation = $tt_parallax_animation_right = $tt_parallax_center_settings = $tt_parallax_image_center = $tt_parallax_ratio_center = $tt_parallax_hr_offset_center = $tt_parallax_vt_offset_center = $tt_parallax_animation = $tt_parallax_animation_center = "";

			extract( shortcode_atts( array(
			    'tt_parallax' => '',
				'tt_parallax_position' => 'tt_parallax_both',
				'tt_parallax_image_position' => '',
				
				'tt_parallax_left_settings' => '',
				'tt_parallax_image' => '',
				'tt_parallax_ratio' => '1.5',
				'tt_parallax_custom_ratio' => '',
				'tt_parallax_hr_offset' => '0',
				'tt_parallax_vt_offset' => '0',
				'tt_parallax_animation' => '',

				'tt_parallax_center_settings' => '',
				'tt_parallax_image_center' => '',
				'tt_parallax_ratio_center' => '1.5',
				'tt_parallax_custom_ratio_center' => '',
				'tt_parallax_hr_offset_center' => '0',
				'tt_parallax_vt_offset_center' => '0',
				'tt_parallax_animation_center' => '',

				'tt_parallax_right_settings' => '',
				'tt_parallax_image_right' => '',
				'tt_parallax_ratio_right' => '1.5',
				'tt_parallax_custom_ratio_right' => '',
				'tt_parallax_hr_offset_right' => '0',
				'tt_parallax_vt_offset_right' => '0',
				'tt_parallax_animation_right' => '',
			), $atts ) );

			$output = "";

			ob_start(); 

			if ($tt_parallax == 'tt_parallax_enable'): 

				wp_enqueue_style( 'animate-css' );
				wp_enqueue_script( 'tt-parallax-enllax' );
				wp_enqueue_script( 'tt-parallax-scripts' );

				// parallax left settings
			    $tt_parallax_info = (array) vc_param_group_parse_atts( $tt_parallax_left_settings);
			    $tt_parallax_contents = array();

			    foreach ( $tt_parallax_info as $data ) :
			        $tt_parallax_data = $data;

			        $tt_parallax_data['tt_parallax_image'] = isset( $data['tt_parallax_image'] ) ? $data['tt_parallax_image'] : '';
			        $tt_parallax_data['tt_parallax_ratio'] = isset( $data['tt_parallax_ratio'] ) ? $data['tt_parallax_ratio'] : '1.5';
			        $tt_parallax_data['tt_parallax_hr_offset'] = isset( $data['tt_parallax_hr_offset'] ) ? $data['tt_parallax_hr_offset'] : '0';
			        $tt_parallax_data['tt_parallax_vt_offset'] = isset( $data['tt_parallax_vt_offset'] ) ? $data['tt_parallax_vt_offset'] : '0';
			        $tt_parallax_data['tt_parallax_animation'] = isset( $data['tt_parallax_animation'] ) ? $data['tt_parallax_animation'] : '0';

			        $tt_parallax_contents[] = $tt_parallax_data;
			    endforeach;


				// parallax center settings
			    $tt_parallax_info_center = (array) vc_param_group_parse_atts( $tt_parallax_center_settings );
			    $tt_parallax_contents_center = array();

			    foreach ( $tt_parallax_info_center as $data ) :
			        $tt_parallax_data_center = $data;

			        $tt_parallax_data_center['tt_parallax_image_center'] = isset( $data['tt_parallax_image_center'] ) ? $data['tt_parallax_image_center'] : '';
			        $tt_parallax_data_center['tt_parallax_ratio_center'] = isset( $data['tt_parallax_ratio_center'] ) ? $data['tt_parallax_ratio_center'] : '1.5';
			        $tt_parallax_data_center['tt_parallax_hr_offset_center'] = isset( $data['tt_parallax_hr_offset_center'] ) ? $data['tt_parallax_hr_offset_center'] : '0';
			        $tt_parallax_data_center['tt_parallax_vt_offset_center'] = isset( $data['tt_parallax_vt_offset_center'] ) ? $data['tt_parallax_vt_offset_center'] : '0';
			        $tt_parallax_data_center['tt_parallax_animation_center'] = isset( $data['tt_parallax_animation_center'] ) ? $data['tt_parallax_animation_center'] : '0';

			        $tt_parallax_contents_center[] = $tt_parallax_data_center;
			    endforeach; 

				// parallax right settings
			    $tt_parallax_info_right = (array) vc_param_group_parse_atts( $tt_parallax_right_settings );
			    $tt_parallax_contents_right = array();

			    foreach ( $tt_parallax_info_right as $data ) :
			        $tt_parallax_data_right = $data;

			        $tt_parallax_data_right['tt_parallax_image_right'] = isset( $data['tt_parallax_image_right'] ) ? $data['tt_parallax_image_right'] : '';
			        $tt_parallax_data_right['tt_parallax_ratio_right'] = isset( $data['tt_parallax_ratio_right'] ) ? $data['tt_parallax_ratio_right'] : '1.5';
			        $tt_parallax_data_right['tt_parallax_hr_offset_right'] = isset( $data['tt_parallax_hr_offset_right'] ) ? $data['tt_parallax_hr_offset_right'] : '0';
			        $tt_parallax_data_right['tt_parallax_vt_offset_right'] = isset( $data['tt_parallax_vt_offset_right'] ) ? $data['tt_parallax_vt_offset_right'] : '0';
			        $tt_parallax_data_right['tt_parallax_animation_right'] = isset( $data['tt_parallax_animation_right'] ) ? $data['tt_parallax_animation_right'] : '0';

			        $tt_parallax_contents_right[] = $tt_parallax_data_right;
			    endforeach; 


			    // parallax position
				$tt_image_position = "";

				if ($tt_parallax_image_position == 'tt_image_bellow') {
					$tt_image_position = 'z-index: 0;';
				} elseif ($tt_parallax_image_position == 'tt_image_above') {
					$tt_image_position = 'z-index: 100;';
				}

				?>
				<div class="tt-parallax-wrapper" style="<?php echo esc_attr($tt_image_position); ?>">
					<?php if ($tt_parallax_position == 'tt_parallax_left' || $tt_parallax_position == 'tt_parallax_both'): ?>
						<div class="tt-parallax-left">
							<?php foreach ($tt_parallax_contents as $parallax_left): 
							$image_src = wp_get_attachment_image_src( $parallax_left['tt_parallax_image'], 'full' ); 

							$offset_x_left = $offset_y_left = "";

							$parallax_ratio_left = $parallax_left['tt_parallax_ratio'];

							if ($parallax_ratio_left == 'custom-ratio') {
								$parallax_ratio_left = $parallax_left['tt_parallax_custom_ratio'];
							}

							if ($parallax_left['tt_parallax_hr_offset']) {
								$offset_x_left = 'left:'.$parallax_left['tt_parallax_hr_offset'].';';
							}
							if ($parallax_left['tt_parallax_vt_offset']) {
								$offset_y_left = 'top:'.$parallax_left['tt_parallax_vt_offset'].';';
							} 

							$tt_animation_class = "";

							if ($parallax_left['tt_parallax_animation']) {
								$tt_animation_class = 'animated infinite '.$parallax_left['tt_parallax_animation'].'';
							}
							?>
								
							<img class="<?php echo esc_attr($tt_animation_class); ?>" data-enllax-ratio="<?php echo esc_attr($parallax_ratio_left); ?>" data-enllax-type="foreground" src="<?php echo esc_url($image_src[0]); ?>" style="<?php echo esc_attr($offset_x_left.''.$offset_y_left); ?>" alt="<?php echo esc_attr('creptaam Parallax', 'creptaam') ?>"/>
								
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ($tt_parallax_position == 'tt_parallax_center'): ?>
						<div class="tt-parallax-center">
							<?php foreach ($tt_parallax_contents_center as $parallax_center): 
							$image_src = wp_get_attachment_image_src( $parallax_center['tt_parallax_image_center'], 'full' ); 

							$offset_x_center = $offset_y_center = "";

							$parallax_ratio_center = $parallax_center['tt_parallax_ratio_center'];

							if ($parallax_ratio_center == 'custom-ratio') {
								$parallax_ratio_center = $parallax_center['tt_parallax_custom_ratio_center'];
							}

							if ($parallax_center['tt_parallax_hr_offset_center']) {
								$offset_x_center = 'center:'.$parallax_center['tt_parallax_hr_offset_center'].';';
							}

							if ($parallax_center['tt_parallax_vt_offset_center']) {
								$offset_y_center = 'top:'.$parallax_center['tt_parallax_vt_offset_center'].';';
							} 

							$tt_animation_class_center = "";

							if ($parallax_center['tt_parallax_animation_center']) {
								$tt_animation_class_center = 'animated infinite '.$parallax_center['tt_parallax_animation_center'].'';
							}

							?>
								
							<img class="<?php echo esc_attr($tt_animation_class_center); ?>" data-enllax-ratio="<?php echo esc_attr($parallax_ratio_center); ?>" data-enllax-type="foreground" src="<?php echo esc_url($image_src[0]); ?>" style="<?php echo esc_attr($offset_x_center.''.$offset_y_center); ?>" alt="<?php echo esc_attr('creptaam Parallax', 'creptaam') ?>"/>
								
							<?php endforeach; ?>
						</div>
					<?php endif; ?>


					<?php if ($tt_parallax_position == 'tt_parallax_right' || $tt_parallax_position == 'tt_parallax_both'): ?>
						<div class="tt-parallax-right">
							<?php foreach ($tt_parallax_contents_right as $parallax_right): 
							$image_src = wp_get_attachment_image_src( $parallax_right['tt_parallax_image_right'], 'full' ); 

							$offset_x_right = $offset_y_right = "";

							$parallax_ratio_right = $parallax_right['tt_parallax_ratio_right'];

							if ($parallax_ratio_right == 'custom-ratio') {
								$parallax_ratio_right = $parallax_right['tt_parallax_custom_ratio_right'];
							}

							if ($parallax_right['tt_parallax_hr_offset_right']) {
								$offset_x_right = 'right:'.$parallax_right['tt_parallax_hr_offset_right'].';';
							}

							if ($parallax_right['tt_parallax_vt_offset_right']) {
								$offset_y_right = 'top:'.$parallax_right['tt_parallax_vt_offset_right'].';';
							} 

							$tt_animation_class_right = "";

							if ($parallax_right['tt_parallax_animation_right']) {
								$tt_animation_class_right = 'animated infinite '.$parallax_right['tt_parallax_animation_right'].'';
							}

							?>
								
							<img class="<?php echo esc_attr($tt_animation_class_right); ?>" data-enllax-ratio="<?php echo esc_attr($parallax_ratio_right); ?>" data-enllax-type="foreground" src="<?php echo esc_url($image_src[0]); ?>" style="<?php echo esc_attr($offset_x_right.''.$offset_y_right); ?>" alt="<?php echo esc_attr('creptaam Parallax', 'creptaam') ?>"/>
								
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php $output .= ob_get_clean();

			return $output;
			
		} /* end tt_parallax_shotcodes */

		function tt_parallax_param_on_row(){
			
			if(function_exists('vc_add_params')) :

				$tt_parallax_ratio = array(
				    esc_html__('Ratio 0.1', 'creptaam') 	=> '0.1',
				    esc_html__('Ratio -0.1', 'creptaam') => '-0.1',
				    esc_html__('Ratio 0.3', 'creptaam') 	=> '0.3',
				    esc_html__('Ratio -0.3', 'creptaam') => '-0.3',
				    esc_html__('Ratio 0.5', 'creptaam') 	=> '0.5',
				    esc_html__('Ratio -0.5', 'creptaam') => '-0.5',
				    esc_html__('Ratio 1', 'creptaam') 	=> '1',
				    esc_html__('Ratio -1', 'creptaam') 	=> '-1',
				    esc_html__('Ratio 1.3', 'creptaam') 	=> '1.3',
				    esc_html__('Ratio -1.3', 'creptaam') 	=> '-1.3',
				    esc_html__('Ratio 1.5', 'creptaam') 	=> '1.5',
				    esc_html__('Ratio -1.5', 'creptaam') 	=> '-1.5',
				    esc_html__('Ratio 1.7', 'creptaam') 	=> '1.7',
				    esc_html__('Ratio -1.7', 'creptaam') 	=> '-1.7',
				    esc_html__('Ratio 1.9', 'creptaam') 	=> '1.9',
				    esc_html__('Ratio -1.9', 'creptaam') 	=> '-1.9',
				    esc_html__('Ratio 2', 'creptaam') 	=> '2',
				    esc_html__('Ratio -2', 'creptaam') 	=> '-2',
				    esc_html__('Custom Ratio', 'creptaam') 	=> 'custom-ratio'
				);

				$tt_parallax_animation = array(
			        esc_html__('None', 'creptaam') 	=> '',
			        esc_html__('fadeIn', 'creptaam') 	=> 'fadeIn',
			        esc_html__('fadeOut', 'creptaam') 	=> 'fadeOut',
			        esc_html__('flash', 'creptaam') 	=> 'flash',
			        esc_html__('----------------------------------', 'creptaam') 	=> '',
			        esc_html__('ttScale3D', 'creptaam') 	=> 'ttScale3D',
			        esc_html__('fadeInDown', 'creptaam') 	=> 'fadeInDown',
			        esc_html__('fadeInLeft', 'creptaam') 	=> 'fadeInLeft',
			        esc_html__('fadeInRight', 'creptaam') 	=> 'fadeInRight',
			        esc_html__('fadeInUp', 'creptaam') 	=> 'fadeInUp',
			        esc_html__('pulse', 'creptaam') 	=> 'pulse',
			        esc_html__('bounce', 'creptaam') 	=> 'bounce',
			        esc_html__('rubberBand', 'creptaam') 	=> 'rubberBand',
			        esc_html__('shake', 'creptaam') 	=> 'shake',
			        esc_html__('tada', 'creptaam') 	=> 'tada',
			        esc_html__('wobble', 'creptaam') 	=> 'wobble',
			        esc_html__('jello', 'creptaam') 	=> 'jello',
			        esc_html__('bounceIn', 'creptaam') 	=> 'bounceIn',
			        esc_html__('flip', 'creptaam') 	=> 'flip',
			        esc_html__('flipInX', 'creptaam') 	=> 'flipInX',
			        esc_html__('flipInY', 'creptaam') 	=> 'flipInY',
			        esc_html__('flipOutX', 'creptaam') 	=> 'flipOutX',
			        esc_html__('flipOutY', 'creptaam') 	=> 'flipOutY',
			        esc_html__('lightSpeedIn', 'creptaam') 	=> 'lightSpeedIn',
			        esc_html__('lightSpeedOut', 'creptaam') 	=> 'lightSpeedOut',
			        esc_html__('rotateIn', 'creptaam') 	=> 'rotateIn',
			        esc_html__('rotateOut', 'creptaam') 	=> 'rotateOut',
			        esc_html__('jackInTheBox', 'creptaam') 	=> 'jackInTheBox',
			        esc_html__('rollIn', 'creptaam') 	=> 'rollIn',
			        esc_html__('slideInDown', 'creptaam') 	=> 'slideInDown',
			        esc_html__('slideInLeft', 'creptaam') 	=> 'slideInLeft',
			        esc_html__('slideInUp', 'creptaam') 	=> 'slideInUp',
			        esc_html__('slideOutDown', 'creptaam') 	=> 'slideOutDown',
			        esc_html__('slideOutLeft', 'creptaam') 	=> 'slideOutLeft',
			        esc_html__('slideOutRight', 'creptaam') 	=> 'slideOutRight',
			        esc_html__('slideOutUp', 'creptaam') 	=> 'slideOutUp'
			    );

				$row_attr = array(
					array(
					    'type'        => 'dropdown',
					    'heading'     => esc_html__( 'Enable Parallax?', 'tt-pl-textdomain' ),
					    'param_name'  => 'tt_parallax',
					    'value'       => array(
					        esc_html__('Enable ', 'tt-pl-textdomain') 	=> 'tt_parallax_enable',
					        esc_html__('Disable', 'tt-pl-textdomain')  	=> 'tt_parallax_disable'
					    ),
					    'std'			=> 'tt_parallax_disable',
					    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
					    'description' 	=> esc_html__( 'Enable/disable parallax', 'tt-pl-textdomain' )
					),

					// parallax postiion
					array(
					    'type'        => 'dropdown',
					    'heading'     => esc_html__( 'Parallax position', 'tt-pl-textdomain' ),
					    'param_name'  => 'tt_parallax_position',
					    'value'       => array(
					        esc_html__('Left ', 'tt-pl-textdomain') 	=> 'tt_parallax_left',
					        esc_html__('Right', 'tt-pl-textdomain')  	=> 'tt_parallax_right',
					        esc_html__('Left and Right', 'tt-pl-textdomain')  	=> 'tt_parallax_both',
					        esc_html__('Center', 'tt-pl-textdomain')  	=> 'tt_parallax_center',
					    ),
					    'std'			=> 'tt_parallax_both',
					    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
					    'dependency'  => array(
					        'element' => 'tt_parallax',
					        'value'   => array( 'tt_parallax_enable' )
					    ),
					    'description' 	=> esc_html__( 'Select parallax position', 'tt-pl-textdomain' )
					),


					// image postion
				    array(
					    'type'        => 'dropdown',
					    'heading'     => esc_html__( 'Image position', 'tt-pl-textdomain' ),
					    'param_name'  => 'tt_parallax_image_position',
					    'value'       => array(
					        esc_html__('Default ', 'tt-pl-textdomain') 	=> '',
					        esc_html__('Bellow the content', 'tt-pl-textdomain')  	=> 'tt_image_bellow',
					        esc_html__('Above the content', 'tt-pl-textdomain')  	=> 'tt_image_above'
					    ),
					    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
					    'dependency'  => array(
					        'element' => 'tt_parallax',
					        'value'   => array( 'tt_parallax_enable' )
					    ),
					    'description' 	=> esc_html__( 'Select parallax position', 'tt-pl-textdomain' )
					),
					

					// left position settings
					array(
					    'type' => 'param_group',
					    'heading' => esc_html__('Parallax Left Settings', 'tt-pl-textdomain'),
					    'param_name' => 'tt_parallax_left_settings',
					    // 'description' => esc_html__('Parallax left settings', 'tt-pl-textdomain'),
					    'dependency'  => array(
					        'element' => 'tt_parallax_position',
					        'value'   => array( 'tt_parallax_left', 'tt_parallax_both' )
					    ),
					    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
					    'params' => array(
					    	array(
					            'type' => 'attach_image',
					            'heading' => esc_html__( 'Parallax image', 'tt-pl-textdomain'),
					            'param_name' => 'tt_parallax_image',
					            'description' => esc_html__( 'Select parallax image from media library', 'tt-pl-textdomain' ),
					        ),

						    // parallax speed
						    array(
							    'type'        	=> 'dropdown',
							    'heading'     	=> esc_html__( 'Parallax speed', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_ratio',
							    'value'       	=> $tt_parallax_ratio,
							    'std'			=> '0.5',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_left', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 0.5)', 'tt-pl-textdomain' )
							),

							array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Custom ratio', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_custom_ratio',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_ratio',
							        'value'   	=> array( 'custom-ratio')
							    ),
							    'description' 	=> esc_html__( 'Enter the custom ratio', 'tt-pl-textdomain' )
							),


						    // horizontal offset
						    array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Image Horizontal offset', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_hr_offset',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_left', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter horizontal offset, you can use plus or minus value to set left and right placement', 'tt-pl-textdomain' )
							),

						    // vertical offset
						    array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Image Vertical offset', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_vt_offset',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_left', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter vertical offset, you can use plus or minus value to set top and bottom placement', 'tt-pl-textdomain' )
							),

							// animation
						    array(
							    'type'        	=> 'dropdown',
							    'heading'     	=> esc_html__( 'Animation', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_animation',
							    'value'       	=> $tt_parallax_animation,
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_left', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 0.5)', 'tt-pl-textdomain' )
							),
					    ),
					),

					

					// Center position settings
					array(
					    'type' => 'param_group',
					    'heading' => esc_html__('Parallax Center Settings', 'tt-pl-textdomain'),
					    'param_name' => 'tt_parallax_center_settings',
					    // 'description' => esc_html__('Parallax center settings', 'tt-pl-textdomain'),
					    'dependency'  => array(
					        'element' => 'tt_parallax_position',
					        'value'   => array( 'tt_parallax_center' )
					    ),
					    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
					    'params' => array(
					    	array(
					            'type' => 'attach_image',
					            'heading' => esc_html__( 'Parallax image', 'tt-pl-textdomain'),
					            'param_name' => 'tt_parallax_image_center',
					            'description' => esc_html__( 'Select parallax image from media library', 'tt-pl-textdomain' ),
					        ),

						    // parallax speed
						    array(
							    'type'        	=> 'dropdown',
							    'heading'     	=> esc_html__( 'Parallax speed', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_ratio_center',
							    'value'       	=> $tt_parallax_ratio,
							    'std'			=> '0.5',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_center', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 0.5)', 'tt-pl-textdomain' )
							),


							array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Custom ratio', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_custom_ratio_center',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_ratio_center',
							        'value'   	=> array( 'custom-ratio')
							    ),
							    'description' 	=> esc_html__( 'Enter the custom ratio', 'tt-pl-textdomain' )
							),

						    // horizontal offset
						    array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Image Horizontal offset', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_hr_offset_center',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_center', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter horizontal offset, you can use plus or minus value to set left and center placement', 'tt-pl-textdomain' )
							),

						    // vertical offset
						    array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Image Vertical offset', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_vt_offset_center',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_center', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter vertical offset, you can use plus or minus value to set top and bottom placement', 'tt-pl-textdomain' )
							),

							// animation
						    array(
							    'type'        	=> 'dropdown',
							    'heading'     	=> esc_html__( 'Animation', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_animation_center',
							    'value'       	=> $tt_parallax_animation,
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_left', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 0.5)', 'tt-pl-textdomain' )
							),
					    )
					),

					// right position settings
					array(
					    'type' => 'param_group',
					    'heading' => esc_html__('Parallax Right Settings', 'tt-pl-textdomain'),
					    'param_name' => 'tt_parallax_right_settings',
					    // 'description' => esc_html__('Parallax right settings', 'tt-pl-textdomain'),
					    'dependency'  => array(
					        'element' => 'tt_parallax_position',
					        'value'   => array( 'tt_parallax_right', 'tt_parallax_both' )
					    ),
					    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
					    'params' => array(
					    	array(
					            'type' => 'attach_image',
					            'heading' => esc_html__( 'Parallax image', 'tt-pl-textdomain'),
					            'param_name' => 'tt_parallax_image_right',
					            'description' => esc_html__( 'Select parallax image from media library', 'tt-pl-textdomain' ),
					        ),

						    // parallax speed
						    array(
							    'type'        	=> 'dropdown',
							    'heading'     	=> esc_html__( 'Parallax speed', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_ratio_right',
							    'value'       	=> $tt_parallax_ratio,
							    'std'			=> '0.5',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_right', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 0.5)', 'tt-pl-textdomain' )
							),


							array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Custom ratio', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_custom_ratio_right',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_ratio_right',
							        'value'   	=> array( 'custom-ratio')
							    ),
							    'description' 	=> esc_html__( 'Enter the custom ratio', 'tt-pl-textdomain' )
							),

						    // horizontal offset
						    array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Image Horizontal offset', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_hr_offset_right',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_right', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter horizontal offset, you can use plus or minus value to set left and right placement', 'tt-pl-textdomain' )
							),

						    // vertical offset
						    array(
							    'type'        	=> 'textfield',
							    'heading'     	=> esc_html__( 'Image Vertical offset', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_vt_offset_right',
							    'value'       	=> '0',
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_right', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter vertical offset, you can use plus or minus value to set top and bottom placement', 'tt-pl-textdomain' )
							),

							// animation
						    array(
							    'type'        	=> 'dropdown',
							    'heading'     	=> esc_html__( 'Animation', 'tt-pl-textdomain' ),
							    'param_name'  	=> 'tt_parallax_animation_right',
							    'value'       	=> $tt_parallax_animation,
							    'group'			=> esc_html__( 'Parallax', 'tt-pl-textdomain' ),
							    'dependency'  	=> array(
							        'element' 	=> 'tt_parallax_position',
							        'value'   	=> array( 'tt_parallax_left', 'tt_parallax_both' )
							    ),
							    'description' 	=> esc_html__( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 0.5)', 'tt-pl-textdomain' )
							),
					    )
					),
				);

				vc_add_params( 'vc_row', $row_attr );

			endif; //vc_add_params

		} //custom_text_on_row

	} //TT_Parallax_Addons

	new TT_Parallax_Addons;
}


if ( !function_exists( 'tt_output_before_vc_row' ) ) {
	function tt_output_before_vc_row($atts, $content = null) {
		return TT_Parallax_Addons::tt_parallax_shotcodes($atts, $content);
	}
}