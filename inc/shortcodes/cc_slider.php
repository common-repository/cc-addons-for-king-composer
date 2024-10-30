<?php
add_action('init', 'cc_king_slider_param', 99);

function cc_king_slider_param()
  {
  global $kc;
  $kc->add_map(array(
    'cc_slider' => array(
      'name' => 'CC Image Slider',
      'description' => __('CC Image Slider', 'KingComposer') ,
      'icon' => 'kc-icon-box',

      // 'is_container' => true,

      'category' => 'Creative Code Addons',
      'css_box' => true,
      'params' => array(
        'General' => array(
          array(
            'type' => 'text',
            'label' => __('Slider Title', 'kingcomposer') ,
            'name' => 'title',
            'description' => __('Title of the progress bar. Leave blank if no title is needed.', 'kingcomposer') ,
            'admin_label' => true,
          ) ,
          array(
            'name' => 'images',
            'label' => 'Upload Images',
            'type' => 'attach_images',
            'admin_label' => true,
          ) ,
        ) ,
        'Typography' => array(
          array(
            'name' => 'title_f_size',
            'label' => 'Title font size',
            'type' => 'number_slider',
            'options' => array(
              'min' => 0,
              'max' => 40,
              'unit' => 'px',
              'show_input' => true
            ) ,
            'value' => '20',
            'description' => 'Chose Title Font Size here, Default is 14px'
          ) ,
          array(
            'type' => 'dropdown',
            'label' => __('Text Align', 'kingcomposer') ,
            'name' => 'cc_title_align',
            'description' => __('Select the Text Align', 'kingcomposer') ,
            'options' => array(
              'left' => __('Left', 'kingcomposer') ,
              'center' => __('Center', 'kingcomposer') ,
              'right' => __('Right', 'kingcomposer')
            ) ,
            'admin_label' => true,
            'value' => 'Left'
          ) ,
        ) ,
      )
    )
  ));
  }

// Register Hover Shortcode

function cc_king_slider_shortcode($atts, $content = null)
  {
  extract(shortcode_atts(array(
    'title' => 'Title Goes here',
    'images' => '',
    'title_f_size' => '',
    'cc_title_align' => '',
  ) , $atts));
  $output = '';
  extract($atts);
  if (!empty($images))
    {
    $images = explode(',', $images);
    }

  if (is_array($images) && !empty($images))
    {
    foreach($images as $image_id)
      {
      $attachment_data[] = wp_get_attachment_image_src($image_id);
      $attachment_data_full[] = wp_get_attachment_image_src($image_id, 'full');
      }
    }
    else
    {
    echo '<div class="kc-carousel_images align-center" style="border:1px dashed #ccc;"><br /><h3>Carousel Images: ' . __('No images upload', 'kingcomposer') . '</h3></div>';
    return;
    }

  ob_start();
  if (!empty($title))
    {
    echo '<h3 style="font-size:' . $title_f_size . ';text-align:' . $cc_title_align . ';" class="kc-title image-gallery-title">' . esc_html($title) . '</h3>';
    }

?>
  
<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('<?php echo plugin_dir_url('') . 'cc-addons-for-king-composer/assets/images/loading.gif' ; ?>') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
            
            <?php
  foreach($attachment_data_full as $i => $image): ?>
  	<div data-p="112.50" style="display: none;">
  <?php
    echo '<img data-u="image" src="' . esc_attr($image[0]) . '" alt="" />'; 
    echo '<img data-u="thumb" src="' . esc_attr($image[0]) . '" alt="" />'; ?>
    </div>
        <?php
  endforeach; ?>
            
        
            
        
        </div>
        <!-- Thumbnail Navigator -->
        <div u="thumbnavigator" class="jssort03" style="position:absolute;left:0px;bottom:0px;width:600px;height:60px;" data-autocenter="1">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height:100%; background-color: #000; filter:alpha(opacity=30.0); opacity:0.3;"></div>
            <!-- Thumbnail Item Skin Begin -->
            <div u="slides" style="cursor: default;">
                <div u="prototype" class="p">
                    <div class="w">
                        <div u="thumbnailtemplate" class="t"></div>
                    </div>
                    <div class="c"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora02r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
    </div>
    


    <script>
        jQuery(document).ready(function ($) {
            
            var jssor_1_options = {
              $AutoPlay: true,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 9,
                $SpacingX: 3,
                $SpacingY: 3,
                $Align: 260
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>

    <!-- #endregion Jssor Slider End -->

<?php
  $output = ob_get_clean();
  echo '<div class="kc-slider-images-cc">' . $output . '</div>';
  }

add_shortcode('cc_slider', 'cc_king_slider_shortcode');

