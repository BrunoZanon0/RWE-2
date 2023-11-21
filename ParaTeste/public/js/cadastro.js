class ValidaFomulario{
    constructor(){
        this.formulario = document.querySelector('.formulario');

        this.clicando()
    }

    clicando(){
        this.formulario.addEventListener('submit',e=>{
            e.preventDefault();

            for(let campo of this.formulario.querySelectorAll('.erro404')){
                campo.style.border = '2px solid green';
            }

            let validou = this.validando()
            if(validou){
                this.formulario.submit();
            }
        })
    }

    validando(){
        let valida = true;
        for(let campo of this.formulario.querySelectorAll('.validando')){
            if(!campo.value){
                campo.style.border = '2px solid red'
                valida = false;
            }else{
                campo.style.border = '2px solid green';
            }
        }
        if(!this.validaImagem()) valida = false;
        if(!this.senha()) valida = false;
    
        return valida;
    }

    senha(){
        let valida = true;
        let senha1 = document.querySelector('.senha1')
        let senha2 = document.querySelector('.senha2')

        if(senha1.value != senha2.value){
            senha1.style.border = '2px solid red'
            senha2.style.border = '2px solid red'
            valida = false;
        }else{
            senha1.style.border = '2px solid green'
            senha2.style.border = '2px solid green'
        }

        return valida;
    }

    validaImagem(){
        let valida = true;
        let inputImagem = document.getElementById('imagem');
    
        // Verifica se algum arquivo foi selecionado
        if (inputImagem.files.length > 0) {
            let imagem = inputImagem.files[0];
            
            // Verifica se o arquivo é uma imagem
            if (!imagem.type.startsWith('image/')) {
                inputImagem.value = ''; // Limpa o input
                valida = false;
            }
    
            // Verifica se o tamanho do arquivo é menor que 2 MB
            if (imagem.size > 2 * 1024 * 1024) {
                inputImagem.value = ''; // Limpa o input
                valida = false;
            }
        }
        return valida;
    }
}



const novoformulario = new ValidaFomulario;

validarForm();

function validarForm() {
    var inputImagem = document.getElementById('imagem');
    
    // Verifica se algum arquivo foi selecionado
    if (inputImagem.files.length > 0) {
        var imagem = inputImagem.files[0];
        
        // Verifica se o arquivo é uma imagem
        if (!imagem.type.startsWith('image/')) {
            console.log('O arquivo selecionado não é uma imagem.');
            inputImagem.value = ''; // Limpa o input
            return false;
        }

        // Verifica se o tamanho do arquivo é menor que 2 MB
        if (imagem.size > 2 * 1024 * 1024) {
            console.log('O arquivo é maior que 2 MB.');
            inputImagem.value = ''; // Limpa o input
            return false;
        }
    }

    return true; // Envie o formulário se todas as verificações passarem
}