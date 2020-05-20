<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @package    Eyewear_prescription_form
 * @subpackage Eyewear_prescription_form/admin/partials
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

$initial_propertPrice_json = $wpdb->get_results ( "
SELECT * 
FROM  ".$wpdb->prefix."epf_properties where 1" );
$initial_propertPrice_json = $initial_propertPrice_json[0]->data;

$words_epf_dugudlabs_lng = $words_epf_dugudlabs[get_locale()];
if($words_epf_dugudlabs_lng == null){
    $words_epf_dugudlabs_lng = $words_epf_dugudlabs["en_US"];
}
//var_dump($epc_price);
?>
<style>
    .card{
        max-width: none !important;
        margin-top: 0px !important;
        padding: 0px 0px 0px !important;
    }
    .epf-price-box{
        float: left;
        width: 60% !important;
        margin-left: 5%;
    }

    .epf-price-box-table disableInput{
        float: left;
        width: 25% !important;
        margin-left: 5%;
    }
    .epf-price-label{
        float: left;
    }
    .save-price-button{
        width: 29% !important;
        padding: 0px !important;
    }
    .save-btn-show{
        display: block !important;
    }
    .save-btn-hide{
        display: none !important;
        transition: opacity 1s ease-out !important;
        opacity: 0;
    }
    </style>
    <script>

    var initial_propertPrice_json = '<?php echo $initial_propertPrice_json;?>';
    var initial_propertPrice_obj = JSON.parse(initial_propertPrice_json);
     </script>
<form class="form-inline" action="" method="post">
    <div class="container">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo $words_epf_dugudlabs_lng["Step-1: Add your prescription"];?>                </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row" style="margin-bottom: 5%;">
                            <div class="col-sm-1">
                                <input disabled type="text" name="epc_property_string" style="display: none;" id="epc_property_string" />
                            </div>
                            <?php
                            $counter=0;
                            $megaCounter=0;
                            $size= sizeof($glasses);
                            foreach($glasses as $glass){
                                $counter+=1;
                                $megaCounter+=1;
                                if($counter==5){
                                    $counter=0;
                                    ?>
                                        <div class="col-sm-2">
                                            <div id="<?php echo $glass->id; ?>" class="card lens-type">
                                                <div class="image_change disableInput" id="GlassType_<?php echo $glass->id; ?>_image_change disableInput"  style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Change Image"];?>
                                                <input disabled value="<?php echo $glass->image;?>" style="display: none;" type=text id="GlassType_<?php echo $glass->id; ?>_image_img" name="GlassType_<?php echo $glass->id; ?>_image"></div>
                                                <div class="card-body">
                                                <h6 class="card-title"><input disabled value="<?php echo $glass->name; ?>" style="width: 100% !important;" id="GlassType_<?php echo $glass->id; ?>_name" type="text" class="form-control disableInput epf-price-box disableInput" placeholder="Glass Name"/></h6>
                                                </div>
                                                <img id="GlassType_<?php echo $glass->id; ?>_image" src="<?php echo $glass->image;?>" class="card-img-top" alt="...">
                                                <textarea disabled class="form-control disableInput hidden disableInput" rows="3" id="GlassType_<?php echo $glass->id; ?>_description" id="GlassType_<?php echo $glass->id; ?>_description"><?php echo $glass->description;?></textarea>
                                                <div class="price_box">
                                                    <label class="epf-price-label" for="GlassType_<?php echo $glass->id; ?>_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                                    <input disabled type="number"  value="<?php echo $glass->price; ?>" class="form-control disableInput epf-price-box disableInput" id="GlassType_<?php echo $glass->id; ?>_price" name="GlassType_<?php echo $glass->id; ?>_price">
                                                    <br>
                                                    <label class="form-check-label epf-price-label">
                                                        <input disabled class="form-check-input" <?php echo $glass->disabled=="true"?"checked":"";?> name="GlassType_<?php echo $glass->id; ?>_disabled" id="GlassType_<?php echo $glass->id; ?>_disabled" type="checkbox"> <?php echo $words_epf_dugudlabs_lng["disable"];?>
                                                    </label>
                                                </div>
                                                <div style="display: none;" id="GlassType_<?php echo $glass->id; ?>_save_btn"  class="image_change disableInput"  style="text-align: center;background: #2196f370;cursor: pointer;">Save</div>
                                                <div id="GlassType_<?php echo $glass->id; ?>_edit_btn" class="image_change disableInput"  style="text-align: center;background: #2196f370;cursor: pointer;">Edit</div>
                                            
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-1">
                                        </div>
                                        
                                    </div>
                                    <div class="row" style="margin-bottom: 5%;">
                                        <div class="col-sm-1">
                                        </div>
                                        <?php 
                                        if($megaCounter == $size){
                                            ?>
                                                <div class="col-sm-2" style="border: green; border-style: dashed;padding-left: 0px;padding-right: 0px;">
                                                <div id="new_GlassType disableInput" class="card lens-type">
                                                        <div class="image_add disableInput disableInput"  style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Add Image"];?>
                                                        <input disabled value="" style="display: none;" type=text id="GlassType_new_image_img" name="GlassType_new_image">
                                                        </div>
                                                        <div class="card-body">
                                                            <h6 class="card-title"><input disabled style="width: 100% !important;" id="GlassType_new_name" type="text" class="form-control disableInput epf-price-box" placeholder="Glass Name"/></button></h6>
                                                        </div>
                                                        <img id="GlassType_new_image" src="<?php echo plugin_dir_url( __FILE__ ).'/images/glassType.png';?>" class="card-img-top" alt="...">
                                                        <textarea disabled class="form-control disableInput" rows="3" id="GlassType_new_description" name="GlassType_new_description" placeholder="Enter Description" id="GlassType_new_description"></textarea>
                                                        <div class="price_box">
                                                            <label class="epf-price-label" for="GlassType_new_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                                            <input disabled type="number"  value="0" class="disableInput form-control disableInput epf-price-box" id="GlassType_new_price" name="GlassType_new_price">
                                                        </div>
                                                        <div class="image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;">Add New</div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    <?php 
                    
                                }
                                else{
                                    ?>
                                    <div class="col-sm-2">
                                        <div id="<?php echo $glass->id; ?>" class="card lens-type">
                                            <div class="image_change disableInput" id="GlassType_<?php echo $glass->id; ?>_image_change disableInput"  style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Change Image"];?>
                                            <input disabled value="<?php echo $glass->image;?>" style="display: none;" type=text id="GlassType_<?php echo $glass->id; ?>_image_img" name="GlassType_<?php echo $glass->id; ?>_image"></div>
                                            <div class="card-body">
                                            <h6 class="card-title"><input disabled value="<?php echo $glass->name; ?>" style="width: 100% !important;" id="GlassType_<?php echo $glass->id; ?>_name" type="text" class="form-control disableInput epf-price-box disableInput" placeholder="Glass Name"/></h6>
                                            </div>
                                            <img id="GlassType_<?php echo $glass->id; ?>_image" src="<?php echo $glass->image;?>" class="card-img-top" alt="...">
                                            <textarea disabled class="form-control disableInput hidden disableInput" rows="3" id="GlassType_<?php echo $glass->id; ?>_description" id="GlassType_<?php echo $glass->id; ?>_description"><?php echo $glass->description;?></textarea>
                                            <div class="price_box">
                                                <label class="epf-price-label" for="GlassType_<?php echo $glass->id; ?>_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                                <input disabled type="number"  value="<?php echo $glass->price; ?>" class="form-control disableInput epf-price-box disableInput" id="GlassType_<?php echo $glass->id; ?>_price" name="GlassType_<?php echo $glass->id; ?>_price">
                                                <br>
                                                <label class="form-check-label epf-price-label">
                                                    <input disabled class="form-check-input" <?php echo $glass->disabled=="true"?"checked":"";?>  value="disabled" name="GlassType_<?php echo $glass->id; ?>_disabled" id="GlassType_<?php echo $glass->id; ?>_disabled" type="checkbox"> <?php echo $words_epf_dugudlabs_lng["disable"];?>
                                                </label>
                                            </div>
                                            <div style="display: none;" id="GlassType_<?php echo $glass->id; ?>_save_btn"  class="image_change disableInput"  style="text-align: center;background: #2196f370;cursor: pointer;">Save</div>
                                            <div id="GlassType_<?php echo $glass->id; ?>_edit_btn" class="image_change disableInput"  style="text-align: center;background: #2196f370;cursor: pointer;">Edit</div>
                                        </div>
                                    </div>
                                    <?php 
                                        if($megaCounter == $size){
                                            ?>
                                                <div class="col-sm-2" style="border: green; border-style: dashed;padding-left: 0px;padding-right: 0px;">
                                                    <div id="new_GlassType disableInput" class="card lens-type">
                                                            <div class="image_add disableInput disableInput" style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Add Image"];?>
                                                            <input disabled value="" style="display: none;" type=text id="GlassType_new_image_img" name="GlassType_new_image">
                                                            </div>
                                                            <div class="card-body">
                                                                <h6 class="card-title"><input disabled style="width: 100% !important;" id="GlassType_new_name" type="text" class="form-control disableInput epf-price-box" placeholder="Glass Name"/></button></h6>
                                                            </div>
                                                            <img id="GlassType_new_image" src="<?php echo plugin_dir_url( __FILE__ ).'/images/glassType.png';?>" class="card-img-top" alt="...">
                                                            <textarea disabled class="form-control disableInput" rows="3" id="GlassType_new_description" name="GlassType_new_description" placeholder="Enter Description" id="GlassType_new_description"></textarea>
                                                            <div class="price_box">
                                                                <label class="epf-price-label" for="GlassType_new_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                                                <input disabled type="number"  value="0" class="form-control disableInput epf-price-box" id="GlassType_new_price" name="GlassType_new_price">
                                                            </div>
                                                            <div class="image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;">Add New</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                </div>
                                                <div class="col-sm-4" style="border: green; border-style: dashed;padding-left: 0px;padding-right: 0px;">
                                                    <h3 style="text-align: center;">Premium Features</h3>
                                                    <ol>
                                                        <li>Update Image of lens</li>
                                                        <li>Update Name of lens</li>
                                                        <li>Update description of lens</li>
                                                        <li>Add price for lens/SPH/CYL/ADD/PD</li>
                                                        <li>Disable/Eable lens to show on product page</li>
                                                        <li><strong>Add unlimited lenes using Add New Panel.</strong></li>
                                                    </ol>
                                                    <a href="https://www.dugudlabs.com/specfit/eyewear-priscrption-form">Checkout premium version</a>
                                                </div>
                                            <?php
                                        }
                                }

                            }
                            ?>
                            <div class="col-sm-1">
                            </div>
                        </div>
                        <table id="prescription_table" class="table-responsive-sm table-borderless" style="margin: 10 10 10 10">
                            <thead>
                                <tr>
                                    <th>Rx</th>
                                    <th><?php echo $words_epf_dugudlabs_lng["Sphere"];?> (SPH) : Price</th>
                                    <th><?php echo $words_epf_dugudlabs_lng["Cylinder"];?>(CYL) : Price</th>
                                    <th><?php echo $words_epf_dugudlabs_lng["AXIS"];?> : Price</th>
                                    <th>ADD : Price</th>
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
                                            $selectText =  '<select onchange="show_price(\'RIGHT\',\'SPH\');" id="RIGHT-SPH-SELECT" name="RIGHT-SPH" class="form-control" id="sel1">';
                                            foreach ( $obj as $key => $value )
                                            {
                                                if($key!='')
                                                    $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                            }
                                            $selectText=$selectText.'</select>';
                                            echo $selectText;
                                            ?>
                                            <input disabled id="RIGHT-SPH-PRICE" type="number" oninput="show_save_btn('RIGHT-SPH');" class="form-control epf-price-box-table disableInput">
                                            <span id="RIGHT-SPH" class="btn btn-primary  save-price-button" style="display: none;">Save</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <?php 
                                            $sphereRange = range(-6.0,6.0,0.25);
                                            $obj = new stdClass();
                                            $obj->select= $words_epf_dugudlabs_lng["select"];
                                            $right_sph_json="{";
                                            foreach ($sphereRange as $cm) {
                                                $val = sprintf("%+.2f",$cm);
                                                $obj->$val = $val;}
                                            $selectText =  '<select onchange="show_price(\'RIGHT\',\'CYL\');" id="RIGHT-CYL-SELECT" name="RIGHT-CYL" class="form-control" id="sel1">';
                                            foreach ( $obj as $key => $value )
                                            {
                                                if($key!='')
                                                    $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                            }
                                            $selectText=$selectText.'</select>';
                                            echo $selectText;
                                            ?>
                                            <input disabled id="RIGHT-CYL-PRICE" oninput="show_save_btn('RIGHT-CYL');" type="number" class="form-control epf-price-box-table disableInput">
                                            <span id="RIGHT-CYL" class="btn btn-primary  save-price-button" style="display: none;">Save</span>
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
                                            $selectText =  '<select onchange="show_price(\'RIGHT\',\'AXIS\');" id="RIGHT-AXIS-SELECT" name="RIGHT-AXIS" class="form-control" id="sel1">';
                                            foreach ( $obj as $key => $value )
                                            {
                                                if($key!='')
                                                    $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                            }
                                            $selectText=$selectText.'</select>';
                                            echo $selectText;
                                            ?>
                                            <input disabled id="RIGHT-AXIS-PRICE" oninput="show_save_btn('RIGHT-AXIS');" type="number" class="form-control epf-price-box-table disableInput">
                                            <span id="RIGHT-AXIS" class="btn btn-primary  save-price-button" style="display: none;">Save</span>
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
                                            $selectText =  '<select onchange="show_price(\'RIGHT\',\'ADD\');" id="RIGHT-ADD-SELECT" name="RIGHT-ADD" class="form-control" id="sel1">';
                                            foreach ( $obj as $key => $value )
                                            {
                                                if($key!='')
                                                    $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                            }
                                            $selectText=$selectText.'</select>';
                                            echo $selectText;
                                            ?>
                                            <input disabled id="RIGHT-ADD-PRICE" oninput="show_save_btn('RIGHT-ADD');" type="number" class="form-control epf-price-box-table disableInput">
                                            <span id="RIGHT-ADD" class="btn btn-primary  save-price-button" style="display: none;">Save</span>
                                        </div>
                                    </td>
                                    
                                </tr>
                                <!--<tr>
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
                                            $selectText =  '<select onchange="show_price(\'LEFT\',\'SPH\');" id="LEFT-SPH-SELECT" name="LEFT-SPH" class="form-control" id="sel1">';
                                            foreach ( $obj as $key => $value )
                                            {
                                                if($key!='')
                                                    $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                            }
                                            $selectText=$selectText.'</select>';
                                            echo $selectText;
                                            ?>
                                            <input disabled id="LEFT-SPH-PRICE"  oninput="show_save_btn('LEFT-SPH');"  type="number" class="form-control epf-price-box-table disableInput">
                                            <span id="LEFT-SPH" class="btn btn-primary  save-price-button" style="display: none;">Save</span>
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
                                            $selectText =  '<select onchange="show_price(\'LEFT\',\'CYL\');" id="LEFT-CYL-SELECT" name="LEFT-CYL" class="form-control" id="sel1">';
                                            foreach ( $obj as $key => $value )
                                            {
                                                if($key!='')
                                                    $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                            }
                                            $selectText=$selectText.'</select>';
                                            echo $selectText;
                                            ?>
                                            <input disabled id="LEFT-CYL-PRICE"  oninput="show_save_btn('LEFT-CYL');" type="number" class="form-control epf-price-box-table disableInput">
                                            <span id="LEFT-CYL" class="btn btn-primary  save-price-button" style="display: none;">Save</span>
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
                                            $selectText =  '<select onchange="show_price(\'LEFT\',\'AXIS\');" id="LEFT-AXIS-SELECT" name="LEFT-AXIS" class="form-control" id="sel1">';
                                            foreach ( $obj as $key => $value )
                                            {
                                                if($key!='')
                                                    $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                            }
                                            $selectText=$selectText.'</select>';
                                            echo $selectText;
                                            ?>
                                            <input disabled id="LEFT-AXIS-PRICE"  oninput="show_save_btn('LEFT-AXIS');" type="number" class="form-control epf-price-box-table disableInput">
                                            <span id="LEFT-AXIS" class="btn btn-primary  save-price-button" style="display: none;">Save</span>
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
                                            $selectText =  '<select onchange="show_price(\'LEFT\',\'ADD\');" id="LEFT-ADD-SELECT" name="LEFT-ADD" class="form-control" id="sel1">';
                                            foreach ( $obj as $key => $value )
                                            {
                                                if($key!='')
                                                    $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                            }
                                            $selectText=$selectText.'</select>';
                                            echo $selectText;
                                            ?>
                                            <input disabled id="LEFT-ADD-PRICE"  oninput="show_save_btn('LEFT-ADD');" type="number" class="form-control epf-price-box-table disableInput">
                                            <span id="LEFT-ADD" class="btn btn-primary  save-price-button" style="display: none;">Save</span>
                                        </div>

                                    </td>
                                    <td>
                                    <div class="form-group">
                                    <?php 
                                            $sphereRange = range(23,40,1);
                                            $obj = new stdClass();
                                            $obj->select= $words_epf_dugudlabs_lng["select"];
                                            foreach ($sphereRange as $cm) {
                                                $val = $cm;
                                                $obj->$val = $val;
                                            }
                                            $selectText =  '<select onchange="show_price(\'LEFT\',\'PD\');" id="LEFT-PD-SELECT" name="LEFT-PD" class="form-control" id="sel1">';
                                            foreach ( $obj as $key => $value )
                                            {
                                                if($key!='')
                                                    $selectText=$selectText. '<option name='.$key.'>'.$value.'</option>';
                                            }
                                            $selectText=$selectText.'</select>';
                                            echo $selectText;
                                            ?>
                                            <input disabled id="LEFT-PD-PRICE" oninput="show_save_btn('LEFT-PD');" type="number" class="form-control epf-price-box-table disableInput">
                                            <span id="LEFT-PD" class="btn btn-primary  save-price-button" style="display: none;">Save</span>
                                        </div>

                                    </td>
                                </tr>-->
                            </tbody>
                        </table>
                            
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
                    <div class="row" style="margin-bottom: 5%;">
                            <div class="col-sm-1">
                            </div>
                            <?php
                            $counter=0;
                            $megaCounter=0;
                            $size= sizeof($lenses);
                            foreach($lenses as $lens){
                                $counter+=1;
                                $megaCounter+=1;
                                if($counter==5){
                                    $counter=0;
                                    ?>
                                        <div class="col-sm-2">
                                            <div id="<?php echo $lens->id; ?>" class="card lens-type">
                                                <div class="image_change disableInput" id="LensType_<?php echo $lens->id; ?>_image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Change Image"];?>
                                                <input disabled value="<?php echo $lens->image;?>" style="display: none;" type=text id="LensType_<?php echo $lens->id; ?>_image_img" name="LensType_<?php echo $lens->id; ?>_image"></div>
                                                <div class="card-body">
                                                <h6 class="card-title"><input disabled value="<?php echo $lens->name; ?>" style="width: 100% !important;" id="LensType_<?php echo $lens->id; ?>_name" type="text" class="form-control disableInput epf-price-box disableInput" placeholder="Lens Name"/></h6>
                                                </div>
                                                <img id="LensType_<?php echo $lens->id; ?>_image" src="<?php echo $lens->image;?>" class="card-img-top" alt="...">
                                                <textarea disabled class="form-control disableInput hidden disableInput" rows="3" id="LensType_<?php echo $lens->id; ?>_description" id="LensType_<?php echo $lens->id; ?>_description"><?php echo $lens->description;?></textarea>
                                                <div class="price_box">
                                                    <label class="epf-price-label" for="LensType_<?php echo $lens->id; ?>_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                                    <input disabled type="number"  value="<?php echo $lens->price; ?>" class="form-control disableInput epf-price-box disableInput" id="LensType_<?php echo $lens->id; ?>_price" name="LensType_<?php echo $lens->id; ?>_price">
                                                    <br>
                                                    <label class="form-check-label epf-price-label">
                                                        <input disabled class="form-check-input" <?php echo $lens->disabled=="true"?"checked":"";?> name="LensType_<?php echo $lens->id; ?>_disabled" id="LensType_<?php echo $lens->id; ?>_disabled" type="checkbox"> <?php echo $words_epf_dugudlabs_lng["disable"];?>
                                                    </label>
                                                </div>
                                                <div style="display: none;" id="LensType_<?php echo $lens->id; ?>_save_btn" style="text-align: center;background: #2196f370;cursor: pointer;">Save</div>
                                                <div id="LensType_<?php echo $lens->id; ?>_edit_btn" class="image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;">Edit</div>
                                            
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-1">
                                        </div>
                                        
                                    </div>
                                    <div class="row" style="margin-bottom: 5%;">
                                        <div class="col-sm-1">
                                        </div>
                                        <?php 
                                        if($megaCounter == $size){
                                            ?>
                                                <div class="col-sm-2" style="background: #ad0e0e87;border: green; border-style: dashed;padding-left: 0px;padding-right: 0px;">
                                                <div id="new_LensType disableInput" class="card lens-type">
                                                        <div class="image_add disableInput disableInput" style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Add Image"];?>
                                                        <input disabled value="" style="display: none;" type=text id="LensType_new_image_img" name="LensType_new_image">
                                                        </div>
                                                        <div class="card-body">
                                                            <h6 class="card-title"><input disabled style="width: 100% !important;" id="LensType_new_name" type="text" class="form-control disableInput epf-price-box" placeholder="Lens Name"/></button></h6>
                                                        </div>
                                                        <img id="LensType_new_image" src="<?php echo plugin_dir_url( __FILE__ ).'/images/lensType.png';?>" class="card-img-top" alt="...">
                                                        <textarea disabled class="form-control disableInput" rows="3" id="LensType_new_description" name="LensType_new_description" placeholder="Enter Description" id="LensType_new_description"></textarea>
                                                        <div class="price_box">
                                                            <label class="epf-price-label" for="LensType_new_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                                            <input disabled type="number"  value="0" class=" disableInput form-control disableInput epf-price-box" id="LensType_new_price" name="LensType_new_price">
                                                        </div>
                                                        <div class="image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;">Add New</div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    <?php 
                    
                                }
                                else{
                                    ?>
                                    <div class="col-sm-2">
                                        <div id="<?php echo $lens->id; ?>" class="card lens-type">
                                            <div class="image_change disableInput" id="LensType_<?php echo $lens->id; ?>_image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Change Image"];?>
                                            <input disabled value="<?php echo $lens->image;?>" style="display: none;" type=text id="LensType_<?php echo $lens->id; ?>_image_img" name="LensType_<?php echo $lens->id; ?>_image"></div>
                                            <div class="card-body">
                                            <h6 class="card-title"><input disabled value="<?php echo $lens->name; ?>" style="width: 100% !important;" id="LensType_<?php echo $lens->id; ?>_name" type="text" class="form-control disableInput epf-price-box disableInput" placeholder="Lens Name"/></h6>
                                            </div>
                                            <img id="LensType_<?php echo $lens->id; ?>_image" src="<?php echo $lens->image;?>" class="card-img-top" alt="...">
                                            <textarea disabled class="form-control disableInput hidden disableInput" rows="3" id="LensType_<?php echo $lens->id; ?>_description" id="LensType_<?php echo $lens->id; ?>_description"><?php echo $lens->description;?></textarea>
                                            <div class="price_box">
                                                <label class="epf-price-label" for="LensType_<?php echo $lens->id; ?>_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                                <input disabled type="number"  value="<?php echo $lens->price; ?>" class="form-control disableInput epf-price-box disableInput" id="LensType_<?php echo $lens->id; ?>_price" name="LensType_<?php echo $lens->id; ?>_price">
                                                <br>
                                                <label class="form-check-label epf-price-label">
                                                    <input disabled class="form-check-input" <?php echo $lens->disabled=="true"?"checked":"";?>  value="disabled" name="LensType_<?php echo $lens->id; ?>_disabled" id="LensType_<?php echo $lens->id; ?>_disabled" type="checkbox"> <?php echo $words_epf_dugudlabs_lng["disable"];?>
                                                </label>
                                            </div>
                                            <div style="display: none;" id="LensType_<?php echo $lens->id; ?>_save_btn" style="text-align: center;background: #2196f370;cursor: pointer;">Save</div>
                                            <div id="LensType_<?php echo $lens->id; ?>_edit_btn" class="image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;">Edit</div>
                                        </div>
                                    </div>
                                    <?php 
                                        if($megaCounter == $size){
                                            ?>
                                                <div class="col-sm-2" style="border: green; border-style: dashed;padding-left: 0px;padding-right: 0px;">
                                                <div id="new_LensType disableInput" class="card lens-type">
                                                        <div class="image_add disableInput" style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Add Image"];?>
                                                        <input disabled value="" style="display: none;" type=text id="LensType_new_image_img" name="LensType_new_image">
                                                        </div>
                                                        <div class="card-body">
                                                            <h6 class="card-title"><input disabled style="width: 100% !important;" id="LensType_new_name" type="text" class="form-control disableInput epf-price-box" placeholder="Lens Name"/></button></h6>
                                                        </div>
                                                        <img id="LensType_new_image" src="<?php echo plugin_dir_url( __FILE__ ).'/images/lensType.png';?>" class="card-img-top" alt="...">
                                                        <textarea disabled class="form-control disableInput" rows="3" id="LensType_new_description" name="LensType_new_description" placeholder="Enter Description" id="LensType_new_description"></textarea>
                                                        <div class="price_box">
                                                            <label class="epf-price-label" for="LensType_new_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                                            <input disabled type="number"  value="0" class="form-control disableInput epf-price-box" id="LensType_new_price" name="LensType_new_price">
                                                        </div>
                                                        <div class="image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;">Add New</div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                }

                            }
                            ?>
                            <div class="col-sm-1">
                            </div>
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
                        <div class="row" style="margin-bottom: 5%;">
                            <div class="col-sm-1">
                            </div>
                                <?php
                                $counter=0;
                                $megaCounter=0;
                                $size= sizeof($coatings);
                                foreach($coatings as $coating){
                                    $counter+=1;
                                    $megaCounter+=1;
                                    if($counter==5){
                                        $counter=0;
                                        ?>
                            <div class="col-sm-2">
                                <div id="<?php echo $coating->id; ?>" class="card coating-type">
                                    <div class="image_change disableInput" id="CoatingType_<?php echo $coating->id; ?>_image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Change Image"];?>
                                    <input disabled value="<?php echo $coating->image;?>" style="display: none;" type=text id="CoatingType_<?php echo $coating->id; ?>_image_img" name="CoatingType_<?php echo $coating->id; ?>_image"></div>
                                    <div class="card-body">
                                    <h6 class="card-title"><input disabled value="<?php echo $coating->name; ?>" style="width: 100% !important;" id="CoatingType_<?php echo $coating->id; ?>_name" type="text" class="form-control disableInput epf-price-box disableInput" placeholder="Coating Name"/></h6>
                                    </div>
                                    <img id="CoatingType_<?php echo $coating->id; ?>_image" src="<?php echo $coating->image;?>" class="card-img-top" alt="...">
                                    <textarea disabled class="form-control disableInput hidden disableInput" rows="3" id="CoatingType_<?php echo $coating->id; ?>_description" id="CoatingType_<?php echo $coating->id; ?>_description"><?php echo $coating->description;?></textarea>
                                    <div class="price_box">
                                        <label class="epf-price-label" for="CoatingType_<?php echo $coating->id; ?>_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                        <input disabled type="number"  value="<?php echo $coating->price; ?>" class="form-control disableInput epf-price-box disableInput" id="CoatingType_<?php echo $coating->id; ?>_price" name="CoatingType_<?php echo $coating->id; ?>_price">
                                        <br>
                                        <label class="form-check-label epf-price-label">
                                            <input disabled class="form-check-input" <?php echo $coating->disabled=="true"?"checked":"";?> name="CoatingType_<?php echo $coating->id; ?>_disabled" id="CoatingType_<?php echo $coating->id; ?>_disabled" type="checkbox"> <?php echo $words_epf_dugudlabs_lng["disable"];?>
                                        </label>
                                    </div>
                                    <div style="display: none;" id="CoatingType_<?php echo $coating->id; ?>_save_btn" style="text-align: center;background: #2196f370;cursor: pointer;">Save</div>
                                    <div id="CoatingType_<?php echo $coating->id; ?>_edit_btn" class="image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;">Edit</div>
                                
                                </div>
                            </div>      
                            <div class="col-sm-1">
                            </div>       
                        </div>
                        <div class="row" style="margin-bottom: 5%;">
                            <div class="col-sm-1">
                            </div>
                                            <?php 
                                            if($megaCounter == $size){
                                                ?>
                            <div class="col-sm-2" style="border: green; border-style: dashed;padding-left: 0px;padding-right: 0px;">
                                <div id="new_CoatingType disableInput" class="card coating-type">
                                    <div class="image_add disableInput disableInput" style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Add Image"];?>
                                    <input disabled value="" style="display: none;" type=text id="CoatingType_new_image_img" name="CoatingType_new_image">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title"><input disabled style="width: 100% !important;" id="CoatingType_new_name" type="text" class="form-control disableInput epf-price-box" placeholder="Coating Name"/></button></h6>
                                    </div>
                                    <img id="CoatingType_new_image" src="<?php echo plugin_dir_url( __FILE__ ).'/images/coatingType.png';?>" class="card-img-top" alt="...">
                                    <textarea disabled class="form-control disableInput" rows="3" id="CoatingType_new_description" name="CoatingType_new_description" placeholder="Enter Description" id="CoatingType_new_description"></textarea>
                                    <div class="price_box">
                                        <label class="epf-price-label" for="CoatingType_new_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                        <input disabled type="number"  value="0" class="form-control disableInput epf-price-box" id="CoatingType_new_price" name="CoatingType_new_price">
                                    </div>
                                    <div class="image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;">Add New</div>
                                </div>
                            </div>
                                                <?php
                                            }
                                            ?>
                                        <?php 
                        
                                    }
                                    else{
                                        ?>
                                        <div class="col-sm-2">
                                            <div id="<?php echo $coating->id; ?>" class="card coating-type">
                                                <div class="image_change disableInput" id="CoatingType_<?php echo $coating->id; ?>_image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Change Image"];?>
                                                <input disabled value="<?php echo $coating->image;?>" style="display: none;" type=text id="CoatingType_<?php echo $coating->id; ?>_image_img" name="CoatingType_<?php echo $coating->id; ?>_image"></div>
                                                <div class="card-body">
                                                <h6 class="card-title"><input disabled value="<?php echo $coating->name; ?>" style="width: 100% !important;" id="CoatingType_<?php echo $coating->id; ?>_name" type="text" class="form-control disableInput epf-price-box disableInput" placeholder="Coating Name"/></h6>
                                                </div>
                                                <img id="CoatingType_<?php echo $coating->id; ?>_image" src="<?php echo $coating->image;?>" class="card-img-top" alt="...">
                                                <textarea disabled class="form-control disableInput hidden disableInput" rows="3" id="CoatingType_<?php echo $coating->id; ?>_description" id="CoatingType_<?php echo $coating->id; ?>_description"><?php echo $coating->description;?></textarea>
                                                <div class="price_box">
                                                    <label class="epf-price-label" for="CoatingType_<?php echo $coating->id; ?>_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                                    <input disabled type="number"  value="<?php echo $coating->price; ?>" class="form-control disableInput epf-price-box disableInput" id="CoatingType_<?php echo $coating->id; ?>_price" name="CoatingType_<?php echo $coating->id; ?>_price">
                                                    <br>
                                                    <label class="form-check-label epf-price-label">
                                                        <input disabled class="form-check-input" <?php echo $coating->disabled=="true"?"checked":"";?>  value="disabled" name="CoatingType_<?php echo $coating->id; ?>_disabled" id="CoatingType_<?php echo $coating->id; ?>_disabled" type="checkbox"> <?php echo $words_epf_dugudlabs_lng["disable"];?>
                                                    </label>
                                                </div>
                                                <div style="display: none;" id="CoatingType_<?php echo $coating->id; ?>_save_btn" style="text-align: center;background: #2196f370;cursor: pointer;">Save</div>
                                                <div id="CoatingType_<?php echo $coating->id; ?>_edit_btn" class="image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;">Edit</div>
                                            </div>
                                        </div>
                                        <?php 
                                            if($megaCounter == $size){
                                                ?>
                                                    <div class="col-sm-2" style="border: green; border-style: dashed;padding-left: 0px;padding-right: 0px;">
                                                    <div id="new_CoatingType disableInput" class="card coating-type">
                                                            <div class="image_add disableInput" style="text-align: center;background: #2196f370;cursor: pointer;"><?php echo $words_epf_dugudlabs_lng["Add Image"];?>
                                                            <input disabled value="" style="display: none;" type=text id="CoatingType_new_image_img" name="CoatingType_new_image">
                                                            </div>
                                                            <div class="card-body">
                                                                <h6 class="card-title"><input disabled style="width: 100% !important;" id="CoatingType_new_name" type="text" class="form-control disableInput epf-price-box" placeholder="Coating Name"/></button></h6>
                                                            </div>
                                                            <img id="CoatingType_new_image" src="<?php echo plugin_dir_url( __FILE__ ).'/images/coatingType.png';?>" class="card-img-top" alt="...">
                                                            <textarea disabled class="form-control disableInput" rows="3" id="CoatingType_new_description" name="CoatingType_new_description" placeholder="Enter Description" id="CoatingType_new_description"></textarea>
                                                            <div class="price_box">
                                                                <label class="epf-price-label" for="CoatingType_new_price"><?php echo $words_epf_dugudlabs_lng["Price"];?>:</label>
                                                                <input disabled type="number"  value="0" class="form-control disableInput epf-price-box" id="CoatingType_new_price" name="CoatingType_new_price">
                                                            </div>
                                                            <div class="image_change disableInput" style="text-align: center;background: #2196f370;cursor: pointer;">Add New</div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
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
</form>