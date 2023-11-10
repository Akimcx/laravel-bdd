// import './bootstrap';

import Alpine from "alpinejs";

window.Alpine = Alpine;

document.addEventListener("alpine:init", () => {
    Alpine.data("editCell", () => ({
        show: false,
        editable: false,
        cell: {
            ["x-ref"]: "trigger",
            ["x-show"]() {
                return !this.show;
            },
            ["@click"]() {
                if (this.editable) {
                    this.show = true;
                    this.editable = false;
                } else {
                    this.show = false;
                    this.editable = true;
                }
                console.log(this.editable, this.show);
            },
            ["@click.outside"]() {
                this.editable = false;
            },
        },
        cancel: {
            ["@click"]() {
                this.show = false;
            },
            ["x-show"]() {
                return this.show;
            },
        },
        form: {
            ["x-show"]() {
                return this.show;
            },
            ["@submit"](e) {
                // alert(`Form submitted ${e.target}`);
                if (!confirm("Confirmer la modification")) {
                    e.preventDefault();
                }
                // console.log(e);
            },
        },
    }));
});

Alpine.start();
