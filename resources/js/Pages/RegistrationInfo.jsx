import { Head } from "@inertiajs/react";
import Footer from "@/Components/Footer";
import Navbar from "@/Components/Navbar";

const RegistrationInfo = () => {
    return (
        <>
            <Navbar />
            <main className="flex-grow bg-base-100 py-8 px-4">
                <Head title="Informasi Pendaftaran" />
                <div className="container mx-auto flex flex-col md:flex-row items-center justify-center text-center mt-12 md:mt-36 font-extrabold text-4xl mb-8 md:mb-12">
                    Yuk Segera
                    <span className="text-teal-500 mx-2">
                        Daftarkan Sekolah
                    </span>
                    mu di sini!
                </div>

                <div className="container mx-auto flex flex-col md:flex-row items-center justify-between p-6 md:p-12 bg-white rounded-md shadow-lg shadow-teal-200 border border-teal-200">
                    {/* Left side: Illustration */}
                    <div className="relative w-full md:w-1/2 flex justify-center md:items-end mb-8 md:mb-0">
                        <img
                            src="/Images/cartoon-registrasi-sekolah.png"
                            alt="Illustration"
                            className="w-full h-auto max-w-xs md:max-w-sm"
                        />
                    </div>

                    {/* Right side: Benefits list */}
                    <div className="w-full md:w-1/2 space-y-4 text-center md:text-left">
                        <h2 className="text-2xl font-bold text-teal-600 mb-8 md:mb-12">
                            Keuntungan Program Inklusi Kami
                        </h2>

                        <ul className="space-y-4">
                            {[
                                "Mempermudah masyarakat penyandang disabilitas dalam memperoleh layanan",
                                "Memudahkan aksesibilitas informasi yang ramah disabilitas melalui fitur yang mudah digunakan.",
                                "Meningkatkan partisipasi masyarakat disabilitas dalam kegiatan sosial dan pelayanan publik.",
                                "Mendorong inklusi sosial dengan menyediakan layanan digital yang dapat diakses oleh semua kalangan.",
                            ].map((benefit, index) => (
                                <li
                                    key={index}
                                    className="flex items-start justify-center md:justify-start"
                                >
                                    <div className="bg-teal-500 p-2 rounded-full shadow-md">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            className="w-6 h-6 text-white"
                                        >
                                            <path
                                                strokeLinecap="round"
                                                strokeLinejoin="round"
                                                strokeWidth="2"
                                                d="M5 13l4 4L19 7"
                                            />
                                        </svg>
                                    </div>
                                    <span className="ml-4 text-lg text-gray-700">
                                        {benefit}
                                    </span>
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>
                <div className="container mx-auto flex flex-col items-start mt-12 md:mt-36">
                    <div className="font-extrabold text-4xl mb-4">
                        TATA CARA PENDAFTARAN
                    </div>
                    <div className="font-base text-2xl text-gray-500 mb-12">
                        Ikuti langkah - langkah berikut untuk mendaftarkan
                        sekolah mu 💖
                    </div>
                    <div className="w-full flex justify-end">
                        <div className="bg-teal-500 w-full md:w-96 h-12 rounded-full"></div>
                    </div>
                </div>
                <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-screen-xl mx-auto pt-16">
                    {[
                        {
                            title: "PAUD (Pendidikan Anak Usia Dini)",
                            color: "yellow-400",
                            steps: [
                                "Siapkan dokumen kelahiran anak dan bukti tempat tinggal.",
                                "Kunjungi PAUD terdekat untuk mendapatkan formulir pendaftaran.",
                                "Isi formulir pendaftaran dan lengkapi dengan dokumen yang dibutuhkan.",
                                "Hadiri sesi orientasi yang mungkin diperlukan.",
                            ],
                        },
                        {
                            title: "SKB (Sanggar Kegiatan Belajar)",
                            color: "green-600",
                            steps: [
                                "Siapkan dokumen pendaftaran yang diperlukan.",
                                "Kunjungi kantor SKB atau situs web mereka untuk mendapatkan formulir pendaftaran.",
                                "Isi formulir dengan informasi yang diperlukan dan lengkapi dengan dokumen yang dibutuhkan.",
                                "Kirimkan formulir ke kantor SKB atau melalui portal online mereka.",
                            ],
                        },
                        {
                            title: "SD (Sekolah Dasar)",
                            color: "green-500",
                            steps: [
                                "Siapkan dokumen seperti akta kelahiran dan bukti tempat tinggal.",
                                "Kunjungi SD terdekat untuk mendapatkan formulir pendaftaran.",
                                "Isi formulir pendaftaran dan lengkapi dengan dokumen yang diminta.",
                                "Hadiri tes atau wawancara yang mungkin diperlukan.",
                            ],
                        },
                        {
                            title: "SMP (Sekolah Menengah Pertama)",
                            color: "blue-400",
                            steps: [
                                "Siapkan dokumen pendaftaran seperti akta kelahiran dan bukti tempat tinggal.",
                                "Kunjungi SMP yang diinginkan untuk mendapatkan formulir pendaftaran.",
                                "Isi formulir dengan informasi yang dibutuhkan dan lengkapi dengan dokumen yang diminta.",
                                "Ikuti tes masuk atau wawancara jika diperlukan.",
                            ],
                        },
                        {
                            title: "SMA (Sekolah Menengah Atas)",
                            color: "red-700",
                            steps: [
                                "Persiapkan dokumen pendaftaran seperti akta kelahiran dan bukti tempat tinggal.",
                                "Kunjungi SMA yang Anda pilih untuk mendapatkan formulir pendaftaran.",
                                "Lengkapi formulir pendaftaran dan sertakan dokumen yang diperlukan.",
                                "Ikuti tes akademik atau wawancara yang mungkin diperlukan.",
                            ],
                        },
                    ].map((card, index) => (
                        <div
                            key={index}
                            className={`relative bg-white shadow-lg rounded-lg p-6 border-t-8 border-${card.color} transition-transform transform hover:scale-105`}
                        >
                            <div
                                className={`absolute inset-x-0 top-0 h-1 rounded-t-lg bg-${card.color}`}
                            ></div>
                            <div className="card-body pt-6">
                                <h2
                                    className={`text-2xl font-bold mb-4 text-${card.color}`}
                                >
                                    {card.title}
                                </h2>
                                <ul className="list-disc pl-5 mb-4 text-gray-600">
                                    {card.steps.map((step, i) => (
                                        <li key={i}>{step}</li>
                                    ))}
                                </ul>
                                <p className="text-gray-700">
                                    Untuk informasi lebih lanjut, hubungi atau
                                    kunjungi situs web resmi mereka.
                                </p>
                            </div>
                        </div>
                    ))}
                </div>
            </main>
            <Footer />
        </>
    );
};

export default RegistrationInfo;
