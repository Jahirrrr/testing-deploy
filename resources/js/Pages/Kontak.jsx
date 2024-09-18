import Footer from "@/Components/Footer";
import Navbar from "@/Components/Navbar";
import { Head } from "@inertiajs/react";

const Kontak = () => {
    return (
        <>
            <Head title="Kontak dan Dukungan" />
            <Navbar />
            <div className="p-8 mt-12 container mx-auto">
                <h1 className="text-4xl font-bold mb-6">Kontak Kami</h1>
                <p className="text-base">
                    Suku Dinas Pendidikan Wilayah II Kota Administrasi Jakarta
                    Pusat bertugas memastikan pendidikan berkualitas dan
                    inklusif untuk semua siswa, termasuk mereka yang memiliki
                    kebutuhan khusus. Kami berkomitmen untuk menyediakan
                    informasi berbagai program dan layanan untuk mendukung
                    keberhasilan akademis siswa disabilitas.
                </p>
                <div className="divider"></div>

                <div className="mb-8">
                    <h2 className="text-2xl font-semibold mb-4">Kontak Kami</h2>
                    <div className="flex flex-col lg:flex-row lg:items-start lg:space-x-8">
                        <div className="lg:w-1/2 mb-4 lg:mb-0">
                            <p className="mb-2">
                                Email:{" "}
                                <span className="link">
                                    contact@company.com
                                </span>
                            </p>
                            <p className="mb-2">
                                No. Telepon:{" "}
                                <span className="link">021-3524844</span>
                            </p>
                            <p>Alamat: Walikota Jakarta Pusat, Blok D Lt. 8</p>
                        </div>
                        <div className="lg:w-1/2">
                            <div className="flex justify-center bg-base-200">
                                <iframe
                                    className="w-full h-60 lg:h-72 border-0"
                                    src="https://www.google.com/maps/embed/v1/place?q=Suku+Dinas+Pendidikan+Wilayah+II+Kota+Administrasi+Jakarta+Pusat+&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                                    title="Google Map"
                                ></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="mb-8">
                    <h2 className="text-2xl font-semibold mb-4">
                        Tautan Media Sosial
                    </h2>
                    <div className="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0">
                        <a
                            href="https://facebook.com"
                            className="btn btn-outline btn-primary w-full sm:w-auto"
                        >
                            Facebook
                        </a>
                        <a
                            href="https://twitter.com"
                            className="btn btn-outline btn-primary w-full sm:w-auto"
                        >
                            Twitter
                        </a>
                        <a
                            href="https://instagram.com"
                            className="btn btn-outline btn-primary w-full sm:w-auto"
                        >
                            Instagram
                        </a>
                    </div>
                </div>
            </div>
            <Footer />
        </>
    );
};

export default Kontak;
