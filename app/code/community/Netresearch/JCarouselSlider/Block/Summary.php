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
    public function __construct($namespace) { 
        $this->namespace = $namespace;
    }
    
    /**
    * @return string (1 the slider is enabled, 0 the slider is disabled)
    */
    public function getSliderActivation(){
        $activation = trim(Mage::getStoreConfig('jcslider/'.$this->namespace.'/jsactivation'));
        if($activation == "1")
            return "1";
        return "0";
    }
    
    /**
    * @return int (maximum count of items in crossell, minimum is 1)
    */
    public function getMaxItemCount(){
        $maxItems = (int) trim(Mage::getStoreConfig('jcslider/'.$this->namespace.'/jsmaxproducts'));
        if($maxItems < 2)
            return 1;
        return $maxItems;
    }
    
    /**
    * @return int (count of items which scrolled by click on next, minimum is 1)
    */
    public function getItemCountScroll(){
        $scrollNext = (int) trim(Mage::getStoreConfig('jcslider/'.$this->namespace.'/jsmaxproductsscroll'));
        if($scrollNext < 2)
            return 1;
        return $scrollNext;
    }
    
    /**
    * @return int (speed of scroll in milliseconds, minimum is 1000)
    */
    public function getScrollSpeed(){
        $scrollSpeed = trim(Mage::getStoreConfig('jcslider/'.$this->namespace.'/jsscrollspeed'));
        if($scrollSpeed < 2)
            return 1000;
        return $scrollSpeed;
    }
    
    /**
    * @return static (alignment of displaying the items)
    */
    public function getSliderAlignment(){
        $alignment = trim(Mage::getStoreConfig('jcslider/'.$this->namespace.'/jcalignment'));
        if($alignment == Netresearch_JCarouselSlider_Model_Alignment::ALIGNMENT_ACTION_HORIZONTAL)
            return Netresearch_JCarouselSlider_Model_Alignment::ALIGNMENT_ACTION_HORIZONTAL;
        return Netresearch_JCarouselSlider_Model_Alignment::ALIGNMENT_ACTION_VERTICAL;
    }
    
    /**
    * @return int (is the slider circular or not?)
    */
    public function getSliderCircular(){
        $circulating = trim(Mage::getStoreConfig('jcslider/'.$this->namespace.'/jscircle'));
        if($circulating == "1")
            return "1";
        return "0";
    }
    
    /**
    * @return int (time in seconds for autoscrolling)
    */
    public function getAutoScrollTime(){
        $seconds = trim(Mage::getStoreConfig('jcslider/'.$this->namespace.'/jsautoscrolling'));
        if($seconds > 0)
            return $seconds;
        return 0;
    }
    
    /**
    * @return int (slidedirection, 1=right to left)
    */
    public function getDisplayDirection(){
        $rtl = trim(Mage::getStoreConfig('jcslider/'.$this->namespace.'/jsautoscrolldirection'));
        if($rtl == "1")
            return "1";
        return "0";
    }
    
    /**
    * @return int (scrolleffect, has the slider a scrolleffect?)
    */
    public function getSliderScrollEffekt(){
        $jsscrolleffekt = trim(Mage::getStoreConfig('jcslider/'.$this->namespace.'/jsscrolleffekt'));
        if($jsscrolleffekt == "1")
            return "1";
        return "0";
    }  
}