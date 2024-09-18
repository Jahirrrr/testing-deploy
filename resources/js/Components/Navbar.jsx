import React, { useEffect, useState } from "react";
import { FaAngleDown } from "react-icons/fa6";

const Navbar = () => {
    const [isScrolling, setIsScrolling] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            setIsScrolling(window.scrollY > 0);
        };

        window.addEventListener("scroll", handleScroll);
        return () => window.removeEventListener("scroll", handleScroll);
    }, []);

    return (
        <nav
            className={`navbar fixed top-0 left-0 right-0 z-20 transition-all duration-300 ${!isScrolling ? "backdrop-blur-sm py-3" : "bg-primary shadow-lg"
                } ${route().current("homepage") ? "text-white" : ""}`}
        >
            <div className="navbar-start">
                <div className="dropdown dropdown-hover">
                    <label
                        tabIndex={0}
                        className="btn btn-ghost btn-circle min-[1170px]:hidden"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            className="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                strokeWidth={2}
                                d="M4 6h16M4 12h16M4 18h7"
                            />
                        </svg>
                    </label>
                    <ul
                        tabIndex={0}
                        className="menu menu-compact dropdown-content mt-3 p-2 shadow-lg bg-base-100 rounded-box w-52 text-primary-content"
                    >
                        <li>
                            <a href="/">Beranda</a>
                        </li>
                        <li>
                            <a href={route("sekolah")}>Sekolah</a>
                        </li>
                        <li>
                            <a href={route("post")}>
                                Post
                            </a>
                        </li>
                        <li tabIndex={0}>
                            <a className="justify-between">
                                Mengenai Kami
                                <FaAngleDown />
                            </a>
                            <ul className="p-2">
                                <li>
                                    <a href={route("tentang")}>Tentang Kami</a>
                                </li>
                                <li>
                                    <a href={route("kontak")}>
                                        Kontak dan Dukungan
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href={route("kebijakan")}>
                                Kebijakan dan Legalitas
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="/" className="btn btn-ghost normal-case text-xl">
                    Informasi Pendidikan Disabilitas
                </a>
            </div>
            <div className="navbar-end hidden min-[1170px]:flex">
                <ul className="menu menu-horizontal px-1 hidden lg:flex ml-4">
                    <li>
                        <a href="/">Beranda</a>
                    </li>
                    <li>
                        <a href={route("sekolah")}>Sekolah</a>
                    </li>
                    <li>
                        <a href={route("post")}>Berita</a>
                    </li>
                    <li tabIndex={0}>
                        <details>
                            <summary>Mengenai Kami</summary>
                            <ul className="p-2 text-primary-content">
                                <li>
                                    <a href={route("tentang")}>Tentang Kami</a>
                                </li>
                                <li>
                                    <a href={route("kontak")}>
                                        Kontak dan Dukungan
                                    </a>
                                </li>
                                <li>
                                    <a href={route("kebijakan")}>
                                        Kebijakan dan Legalitas
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <li>
                        <a href={route("panduan-buku")}>Panduan dan Buku</a>
                    </li>
                    <li>
                        <a href={route("informasi")}>Informasi</a>
                    </li>
                </ul>
            </div>
        </nav>
    );
};

export default Navbar;
