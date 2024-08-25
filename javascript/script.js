
function funcao_dropdown() {
    document.getElementById("dropDown").classList.toggle("mostrar");
}
window.onclick = function (event) {
    if (!event.target.matches('.menu-inicial')) {
        var dropdowns = document.getElementsByClassName(".menu-inicial-dropdown");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('mostrar'))
                ;
            {
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
            if (openDropdown.classList.contains('mostrar'))
                ;
            {
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

function openNav() {
    if (window.innerWidth <= 600) {
        document.getElementById("sidebar").style.width = "100%";
    } else {
        document.getElementById("sidebar").style.width = "250px";
    }
    document.getElementById("main").style.marginLeft = window.innerWidth > 600 ? "250px" : "0";
    document.querySelector(".openbtn").style.display = "none";
}

function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.querySelector(".openbtn").style.display = "block";
}

function toggleUserInfo() {
    var userInfo = document.getElementById('user-info');
    if (userInfo.style.display === 'block') {
        userInfo.style.display = 'none';
    } else {
        userInfo.style.display = 'block';
    }
}
window.addEventListener('scroll', function () {
    var userInfo = document.getElementById('user-info');
    if (userInfo.style.display === 'block') {
        userInfo.style.display = 'none';
    }
});

document.addEventListener('click', function (event) {
    var userInfo = document.getElementById('user-info');
    var userIcon = document.querySelector('.user-icon-container');
    if (!userInfo.contains(event.target) && !userIcon.contains(event.target)) {
        userInfo.style.display = 'none';
    }
});

function alterarSenha() {
    window.location.href = 'alterar_senha_usuario.php';
}

function deleteDocument(id) {
    if (confirm('Tem certeza que deseja deletar este arquivo?')) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_file.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    var row = document.getElementById("document-" + id);
                    if (row) {
                        row.remove();
                    }
                } else {
                    alert(response.message);
                }
            }
        };
        xhr.send("id=" + id);
    }
}