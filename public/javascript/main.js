$(document).ready(function() {

	$('.focus > div').animate({height: '250%'}, 10);

	//================================================================
	// Instafeed
	//================================================================

	var hashtag = 'hikeaz'; // $('.hashtag').text(); //'hikeaz';
	console.log(hashtag);
	var feed = new Instafeed({
			get: 'tagged',
			tagName: hashtag,
			clientId: 'ad19ab7ad8e940a5a8ee3775ac7553ff',
			template: '<div><a target="_blank" href={{link}}><img src={{image}}></a></div>',
			resolution: 'low_resolution'
		,
		after:function(){
			$("#instafeed").simplyScroll({
                  		speed: 2,
                  		frameRate: 20,
                  		manualMode: 'end',
                  		startOnLoad: true,
                  		orientation: 'vertical',
                  		direction: 'forwards'
     		});
		}
	});

	feed.run();

	//================================================================
	// Masonry
	//================================================================

	$('.masonry.tiles').masonry({
		columnWidth: 10,
		gutter: 10,
		itemSelector: '.ttile'
	});

	$('.masonry.trail_tiles > div').masonry({
		columnWidth: 10,
		gutter: 10,
		itemSelector: '.ttile'
	});

	//================================================================
	// Header
	//================================================================

	$('.options.browse').on('click', function() {
		if (top.location.pathname === '/hikingtrailz/') {
			$("html, body").animate({ scrollTop: 715 }, "slow");
		} else {
			window.location.href = "/hikingtrailz/";
		}
	});
	$('.options.suggest').on('click', function() {
		window.location.href = "/hikingtrailz/suggest";
	});

	$('.options.randomtrail').on('click', function(){
		var trail = Math.floor(Math.random() * 12) + 1;

		window.location.href = '/hikingtrailz/randomTrail/' + trail;
	});

	//================================================================
	// Featured
	//================================================================

	$.get('/hikingtrailz/weather', {}, function (data) {
		// $('.fweather').text(data.temperature);
		$('.fweather').html(data.temperature + '&deg; ' + data.clouds);
	})

	$('.featureblock').on('click', function(){
		//regular getters
		var mID = $(this).find('.info input').val();
		var header = $(this).find('.info h2').html();
		var weather = $(this).find('.info .fweather').html();
		var desc = $(this).find('.info p').text();
		var bgc = $(this).css('background-image');

		//focus getters
		var fbgc = $('.focus').css('background-image');
		var fmID = $('.focus').find('.info input').val();
		var fheader = $('.focus').find('.info h2').text();
		var fweather = $('.focus').find('.info .fweather').html();
		var fdesc = $('.focus').find('.info p').text();

		//AJAX replace hero photo
		var sendData = {
			mountain_id: $(this).find('input').val()
		}

		$.get('hikingtrailz/featureImage', sendData, function (data) {
			$('.photo').css('background-image', 'url(/hikingtrailz/' + data.imageURL + ')');
		})

		//replace header
		$(this).find('.thumbnail h3').replaceWith('<h3>' + fheader + '</h3>');
		$(this).find('.info h2').replaceWith('<h2>' + fheader + '</h2>');
		$(this).find('.info input').replaceWith('<input type="hidden" value="' + fmID + '">');
		$('.focus .info input').replaceWith('<input type="hidden" value="' + mID + '">');
		$('.focus .info h2').replaceWith('<h2>' + header + '</h2>');

		//replace weather
		$(this).find('.info h3').replaceWith('<h3>' + fweather + '</h3>');
		$('.focus .info .fweather').replaceWith('<div class="fweather">' + weather + '</div>');

		//replace description
		$(this).find('.info p').replaceWith('<p>' + fdesc + '</p>');
		$('.focus .info p').replaceWith('<p>' + desc + '</p>');

		//replace background image 
		$('.focus').css('background-image', bgc);
		$(this).css('background-image', fbgc);

		//animation
		$('.focus > div').css('height', '100%');
		$('.focus > div').animate({height: '250%'}, 500);

	});

	//================================================================
	// Browse and Searches
	//================================================================

	$('.tagline span').on('click', function(){
		$('.selected').removeClass('selected');
		$(this).addClass('selected');
		if ($(this).text() == 'Search') {
			$('.search').removeClass('displayNone');
			$('.tiles').addClass('displayNone');
		} else if ($(this).text() == 'Browse') {
			$('.search').addClass('displayNone');
			$('.tiles').removeClass('displayNone');
		} else if ($(this).text() == 'See All') {
			$('.trail_tiles').addClass('displayNone');
			$('.seeAll').removeClass('displayNone');
		} else if ($(this).text() == 'Top 10') {
			$('.seeAll').addClass('displayNone');
			$('.trail_tiles').removeClass('displayNone');		
		}
	});

	//================================================================
	// Add Comment on Trail Page
	//================================================================

	function renderComment(comment){
		var source = $('#template-comment').html();
		var template = Handlebars.compile(source);
		var output = template({
			comment_description: comment.comment_description,
			comment_id: comment.comment_id,
			created_at: comment.created_at
		});
		return output;	
	};



	$('form.add-comment').on('submit', function(event) {
		event.preventDefault();
		var comment_description = $('.add-comment textarea').val();
		

		var senddata = {
			user_id: $('.add-comment .user-id').val(),
			token: $('.add-comment .token').val(),
			trail_id: $('.add-comment .trail-id').val(),
			message: $('.add-comment textarea').val()
		}
		

		$.get('hikingtrailz/addComment', senddata, function (data){
			
				var output = renderComment(data.comment);
				//console.log(data.comment.created_at);
				$('.comments').prepend(output);
		})


		$('textarea').val('');		
	});

//================================================================
// Delete Comment on Trail Page
//================================================================
	$(document).on('click', '.delete-comment .fa-times' , function(event) {
		event.preventDefault();
		var comment_id = $('.delete-comment .comment-id').val();
		

		var senddata = {
			comment_id: $('.delete-comment .comment-id').val()	
		}
		
		$(this).parents('.comment-block').remove();
		console.log(senddata);

		$.get('hikingtrailz/deleteComment', senddata, function (data){

		})
		
	});


//================================================================
// Search
//================================================================

	$('.search form').on('submit', function(e){
		e.preventDefault();
		var sendMessage = { 
			message: $('.search input').val()

		}
		$.get('hikingtrailz/search', sendMessage, function(data){
			console.log(data);
			for (var i = 0; i < data.length; i++) {
				var tmplt = '<div><a href="/hikingtrailz/Trails/' + data[i].mountain_id + '/' + data[i].trail_id + '">' + (i+1) + '- ' + data[i].name + '</a></div>';
				$('.results').append(tmplt);
			};
		})
	})

});