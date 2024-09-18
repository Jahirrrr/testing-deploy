import React from "react";
import SearchComponent from "./ui/Search";

export default function Hero() {
    return (
        <>
            <div
                className="hero min-h-screen"
                style={{
                    backgroundImage: "url('Images/main-background2.jpg')",
                }}
            >
                <div className="hero-overlay bg-opacity-50 bg-black"></div>
                <div className="hero-content text-center text-white">
                    <div className="max-w-xl">
                        <h1 className="mb-5 text-3xl md:text-6xl font-bold">
                            Informasi Pendidikan Disabilitas
                        </h1>
                        <p className="mb-5">
                            Kumpulan informasi terkait penyandang disabilitas
                        </p>
                        <SearchComponent />
                    </div>
                </div>
            </div>
        </>
    );
}
