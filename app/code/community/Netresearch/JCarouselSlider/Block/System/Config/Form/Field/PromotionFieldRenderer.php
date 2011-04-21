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
class Netresearch_JCarouselSlider_Block_System_Config_Form_Field_PromotionFieldRenderer extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $elementId = $element->getHtmlId();
        
        /*read configurations from system.xml*/
        $configarray = $element->getData('field_config')->asArray();
        $iframeurl = $configarray["parameters"]["iframeurl"];
        $iframeheight = $configarray["parameters"]["iframeheight"];
        
        //default values when theres no definition in system.xml or a wrong entry
        if ($iframeheight == "") {
            $iframeheight = "400px";
        }else{
            if (strlen($iframeheight) >= 3){
                $unitOfLength = substr($iframeheight, -2, 2);//the last both chars build the unit of length
                switch ($unitOfLength){
                    case "em":
                    case "ex":
                    case "px":
                    case "in":
                    case "cm":
                    case "mm":
                    case "pt":
                    case "pc":
                        break;
                    default:
                        $iframeheight = "400px";
                }
            }else{
                $iframeheight = "400px";
            }
        }
        
        //open the url in the iframe, when its readable
        if($iframeurl != "" && @fopen($iframeurl,"r")){
            $iframe = '<iframe src="'.$iframeurl.'" width="100%" height="100%" name="Netresearch" marginheight="0" marginwidth="0" frameborder="0"></iframe>';
            $html = '<div style="width:100%;height:'.$iframeheight.'">'.$iframe.'</div>';
        }else{
            $html = $this->getLayout()->createBlock('core/template')->setTemplate('jcslider/promotion/iframe.phtml')->toHtml() ;
            
            /*when you need functions use:
            $html = $this->getLayout()->createBlock('jcslider/promotion_iframe')->setTemplate('jcslider/promotion/iframe.phtml')->toHtml() ;
            
            ...an define functions in:
            app\code\community\Netresearch\JCarouselSlider\Block\Promotion\Iframe.php
            */
        }

        $html.= $element->getAfterElementHtml();
        return $html;
    }
}