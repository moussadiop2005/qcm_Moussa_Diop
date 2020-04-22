function afficheOnglet(lien) {
        var div2=lien.parentNode.parentNode.parentNode.parentNode
        var li=lien.parentNode
        var id=lien.getAttribute('href')
        if (li.classList.contains('active')){
            return false
        }
        div2.querySelector('.menu .active').classList.remove('active')
        li.classList.add('active')
        cont.querySelector('.content-onglet.active').classList.remove('active')
        cont.querySelector(id).classList.add('active')
    }


var menu=document.querySelectorAll('.menu a')
var contenu=document.querySelectorAll('.div2 .content-onglet')
for (var i = 0; i < menu.length; i++) {
    var cont=contenu[i].parentNode
    menu[i].addEventListener('click', function (e) {
        afficheOnglet(this)
    })
}
var hash=window.location.hash
var lien=document.querySelector('a[href="'+hash+'"]')
if (lien!=null&&!lien.parentNode.classList.contains('active')) {
    afficheOnglet(lien)
}
console.log(lien)



var form=document.getElementById('form-sign-admin')
var reg_prenom=/^[a-zA-Z]+$/
var reg_nom=/^[a-zA-Z]+$/
var reg_login=/^[a-zA-Z0-9]+$/
var prenom=document.getElementById('prenom')
var nom=document.getElementById('nom')
var login=document.getElementById('login')
var pwd=document.getElementById('pwd')
var confirme=document.getElementById('confirm')
var avatar=document.getElementById('avatar')
var img=avatar.files
function preview() {
    if (img.length>0) {
        var reader=new FileReader()
        reader.onload=function (e) {
            document.getElementById('photo-admin').setAttribute("src",e.target.result)
            console.log(e.target.result)
        }
        reader.readAsDataURL(img[0])

    }
}
form.addEventListener('submit',function (e) {
    if (reg_prenom.test(prenom.value)==false) {
        var error_prenom=document.getElementById('error-prenom')
        error_prenom.innerHTML="Ce champ doit etre rempli par de lettre"
        e.preventDefault()
    }
    if (reg_nom.test(nom.value)==false) {
        var error_nom=document.getElementById('error-nom')
        error_nom.innerHTML="Ce champ doit etre rempli par de lettre"
        e.preventDefault()
    }
    if (reg_login.test(login.value)==false) {
        var error_login=document.getElementById('error-login')
        error_login.innerHTML="Ce champ doit comporter des lettres ou des chiffre"
        e.preventDefault()
    }
    if (pwd.value.trim()=="") {
        var error_pwd=document.getElementById('error-pwd')
        error_pwd.innerHTML="Champ requis"
        e.preventDefault()
    }
    if (confirme.value.trim()==""||pwd.value!=confirme.value) {
        var error_confirme=document.getElementById('error-confirm')
        error_confirme.innerHTML="Mot de passe différent"
        e.preventDefault()
    }
    if (avatar.value=="") {
        var error_avatar=document.getElementById('error-avatar')
        error_avatar.innerHTML="Selectionnez un fichier"
        e.preventDefault()
    }
    
    
})
var table
var nbrPage=document.getElementById('nbr_page').value
function bouton_page(nbr_page) {
    var defilement=document.getElementById('boutonPage')
    defilement.innerHTML=''
    
    for (var i = 1; i <= nbr_page; i++) {
        if (i==1) {
            defilement.innerHTML +='<div class="page courant"><a href="#page'+i+'">'+i+'</a></div>'
        }else{
            defilement.innerHTML +='<div class="page"><a href="#page'+i+'">'+i+'</a></div>'
        }
    }
}
bouton_page(nbrPage)
function afficheListe(lien) {
    var boutonPage=lien.parentNode.parentNode
    var div=lien.parentNode
    var id=lien.getAttribute('href')
    if (div.classList.contains('courant')){
        return false
    }
    boutonPage.querySelector('.page.courant').classList.remove('courant')
    div.classList.add('courant')
    conte.querySelector('.contenu-page.affiche').classList.remove('affiche')
    conte.querySelector(id).classList.add('affiche')
}
var bouton=document.querySelectorAll('#liste_joueur a')
var pages=document.querySelectorAll('#liste_joueur .contenu-page')

for (var i = 0; i < bouton.length; i++) {
    var conte=pages[i].parentNode
    bouton[i].addEventListener('click', function (e) {
        afficheListe(this)
    })
}
var button=document.querySelector('#boutonPage a[href="'+hash+'"]')
if (button!=null&&!button.parentNode.classList.contains('courant')) {
    afficheListe(button)
}



