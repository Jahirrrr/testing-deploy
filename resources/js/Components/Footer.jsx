import React from "react";
import { FaFacebook, FaInstagram, FaXTwitter } from "react-icons/fa6";

const Footer = () => {
    return (
        <footer className="footer relative bg-secondary text-white py-8">
            <div className="absolute inset-x-0 top-0 h-[6px] bg-gradient-to-r from-teal-300 via-green-500 to-blue-700" />
            <div className="container mx-auto px-4">
                <div className="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
                    <div>
                        <h2 className="footer-title">
                            <a href={route("kontak")}>Kontak Kami</a>
                        </h2>

                        <p className="text-sm">Email: contoh@contoh.com</p>
                        <p className="text-sm">Telepon: +123 456 7890</p>
                    </div>

                    <div className="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
                        <h2 className="footer-title">Ikuti Kami</h2>
                        <div className="flex space-x-4">
                            <a
                                href="https://www.facebook.com"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Facebook"
                                className="text-white hover:text-primary transition-transform transform hover:scale-110"
                            >
                                <FaFacebook className="h-6 w-6" />
                            </a>
                            <a
                                href="https://www.twitter.com"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Twitter"
                                className="text-white hover:text-primary transition-transform transform hover:scale-110"
                            >
                                <FaXTwitter className="h-6 w-6" />
                            </a>
                            <a
                                href="https://www.instagram.com"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Instagram"
                                className="text-white hover:text-primary transition-transform transform hover:scale-110"
                            >
                                <FaInstagram className="h-6 w-6" />
                            </a>
                        </div>
                    </div>
                </div>

                {/* Bagian Bawah Footer */}
                <div className="mt-12 border-t border-gray-100 pt-6 w-full">
                    <div className="text-center sm:flex sm:justify-between sm:text-left">
                        <p className="text-sm text-white">
                            <a
                                className="inline-block underline transition"
                                href={route('kebijakan')}
                            >
                                Syarat & Ketentuan
                            </a>

                            <span> &middot; </span>

                            <a
                                className="inline-block underline transition"
                                href={route('kebijakan')}
                            >
                                Kebijakan Privasi
                            </a>
                        </p>

                        <p className="mt-4 text-sm sm:order-first sm:mt-0">&copy; {new Date().getFullYear()} Suku Dinas Pendidikan Daerah Jakarta Pusat II</p>
                    </div>
                </div>
            </div>
        </footer>
    );
};

export default Footer;
