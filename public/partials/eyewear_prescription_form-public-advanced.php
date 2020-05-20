<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.dugudlabs.com
 * @since      1.0.0
 *
 * @package    Eyewear_prescription_form
 * @subpackage Eyewear_prescription_form/public/partials
 */
global $wpdb;
$wpdb->show_errors();
$glasses = $wpdb->get_results ( "
SELECT * 
FROM  ".$wpdb->prefix."glasses where 1" );
$lenses = $wpdb->get_results ( "
SELECT * 
FROM  ".$wpdb->prefix."lens where 1" );
$coatings = $wpdb->get_results ( "
SELECT * 
FROM  ".$wpdb->prefix."coatings where 1" );
$epc_string = get_option( 'epc_string', '{"GlassType":{"distance":{"price":"0","disabled":"disabled"},"nearvision":{"price":"0","disabled":"disabled"},"bifocal":{"price":"0","disabled":"disabled"},"progressive":{"price":"0","disabled":"disabled"}},"LensType":{"BASICLENSES":{"price":"0","disabled":"disabled"},"MIDINDEX":{"price":"0","disabled":"disabled"},"HIGHINDEX":{"price":"0","disabled":"disabled"},"74_HIGHINDEX":{"price":"0","disabled":"disabled"}},"LensCoating":{"STANDARD":{"price":"0","disabled":"disabled"},"MULTICOATING":{"price":"0","disabled":"disabled"},"POLARIZED":{"price":"0","disabled":"disabled"},"PHOTOCHROMIC":{"price":"0","disabled":"disabled"},"COMPUTERLENS":{"price":"0","disabled":"disabled"},"ANTIREFLECTIVE":{"price":"0","disabled":"disabled"}}}' );
$epc_price=json_decode($epc_string,true);
$initial_propertPrice = get_option( 'epc_property_string', '{"RIGHT":{"SPH":{"-15.00":{"price":"0"},"-14.75":{"price":"0"},"-14.50":{"price":"0"},"-14.25":{"price":"0"},"-14.00":{"price":"0"},"-13.75":{"price":"0"},"-13.50":{"price":"0"},"-13.25":{"price":"0"},"-13.00":{"price":"0"},"-12.75":{"price":"0"},"-12.50":{"price":"0"},"-12.25":{"price":"0"},"-12.00":{"price":"0"},"-11.75":{"price":"0"},"-11.50":{"price":"0"},"-11.25":{"price":"0"},"-11.00":{"price":"0"},"-10.75":{"price":"0"},"-10.50":{"price":"0"},"-10.25":{"price":"0"},"-10.00":{"price":"0"},"-9.75":{"price":"0"},"-9.50":{"price":"0"},"-9.25":{"price":"0"},"-9.00":{"price":"0"},"-8.75":{"price":"0"},"-8.50":{"price":"0"},"-8.25":{"price":"0"},"-8.00":{"price":"0"},"-7.75":{"price":"0"},"-7.50":{"price":"0"},"-7.25":{"price":"0"},"-7.00":{"price":"0"},"-6.75":{"price":"0"},"-6.50":{"price":"0"},"-6.25":{"price":"0"},"-6.00":{"price":"0"},"-5.75":{"price":"0"},"-5.50":{"price":"0"},"-5.25":{"price":"0"},"-5.00":{"price":"0"},"-4.75":{"price":"0"},"-4.50":{"price":"0"},"-4.25":{"price":"0"},"-4.00":{"price":"0"},"-3.75":{"price":"0"},"-3.50":{"price":"0"},"-3.25":{"price":"0"},"-3.00":{"price":"0"},"-2.75":{"price":"0"},"-2.50":{"price":"0"},"-2.25":{"price":"0"},"-2.00":{"price":"0"},"-1.75":{"price":"0"},"-1.50":{"price":"0"},"-1.25":{"price":"0"},"-1.00":{"price":"0"},"-0.75":{"price":"0"},"-0.50":{"price":"0"},"-0.25":{"price":"0"},"+0.00":{"price":"0"},"+0.25":{"price":"0"},"+0.50":{"price":"0"},"+0.75":{"price":"0"},"+1.00":{"price":"0"},"+1.25":{"price":"0"},"+1.50":{"price":"0"},"+1.75":{"price":"0"},"+2.00":{"price":"0"},"+2.25":{"price":"0"},"+2.50":{"price":"0"},"+2.75":{"price":"0"},"+3.00":{"price":"0"},"+3.25":{"price":"0"},"+3.50":{"price":"0"},"+3.75":{"price":"0"},"+4.00":{"price":"0"},"+4.25":{"price":"0"},"+4.50":{"price":"0"},"+4.75":{"price":"0"},"+5.00":{"price":"0"},"+5.25":{"price":"0"},"+5.50":{"price":"0"},"+5.75":{"price":"0"},"+6.00":{"price":"0"},"+6.25":{"price":"0"},"+6.50":{"price":"0"},"+6.75":{"price":"0"},"+7.00":{"price":"0"},"+7.25":{"price":"0"},"+7.50":{"price":"0"},"+7.75":{"price":"0"},"+8.00":{"price":"0"},"+8.25":{"price":"0"},"+8.50":{"price":"0"},"+8.75":{"price":"0"},"+9.00":{"price":"0"},"+9.25":{"price":"0"},"+9.50":{"price":"0"},"+9.75":{"price":"0"},"+10.00":{"price":"0"}},"CYL":{"-6.00":{"price":"0"},"-5.75":{"price":"0"},"-5.50":{"price":"0"},"-5.25":{"price":"0"},"-5.00":{"price":"0"},"-4.75":{"price":"0"},"-4.50":{"price":"0"},"-4.25":{"price":"0"},"-4.00":{"price":"0"},"-3.75":{"price":"0"},"-3.50":{"price":"0"},"-3.25":{"price":"0"},"-3.00":{"price":"0"},"-2.75":{"price":"0"},"-2.50":{"price":"0"},"-2.25":{"price":"0"},"-2.00":{"price":"0"},"-1.75":{"price":"0"},"-1.50":{"price":"0"},"-1.25":{"price":"0"},"-1.00":{"price":"0"},"-0.75":{"price":"0"},"-0.50":{"price":"0"},"-0.25":{"price":"0"},"+0.00":{"price":"0"},"+0.25":{"price":"0"},"+0.50":{"price":"0"},"+0.75":{"price":"0"},"+1.00":{"price":"0"},"+1.25":{"price":"0"},"+1.50":{"price":"0"},"+1.75":{"price":"0"},"+2.00":{"price":"0"},"+2.25":{"price":"0"},"+2.50":{"price":"0"},"+2.75":{"price":"0"},"+3.00":{"price":"0"},"+3.25":{"price":"0"},"+3.50":{"price":"0"},"+3.75":{"price":"0"},"+4.00":{"price":"0"},"+4.25":{"price":"0"},"+4.50":{"price":"0"},"+4.75":{"price":"0"},"+5.00":{"price":"0"},"+5.25":{"price":"0"},"+5.50":{"price":"0"},"+5.75":{"price":"0"},"+6.00":{"price":"0"}},"AXIS":{"0":{"price":"0"},"1":{"price":"0"},"2":{"price":"0"},"3":{"price":"0"},"4":{"price":"0"},"5":{"price":"0"},"6":{"price":"0"},"7":{"price":"0"},"8":{"price":"0"},"9":{"price":"0"},"10":{"price":"0"},"11":{"price":"0"},"12":{"price":"0"},"13":{"price":"0"},"14":{"price":"0"},"15":{"price":"0"},"16":{"price":"0"},"17":{"price":"0"},"18":{"price":"0"},"19":{"price":"0"},"20":{"price":"0"},"21":{"price":"0"},"22":{"price":"0"},"23":{"price":"0"},"24":{"price":"0"},"25":{"price":"0"},"26":{"price":"0"},"27":{"price":"0"},"28":{"price":"0"},"29":{"price":"0"},"30":{"price":"0"},"31":{"price":"0"},"32":{"price":"0"},"33":{"price":"0"},"34":{"price":"0"},"35":{"price":"0"},"36":{"price":"0"},"37":{"price":"0"},"38":{"price":"0"},"39":{"price":"0"},"40":{"price":"0"},"41":{"price":"0"},"42":{"price":"0"},"43":{"price":"0"},"44":{"price":"0"},"45":{"price":"0"},"46":{"price":"0"},"47":{"price":"0"},"48":{"price":"0"},"49":{"price":"0"},"50":{"price":"0"},"51":{"price":"0"},"52":{"price":"0"},"53":{"price":"0"},"54":{"price":"0"},"55":{"price":"0"},"56":{"price":"0"},"57":{"price":"0"},"58":{"price":"0"},"59":{"price":"0"},"60":{"price":"0"},"61":{"price":"0"},"62":{"price":"0"},"63":{"price":"0"},"64":{"price":"0"},"65":{"price":"0"},"66":{"price":"0"},"67":{"price":"0"},"68":{"price":"0"},"69":{"price":"0"},"70":{"price":"0"},"71":{"price":"0"},"72":{"price":"0"},"73":{"price":"0"},"74":{"price":"0"},"75":{"price":"0"},"76":{"price":"0"},"77":{"price":"0"},"78":{"price":"0"},"79":{"price":"0"},"80":{"price":"0"},"81":{"price":"0"},"82":{"price":"0"},"83":{"price":"0"},"84":{"price":"0"},"85":{"price":"0"},"86":{"price":"0"},"87":{"price":"0"},"88":{"price":"0"},"89":{"price":"0"},"90":{"price":"0"},"91":{"price":"0"},"92":{"price":"0"},"93":{"price":"0"},"94":{"price":"0"},"95":{"price":"0"},"96":{"price":"0"},"97":{"price":"0"},"98":{"price":"0"},"99":{"price":"0"},"100":{"price":"0"},"101":{"price":"0"},"102":{"price":"0"},"103":{"price":"0"},"104":{"price":"0"},"105":{"price":"0"},"106":{"price":"0"},"107":{"price":"0"},"108":{"price":"0"},"109":{"price":"0"},"110":{"price":"0"},"111":{"price":"0"},"112":{"price":"0"},"113":{"price":"0"},"114":{"price":"0"},"115":{"price":"0"},"116":{"price":"0"},"117":{"price":"0"},"118":{"price":"0"},"119":{"price":"0"},"120":{"price":"0"},"121":{"price":"0"},"122":{"price":"0"},"123":{"price":"0"},"124":{"price":"0"},"125":{"price":"0"},"126":{"price":"0"},"127":{"price":"0"},"128":{"price":"0"},"129":{"price":"0"},"130":{"price":"0"},"131":{"price":"0"},"132":{"price":"0"},"133":{"price":"0"},"134":{"price":"0"},"135":{"price":"0"},"136":{"price":"0"},"137":{"price":"0"},"138":{"price":"0"},"139":{"price":"0"},"140":{"price":"0"},"141":{"price":"0"},"142":{"price":"0"},"143":{"price":"0"},"144":{"price":"0"},"145":{"price":"0"},"146":{"price":"0"},"147":{"price":"0"},"148":{"price":"0"},"149":{"price":"0"},"150":{"price":"0"},"151":{"price":"0"},"152":{"price":"0"},"153":{"price":"0"},"154":{"price":"0"},"155":{"price":"0"},"156":{"price":"0"},"157":{"price":"0"},"158":{"price":"0"},"159":{"price":"0"},"160":{"price":"0"},"161":{"price":"0"},"162":{"price":"0"},"163":{"price":"0"},"164":{"price":"0"},"165":{"price":"0"},"166":{"price":"0"},"167":{"price":"0"},"168":{"price":"0"},"169":{"price":"0"},"170":{"price":"0"},"171":{"price":"0"},"172":{"price":"0"},"173":{"price":"0"},"174":{"price":"0"},"175":{"price":"0"},"176":{"price":"0"},"177":{"price":"0"},"178":{"price":"0"},"179":{"price":"0"},"180":{"price":"0"}},"ADD":{"1.00":{"price":"0"},"1.25":{"price":"0"},"1.50":{"price":"0"},"1.75":{"price":"0"},"2.00":{"price":"0"},"2.25":{"price":"0"},"2.50":{"price":"0"},"2.75":{"price":"0"},"3.00":{"price":"0"}},"PD":{"23":{"price":"0"},"24":{"price":"0"},"25":{"price":"0"},"26":{"price":"0"},"27":{"price":"0"},"28":{"price":"0"},"29":{"price":"0"},"30":{"price":"0"},"31":{"price":"0"},"32":{"price":"0"},"33":{"price":"0"},"34":{"price":"0"},"35":{"price":"0"},"36":{"price":"0"},"37":{"price":"0"},"38":{"price":"0"},"39":{"price":"0"},"40":{"price":"0"}}},"LEFT":{"SPH":{"-15.00":{"price":"0"},"-14.75":{"price":"0"},"-14.50":{"price":"0"},"-14.25":{"price":"0"},"-14.00":{"price":"0"},"-13.75":{"price":"0"},"-13.50":{"price":"0"},"-13.25":{"price":"0"},"-13.00":{"price":"0"},"-12.75":{"price":"0"},"-12.50":{"price":"0"},"-12.25":{"price":"0"},"-12.00":{"price":"0"},"-11.75":{"price":"0"},"-11.50":{"price":"0"},"-11.25":{"price":"0"},"-11.00":{"price":"0"},"-10.75":{"price":"0"},"-10.50":{"price":"0"},"-10.25":{"price":"0"},"-10.00":{"price":"0"},"-9.75":{"price":"0"},"-9.50":{"price":"0"},"-9.25":{"price":"0"},"-9.00":{"price":"0"},"-8.75":{"price":"0"},"-8.50":{"price":"0"},"-8.25":{"price":"0"},"-8.00":{"price":"0"},"-7.75":{"price":"0"},"-7.50":{"price":"0"},"-7.25":{"price":"0"},"-7.00":{"price":"0"},"-6.75":{"price":"0"},"-6.50":{"price":"0"},"-6.25":{"price":"0"},"-6.00":{"price":"0"},"-5.75":{"price":"0"},"-5.50":{"price":"0"},"-5.25":{"price":"0"},"-5.00":{"price":"0"},"-4.75":{"price":"0"},"-4.50":{"price":"0"},"-4.25":{"price":"0"},"-4.00":{"price":"0"},"-3.75":{"price":"0"},"-3.50":{"price":"0"},"-3.25":{"price":"0"},"-3.00":{"price":"0"},"-2.75":{"price":"0"},"-2.50":{"price":"0"},"-2.25":{"price":"0"},"-2.00":{"price":"0"},"-1.75":{"price":"0"},"-1.50":{"price":"0"},"-1.25":{"price":"0"},"-1.00":{"price":"0"},"-0.75":{"price":"0"},"-0.50":{"price":"0"},"-0.25":{"price":"0"},"+0.00":{"price":"0"},"+0.25":{"price":"0"},"+0.50":{"price":"0"},"+0.75":{"price":"0"},"+1.00":{"price":"0"},"+1.25":{"price":"0"},"+1.50":{"price":"0"},"+1.75":{"price":"0"},"+2.00":{"price":"0"},"+2.25":{"price":"0"},"+2.50":{"price":"0"},"+2.75":{"price":"0"},"+3.00":{"price":"0"},"+3.25":{"price":"0"},"+3.50":{"price":"0"},"+3.75":{"price":"0"},"+4.00":{"price":"0"},"+4.25":{"price":"0"},"+4.50":{"price":"0"},"+4.75":{"price":"0"},"+5.00":{"price":"0"},"+5.25":{"price":"0"},"+5.50":{"price":"0"},"+5.75":{"price":"0"},"+6.00":{"price":"0"},"+6.25":{"price":"0"},"+6.50":{"price":"0"},"+6.75":{"price":"0"},"+7.00":{"price":"0"},"+7.25":{"price":"0"},"+7.50":{"price":"0"},"+7.75":{"price":"0"},"+8.00":{"price":"0"},"+8.25":{"price":"0"},"+8.50":{"price":"0"},"+8.75":{"price":"0"},"+9.00":{"price":"0"},"+9.25":{"price":"0"},"+9.50":{"price":"0"},"+9.75":{"price":"0"},"+10.00":{"price":"0"}},"CYL":{"-6.00":{"price":"0"},"-5.75":{"price":"0"},"-5.50":{"price":"0"},"-5.25":{"price":"0"},"-5.00":{"price":"0"},"-4.75":{"price":"0"},"-4.50":{"price":"0"},"-4.25":{"price":"0"},"-4.00":{"price":"0"},"-3.75":{"price":"0"},"-3.50":{"price":"0"},"-3.25":{"price":"0"},"-3.00":{"price":"0"},"-2.75":{"price":"0"},"-2.50":{"price":"0"},"-2.25":{"price":"0"},"-2.00":{"price":"0"},"-1.75":{"price":"0"},"-1.50":{"price":"0"},"-1.25":{"price":"0"},"-1.00":{"price":"0"},"-0.75":{"price":"0"},"-0.50":{"price":"0"},"-0.25":{"price":"0"},"+0.00":{"price":"0"},"+0.25":{"price":"0"},"+0.50":{"price":"0"},"+0.75":{"price":"0"},"+1.00":{"price":"0"},"+1.25":{"price":"0"},"+1.50":{"price":"0"},"+1.75":{"price":"0"},"+2.00":{"price":"0"},"+2.25":{"price":"0"},"+2.50":{"price":"0"},"+2.75":{"price":"0"},"+3.00":{"price":"0"},"+3.25":{"price":"0"},"+3.50":{"price":"0"},"+3.75":{"price":"0"},"+4.00":{"price":"0"},"+4.25":{"price":"0"},"+4.50":{"price":"0"},"+4.75":{"price":"0"},"+5.00":{"price":"0"},"+5.25":{"price":"0"},"+5.50":{"price":"0"},"+5.75":{"price":"0"},"+6.00":{"price":"0"}},"AXIS":{"0":{"price":"0"},"1":{"price":"0"},"2":{"price":"0"},"3":{"price":"0"},"4":{"price":"0"},"5":{"price":"0"},"6":{"price":"0"},"7":{"price":"0"},"8":{"price":"0"},"9":{"price":"0"},"10":{"price":"0"},"11":{"price":"0"},"12":{"price":"0"},"13":{"price":"0"},"14":{"price":"0"},"15":{"price":"0"},"16":{"price":"0"},"17":{"price":"0"},"18":{"price":"0"},"19":{"price":"0"},"20":{"price":"0"},"21":{"price":"0"},"22":{"price":"0"},"23":{"price":"0"},"24":{"price":"0"},"25":{"price":"0"},"26":{"price":"0"},"27":{"price":"0"},"28":{"price":"0"},"29":{"price":"0"},"30":{"price":"0"},"31":{"price":"0"},"32":{"price":"0"},"33":{"price":"0"},"34":{"price":"0"},"35":{"price":"0"},"36":{"price":"0"},"37":{"price":"0"},"38":{"price":"0"},"39":{"price":"0"},"40":{"price":"0"},"41":{"price":"0"},"42":{"price":"0"},"43":{"price":"0"},"44":{"price":"0"},"45":{"price":"0"},"46":{"price":"0"},"47":{"price":"0"},"48":{"price":"0"},"49":{"price":"0"},"50":{"price":"0"},"51":{"price":"0"},"52":{"price":"0"},"53":{"price":"0"},"54":{"price":"0"},"55":{"price":"0"},"56":{"price":"0"},"57":{"price":"0"},"58":{"price":"0"},"59":{"price":"0"},"60":{"price":"0"},"61":{"price":"0"},"62":{"price":"0"},"63":{"price":"0"},"64":{"price":"0"},"65":{"price":"0"},"66":{"price":"0"},"67":{"price":"0"},"68":{"price":"0"},"69":{"price":"0"},"70":{"price":"0"},"71":{"price":"0"},"72":{"price":"0"},"73":{"price":"0"},"74":{"price":"0"},"75":{"price":"0"},"76":{"price":"0"},"77":{"price":"0"},"78":{"price":"0"},"79":{"price":"0"},"80":{"price":"0"},"81":{"price":"0"},"82":{"price":"0"},"83":{"price":"0"},"84":{"price":"0"},"85":{"price":"0"},"86":{"price":"0"},"87":{"price":"0"},"88":{"price":"0"},"89":{"price":"0"},"90":{"price":"0"},"91":{"price":"0"},"92":{"price":"0"},"93":{"price":"0"},"94":{"price":"0"},"95":{"price":"0"},"96":{"price":"0"},"97":{"price":"0"},"98":{"price":"0"},"99":{"price":"0"},"100":{"price":"0"},"101":{"price":"0"},"102":{"price":"0"},"103":{"price":"0"},"104":{"price":"0"},"105":{"price":"0"},"106":{"price":"0"},"107":{"price":"0"},"108":{"price":"0"},"109":{"price":"0"},"110":{"price":"0"},"111":{"price":"0"},"112":{"price":"0"},"113":{"price":"0"},"114":{"price":"0"},"115":{"price":"0"},"116":{"price":"0"},"117":{"price":"0"},"118":{"price":"0"},"119":{"price":"0"},"120":{"price":"0"},"121":{"price":"0"},"122":{"price":"0"},"123":{"price":"0"},"124":{"price":"0"},"125":{"price":"0"},"126":{"price":"0"},"127":{"price":"0"},"128":{"price":"0"},"129":{"price":"0"},"130":{"price":"0"},"131":{"price":"0"},"132":{"price":"0"},"133":{"price":"0"},"134":{"price":"0"},"135":{"price":"0"},"136":{"price":"0"},"137":{"price":"0"},"138":{"price":"0"},"139":{"price":"0"},"140":{"price":"0"},"141":{"price":"0"},"142":{"price":"0"},"143":{"price":"0"},"144":{"price":"0"},"145":{"price":"0"},"146":{"price":"0"},"147":{"price":"0"},"148":{"price":"0"},"149":{"price":"0"},"150":{"price":"0"},"151":{"price":"0"},"152":{"price":"0"},"153":{"price":"0"},"154":{"price":"0"},"155":{"price":"0"},"156":{"price":"0"},"157":{"price":"0"},"158":{"price":"0"},"159":{"price":"0"},"160":{"price":"0"},"161":{"price":"0"},"162":{"price":"0"},"163":{"price":"0"},"164":{"price":"0"},"165":{"price":"0"},"166":{"price":"0"},"167":{"price":"0"},"168":{"price":"0"},"169":{"price":"0"},"170":{"price":"0"},"171":{"price":"0"},"172":{"price":"0"},"173":{"price":"0"},"174":{"price":"0"},"175":{"price":"0"},"176":{"price":"0"},"177":{"price":"0"},"178":{"price":"0"},"179":{"price":"0"},"180":{"price":"0"}},"ADD":{"1.00":{"price":"0"},"1.25":{"price":"0"},"1.50":{"price":"0"},"1.75":{"price":"0"},"2.00":{"price":"0"},"2.25":{"price":"0"},"2.50":{"price":"0"},"2.75":{"price":"0"},"3.00":{"price":"0"}},"PD":{"23":{"price":"0"},"24":{"price":"0"},"25":{"price":"0"},"26":{"price":"0"},"27":{"price":"0"},"28":{"price":"0"},"29":{"price":"0"},"30":{"price":"0"},"31":{"price":"0"},"32":{"price":"0"},"33":{"price":"0"},"34":{"price":"0"},"35":{"price":"0"},"36":{"price":"0"},"37":{"price":"0"},"38":{"price":"0"},"39":{"price":"0"},"40":{"price":"0"}}}}');
$words_epf_dugudlabs_lng = $words_epf_dugudlabs[get_locale()];
if($words_epf_dugudlabs_lng == null){
    $words_epf_dugudlabs_lng = $words_epf_dugudlabs["en_US"];
}
?>
<script>
var initial_propertPrice_json = '<?php echo $initial_propertPrice;?>';
var initial_propertPrice_obj = JSON.parse(initial_propertPrice_json);
function show_price_span(side,property){
    let prop_value = jQuery('#' + side + '-' + property + '-SELECT' + ' option:selected').text();
    jE('#'+side+'-'+property+'-'+'SPAN').html('Price: '+initial_propertPrice_obj[side][property][prop_value]['price']+'<?php echo get_woocommerce_currency_symbol();?>');
}
</script>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#recipemodal">
<?php echo $words_epf_dugudlabs_lng["Add Recipe"];?>
</button>
<!-- Modal -->
<div data-backdrop="false" id="recipemodal" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle"><?php echo $words_epf_dugudlabs_lng["EYEWEAR RECIPE DETAILS"];?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <?php echo $words_epf_dugudlabs_lng["Step-1: Add your prescription"];?>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <b><?php echo $words_epf_dugudlabs_lng["Disclaimer"];?>:</b>
                                <br><?php echo $words_epf_dugudlabs_lng["Enter the details below as they appear on your prescription from your doctor"];?>
                                <br><?php echo $words_epf_dugudlabs_lng["Leave 0.00 or None If the prescription is empty"];?>
                                <br><?php echo $words_epf_dugudlabs_lng["Glasses prescription are different from contact lens prescription"];?>
                                <div class="row" style="margin-bottom: 5%;">
                                    <div class="col-sm-1">
                                        <input type="text" name="epc_property_string" style="display: none;" id="epc_property_string" />
                                    </div>
                                    <?php
                                    $counter=0;
                                    $megaCounter=0;
                                    $size= sizeof($glasses);
                                    foreach($glasses as $glass){
                                        $counter+=1;
                                        $megaCounter+=1;
                                            ?>
                                                <div class="col-sm-2">
                                                    <div id="<?php echo  'glass_'.$glass->id;?>" onclick="select_glass_type(this,'<?php echo  $glass->id;?>','<?php echo  $glass->price.get_woocommerce_currency_symbol();?>')" class="card lens-type" >
                                                        <div class="card-body">
                                                            <h6 class="card-title"><?php echo $glass->name;?></h6>
                                                        </div>
                                                        <img src="<?php echo  $glass->image;?>" class="card-img-top" alt="...">
                                                        <div class="price_box"><?php echo $words_epf_dugudlabs_lng["Price"];?>: <?php echo $glass->price.get_woocommerce_currency_symbol(); ?></div>    
                                                    </div>
                                                </div>
                                            <?php 
                                        if($counter!=5){
                                        }
                                        else{
                                            $counter=0;
                                            ?>
                                            <div class="col-sm-1">
                                                </div>
                                                
                                            </div>
                                            <div class="row" style="margin-bottom: 5%;">
                                                <div class="col-sm-1">
                                                </div>
                                            <?php
                                        }

                                    }
                                    ?>
                                    <div class="col-sm-1">
                                    </div>
                                </div>
                                <div id="priscription_box">
                                    <div class="radio">
                                        <input class="full-width-input" onclick="show_priscription(this,'manual');" type="radio" name="prescription_type" checked value="manual"><span class="radio_span"><?php echo $words_epf_dugudlabs_lng["Enter prescription"];?></span>
                                    </div>
                                    <table id="prescription_table" class="table-responsive-sm table-borderless" style="margin: 10 10 10 10">
                                        <thead>
                                            <tr>
                                                <th>Rx</th>
                                                <th><?php echo $words_epf_dugudlabs_lng["Sphere"];?> (SPH)</th>
                                                <th><?php echo $words_epf_dugudlabs_lng["Cylinder"];?>(CYL)</th>
                                                <th><?php echo $words_epf_dugudlabs_lng["AXIS"];?></th>
                                                <th>Addition (near) ADD</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $words_epf_dugudlabs_lng["RIGHT"];?>(OD)</td>
                                                <td>
                                                    <div class="form-group">
                                                        <?php 
                                                        $sphereRange = range(-15.0,10.0,0.25);
                                                        $obj = new stdClass();
                                                        $obj->select= $words_epf_dugudlabs_lng["select"];
                                                        foreach ($sphereRange as $cm) {
                                                            $val = sprintf("%+.2f",$cm);
                                                            $obj->$val = $val;
                                                        }
                                                        $selectText =  '<select onchange="show_price_span(\'RIGHT\',\'SPH\');" name="RIGHT-SPH" class="form-control" id="RIGHT-SPH-SELECT">';
                                                        foreach ( $obj as $key => $value )
                                                        {
                                                            if($key!='')
                                                                $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                                        }
                                                        $selectText=$selectText.'</select>';
                                                        echo $selectText;
                                                        ?>
                                                        <span id="RIGHT-SPH-SPAN"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <?php 
                                                        $sphereRange = range(-6.0,6.0,0.25);
                                                        $obj = new stdClass();
                                                        $obj->select= $words_epf_dugudlabs_lng["select"];
                                                        foreach ($sphereRange as $cm) {
                                                            $val = sprintf("%+.2f",$cm);
                                                            $obj->$val = $val;
                                                        }
                                                        $selectText =  '<select onchange="show_price_span(\'RIGHT\',\'CYL\');" name="RIGHT-CYL" class="form-control" id="RIGHT-CYL-SELECT">';
                                                        foreach ( $obj as $key => $value )
                                                        {
                                                            if($key!='')
                                                                $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                                        }
                                                        $selectText=$selectText.'</select>';
                                                        echo $selectText;
                                                        ?>
                                                        <span id="RIGHT-CYL-SPAN"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                <div class="form-group">
                                                <?php 
                                                        $sphereRange = range(0,180,1);
                                                        $obj = new stdClass();
                                                        $obj->select= $words_epf_dugudlabs_lng["select"];
                                                        $obj->select= $words_epf_dugudlabs_lng["select"];
                                                        foreach ($sphereRange as $cm) {
                                                            $val = $cm;
                                                            $obj->$val = $val;
                                                        }
                                                        $selectText =  '<select onchange="show_price_span(\'RIGHT\',\'AXIS\');" name="RIGHT-AXIS" class="form-control" id="RIGHT-AXIS-SELECT">';
                                                        foreach ( $obj as $key => $value )
                                                        {
                                                            if($key!='')
                                                                $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                                        }
                                                        $selectText=$selectText.'</select>';
                                                        echo $selectText;
                                                        ?>
                                                        <span id="RIGHT-AXIS-SPAN"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                <div class="form-group">
                                                <?php 
                                                        $sphereRange = range(1,3,0.25);
                                                        $obj = new stdClass();
                                                        $obj->select= $words_epf_dugudlabs_lng["select"];

                                                        foreach ($sphereRange as $cm) {
                                                            $val = sprintf("%.2f",$cm);
                                                            $obj->$val = $val;
                                                        }
                                                        $selectText =  '<select onchange="show_price_span(\'RIGHT\',\'ADD\');" name="RIGHT-ADD" class="form-control" id="RIGHT-ADD-SELECT">';
                                                        foreach ( $obj as $key => $value )
                                                        {
                                                            if($key!='')
                                                                $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                                        }
                                                        $selectText=$selectText.'</select>';
                                                        echo $selectText;
                                                        ?>
                                                        <span id="RIGHT-ADD-SPAN"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?php echo $words_epf_dugudlabs_lng["Left"];?>(OS)</td>
                                                <td>
                                                <div class="form-group">
                                                <?php 
                                                        $sphereRange = range(-15.0,10.0,0.25);
                                                        $obj = new stdClass();
                                                        $obj->select= $words_epf_dugudlabs_lng["select"];
                                                        foreach ($sphereRange as $cm) {
                                                            $val = sprintf("%+.2f",$cm);
                                                            $obj->$val = $val;
                                                        }
                                                        $selectText =  '<select onchange="show_price_span(\'LEFT\',\'SPH\');" name="LEFT-SPH" class="form-control" id="LEFT-SPH-SELECT">';
                                                        foreach ( $obj as $key => $value )
                                                        {
                                                            if($key!='')
                                                                $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                                        }
                                                        $selectText=$selectText.'</select>';
                                                        echo $selectText;
                                                        ?>
                                                        <span id="LEFT-SPH-SPAN"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                <div class="form-group">
                                                <?php 
                                                        $sphereRange = range(-6.0,6.0,0.25);
                                                        $obj = new stdClass();
                                                        $obj->select= $words_epf_dugudlabs_lng["select"];
                                                        foreach ($sphereRange as $cm) {
                                                            $val = sprintf("%+.2f",$cm);
                                                            $obj->$val = $val;
                                                        }
                                                        $selectText =  '<select onchange="show_price_span(\'LEFT\',\'CYL\');" name="LEFT-CYL" class="form-control" id="LEFT-CYL-SELECT">';
                                                        foreach ( $obj as $key => $value )
                                                        {
                                                            if($key!='')
                                                                $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                                        }
                                                        $selectText=$selectText.'</select>';
                                                        echo $selectText;
                                                        ?>
                                                        <span id="LEFT-CYL-SPAN"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <?php 
                                                        $sphereRange = range(1,180.0,1);
                                                        $obj = new stdClass();
                                                        $obj->select= $words_epf_dugudlabs_lng["select"];
                                                        foreach ($sphereRange as $cm) {
                                                            $val = $cm;
                                                            $obj->$val = $val;
                                                        }
                                                        $selectText =  '<select onchange="show_price_span(\'LEFT\',\'AXIS\');" name="LEFT-AXIS" class="form-control" id="LEFT-AXIS-SELECT">';
                                                        foreach ( $obj as $key => $value )
                                                        {
                                                            if($key!='')
                                                                $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                                        }
                                                        $selectText=$selectText.'</select>';
                                                        echo $selectText;
                                                        ?>
                                                        <span id="LEFT-AXIS-SPAN"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                <div class="form-group">
                                                <?php 
                                                        $sphereRange = range(1,3,0.25);
                                                        $obj = new stdClass();
                                                        $obj->select= $words_epf_dugudlabs_lng["select"];
                                                        foreach ($sphereRange as $cm) {
                                                            $val = sprintf("%.2f",$cm);
                                                            $obj->$val = $val;
                                                        }
                                                        $selectText =  '<select onchange="show_price_span(\'LEFT\',\'ADD\');" name="LEFT-ADD" class="form-control" id="LEFT-ADD-SELECT">';
                                                        foreach ( $obj as $key => $value )
                                                        {
                                                            if($key!='')
                                                                $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                                        }
                                                        $selectText=$selectText.'</select>';
                                                        echo $selectText;
                                                        ?>
                                                        <span id="LEFT-ADD-SPAN"></span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table> 
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <?php echo $words_epf_dugudlabs_lng["Enter PD"];?>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="radio pd-radio">
                                            <input class="full-width-input" onclick="show_pd_box('dual-pd-box');" type="radio" name="pd_type"  value="double"><span class="radio_span"><?php echo $words_epf_dugudlabs_lng["Dual PD"];?></span>
                                    </div>
                                    <div class="radio pd-radio">
                                            <input class="full-width-input" onclick="show_pd_box('single-pd-box');" type="radio" name="pd_type"  value="single"><span class="radio_span"><?php echo $words_epf_dugudlabs_lng["Single PD"];?></span>
                                    </div>
                                </div>
                                <div id="dual-pd-box" style="display:none;">
                                                 <div class="form-group">
                                                     Right Eye PD:
                                                    <?php 
                                                        $sphereRange = range(23,40,1);
                                                        $obj = new stdClass();
                                                        $obj->select= $words_epf_dugudlabs_lng["select"];
                                                        foreach ($sphereRange as $cm) {
                                                            $val = $cm;
                                                            $obj->$val = $val;
                                                        }
                                                        $selectText =  '<select name="RIGHT-PD" class="form-control" id="RIGHT-PD-SELECT">';
                                                        foreach ( $obj as $key => $value )
                                                        {
                                                            if($key!='')
                                                                $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                                        }
                                                        $selectText=$selectText.'</select>';
                                                        echo $selectText;
                                                        ?>
                                                    </div>
                                                <div class="form-group">
                                                    Left Eye PD:
                                                    <?php 
                                                        $sphereRange = range(23,40,1);
                                                        $obj = new stdClass();
                                                        $obj->select= $words_epf_dugudlabs_lng["select"];
                                                        foreach ($sphereRange as $cm) {
                                                            $val = $cm;
                                                            $obj->$val = $val;
                                                        }
                                                        $selectText =  '<select name="LEFT-PD" class="form-control" id="LEFT-PD-SELECT">';
                                                        foreach ( $obj as $key => $value )
                                                        {
                                                            if($key!='')
                                                                $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                                        }
                                                        $selectText=$selectText.'</select>';
                                                        echo $selectText;
                                                        ?>
                                                </div>
                                </div>
                                <div id="single-pd-box" style="display:none;">
                                    <div class="form-group">
                                        Single PD:
                                        <?php 
                                            $sphereRange = range(35,65,1);
                                            $obj = new stdClass();
                                            $obj->select= $words_epf_dugudlabs_lng["select"];
                                            foreach ($sphereRange as $cm) {
                                                $val = $cm;
                                                $obj->$val = $val;
                                            }
                                            $selectText =  '<select name="SINGLE-PD" class="form-control" id="RIGHT-PD-SELECT">';
                                            foreach ( $obj as $key => $value )
                                            {
                                                if($key!='')
                                                    $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                            }
                                            $selectText=$selectText.'</select>';
                                            echo $selectText;
                                            ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <?php echo $words_epf_dugudlabs_lng["Step-2: Select lens type"];?>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <br><?php echo $words_epf_dugudlabs_lng["Disclaimer"];?>
                            <br><?php echo $words_epf_dugudlabs_lng["Based on the values in your prescription, we try to recommend the lens that will give you the optimum vision correction and thinness of lens"];?>
                            <br><?php echo $words_epf_dugudlabs_lng["We do not recommend more expensive high index lenses if we do not think it will result in a noticeably thinner lens, though you are free to choose any lens available"];?>
                            <br><?php echo $words_epf_dugudlabs_lng["The recommended lens will always be clear"];?>
                            <div class="row" style="margin-bottom: 5%;">
                                <div class="col-sm-1">
                                    <input type="text" name="epc_property_string" style="display: none;" id="epc_property_string" />
                                </div>
                                <?php
                                $counter=0;
                                $megaCounter=0;
                                $size= sizeof($lenses);
                                foreach($lenses as $lens){
                                    $counter+=1;
                                    $megaCounter+=1;
                                        ?>
                                            <div class="col-sm-2">
                                                <div id="<?php echo  'lens_'.$lens->id;?>" onclick="select_lens_type(this,'<?php echo  $lens->id;?>','<?php echo  $lens->price.get_woocommerce_currency_symbol();?>')" class="card lens-type" >
                                                    <div class="card-body">
                                                        <h6 class="card-title"><?php echo $lens->name;?></h6>
                                                    </div>
                                                    <img src="<?php echo  $lens->image;?>" class="card-img-top" alt="...">
                                                    <div class="price_box"><?php echo $words_epf_dugudlabs_lng["Price"];?>: <?php echo $lens->price.get_woocommerce_currency_symbol(); ?></div>    
                                                </div>
                                            </div>
                                        <?php 
                                    if($counter!=5){
                                    }
                                    else{
                                        $counter=0;
                                        ?>
                                            <div class="col-sm-1">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 5%;">
                                            <div class="col-sm-1">
                                            </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="col-sm-1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <?php echo $words_epf_dugudlabs_lng["Step-3: Select lens coating"];?>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <b><?php echo $words_epf_dugudlabs_lng["Please pick your add on"];?></b>
                                <div class="row" style="margin-bottom: 5%;">
                                    <div class="col-sm-1">
                                        <input type="text" name="epc_property_string" style="display: none;" id="epc_property_string" />
                                    </div>
                                    <?php
                                    $counter=0;
                                    $megaCounter=0;
                                    $size= sizeof($coatings);
                                    foreach($coatings as $coating){
                                        $counter+=1;
                                        $megaCounter+=1;
                                            ?>
                                                <div class="col-sm-2">
                                                    <div id="<?php echo  'coating_'.$coating->id;?>" onclick="select_coating_type(this,'<?php echo  $coating->id;?>','<?php echo  $coating->price.get_woocommerce_currency_symbol();?>')" class="card lens-type" >
                                                        <div class="card-body">
                                                            <h6 class="card-title"><?php echo $coating->name;?></h6>
                                                        </div>
                                                        <img src="<?php echo  $coating->image;?>" class="card-img-top" alt="...">
                                                        <div class="price_box"><?php echo $words_epf_dugudlabs_lng["Price"];?>: <?php echo $coating->price.get_woocommerce_currency_symbol(); ?></div>    
                                                    </div>
                                                </div>
                                            <?php 
                                        if($counter!=5){
                                        }
                                        else{
                                            $counter=0;
                                            ?>
                                            <div class="col-sm-1">
                                                </div>
                                                
                                            </div>
                                            <div class="row" style="margin-bottom: 5%;">
                                                <div class="col-sm-1">
                                                </div>
                                            <?php
                                        }

                                    }
                                    ?>
                                    <div class="col-sm-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $words_epf_dugudlabs_lng["Save"];?></button>
            </div>
        </div>
    </div>
</div>
                            

