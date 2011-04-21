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
class Netresearch_JCarouselSlider_Model_Source_DisplayAction
{
    /**
     * Get displayaction for config section in backend
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array(
                'value' => Netresearch_JCarouselSlider_Model_Alignment::ALIGNMENT_ACTION_HORIZONTAL,
                'label' => Mage::helper('jcslider')->__('Horizontally')
            ),
            array(
                'value' => Netresearch_JCarouselSlider_Model_Alignment::ALIGNMENT_ACTION_VERTICAL,
                'label' => Mage::helper('jcslider')->__('Vertically')
            ),
        );
    }
}