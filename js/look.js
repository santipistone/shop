
function addElement(resp) {


    
    for (x of resp) {
        //DIV
        let div = document.createElement('div');
        let base = document.querySelector(".bd3");
        div.className = "square" ;
        base.appendChild(div);

        //TITLE
        let title = document.createElement("p");
        title.textContent = x.nome;
        title.id = 'text_h'
        div.appendChild(title);

        //LINK
        let link = document.createElement("a");
        link.href = "home.php?page=item&item="+x.codice;
        div.appendChild(link);

        //IMG
        let img = document.createElement("img");
        img.src = "upload_img/"+x.img;
        img.className = 'img1';
        link.appendChild(img);


        let br = document.createElement("br");
        div.appendChild(br);

        //DESC
        let desc = document.createElement("p");
        desc.textContent = x.desc;
        desc.classList.add("hidden");
        desc.id="text1";
        desc.addEventListener("click", removeText);
        div.appendChild(desc);
        

        let desc2 = document.createElement("p");
        desc2.textContent = "Clicca qui per maggiori info";
        desc2.id = "desc";
        desc2.addEventListener("click", getText);
        div.appendChild(desc2);

        
        let div1 = document.createElement('div');
        div1.className = "div1" ;
        div.appendChild(div1);
        
        //SHOP BUTTON
        let but1 = document.createElement("img");
        but1.id = "img4";
        but1.className = 'props';
        but1.src = 'img/shop.png';
        but1.dataset.indexNumber = x.codice;
        but1.addEventListener("click", addShop);
        div1.appendChild(but1);

    }
}

function getCont(resp) {
    return resp.json();
}


var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var x = urlParams.get('page');

if (x=== "1") var resp = fetch("cont/look.php?item=1").then(getCont).then(addElement);
else if (x=== "2") var resp = fetch("cont/look.php?item=2").then(getCont).then(addElement);
else if (x=== "3") var resp = fetch("cont/look.php?item=3").then(getCont).then(addElement);
else if (x=== "4") var resp = fetch("cont/look.php?item=4").then(getCont).then(addElement);
else    var resp = fetch("cont/look.php").then(getCont).then(addElement);


function getText(event) {
    event.currentTarget.classList.add("hidden");
    event.currentTarget.parentNode.querySelector("#text1").classList.remove("hidden");
}

function removeText(event) {
    event.currentTarget.classList.add("hidden");
    event.currentTarget.parentNode.querySelector("#desc").classList.remove("hidden");
}
