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
class Netresearch_JCarouselSlider_Block_Summary
{
    /**
     * namespace for the path of storeconfig upsell, crosssell or related products
     */
    private $namespace = "namespace"; 

    /**
     * Constructor set the namespace for upsell, crosssell or related products
     */
    public function __construct($namespace)
    { 
        $this->namespace = $namespace;
    }
    
    /**
     * @return string (1 the slider is enabled, 0 the slider is disabled)
     */
    public function getSliderActivation()
    {
        return ($this->getRawStoreConfig('jsactivation') == '1') ? '1' : '0';
    }
    
    /**
     * @return int (maximum count of items in crossell, minimum is 1)
     */
    public function getMaxItemCount()
    {
        $maxItems = (int) $this->getRawStoreConfig('jsmaxproducts');
        return ($maxItems < 2) ? 1 : $maxItems;
    }
    
    /**
     * @return int (count of items which scrolled by click on next, minimum is 1)
     */
    public function getItemCountScroll()
    {
        $scrollNext = (int) $this->getRawStoreConfig('jsmaxproductsscroll');
        return ($scrollNext < 2) ? 1 : $scrollNext;
    }
    
    /**
     * @return int (speed of scroll in milliseconds, minimum is 1000)
     */
    public function getScrollSpeed()
    {
        $scrollSpeed = $this->getRawStoreConfig('jsscrollspeed');
        return ($scrollSpeed < 2) ? 1000 : $scrollSpeed;
    }
    
    /**
     * @return static (alignment of displaying the items)
     */
    public function getSliderAlignment()
    {
        $alignment = $this->getRawStoreConfig('jcalignment');
        if ($alignment == Netresearch_JCarouselSlider_Model_Alignment::ALIGNMENT_ACTION_HORIZONTAL) {
            return Netresearch_JCarouselSlider_Model_Alignment::ALIGNMENT_ACTION_HORIZONTAL;
        }
        return Netresearch_JCarouselSlider_Model_Alignment::ALIGNMENT_ACTION_VERTICAL;
    }
    
    /**
    * @return int (is the slider circular or not?)
    */
    public function getSliderCircular(){
        return ($this->getRawStoreConfig('jscircle') == '1') ? '1' : '0';
    }
    
    /**
    * @return int (time in seconds for autoscrolling)
    */
    public function getAutoScrollTime(){
        $seconds = $this->getRawStoreConfig('jsautoscrolling');
        return (0 < $seconds) ? $seconds : 0;
    }
    
    /**
    * @return int (slide direction, 1=right to left)
    */
    public function getDisplayDirection(){
        return ($this->getRawStoreConfig('jsautoscrolldirection') == '1') ? '1' : '0';
    }
    
    /**
    * @return int (scrolleffect, has the slider a scrolleffect?)
    */
    public function getSliderScrollEffekt(){
        return ($this->getRawStoreConfig('jsscrolleffekt') == 1) ? '1' : '0';
    }
    
    /**
     * Get raw config data
     * 
     * @param string $lastPathStep
     * 
     * @return string
     */
    protected function getRawStoreConfig($lastPathStep)
    {
        return trim(Mage::getStoreConfig(sprintf(
            'jcslider/%s/%s',
            $this->namespace,
            $lastPathStep
        )));
    }
}