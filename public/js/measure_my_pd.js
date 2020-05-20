function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            jE('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
jE("#profile-img").change(function() {
    readURL(this);
});

// pd measurement
let pos = jE("#eyeDotRight").position();
console.log("right pos" + pos);
let eyeRight = Math.abs(pos.left);
let eyeRightTop = Math.abs(pos.top);
pos = jE("#eyeDotLeft").position();
console.log("left pos" + pos);
let eyeLeft = Math.abs(pos.left);
let eyeLeftTop = Math.abs(pos.top);
let lineLeft;
let lineRight;
let wid = jE("#dimension-line").width();

jE(function() {
    jE("#eyeDotLeft").draggable({
        containment: "parent",
        stop: function() {
            pos = jE("#eyeDotLeft").position();
            eyeLeft = Math.abs(pos.left);
            eyeLeftTop = Math.abs(pos.top);

            calculatePd();
            // console.log(eyeLeft);
        },

    });

    jE("#eyeDotRight").draggable({
        containment: "parent",
        stop: function() {
            pos = jE("#eyeDotRight").position();
            eyeRight = Math.abs(pos.left);
            eyeRightTop = Math.abs(pos.top);
            calculatePd();
            // console.log(eyeRight);
        }
    });
    jE("#dimension-line").resizable({

        maxHeight: 60,
        stop: function() {
            wid = jE("#dimension-line").width();
            line = jE("#dimension-line").position();
            lineLeft = Math.abs(line.left);
            console.log(`line wid jE{wid}`);

            calculatePd();
        }
    });
    jE("#dimension-line").rotatable();

    jE("#dimension-line").draggable({
        containment: "parent",
        stop: function() {
            calculatePd();
        }

        // console.log(eyeLeft);
    });

});

function calculatePd() {

    let distanceOfEyes;
    let base, perpandi, absPerpandi;
    let absBase;
    if (eyeLeftTop > eyeRightTop) {
        base = eyeRight - eyeLeft;
        absBase = Math.abs(base);
        console.log(`base jE{absBase}`);
        perpandi = eyeLeftTop - eyeRightTop
        absPerpandi = Math.abs(perpandi);
        console.log(`perpandi jE{absPerpandi}`);

        distanceOfEyes = Math.sqrt(absBase * absBase + absPerpandi * absPerpandi);
        console.log(`eye distance jE{distanceOfEyes}`);

    } else {
        base = eyeRight - eyeLeft;
        console.log("base is:" + base + "abs:" + Math.abs(base));
        absBase = Math.abs(base);
        perpandi = eyeRightTop - eyeLeftTop;
        absPerpandi = Math.abs(perpandi)
        console.log("perpandi is:" + perpandi + "abs:" + Math.abs(absPerpandi));
        distanceOfEyes = Math.sqrt(absBase * absBase + absPerpandi * absPerpandi);
        console.log(`eye distance jE{distanceOfEyes}`);
    }
    console.log(`line width is jE{wid}`);
    let widthOfCard = 323.52755906; //in pixels
    let ratio = widthOfCard / wid;
    console.log(`Ratio is jE{ratio}`);
    distanceOfEyes = distanceOfEyes * ratio;
    distanceOfEyes = distanceOfEyes * 0.2645833333; // in millimeter
    document.getElementById("pd").value = distanceOfEyes;
}