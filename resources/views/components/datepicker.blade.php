<div class="relative" wire:ignore>
    <input
        class="datepicker form-input pl-9 dark:bg-slate-800 text-slate-500 hover:text-slate-600 dark:text-slate-300 dark:hover:text-slate-200 font-medium w-[15.5rem]"
        placeholder="Seleccion las fechas" data-class="flatpickr-right" />
    <div class="absolute inset-0 right-auto flex items-center pointer-events-none">
        <svg class="w-4 h-4 fill-current text-slate-500 dark:text-slate-400 ml-3" viewBox="0 0 16 16">
            <path
                d="M15 2h-2V0h-2v2H9V0H7v2H5V0H3v2H1a1 1 0 00-1 1v12a1 1 0 001 1h14a1 1 0 001-1V3a1 1 0 00-1-1zm-1 12H2V6h12v8z" />
        </svg>
    </div>
</div>


@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Definir una configuración de idioma personalizada
            const Spanish = {
                weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    longhand: [
                        "Domingo",
                        "Lunes",
                        "Martes",
                        "Miércoles",
                        "Jueves",
                        "Viernes",
                        "Sábado",
                    ],
                },
                months: {
                    shorthand: [
                        "Ene",
                        "Feb",
                        "Mar",
                        "Abr",
                        "May",
                        "Jun",
                        "Jul",
                        "Ago",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dic",
                    ],
                    longhand: [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre",
                    ],
                },
                rangeSeparator: " - ",
                firstDayOfWeek: 1,
                ordinal: function() {
                    return "º";
                },
                time_24hr: true,
            };

            // Flatpickr
            flatpickr(".datepicker", {
                mode: "range",
                locale: Spanish,
                static: true,
                monthSelectorType: "static",
                dateFormat: "d F Y",
                defaultDate: [new Date().setDate(new Date().getDate() - 6), new Date()],
                prevArrow: '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M5.4 10.8l1.4-1.4-4-4 4-4L5.4 0 0 5.4z" /></svg>',
                nextArrow: '<svg class="fill-current" width="7" height="11" viewBox="0 0 7 11"><path d="M1.4 10.8L0 9.4l4-4-4-4L1.4 0l5.4 5.4z" /></svg>',
                onReady: (selectedDates, dateStr, instance) => {
                    instance.element.value = dateStr.replace("to", "-");
                    const customClass = instance.element.getAttribute("data-class");
                    instance.calendarContainer.classList.add(customClass);
                },
                onChange: (selectedDates, dateStr, instance) => {
                    instance.element.value = dateStr.replace("to", "-");
                    const event = new CustomEvent('date-change', {
                        detail: {
                            date: dateStr
                        }
                    });
                    console.log(selectedDates);
                    @this.setDate(selectedDates);
                    //instance.element.dispatchEvent(event);
                },
            });
        });
    </script>
@endpush
