import Footer from "@/Components/Footer";
import Hero from "@/Components/Hero";
import JumSekolah from "@/Components/JumSekolah";
import Navbar from "@/Components/Navbar";
import {
    Card,
    CardActions,
    CardBody,
    CardImage,
    CardTitle,
} from "@/Components/ui/Card";
import LoadingComponent from "@/Components/ui/Loading";
import NewsSlider from "@/Components/ui/News_Slider";
import { Head, Link } from "@inertiajs/react";
import React, { useEffect, useState } from "react";
import axios from "axios";
import Testimoni from "../Components/ui/Testimoni";
import Feedback from "../Components/ui/Feedback";
import { FaCalendar } from "react-icons/fa6";

const ReturnPage = ({ dataJenjang, infografis, dataInformasi }) => {
    return (
        <>
            <Head title="Beranda" />
            <Navbar />
            {/* Hero Section */}
            <Hero />
            <NewsSlider />
            {/* Jumlah Sekolah Inklusif di Indonesia */}
            {/* <JumSekolah data={dataJenjang} /> */}

            {/* Post Cards Section */}
            <div className="container mx-auto px-4 py-8 flex-grow my-12">
                <div className="flex items-center justify-center h-12 md:h-20 font-bold text-2xl md:text-3xl mb-3 text-primary">
                    Post Terbaru Minggu Ini
                </div>
                <div className="container mx-auto">
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {dataInformasi.map((packageItem, index) => (
                            <Card
                                className="card-compact bg-base-100 shadow-lg hover:shadow-2xl transition-shadow"
                                key={index}
                            >
                                <CardImage
                                    src={
                                        "Images/poster-hari-disabilitas-international.jpg"
                                    }
                                    alt={`Post ${index + 1}`}
                                    onError={(e) => {
                                        e.target.src =
                                            "Images/poster-hari-disabilitas-international.jpg";
                                    }}
                                    className="object-cover h-40 w-full"
                                />
                                <CardBody className="p-4">
                                    <CardTitle className="text-xl">
                                        {packageItem.judul}
                                    </CardTitle>
                                    <p className="text-sm text-gray-500">
                                        <FaCalendar className="inline-block mr-2" />
                                        {`${new Date(
                                            packageItem.created_at
                                        ).getDate()}-${new Date(
                                            packageItem.created_at
                                        ).getMonth() + 1
                                            }-${new Date(
                                                packageItem.created_at
                                            ).getFullYear()}`}{" "}
                                    </p>
                                    <CardActions>
                                        <button className="btn btn-primary btn-sm">
                                            Read More
                                        </button>
                                    </CardActions>
                                </CardBody>
                            </Card>
                        ))}
                    </div>
                </div>
            </div>

            {/* Layanan Lainnya Section */}
            <section className="container mx-auto px-4 py-8 my-12">
                <h2 className="text-center font-bold text-2xl md:text-3xl text-primary mb-12">
                    Infografis Penyandang Disabilitas
                </h2>
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    {infografis.map((item, index) => (
                        <Card
                            key={index}
                            className="card-compact bg-base-100 shadow-lg hover:scale-105 transition-transform"
                        >
                            <CardImage
                                src={item.image} // Ambil src gambar dari array
                                alt={`Layanan Publik ${index + 1}`}
                                className="object-cover h-auto w-full"
                            />
                            {/* <CardBody className="p-4">
                    <CardTitle className="text-xl">
                        Hari Nasional
                    </CardTitle>
                    <p className="text-sm">
                        Brief description of the post goes here.
                    </p>
                    <CardActions className="justify-center">
                        <a className="link link-primary" href="#">
                            Read More
                        </a>
                    </CardActions>
                </CardBody> */}
                        </Card>
                    ))}
                </div>
            </section>

            {/* Program Disabilitas Section */}
            <section className="container mx-auto px-6 py-12 bg-gradient-to-r from-teal-500 via-teal-400 to-teal-300 rounded-xl shadow-lg border border-teal-200">
                <h2 className="text-center font-bold text-4xl text-white mb-8">
                    Program Disabilitas Sekolah
                </h2>
                <div className="flex flex-col md:flex-row items-center justify-center gap-8">
                    <div className="flex-1 bg-white p-6 rounded-lg shadow-xl hover:scale-105 transition-transform">
                        <h3 className="text-2xl font-bold text-gray-800 mb-2">
                            Program Makan Siang
                        </h3>
                        <p className="text-gray-600">
                            Program ini memberikan makan siang sehat untuk
                            siswa.
                        </p>
                    </div>
                    <div className="flex-1 flex justify-center">
                        <img
                            src="/Images/program.png"
                            alt="Ilustrasi Program"
                            className="w-full h-auto max-w-md"
                        />
                    </div>
                    <div className="flex-1 bg-white p-6 rounded-lg shadow-xl hover:scale-105 transition-transform">
                        <h3 className="text-2xl font-bold text-gray-800 mb-2">
                            Program Bantuan KJP
                        </h3>
                        <p className="text-gray-600">
                            Memberikan bantuan finansial melalui KJP untuk siswa
                            yang membutuhkan.
                        </p>
                    </div>
                </div>
            </section>

            {/* Panduan dan Buku Section */}
            <section className="container mx-auto py-16 px-4">
                <h2 className="text-center text-3xl md:text-4xl font-bold text-gray-800 mb-8">
                    Panduan dan <span className="text-green-600">Buku</span>
                </h2>
                <div className="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div className="flex justify-center">
                        <img
                            src="/Images/book.png"
                            alt="Keuntungan Citigov"
                            className="w-full h-auto max-w-md hover:scale-105 cursor-pointer transition-transform duration-300"
                            onClick={() =>
                                (window.location.href = "panduan-buku")
                            }
                        />
                    </div>
                    <div className="space-y-6">
                        {[
                            {
                                text: "Klik Icon Buku Disamping",
                            },
                            {
                                text: "Cari Buku yang ingin dibaca",
                            },
                            {
                                text: "Unduh Buku yang sudah di pilih",
                            },
                            {
                                text: "Selamat membaca 😁, Literasi Indonesia Maju!",
                            },
                        ].map((benefit, index) => {
                            return (
                                <div
                                    key={index}
                                    className={`flex items-center p-4
                                    rounded-lg shadow-md shadow-teal-500 hover
                                        bg-teal-500
                                    -200 transition-colors`}
                                >
                                    <div
                                        className={`w-10 h-10
                                        bg-teal-500
                                        }-500 rounded-full flex items-center justify-center text-white font-bold text-center`}
                                    >
                                        {index + 1}
                                    </div>
                                    <p className="ml-4 text-lg text-gray-700">
                                        {benefit.text}
                                    </p>
                                </div>
                            );
                        })}
                    </div>
                </div>
            </section>

            <section className="container mx-auto px-4 py-8 my-12">
                <div className="flex flex-col md:flex-row gap-8 justify-evenly">
                    <Feedback />
                    <Testimoni />
                </div>
            </section>
            <Footer />
        </>
    )
}

const Homepage = () => {
    const [dataJenjang, setDataJenjang] = useState([]);
    const [dataInformasi, setDataInformasi] = useState([]);
    const [webOnLoad, setWebOnLoad] = useState(true)
    const infografis = [
        {
            image: "/Images/Infografis/infografis-1.jpeg",
        },
        {
            image: "/Images/Infografis/infografis-2.jpeg",
        },
        {
            image: "/Images/Infografis/infografis-3.jpeg",
        },
    ];

    useEffect(() => {
        getDataJenjang();
        getDataInformasi();
    }, []);

    useEffect(() => {
        window.onload = () => {
            setWebOnLoad(false)
        }

        const timeout = setTimeout(() => {
            setWebOnLoad(false)
        }, 3000)

        return () => clearTimeout(timeout)
    }, [])

    const getDataJenjang = async () => {
        try {
            const response = await axios.get(route("sekolah.getJenjang"));
            setDataJenjang(response.data);
        } catch (error) {
            console.error("Error fetching dataJenjang:", error);
        }
    };

    const getDataInformasi = async () => {
        try {
            const response = await axios.get(route("informasi.getInformasi"), {
                params: { per_page: 5 },
            });
            setDataInformasi(response.data.data);
        } catch (error) {
            console.error("Error fetching dataInformasi:", error);
        }
    };

    return webOnLoad ? <LoadingComponent /> : <ReturnPage dataJenjang={dataJenjang} dataInformasi={dataInformasi} infografis={infografis} />;
};

export default Homepage;
