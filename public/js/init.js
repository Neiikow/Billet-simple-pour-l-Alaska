//Configuration TinyMce
tinymce.init({
    selector:'.tiny',
    menubar: false,
    setup: function(e) {
        e.on('keyup', ()=> {
            alertLength(tinymce.get('text').getContent());
        });
    },
    statusbar: false,
    plugins : 'autoresize advlist autolink link lists',
    toolbar1: 'undo redo | cut copy paste blockquote | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | fontselect fontsizeselect forecolor backcolor bold italic underline strikethrough',
});
//Gestion de la position du scroll après un click
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
$('#dashboard').css({
    minHeight: w
})

//Gestion de la longueure d'un message
let content = $('.post-content')
content.keyup(()=>{
    alertLength(content.val())
})
function alertLength(content) {
    const submit = $('.post-submit')
    const alert = $(".content-length")
    if (content.length > 10000) {
        submit.attr({
            disabled: true
        });
        alert.addClass("p-2 mt-1 bg-danger text-white");
        alert.html("Texte trop long")
        
    } else {
        submit.removeAttr("disabled")
        alert.removeClass("p-2 mt-1 bg-danger text-white");
        alert.empty()
    }
}