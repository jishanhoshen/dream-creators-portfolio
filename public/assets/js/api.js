/* form submittion*/
// $(function () {
//     $('form').on('submit', function (e) {
//         e.preventDefault();
//     });
// });

let searchParams = new URLSearchParams(window.location.search)
var quantity = '';
if(searchParams.has('id')){
    let id = searchParams.get('id');
    quantity = '&&postid='+id;
}
/*ajax*/
var apikey = "12345";
var apiurl = "https://dream-creators.com/api.php?apikey=" + apikey + quantity;
var data = "hello world";
$.ajax({
    type: 'get',
    url: apiurl,
    data: data,
    success: function (data) {
        console.log(data);

        for (let i = 0; i < data.data.post.length; i++) {
            const element = data.data.post[i];
            for (let j = 0; j < data.data.person.length; j++) {
                const person = data.data.person[j];
                if(element.postedby == person.id){
                    var userid = person.id;
                    var username = person.name;
                }
            }
            mypost(
                i,
                element.postcover,
                element.posttitle,
                username,
                element.postat,
                element.postbody
            );
        }
    }
});

function mypost(postid,cover, title, by, time, post) {
    var img = $("<img/>");
    img.attr('src','assets/img/'+cover);
    var p = $("<p/>");
    p.html('posted by <b>'+by+ '</b> at <b>'+time+'</b>');
    var h1 = $("<h1></h1>").html(title);
    var postbody = $('<div></div>').html(post);
    postbody.addClass('postbody');
    var a = $('<a></a>').html('read more..');
    a.attr('href','singlepost.html?id='+postid);
    var singlepost = $("<div></div>");
    singlepost.append(h1,img,p,postbody,a);
    singlepost.addClass('singlepost');
    $('.postarea').append(singlepost);
}