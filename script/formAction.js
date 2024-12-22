document.addEventListener('DOMContentLoaded', getInformations)
    function getInformations(){ 
        params = new Array()
        paramRet = new Array()
        let url = window.location.href;
        comecoParametro = url.indexOf('?');
        
        if (comecoParametro != -1) {
            let paramString = url.substring(comecoParametro + 1);
            paramString = decodeURIComponent(paramString);
            var params = paramString.split("&")

            for (var i = 0; i < params.length; i++) {
                var pairArray = params[i].split("=");   
                if (pairArray.length == 2) {
                    paramRet[pairArray[0]] = pairArray[1]
                }
            }

        const dia = (paramRet['dia']);
        const mes = (paramRet['mes']);
        const ano = (paramRet['ano']);

        const idade = (dia, mes, ano) => {
            const diaAtual = new Date();
            if (mes > (diaAtual.getMonth() + 1)) {
                return diaAtual.getFullYear() - 1 - ano;
            } else if (mes === (diaAtual.getMonth() + 1) && dia > diaAtual.getDate()) {
                return diaAtual.getFullYear() - 1 - ano;
            } else {
                return  diaAtual.getFullYear() - ano;
            }
        }

        const nome = () => {
            let fullName = paramRet['nome'];
            fullName = fullName.split('+');
            let newName = "";
            for (let i = 0; i < fullName.length; i++){
                newName += fullName[i] + " "
                console.log(fullName[i])
            }
            return newName;
        }

        let email = paramRet["email"];
        
        // document.getElementById("user-info").innerHTML = idade(dia, mes, ano);
        document.getElementById("nome-user").innerHTML += nome();
        document.getElementById("age-user").innerHTML += idade(dia, mes, ano);
        document.getElementById("sex-user").innerHTML += paramRet["sexo"];
        document.getElementById("email-user").innerHTML += paramRet["email"];

        console.log(paramRet)

        return paramRet
        } 
    }
