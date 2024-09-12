import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';


document.addEventListener('DOMContentLoaded', function () {

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// calendar and functions
	const calendarEl = document.getElementById('calendar');
	const calendar = new Calendar(calendarEl, {
		plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
		initialView: 'dayGridMonth',
		headerToolbar: { 
			left:'timeGridWeek,dayGridMonth,listWeek',
			center: 'title'},
		editable: true,
		selectable: true,
		events: '/api/events',
		timeZone: 'Manila/Philippines',
		eventColor:'black',
		eventDisplay:'auto',
		stickyHeaderDates:'true',
		handleWindowResize: true,
		businessHours:[
			{
				daysOfWeek:[ 1, 2, 3, 4, 5],
				startTime: '8:00',
				eventDisplay: 'list-items',
				endTime: '17:00',
			}
		],
		dateClick: function(info){
			alert('CLICKED: ' + formatIsoTimeString);
		},
		// eventClick: function(info){
		// 	alert('.eventModal' + info.events)
		// },
		
		dayMaxEventRows: true,
		views:{
			timeGrid:{
				dayMaxEventRows: 5
			}
		}
		});
	calendar.render();
});