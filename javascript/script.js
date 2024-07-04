
  function funcao_dropdown() {
    document.getElementById("dropDown").classList.toggle("mostrar");
  }
  window.onclick = function (event) {
    if (!event.target.matches('.menu-inicial')) {
      var dropdowns = document.getElementsByClassName(".menu-inicial-dropdown");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('mostrar')); {
          openDropdown.classList.remove('mostrar');
        }
      }
    }
  }
function funcao_dropdown2() {
    document.getElementById("dropDown2").classList.toggle("mostrar");
  }
  window.onclick = function (event) {
    if (!event.target.matches('.menu-inicial')) {
      var dropdowns = document.getElementsByClassName(".menu-inicial-dropdown");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('mostrar')); {
          openDropdown.classList.remove('mostrar');
        }
      }
    }
  }

  function funcao_dropdown3() {
    document.getElementById("dropDown3").classList.toggle("mostrar");
  }
  window.onclick = function (event) {
    if (!event.target.matches('.menu-inicial')) {
      var dropdowns = document.getElementsByClassName(".menu-inicial-dropdown");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('mostrar')) {
          openDropdown.classList.remove('mostrar');
        }
      }
    }
  }

function funcao_dropdown_submenu() {
  document.getElementById("dropDown_submenu").classList.toggle("mostrar");
}
window.onclick = function (event) {
  if (!event.target.matches('.menu-inicial')) {
    var dropdowns = document.getElementsByClassName(".menu-inicial-dropdown");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('mostrar')) {
        openDropdown.classList.remove('mostrar');
      }
    }
  }
}