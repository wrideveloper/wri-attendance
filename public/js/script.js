const controlPasswordVisibility = () => {
    const hideInputIconClass = "fa-solid fa-eye-slash";
    const showInputIconClass = "fa-solid fa-eye";
    $("button[cs-show-password]").each(function () {
        const elementPassword = $(`input#${$(this).attr("cs-show-password")}`);
        $(this).click(() => toggleInput(this, elementPassword));
    });

    const toggleInput = (element, dest) => {toggleInputAttr(dest); toggleInputIcon(element, dest)}
    const toggleInputAttr = dest => dest.attr("type", toggleInputType(dest.attr("type")));
    const toggleInputType = type => type === "password" ? "text" : "password";
    const toggleInputIconClass = type => type === "password" ? hideInputIconClass : showInputIconClass;
    const toggleInputIcon = (element, dest) => $(element).children("i").removeClass().addClass(toggleInputIconClass(dest.attr("type")));
};

const controlConfirmationModal = () => {
    const elementKonfirmasi = new bootstrap.Modal("#konfirmasi", null);
    const elementTerkonfirmasi = new bootstrap.Modal( "#terkonfirmasi", null );
    $("form.edit-profil").submit((e) => {
        e.preventDefault();
        elementKonfirmasi.show();
        $("#terkonfirmasi").on("shown.bs.modal", (e) => setTimeout(() => elementTerkonfirmasi.hide(), 2200));
    });
}

const controlBodyBackgroundColor = (color = "#F9F9F9") => $("body").css({ backgroundColor: color });
    
