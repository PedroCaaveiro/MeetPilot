(function (){

const tagsInput = document.querySelector('#tags__input');
const tagsDiv = document.querySelector('#tags');
const tagsInputHiden = document.querySelector('[name="tags"]');


let tags = [];

if (tagsInput) {
    tagsInput.addEventListener('keypress',guardarTags);

    function guardarTags(e){
        if (e.keyCode === 44) {

            if (e.target.value.trim() === '' || e.target.value < 1) {
                return
            }

            e.preventDefault();
            tags = [...tags,e.target.value.trim()];
            tagsInput.value = '';
           
            mostrarTags();

        }
           
    }
    function mostrarTags(){

        tagsDiv.textContent = '';
        tags.forEach(tag => {
            const etiqueta = document.createElement('LI');
            etiqueta.classList.add('formulario__tag');
            etiqueta.textContent = tag;
            etiqueta.ondblclick = eliminarTag;
            tagsDiv.appendChild(etiqueta);
        })
        actualizarInputHiden();
    }
function eliminarTag(e){
    e.target.remove();

    tags = tags.filter(tag => tag !== e.target.textContent );
    //console.log(tags);
    actualizarInputHiden();
    
}

    function actualizarInputHiden(){
tagsInputHiden.value = tags.toString();

    }
}

})()