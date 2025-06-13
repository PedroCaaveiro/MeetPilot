document.addEventListener('DOMContentLoaded', function () {
  const tagsInput = document.querySelector('#tags__input');
  const tagsDiv = document.querySelector('#tags');
  const tagsInputHidden = document.querySelector('[name="tags"]');

  let tags = [];

  if (tagsInputHidden && tagsInputHidden.value !== '') {
    tags = tagsInputHidden.value.split(',');
    mostrarTags();
  }

  if (tagsInput) {
    tagsInput.addEventListener('keypress', guardarTags);
  }

  function guardarTags(e) {
    if (e.keyCode === 44) {
      if (e.target.value.trim().length === 0) return;

      e.preventDefault();
      tags = [...tags, e.target.value.trim()];
      tagsInput.value = '';

      mostrarTags();
    }
  }

  function mostrarTags() {
    tagsDiv.textContent = '';
    tags.forEach(tag => {
      const etiqueta = document.createElement('LI');
      etiqueta.classList.add('formulario__tag');
      etiqueta.textContent = tag;
      etiqueta.ondblclick = eliminarTag;
      tagsDiv.appendChild(etiqueta);
    });
    actualizarInputHidden();
  }

  function eliminarTag(e) {
    tags = tags.filter(tag => tag !== e.target.textContent);
    mostrarTags();
  }

  function actualizarInputHidden() {
    tagsInputHidden.value = tags.join(',');
  }
});
