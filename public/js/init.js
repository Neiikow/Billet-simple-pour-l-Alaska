$(document).ready(function() {
    const btns = $(".comment-btn");
    btns.each(function(i, btn) {
        const post = $(btn).parent().parent()
        $(this).on('click',() => {
            $(post[0].nextElementSibling).animate({
                height: 'toggle'
            });
        })
    });
    // const report = $("button[name='report']");
    // report.on('click',(e) => {
    //     e.preventDefault();
    // })
});