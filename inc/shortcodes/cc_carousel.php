<?php
add_action('init', 'cc_king_carousel_params', 99);

function cc_king_carousel_params()
  {
  global $kc;
  $kc->add_map(array(
    'cc_carousel' => array(
      'name' => 'CC Image Carousel',
      'description' => __('CC Image / Logo / Client Carousel', 'KingComposer') ,
      'icon' => 'kc-icon-box',

      // 'is_container' => true,

      'category' => 'Creative Code Addons',
      'css_box' => true,
      'params' => array(
        'General' => array(
          array(
            'type' => 'text',
            'label' => __('Carousel Title', 'kingcomposer') ,
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

function cc_king_carousel_shortcodes($atts, $content = null)
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
   <aside class="swiper-section">
        <div class="container">
         <div class="horizon-swiper basic">
          <?php
  foreach($attachment_data_full as $i => $image): ?>
            <div class="horizon-item">
              <div class="card">
                <?php
    echo '<img src="' . esc_attr($image[0]) . '" alt="" />'; ?>
              </div>
            </div>
        <?php
  endforeach; ?>
      </div>
    </div>
  </aside>


<?php
  $output = ob_get_clean();
  echo '<div class="kc-carousel_images">' . $output . '</div>';
  }

add_shortcode('cc_carousel', 'cc_king_carousel_shortcodes');

