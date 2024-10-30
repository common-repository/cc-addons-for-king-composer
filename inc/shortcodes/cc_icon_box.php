<?php
add_action('init', 'cc_king_icon_box_params', 99);

function cc_king_icon_box_params()
    {
    global $kc;
    $kc->add_map(array(
        'cc_icon_box' => array(
            'name' => 'Icon Box',
            'Title' => __('CC Icon Box', 'KingComposer') ,
            'description' => __('Powerful & versatile Icon Boxes.', 'KingComposer') ,
            'icon' => 'kc-icon-box',
            'is_container' => true,
            'category' => 'Creative Code Addons',
            'css_box' => true,
            'params' => array(
                'General' => array(
                    array(
                        'name' => 'icon_p',
                        'label' => 'Select Icon',
                        'type' => 'icon_picker',
                        'admin_label' => true,
                    ) ,
                    array(
                        'type' => 'text',
                        'label' => __('Icon Box Title', 'kingcomposer') ,
                        'name' => 'title',
                        'description' => __('Title of the progress bar. Leave blank if no title is needed.', 'kingcomposer') ,
                        'admin_label' => true,
                        'value' => __('Title Goes Here', 'kingcomposer') ,
                    ) ,
                    array(
                        'type' => 'textarea_html',
                        'label' => __('Icon Box Description', 'kingcomposer') ,
                        'name' => 'content',
                        'description' => __('Title of the progress bar. Leave blank if no title is needed.', 'kingcomposer') ,
                        'admin_label' => true,
                        'value' => __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet', 'kingcomposer') ,
                    ) ,
                    array(
                        'type' => 'text',
                        'label' => __('Read More Text', 'kingcomposer') ,
                        'name' => 'cc_read_more_text',
                        'description' => __('', 'kingcomposer') ,
                        'admin_label' => true,
                        'value' => '',
                    ) ,
                    array(
                        'type' => 'text',
                        'label' => __('Read More URL', 'kingcomposer') ,
                        'name' => 'cc_read_more_url',
                        'description' => __('', 'kingcomposer') ,
                        'admin_label' => true,
                        'value' => '',
                    ) ,
                    array(
                        'type' => 'dropdown',
                        'label' => __('Style', 'kingcomposer') ,
                        'name' => 'cc_icon_style',
                        'description' => __('Select the Icon Style', 'kingcomposer') ,
                        'options' => array(
                            'cc_minimal' => __('Simple', 'kingcomposer') ,
                            'cc_ultimate' => __('Ultimate', 'kingcomposer') ,
                            'cc_boxed' => __('Boxed', 'kingcomposer')
                        ) ,
                        'admin_label' => true,
                        'value' => 'cc_minimal'
                    ) ,
                    array(
                        'type' => 'dropdown',
                        'label' => __('Icon Size', 'kingcomposer') ,
                        'name' => 'cc_icon_size',
                        'description' => __('Select the Icon Style', 'kingcomposer') ,
                        'options' => array(
                            'cc_small' => __('Small', 'kingcomposer') ,
                            'cc_medium' => __('Medium', 'kingcomposer') ,
                            'cc_large' => __('Large', 'kingcomposer') ,
                            'cc_extra_large' => __('Extra Large', 'kingcomposer')
                        ) ,
                        'admin_label' => true,
                        'relation' => array(
                            'parent' => 'cc_icon_style',
                            'show_when' => array(
                                'cc_minimal',
                                'cc_ultimate'
                            )
                        )
                    ) ,
                    array(
                        'type' => 'dropdown',
                        'label' => __('Circle Container', 'kingcomposer') ,
                        'name' => 'cc_rounded_circle',
                        'description' => __('Show Circle Container', 'kingcomposer') ,
                        'options' => array(
                            'true' => __('Yes', 'kingcomposer') ,
                            'false' => __('No', 'kingcomposer')
                        ) ,
                        'admin_label' => true,
                        'relation' => array(
                            'parent' => 'cc_icon_style',
                            'show_when' => 'cc_ultimate'
                        )
                    ) ,
                    array(
                        'type' => 'dropdown',
                        'label' => __('Circle Container', 'kingcomposer') ,
                        'name' => 'circled',
                        'description' => __('Show Circle Container', 'kingcomposer') ,
                        'options' => array(
                            'true' => __('Yes', 'kingcomposer') ,
                            'false' => __('No', 'kingcomposer')
                        ) ,
                        'admin_label' => true,
                        'relation' => array(
                            'parent' => 'cc_icon_style',
                            'show_when' => 'cc_minimal'
                        )
                    ) ,
                    array(
                        'type' => 'dropdown',
                        'label' => __('Icon Location', 'kingcomposer') ,
                        'name' => 'icon_location',
                        'description' => __('Show Circle Container', 'kingcomposer') ,
                        'options' => array(
                            'left' => __('Left', 'kingcomposer') ,
                            'top' => __('Top', 'kingcomposer')
                        ) ,
                        'admin_label' => true,
                        'relation' => array(
                            'parent' => 'cc_icon_style',
                            'show_when' => array(
                                'cc_ultimate',
                                'cc_boxed'
                            )
                        )
                    ) ,
                    array(
                        'type' => 'text',
                        'label' => __('Extra Class Name', 'kingcomposer') ,
                        'name' => 'el_class',
                        'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.', 'kingcomposer') ,
                        'admin_label' => true,
                        'value' => ''
                    ) ,
                ) ,
                'Typography' => array(
                    array(
                        'name' => 'icon_color',
                        'label' => 'icon Color',
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'value' => '#424242',
                    ) ,
                    array(
                        'name' => 'icon_circle_color',
                        'label' => 'icon Circle Color',
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'value' => '#eee',
                        'relation' => array(
                            'parent' => 'cc_icon_style',
                            'show_when' => array(
                                'cc_minimal',
                                'cc_boxed'
                            )
                        )
                    ) ,
                    array(
                        'name' => 'icon_circle_border_color',
                        'label' => 'Icon Container (circle) Border Color',
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'value' => '#e0e0e0',
                        'relation' => array(
                            'parent' => 'cc_icon_style',
                            'show_when' => array(
                                'cc_minimal',
                                'cc_boxed'
                            )
                        )
                    ) ,
                    array(
                        'name' => 'icon_bg_color',
                        'label' => 'icon Background Color',
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'value' => '#4A4A4A',
                    ) ,
                    array(
                        'name' => 'title_color',
                        'label' => 'Title Color',
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'value' => '#4A4A4A',
                    ) ,
                    array(
                        'name' => 'descr_color',
                        'label' => 'Description Color',
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'value' => '#4A4A4A',
                    ) ,
                    array(
                        'name' => 'txt_link_color',
                        'label' => 'Link Color',
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'value' => '#4A4A4A',
                    ) ,
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
                        'name' => 'icon_title_font_weight',
                        'label' => 'Title Font Weight',
                        'type' => 'dropdown',
                        'value' => '300',
                        'description' => __('', 'kingcomposer') ,
                        'options' => array(
                            '300' => __('300', 'kingcomposer') ,
                            '400' => __('400', 'kingcomposer') ,
                            '600' => __('600', 'kingcomposer') ,
                            '900' => __('900', 'kingcomposer') ,
                        )
                    ) ,
                    array(
                        'name' => 'descr_f_size',
                        'label' => 'Description font size',
                        'type' => 'number_slider',
                        'options' => array(
                            'min' => 0,
                            'max' => 40,
                            'unit' => 'px',
                            'show_input' => true
                        ) ,
                        'value' => '14',
                        'description' => 'Chose Description Font Size here, Default is 14px'
                    ) ,
                ) ,
            )
        )
    ));
    }

// Register Hover Shortcode

function cc_king_icon_box_shortcodes($atts, $content = null)
    {
    extract(shortcode_atts(array(
        'title' => 'Title Goes here',
        'content' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet',
        'icon_p' => '',
        'css' => '',
        'icon_color' => '',
        'title_color' => '',
        'descr_color' => '',
        'title_f_size' => '',
        'icon_title_font_weight' => '',
        'descr_f_size' => '',
        'icon_bg_color' => '#38332b',
        'cc_icon_style' => 'cc_minimal',
        'circled' => '',
        'cc_read_more_text' => '',
        'cc_read_more_url' => '',
        'cc_icon_size' => 'cc_small',
        'el_class' => '',
        'icon_circle_color' => '',
        'icon_circle_border_color' => '',
        'circled' => 'false',
        'icon_location' => 'left',
        'cc_rounded_circle' => 'false',
        'txt_link_color' => '',
    ) , $atts, 'cc_icon_box'));
    $output = $border_color = $rounded_circle_css = '';
    $output.= '<div id="box-icon" class="' . $el_class . ' ' . $cc_icon_style . '-style mk-box-icon clearfix">';
    if ($cc_icon_style == "cc_minimal")
        {
        if ($circled == 'true')
            {
            $border_css = !empty($icon_circle_border_color) ? ('border:1px solid ' . $icon_circle_border_color . ';') : '';
            $output.= '<h4 class="icon-circled" style="font-size:' . $title_f_size . ';font-weight:' . $icon_title_font_weight . ';">';
            $output.= !empty($cc_read_more_url) ? '<a href="' . $cc_read_more_url . '"><i class="fa ' . $icon_p . ' circled-icon mk-main-ico ' . $cc_icon_size . '" style="' . $border_css . 'color:' . $icon_color . ';background-color:' . $icon_circle_color . '"></i></a>' : '<i class="fa ' . $icon_p . ' ' . $cc_icon_size . ' circled-icon mk-main-ico" style="' . $border_css . 'color:' . $icon_color . ';background-color:' . $icon_circle_color . '"></i>';
            $output.= !empty($cc_read_more_url) ? '<a href="' . $cc_read_more_url . '"><span class="' . $cc_icon_size . '">' . $title . '</span></a>' : '<span class="' . $cc_icon_size . '">' . $title . '</span>';
            $output.= '<div class="clearboth"></div>';
            $output.= '</h4>';
            }
          else
            {
            $output.= '<h4 style="font-size:' . $title_f_size . 'px;font-weight:' . $icon_title_font_weight . ';"><i style="color:' . $icon_color . '" class="fa ' . $icon_p . ' ' . $cc_icon_size . ' mk-main-ico"></i>';
            $output.= !empty($cc_read_more_url) ? '<a href="' . $cc_read_more_url . '"><span>' . $title . '</span></a>' : '<span>' . $title . '</span>';
            $output.= '<div class="clearboth"></div>';
            $output.= '</h4>';
            }

        $output.= '<p style="color:' . $descr_color . '; font-size:' . $descr_f_size . '; ">' . $content . '</p>';
        if ($cc_read_more_text)
            {
            $output.= '<div class="clearboth"></div><a class="icon-box-readmore" style="color:' . $txt_link_color . ';" href="' . $cc_read_more_url . '">' . $cc_read_more_text . '<i class="mk-icon-caret-right"></i></a>';
            }
        }
      else
    if ($cc_icon_style == "cc_boxed")
        {
        $output.= '<div class="icon-box-boxed ' . $icon_location . '">';
        $border_css = !empty($icon_circle_border_color) ? ('border:1px solid ' . $icon_circle_border_color . ';') : '';
        if (!empty($icon_p))
            {
            $output.= !empty($cc_read_more_url) ? '<a href="' . $cc_read_more_url . '">' : '';
            $output.= '<i style="' . $border_css . 'background-color:' . $icon_circle_color . ';color:' . $icon_color . ';" class="fa ' . $icon_p . ' mk-main-ico"></i>';
            $output.= !empty($cc_read_more_url) ? '</a>' : '';
            }

        $output.= '<h4 style="font-size:' . $title_f_size . 'px;font-weight:' . $icon_title_font_weight . ';">';
        $output.= !empty($cc_read_more_url) ? '<a href="' . $cc_read_more_url . '">' . $title . '</a>' : $title;
        $output.= '</h4>';
        $output.= '<p style="color:' . $descr_color . '; font-size:' . $descr_f_size . '; ">' . $content . '</p>';
        if ($cc_read_more_text)
            {
            $output.= '<a class="icon-box-readmore" href="' . $cc_read_more_url . '">' . $cc_read_more_text . '<i class="mk-icon-caret-right"></i></a>';
            }

        $output.= '</div>';
        }
      else
    if ($cc_icon_style == "cc_ultimate")
        {
        if ($cc_rounded_circle == 'true' && ($cc_icon_size == 'cc_small' || $cc_icon_size == 'cc_medium'))
            {
            $border_color = 'border-color:' . $icon_color . ';';
            $rounded_circle_css = 'rounded-circle';
            }

        $output.= '<div class="' . $icon_location . '-side ' . $rounded_circle_css . '">';
        if (!empty($icon_p))
            {
            $output.= !empty($cc_read_more_url) ? '<a href="' . $cc_read_more_url . '"><i style="color:' . $icon_color . ';' . $border_color . '" class="fa ' . $icon_p . ' ' . $cc_icon_size . ' mk-main-ico"></i></a>' : '<i style="color:' . $icon_color . ';' . $border_color . '" class="fa ' . $icon_p . ' ' . $cc_icon_size . ' mk-main-ico"></i>';
            }

        $output.= '<div class="box-detail-wrapper ' . $cc_icon_size . '-size">';
        $output.= '<h4 style="font-size:' . $title_f_size . ';font-weight:' . $icon_title_font_weight . ';">';
        $output.= !empty($cc_read_more_url) ? '<a href="' . $cc_read_more_url . '">' . $title . '</a>' : $title;
        $output.= '</h4>';
        $output.= '<p style="color:' . $descr_color . '; font-size:' . $descr_f_size . '; ">' . $content . '</p>';
        if ($cc_read_more_text)
            {
            $output.= '<div class="clearboth"></div><a style="color:' . $txt_link_color . ';" class="icon-box-readmore" href="' . $cc_read_more_url . '">' . $cc_read_more_text . '<i class="mk-icon-caret-right"></i></a>';
            }

        $output.= '</div><div class="clearboth"></div></div>';
        }

    $output.= '<div class="clearboth"></div></div>';
    return $output;
    }

add_shortcode('cc_icon_box', 'cc_king_icon_box_shortcodes');

