import Footer from "@/Components/Footer";
import Navbar from "@/Components/Navbar";
import Pagination from "@/Components/Pagination";
import LoadingComponent from "@/Components/ui/Loading";
import { Head, Link } from "@inertiajs/react";
import { useEffect, useState } from "react";

const Sekolah = (props) => {
    const [searchQuery, setSearchQuery] = useState("");
    const [currentPage, setCurrentPage] = useState(1);
    const [data, setData] = useState();
    const jenjangQuery = props.jenjang;
    const pagePerItem = 10;

    useEffect(() => {
        getDataSekolah();
    }, [currentPage]);

    const getDataSekolah = async () => {
        if (jenjangQuery) {
            const response = await axios.get(
                route("sekolah.getJenjangByName", {
                    name: jenjangQuery,
                    per_page: pagePerItem,
                    page: currentPage,
                })
            );
            const { data } = response;
            setData(data[1])
        } else {
            const response = await axios.get(
                route("sekolah.getProfilSekolah"),
                {
                    params: {
                        per_page: pagePerItem,
                        page: currentPage,
                    },
                }
            );
            const { data } = response;
            setData(data);
        }
    };

    if (!data) return <LoadingComponent/>;

    return (
        <div className="flex flex-col">
            <Head title="Daftar Sekolah" />
            <Navbar />
            <main className="container mx-auto px-4 py-8 flex-grow my-12">
                <h1 className="text-3xl font-bold mb-6">Daftar Sekolah</h1>

                {/* Search Bar */}
                <div className="mb-6">
                    <input
                        type="text"
                        className="input input-bordered w-full"
                        placeholder="Cari berdasarkan nama, kecamatan, atau alamat sekolah..."
                        value={searchQuery}
                        onChange={(e) => setSearchQuery(e.target.value)}
                    />
                </div>

                <div className="overflow-x-auto overflow-y-auto">
                    <table className="table table-compact w-full">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Sekolah</th>
                                <th>NPSN</th>
                                <th>Alamat</th>
                                <th className="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            {data.data.length > 0 ? (
                                data.data.map((packageItem, i) => (
                                    <tr key={i}>
                                        <th>
                                            {(currentPage - 1) * pagePerItem +
                                                i +
                                                1}
                                        </th>
                                        <td>{packageItem.nama_sekolah}</td>
                                        <td>{packageItem.NPSN}</td>
                                        <td>{`${packageItem.alamat}, Kec. ${packageItem.kecamatan}`}</td>
                                        <td className="text-center">
                                            <Link
                                                className="btn bg-primary"
                                                href={route(
                                                    "profil-sekolah",
                                                    packageItem.slug
                                                )}
                                            >
                                                See Detail
                                            </Link>
                                        </td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td colSpan="8" className="text-center">
                                        Tidak ada sekolah yang cocok dengan
                                        pencarian Anda.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>

                    <Pagination
                        data={data}
                        dataCurrentPage={(value) => setCurrentPage(value)}
                    />
                </div>
            </main>
            <Footer />
        </div>
    );
};

export default Sekolah;
