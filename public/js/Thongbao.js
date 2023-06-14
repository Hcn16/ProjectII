function active_tab() {

    const $ = ge(document)
    const $$ = document.querySelectorAll.bind(document)
    const nut = $$('.page')
    const panes = $$('.tab')


    nut.foreach((tab, index) => {
        const sub_ = panes[index];

        tab.onclick = function() {
            $('.page.active').classList.remove('active')
            $('.tab.active').classList.remove('active')

            this.classList.add('active')
            sub_.classList.add('active')
        }
    })
}

var id;

function showContent(id) {
    var contents = document.getElementsByClassName('tab');

    for (var i = 0; i < contents.length; i++) {
        contents[i].style.display = 'none';
    }
    var content = document.getElementById(id);
    content.style.display = 'block';
}

function active_tab2() {
    var buttons = document.getElementsByClassName('page');
    var contents = document.getElementsByClassName('tab');


    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function() {
            console.log(i)
            var id = this.textContent;
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove("active");
            }
            this.className += " active";
            showContent(id);
        });
    }

}