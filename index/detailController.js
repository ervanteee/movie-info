var URL = 'http://192.168.183.40/MovieProject/';
console.log(URL+'connection/detailMovie.php');
const urlParams = new URLSearchParams(window.location.search);
const id_movie = urlParams.get('id_movie')
console.log(URL+'connection/detailMovie.php?id_movie='+id_movie)

$.ajax({
    url: URL+'api/detailMovie.php?id_movie='+id_movie,
    type: 'GET',
    header:'Access-Control-Allow-Origin : *',

    success: function (response) {
        var data = JSON.parse(response);
        console.log(data)
        var urlImg = 'https://image.tmdb.org/t/p/w500/';
        var Language= 'Language :  ';
        var Release= 'Release &nbsp;&nbsp;&nbsp;: ';
        var Review = 'Rating &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ';
        var Sypnosis = '<br>Synopsis &nbsp;&nbsp;:    <br> ';
        $("#myText").append('<input type="text" name="idMovie" class="form-control" value='+data.id+' style="display:none;">');

        var body =' <div class=" mb-2 d-flex mt-5">'+
            '<img src="'+urlImg+data.poster_path+'" alt="Avatar" class="rounded-5 detail-img-resize">'+
            '<div class="ms-3">'+
                '<h1><b>'+data.original_title+'</b></h2>'+
                '<h5 class="text-detail-size">'+Language+data.original_language+'</h5>'+
                '<h5 class="text-detail-size">'+Release+data.release_date+'</h5>'+
                '<h5 class="text-detail-size">'+Review+data.vote_average+'</h5>'+
                '<h5 class="text-detail-size">'+Sypnosis+'</h5>'+
                '<h5 class="text-detail-size">'+data.overview+'</h5>'+
            '</div>'+
            '</div>'

            $("#cardMovie").append(body);
    },
});

$.ajax({
    url: URL+'api/listCommentById.php?id_movie='+id_movie,
    type: 'GET',
    header:'Access-Control-Allow-Origin : *',

    success: function (response) {
        var data = JSON.parse(response);
        console.log(data.data)
        var datas = data.data;

        $.each(datas, function (i, datas) {
            var body = '<div class="comment-form-user p-3">'+
                '<div class="comment-padding rounded-5">'+
                    '<p class="text-danger">'+datas.username.charAt(0).toUpperCase() + datas.username.slice(1)+'<br></p>'+
                    '<p>'+datas.comment+'<br></p>'+
                '</div>'+
        '</div>';
            console.log(body)
            
            $("#commentsList").append(body);

        });

    },
});


// $.ajax({
//     url: URL + 'session/requestMovie.php',
//     type: 'GET',
//     headers: { 'Access-Control-Allow-Origin': '*' },
//     success: function (response) {
//         var data = JSON.parse(response);
//         console.log(data.data);

//         var body = '<div class="comment-user">' +
//             '<h1 class="ms-5"><b>Request Movie</b></h1>' +
//             '<form action="requestMovie.php" method="post">' +
//             '<div class="mb-3  ms-5 me-5" id="myText">' +
//             '<input type="text" name="request"  class="form-control comment-form" required>' +
//             '</div>' +
//             '<button type="submit" class="d-none">SUBMIT</button>' +
//             '</form>' +
//             '</div>';

//         $("#requestMovie").append(body);
//     },
//     error: function (jqXHR, textStatus, errorThrown) {
//         console.error(`AJAX Request Failed: ${textStatus}, ${errorThrown}`);
//     },
// });

