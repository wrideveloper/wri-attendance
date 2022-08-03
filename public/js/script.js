const controlPasswordVisibility = () => {
    const hideInputIconClass = "fa-solid fa-eye-slash";
    const showInputIconClass = "fa-solid fa-eye";
    $("button[cs-show-password]").each(function () {
        const elementPassword = $(`input#${$(this).attr("cs-show-password")}`);
        $(this).click(() => toggleInput(this, elementPassword));
    });

    const toggleInput = (element, dest) => { toggleInputAttr(dest); toggleInputIcon(element, dest) }
    const toggleInputAttr = dest => dest.attr("type", toggleInputType(dest.attr("type")));
    const toggleInputType = type => type === "password" ? "text" : "password";
    const toggleInputIconClass = type => type === "password" ? hideInputIconClass : showInputIconClass;
    const toggleInputIcon = (element, dest) => $(element).children("i").removeClass().addClass(toggleInputIconClass(dest.attr("type")));
};

const controlConfirmationModal = () => {
    const elementKonfirmasi = new bootstrap.Modal("#konfirmasi", null);
    const elementTerkonfirmasi = new bootstrap.Modal("#terkonfirmasi", null);
    const form = $('form');

    if(localStorage.getItem('showConfirmedModal')) {
        elementTerkonfirmasi.show()
        localStorage.removeItem('showConfirmedModal');
        elementTerkonfirmasi.hide()
    }

    form.submit(() => {
        elementKonfirmasi.show();
        return false
    })
    $('#lanjut').click(() => {
        elementKonfirmasi.hide();
        form.unbind("submit")
        form.submit()
        localStorage.setItem('showConfirmedModal', true)
    })
    
    
}

const controlBodyBackgroundColor = (color = "#F9F9F9") => $("body").css({ backgroundColor: color });

const controlProgressBarPercentage = (totalPresence, presence) => parseInt((presence / totalPresence) * 100)

// script sidebar
window.addEventListener('DOMContentLoaded', event => {
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
// end script sidebar
