function ndrroFaqen() {
    window.location.href = './php/create_new_account.php';
}

var images = ['./images/loginfoto.jpg',
'./images/loginfoto.jpg',
'./images/1.jpg',
'./images/2.jpg',
'./images/3.jpg',
'./images/loginfoto.jpg'
];

function displayImage(x) {
    document.getElementById("img").style.backgroundImage = "url(" + images[x] + ")";
    document.getElementById("img").style.padding = "90px";
    document.getElementById("img").style.borderRadius = "10px";
}

function startTimer() {
    var x = 0;
    displayImage(x);
    setInterval(function() {
        x = x + 1 >= images.length ? 0 : x + 1;
        displayImage(x);
    }, 3000);
}