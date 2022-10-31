const btnAgregarProfesor=document.getElementById('btn_agregar_profesor'),
btnsCerrarForm=document.querySelectorAll('.btn_cerrar_modal'),
listaIconoVerMasTabla=document.querySelectorAll('.btn_ojo_ver_detalles_modal'),
listaElementosModal=document.querySelectorAll('.elemento_modal_tabla'),
listaBtnCerrarModalDetalles=document.querySelectorAll('.btn_cerrar_modal_detalles');
let arregloInfoModal=[];
btnsCerrarForm.forEach(boton=>{
    boton.addEventListener('click',(e)=>{
        document.getElementById('overlay').style.display='none';
    })
});
btnAgregarProfesor.addEventListener('click',()=>{
    overlay.style.display='flex';
});
listaIconoVerMasTabla.forEach(iconoVerMasTabla=>{
    iconoVerMasTabla.addEventListener('click',(e)=>{
        let numero_elementos=(e.currentTarget.parentNode.parentNode.childElementCount)-1;
        let elementoActualRecorrido=e.currentTarget.parentNode;
        // let objeto_datos_modal={};
        let i=9;
        while(numero_elementos>0){
            arregloInfoModal[i]=elementoActualRecorrido.previousElementSibling.textContent;
            elementoActualRecorrido=elementoActualRecorrido.previousElementSibling;
            numero_elementos--;
            console.log(arregloInfoModal[i]);
            i--;
        }
        console.log(arregloInfoModal);
        console.log(arregloInfoModal);
        let j=0;
        listaElementosModal.forEach(elemento=>{
            elemento.textContent=arregloInfoModal[j];
            if(elemento.classList.contains('edad')){
                elemento.textContent=`${arregloInfoModal[j]} años`;
            }
        j++;    
        document.getElementById('overlay_ver_detalles').style.display='flex';
    });
    });
});
// iconoVerMasTabla.addEventListener('click',()=>{
    
// });
listaBtnCerrarModalDetalles.forEach(btn=>{
    btn.addEventListener('click',()=>{
        document.getElementById('overlay_ver_detalles').style.display='none';
    })
});