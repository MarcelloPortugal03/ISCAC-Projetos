/**
 * ISCAC Burguer - Scripts de Interatividade
 * Projeto Universitário
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log("ISCAC Burguer: Sistema de Interatividade Carregado.");

    // 1. FORMATAÇÃO AUTOMÁTICA DE PREÇOS
    // Garante que o utilizador não insira valores negativos nos formulários de Admin
    const camposPreco = document.querySelectorAll('input[type="number"]');
    camposPreco.forEach(campo => {
        campo.addEventListener('change', function() {
            if (this.value < 0) {
                alert("O valor não pode ser negativo. O sistema ajustou para 0.");
                this.value = 0;
            }
        });
    });

    // 2. EFEITO DE HOVER NOS CARDS DE PRODUTOS
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = "transform 0.3s ease";
        });
    });
});

/**
 * 3. FUNÇÃO DE CONFIRMAÇÃO GLOBAL
 * Usada nos botões de "Eliminar" para evitar acidentes.
 */
function confirmarAcao(event, mensagem) {
    if (!confirm(mensagem)) {
        event.preventDefault(); // Cancela a navegação/envio do formulário
        return false;
    }
    return true;
}

/**
 * 4. FEEDBACK AO ADICIONAR AO CARRINHO
 */
function feedbackCarrinho() {
    console.log("Produto enviado para a sessão do carrinho via PHP.");
}