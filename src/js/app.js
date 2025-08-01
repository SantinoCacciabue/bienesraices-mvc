document.addEventListener("DOMContentLoaded",function(){
    eventListeners();
    darkMode();
    // borraMensaje();
})


function eventListeners(){
    const mobileMenu = document.querySelector(".mobile-menu");
    mobileMenu.addEventListener("click",navResponsive);

    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input=>input.addEventListener('click',mostrarContacto));
}

function navResponsive(){
    const nav = document.querySelector(".nav")
    nav.classList.toggle("mostrar")
}

function darkMode(){
    const preferDarkMode = window.matchMedia("(prefers-color-scheme: dark)")
    if(preferDarkMode.matches){
        document.body.classList.add("dark-mode");
    }
    else{
        document.body.classList.remove("dark-mode");
    }

    preferDarkMode.addEventListener("change",function(){
        if(preferDarkMode.matches){
            document.body.classList.add("dark-mode");
        }
        else{
            document.body.classList.remove("dark-mode");
        }
    })
    const boton = document.querySelector(".dark-mode-btn");
    boton.addEventListener("click",function(){
        document.body.classList.toggle("dark-mode");
    })
}



// function borraMensaje() {
//     const mensajeConfirm = document.querySelector('.alerta');
//     if(mensajeConfirm !== null){
//         setTimeout(function() {
//             const padre = mensajeConfirm.parentElement;
//             padre.removeChild(mensajeConfirm);
//         }, 4500);
//     }else {
//         console.log("No hay mensaje de error");
//     }
// }

function mostrarContacto(e){
    const contactoDiv = document.querySelector("#contacto");
    if(e.target.value==="Telefono"){
        contactoDiv.innerHTML = `
        <div class="fade-in">
            <input type="tel" name="contacto[tel]" id="tel" placeholder="Tu teléfono">

            <label for="fecha">Fecha</label>
            <input type="date" name="contacto[date]" id="fecha">

            <label for="hora">Hora</label>
            <input type="time" name="contacto[time]" id="hora" min="09:00" max="20:00">
        </div>
        `;
    }
    else{
        contactoDiv.innerHTML = `
        <div class="fade-in">
            <input type="email" name="contacto[email]" id="email" placeholder="Tu correo electrónico">
        </div>
        `;
    }

}

