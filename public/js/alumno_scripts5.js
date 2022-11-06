const btnAgregarAlumno=document.getElementById('btn_agregar_alumno'),
btnsCerrarForm=document.querySelectorAll('.btn_cerrar'),
listaIconoVerMasTabla=document.querySelectorAll('.btn_ojo_ver_detalles_modal'),
listaElementosModal=document.querySelectorAll('.elemento_modal_tabla'),
listaBtnCerrarModalDetalles=document.querySelectorAll('.btn_cerrar_modal_detalles'),
listaSmallsErroresForm=document.querySelectorAll('.leyenda_error_form'),
btnAgregarFinal=document.getElementById('agregar_btn');
let arregloInfoModal=[];
btnsCerrarForm.forEach(boton=>{
    boton.addEventListener('click',(e)=>{
        document.getElementById('overlay').style.display='none';
    })
});
btnAgregarAlumno.addEventListener('click',()=>{
    overlay.style.display='flex';
});
listaIconoVerMasTabla.forEach(iconoVerMasTabla=>{
    iconoVerMasTabla.addEventListener('click',(e)=>{
        let numeroElementos=(e.currentTarget.parentNode.parentNode.childElementCount)-1;
        let elementoActualRecorrido=e.currentTarget.parentNode;
        let i=6;
        while(numeroElementos>0){
            arregloInfoModal[i]=elementoActualRecorrido.previousElementSibling.textContent;
            elementoActualRecorrido=elementoActualRecorrido.previousElementSibling;
            numeroElementos--;
            i--;
        }
        let j=0;
        listaElementosModal.forEach(elemento=>{
            elemento.textContent=arregloInfoModal[j];
            if(elemento.classList.contains('edad')){
                elemento.textContent=`${arregloInfoModal[j]} años`;
            }
        j++;    
        
    });
    document.getElementById('overlay_ver_detalles').style.display='flex';
    console.log(arregloInfoModal);
    });
});

listaBtnCerrarModalDetalles.forEach(btn=>{
    btn.addEventListener('click',()=>{
        document.getElementById('overlay_ver_detalles').style.display='none';
    })
});

    listaSmallsErroresForm.forEach(elemento=>{
        if(elemento.innerHTML!=''){
            document.getElementById('overlay').style.display='flex'; 
        }
    });





/*Código para editar alumno*/




/*Código para editar alumno*/