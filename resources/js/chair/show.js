const selectAll = document.getElementById("selectAll");

if (selectAll) {
    selectAll.addEventListener("input", (e) => {
        const students = document.querySelectorAll("input[name='student']");
        students.forEach((student) => {
            student.checked = selectAll.checked;
        });
    });
}

const addBtn = document.getElementById("add");
if (addBtn) {
    addBtn.addEventListener("click", (e) => {
        const dialog = document.getElementById("addDialog");
        dialog.showModal();
    });
}
const modifyBtn = document.getElementById("modify");
if (modifyBtn) {
    modifyBtn.addEventListener("click", (e) => {
        const dialog = document.getElementById("modifyDialog");
        dialog.showModal();
    });
}
