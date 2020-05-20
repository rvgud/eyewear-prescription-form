function addNewGlassType() {
    var glassType = {};
    glassType.glassName = jQuery("#GlassType_new_name").val();
    glassType.glassPrice = jQuery("#GlassType_new_price").val();
    glassType.glassImage = jQuery("#GlassType_new_image_img").val();
    glassType.glassDescription = jQuery("#GlassType_new_description").val();
    console.log(glassType);
    console.log(submitNewType_EPF_Ajax.ajaxurl);
    jQuery.ajax({
        type: 'POST',
        data: { "action": "addGlass", "data": glassType },
        url: submitNewType_EPF_Ajax.ajaxurl,
        beforeSend: function() {},
        success: function(data) {
            location.reload();
        }

    });
}

function editGlassType(id) {
    jQuery("#GlassType_" + id + "_price").removeClass("disableInput");
    jQuery("#GlassType_" + id + "_image_change").removeClass("disableInput");
    jQuery("#GlassType_" + id + "_name").removeClass("disableInput");
    jQuery("#GlassType_" + id + "_description").removeClass("disableInput");
    jQuery("#GlassType_" + id + "_disabled").removeClass("disableInput");
    jQuery("#GlassType_" + id + "_save_btn").css("display", "block");
    jQuery("#GlassType_" + id + "_edit_btn").css("display", "none");
}

function saveGlassType(id) {
    jQuery("#GlassType_" + id + "_price").removeClass("disableInput");
    jQuery("#GlassType_" + id + "_image_change").removeClass("disableInput");
    jQuery("#GlassType_" + id + "_name").removeClass("disableInput");
    jQuery("#GlassType_" + id + "_description").removeClass("disableInput");
    jQuery("#GlassType_" + id + "_disabled").removeClass("disableInput");
    var glassType = {};
    glassType.id = id;
    glassType.glassName = jQuery("#GlassType_" + id + "_name").val();
    glassType.glassPrice = jQuery("#GlassType_" + id + "_price").val();
    glassType.glassImage = jQuery("#GlassType_" + id + "_image_img").val();
    glassType.glassDescription = jQuery("#GlassType_" + id + "_description").val();
    glassType.glassDisabled = jQuery("#GlassType_" + id + "_disabled").is(":checked")

    console.log(glassType);
    jQuery.ajax({
        type: 'POST',
        data: { "action": "updateGlass", "data": glassType },
        url: submitNewType_EPF_Ajax.ajaxurl,
        beforeSend: function() {},
        success: function(data) {
            location.reload();
        }

    });
}

////Lens Types////

function addNewLensType() {
    var lensType = {};
    lensType.lensName = jQuery("#LensType_new_name").val();
    lensType.lensPrice = jQuery("#LensType_new_price").val();
    lensType.lensImage = jQuery("#LensType_new_image_img").val();
    lensType.lensDescription = jQuery("#LensType_new_description").val();
    console.log(lensType);
    console.log(submitNewType_EPF_Ajax.ajaxurl);
    jQuery.ajax({
        type: 'POST',
        data: { "action": "addLens", "data": lensType },
        url: submitNewType_EPF_Ajax.ajaxurl,
        beforeSend: function() {},
        success: function(data) {
            location.reload();
        }

    });
}

function editLensType(id) {
    jQuery("#LensType_" + id + "_price").removeClass("disableInput");
    jQuery("#LensType_" + id + "_image_change").removeClass("disableInput");
    jQuery("#LensType_" + id + "_name").removeClass("disableInput");
    jQuery("#LensType_" + id + "_description").removeClass("disableInput");
    jQuery("#LensType_" + id + "_disabled").removeClass("disableInput");
    jQuery("#LensType_" + id + "_save_btn").css("display", "block");
    jQuery("#LensType_" + id + "_edit_btn").css("display", "none");
}

function saveLensType(id) {
    jQuery("#LensType_" + id + "_price").removeClass("disableInput");
    jQuery("#LensType_" + id + "_image_change").removeClass("disableInput");
    jQuery("#LensType_" + id + "_name").removeClass("disableInput");
    jQuery("#LensType_" + id + "_description").removeClass("disableInput");
    jQuery("#LensType_" + id + "_disabled").removeClass("disableInput");
    var lensType = {};
    lensType.id = id;
    lensType.lensName = jQuery("#LensType_" + id + "_name").val();
    lensType.lensPrice = jQuery("#LensType_" + id + "_price").val();
    lensType.lensImage = jQuery("#LensType_" + id + "_image_img").val();
    lensType.lensDescription = jQuery("#LensType_" + id + "_description").val();
    lensType.lensDisabled = jQuery("#LensType_" + id + "_disabled").is(":checked")

    console.log(lensType);
    jQuery.ajax({
        type: 'POST',
        data: { "action": "updateLens", "data": lensType },
        url: submitNewType_EPF_Ajax.ajaxurl,
        beforeSend: function() {},
        success: function(data) {
            location.reload();
        }

    });
}

////Coating Types////

function addNewCoatingType() {
    var coatingType = {};
    coatingType.coatingName = jQuery("#CoatingType_new_name").val();
    coatingType.coatingPrice = jQuery("#CoatingType_new_price").val();
    coatingType.coatingImage = jQuery("#CoatingType_new_image_img").val();
    coatingType.coatingDescription = jQuery("#CoatingType_new_description").val();
    console.log(coatingType);
    console.log(submitNewType_EPF_Ajax.ajaxurl);
    jQuery.ajax({
        type: 'POST',
        data: { "action": "addCoating", "data": coatingType },
        url: submitNewType_EPF_Ajax.ajaxurl,
        beforeSend: function() {},
        success: function(data) {
            location.reload();
        }

    });
}

function editCoatingType(id) {
    jQuery("#CoatingType_" + id + "_price").removeClass("disableInput");
    jQuery("#CoatingType_" + id + "_image_change").removeClass("disableInput");
    jQuery("#CoatingType_" + id + "_name").removeClass("disableInput");
    jQuery("#CoatingType_" + id + "_description").removeClass("disableInput");
    jQuery("#CoatingType_" + id + "_disabled").removeClass("disableInput");
    jQuery("#CoatingType_" + id + "_save_btn").css("display", "block");
    jQuery("#CoatingType_" + id + "_edit_btn").css("display", "none");
}

function saveCoatingType(id) {
    jQuery("#CoatingType_" + id + "_price").removeClass("disableInput");
    jQuery("#CoatingType_" + id + "_image_change").removeClass("disableInput");
    jQuery("#CoatingType_" + id + "_name").removeClass("disableInput");
    jQuery("#CoatingType_" + id + "_description").removeClass("disableInput");
    jQuery("#CoatingType_" + id + "_disabled").removeClass("disableInput");
    var coatingType = {};
    coatingType.id = id;
    coatingType.coatingName = jQuery("#CoatingType_" + id + "_name").val();
    coatingType.coatingPrice = jQuery("#CoatingType_" + id + "_price").val();
    coatingType.coatingImage = jQuery("#CoatingType_" + id + "_image_img").val();
    coatingType.coatingDescription = jQuery("#CoatingType_" + id + "_description").val();
    coatingType.coatingDisabled = jQuery("#CoatingType_" + id + "_disabled").is(":checked")

    console.log(coatingType);
    jQuery.ajax({
        type: 'POST',
        data: { "action": "updateCoating", "data": coatingType },
        url: submitNewType_EPF_Ajax.ajaxurl,
        beforeSend: function() {},
        success: function(data) {
            location.reload();
        }

    });
}