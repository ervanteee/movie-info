// var URL = 'http://localhost/MovieProject/';
let baseUrl = "http://192.168.183.40/MovieProject/";


function visitPage(idMovie){
    window.location="http://192.168.183.40/MovieProject/index/detail-movie-exec.php?id_movie="+idMovie;
    localStorage.setItem("idMovie", idMovie)
}

$.ajax({
    url: baseUrl+'api/populerApi.php',
    type: 'GET',
    header:'Access-Control-Allow-Origin : *',

    success: function (response) {
        var data = JSON.parse(response);
        console.log(data)
        var urlImg = 'https://image.tmdb.org/t/p/w500/';
       
        $.each(data.slice(0,8), function (i, data) {

            var body =' <div class="card mb-2 col-3">'+
            '<img src="'+urlImg+data.poster_path+'" alt="Avatar" class="img-fluid ">'+
            '<div class="container">'+
            '<h5 class="text-center m-2"><b>'+data.original_title+'</h5> ' +
            '<button class="btn btn-success w-100 m-2" onclick=visitPage('+data.id+')>More</button> '+
            '</div>'+
            '</div>'

            $("#cardPopuler").append(body);

        });
     
    },
});


$.ajax({
    url: baseUrl+'api/populerApi.php',
    type: 'GET',
    header:'Access-Control-Allow-Origin : *',

    success: function (response) {
        var data = JSON.parse(response);
        console.log(data)
        var urlImg = 'https://image.tmdb.org/t/p/w500/';
       
        $.each(data.slice(0,20), function (i, data) {

            var body =' <div class="card mb-2 col-3">'+
            '<img src="'+urlImg+data.poster_path+'" alt="Avatar" class="img-fluid ">'+
            '<div class="container">'+
            '<h5 class="text-center m-2"><b>'+data.original_title+'</h5> ' +
            '<button class="btn btn-success w-100 m-2" onclick=visitPage('+data.id+')>More</button> '+
            '</div>'+
            '</div>'

            $("#cardPopulerPage").append(body);

        });
     
    },
});


$.ajax({
    url: baseUrl+'api/topRated.php',
    type: 'GET',
    header:'Access-Control-Allow-Origin : *',

    success: function (response) {
        var data = JSON.parse(response);
        console.log(data)
        var urlImg = 'https://image.tmdb.org/t/p/w500/';
       
        $.each(data.slice(0,8), function (i, data) {

            var body =' <div class="card mb-2 col-3">'+
            '<img src="'+urlImg+data.poster_path+'" alt="Avatar" class="img-fluid ">'+
            '<div class="container">'+
            '<h5 class="text-center m-2"><b>'+data.original_title+'</h5> ' +
            '<button class="btn btn-success w-100 m-2" onclick=visitPage('+data.id+')>More</button> '+
            '</div>'+
            '</div>'

            $("#cardTopRated").append(body);

        });
     
    },
});


$.ajax({
    url: baseUrl+'api/populerApi.php',
    type: 'GET',
    header:'Access-Control-Allow-Origin : *',

    success: function (response) {
        var data = JSON.parse(response);
        console.log(data)
        var urlImg = 'https://image.tmdb.org/t/p/w500/';
       
        $.each(data.slice(0,20), function (i, data) {

            var body =' <div class="card mb-2 col-3">'+
            '<img src="'+urlImg+data.poster_path+'" alt="Avatar" class="img-fluid ">'+
            '<div class="container">'+
            '<h5 class="text-center m-2"><b>'+data.original_title+'</h5> ' +
            '<button class="btn btn-success w-100 m-2" onclick=visitPage('+data.id+')>More</button> '+
            '</div>'+
            '</div>'

            $("#cardTopRatedPage").append(body);

        });
     
    },
});



$.ajax({
    url: baseUrl+'api/upcomingApi.php',
    type: 'GET',
    header:'Access-Control-Allow-Origin : *',

    success: function (response) {
        var data = JSON.parse(response);
        console.log(data)
        var urlImg = 'https://image.tmdb.org/t/p/w500/';
       
        $.each(data.slice(8,16), function (i, data) {

            var body =' <div class="card mb-2 col-3">'+
            '<img src="'+urlImg+data.poster_path+'" alt="Avatar" class="img-fluid ">'+
            '<div class="container">'+
            '<h5 class="text-center m-2"><b>'+data.original_title+'</h5> ' +
            '<button class="btn btn-success w-100 m-2" onclick=visitPage('+data.id+')>More</button> '+
            '</div>'+
            '</div>'

            $("#cardUpcoming").append(body);

        });
     
    },
});


$.ajax({
    url: baseUrl+'api/upcomingApi.php',
    type: 'GET',
    header:'Access-Control-Allow-Origin : *',

    success: function (response) {
        var data = JSON.parse(response);
        console.log(data)
        var urlImg = 'https://image.tmdb.org/t/p/w500/';
       
        $.each(data.slice(0,20), function (i, data) {

            var body =' <div class="card mb-2 col-3">'+
            '<img src="'+urlImg+data.poster_path+'" alt="Avatar" class="img-fluid ">'+
            '<div class="container">'+
            '<h5 class="text-center m-2"><b>'+data.original_title+'</h5> ' +
            '<button class="btn btn-success w-100 m-2" onclick=visitPage('+data.id+')>More</button> '+
            '</div>'+
            '</div>'

            $("#cardUpcomingPage").append(body);

        });
     
    },
});


