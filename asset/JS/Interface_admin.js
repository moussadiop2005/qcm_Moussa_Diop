var menu=document.querySelectorAll('.menu a')
var contenu=document.querySelectorAll('.div2 .content-onglet')
for (var i = 0; i < menu.length; i++) {
    var cont=contenu[i].parentNode
    menu[i].addEventListener('click', function (e) {
        var a=this
        var div2=this.parentNode.parentNode.parentNode.parentNode
        var li=this.parentNode
        var id=this.getAttribute('href')
        if (li.classList.contains('active')){
            return false
        }
        div2.querySelector('.menu .active').classList.remove('active')
        li.classList.add('active')
        cont.querySelector('.content-onglet.active').classList.remove('active')
        cont.querySelector(id).classList.add('active')
    })
    
        
}