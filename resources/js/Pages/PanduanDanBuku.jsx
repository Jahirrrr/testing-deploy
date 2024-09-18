import axios from "axios";
import Footer from "@/Components/Footer";
import Navbar from "@/Components/Navbar";
import Pagination from "@/Components/Pagination";
import LoadingComponent from "@/Components/ui/Loading";
import { Head } from "@inertiajs/react";
import { useEffect, useState } from "react";
import { MdDownload } from "react-icons/md";

const PanduanDanBuku = () => {
    const [panduanData, setPanduanData] = useState(null);
    const [bukuData, setBukuData] = useState(null);
    const [currentPanduanPage, setCurrentPanduanPage] = useState(1);
    const [currentBukuPage, setCurrentBukuPage] = useState(1);

    useEffect(() => {
        fetchPanduanData();
    }, [currentPanduanPage]);

    useEffect(() => {
        fetchBukuData();
    }, [currentBukuPage]);

    const fetchPanduanData = async () => {
        console.log("Fetching panduan data for page:", currentPanduanPage);
        try {
            const response = await axios.get(route("dokumen.getDokumen"), {
                params: {
                    jenis_dokumen_id: 1,
                    page: currentPanduanPage,
                },
            });
            console.log("Panduan data response:", response.data);
            setPanduanData(response.data);
        } catch (error) {
            console.error("Failed to fetch panduan data", error);
        }
    };

    const fetchBukuData = async () => {
        console.log("Fetching buku data for page:", currentBukuPage);
        try {
            const response = await axios.get(route("dokumen.getDokumen"), {
                params: {
                    jenis_dokumen_id: 2,
                    page: currentBukuPage,
                },
            });
            console.log("Buku data response:", response.data);
            setBukuData(response.data);
        } catch (error) {
            console.error("Failed to fetch buku data", error);
        }
    };

    if (!panduanData || !bukuData) return <LoadingComponent />;

    return (
        <>
            <Head title="Panduan dan Buku" />
            <Navbar />
            <div className="container mx-auto px-4 py-8 flex-grow my-12">
                <h1 className="text-4xl font-bold">Panduan dan Buku</h1>
                <p className="text-lg text-primary-content mt-4">
                    Unduh panduan pengguna sistem dan buku-buku yang
                    mendukung pendidikan inklusif bagi siswa disabilitas.
                </p>
                <div className="divider mb-6"></div>

                {/* Section for Panduan */}
                <section className="mb-12">
                    <h2 className="text-3xl font-semibold mb-4">Panduan</h2>
                    {panduanData.data.length > 0 ? (
                        <>
                            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                {panduanData.data.map((item) => (
                                    <div
                                        key={item.id}
                                        className="border rounded-lg p-4 flex flex-col items-center"
                                    >
                                        <img
                                            src={item.image}
                                            alt="Panduan Thumbnail"
                                            className="w-32 h-40 object-cover rounded-lg mb-4 sm:mb-0 sm:mr-6"
                                        />
                                        <div>
                                            <p className="mb-2 font-semibold">
                                                {item.nama_panduan}
                                            </p>
                                            <p className="mb-4 text-primary-content">
                                                {item.deskripsi}
                                            </p>
                                            <a
                                                href={item.dokumen_link}
                                                className="btn btn-primary"
                                                download={`Panduan_${item.id}.pdf`}
                                            >
                                                Unduh Panduan <MdDownload />
                                            </a>
                                        </div>
                                    </div>
                                ))}
                            </div>
                            <Pagination
                                data={panduanData}
                                dataCurrentPage={setCurrentPanduanPage}
                            />
                        </>
                    ) : (
                        <p>Belum ada panduan.</p>
                    )}
                </section>

                {/* Section for Buku */}
                <section>
                    <h2 className="text-3xl font-semibold mb-4">Buku</h2>
                    {bukuData.data.length > 0 ? (
                        <>
                            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                {bukuData.data.map((item) => (
                                    <div
                                        key={item.id}
                                        className="border rounded-lg p-4 flex flex-col items-center"
                                    >
                                        <img
                                            src={item.image}
                                            alt={`Buku ${item.id} Thumbnail`}
                                            className="w-32 h-40 object-cover rounded-lg mb-4"
                                        />
                                        <div className="text-center">
                                            <p className="mb-2 font-semibold">
                                                {item.nama_panduan}
                                            </p>
                                            <p className="mb-4 text-primary-content">
                                                {item.deskripsi}
                                            </p>
                                            <a
                                                href={item.dokumen_link}
                                                className="btn btn-primary"
                                                download={`Buku_${item.id}.pdf`}
                                            >
                                                Unduh Buku <MdDownload />
                                            </a>
                                        </div>
                                    </div>
                                ))}
                            </div>
                            <Pagination
                                data={bukuData}
                                dataCurrentPage={setCurrentBukuPage}
                            />
                        </>
                    ) : (
                        <p>Belum ada buku.</p>
                    )}
                </section>
            </div>
            <Footer />
        </>
    );
};

export default PanduanDanBuku;
