function redirectToPage(page) {
    switch(page) {
        case 'negro':
            window.location.href = 'negro.html';
            break;
        case 'verde':
            window.location.href = 'verde.html';
            break;
        case 'votaciones':
            window.location.href = 'votaciones.html';
            break;
        default:
            console.log('Página no encontrada');
    }
} 