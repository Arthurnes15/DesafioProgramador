const select = document.querySelector('#select-type');
const divCpf = document.querySelector('#cpf');
const inputCpf = document.querySelector('#inputCpf');
const inputCnpj = document.querySelector('#inputCnpj')
const divCnpj = document.querySelector('#cnpj');
const buttonChange = document.querySelector('.btn.btn-danger');

divCnpj.style.display = "none";
//Função onclick para quando o valor do select for igual a físico o usuário inserir o cpf da pessoa física e caso for jurídica, inserir o cnpj: 
buttonChange.addEventListener('click', () => {
    if (select.value === "Físico") {
        divCpf.style.display = "block";
        inputCpf.setAttribute('required', '')
        divCnpj.style.display = "none";
    } else if (select.value === "Jurídico") {
        divCnpj.style.display = "block";
        inputCnpj.setAttribute('required', "")
        divCpf.style.display = "none";
    }
})