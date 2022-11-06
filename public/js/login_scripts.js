const labelsErrorFormLogin=document.querySelectorAll('.cerrar_label_error_login');
labelsErrorFormLogin.forEach(elemento=>{
    elemento.addEventListener('click',(e)=>{
        if(e.currentTarget.classList.contains('email_mistake'))
            document.getElementById('cont_mensaje_error_login_email').style.display='none';
        else if(e.currentTarget.classList.contains('password_mistake'))
            document.getElementById('cont_mensaje_error_login_password').style.display='none';
        else if(e.currentTarget.classList.contains('both_mistake'))
            document.getElementById('cont_mensaje_error_login_both').style.display='none';
        
        
    });
});