<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
</head>
<body>
<div class="container mt-2">
        <div class="row" id="all">
            
        </div>
    </div>
<script>
        let requestURL = 'ezquiz.json';
        let request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                dataReportStatus(JSON.parse(request.responseText));
            }
        };
        request.open("GET", requestURL, true);
        request.send();

        function dataReportStatus(data) {
           let create = document.createElement("div");
           create.setAttribute("class","row mb-4");
           for (let i = 0; i < data.tracks.items.length; i++) {
               let card = document.createElement("div");
               card.setAttribute("class","card p-2 col-sm-3 border-1 mr-5 mb-5");
               let img = document.createElement("img");
                img.setAttribute("src", data.tracks.items[i].album.images[0].url);
                img.setAttribute("class", "card-img-top w-100");
                card.appendChild(img);
                card.appendChild(document.createElement("br"));
                let detail = document.createElement("h6");
                detail.setAttribute("class","mt-0 mb-0");
                detail.appendChild(document.createTextNode(data.tracks.items[i].album.name));
                card.appendChild(detail);
                card.appendChild(document.createTextNode("Artists: "+data.tracks.items[i].album.artists[0].name));
                card.appendChild(document.createElement("br"));
                card.appendChild(document.createTextNode("release date: "+data.tracks.items[i].album.release_date));
                card.appendChild(document.createElement("br"));
                card.appendChild(document.createTextNode("Avaliable: "+data.tracks.items[i].album.available_markets.length+" countries"));
                create.appendChild(card);
                document.getElementById("all").appendChild(create);

            }
        }
    </script>
</body>
</html>