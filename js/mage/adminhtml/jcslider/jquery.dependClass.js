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

/*
 * Depend Class v0.1b : attach class based on first class in list of current element
 * File: jquery.dependClass.js
 * Copyright (c) 2009 Egor Hmelyoff, hmelyoff@gmail.com
 */
(function($) {
    jQuery.noConflict();
	// Init plugin function
	$.baseClass = function(obj){
	  obj = $(obj);
	  return obj.get(0).className.match(/([^ ]+)/)[1];
	};
	
	$.fn.addDependClass = function(className, delimiter){
		var options = {
		  delimiter: delimiter ? delimiter : '-'
		}
		return this.each(function(){
		  var baseClass = $.baseClass(this);
		  if(baseClass)
    		$(this).addClass(baseClass + options.delimiter + className);
		});
	};

	$.fn.removeDependClass = function(className, delimiter){
		var options = {
		  delimiter: delimiter ? delimiter : '-'
		}
		return this.each(function(){
		  var baseClass = $.baseClass(this);
		  if(baseClass)
    		$(this).removeClass(baseClass + options.delimiter + className);
		});
	};

	$.fn.toggleDependClass = function(className, delimiter){
		var options = {
		  delimiter: delimiter ? delimiter : '-'
		}
		return this.each(function(){
		  var baseClass = $.baseClass(this);
		  if(baseClass)
		    if($(this).is("." + baseClass + options.delimiter + className))
    		  $(this).removeClass(baseClass + options.delimiter + className);
    		else
    		  $(this).addClass(baseClass + options.delimiter + className);
		});
	};

	// end of closure
})(jQuery);