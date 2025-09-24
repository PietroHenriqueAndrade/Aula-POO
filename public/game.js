    // Adicione o personagem na tela, nas coordenadas x=400 e y=300
    if (this.textures.exists('player')) {
        player = this.physics.add.sprite(400, 300, 'player');
        console.log('Sprite do player criado com sucesso');
    } else {
        console.error('Textura do player não encontrada');
        player = this.add.rectangle(400, 300, 64, 64, 0xff0000);  // Fallback: quadrado vermelho
        this.physics.add.existing(player);
    }
    // Crie os controles para as setas do teclado
    cursors = this.input.keyboard.createCursorKeys();
}
function update() {
    // Limpe a velocidade do personagem antes de cada movimento
    player.setVelocity(0);
    // Lógica para mover o personagem
    const speed = 200;
    if (cursors.left.isDown) {
        player.setVelocityX(-speed);
    } else if (cursors.right.isDown) {
        player.setVelocityX(speed);
    }
    if (cursors.up.isDown) {
        player.setVelocityY(-speed);
    } else if (cursors.down.isDown) {
        player.setVelocityY(speed);
    }
}