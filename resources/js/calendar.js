import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import { NowIndicatorContainer } from '@fullcalendar/core/internal';


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
		events: [
			// {
			// title: 'Start of Revision',
			// title:'Change Study',
			// start: '2024-09-18',
			// end: '2024-09-18',
		// },
		// {
			// title: 'Day 2 data gathering',
			// start: '2024-09-19',
			// end: '2024=09-19',
		// },
		// {
			// title: 'Revision and checking with Adviser',
			// start: '2024-09-24',
			// end: '2024-09-24',
		// }
		{
			groupId: 'blueEvents', // recurrent events in this group move together
			weekdays: [ 1, 5],
			startTime: '10:45:00',
			endTime: '12:45:00'
		  },
		  {
			daysOfWeek: [ 0, 6], // these recurrent events move separately
			startTime: '11:00:00',
			endTime: '11:30:00',
			color: 'red'
		  }
	],
		eventOverlap: function (stillEvent,movingEvent) {
			return stillEvent.allDay && movingEvent.daysOfWeek
		},
		eventResizableFromStart: true,
		timeZone: 'Manila, Philippines · UTC+8',
		eventColor:'green',
		eventDisplay:'list-items',
		stickyHeaderDates:'true',
		handleWindowResize: 'true',
		businessHours:[
			{
				daysOfWeek:[ 1, 2, 3, 4, 5],
				startTime: '8:00',
				eventDisplay: 'list-items',
				endTime: '17:00',
			}
		],
		NowIndicator: true,
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