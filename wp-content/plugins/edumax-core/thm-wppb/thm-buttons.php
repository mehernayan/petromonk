<?php

class Addons_Buttons{
    public function get_name(){
        return 'edumax-buttons';
    }
    public function get_title(){
        return 'Buttons';
    }
    public function get_icon() {
        return 'wppb-font-button';
    }
    public function get_category_name(){
        return 'Edumax';
    }

    // Textarea Settings Fields
    public function get_settings() {
        $settings = array(
            'button_text' => array(
                'type' => 'text',
                'title' => __('Button Text','edumax-core'),
                'placeholder' => __('Text Placeholder','edumax-core'),
                'std' => 'Example Button',
            ),
            'button_link' => array (
                'type' => 'link',
                'title' => __('Button Link','edumax-core'),
                'std' => array(
                    'link' => '#',
                    'window' => 0,
                    'nofolow' => 0
                ),
                'placeholder' => 'https://themeum.com/'
            ),
            'button_class' => array(
                'type' => 'text',
                'title' => __('Button css class','edumax-core'),
                'placeholder' => __('classname','edumax-core'),
                'std' => '',
            ),
            'button_class' => array(
                'type' => 'text',
                'title' => __('Button css class','edumax-core'),
                'placeholder' => __('classname','edumax-core'),
                'std' => '',
            ),
            'button_style' => array(
                'type' => 'select',
                'title' => __('Button Style','edumax-core'),
                'values' => array(
                    'default' => 'Default',
                    'btn-fill' => 'Fill'
                ),
                'std' => 'btn-fill'
            ),
            'button_size' => array(
                'type' => 'select',
                'title' => __('Button Style','edumax-core'),
                'values' => array(
                    'standard' => 'Standard',
                    'btn_sm' => 'Small'
                ),
                'std' => 'standard'
            ),
            'button_alignment' => array(
                'type' => 'alignment',
                'title' => __('Alignment Field','edumax-core'),
                'std' => 'center',
                'selector' => '{{SELECTOR}} .edumax-btn-wrap{ text-align: {{data.button_alignment}}; }',
            )
        );

        return $settings;
    }

    public function render($data = null){
        $settings = $data['settings'];
        $button_text = $settings['button_text'];
        $button_link = $settings['button_link'];
        $button_class = $settings['button_class'];
        $button_style = $settings['button_style'];
        $button_size = $settings['button_size'];


        ob_start();
        ?>
            <div class="edumax-btn-wrap">
                <a
                    href="<?php esc_attr_e($button_link['link']); ?>"
                    class="edumax_btn <?php esc_attr_e($button_class. ' '. $button_style . ' ' . $button_size); ?>"
                    target="<?php $button_link['window'] == '1' ? esc_html_e('_blank') : esc_html_e('_self') ;?>"
                    <?php $button_link['nofolow'] == '1' ? esc_html_e('rel="nofollow"') : esc_html_e(''); ?>
                ><?php esc_html_e($button_text); ?></a>
            </div>


        <?php
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function getTemplate(){
        return '
            <#
                var button_link_url = data.button_link["link"] ? data.button_link["link"] : "",
                    button_link_target = data.button_link.window ? "_blank" : "_self",
                    button_link_nofolow = data.button_link.nofolow ? "nofollow" : "",
                    button_class = data.button_class + " " + data.button_style + " " + data.button_size;
                    
            #>
            <div class="edumax-btn-wrap">
                <a 
                    href="{{button_link_url}}" 
                    target="{{button_link_target}}" 
                    rel="{{button_link_nofolow}}" 
                    class="edumax_btn {{button_class}}"
                >{{data.button_text}}</a>
            </div>
        ';
    }

}
