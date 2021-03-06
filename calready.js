$(function() { // document ready

		$('#calendar').fullCalendar({
			schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
			theme: true,
			editable: true, // enable draggable events
			aspectRatio: 1.8,
			  minTime: "09:00:00",
			  maxTime: "21:00:00",
			scrollTime: '00:00', // undo default 6am scrollTime
			header: {
				left: 'today prev,next',
				center: 'title',
				right: 'timelineDay'
			},
			defaultView: 'timelineDay',
			views: {
				timelineThreeDays: {
					type: 'timeline',
					duration: { days: 3 }
				}
			},
			resourceLabelText: 'Rooms',
			resources: [

				{ id: 'i', title: 'Indoor Courts 1-6', children: [
					{ id: 'i1', title: 'Court 1' },
					{ id: 'i2', title: 'Court 2' },
					{ id: 'i3', title: 'Court 3' },
					{ id: 'i4', title: 'Court 4' },
					{ id: 'i5', title: 'Court 5' },
					{ id: 'i6', title: 'Court 6' },
				] },                                           
				{ id: 'o', title: 'Outdoor Courts 7-18', children: [
					{ id: 'o1', title: 'Court 7' },
					{ id: 'o2', title: 'Court 8' },
					{ id: 'o3', title: 'Court 9' },
					{ id: 'o4', title: 'Court 10' },
					{ id: 'o5', title: 'Court 11' },
					{ id: 'o6', title: 'Court 12' },
					{ id: 'o7', title: 'Court 13' },
					{ id: 'o8', title: 'Court 14' },
					{ id: 'o9', title: 'Court 15' },
					{ id: 'o10', title: 'Court 16' },
					{ id: 'o11', title: 'Court 17' },
					{ id: 'o12', title: 'Court 18' },
				
				]},

			],
			events: 'http://umwtennis.org/evt.json'
		});
                
   
	
	});
