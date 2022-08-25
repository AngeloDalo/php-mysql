<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid d-flex p-5">
        <form action="" class="d-flex flex-column align-items-center">
            <label for="nome">nome</label>
            <input type="text" name="nome" id="nome" required>
            <label for="cognome">cognome</label>
            <input type="text" name="cognome" id="cognome" required>
            <label for="email">email</label>
            <input type="email" name="email" id="email" required>
            <button id="nuova-riga" class="mt-3 btn btn-primary">INSERISCI PERSONA</button>
        </form>

        <div class="container" style="max-width: 50%">
            <div class="text-center mb-4">
                <h2>PHP MySql Live Search</h2>
            </div>
            <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search...">
            <div id="searchresult">

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        let liveSearch = document.querySelector('#live_search');
        liveSearch.addEventListener('keyup', inserisciTabella);
        let tabellaContainer = document.querySelector('#searchresult');
        let inserisciBtn = document.querySelector('#nuova-riga');
        inserisciBtn.addEventListener('click', inserisciPersona);


        generaTabella();

        function generaTabella() {
            fetch('select.php', {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log("ciao");
                    persone = data;
                    let tabella = `
                    <table class="table table-success table-striped">
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
                    </table>
                    `;
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

        function inserisciTabella() {
            let input = document.getElementById("live_search").value;
            const formData = new FormData();
            formData.append('input', input);
            fetch('livesearch.php', {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    persone = data;
                    let tabella = `
                    <table class="table table-success table-striped">
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
                    </table>
                    `;
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
            aggiornaTabaella();
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
                            <button class="elimina-persona btn btn-danger" data-val="${persona.id}">ELIMINA</button>
                        </td>
                        <td class="">        
                            <form action="" class="">
                                <button class="modifica-persona btn btn-primary" data-val="${persona.id}">MODIFICA</button>
                                <input type="text" name="email" id="email-${persona.id}" required>
                                <label for="email">email</label>
                            </form>
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
            fetch('insert.php', {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    inserisciTabella();
                })
                .catch((error) => {
                    console.error('Errore: ', error)
                });
        }

        function modificaPersona(e) {
            let id = e.target.getAttribute("data-val");
            let emailid = "email-"+id;
            let emailnew = document.getElementById(emailid).value; 
            let email = emailnew;
            console.log("modifico persona: ", id);
            const formData = new FormData();
            formData.append('id', id);
            formData.append('email', email);
            fetch('update.php', {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    inserisciTabella();
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
            fetch('delate.php', {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    inserisciTabella();
                })
                .catch((error) => {
                    console.error('Errore: ', error)
                });
        }

        function aggiornaTabaella() {
            let tabella = document.querySelector('table');
            tabellaContainer.removeChild(tabella);
        }
    </script>
</body>

</html>