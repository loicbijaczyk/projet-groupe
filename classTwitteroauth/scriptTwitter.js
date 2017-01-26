$(document).ready(function() {
    // $( "#messageError" ).hide();
    // $( "#date" ).hide();
     var form = $('#formFollowers');

    form.on('submit', function () {
        $('#TableFollowers').empty();
        // $('#top').empty();
        // $('#evolution').empty();
        // $('#total').empty();
        // $('.totalDiv').empty();
        //
        // $('#total').css("background-color","#ececec");
        // $('#ventilation').css("background-color","#ececec");
        // $('#evolution').css("background-color","#ececec");
        // $('#top').css("background-color","#ececec");


        // var search = $('#search').val();
        // //console.log(search);
        // //if(pseudo == '' || mail == '') {
        // if (search == '') {
        //     $( "#messageError" ).show();
        // } else {
        //     $('#messageError').hide();

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            // data: 'nameFollower=' + nameFollower + '&countFollower=' + countFollower,
            dataType: 'json',
            error: function (request, status, error) {
                alert(request + '  /  ' + status + '  /  ' + error);
            },
            success: function (json) {
                console.log(json);
                var nameResult = json.name;
                var description = json.description;
                console.log(nameResult);
                console.log(description);
                var i = 0;
                while (i < json.name.length) {
                    // var name = "<input class='followers' type='checkbox' name='followers' checked>" + json[i] + "</input> <br>";
                    var name = '<tr>';
                    name += "<td><input checked type='checkbox' name='followers[]' value='" + nameResult[i] + "'>" + nameResult[i] + "</input> </td>";
                    name += "<td>" + description[i] + " </td>";

                    $('#TableFollowers').append(name);
                    //console.log(json[i]);
                    i++;

                }
                $('#formDM').on('submit', function () {

                    //console.log($("input[name='followers'] :checked").length);
                    var checked = document.querySelectorAll('input[type="checkbox"]:checked').length;
                    console.log('checked = ' + checked);

                    // $.ajax({
                    //     url: $(this).attr('action'),
                    //     type: $(this).attr('method'),
                    //     data: 'screenNameDM=' + screenNameDM + '&textDM=' +textDM,// + '&followers=' + followers,
                    //     dataType: 'json',
                    //     error: function (request, status, error) {
                    //         alert(request + '  /  ' + status + '  /  ' + error);
                    //     },
                    //     success: function (json) {
                    //     console.log(json);
                    //     }
                    // });
                    // return false;
                    // },
                    for (j=0; j < checked ; j++) {

                        console.log('j = ' + j);

                        // $.ajax({
                        //     url: $(this).attr('action'),
                        //     type: $(this).attr('method'),
                        //     data: 'screenNameDM=' + screenNameDM + '&textDM=' +textDM,// + '&followers=' + followers,
                        //     dataType: 'json',
                        //     error: function (request, status, error) {
                        //         alert(request + '  /  ' + status + '  /  ' + error);
                        //     },
                        //     success: function (json) {
                        //     console.log(json);
                        //     }
                        // });
                        // return false;
                        // },
                        $.ajax({
                            url: $(this).attr('action'),
                            type: $(this).attr('method'),
                            data: 'screenNameDM=' + screenNameDM + '&textDM=' + textDM + '&followers=' + followers,
                            //data: $(this).serialize(),
                            dataType: 'json',
                            error: function (request, status, error) {
                                alert(request + '  /  ' + status + '  /  ' + error);
                            },
                            success: function (json) {
                                //console.log($('.followers').val());

                                console.log(json);
                                var message = 'votre message "' + json.text + '" a bien été posté.<br>';
                                $('#result').append(message);
                            }
                        });
                        // return false;
                    }
                    return false;

                });
                //console.log(document.querySelectorAll('input[type="checkbox"]:checked').length);
            }
        });
        return false;
    });

//     $('#formDM').on('submit', function () {
//         //console.log($("input[name='followers'] :checked").length);
//         var checked = document.querySelectorAll('input[type="checkbox"]:checked').length;
//         console.log(checked);
//         var j = 0;
//
//         // $.ajax({
//         //     url: $(this).attr('action'),
//         //     type: $(this).attr('method'),
//         //     data: 'screenNameDM=' + screenNameDM + '&textDM=' +textDM,// + '&followers=' + followers,
//         //     dataType: 'json',
//         //     error: function (request, status, error) {
//         //         alert(request + '  /  ' + status + '  /  ' + error);
//         //     },
//         //     success: function (json) {
//         //     console.log(json);
//         //     }
//         // });
//         // return false;
//         // },
//         while (j <= checked) {
//             j++;
// console.log (j);
//             $.ajax({
//                 url: $(this).attr('action'),
//                 type: $(this).attr('method'),
//                 // data: 'screenNameDM=' + screenNameDM + '&textDM=' + textDM + '&followers=' + followers,
//                 data: $(this).serialize(),
//                 dataType: 'json',
//                 error: function (request, status, error) {
//                     alert(request + '  /  ' + status + '  /  ' + error);
//                 },
//                 success: function (json) {
//                     //console.log($('.followers').val());
//
//                     console.log(json);
//                     var message = 'votre message "' + json.text + '" a bien été posté.<br>';
//                     $('#result').append(message);
//                 }
//             });
//             return false;
//         }
//     });

    // } var results = [];
    // $.each($("input[name='followers']:checked")),function()
    // {
    //     results.push($(this).val());
    // }
    // console.log(results);
});

