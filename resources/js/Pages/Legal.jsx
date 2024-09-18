import Footer from "@/Components/Footer";
import Navbar from "@/Components/Navbar";
import { Head } from "@inertiajs/react";

const Legal = () => {
    return (
        <div className="flex flex-col min-h-screen">
            <Head title="Kebijakan dan Legalitas" />
            <Navbar />
            <main className="container mx-auto px-4 py-8 flex-grow my-12">
                <h1 className="text-3xl font-bold mb-6">
                    Kebijakan dan Legalitas
                </h1>
                <p className="text-base leading-relaxed">
                    Kami berkomitmen untuk mematuhi semua peraturan dan
                    kebijakan yang berlaku. Lihat informasi lebih lanjut di bawah
                    ini.
                </p>
                <div className="divider mb-8"></div>

                <section className="mb-8">
                    <h2 className="text-2xl font-semibold mb-4">
                        Kebijakan Privasi
                    </h2>
                    <p className="text-base leading-relaxed">
                        Kami menghargai privasi Anda. Lihat bagaimana kami
                        mengelola data pribadi Anda di sini.
                    </p>
                </section>

                <section className="mb-8">
                    <h2 className="text-2xl font-semibold mb-4">
                        Ketentuan Penggunaan
                    </h2>
                    <p className="text-base leading-relaxed">
                        Syarat dan ketentuan untuk menggunakan situs web ini
                        dapat dilihat di sini.
                    </p>
                </section>
            </main>
            <Footer />
        </div>
    );
};

export default Legal;
