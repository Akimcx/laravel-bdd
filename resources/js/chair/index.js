const selectAll = document.getElementById("selectAll");
if (selectAll) {
    selectAll.addEventListener("input", (e) => {
        const chaires = document.querySelectorAll("input[name='chaire']");
        chaires.forEach((chaire) => {
            chaire.checked = selectAll.checked;
        });
    });
}
