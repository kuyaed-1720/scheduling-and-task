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
		editable: true,
		selectable: true,
		events: '/events',
		dateClick: function (info) {
			var title = prompt('Enter Event Title:');
			var start = info.dateStr;
			if (title) {
				$.ajax({
					url: '/events',
					data: {
						title: title,
						start: start,
						type: 'add'
					},
					type: "POST",
					success: function (data) {
						calendar.addEvent({
							id: data.id,
							title: data.title,
							start: data.start,
							end: data.end
						});
						alert("Event added successfully!");
					}
				});
			}
		}
	});
	calendar.render();
});