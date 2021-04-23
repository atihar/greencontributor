/*
    Custom JavaScripts for the project
 */

$(document).ready(function (){
    // Slick Slider
    $('#slider').slick({
        autoplay: true,
    });

    // ScrollMagic
    let controller = new ScrollMagic.Controller();
    new ScrollMagic.Scene({
        triggerElement: "#slider",
        offset: 32,
        triggerHook: 0
    })
        .setClassToggle("#navbar", "stretched")
        .addTo(controller);

    // Current Date Time
    setInterval(function(){
        let dateVar = new Date()
        let date = dateVar.getDate()
        let month = dateVar.getMonth()+1
        switch (dateVar.getMonth()){
            case 0:
                month = 'January'
                break
            case 1:
                month = 'February'
                break
            case 2:
                month = 'March'
                break
            case 3:
                month = 'April'
                break
            case 4:
                month = 'May'
                break
            case 5:
                month = 'June'
                break
            case 6:
                month = 'July'
                break
            case 7:
                month = 'August'
                break
            case 8:
                month = 'September'
                break
            case 9:
                month = 'October'
                break
            case 10:
                month = 'November'
                break
            case 11:
                month = 'December'
                break
        }
        let day = dateVar.getDay()
        switch (dateVar.getDay()){
            case 0:
                day = 'Sunday'
                break
            case 1:
                day = 'Monday'
                break
            case 2:
                day = 'Tuesday'
                break
            case 3:
                day = 'Wednesday'
                break
            case 4:
                day = 'Thursday'
                break
            case 5:
                day = 'Friday'
                break
            case 6:
                day = 'Saturday'
                break
        }
        let year = dateVar.getFullYear()
        let hour = dateVar.getHours()
        let minutes = dateVar.getMinutes()
        let seconds = dateVar.getSeconds()
        let timezone = dateVar.getTimezoneOffset()/60
        if(timezone>0){
            timezone = "GMT -" + Math.abs(timezone)
        }else {
            timezone = "GMT +" + Math.abs(timezone)
        }
        $('#date').html(date)
        $('#month').html(month)
        $('#year').html(year)
        $('#day').html(day)
        $('#hour').html(hour)
        $('#minutes').html(minutes)
        $('#timezone').html(timezone)
        $('#seconds').html(seconds)
    }, 1000)

    // Google Timezone API Key: AIzaSyDr1stNwRXI7Biz9oUx9ZMhw2b4osME5vI
    $("#time_nai").remoteTime({
        key: "AIzaSyDr1stNwRXI7Biz9oUx9ZMhw2b4osME5vI",
        location: "Los Angeles, California",
        format: "m/d/y g:i:s a"
    });

    // Time in cities slider
    $('.time-grid').slick({
        autoplay: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true
    });

    let allTimes = $(".current-time");
    for(let i=0; i<allTimes.length; i++){
        let city = $(allTimes[i]).attr('data-city')
        $(allTimes[i]).remoteTime({
            key: "AIzaSyDr1stNwRXI7Biz9oUx9ZMhw2b4osME5vI",
            location: city,
            format: "l j F Y  g:i:s A"
        })
    }

    // Video Gallery
    $("#video-slider").slick({
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true
    })

    // Video Gallery
    $("#product-slider").slick({
        autoplay: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true
    })

    // Testimonials
    $("#testimonails-slider").slick({
        autoplay: true,
        infinite: true,
        slidesToScroll: 1,
        slidesToShow: 1
    })

})


// modal
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$("#join_form").on("submit", function(e){
    e.preventDefault();
    $.ajax({
        url: '/join',
        method: 'POST',
        data: $(this).serialize(),
        success: function(data){
            data = JSON.parse(data)
            if(data.success == 'true'){
                alert("Working");
            }else{
                $("#myModal .modal-content").html("Student ID Does Not Exist")
            }
        }
    })
})
