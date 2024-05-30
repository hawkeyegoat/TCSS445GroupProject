function transformBox(type, action) {
    let element = document.getElementById(`${type}Box`);
    element.classList.add('active');
    element.innerHTML = `<p>${type.charAt(0).toUpperCase() + type.slice(1)} Portal</p>`; // Keeps the title

    let formHtml = '';
    let backButtonHtml = `<button class="btn btn-back" onclick="resetBox('${type}')">Back</button>`;
    if (type === 'patient') {
        if (action === 'signup') {
            formHtml = `
                <form class="form-inner">
                    <input type="email" class="form-control mb-2" placeholder="Email">
                    <input type="password" class="form-control mb-2" placeholder="Password">
                    <textarea class="form-control mb-2" placeholder="Symptoms"></textarea>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>`;
        } else { // Login
            // formHtml = `
            //     <form class="form-inner">
            //         <input type="email" class="form-control mb-2" placeholder="Email">
            //         <input type="password" class="form-control mb-2" placeholder="Password">
            //         <button type="submit" class="btn btn-primary">Login</button>
            //     </form>`;
                let form = document.createElement("form");
                form.action = "login.php";
                form.method = "POST";
                form.id = "loginForm";
                let email = document.createElement("input");
                email.type = "email";
                email.className = "form-control mb-2";
                email.placeholder = "Email";
                let password = document.createElement("input");
                password.type = "password";
                password.className = "form-control mb-2";
                password.placeholder = "Password";
                let login = document.createElement("button");
                login.type = "submit";
                login.class = "btn btn-primary";
                login.textContent = "Login";
                form.appendChild(email);
                form.appendChild(password);
                form.appendChild(login);
                element.append(form);
        }
    } else if (type === 'doctor') {
        formHtml = `
            <form class="form-inner">
                <input type="email" class="form-control mb-2" placeholder="Email">
                <input type="password" class="form-control mb-2" placeholder="Password">
                <button type="submit" class="btn btn-primary">Login</button>
                <p class="admin-info" style="font-size: 0.8rem;">If you do not have a login, please contact your hospital admin.</p>
            </form>
        `;
    }

    element.innerHTML += backButtonHtml; // Add the form and back button to the box
}

function resetBox(type) {
    let element = document.getElementById(`${type}Box`);
    element.classList.remove('active');
    element.innerHTML = `<p>${type.charAt(0).toUpperCase() + type.slice(1)} Portal</p>`;
    if (type === 'patient') {
        element.innerHTML += `
            <button class="btn btn-light btn-sm" onclick="transformBox('patient', 'signup')">Sign Up</button>
            <button class="btn btn-light btn-sm" onclick="transformBox('patient', 'login')">Login</button>
        `;
    } else if (type === 'doctor') {
        element.innerHTML += `
            <button class="btn btn-light btn-sm" onclick="transformBox('doctor', 'login')">Login</button>
        `;
    }
}
