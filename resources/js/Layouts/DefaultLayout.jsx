import Footer from "@/Components/Footer";
import Navbar from "@/Components/Navbar";
import React from "react";

export default function DefaultLayout({ children }) {
    return (
        <>
            <Navbar />
            <div className="min-h-dvh mx-auto px-4 py-8 my-12">{children}</div>
            <Footer />
        </>
    );
}
