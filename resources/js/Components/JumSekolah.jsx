import { Link } from "@inertiajs/react";
import React from "react";

export default function JumSekolah(props) {
    const { data } = props;
    return (
        <>
            <div className="container mx-auto px-4 py-8 flex-grow my-12">
                <h1 className="text-center font-bold text-2xl md:text-3xl mt-12 text-primary">
                    Jumlah Sekolah Inklusif di Suku Dinas Jakarta Pusat II
                </h1>
            </div>
            <div className="stats stats-vertical lg:stats-horizontal shadow my-12 w-full bg-primary text-secondary-content">
                {data.map((packageItem, index) => (
                    <Link
                        href={route("sekolah", {
                            jenjang: packageItem.nama_jenjang,
                        })}
                        key={index}
                        className="stat"
                    >
                        <div>
                            <div className="stat-title">
                                {packageItem.nama_jenjang}
                            </div>
                            <div className="stat-value text-lg md:text-2xl">
                                {packageItem.profil_sekolah_count}
                            </div>
                        </div>
                    </Link>
                ))}
            </div >
        </>
    );
}
