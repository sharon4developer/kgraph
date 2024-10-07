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
            crewHtml += ` <div class="flex items-center overflow-scroll scrollbar-hidden gap-4 mb-6">
                            <div class="w-full md:w-[273px] border rounded-xl">
                                <img class="md:w-[273px] rounded-xl"
                                    src="`+crew.image+`"
                                    alt="">
                                <div class="text-white font_inter px-5 pb-4">
                                    <h5 class="pt-[10px] font-semibold text-base">"`+crew.name+`"</h5>
                                    <h6 class="font-semibold text-xs">"`+crew.position+`"</h6>

                                    <div class="py-[25px] font-bold text-[10px]">
                                        <p>"`+crew.address+`"</p>
                                        <a class="" href="mail."`+crew.email+`"">"`+crew.email+`"</a>
                                    </div>

                                    <a class="underline underline-offset-2 font-bold text-[10px]" href="#">Read full
                                        bio ></a>
                                </div>
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
}
