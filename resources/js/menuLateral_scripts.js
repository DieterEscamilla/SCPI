const menuBurguer=document.getElementById('img_menu_burguer'),
menuLateral=document.getElementById('menu_lateral');
const txtMenuLateral=document.querySelectorAll('#titulo_menu_lat_js');
console.log(txtMenuLateral);
let flagMenuLateral=false;
menuBurguer.addEventListener('click',()=>{
    if(flagMenuLateral==false){
        menuLateral.style.display='flex';
        flagMenuLateral=true;
    }else{ 
        menuLateral.style.display='none';
        flagMenuLateral=false;
    } 
});
