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
                campo.remove();
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
            if(campo.value.includes('script')){
                this.erro404(campo,'caracter inválido')
                valida = false;
            }
        }
        if(!this.validaImagem()) valida = false;
    
        return valida;
    }

    erro404(campo,msg){
        let div = document.createElement('h5')
        div.innerHTML = msg;
        div.classList.add('erro404')
        campo.insertAdjacentElement('afterend',div)
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

