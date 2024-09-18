import React, { useState } from "react";
import Calendar from "./Calendar";

const NewsSlider = () => {
    const [currentSlide, setCurrentSlide] = useState(1);
    const totalSlides = 4;

    const handleClickNext = () => {
        setCurrentSlide(currentSlide === totalSlides ? 1 : currentSlide + 1);
    };

    const handleClickPrev = () => {
        setCurrentSlide(currentSlide === 1 ? totalSlides : currentSlide - 1);
    };

    const slides = [
        {
            id: 1,
            title: "Breaking News: Major Event Unfolds",
            date: "September 4, 2024",
            imgSrc: "https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.webp",
        },
        {
            id: 2,
            title: "Latest Update: New Developments",
            date: "September 3, 2024",
            imgSrc: "https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp",
        },
        {
            id: 3,
            title: "Special Report: In-depth Analysis",
            date: "September 2, 2024",
            imgSrc: "https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.webp",
        },
        {
            id: 4,
            title: "Top Story: Breaking the Silence",
            date: "September 1, 2024",
            imgSrc: "https://img.daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.webp",
        },
    ];

    return (
        <div className="flex flex-col md:flex-row mx-auto my-4 pt-12 px-4 max-w-screen-xl">
            {/* Slider */}
            <div className="w-full md:w-2/3 relative">
                <div className="carousel w-full h-64 md:h-80 rounded-2xl relative overflow-hidden">
                    {slides.map((slide) => (
                        <div
                            key={slide.id}
                            className={`carousel-item absolute inset-0 transition-opacity duration-700 ease-in-out ${
                                currentSlide === slide.id
                                    ? "opacity-100"
                                    : "opacity-0"
                            }`}
                        >
                            <img
                                src={slide.imgSrc}
                                className="w-full h-full object-cover"
                                alt={slide.title}
                            />
                            <div className="absolute inset-0 bg-black bg-opacity-60 flex items-end p-4">
                                <div className="text-white">
                                    <h2 className="text-xl md:text-3xl font-bold">
                                        {slide.title}
                                    </h2>
                                    <p className="mt-2 text-sm md:text-base">
                                        {slide.date}
                                    </p>
                                </div>
                            </div>
                            <div className="absolute left-5 right-5 top-1/2 md:left-2 md:right-2 md:top-1/5 flex -translate-y-1/2 transform justify-between">
                                <button
                                    onClick={handleClickPrev}
                                    className="btn btn-circle text-sm md:text-xs p-2 md:p-1"
                                >
                                    ❮
                                </button>
                                <button
                                    onClick={handleClickNext}
                                    className="btn btn-circle text-sm md:text-xs p-2 md:p-1"
                                >
                                    ❯
                                </button>
                            </div>
                        </div>
                    ))}
                    {/* Indicators */}
                    <div className="absolute bottom-0 left-0 right-0 flex justify-center p-2 space-x-2">
                        {Array.from({ length: totalSlides }).map((_, index) => (
                            <div
                                key={index}
                                className={`w-3 h-3 rounded-full ${
                                    currentSlide === index + 1
                                        ? "bg-green-700"
                                        : "bg-green-400"
                                }`}
                            ></div>
                        ))}
                    </div>
                </div>
            </div>

            {/* Calendar */}
            <div className="w-full md:w-1/3 mt-4 md:mt-0 md:ml-8">
                <Calendar />
            </div>
        </div>
    );
};

export default NewsSlider;
