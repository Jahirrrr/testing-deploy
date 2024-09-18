import React, { useState, useRef, useEffect } from "react";

const Calendar = () => {
    const [events, setEvents] = useState({});
    const [selectedDate, setSelectedDate] = useState(null);
    const [eventName, setEventName] = useState("");
    const [currentMonth, setCurrentMonth] = useState(new Date().getMonth());
    const [currentYear, setCurrentYear] = useState(new Date().getFullYear());
    const [dateEvent, setDateEvent] = useState();

    const calendarRef = useRef(null);
    const modalRef = useRef(null);

    useEffect(() => {
        document.addEventListener("mousedown", handleClickOutside);
        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
        };
    }, []);

    useEffect(() => {
        getEventDay();
    }, []);

    const getEventDay = async () => {
        const eventDate = await axios.get(
            route("informasi.showDataEventByMonth", currentMonth + 1)
        );

        const { data } = eventDate;
        setDateEvent(data);
    };

    const checkEventDate = (day) => {

    }

    const getDaysInMonth = (month, year) =>
        new Date(year, month + 1, 0).getDate();

    const handleDayClick = (day) => {
        const date = new Date(currentYear, currentMonth, day);
        setSelectedDate(date.toDateString());
    };

    const handleClickOutside = (event) => {
        if (
            modalRef.current &&
            !modalRef.current.contains(event.target) &&
            !calendarRef.current.contains(event.target)
        ) {
            setSelectedDate(null);
        }
    };

    const daysInMonth = Array.from(
        { length: getDaysInMonth(currentMonth, currentYear) },
        (_, i) => i + 1
    );
    const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
    const today = new Date();

    const handleMonthChange = (direction) => {
        setCurrentMonth((prevMonth) => {
            if (direction === "prev") {
                return prevMonth === 0 ? 11 : prevMonth - 1;
            } else {
                return prevMonth === 11 ? 0 : prevMonth + 1;
            }
        });

        if (direction === "prev" && currentMonth === 0) {
            setCurrentYear((prevYear) => prevYear - 1);
        } else if (direction === "next" && currentMonth === 11) {
            setCurrentYear((prevYear) => prevYear + 1);
        }
    };

    return (
        <div className="relative bg-white shadow-lg rounded-lg w-full max-w-md mx-auto p-4">
            {/* Kalender */}
            <div ref={calendarRef}>
                <div className="flex justify-between items-center mb-2 border-b p-2">
                    <button
                        onClick={() => handleMonthChange("prev")}
                        className="p-2 text-gray-600 hover:scale-125 transition-transform duration-200 rounded-md text-sm md:text-base"
                    >
                        ❮
                    </button>
                    <div className="flex flex-col items-center">
                        <span className="text-sm md:text-lg">
                            {new Date(currentYear, currentMonth).toLocaleString(
                                "default",
                                { month: "long" }
                            )}{" "}
                            {currentYear}
                        </span>
                    </div>
                    <button
                        onClick={() => handleMonthChange("next")}
                        className="p-2 text-gray-600 hover:scale-125 transition-transform duration-200 rounded-md text-sm md:text-base"
                    >
                        ❯
                    </button>
                </div>

                {/* Print All Day in One Month */}
                <div className="grid grid-cols-7 gap-1 text-xs md:text-sm">
                    {["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"].map(
                        (day, index) => (
                            <div key={index} className="text-center font-bold">
                                {day}
                            </div>
                        )
                    )}

                    {Array.from({ length: firstDayOfMonth }).map((_, index) => (
                        <div key={index} className="p-2"></div>
                    ))}

                    {/* Data hari yang ditampilkan di 1 bulan */}
                    {daysInMonth.map((day) => {
                        console.log(day);
                        return (
                            <div
                                key={day}
                                onClick={() => handleDayClick(day)}
                                className={`p-2 text-center cursor-pointer rounded-md ${
                                    day === today.getDate() &&
                                    currentMonth === today.getMonth() &&
                                    currentYear === today.getFullYear()
                                        ? "bg-green-300 rounded-full"
                                        : ""
                                } hover:bg-blue-200`}
                            >
                                {day}
                            </div>
                        );
                    })}
                </div>
            </div>
        </div>
    );
};

export default Calendar;
