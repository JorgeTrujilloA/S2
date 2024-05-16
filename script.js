document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    document.getElementById('usernameError').textContent = '';
    document.getElementById('passwordError').textContent = '';

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    let isValid = true;

    if (username.trim() === '') {
        document.getElementById('usernameError').textContent = 'El usuario es obligatorio.';
        document.getElementById('usernameError').style.display = 'block';
        isValid = false;
    }

    // Validar campo de contraseña
    if (password.trim() === '') {
        document.getElementById('passwordError').textContent = 'La contraseña es obligatoria.';
        document.getElementById('passwordError').style.display = 'block';
        isValid = false;
    } else if (password.length < 6) {
        document.getElementById('passwordError').textContent = 'La contraseña debe tener al menos 6 caracteres.';
        document.getElementById('passwordError').style.display = 'block';
        isValid = false;
    }

    // Si el formulario es válido, puedes enviarlo o realizar la acción que necesites
    if (isValid) {
        this.submit();
    }else{
        alert('Usuario o contraseña incorrectos');
    }
});