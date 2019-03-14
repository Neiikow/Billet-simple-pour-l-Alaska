class Comment {
    comments = ".comments";
    option = ".comment-option";

    constructor() {
        this.initForm();
        this.style()
    }

    initForm() {
        const formElt = $("<form>");
        formElt.addClass(
            "row"
        );
        formElt.append(this.initDiv("input", "button"));
        formElt.append(this.initDiv("textarea"));
        $(this.comments).prepend(formElt);
    }
    initDiv(type1, type2) {
        const divElt = $("<div>");
        if (type1 === "input") {
            divElt.addClass(
                "col-md-2 text-center pl-1 pr-1 form-group"
            );
            divElt.append(this.initInput());
        } else {
            divElt.addClass(
                "col form-group"
            );
            divElt.append(this.initTextarea());
        }
        if (type2) {
            divElt.append(this.initBtn("Envoyer"));
        }

        return divElt;
    }
    initInput() {
        const inputElt = $("<input>");
        inputElt.attr({
            required : true,
            type : "text",
            placeholder : "Pseudo"
        });
        inputElt.addClass(
            "form-control mt-3"
        );

        return inputElt;
    }
    initTextarea() {
        const textareaElt = $("<textarea>");
        textareaElt.attr({
            required : true,
            placeholder : "Commentaire"
        });
        textareaElt.addClass(
            "form-control mt-3"
        );

        return textareaElt;
    }
    initBtn(value) {
        const btnElt = $("<button>");
        btnElt.attr({
            type : "submit"
        });
        btnElt.addClass(
            "btn btn-primary mt-3"
        );
        btnElt.text(value);

        return btnElt;
    }
    style() {
        const divElt = $(this.comments);
        divElt.addClass(
            "container table-responsive"
        );
        const tableElt = $("table");
        tableElt.addClass(
            "table table-striped table-bordered"
        );
        const trElt = $("tr");
        trElt.addClass(
            "row"
        );
        let tdElt = $("td:nth-child(1)", this.comments);
        tdElt.addClass(
            "col-md-2 text-center pl-1 pr-1"
        );
        tdElt = $("td:nth-child(2)", this.comments);
        tdElt.addClass(
            "col"
        );
        const pElt = $("p:nth-child(2)", this.comments);
        pElt.addClass(
            "date"
        );
    }
}