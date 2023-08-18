nextBtnFirst.addEventListener("click", function(event){
  event.preventDefault();
  // Agregar aquí la lógica para verificar si los campos de la primera etapa están completos
  if (verificarCamposEtapa1()) {
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  } else {
    alert("Complete los campos antes de avanzar.");
  }
});

nextBtnSec.addEventListener("click", function(event){
  event.preventDefault();
  // Agregar aquí la lógica para verificar si los campos de la segunda etapa están completos
  if (verificarCamposEtapa2()) {
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  } else {
    alert("Complete los campos antes de avanzar.");
  }
});

nextBtnThird.addEventListener("click", function(event){
  event.preventDefault();
  // Agregar aquí la lógica para verificar si los campos de la tercera etapa están completos
  if (verificarCamposEtapa3()) {
    slidePage.style.marginLeft = "-75%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  } else {
    alert("Complete los campos antes de avanzar.");
  }
});


