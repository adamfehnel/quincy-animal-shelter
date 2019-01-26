jQuery(window).scroll(function() {
	var e = jQuery(document).scrollTop(),
		t = jQuery(document).height(),
		n = jQuery(window).height(),
		i = jQuery("#wrapper-footer").innerHeight(),
		r = jQuery("#back-to-top");
	0 == e || t - i < e + n ? r.hide() : r.show()
});

var isTouchable = false;
if ("ontouchstart" in document.documentElement) {
	isTouchable = true;
}

// Read a page's GET URL variables and return them as an associative array.
function getUrlVars()
{
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for(var i = 0; i < hashes.length; i++)
	{
		hash = hashes[i].split('=');
		vars.push(hash[0]);
		vars[hash[0]] = hash[1];
	}
	return vars;
}

function toggleDropdown (e) {
	if ( jQuery(window).width() >= 768 ) {

		var _d = jQuery(e.target).closest('.dropdown'),
			_m = jQuery('.dropdown-menu', _d);
		setTimeout(function(){
			var shouldOpen = e.type !== 'click' && _d.is(':hover');
			_m.toggleClass('show', shouldOpen);
			_d.toggleClass('show', shouldOpen);
			jQuery('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
		}, e.type === 'mouseleave' ? 25 : 0);
	}
}

function filterPets (filter ) {
	if ( filter == 'cat' ) {
		jQuery('.filterable').hide();
		jQuery('.filterable.cat').show();
		jQuery('#filter-pet-form input').prop('checked', false);
		jQuery('#filter-cats').prop('checked', true);
	} else if ( filter == 'dog' ) {
		jQuery('.filterable').hide();
		jQuery('.filterable.dog').show();
		jQuery('#filter-pet-form input').prop('checked', false);
		jQuery('#filter-dogs').prop('checked', true);
	} else {
		jQuery('.filterable').show();
		jQuery('#filter-pet-form input').prop('checked', false);
		jQuery('#filter-all').prop('checked', true);
	}
}

jQuery(function() {

	jQuery('body')
	  .on('mouseenter mouseleave','.dropdown',toggleDropdown)
	  .on('click', '.dropdown-menu a', toggleDropdown);

	/* not needed, prevents page reload for SO example on menu link clicked */
	jQuery('.dropdown a').on('click tap', function(e){
		if ( isTouchable ) {
			$this = jQuery(this);
			if ( $this.attr('aria-expanded') === "true" ) {
				location.href = $this.attr('href');
			}
		} else {
			location.href = jQuery(this).attr('href');
		}
	});

	/* Paypal donate button */
	jQuery('.donate-button').click(function(e){
		e.preventDefault();

		jQuery('#donate-button-form').submit();
	});

	/* Paypal donate options */
	jQuery('.donate-option').click(function(e){
		e.preventDefault();

		jQuery('.donate-option').removeClass('btn-primary').addClass('btn-light');
		jQuery(this).addClass('btn-primary').removeClass('btn-light');
		jQuery('#donate-options-form-amount').attr('value', jQuery(this).data('amount') );
	});
	jQuery('.donate-options-submit').click(function(e){
		e.preventDefault();

		jQuery('#donate-options-form').submit();
	});

	jQuery('#header-search-submit').click(function(e){
		e.preventDefault();

		if ( !jQuery('#s').val() ) {
			jQuery('#s').focus();
		} else {
			jQuery('#header-search-form').submit();
		}
	});

	jQuery('#filter-pet-form input').change(function(e){
		if ( jQuery(this).hasClass('cat') ) {
			filterPets( "cat" );
		} else if ( jQuery(this).hasClass('dog') ) {
			filterPets( "dog" );
		} else {
			filterPets( "all" );
		}
	});

	var filter = getUrlVars()["filter"];
	if ( typeof filter !== "undefined" ) {
		filterPets( filter );
	}

	jQuery('#submit-sponsor-pet-form').click(function(e){
		e.preventDefault();

		jQuery('#donate-sponsor-pet-form').submit();
	});

	jQuery('#scoop-signup-submit').click(function(e){

		jQuery('#embedded_signup').submit();

	});

	function isValidEmailAddress(emailAddress) {
		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
		return pattern.test( emailAddress );
	}

	jQuery("#embedded_signup").submit(function(e){
		if ( jQuery('#scoop-email').val() && isValidEmailAddress( jQuery('#scoop-email').val() ) ) {
			e.preventDefault();

			jQuery('#scoop-signup-form-wrapper').html('<p class="my-2 h5 text-400">...</p>');

			jQuery.ajax({
				type: "POST",
				url: "https://visitor2.constantcontact.com/api/signup",
				data: jQuery(this).serialize(),
				success: function() {
					
					jQuery('#scoop-signup-form-wrapper').html('<p class="my-2 h5 text-400"><i class="fa fa-check mr-2"></i> Signed up!</p>');
					console.log('hi!');
				}
			});

			return false;

		} else {
			jQuery('#scoop-email').focus();
			return false;
		}
	});


	// I know that the code could be better.
	// If you have some tips or improvement, please let me know.

	jQuery('.img-parallax').each(function(){
	  var img = jQuery(this);
	  var imgParent = jQuery(this).parent();
	  function parallaxImg () {
	    var speed = img.data('speed');
	    var imgY = imgParent.offset().top;
	    var winY = jQuery(this).scrollTop();
	    var winH = jQuery(this).height();
	    var parentH = imgParent.innerHeight();


	    // The next pixel to show on screen      
	    var winBottom = winY + winH;

	    // If block is shown on screen
	    if (winBottom > imgY && winY < imgY + parentH) {
	      // Number of pixels shown after block appear
	      var imgBottom = ((winBottom - imgY) * speed);
	      // Max number of pixels until block disappear
	      var imgTop = winH + parentH;
	      // Porcentage between start showing until disappearing
	      var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
	    }
	    img.css({
	      top: imgPercent + '%',
	      transform: 'translate(-50%, -' + imgPercent + '%)'
	    });
	  }
	  jQuery(document).on({
	    scroll: function () {
	      parallaxImg();
	    }, ready: function () {
	      parallaxImg();
	    }
	  });
	});
});