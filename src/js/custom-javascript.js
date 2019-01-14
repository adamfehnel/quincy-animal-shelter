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
	var _d = jQuery(e.target).closest('.dropdown'),
		_m = jQuery('.dropdown-menu', _d);
	setTimeout(function(){
		var shouldOpen = e.type !== 'click' && _d.is(':hover');
		_m.toggleClass('show', shouldOpen);
		_d.toggleClass('show', shouldOpen);
		jQuery('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
	}, e.type === 'mouseleave' ? 25 : 0);
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
});