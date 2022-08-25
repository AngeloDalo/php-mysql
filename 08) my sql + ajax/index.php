<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY SQL - AJAX</title>
</head>

<body>
    <form action="">
        <label for="email">nome</label>
        <input type="text" name="nome" id="nome" required>
        <label for="cognome">cognome</label>
        <input type="text" name="cognome" id="cognome" required>
        <label for="email">email</label>
        <input type="email" name="email" id="email" required>
        <button id="nuova-riga">INSERISCI PERSONA</button>
    </form>
    <div id="container">

    </div>

    <script>
        let persone;
        let tabellaContainer = document.querySelector('#container');
        let inserisciBtn = document.querySelector('#nuova-riga');
        inserisciBtn.addEventListener('click', inserisciPersona);

        generaTabella();

        function generaTabella() {
            fetch('./php/select.php', {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    persone = data;
                    let tabella = `
                    <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>NOME</td>
                                <td>COGNOME</td>
                                <td>EMAIL</td>
                            </tr>
                        </thead>
                        <tbody>
                            ${generaRighe(data)}
                        </tbody>
                    </table>`;
                    tabellaContainer.insertAdjacentHTML('beforeend', tabella);
                    let modificaBottoni = document.querySelectorAll('.modifica-persona');
                    let eliminaBottoni = document.querySelectorAll('.elimina-persona');
                    for (let i = 0; i < modificaBottoni.length; i++) {
                        modificaBottoni[i].addEventListener('click', modificaPersona);
                    }
                    for (let i = 0; i < eliminaBottoni.length; i++) {
                        eliminaBottoni[i].addEventListener('click', eliminaPersona);
                    }
                })
                .catch((error) => {
                    console.error('Errore: ', error)
                });
        }

        function generaRighe(persone) {
            let righe = '';
            persone.forEach(persona => {
                let riga = `
                    <tr>
                        <td>${persona.id}</td>
                        <td>${persona.nome}</td>
                        <td>${persona.cognome}</td>
                        <td>${persona.email}</td>
                        <td>
                            <button class="modifica-persona" data-val="${persona.id}">MODIFICA</button>
                            <button class="elimina-persona" data-val="${persona.id}">ELIMINA</button>
                        </td>
                    </tr>
                    `
                righe += riga;
            });
            return righe;
        }

        function inserisciPersona() {
            let nome = document.getElementById("nome").value;
            let cognome = document.getElementById("cognome").value;
            let email = document.getElementById("email").value;
            console.log(nome); 
            const formData = new FormData();
            formData.append('nome', nome);
            formData.append('cognome', cognome);
            formData.append('email', email);
            fetch('./php/insert.php', {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    aggiornaTabaella();
                })
                .catch((error) => {
                    console.error('Errore: ', error)
                });
        }

        function modificaPersona(e) {
            let id = e.target.getAttribute("data-val");
            let nome = "ciro"
            console.log("modifico persona: ", id);
            const formData = new FormData();
            formData.append('id', id);
            formData.append('nome', nome);
            fetch('./php/update.php', {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    aggiornaTabaella();
                })
                .catch((error) => {
                    console.error('Errore: ', error)
                });
        }

        function eliminaPersona(e) {
            let id = e.target.getAttribute("data-val");
            console.log("elimino persona: ", id);
            const formData = new FormData();
            formData.append('id', id);
            fetch('./php/delate.php', {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    aggiornaTabaella();
                })
                .catch((error) => {
                    console.error('Errore: ', error)
                });
        }

        function aggiornaTabaella() {
            let tabella = document.querySelector('table');
            tabellaContainer.removeChild(tabella);
            generaTabella();
        }
    </script>
</body>

</html>