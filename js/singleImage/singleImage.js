function addReview(uid, id) {
    if ($("#reviewDescription").val() === "" || $("#ratingValue").val() === "0") {
        $('#checkForm').removeClass('d-none');
        $('#checkMessage').empty().append('Please enter all fields.');
    }
    else {
        $.ajax({
            url: "php/singleImage/reviews.php",
            type: "POST",
            data: {
                UID: uid,
                imageId: id,
                review: $("#reviewDescription").val(),
                rating: $("#ratingValue").val(),
            },
            success: function (data) {
                if (data.status === 'error') {
                    $('#checkForm').removeClass('d-none');
                    $('#checkMessage').empty().append(data.error);
                } else {
                    alert(data);
                    $('#exampleModal').modal('hide');
                    fetchReviews(id, uid);
                }
            },
            error: function (data) {
                alert(data);
            }
        });

    }

}

function highlightStar($this) {
    $('#rating').children('i').each(function () {
        $("#"+this.id).removeClass("fas");
    });
    switch($this.id) {
        case "fiveStar":
            $("#fiveStar").addClass("fas");
            $("#fourStar").addClass("fas");
            $("#threeStar").addClass("fas");
            $("#twoStar").addClass("fas");
            $("#oneStar").addClass("fas");
            $("#ratingValue").val("5");
            break;
        case "fourStar":
            $("#fourStar").addClass("fas");
            $("#threeStar").addClass("fas");
            $("#twoStar").addClass("fas");
            $("#oneStar").addClass("fas");
            $("#ratingValue").val("4");
            break;
        case "threeStar":
            $("#threeStar").addClass("fas");
            $("#twoStar").addClass("fas");
            $("#oneStar").addClass("fas");
            $("#ratingValue").val("3");
            break;
        case "twoStar":
            $("#twoStar").addClass("fas");
            $("#oneStar").addClass("fas");
            $("#ratingValue").val("2");
            break;
        case "oneStar":
            $("#oneStar").addClass("fas");
            $("#ratingValue").val("1");
            break;
    }
}

function fetchReviews(id, uid) {
    $.ajax({
        url: "php/singleImage/reviews.php?id=" + id,
        type: "GET",
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status === 0) {
                $('#reviewSection')
                    .empty()
                    .append('<div class="col-12"><h6 class="mb-1">There was a problem fetching reviews. Please try again later.</h6>');
            } else {
                $('#reviewSection').empty();
                if (typeof uid === 'undefined')
                    $('#reviewSection').append('<div class="col-12"><a href="userlogin.php" class="btn btn-primary mb-3">Login to Review</a></div>');
                else {
                    var found = obj.data.find(function(element) {
                        return element['UID'] == uid;
                    });
                    if (found) {
                        $('#reviewSection').append('<div class="col-12"><button type="button" class="btn btn-primary disabled mb-3" disabled>Already Reviewed</button></div>');
                    }
                    else {
                        $('#reviewSection').append(
                            '<div class="col-12"><button type="button" id="postReviewButton" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Post Review</button></div>'
                        );
                    }
                }
                $.each(obj.data, function (i) {
                    $('#reviewSection').append(
                        '<div class="col-12"><h6 class="mb-1">' + obj.data[i]['FirstName'] + ' ' + obj.data[i]['LastName'] + '</h6></div>',
                        '<div class="col-12 mb-1">' + getStars(obj.data[i]['Rating']) + '</div>',
                        '<div class="col-12 mb-3">' + obj.data[i]['Review'] + '</div>'
                    );
                });
            }
        },
        error: function (data) {
            alert(data);
        }
    });
}

// Source: https://codereview.stackexchange.com/a/178069
function getStars(rating) {

    // Round to nearest half
    rating = Math.round(rating * 2) / 2;
    let output = [];

    // Append all the filled whole stars
    for (var i = rating; i >= 1; i--)
        output.push('<i class="fas fa-star text-primary"></i>');

    // Fill the empty stars
    for (let i = (5 - rating); i >= 1; i--)
        output.push('<i class="far fa-star text-primary"></i>');

    return output.join('');

}