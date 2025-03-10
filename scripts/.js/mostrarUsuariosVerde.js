document.addEventListener('DOMContentLoaded', function() {
	loadUsers();
});

function loadUsers() {
    fetch('http://westeros/scripts/.php/getUsersVerde.php')
	.then(response => response.json())
    .then(data => {
        const usersContainer = document.querySelector('.user-comments');
        usersContainer.innerHTML = ''; 

        data.forEach(user => {
            const commentDiv = document.createElement('div');
            commentDiv.classList.add('comment');
            commentDiv.innerHTML = `
                <p><strong>${user.nombreUsuario}</strong> <span class="user-email">${user.email}</span></p>
                <p>${user.texto}</p>
            `;
            usersContainer.appendChild(commentDiv);
        });
    })
    .catch(error => {
        console.error('Error al cargar los usuarios:', error);
    });
}