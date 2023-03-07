<?php
/**
 * MB "Vienas bitas" (mypdftemplate.com)
 *
 * @category Mpt
 * @package  mpt-custom-var
 * @author   MB "Vienas bitas" <info@mypdftemplate.com>
 * @license  https://www.gnu.org/licenses/old-licenses/gpl-2.0.html GPLv2
 * @link     https://github.com/mypdftemplate/mpt-custom-var.git
 */
/*
Plugin Name: PDF Invoice for WooCommerce Custom Variable
Plugin URI: https://www.mypdftemplate.com/
Description: My PDF Template Custom Variable
Version: 0.0.1
Requires at least: 5.0
Requires PHP: 5.2
Author: MB Vienas bitas
Author URI: https://www.mypdftemplate.com/
License: GPLv2 or later
Text Domain: mpt-custom-var
*/

defined('ABSPATH') || exit;

add_action('mpt_pdf_custom_variable', function ($dataCollector)
{
    //Get order id
    $orderId = $dataCollector->getData('order_id');

    //Load order with
    $order = wc_get_order($orderId);

    //Set value as empty
    $customerId = '';

    //Check, if order exist
    if ($order) {
        //Extract data you need from order object
        $customerId = $order->get_customer_id();;
    }

    //Register new variable
    $dataCollector->setData('customer_id', $customerId);
});