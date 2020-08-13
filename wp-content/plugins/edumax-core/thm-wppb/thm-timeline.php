<?php

class Addons_Timeline{
    public function get_name(){
        return 'learnhub-timeline';
    }
    public function get_title(){
        return 'Timeline';
    }
    public function get_icon() {
        return 'wppb-font-slider';
    }
    public function get_category_name(){
        return 'Edumax';
    }

    // Textarea Settings Fields
    public function get_settings() {
        $settings = array(
            'timeline_item' => array(
                'title' => 'Repeatable Item',
                'type' => 'repeatable',
                'attr' => array(
                    'tab_name' => array(
                        'type' => 'text',
                        'title' => __('Tab Name','edumax-core'),
                        'placeholder' => __('Name here...','edumax-core'),
                        'std' => 'Tab Menu',
                    ),
                    'tab_icon' => array(
                        'type' => 'icon',
                        'title' => __('Icon Field','edumax-core'),
                        'std' => 'fab fa-adn',
                    ),
                    'tab_media' => array(
                        'type' => 'media',
                        'title' => __('Media Title','edumax-core'),
                        'std' => array( 'url' => 'https://picsum.photos/350/300')
                    ),
                    'tab_content_heading' => array(
                        'type' => 'text',
                        'title' => __('Heading', 'edumax-core'),
                        'std' => 'Intelligent Course Builder'
                    ),
                    'tab_content_text' => array(
                        'type' => 'editor',
                        'title' => __('Content', 'edumax-core'),
                        'std' => 'Backer gives you all functionalities you need to run and manage'
                    )
                ),
                'std' => array(
                    array(
                        'tab_name' => 'Tab Name',
                        'tab_icon' => 'fab fa-adn',
                        'tab_media' => array( 'url' => 'https://picsum.photos/350/300'),
                        'tab_content_heading' => 'Intelligent Course Builder',
                        'tab_content_text' => 'Backer gives you all functionalities you need to run and manage'
                    )
                ),
            )
        );

        return $settings;
    }

    public function render($data = null){
        $settings = $data['settings'];
        $timeline_item = $settings['timeline_item'];


        $unique_id =  uniqid();

        ob_start(); ?>

        <div class="timeline-tab-container">
            <div class="row no-gutters">
                <div class="col">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs timeline-tab-menu row no-gutters" id="myTab" role="tablist">
                        <?php $index = 0; foreach ($timeline_item as $timeline) : $index++; ?>
                            <li class="nav-item tutor-timeline-item col-md">
                                <a class="<?php echo esc_attr($index == 1 ? 'active' : '');  ?>" data-toggle="tab" href="#<?php echo 'tab'.$unique_id.$index ?>" role="tab" aria-selected="<?php echo esc_attr($index == 1 ? 'true' : '');  ?>">
                                    <i class="<?php echo esc_attr($timeline['tab_icon']); ?>"></i><?php echo esc_html($timeline['tab_name']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="tab-content timeline-tab-content">
                <?php $index = 0; foreach ($timeline_item as $timeline) : $index++;  ?>

                    <div class="tab-pane fade <?php echo esc_attr( $index == 1 ? 'active show' : '');  ?>" id="<?php echo 'tab'.$unique_id.$index ?>" role="tabpanel">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12">
                                <div class="tab-content-image">
                                    <img src="<?php echo esc_url($timeline['tab_media']['url']); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="tab-content-inner">
                                    <h4 class="tab-content-heading"><?php echo esc_html($timeline['tab_content_heading']); ?></h4>
                                    <?php echo wp_kses_post($timeline['tab_content_text']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

        <?php
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function getTemplate(){

        return '
            <# 
                var index = 0,
                    timeline_item = data["timeline_item"],
                    randomId = Math.random().toString(36).substring(2) + (new Date()).getTime().toString(36);
            #>
            <div class="timeline-tab-container">
                <div class="row no-gutters">
                    <div class="col">
                        <ul class="nav nav-tabs timeline-tab-menu row no-gutters" id="myTab" role="tablist">
                            <#
                                    
                                timeline_item.forEach(function(value, index){
                                    var val = {
                                        activeClass: index === 0 ? "active" : "",
                                        ariaSelected: index === 0 ? "true" : "",
                                        tabHref: "tab" + randomId + index
                                    }
                                    #>
                                        <li class="nav-item tutor-timeline-item col-md">
                                            <a class="{{val.activeClass}}"  data-toggle="tab" href="#{{val.tabHref}}" role="tab" aria-selected="{{val.ariaSelected}}">
                                                <i class="{{value.tab_icon}}"></i>
                                                {{value.tab_name}}
                                            </a>
                                        </li>
                                    <#
                                });
                            #>
                        </ul>
                    </div>
                </div>
                
                <div class="tab-content timeline-tab-content">
                    <#
                        timeline_item.forEach(function(value, index){
                            var val = {
                                activeClass: index === 0 ? "active show" : "",
                                ariaSelected: index === 0 ? "true" : "",
                                tabId: "tab" + randomId + index
                            }
                            #>
                            <div class="tab-pane fade {{val.activeClass}}" id="{{val.tabId}}" role="tabpanel">
                                <div class="row align-items-center">
                                    <div class="col-md-6 col-12">
                                        <div class="tab-content-image">
                                            <img src="{{value.tab_media.url}}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="tab-content-inner">
                                            <h4 class="tab-content-heading">{{value.tab_content_heading}}</h4>
                                            {{{value.tab_content_text}}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <#
                        });
                    #>
                </div>
                
            </div>
        ';

    }

}
