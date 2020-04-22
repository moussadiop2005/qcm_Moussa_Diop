var menu=document.querySelectorAll('.menu a')
var contenu=document.querySelectorAll('.affichage .content-onglet')
for (var i = 0; i < menu.length; i++) {
    var cont=contenu[i].parentNode
    menu[i].addEventListener('click', function (e) {
        var a=this
        var score=this.parentNode.parentNode
        var div=this.parentNode
        var id=this.getAttribute('href')
        if (div.classList.contains('active')){
            return false
        }
        console.log(score)
        score.querySelector('.menu .active').classList.remove('active')
        div.classList.add('active')
        cont.querySelector('.content-onglet.active').classList.remove('active')
        cont.querySelector(id).classList.add('active')
    })
}
