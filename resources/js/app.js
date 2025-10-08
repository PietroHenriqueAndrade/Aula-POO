document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('button[name="action"]');
    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            btn.disabled = true; // desativa botão temporariamente
            setTimeout(() => btn.disabled = false, 1000); // reativa depois de 1s
        });
    });
});
