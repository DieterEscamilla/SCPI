const listaBtnMostrarEditarAlumno=document.querySelectorAll('.btn_lapiz_actualizar_modal'),
    listaBtnCerrarModalEditarAlumno=document.querySelectorAll('.cerrar_modal_edit'),
    listaInputsModalEditarAlumno=document.querySelectorAll('.input_editar_elemento');
    let arregloInfoModalEdit=[];
    let arregloNombreSeparado=[];
    listaBtnMostrarEditarAlumno.forEach(elemento=>{
        elemento.addEventListener('click',(e)=>{
            let numeroElementosEdit=(e.currentTarget.parentNode.parentNode.childElementCount)-1;
            let elementoActualRecorridoEdit=e.currentTarget.parentNode;
            let i=6;
            while(numeroElementosEdit>0){ 
                arregloInfoModalEdit[i]=elementoActualRecorridoEdit.previousElementSibling.textContent;
                elementoActualRecorridoEdit=elementoActualRecorridoEdit.previousElementSibling;
                if(elementoActualRecorridoEdit.classList.contains('nombre_completo')){
                    arregloNombreSeparado=arregloInfoModalEdit[i].split(' ');
                    arregloInfoModalEdit.shift();
                }
                if(elementoActualRecorridoEdit.classList.contains('edad_calculada')){
                    arregloInfoModalEdit[i]=elementoActualRecorridoEdit.previousElementSibling.textContent;
                    arregloInfoModalEdit.splice(i, 1);

                }
                numeroElementosEdit--;
                i--;
            }
            let j=0;
            let k=0;
            console.log(arregloNombreSeparado);
            console.log(arregloInfoModalEdit);
            listaInputsModalEditarAlumno.forEach(elemento=>{
                if(k<=3){
                    elemento.value=arregloNombreSeparado[k];
                    k++;
                }
                if(k>3){
                    elemento.value=arregloInfoModalEdit[j];
                    j++; 
                }
            }); 
            document.getElementById('overlay_editar_alumno').style.display='flex';
        });
    });
    listaBtnCerrarModalEditarAlumno.forEach(elemento=>{
        elemento.addEventListener('click',()=>{
            document.getElementById('overlay_editar_alumno').style.display='none';
        });
        
        
    });