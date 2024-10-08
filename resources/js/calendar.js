import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
// import { NowIndicatorContainer } from '@fullcalendar/core/internal';
// import { ListView } from '@fullcalendar/list/internal.js';
// import { info } from 'laravel-mix/src/Log';


document.addEventListener('DOMContentLoaded', function () {

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// calendar and functions
	const calendarEl = document.getElementById('calendar');
	var calendar = new Calendar(calendarEl, {
		plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
		initialView: 'dayGridMonth',
		
		headerToolbar: {
			start: 'prev today dayGridMonth',
			center: 'title',
			end: 'timeGridWeek timeGridDay listWeek next',
		},
		selectable: true,
		
		// select: function (start, end, allDay) {
		// 	var title = prompt('Event Title:');
		// 	if (title) {
		// 		var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
		// 		var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
		// 		$.ajax({
		// 			url: SITEURL + "/fullcalenderAjax",
		// 			data: {
		// 				title: title,
		// 				start: start,
		// 				end: end,
		// 				type: 'add'
		// 			}
		// 		})
		// 	}
		// },
		eventColor: '#FFB0B0',
		businessHours: {
			daysOfWeek: [1, 2, 3, 4, 5],
			title: this.title,
			start: '8:00',
			end: '17:00',
			backgroundColor:'#4a4947',
		},
		dateClick: function (info) {
			$('#eventModal').modal('show');
		},
		timeZone: 'UTC+8',
		locale: 'Manila',
	});
	calendar.render();
});

// import { Calendar } from '@fullcalendar/core';
// import dayGridPlugin from '@fullcalendar/daygrid';
// import timeGridPlugin from '@fullcalendar/timegrid';
// import listPlugin from '@fullcalendar/list';

// let calendarEl = document.getElementById('calendar');
// let calendar = new Calendar(calendarEl, {
// 	plugins: [dayGridPlugin, timeGridPlugin, listPlugin],
// 	initialView: 'dayGridMonth',
// 	headerToolbar: {
// 		left: 'prev,next today',
// 		center: 'title',
// 		right: 'dayGridMonth,timeGridWeek,listWeek'
// 	},
// 	editable: true,
// 		selectable: true,
// 	}
// });
// calendar.render();