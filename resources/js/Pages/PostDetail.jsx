import { Card, CardBody, CardTitle } from "@/Components/ui/Card";
import DefaultLayout from "@/Layouts/DefaultLayout";
import { Head, Link } from "@inertiajs/react";
import LoadingComponent from "@/Components/ui/Loading";
import axios from "axios";
import React, { useEffect, useState } from "react";
import DOMPurify from "dompurify";

const PostDetail = (props) => {
    const [data, setData] = useState();
    const { id } = props;

    useEffect(() => {
        if (id === null) return (window.location.href = route("post"));
    }, []);

    useEffect(() => {
        getDataInformasiByID();
    }, []);

    const getDataInformasiByID = async () => {
        const response = await axios.get(
            route("informasi.getInformasiByID", id)
        );
        const { data } = response.data;
        setData(data);
    };

    if (!data || !props) return <LoadingComponent />;

    // Fungsi untuk membersihkan HTML agar aman
    const cleanHTML = (html) => {
        return DOMPurify.sanitize(html);
    };

    return (
        <>
            <Head title={data?.judul || "Post Detail"} />
            <DefaultLayout>
                <div className="block my-5">
                    <Link className="btn btn-outline btn-sm" onClick={() => window.history.back()}>back</Link>
                </div>
                <Card className="bg-base-100 shadow-lg hover:shadow-2xl transition-shadow">
                    <CardBody>
                        <CardTitle> {data?.judul} </CardTitle>
                        <img
                            src={data?.image}
                            onError={(e) => {
                                e.target.src =
                                    "Images/poster-hari-disabilitas-international.jpg";
                            }}
                        />
                        {/* Render body dari React-Quill */}
                        <div
                            dangerouslySetInnerHTML={{
                                __html: cleanHTML(data?.body),
                            }}
                        />
                    </CardBody>
                </Card>
            </DefaultLayout>
        </>
    );
};

export default PostDetail;
