class Post {
    option = ".post-option";

    constructor() {
        this.initDiv('Commentaire(s)')
        this.eventBtn()
        this.style()
    }
    initDiv(txtBtn) {
        const divElt = $("<div>");
        divElt.addClass(
            "d-flex flex-nowrap"
        );
        divElt.append(this.initBtn(txtBtn));
        $(this.option).prepend(divElt);
    }
    initBtn(value) {
        const btnElt = $("<button>");
        btnElt.addClass(
            "btn btn-link btn-sm"
        );
        btnElt.text(value);
          
        return btnElt;
    }
    eventBtn() {
        const btns = $("button", this.option);
        btns.each(function(i, btn) {
            const post = $(btn).parent().parent()
            $(this).on('click',() => {
                $(post[0].nextElementSibling).animate({
                    height: 'toggle'
                });
            })
        });
    }
    style() {
        const sectionElt = $("section");
        sectionElt.addClass(
            "jumbotron"
        );
        const divElt = $(this.option);
        divElt.addClass(
            "d-flex justify-content-between align-items-center flex-wrap"
        );
        const pElt = $("p:first", this.option);
        pElt.addClass(
            "btn-sm date font-italic"
        );
    }
}