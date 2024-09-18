import Footer from "@/Components/Footer";
import Navbar from "@/Components/Navbar";
import { Head } from "@inertiajs/react";

const TentangKami = () => {
    return (
        <>
            <Head title="Tentang Kami" />
            <Navbar />
            <div className="container mx-auto p-8 mt-12">
                <h1 className="text-4xl font-bold mb-6">Tentang Kami</h1>
                <p className="mb-8">
                    Suku Dinas Pendidikan Wilayah II Kota Administrasi Jakarta
                    Pusat bertugas memastikan pendidikan berkualitas dan
                    inklusif untuk semua siswa, termasuk mereka yang memiliki
                    kebutuhan khusus. Kami berkomitmen untuk menyediakan
                    informasi berbagai program dan layanan untuk mendukung
                    keberhasilan akademis siswa disabilitas.
                </p>

                <div className="divider"></div>

                <div className="mb-8">
                    <h2 className="text-2xl font-semibold mb-4">Visi dan Misi</h2>
                    <div className="flex flex-col lg:flex-row lg:space-x-8">
                        <div className="lg:w-1/2">
                            <h3 className="text-lg font-semibold mb-2">Visi</h3>
                            <ul className="list-disc list-inside mb-4">
                                <li>
                                    Menciptakan pendidikan inklusif yang berkualitas
                                    bagi semua siswa.
                                </li>
                            </ul>

                            <h3 className="text-lg font-semibold mb-2">Misi</h3>
                            <ul className="list-disc list-inside mb-4">
                                <li>
                                    Mewujudkan pendidikan yang inklusif dan
                                    berkualitas untuk semua siswa di Suku Dinas
                                    Pendidikan Wilayah II Kota Administrasi Jakarta Pusat.
                                </li>
                            </ul>

                            {/* //NOTE - Can be activated */}
                            {/* <h3 className="text-lg font-semibold mb-2">Tujuan</h3>
                            <ul className="list-disc list-inside">
                                <li>
                                    Menyediakan akses pendidikan yang adil dan
                                    sumber daya yang diperlukan untuk mendukung
                                    siswa dengan disabilitas dalam mencapai
                                    potensi penuh mereka.
                                </li>
                            </ul> */}
                        </div>
                    </div>
                </div>
            </div>
            <Footer />
        </>
    );
};

export default TentangKami;
