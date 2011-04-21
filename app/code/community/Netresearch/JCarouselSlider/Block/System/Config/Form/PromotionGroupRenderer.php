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
class Netresearch_JCarouselSlider_Block_System_Config_Form_PromotionGroupRenderer extends Mage_Adminhtml_Block_System_Config_Form_Fieldset
{
    public function render(Varien_Data_Form_Element_Abstract $element) {
        $html = $this->_getHeaderHtml($element);
        foreach ($element->getSortedElements() as $field) {
            $field = $field->setScopeLabel('');
            $html.= $field->toHtml();
            $class_methods = $field->getData();
        }
        $html .= $this->_getFooterHtml($element);
        return $html;
    }

    protected function _getHeaderHtml($element) {
        $default = !$this->getRequest()->getParam('website') && !$this->getRequest()->getParam('store');
        $html = '<div  class="entry-edit-head collapseable" ><a id="'.$element->getHtmlId().'-head" href="#" onclick="Fieldset.toggleCollapse(\''.$element->getHtmlId().'\', \''.$this->getUrl('*/*/state').'\'); return false;">'.$element->getLegend().'</a></div>';
        $html.= '<input id="'.$element->getHtmlId().'-state" name="config_state['.$element->getId().']" type="hidden" value="'.(int)$this->_getCollapseState($element).'" />';
        $html.= '<fieldset class="'.$this->_getFieldsetCss().'" id="'.$element->getHtmlId().'">';
        return $html;
    }
    
    protected function _getFooterHtml($element) {
        $tooltipsExist = false;
        $html .= '</fieldset>' . $this->_getExtraJs($element, $tooltipsExist);
        return $html;
    }
}