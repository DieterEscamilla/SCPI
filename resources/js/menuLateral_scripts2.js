const menuBurguer=document.getElementById('img_menu_burguer'),
menuLateral=document.getElementById('menu_lateral'),
txtMenuLateral=document.getElementsByClassName('titulo_menu_lat_js'),
body=document.getElementById('body'),
btnLoginLogout=document.getElementById('button_login_logout');
let flagMenuLateral=false;
function esconderMenuLateral(){
    Array.from(txtMenuLateral).forEach(elemento=>{
        elemento.style.display='none';
    });
    menuLateral.style.width='70px';
    body.style.marginLeft='70px';
    btnLoginLogout.style.marginRight='80px';
    flagMenuLateral=false;
}
function mostrarMenuLateral(){
    Array.from(txtMenuLateral).forEach(elemento=>{
        elemento.style.display='block';
    });
    menuLateral.style.width='250px';
    body.style.marginLeft='250px';
    btnLoginLogout.style.marginRight='250px';
    flagMenuLateral=true;
}
menuBurguer.addEventListener('click',()=>{
    if(flagMenuLateral==false){
        mostrarMenuLateral();
    }else{ 

        esconderMenuLateral();
    } 
});
