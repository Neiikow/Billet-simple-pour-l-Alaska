$(document).ready(function() {
    const btns = $(".comment-btn");
    // btns.each(function(i, btn) {
    //     const post = $(btn).parent().parent()
    //     $(this).on('click',() => {
    //         $(post[0].nextElementSibling).animate({
    //             height: 'toggle'
    //         });
    //     })
    // });
});

//Gestion de la position du scroll
try {
    const x = location.href.split("scroll=")[1]
    document.body.scrollTop=x+"px";
    window.scrollTo(0,x);
} catch (ex) {}

//Gestion de la position du footer
const d = $('html').height()
const f = $('footer').height()
const w = window.innerHeight
if ((d+f)>w) {
    $('footer').removeClass("fixed-bottom");
}

//Gestion de la position du dashboard navigation
const hDash = w-56;
$('.dashboard').css({
    minHeight: hDash
})

