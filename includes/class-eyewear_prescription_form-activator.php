<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.dugudlabs.com
 * @since      1.0.0
 *
 * @package    Eyewear_prescription_form
 * @subpackage Eyewear_prescription_form/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Eyewear_prescription_form
 * @subpackage Eyewear_prescription_form/includes
 * @author     dugudlabs <ravinstra5876@gmail.com>
 */
class Eyewear_prescription_form_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
			global $wpdb;
			$create_table_query = "
					CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}glasses` (
					  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
					  `name` text NOT NULL,
					  `description` text NOT NULL,
					  `price` text NOT NULL,
					  `metadata` text ,
					  `disabled` text ,
					  `image` text ,
					  PRIMARY KEY (id)
					)AUTO_INCREMENT=100  ENGINE=MyISAM  DEFAULT CHARSET=utf8;
			";
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $create_table_query );
			$insert_query = "
			INSERT INTO `{$wpdb->prefix}glasses` (`id`, `name`, `description`, `price`, `metadata`, `disabled`, `image`) VALUES ('100', 'Distance', 'Single Vision(General Use)', '0', NULL, 'false', 'https://www.dugudlabs.com/specfit/wp-content/uploads/2020/04/distance.png'), ('101', 'NEAR VISION', 'Reading Glasses', '0', NULL, 'false', 'https://www.dugudlabs.com/specfit/wp-content/uploads/2020/04/nearvision.png');";
			dbDelta( $insert_query );
			$create_table_query = "
					CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}lens` (
						`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
						`name` text NOT NULL,
						`description` text NOT NULL,
						`price` text NOT NULL,
						`metadata` text ,
						`disabled` text ,
						`image` text ,
						PRIMARY KEY (id)
					)AUTO_INCREMENT=100 ENGINE=MyISAM  DEFAULT CHARSET=utf8;
			";
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $create_table_query );
			$insert_query = "
			INSERT INTO `{$wpdb->prefix}lens` (`id`, `name`, `description`, `price`, `metadata`, `disabled`, `image`) VALUES ('100', 'BASIC LENSES', 'MOST POPULAR LENSES', '0', NULL, 'false', 'https://www.dugudlabs.com/specfit/wp-content/uploads/2020/04/BASICLENSES.png'), ('101', '1.57 MID INDEX', 'MOST POPULAR LENSES', '0', NULL, 'false', 'https://www.dugudlabs.com/specfit/wp-content/uploads/2020/04/MIDINDEX.png');";
			dbDelta( $insert_query );
			$create_table_query = "
					CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}coatings` (
						`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
						`name` text NOT NULL,
						`description` text ,
						`price` text NOT NULL,
						`metadata` text ,
						`disabled` text ,
						`image` text ,
						PRIMARY KEY (id)
					)AUTO_INCREMENT=100 ENGINE=MyISAM  DEFAULT CHARSET=utf8;
			";
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $create_table_query );
			$insert_query = "
			INSERT INTO `{$wpdb->prefix}coatings` (`id`, `name`, `description`, `price`, `metadata`, `disabled`, `image`) VALUES ('100', 'STANDARD', 'STANDARD Coating', '0', NULL, 'false', 'https://www.dugudlabs.com/specfit/wp-content/uploads/2020/04/STANDARD.png'), ('101', 'COMPUTER LENS', 'COMPUTER LENS Coating', '0', NULL, 'false', 'https://www.dugudlabs.com/specfit/wp-content/uploads/2020/04/COMPUTERLENS.png');";
			dbDelta( $insert_query );
			$create_table_query = "
					CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}epf_properties` (
						`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
						`data` text NOT NULL,
						PRIMARY KEY (id)
					)AUTO_INCREMENT=100 ENGINE=MyISAM  DEFAULT CHARSET=utf8;
			";
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $create_table_query );
			$insert_data = '{"RIGHT":{"SPH":{"-15.00":{"price":"0"},"-14.75":{"price":"0"},"-14.50":{"price":"0"},"-14.25":{"price":"0"},"-14.00":{"price":"0"},"-13.75":{"price":"0"},"-13.50":{"price":"0"},"-13.25":{"price":"0"},"-13.00":{"price":"0"},"-12.75":{"price":"0"},"-12.50":{"price":"0"},"-12.25":{"price":"0"},"-12.00":{"price":"0"},"-11.75":{"price":"0"},"-11.50":{"price":"0"},"-11.25":{"price":"0"},"-11.00":{"price":"0"},"-10.75":{"price":"0"},"-10.50":{"price":"0"},"-10.25":{"price":"0"},"-10.00":{"price":"0"},"-9.75":{"price":"0"},"-9.50":{"price":"0"},"-9.25":{"price":"0"},"-9.00":{"price":"0"},"-8.75":{"price":"0"},"-8.50":{"price":"0"},"-8.25":{"price":"0"},"-8.00":{"price":"0"},"-7.75":{"price":"0"},"-7.50":{"price":"0"},"-7.25":{"price":"0"},"-7.00":{"price":"0"},"-6.75":{"price":"0"},"-6.50":{"price":"0"},"-6.25":{"price":"0"},"-6.00":{"price":"0"},"-5.75":{"price":"0"},"-5.50":{"price":"0"},"-5.25":{"price":"0"},"-5.00":{"price":"0"},"-4.75":{"price":"0"},"-4.50":{"price":"0"},"-4.25":{"price":"0"},"-4.00":{"price":"0"},"-3.75":{"price":"0"},"-3.50":{"price":"0"},"-3.25":{"price":"0"},"-3.00":{"price":"0"},"-2.75":{"price":"0"},"-2.50":{"price":"0"},"-2.25":{"price":"0"},"-2.00":{"price":"0"},"-1.75":{"price":"0"},"-1.50":{"price":"0"},"-1.25":{"price":"0"},"-1.00":{"price":"0"},"-0.75":{"price":"0"},"-0.50":{"price":"0"},"-0.25":{"price":"0"},"+0.00":{"price":"0"},"+0.25":{"price":"0"},"+0.50":{"price":"0"},"+0.75":{"price":"0"},"+1.00":{"price":"0"},"+1.25":{"price":"0"},"+1.50":{"price":"0"},"+1.75":{"price":"0"},"+2.00":{"price":"0"},"+2.25":{"price":"0"},"+2.50":{"price":"0"},"+2.75":{"price":"0"},"+3.00":{"price":"0"},"+3.25":{"price":"0"},"+3.50":{"price":"0"},"+3.75":{"price":"0"},"+4.00":{"price":"0"},"+4.25":{"price":"0"},"+4.50":{"price":"0"},"+4.75":{"price":"0"},"+5.00":{"price":"0"},"+5.25":{"price":"0"},"+5.50":{"price":"0"},"+5.75":{"price":"0"},"+6.00":{"price":"0"},"+6.25":{"price":"0"},"+6.50":{"price":"0"},"+6.75":{"price":"0"},"+7.00":{"price":"0"},"+7.25":{"price":"0"},"+7.50":{"price":"0"},"+7.75":{"price":"0"},"+8.00":{"price":"0"},"+8.25":{"price":"0"},"+8.50":{"price":"0"},"+8.75":{"price":"0"},"+9.00":{"price":"0"},"+9.25":{"price":"0"},"+9.50":{"price":"0"},"+9.75":{"price":"0"},"+10.00":{"price":"0"}},"CYL":{"-6.00":{"price":"0"},"-5.75":{"price":"0"},"-5.50":{"price":"0"},"-5.25":{"price":"0"},"-5.00":{"price":"0"},"-4.75":{"price":"0"},"-4.50":{"price":"0"},"-4.25":{"price":"0"},"-4.00":{"price":"0"},"-3.75":{"price":"0"},"-3.50":{"price":"0"},"-3.25":{"price":"0"},"-3.00":{"price":"0"},"-2.75":{"price":"0"},"-2.50":{"price":"0"},"-2.25":{"price":"0"},"-2.00":{"price":"0"},"-1.75":{"price":"0"},"-1.50":{"price":"0"},"-1.25":{"price":"0"},"-1.00":{"price":"0"},"-0.75":{"price":"0"},"-0.50":{"price":"0"},"-0.25":{"price":"0"},"+0.00":{"price":"0"},"+0.25":{"price":"0"},"+0.50":{"price":"0"},"+0.75":{"price":"0"},"+1.00":{"price":"0"},"+1.25":{"price":"0"},"+1.50":{"price":"0"},"+1.75":{"price":"0"},"+2.00":{"price":"0"},"+2.25":{"price":"0"},"+2.50":{"price":"0"},"+2.75":{"price":"0"},"+3.00":{"price":"0"},"+3.25":{"price":"0"},"+3.50":{"price":"0"},"+3.75":{"price":"0"},"+4.00":{"price":"0"},"+4.25":{"price":"0"},"+4.50":{"price":"0"},"+4.75":{"price":"0"},"+5.00":{"price":"0"},"+5.25":{"price":"0"},"+5.50":{"price":"0"},"+5.75":{"price":"0"},"+6.00":{"price":"0"}},"AXIS":{"0":{"price":"0"},"1":{"price":"0"},"2":{"price":"0"},"3":{"price":"0"},"4":{"price":"0"},"5":{"price":"0"},"6":{"price":"0"},"7":{"price":"0"},"8":{"price":"0"},"9":{"price":"0"},"10":{"price":"0"},"11":{"price":"0"},"12":{"price":"0"},"13":{"price":"0"},"14":{"price":"0"},"15":{"price":"0"},"16":{"price":"0"},"17":{"price":"0"},"18":{"price":"0"},"19":{"price":"0"},"20":{"price":"0"},"21":{"price":"0"},"22":{"price":"0"},"23":{"price":"0"},"24":{"price":"0"},"25":{"price":"0"},"26":{"price":"0"},"27":{"price":"0"},"28":{"price":"0"},"29":{"price":"0"},"30":{"price":"0"},"31":{"price":"0"},"32":{"price":"0"},"33":{"price":"0"},"34":{"price":"0"},"35":{"price":"0"},"36":{"price":"0"},"37":{"price":"0"},"38":{"price":"0"},"39":{"price":"0"},"40":{"price":"0"},"41":{"price":"0"},"42":{"price":"0"},"43":{"price":"0"},"44":{"price":"0"},"45":{"price":"0"},"46":{"price":"0"},"47":{"price":"0"},"48":{"price":"0"},"49":{"price":"0"},"50":{"price":"0"},"51":{"price":"0"},"52":{"price":"0"},"53":{"price":"0"},"54":{"price":"0"},"55":{"price":"0"},"56":{"price":"0"},"57":{"price":"0"},"58":{"price":"0"},"59":{"price":"0"},"60":{"price":"0"},"61":{"price":"0"},"62":{"price":"0"},"63":{"price":"0"},"64":{"price":"0"},"65":{"price":"0"},"66":{"price":"0"},"67":{"price":"0"},"68":{"price":"0"},"69":{"price":"0"},"70":{"price":"0"},"71":{"price":"0"},"72":{"price":"0"},"73":{"price":"0"},"74":{"price":"0"},"75":{"price":"0"},"76":{"price":"0"},"77":{"price":"0"},"78":{"price":"0"},"79":{"price":"0"},"80":{"price":"0"},"81":{"price":"0"},"82":{"price":"0"},"83":{"price":"0"},"84":{"price":"0"},"85":{"price":"0"},"86":{"price":"0"},"87":{"price":"0"},"88":{"price":"0"},"89":{"price":"0"},"90":{"price":"0"},"91":{"price":"0"},"92":{"price":"0"},"93":{"price":"0"},"94":{"price":"0"},"95":{"price":"0"},"96":{"price":"0"},"97":{"price":"0"},"98":{"price":"0"},"99":{"price":"0"},"100":{"price":"0"},"101":{"price":"0"},"102":{"price":"0"},"103":{"price":"0"},"104":{"price":"0"},"105":{"price":"0"},"106":{"price":"0"},"107":{"price":"0"},"108":{"price":"0"},"109":{"price":"0"},"110":{"price":"0"},"111":{"price":"0"},"112":{"price":"0"},"113":{"price":"0"},"114":{"price":"0"},"115":{"price":"0"},"116":{"price":"0"},"117":{"price":"0"},"118":{"price":"0"},"119":{"price":"0"},"120":{"price":"0"},"121":{"price":"0"},"122":{"price":"0"},"123":{"price":"0"},"124":{"price":"0"},"125":{"price":"0"},"126":{"price":"0"},"127":{"price":"0"},"128":{"price":"0"},"129":{"price":"0"},"130":{"price":"0"},"131":{"price":"0"},"132":{"price":"0"},"133":{"price":"0"},"134":{"price":"0"},"135":{"price":"0"},"136":{"price":"0"},"137":{"price":"0"},"138":{"price":"0"},"139":{"price":"0"},"140":{"price":"0"},"141":{"price":"0"},"142":{"price":"0"},"143":{"price":"0"},"144":{"price":"0"},"145":{"price":"0"},"146":{"price":"0"},"147":{"price":"0"},"148":{"price":"0"},"149":{"price":"0"},"150":{"price":"0"},"151":{"price":"0"},"152":{"price":"0"},"153":{"price":"0"},"154":{"price":"0"},"155":{"price":"0"},"156":{"price":"0"},"157":{"price":"0"},"158":{"price":"0"},"159":{"price":"0"},"160":{"price":"0"},"161":{"price":"0"},"162":{"price":"0"},"163":{"price":"0"},"164":{"price":"0"},"165":{"price":"0"},"166":{"price":"0"},"167":{"price":"0"},"168":{"price":"0"},"169":{"price":"0"},"170":{"price":"0"},"171":{"price":"0"},"172":{"price":"0"},"173":{"price":"0"},"174":{"price":"0"},"175":{"price":"0"},"176":{"price":"0"},"177":{"price":"0"},"178":{"price":"0"},"179":{"price":"0"},"180":{"price":"0"}},"ADD":{"1.00":{"price":"0"},"1.25":{"price":"0"},"1.50":{"price":"0"},"1.75":{"price":"0"},"2.00":{"price":"0"},"2.25":{"price":"0"},"2.50":{"price":"0"},"2.75":{"price":"0"},"3.00":{"price":"0"}},"PD":{"23":{"price":"0"},"24":{"price":"0"},"25":{"price":"0"},"26":{"price":"0"},"27":{"price":"0"},"28":{"price":"0"},"29":{"price":"0"},"30":{"price":"0"},"31":{"price":"0"},"32":{"price":"0"},"33":{"price":"0"},"34":{"price":"0"},"35":{"price":"0"},"36":{"price":"0"},"37":{"price":"0"},"38":{"price":"0"},"39":{"price":"0"},"40":{"price":"0"}}},"LEFT":{"SPH":{"-15.00":{"price":"0"},"-14.75":{"price":"0"},"-14.50":{"price":"0"},"-14.25":{"price":"0"},"-14.00":{"price":"0"},"-13.75":{"price":"0"},"-13.50":{"price":"0"},"-13.25":{"price":"0"},"-13.00":{"price":"0"},"-12.75":{"price":"0"},"-12.50":{"price":"0"},"-12.25":{"price":"0"},"-12.00":{"price":"0"},"-11.75":{"price":"0"},"-11.50":{"price":"0"},"-11.25":{"price":"0"},"-11.00":{"price":"0"},"-10.75":{"price":"0"},"-10.50":{"price":"0"},"-10.25":{"price":"0"},"-10.00":{"price":"0"},"-9.75":{"price":"0"},"-9.50":{"price":"0"},"-9.25":{"price":"0"},"-9.00":{"price":"0"},"-8.75":{"price":"0"},"-8.50":{"price":"0"},"-8.25":{"price":"0"},"-8.00":{"price":"0"},"-7.75":{"price":"0"},"-7.50":{"price":"0"},"-7.25":{"price":"0"},"-7.00":{"price":"0"},"-6.75":{"price":"0"},"-6.50":{"price":"0"},"-6.25":{"price":"0"},"-6.00":{"price":"0"},"-5.75":{"price":"0"},"-5.50":{"price":"0"},"-5.25":{"price":"0"},"-5.00":{"price":"0"},"-4.75":{"price":"0"},"-4.50":{"price":"0"},"-4.25":{"price":"0"},"-4.00":{"price":"0"},"-3.75":{"price":"0"},"-3.50":{"price":"0"},"-3.25":{"price":"0"},"-3.00":{"price":"0"},"-2.75":{"price":"0"},"-2.50":{"price":"0"},"-2.25":{"price":"0"},"-2.00":{"price":"0"},"-1.75":{"price":"0"},"-1.50":{"price":"0"},"-1.25":{"price":"0"},"-1.00":{"price":"0"},"-0.75":{"price":"0"},"-0.50":{"price":"0"},"-0.25":{"price":"0"},"+0.00":{"price":"0"},"+0.25":{"price":"0"},"+0.50":{"price":"0"},"+0.75":{"price":"0"},"+1.00":{"price":"0"},"+1.25":{"price":"0"},"+1.50":{"price":"0"},"+1.75":{"price":"0"},"+2.00":{"price":"0"},"+2.25":{"price":"0"},"+2.50":{"price":"0"},"+2.75":{"price":"0"},"+3.00":{"price":"0"},"+3.25":{"price":"0"},"+3.50":{"price":"0"},"+3.75":{"price":"0"},"+4.00":{"price":"0"},"+4.25":{"price":"0"},"+4.50":{"price":"0"},"+4.75":{"price":"0"},"+5.00":{"price":"0"},"+5.25":{"price":"0"},"+5.50":{"price":"0"},"+5.75":{"price":"0"},"+6.00":{"price":"0"},"+6.25":{"price":"0"},"+6.50":{"price":"0"},"+6.75":{"price":"0"},"+7.00":{"price":"0"},"+7.25":{"price":"0"},"+7.50":{"price":"0"},"+7.75":{"price":"0"},"+8.00":{"price":"0"},"+8.25":{"price":"0"},"+8.50":{"price":"0"},"+8.75":{"price":"0"},"+9.00":{"price":"0"},"+9.25":{"price":"0"},"+9.50":{"price":"0"},"+9.75":{"price":"0"},"+10.00":{"price":"0"}},"CYL":{"-6.00":{"price":"0"},"-5.75":{"price":"0"},"-5.50":{"price":"0"},"-5.25":{"price":"0"},"-5.00":{"price":"0"},"-4.75":{"price":"0"},"-4.50":{"price":"0"},"-4.25":{"price":"0"},"-4.00":{"price":"0"},"-3.75":{"price":"0"},"-3.50":{"price":"0"},"-3.25":{"price":"0"},"-3.00":{"price":"0"},"-2.75":{"price":"0"},"-2.50":{"price":"0"},"-2.25":{"price":"0"},"-2.00":{"price":"0"},"-1.75":{"price":"0"},"-1.50":{"price":"0"},"-1.25":{"price":"0"},"-1.00":{"price":"0"},"-0.75":{"price":"0"},"-0.50":{"price":"0"},"-0.25":{"price":"0"},"+0.00":{"price":"0"},"+0.25":{"price":"0"},"+0.50":{"price":"0"},"+0.75":{"price":"0"},"+1.00":{"price":"0"},"+1.25":{"price":"0"},"+1.50":{"price":"0"},"+1.75":{"price":"0"},"+2.00":{"price":"0"},"+2.25":{"price":"0"},"+2.50":{"price":"0"},"+2.75":{"price":"0"},"+3.00":{"price":"0"},"+3.25":{"price":"0"},"+3.50":{"price":"0"},"+3.75":{"price":"0"},"+4.00":{"price":"0"},"+4.25":{"price":"0"},"+4.50":{"price":"0"},"+4.75":{"price":"0"},"+5.00":{"price":"0"},"+5.25":{"price":"0"},"+5.50":{"price":"0"},"+5.75":{"price":"0"},"+6.00":{"price":"0"}},"AXIS":{"0":{"price":"0"},"1":{"price":"0"},"2":{"price":"0"},"3":{"price":"0"},"4":{"price":"0"},"5":{"price":"0"},"6":{"price":"0"},"7":{"price":"0"},"8":{"price":"0"},"9":{"price":"0"},"10":{"price":"0"},"11":{"price":"0"},"12":{"price":"0"},"13":{"price":"0"},"14":{"price":"0"},"15":{"price":"0"},"16":{"price":"0"},"17":{"price":"0"},"18":{"price":"0"},"19":{"price":"0"},"20":{"price":"0"},"21":{"price":"0"},"22":{"price":"0"},"23":{"price":"0"},"24":{"price":"0"},"25":{"price":"0"},"26":{"price":"0"},"27":{"price":"0"},"28":{"price":"0"},"29":{"price":"0"},"30":{"price":"0"},"31":{"price":"0"},"32":{"price":"0"},"33":{"price":"0"},"34":{"price":"0"},"35":{"price":"0"},"36":{"price":"0"},"37":{"price":"0"},"38":{"price":"0"},"39":{"price":"0"},"40":{"price":"0"},"41":{"price":"0"},"42":{"price":"0"},"43":{"price":"0"},"44":{"price":"0"},"45":{"price":"0"},"46":{"price":"0"},"47":{"price":"0"},"48":{"price":"0"},"49":{"price":"0"},"50":{"price":"0"},"51":{"price":"0"},"52":{"price":"0"},"53":{"price":"0"},"54":{"price":"0"},"55":{"price":"0"},"56":{"price":"0"},"57":{"price":"0"},"58":{"price":"0"},"59":{"price":"0"},"60":{"price":"0"},"61":{"price":"0"},"62":{"price":"0"},"63":{"price":"0"},"64":{"price":"0"},"65":{"price":"0"},"66":{"price":"0"},"67":{"price":"0"},"68":{"price":"0"},"69":{"price":"0"},"70":{"price":"0"},"71":{"price":"0"},"72":{"price":"0"},"73":{"price":"0"},"74":{"price":"0"},"75":{"price":"0"},"76":{"price":"0"},"77":{"price":"0"},"78":{"price":"0"},"79":{"price":"0"},"80":{"price":"0"},"81":{"price":"0"},"82":{"price":"0"},"83":{"price":"0"},"84":{"price":"0"},"85":{"price":"0"},"86":{"price":"0"},"87":{"price":"0"},"88":{"price":"0"},"89":{"price":"0"},"90":{"price":"0"},"91":{"price":"0"},"92":{"price":"0"},"93":{"price":"0"},"94":{"price":"0"},"95":{"price":"0"},"96":{"price":"0"},"97":{"price":"0"},"98":{"price":"0"},"99":{"price":"0"},"100":{"price":"0"},"101":{"price":"0"},"102":{"price":"0"},"103":{"price":"0"},"104":{"price":"0"},"105":{"price":"0"},"106":{"price":"0"},"107":{"price":"0"},"108":{"price":"0"},"109":{"price":"0"},"110":{"price":"0"},"111":{"price":"0"},"112":{"price":"0"},"113":{"price":"0"},"114":{"price":"0"},"115":{"price":"0"},"116":{"price":"0"},"117":{"price":"0"},"118":{"price":"0"},"119":{"price":"0"},"120":{"price":"0"},"121":{"price":"0"},"122":{"price":"0"},"123":{"price":"0"},"124":{"price":"0"},"125":{"price":"0"},"126":{"price":"0"},"127":{"price":"0"},"128":{"price":"0"},"129":{"price":"0"},"130":{"price":"0"},"131":{"price":"0"},"132":{"price":"0"},"133":{"price":"0"},"134":{"price":"0"},"135":{"price":"0"},"136":{"price":"0"},"137":{"price":"0"},"138":{"price":"0"},"139":{"price":"0"},"140":{"price":"0"},"141":{"price":"0"},"142":{"price":"0"},"143":{"price":"0"},"144":{"price":"0"},"145":{"price":"0"},"146":{"price":"0"},"147":{"price":"0"},"148":{"price":"0"},"149":{"price":"0"},"150":{"price":"0"},"151":{"price":"0"},"152":{"price":"0"},"153":{"price":"0"},"154":{"price":"0"},"155":{"price":"0"},"156":{"price":"0"},"157":{"price":"0"},"158":{"price":"0"},"159":{"price":"0"},"160":{"price":"0"},"161":{"price":"0"},"162":{"price":"0"},"163":{"price":"0"},"164":{"price":"0"},"165":{"price":"0"},"166":{"price":"0"},"167":{"price":"0"},"168":{"price":"0"},"169":{"price":"0"},"170":{"price":"0"},"171":{"price":"0"},"172":{"price":"0"},"173":{"price":"0"},"174":{"price":"0"},"175":{"price":"0"},"176":{"price":"0"},"177":{"price":"0"},"178":{"price":"0"},"179":{"price":"0"},"180":{"price":"0"}},"ADD":{"1.00":{"price":"0"},"1.25":{"price":"0"},"1.50":{"price":"0"},"1.75":{"price":"0"},"2.00":{"price":"0"},"2.25":{"price":"0"},"2.50":{"price":"0"},"2.75":{"price":"0"},"3.00":{"price":"0"}},"PD":{"23":{"price":"0"},"24":{"price":"0"},"25":{"price":"0"},"26":{"price":"0"},"27":{"price":"0"},"28":{"price":"0"},"29":{"price":"0"},"30":{"price":"0"},"31":{"price":"0"},"32":{"price":"0"},"33":{"price":"0"},"34":{"price":"0"},"35":{"price":"0"},"36":{"price":"0"},"37":{"price":"0"},"38":{"price":"0"},"39":{"price":"0"},"40":{"price":"0"}}}}';

			$tableName =$wpdb->prefix.'epf_properties';
			$wpdb->insert($tableName, array(
				"id" => '100',
				"data" => $insert_data
			 ), array( '%d', '%s' ) );
			
	}

}
