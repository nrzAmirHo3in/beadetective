$(document).ready(function () {

    loadBoard();

    $.ajax({
        method: "POST",
        url: "./php/getNote.php",
        success: (res) => {
            $("#notes").val(res);
        }
    });

    function openNotepad() {
        if ($("#notebook").css("display") == "none")
            $("#notebook").css("display", "block")
        else
            $("#notebook").css("display", "none")
    }

    $("#note").click(openNotepad);
    $("#noteMain").click(openNotepad);

    $("#hint").click(function () {

        $.ajax({
            type: "post",
            url: "./php/getHintCount.php",
            success: function (response) {
                if (response == "no_coins") {
                    alert("سکه ای برای خرید راهنما ندارید");
                    return;
                }
                fetchData().then((json) => {
                    let hintCount = Number(response);
                    var html = "";
                    if (hintCount > 0) {
                        for (let x = 0; x < hintCount; x++) {
                            html += `<p>${json.hints[x]}</p>`;
                        }
                        document.getElementById("hints").innerHTML = html;
                    }
                });
            }
        });

        if ($("#hintPage").css("display") == "none")
            $("#hintPage").css("display", "flex")
        else
            $("#hintPage").css("display", "none")
    });


    fetchData().then((json) => {
        $("#background").css("background-image", "url(../documents/" + json.Document_background_dir + ")");
    });

    // gotoPage Functions ############################################

    function gotoMainPage() {
        $("#submit").hide();
        localStorage.removeItem("endResult");
        fetchData().then((json) => {
            $("#background").css("background-image", "url(../documents/" + json.Document_background_dir + ")");
        });

        $(".Buttons").hide();
        $("input").hide();

        $("#laptopClickHandle").show();
        $("#phoneClickHandle").show();
        $("#hint").show();
        $("#exit").show();
        $("#Suspects").show();
        $("#noteMain").show();
        loadBoard();
    }

    function loadBoard() {
        $.ajax({
            type: "post",
            url: "./php/getSuspects.php",
            success: function (response) {
                if (response == "")
                    return
                var html = "";
                let sus = JSON.parse(response);
                fetchData().then((json) => {
                    let suspectsImgUrls = json.suspects;
                    sus.forEach((suspectId, i) => {
                        let suspectImgPhoto = suspectsImgUrls[suspectId];
                        html += `<div><img src="documents/${suspectImgPhoto}" alt="" class="${suspectId}"></div>`;
                        if (i == sus.length - 1)
                            $("#Suspects").html(html);
                    });
                });
            }
        });
    }

    function gotoThisPcPage() {
        fetchData().then((json) => {
            $("#background").css("background-image", "url(../documents/" + json.documents.background_dir + ")");
        });

        $(".Buttons").hide();
        $("input").hide();

        $("#CloseClickHandle").show();
        $(".docsBtns a").show();
        $(".docsBtns").show();
    }

    function gotoLaptopPage() {
        fetchData().then((json) => {
            $("#background").css("background-image", "url(../documents/" + json.laptop.background_dir + ")");
        });

        $(".Buttons").hide();
        $("input").hide();
        $("#browserImg").hide();
        localStorage.removeItem("images");

        $("#ShutDownClickHandle").show();
        $("#MyCamputerClickHandle").show();
        $("#ExplorerClickHandle").show();
        $("#PaintClickHandle").show();
    }

    function gotoTelephonePage() {
        fetchData().then((json) => {
            $("#background").css("background-image", "url(../documents/" + json.telephone.background_dir + ")");
        });

        $(".Buttons").hide();
        $("input").hide();

        $("#closeTelephone").show();

        for (let y = 0; y < 10; y++) {
            $("#phone" + y).show();
        }

        $("#phoneRing").show();
        $("#phoneRemove").show();
    }

    function gotoQuerySystemPage() {
        fetchData().then((json) => {
            $("#background").css("background-image", "url(../documents/" + json.query_system.background_dir + ")");
        });

        $(".Buttons").hide();
        $("input#searchBoxQuerySystem").show();

        $("#CloseClickHandle").show();
        $("#SearchQuerySystemClickHandle").show();
    }

    function gotoBrowserPage() {
        fetchData().then((json) => {
            $("#background").css("background-image", "url(../documents/" + json.browser.background_dir + ")");
        });

        $(".Buttons").hide();
        $("input").hide();

        $("#CloseClickHandle").show();
        $("#searchBoxBrowser").show();
        $("#SearchBrowserClickHandle").show();
    }

    // This is begining of Click Handles #######################################################################

    $("#laptopClickHandle").click(function (e) {
        e.preventDefault();
        gotoLaptopPage();
    });

    $("#ShutDownClickHandle").click(function (e) {
        e.preventDefault();
        gotoMainPage();
    });

    $("#phoneClickHandle").click(function (e) {
        e.preventDefault();
        gotoTelephonePage();
    });

    $("#MyCamputerClickHandle").click(function (e) {
        e.preventDefault();
        gotoThisPcPage();
    });

    $("#ExplorerClickHandle").click(function (e) {
        e.preventDefault();
        gotoBrowserPage();
    });

    $("#PaintClickHandle").click(function (e) {
        e.preventDefault();
        gotoQuerySystemPage();
    });

    $("#CloseClickHandle").click(function (e) {
        e.preventDefault();
        gotoLaptopPage();
    });

    $("#BrowserUrlClickHandle").click(function (e) {
        e.preventDefault();
        gotoLaptopPage();
    });

    $("#SearchBrowserClickHandle").click(function (e) {
        e.preventDefault();
        $("#previousPhoto").hide();
        $("#nextPhoto").hide();
        $(".inputsUandP").hide();
        let url = $("#searchBoxBrowser").val();
        url = url.toLowerCase();
        var found = false;
        fetchData().then((json) => {
            json.browser.urls.forEach((element, i) => {
                if (element.url == url) {
                    found = true;
                    if (element.accounts != undefined) {
                        let a = json.Document_background_dir.split("/");
                        $("#browserImg").show();
                        $("#browserImg").css("background-image", "url(../documents/" + a[0] + "/laptop/browser/domains/" + url + ".jpg)");
                        $(`#password${i}`).show();
                        $(`#username${i}`).show();
                        $(`#${i}Login`).show();
                    } else {
                        $("#browserImg").show();
                        $("#nextPhoto").css("display", "flex");
                        $("#previousPhoto").css("display", "flex");
                        localStorage.setItem("images", element.images);
                        $("#browserImg").css("background-image", "url(../documents/" + element.images[0] + ")");
                    }
                    return;
                }
            });

            if (found != true) {
                $("#browserImg").show();
                $("#browserImg").css("background-image", "url(../documents/0/laptop/browser/404/404.jpg)");
            }
        });
    });

    $("#SearchQuerySystemClickHandle").click(function (e) {
        e.preventDefault();
        let id = $("#searchBoxQuerySystem").val().replace(/\s/g, '').toUpperCase();
        fetchData().then((json) => {
            json.query_system.suspects.forEach(element => {
                let inputValue = element.id.replace(/\s/g, '').toUpperCase();
                if (inputValue == id) {
                    $("#addSuspect").css("display", "block");
                    ShowPhoto(element.histories_photo_dir);
                    localStorage.setItem("suspect", element.suspect_id);
                }
            });
        });
    });

    fetchData().then((json) => {
        json.documents.queries.forEach(element => {
            $(`#Folder${element.suspect_id}ClickHandle`).click(function (e) {
                let images = "";
                element.query_photos.forEach((photoUrl) => {
                    images += ","
                    images += photoUrl;
                });
                localStorage.setItem("images", images);
                $("#imageQuerySystem").attr("src", "documents/" + element.query_photos[0])
                if (element.query_photos.length > 1) {
                    $("#nextPhoto").css("display", "flex");
                    $("#previousPhoto").css("display", "flex");
                }
                $("#querySystemPhoto").css("display", "flex");
                $("#addSuspect").show();
                localStorage.setItem("suspect", element.suspect_id);
            });
        });
    });

    fetchData().then((json) => {
        json.documents.other.forEach((element, i) => {
            $(`#OtherDoc${i}ClickHandle`).click(function (e) {
                let images = "";
                json.documents.other[i].forEach((photoUrl) => {
                    images += ","
                    images += photoUrl;
                });
                localStorage.setItem("images", images);
                $("#imageQuerySystem").attr("src", "documents/" + json.documents.other[i][0])
                if (json.documents.other[i].length > 1) {
                    $("#nextPhoto").css("display", "flex");
                    $("#previousPhoto").css("display", "flex");
                }
                $("#querySystemPhoto").css("display", "flex");
            });
        });
    });

    fetchData().then((json) => {
        json.browser.urls.forEach((element, i) => {
            $(`#${i}Login`).click(function (e) {
                for (let j = 0; j < json.browser.urls[i].accounts.length; j++) { // index found. Now loop in accounts of instagram
                    const element = json.browser.urls[i].accounts[j];
                    // console.log(element.username); // Log username of all accounts
                    // check if username and password are correct
                    if ($(`#username${i}`).val().toLowerCase() == element.username && $(`#password${i}`).val() == element.pass) {
                        $("#nextPhoto").css("display", "flex");
                        $("#previousPhoto").css("display", "flex");
                        localStorage.setItem("images", element.images);
                        $("#browserImg").css("background-image", "url(../documents/" + element.images[0] + ")");
                        $(`#password${i}`).hide();
                        $(`#username${i}`).hide();
                        $(`#${i}Login`).hide();
                    }
                }
            });
        });
    });

    let imageCounter = 0;

    $("#nextPhoto").click(function (e) {
        e.preventDefault();
        let images = localStorage.getItem("images").split(",");
        images = images.filter(function (value) {
            return value.trim() !== '';
        });
        imageCounter++;
        if (imageCounter == images.length)
            imageCounter = 0;
        $("#browserImg").css("background-image", "url(../documents/" + images[imageCounter] + ")");
        $("#imageQuerySystem").attr("src", "documents/" + images[imageCounter])
    });

    $("#previousPhoto").click(function (e) {
        e.preventDefault();
        let images = localStorage.getItem("images").split(",");
        images = images.filter(function (value) {
            return value.trim() !== '';
        });
        imageCounter--;
        if (imageCounter == -1)
            imageCounter = images.length - 1;
        $("#browserImg").css("background-image", "url(../documents/" + images[imageCounter] + ")");
        $("#imageQuerySystem").attr("src", "documents/" + images[imageCounter])
    });

    // Other on click functios #######################################################################

    $(document).on("click", "#closeQuerySystemPhotoBtn", function (e) {
        localStorage.removeItem("images");
        e.preventDefault();
        $("#querySystemPhoto").hide();
        $("#addSuspect").hide();
        localStorage.removeItem("suspect");
        $("#previousPhoto").hide();
        $("#nextPhoto").hide();
    });

    var audio;

    $("#closeTelephone").click(function (e) {
        e.preventDefault();
        $("#numbers").html("");
        if (audio != undefined)
            audio.pause();
        gotoMainPage();
    });

    for (let y = 0; y < 10; y++) {
        $("#phone" + y).click(function (e) {
            e.preventDefault();
            document.getElementById("numbers").innerHTML += y;
        });
    }

    $("#phoneRing").click(function (e) {
        e.preventDefault();
        fetchData().then((json) => { // Get Data
            for (let index = 0; index < json.telephone.phone_numbers.length; index++) {
                const element = json.telephone.phone_numbers[index];
                if (element.number == $("#numbers").html()) {
                    audio = new Audio("../documents/" + element.voice_dir);
                    audio.play();
                }
            }
        });
    });

    $("#Suspects").on("click", "div", function (e) {
        e.preventDefault();
        $("#Suspects div").removeClass("checked");
        $(this).addClass("checked");
        localStorage.setItem("endResult", $(this).find("img").attr("class"));
        $("#submit").show();
    });

    function ShowPhoto(url) {
        $("#querySystemPhoto").css("display", "flex");
        $("#imageQuerySystem").attr("src", "./documents/" + url);
    }

    function getCount(parent, getChildrensChildren) {
        var relevantChildren = 0;
        var children = parent.childNodes.length;
        for (var i = 0; i < children; i++) {
            if (parent.childNodes[i].nodeType != 3) {
                if (getChildrensChildren)
                    relevantChildren += getCount(parent.childNodes[i], true);
                relevantChildren++;
            }
        }
        return relevantChildren;
    }

    $("#buyHint").click(function (e) {
        e.preventDefault();
        fetchData().then((json) => {
            let allHints = json.hints.length;
            let gotHints = getCount(document.getElementById("hints"), false)
            if (gotHints == allHints) {
                alert("راهنمایی دیگه ای نداری");
                return;
            }
            if (confirm("آیا از خرید راهنمایی اطمینان دارید؟")) {
                $.ajax({
                    type: "post",
                    url: "./php/buyHint.php",
                    success: function (response) {
                        if (response == "no_coins") {
                            alert("موجودی سکه شما برای خرید راهنمایی کافی نمی باشد.");
                            return;
                        }
                        let hintCount = Number(response);
                        var html = "";
                        if (hintCount > 0) {
                            for (let x = 0; x < hintCount; x++) {
                                html += `<p>${json.hints[x]}</p>`;
                            }
                            document.getElementById("hints").innerHTML = html;
                        }
                    }
                });
            }
        });
    });

    $("#addSuspect").click(function (e) {
        e.preventDefault();
        $("#addSuspect").hide();
        let suspect = localStorage.getItem("suspect");
        $.ajax({
            type: "post",
            url: "./php/addSuspect.php",
            data: {
                "suspect": suspect
            }
        });
    });

    $("#submit").click(function (e) {
        e.preventDefault();
        if (confirm("آیا از انتخاب خود اطمینان دارید؟ \n با انتخاب متهم، پرونده برای شما بسته خواهد شد.")) {
            // End project
            fetchData().then((json) => {
                ShowPhoto(json.answer_photo);
                $(".Buttons").hide();
                $("input").hide();
                $("#browserImg").hide();
                $("#note").hide();
                $("#closeQuerySystemPhotoBtn").attr("id", "EndGame");
                if (json.answer_id == localStorage.getItem("endResult")) {
                    alert("تبریک میگویم شما کاراگاه موفقی بودید");
                    localStorage.setItem("an", "true");
                } else {
                    alert("به امید موفقیت در پرونده های بعدی شما");
                    localStorage.setItem("an", "false");
                }
            });
        }
    });

    $(document).on("click", "#EndGame", function (e) {
        e.preventDefault();
        // Close Document
        $.ajax({
            type: "post",
            url: "./php/closeDocument.php",
            data: {
                "answer": localStorage.getItem("an")
            },
            success: function () {
                // Goto main page
                localStorage.clear();
                location.replace("/Panel");
            }
        });
    });

    $("#exit").click(function () {
        var notes = $("#notes").val();
        $.ajax({
            method: "POST",
            url: "./php/saveNote.php",
            data: {
                note: notes
            }
        });
        localStorage.clear();
        location.replace("/Panel");
    });

    $("#hintPage #close").click(function (e) {
        e.preventDefault();
        $("#hintPage").css("display", "none");
    });

    $("#notebook #close").click(function (e) {
        e.preventDefault();
        $("#notebook").css("display", "none")
    });

    $("#phoneRemove").click(function (e) {
        e.preventDefault();
        let num = $("#numbers").html();
        num = num.slice(0, -1);
        $("#numbers").html(num);
    });
});
