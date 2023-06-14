var tabLinks = document.querySelectorAll(".tablinks");
var tabContent = document.querySelectorAll(".tabcontent");

tabLinks.forEach(function(el) {
    el.addEventListener("click", openTabs);
});


function openTabs(el) {
    var btn = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
    var electronic = btn.dataset.electronic; // lấy giá trị trong data-electronic

    tabContent.forEach(function(el) {
        el.classList.remove("active");
    }); //lặp qua các tab content để remove class active

    tabLinks.forEach(function(el) {
        el.classList.remove("active");
    }); //lặp qua các tab links để remove class active

    document.querySelector("#" + electronic).classList.add("active");
    // trả về phần tử đầu tiên có id="" được add class active

    btn.classList.add("active");
    // các button mà chúng ta click vào sẽ được add class active
}
var id;

// function showContent(id) {
//     var contents = document.getElementsByClassName('container');

//     for (var i = 0; i < contents.length; i++) {
//         contents[i].style.display = 'none';
//     }
//     var content = document.getElementById(id);
//     content.style.display = 'block';
// }

function active_tab2() {
    var buttons = document.getElementsByClassName('page');
    var contents = document.getElementsByClassName('container');




    var i = 1;
    for (i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function() {
            console.log("ninh");
            buttons[i].classList.remove("active");
            this.className += " active";
            // showContent(id);
        });

    }
}