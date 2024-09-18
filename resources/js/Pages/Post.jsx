import { Card, CardBody, CardTitle, CardImage } from "@/Components/ui/Card";
import LoadingComponent from "@/Components/ui/Loading";
import DefaultLayout from "@/Layouts/DefaultLayout";
import { Head, Link } from "@inertiajs/react";
import axios from "axios";
import DOMPurify from "dompurify";
import React, { useEffect, useState } from "react";

const Post = () => {
    const [data, setData] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);

    const dataPost = data?.data;

    useEffect(() => {
        getDataPost();
    }, [currentPage]);

    const getDataPost = async () => {
        const response = await axios.get(route("informasi.getInformasi"), {
            params: {
                page: currentPage,
            },
        });
        setData(response.data);
    };

    const prevAction = async (e) => {
        e.preventDefault();
        setCurrentPage(currentPage - 1);
    };

    const nextAction = async (e) => {
        e.preventDefault();
        setCurrentPage(currentPage + 1);
    };

    if (!data || !dataPost || !currentPage) return <LoadingComponent />;

    // Fungsi untuk membersihkan HTML body
    const cleanHTML = (html) => {
        return DOMPurify.sanitize(html);
    };

    return (
        <>
            <Head title="Post Informasi" />
            <DefaultLayout>
                <div className="p-4 md:p-8">
                    <h2 className="font-bold text-2xl text-center md:text-left">Postingan Terkini</h2>

                    {/* Adjusted grid for responsiveness */}
                    <div className="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        {dataPost.map((packageItem, index) => (
                            <Card
                                key={index + 3}
                                className="card-compact bg-base-100 shadow-lg hover:shadow-2xl transition-shadow w-full"
                            >
                                <CardImage
                                    src={
                                        "Images/poster-hari-disabilitas-international.jpg"
                                    }
                                    className="object-cover h-40 w-full"
                                />
                                <CardBody className="p-4">
                                    <CardTitle className="text-lg md:text-xl">
                                        {packageItem.judul}
                                    </CardTitle>
                                    <div className="card-actions justify-start">
                                        <div className="badge badge-outline">
                                            {
                                                packageItem.jenis_informasi
                                                    .nama_jenis
                                            }
                                        </div>
                                    </div>
                                    <div className="text-sm mt-3">
                                        {/* Render body using dangerouslySetInnerHTML */}
                                        <div
                                            dangerouslySetInnerHTML={{
                                                __html: cleanHTML(
                                                    packageItem.body.length > 60
                                                        ? `${packageItem.body.slice(
                                                            0,
                                                            60
                                                        )} ...`
                                                        : packageItem.body
                                                ),
                                            }}
                                        />
                                    </div>
                                    <Link
                                        className="btn btn-primary btn-sm mt-3"
                                        href={route("post-detail", {
                                            id: packageItem.id,
                                        })}
                                    >
                                        Read More
                                    </Link>
                                </CardBody>
                            </Card>
                        ))}
                    </div>

                    {/* Pagination controls */}
                    <div className="flex justify-center mt-10">
                        <div className="join">
                            {data.prev_page_url !== null && (
                                <button
                                    className="join-item btn btn-sm"
                                    onClick={(e) => prevAction(e)}
                                >
                                    «
                                </button>
                            )}
                            <button className="join-item btn btn-sm">
                                Page {currentPage ?? data.current_page}
                            </button>
                            {data.next_page_url !== null && (
                                <button
                                    className="join-item btn btn-sm"
                                    onClick={(e) => nextAction(e)}
                                >
                                    »
                                </button>
                            )}
                        </div>
                    </div>
                </div>
            </DefaultLayout>
        </>
    );
};

export default Post;
