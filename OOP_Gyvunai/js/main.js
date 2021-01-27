document.querySelectorAll('input[name="tipas"]').forEach(element => {
    element.addEventListener("change", e => {
        if (e.target.value == "vandens_gyvis" || e.target.value == "zemes_gyvis") {
            document.querySelector("#mesedis_zoledis").style = "display: block;";
            document.querySelector("#pavadinimas").style = "display: none;";
            rodytiSavybes(e.target.value);
            document.querySelector("#savybes").style = "display: none;";
        } else {
            document.querySelector("#mesedis_zoledis").style = "display: none;";
            document.querySelector("#savybes").style = "display: block;";
            document.querySelector("#pavadinimas").style = "display: none;";
        }
    });
});

function rodytiSavybes(target_value) {
    document.querySelectorAll('input[name="mesedis_zoledis"]').forEach(element => {
        element.addEventListener("change", e => {
            if (e.target.value == 'mesedis') {
                document.querySelector("#pavadinimas").style = "display: block;";
                createSelect("mesedziai", target_value);
                document.querySelector("#savybes").style = "display: block;";
                document.querySelector("#dantu_astrumas").style = "display: block;";
            } else {
                document.querySelector("#pavadinimas").style = "display: block;";
                createSelect("zoledziai", target_value);
                document.querySelector("#savybes").style = "display: block;";
                document.querySelector("#dantu_astrumas").style = "display: none;";
            }
        });
    });
}

function createSelect(animalsType, vandens_zemes) {
    document.querySelector("#pavadinimas").innerHTML = "";
    if (animalsType == "mesedziai") {
        gyvunai = [{
            "pavadinimas": "Ryklys",
            "tipas": "vandens_gyvis"
        }, {
            "pavadinimas": "Liutas",
            "tipas": "zemes_gyvis"
        }]
    } else {
        gyvunai = [{
            "pavadinimas": "Kiskis",
            "tipas": "zemes_gyvis"
        }, {
            "pavadinimas": "Tunas",
            "tipas": "vandens_gyvis"
        }];
    }

    gyvunai.forEach(gyvunas => {
        if (gyvunas.tipas == vandens_zemes) {
            input = document.createElement("input");
            input.setAttribute("type", "radio");
            input.setAttribute("id", gyvunas.pavadinimas);
            input.setAttribute("name", "gyvuno_pavadinimas");
            input.setAttribute("value", gyvunas.pavadinimas);

            label = document.createElement("label");
            label.setAttribute("for", gyvunas.pavadinimas);
            label.innerText = gyvunas.pavadinimas;

            br = document.createElement("br");

            document.querySelector("#pavadinimas").append(input, label, br);
        }
    })

}