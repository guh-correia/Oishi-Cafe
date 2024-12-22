document.addEventListener('DOMContentLoaded', function () {
        let nome = document.getElementById('nome');
        let email = document.getElementById('email');
        let form = document.getElementById('form');
        let sexo = document.getElementById('sexo');

        form.addEventListener('submit', validacaoform);

        function validacaoform(event)  {
            const verificacaoNome = /^[A-Za-zÀ-ú\s]+$/;
            const verificacaoEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            console.log(sexo.value)
            
            if (!verificacaoNome.test(nome.value)) {
                event.preventDefault();
                alert('Insira um nome válido (apenas letras e espaços).');
                }
            else if (!verificacaoEmail.test(email.value)) {
                alert('Insira um email válido.');
                event.preventDefault();
            } else if (sexo.value == "none") {
                alert('Insira um sexo válido.');
                event.preventDefault();
            }
            return true
        }
    });
