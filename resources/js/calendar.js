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
	const calendar = new Calendar(calendarEl, {
		plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
		initialView: 'dayGridMonth',
		headerToolbar: {
			start: 'prev today dayGridMonth',
			center: 'title',
			end: 'timeGridWeek timeGridDay listWeek next',
		},
		events: [
			{
				editable: true,
				title: 'My Event',
				start: '2024-09-27',
				// daysOfWeek: ['1'],
				backgroundColor: '#cb99c9',
			}
		],
		dateClick: function (info) {
			$('#eventModal').modal('show');
		}
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