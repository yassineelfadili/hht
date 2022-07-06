<?php

$args = array(
		
		'datatitle'=>'',
		'datanumber'=>'',
		
);

extract(shortcode_atts($args, $atts));

					$html = '';

					
					$html .= '<div class="inline-facts-wrap">
                    <div class="inline-facts">
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="0" data-num="'.$datanumber.'">0</div>
                            </div>
                        </div>
                        <h6>'.$datatitle.'</h6>
						</div>
					</div>';
  
					


echo $html;