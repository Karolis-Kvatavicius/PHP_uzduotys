document.querySelectorAll('input[name="tipas"]').forEach(element => {
    element.addEventListener("change", e => {
        if (e.target.value == "vandens_gyvis" || e.target.value == "zemes_gyvis") {
            document.querySelector("#mesedis_zoledis").style = "display: block;";
            rodytiSavybes();
            document.querySelector("#savybes").style = "display: none;";
        } else {
            document.querySelector("#mesedis_zoledis").style = "display: none;";
            document.querySelector("#savybes").style = "display: block;";
        }
    });
});

function rodytiSavybes() {
    document.querySelectorAll('input[name="mesedis_zoledis"]').forEach(element => {
        element.addEventListener("change", e => {
            if (e.target.value == 'mesedis') {
                document.querySelector("#savybes").style = "display: block;";
                document.querySelector("#dantu_astrumas").style = "display: block;";
            } else {
                document.querySelector("#savybes").style = "display: block;";
                document.querySelector("#dantu_astrumas").style = "display: none;";
            }
        });
    });
}