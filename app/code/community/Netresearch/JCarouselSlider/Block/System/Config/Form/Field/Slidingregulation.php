<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category           Netresearch
 * @package            Netresearch_JCarouselSlider
 * @author               Dandy Umlauft <dandy.umlauft@netresearch.de>
 * @copyright           Copyright (c) 2011 Dandy Umlauft | Netresearch GmbH & Co.KG (http://www.netresearch.de)
 * @license               http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Netresearch_JCarouselSlider_Block_System_Config_Form_Field_Slidingregulation extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element) {
        $elementId = $element->getHtmlId();
        
        /* read configurations from system.xml */
        $configarray = $element->getData('field_config')->asArray();
        $min   = $configarray['parameters']['min'];
        $max   = $configarray['parameters']['max'];
        $step  = $configarray['parameters']['step'];
        $label = $configarray['parameters']['label'];
        $skin  = $configarray['parameters']['skin'];
        
        /* default values when theres no definition in system.xml */
        if ($min == '') {
            $min = '0';
        }
        if ($max == '') {
            $max = '10';
        }
        if ($step == '') {
            $step = '1';
        }
        if ($min >= $max){
            $min = '0';
            $max = '10';
            $step = '1';
        }
        if ($label == '') {
            $label = 'Unit / Maßeinheit';
        }
        
        //wrong or no entering of a skin
        switch($skin){
            case 'blue':
            case 'plastic':
            case 'round':
            case 'round_plastic':
                break;
            default:
                $skin = 'plastic';
        }

        //normal Inputfield, wolud hidden by the Slider JS
        $html = '<input id="' . $elementId . '" name="' . $element->getName()
            . '" value="' . $element->getEscapedValue() . '" '
            . $element->serialize($element->getHtmlAttributes()) . '/>' . "\n";
        
        //additional JS with configurations from system.xml
        $html.= '<script type="text/javascript" charset="utf-8">
                        if(typeof jQuery == "function") {//jQuery is a function when the jQuery library was loaded
                            jQuery.noConflict();//get no conflicts with prototype in magento
                            if(typeof jQuery("#'.$elementId.'").slider == "function") {//jQuery.slider is a function when the jQuerySlider library was loaded
                                jQuery("#'.$elementId.'").slider({ from: '.$min.', to: '.$max.', step: '.$step.', dimension: \'&nbsp;'.$label.'\', skin: "'.$skin.'" });
                            }
                        }
                 </script>';
        $html.= $element->getAfterElementHtml();
        return $html;
    }
}