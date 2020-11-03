<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
<link href='lib/fullcalendar.min.css' rel='stylesheet' />
<link href='lib/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href='scheduler.min.css' rel='stylesheet' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='lib/fullcalendar.min.js'></script>
<script src='scheduler.min.js'></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
   <style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      name = $( "#name" ),
      last = $( "#last" ),
 	  address = $( "#address" ),
 	  num = $( "#num" ),
 	  city = $( "#city" ),
 	  postal = $( "#postal" ),
 	  state = $( "#state" ),
 	  birth = $( "#birth" ),
 	  giorti = $( "#giorti" ),
 	  kiniti = $( "#kiniti" ),
 	  tel = $( "#tel" ),
 	  mobile = $( "#mobile" ),
      email = $( "#email" ),
      facebook = $( "#facebook" ),
      referredby = $( "#referredby" ),
      allFields = $( [] ).add( name ).add( email ).add( password ),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( name, "username", 3, 16 );
      valid = valid && checkLength( email, "email", 6, 80 );
      valid = valid && checkLength( password, "password", 5, 16 );
 
      valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
      valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
 
      if ( valid ) {
        $( "#users tbody" ).append( "<tr>" +
          "<td>" + name.val() + "</td>" +
          "<td>" + email.val() + "</td>" +
          "<td>" + password.val() + "</td>" +
        "</tr>" );
        dialog.dialog( "close" );
 		$.post("process.php", $("#new_client").serialize());

      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 680,
      width: 770,
      modal: true,
      buttons: {
        "Προσθήκη": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $( "#create-user" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
  } );
  </script>
<script>

	$(function() { // document ready

		$('#calendar').fullCalendar({
			defaultView: 'agendaDay',
			defaultDate: '2017-05-07',
			editable: true,
			selectable: true,
			eventLimit: true, // allow "more" link when too many events
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'agendaDay,agendaTwoDay,agendaWeek,month'
			},

			views: {
				agendaTwoDay: {
					type: 'agenda',
					duration: { days: 2 },

					// views that are more than a day will NOT do this behavior by default
					// so, we need to explicitly enable it
					groupByResource: true

					//// uncomment this line to group by day FIRST with resources underneath
					//groupByDateAndResource: true
				}
			},

			//// uncomment this line to hide the all-day slot
			//allDaySlot: false,

			resources: [
				{ id: 'a', title: 'Room A' },
				{ id: 'b', title: 'Room B', eventColor: 'green' },
				{ id: 'c', title: 'Room C', eventColor: 'orange' },
				{ id: 'd', title: 'Room D', eventColor: 'red' }
			],
			events: [
				{ id: '1', resourceId: 'a', start: '2017-05-06', end: '2017-05-08', title: 'event 1' },
				{ id: '2', resourceId: 'a', start: '2017-05-07T09:00:00', end: '2017-05-07T14:00:00', title: 'event 2' },
				{ id: '3', resourceId: 'b', start: '2017-05-07T12:00:00', end: '2017-05-08T06:00:00', title: 'event 3' },
				{ id: '4', resourceId: 'c', start: '2017-05-07T07:30:00', end: '2017-05-07T09:30:00', title: 'event 4' },
				{ id: '5', resourceId: 'd', start: '2017-05-07T10:00:00', end: '2017-05-07T15:00:00', title: 'event 5' }
			],

			select: function(start, end, jsEvent, view, resource) {
				console.log(
					'select',
					start.format(),
					end.format(),
					resource ? resource.id : '(no resource)'
				);
			},
			dayClick: function(date, jsEvent, view, resource) {
				console.log(
					'dayClick',
					date.format(),
					resource ? resource.id : '(no resource)'
				);
			}
		});
	
	});

</script>
<script type="text/javascript">
		function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
} 
</script>
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto');
	body {
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 50px auto;
	}
	* {
		font-family: 'Roboto', sans-serif;
	}

	 /* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
} 

</style>
</head>
<body>

	</html>
