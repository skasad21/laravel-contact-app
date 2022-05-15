document
    .getElementById("filter_company_id")
    .addEventListener("change", function () {
        let companyId = this.value || this.options[this.selectedIndex].value;
        //alert(companyId);
        window.location.href =
            window.location.href.split("?")[0] + "?company_id=" + companyId;
    });

document.querySelectorAll(".btn-delete").forEach((button) => {
    button.addEventListener("click", function (event) {
        event.preventDefault();
        if (confirm("Are you sure?")) {
            let action = this.getAttribute("href");
            let form = document.getElementById("form-delete");
            form.setAttribute("action", action);
            form.submit();
        }
    });
});

document.getElementById("btn-clear").addEventListener("click", () => {
    let input = document.getElementById("search"),
        select = document.getElementById("filter_company_id");

    input.value = "";
    select.selectedIndex = 0;
    window.location.href = window.location.href.split("?")[0];
});

const toggleClearButton = () => {
    let query = location.search;
    let pattern = /[?&]search=/; //?company_id=1&search=
    let button = document.getElementById("btn-clear");

    if (pattern.test(query)) {
        button.style.display = "block";
    } else {
        button.style.display = "none";
    }
};

toggleClearButton();
