const tab = [
    {
        image: "ehpad_motricite.jpg",
        texte: "conserver la motricité"
    },
    {
        image: "ehpad_illectronisme.jpg",
        texte: "lutter contre l'illectronisme"
    },
    {
        image: "ehpad_memoire.jpg",
        texte: "travailler la mémoire"
    },
    {
        image: "ehpad_sortie.jpg",
        texte: "sortir en groupe"
    },
    {
        image: "ehpad_plateau_repas.jpg",
        texte: "les plateaux repas"
    }
];

let i = 0;

function carrousel() {
    i = i % tab.length;
    const image = document.querySelector("#image > img");
    const span = document.querySelector("#image > span");
    const circles = document.querySelectorAll("#image > p > i");
    
    image.setAttribute("src", "<?= WEBROOT?>../img/" + tab[i].image);
    image.style.filter = "blur(4px)";
    
    setTimeout(() => {
        image.style.filter = "blur(0px)";
    }, 100);
    
    setTimeout(() => {
        image.style.filter = "blur(4px)";
    }, 4900);
    
    span.innerHTML = tab[i].texte;
    
    for (let j = 0; j < circles.length; j++) {
        if (i === j) {
            circles[j].className = "bi bi-circle-fill";
        } else {
            circles[j].className = "bi bi-circle";
        }
    }
    
    i++;
}

const interval = setInterval(carrousel, 5000);
