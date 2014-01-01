$(function() {
	var username = $( "#username" ),
		password = $( "#password" ),
		allFields = $( [] ).add( username ).add( password ),
		tips = $( ".validateTips" );
	
	function updateTips( t ) {
		tips
			.text( t )
			.addClass( "ui-state-hightlight" );
		setTimeout(function() {
			tips.removeClass( "ui-state-hightlight", 1500);
		}, 500);
	}
	
	function checkRequired( o, n ) {
		if ( o.val().length === 0 ) {
			o.addClass( "ui-state-error" );
			updateTips( n + " is a required field.");
			return false;
		} else {
			return true;
		}
	}
	
	$( '#login-form' ).dialog( {
		autoOpen: false,
		height: 300,
		width: 350,
		draggable: false,
		modal: true,
		buttons: {
			"Login": function() {
				var bValid = true;
				allFields.removeClass( "ui-state-error" );
				bValid = bValid && checkRequired( username, "Username" );
				bValid = bValid && checkRequired( password, "Password" );
				
				if ( bValid ) {}
			},
			Cancel: function() {
				$( this ).dialog( "close" );
			}
		},
		close: function() {
			allFields.val( "" ).removeClass( "ui-state-error" );
		}
	});
	
	$( "#login-button" ).click(function() {
		$( "#login-form" ).dialog( "open" );
	});
});