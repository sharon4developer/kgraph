$( document ).ready(function() {
    fetchCrew();
});

$('body').on('click','#crew-list-pagination a', function(e) {
    e.preventDefault();
    if ( $(this).attr('href') !== undefined ) {
        url = $(this).attr('href');
        if (url.length) {
            fetchCrew(url);
        }
    }
});

function fetchCrew(url=''){

    if (!url.length) {
         url = BASE_URL+'/fetch-crew';
    }
    $.ajax({
		url: url,
		type: 'POST',
		dataType: 'JSON',
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
	}).done(function(data) {
		showCrew(data);
	}).fail(function(data) {
	}).always(function() {});
}

function showCrew(data){
    crewHtml = '';
    if(data.crew.data.length){
        $.each(data.crew.data, function(index, crew) {
            crewHtml += `<div class="crew-card">
                            <img class="crew-card-img" src="`+crew.image+`" alt="Crew Image">
                            <div class="crew-card-content">
                                <h5>`+crew.name+`</h5>
                                <h6>`+crew.position+`</h6>

                                <div class="address">
                                    <p>`+crew.address+`</p>
                                    <a class="email-link" href="mail.`+crew.email+`">`+crew.email+`</a>
                                </div>

                                <a class="read-bio-link" href="#">Read full bio ></a>
                            </div>
                        </div>`;
        });
        $('#crew-list').show();
    }
    else{
        $('#crew-list').hide();
    }
    $('#crew-list-pagination').html(data.pagination??"");
    $('#crew-list').html(crewHtml);

     $slider = $('.about-meet-slider');

    $slider = $('.about-meet-slider');
        $slider.slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false, // Disable default dots
            arrows: false, // Disable default arrows
            infinite: true,
            slidesToShow: 4.5,
            slidesToScroll: 1,
            pauseOnHover: false,
            pauseOnFocus: false,
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 3.1
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 1401,
                    settings: {
                        slidesToShow: 4.5
                    }
                }
            ]
        });
}
