const poleOdkazuSmazani = document.querySelectorAll(".odkaz-smazani");
//musime vsechny odkazy proiterovat, pripojit k nim posluchac a vyplnou vyhcozi chovani clicku
for (let odkaz of poleOdkazuSmazani) {
    odkaz.addEventListener("click", (e) => {
        e.preventDefault();

        //vraci boolean podle volby uzivatele
        const volbaBoolean = confirm("Opravdu chcete stranku smazat?");

        if (volbaBoolean) {
            //smazeme stranku
            const cilOdkazu = odkaz.getAttribute("href");
            //odkazeme ho pryc na mazaci url
            window.location.href = cilOdkazu;
        }
    });
}

//sortable
$(".seznam-stranek-ul").sortable({
    update: () => {
        const poleId = $(".seznam-stranek-ul").sortable("toArray");
        console.log(poleId);

        $.ajax({
            type: "POST",
            url: "./admin.php",
            data: {
                razeniSubmit: true,
                poleSerazenychId: poleId
            },
            dataType: "json",
            success: (response) => {
                console.log(response);
            }
        });

    }
});