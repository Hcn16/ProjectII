var dem = 0;
var curren = 1;



var i = 0;

var mang = ["show", "show2", "show3", "show4"];
var mang_hide = ["hide", "hide2", "hide3", "hide4"];
var mang2 = [];

function hiencha() {
    for (i = 0; i < 4; i++) {
        document.getElementById(mang[i]).style.background = "#B22222";
        document.getElementById(mang[i]).style.color = "white";
        document.getElementById(mang_hide[i]).style.display = "none";


    }

}

function hiencha2(mang_hide, mang, a) {


    document.getElementById(mang_hide[a]).style.display = "flex";
    document.getElementById(mang[a]).style.background = "white";
    document.getElementById(mang[a]).style.color = "#B22222";

}

function hien() {
    for (i = 0; i < 4; i++) {
        mang2[i] = document.getElementById(mang[i]);

    }
    hiencha();
    hiencha2(mang_hide, mang, 0);


}

function hien2() {
    hiencha();
    hiencha2(mang_hide, mang, 1);

}

function hien3() {
    hiencha();
    hiencha2(mang_hide, mang, 2);

}

function hien4() {
    hiencha();
    hiencha2(mang_hide, mang, 3);

}


// Thiết lập click cho button 2


var index = 1;
change = function() {
    var imgs = ["../public/image/img1.jpg", "../public/image/img2.jpg", "../public/image/img3.jpg"];
    document.getElementById('img').src = imgs[index];
    index++;
    if (index == 3) {
        index = 0;
    }
}
setInterval(change, 2000);

function search() {

}