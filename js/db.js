let CONTENT = {};

function loadDb(resp) {
    let x=0;
    while (resp[x] != undefined) {
        CONTENT[resp[x].codice] = resp[x];
        x++;
    }
}


function getCont(resp) {
    return resp.json();
}

var resp = fetch("cont/db.php").then(getCont).then(loadDb);

