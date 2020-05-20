var selected_glass = '';
var selected_lens = '';
var selected_lens_coating = '';

var jE = jQuery.noConflict();

function show_pd_box(elementID) {
    jE("#dual-pd-box").css("display", "none");
    jE("#single-pd-box").css("display", "none");
    jE("#pd-calculator").css("display", "none");
    jE("#" + elementID).css("display", "block");
}

function show_priscription(element, priscription) {
    if (jE(element).is(':checked')) {
        if (priscription == 'manual') {
            jE("#prescription_table").css("display", "block");
            jE("#prescription_upload").css("display", "none");
        } else {
            jE("#prescription_table").css("display", "none");
            jE("#prescription_upload").css("display", "block");
        }
    }
}

function select_glass_type(element, glass_type, price) {
    //alert(glass_type);
    if (selected_glass != '')
        document.getElementById(selected_glass).classList.remove("lens-type-selected");
    selected_glass = "glass_" + glass_type;
    element.classList.add("lens-type-selected");
    var glass_type_json = '{"' + glass_type + '":{"price":"' + price + '"}}';
    document.getElementById("GlassType").value = glass_type;
    if (selected_glass == 'no_priscription')
        jE("#priscription_box").css("display", "none");
    else
        jE("#priscription_box").css("display", "block");
}

function select_lens_type(element, lens_type, price) {
    if (selected_lens != '')
        document.getElementById(selected_lens).classList.remove("lens-type-selected");
    selected_lens = "lens_" + lens_type;
    element.classList.add("lens-type-selected");
    var lens_type_json = '{"' + lens_type + '":{"price":"' + price + '"}}';
    document.getElementById("LensType").value = lens_type;
}

function select_coating_type(element, lens_coating, price) {
    if (selected_lens_coating != '')
        document.getElementById(selected_lens_coating).classList.remove("lens-type-selected");
    selected_lens_coating = "coating_" + lens_coating;
    element.classList.add("lens-type-selected");
    var lens_coating_json = '{"' + lens_coating + '":{"price":"' + price + '"}}';
    document.getElementById("LensCoating").value = lens_coating;
}